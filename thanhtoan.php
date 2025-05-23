<?php
session_start();
require_once 'admin/connect.php';
include 'header.php';

// Xử lý submit
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['dat_hang'])) {
    // Xử lý đặt hàng ở đây (như đã hướng dẫn ở phần trước)
    // ...
}

// Tính tổng tiền
function tinhTong($conn, $cart) {
    $tong = 0;
    if (!empty($cart)) {
        $ids = array_keys($cart);
        $stmt = $conn->prepare("SELECT MaSach, GiaBan, GiaUuDai FROM sach WHERE MaSach IN (" . implode(',', array_fill(0, count($ids), '?')) . ")");
        $stmt->bind_param(str_repeat('s', count($ids)), ...$ids);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $gia = ($row['GiaUuDai'] && $row['GiaUuDai'] < $row['GiaBan']) ? $row['GiaUuDai'] : $row['GiaBan'];
            $tong += $gia * $_SESSION['cart'][$row['MaSach']];
        }
    }
    return $tong;
}
?>

<style>
.checkout-form {
    display: flex;
    gap: 40px;
    margin-bottom: 40px;
}
.checkout-form .left,
.checkout-form .right {
    flex: 1;
}
.right {
    background: #fff;
    padding: 20px;
    border: 1px solid #eee;
    border-radius: 8px;
}
.product-summary {
    border-bottom: 1px solid #ccc;
    margin-bottom: 15px;
    padding-bottom: 10px;
}
</style>

<div class="container product-list">
    <h2 class="category-title">Thanh toán</h2>
    <p>Vui lòng kiểm tra thông tin Khách hàng và Giỏ hàng trước khi Đặt hàng.</p>

    <form method="post" class="checkout-form">
        <div class="left">
            <h4>Thông tin khách hàng</h4>
            <div class="form-group">
                <label>Họ tên</label>
                <input type="text" name="ten" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Giới tính</label>
                <select name="gioitinh" class="form-control">
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                </select>
            </div>
            <div class="form-group">
                <label>Địa chỉ</label>
                <input type="text" name="diachi" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Điện thoại</label>
                <input type="text" name="sdt" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label>Ngày sinh</label>
                <input type="date" name="ngaysinh" class="form-control">
            </div>
            <div class="form-group">
                <label>CMND / CCCD</label>
                <input type="text" name="cmnd" class="form-control">
            </div>
            <h4>Hình thức thanh toán</h4>
            <div class="form-check"><input class="form-check-input" type="radio" name="pttt" value="1" checked> <label class="form-check-label">Tiền mặt</label></div>
            <div class="form-check"><input class="form-check-input" type="radio" name="pttt" value="2"> <label class="form-check-label">Chuyển khoản</label></div>
            <div class="form-check"><input class="form-check-input" type="radio" name="pttt" value="3"> <label class="form-check-label">Ship COD</label></div>
        </div>

        <div class="right">
            <h4>Giỏ hàng</h4>
            <?php
            if (!isset($_SESSION['cart']) || count($_SESSION['cart']) === 0) {
                echo "<p>Giỏ hàng trống.</p>";
            } else {
                $ids = array_keys($_SESSION['cart']);
                $stmt = $conn->prepare("SELECT MaSach, TenSach, GiaBan, GiaUuDai FROM sach WHERE MaSach IN (" . implode(',', array_fill(0, count($ids), '?')) . ")");
                $stmt->bind_param(str_repeat('s', count($ids)), ...$ids);
                $stmt->execute();
                $result = $stmt->get_result();
                $tong = 0;
                while ($row = $result->fetch_assoc()) {
                    $soLuong = $_SESSION['cart'][$row['MaSach']];
                    $gia = ($row['GiaUuDai'] && $row['GiaUuDai'] < $row['GiaBan']) ? $row['GiaUuDai'] : $row['GiaBan'];
                    $tong += $gia * $soLuong;
                    echo "<div class='product-summary'>
                            <div>{$row['TenSach']}</div>
                            <small>{$gia} × {$soLuong} = " . number_format($gia * $soLuong, 0, ',', '.') . "₫</small>
                          </div>";
                }
                echo "<h5>Tổng cộng: <strong>" . number_format($tong, 0, ',', '.') . "₫</strong></h5>";
            }
            ?>
        </div>
    </form>

    <div style="text-align:center;">
        <button type="submit" name="dat_hang" class="btn btn-buy" style="padding: 10px 40px; font-size: 16px;">Đặt hàng</button>
    </div>
</div>

<?php include 'footer.php'; ?>