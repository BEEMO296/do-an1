<?php
session_start();
require_once 'admin/connect.php';
include 'header.php';

function tinhTong($conn, $cart) {
    $tong = 0;
    if (!empty($cart)) {
        $ids = array_keys($cart);
        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $stmt = $conn->prepare("SELECT MaSach, GiaBan, GiaUuDai FROM sach WHERE MaSach IN ($placeholders)");
        $stmt->bind_param(str_repeat('s', count($ids)), ...$ids);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $gia = ($row['GiaUuDai'] && $row['GiaUuDai'] < $row['GiaBan']) ? $row['GiaUuDai'] : $row['GiaBan'];
            $tong += $gia * $cart[$row['MaSach']];
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
            <?php
            $fields = [
                ['label' => 'Họ tên', 'type' => 'text', 'name' => 'ten'],
                ['label' => 'Địa chỉ', 'type' => 'text', 'name' => 'diachi'],
                ['label' => 'Điện thoại', 'type' => 'text', 'name' => 'sdt'],
                ['label' => 'Email', 'type' => 'email', 'name' => 'email', 'required' => false],
            ];
            foreach ($fields as $f) {
                $required = isset($f['required']) && !$f['required'] ? '' : 'required';
                echo "<div class='form-group'>
                        <label>{$f['label']}</label>
                        <input type='{$f['type']}' name='{$f['name']}' class='form-control' $required>
                      </div>";
            }
            ?>
            <h4>Hình thức thanh toán</h4>
            <?php
            $payments = ['1' => 'Tiền mặt', '2' => 'Chuyển khoản', '3' => 'Ship COD'];
            foreach ($payments as $val => $label) {
                $checked = $val == '1' ? 'checked' : '';
                echo "<div class='form-check'>
                        <input class='form-check-input' type='radio' name='pttt' value='$val' $checked>
                        <label class='form-check-label'>$label</label>
                      </div>";
            }
            ?>
        </div>

        <div class="right">
            <h4>Giỏ hàng</h4>
            <?php
            if (empty($_SESSION['cart'])) {
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
                    $thanhTien = $gia * $soLuong;
                    $tong += $thanhTien;
                    echo "<div class='product-summary'>
                            <div>{$row['TenSach']}</div>
                            <small>$gia × $soLuong = " . number_format($thanhTien, 0, ',', '.') . "₫</small>
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