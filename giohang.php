<?php
session_start();
require_once 'admin/connect.php';
include 'header.php';


if (isset($_SESSION['MaKH']) && (empty($_SESSION['cart']) || !isset($_SESSION['cart']))) {
    $MaKH = (int)$_SESSION['MaKH'];
    $res = $conn->query("SELECT MaGio FROM gio_hang WHERE MaKH = $MaKH");
    if ($res && $res->num_rows > 0) {
        $row = $res->fetch_assoc();
        $MaGio = (int)$row['MaGio'];

        $res2 = $conn->query("SELECT MaSach, SoLuong FROM gio_hang_ct WHERE MaGio = $MaGio");
        $_SESSION['cart'] = [];
        while ($row2 = $res2->fetch_assoc()) {
            $_SESSION['cart'][$row2['MaSach']] = (int)$row2['SoLuong'];
        }
    }
}

//xử lý tăng giảm
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['product_id'] ?? '';

    // Tăng
    if (isset($_POST['increase']) && $id !== '') {
        $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + 1;
    }

    // Giảm
    elseif (isset($_POST['decrease']) && $id !== '') {
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]--;
            if ($_SESSION['cart'][$id] <= 0) {
                unset($_SESSION['cart'][$id]);
            }
        }
    }

   
    elseif (isset($_POST['remove']) && $id !== '') {
        unset($_SESSION['cart'][$id]);

        
        if (empty($_SESSION['cart']) && isset($_SESSION['MaKH'])) {
            header("Location: luu-giohang.php");
            exit;
        }
    }

    elseif (isset($_POST['save_cart'])) {
        if (!isset($_SESSION['MaKH'])) {
            echo "<div class='alert alert-warning'>Bạn cần đăng nhập để lưu giỏ hàng.</div>";
        } else {
            $MaKH = (int)$_SESSION['MaKH'];
            $res = $conn->query("SELECT MaGio FROM gio_hang WHERE MaKH = $MaKH");
            if ($res && $res->num_rows > 0) {
                $row = $res->fetch_assoc();
                $MaGio = (int)$row['MaGio'];
                $conn->query("DELETE FROM gio_hang_ct WHERE MaGio = $MaGio");
            } else {
                $conn->query("INSERT INTO gio_hang (MaKH) VALUES ($MaKH)");
                $MaGio = $conn->insert_id;
            }

            foreach ($_SESSION['cart'] as $MaSach => $SoLuong) {
                $MaSachEsc = (int)$MaSach;
                $SoLuongInt = (int)$SoLuong;
                $conn->query("INSERT INTO gio_hang_ct (MaGio, MaSach, SoLuong) VALUES ($MaGio, $MaSachEsc, $SoLuongInt)");
            }
            echo "<div class='alert alert-success'>Đã lưu giỏ hàng thành công.</div>";
        }
    }

    // Sau mỗi hành động đều quay lại trang chính
    header("Location: giohang.php");
    exit;
}

?>

<div class="container product-list">
    <h2 class="category-title">Giỏ hàng của bạn</h2>

    <?php if (empty($_SESSION['cart'])): ?>
        <p>Giỏ hàng đang trống.</p>
    <?php else:
        $ids = array_keys($_SESSION['cart']);
        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $stmt = $conn->prepare("SELECT MaSach, TenSach, GiaBan, GiaUuDai, HinhAnh FROM sach WHERE MaSach IN ($placeholders)");
        $types = str_repeat('s', count($ids));
        $stmt->bind_param($types, ...$ids);
        $stmt->execute();
        $result = $stmt->get_result();
        $tong = 0;
    ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Hình ảnh</th>
                <th>Tên sách</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $row):
                $id = $row['MaSach'];
                $qty = $_SESSION['cart'][$id];
                $gia = ($row['GiaUuDai'] && $row['GiaUuDai'] < $row['GiaBan']) ? $row['GiaUuDai'] : $row['GiaBan'];
                $thanhTien = $gia * $qty;
                $tong += $thanhTien;
            ?>
            <tr>
                <td style="width: 100px"><img src="<?= $row['HinhAnh'] ?>" class="img-fluid" style="max-height: 100px;"></td>
                <td><?= $row['TenSach'] ?></td>
                <td><?= number_format($gia, 0, ',', '.') ?>₫</td>
                <td>
                    <form method="post" style="display:inline; margin-right: 5px;">
                        <input type="hidden" name="product_id" value="<?= $id ?>">
                        <button type="submit" name="decrease" class="btn btn-sm btn-secondary">-</button>
                    </form>
                    <?= $qty ?>
                    <form method="post" style="display:inline; margin-left: 5px;">
                        <input type="hidden" name="product_id" value="<?= $id ?>">
                        <button type="submit" name="increase" class="btn btn-sm btn-secondary">+</button>
                    </form>
                </td>
                <td><?= number_format($thanhTien, 0, ',', '.') ?>₫</td>
                <td>
                    <form method="post" onsubmit="return confirm('Bạn có chắc muốn xóa sản phẩm này?');">
                        <input type="hidden" name="product_id" value="<?= $id ?>">
                        <button type="submit" name="remove" class="btn btn-sm btn-danger">Xóa</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="4" class="text-end"><strong>Tổng cộng:</strong></td>
                <td><strong><?= number_format($tong, 0, ',', '.') ?>₫</strong></td>
                <td></td>
            </tr>
        </tbody>
    </table>

    <div class="row" style="margin-top: 20px;">
    <div class="col-xs-6 text-left">
        <form method="post" action="luu-giohang.php">
            <input type="hidden" name="save_cart" value="1">
            <button type="submit" class="btn btn-default">Lưu giỏ hàng</button>
        </form>
    </div>
    <div class="col-xs-6 text-right">
        <a href="thanhtoan.php" class="btn btn-primary">Thanh toán</a>
    </div>
</div>


    <?php endif; ?>

    <?php if (isset($_GET['saved'])): ?>
    <div class="alert alert-success">Đã lưu giỏ hàng vào tài khoản của bạn.</div>
    <?php endif; ?>
</div>

<?php include 'footer.php'; ?>
