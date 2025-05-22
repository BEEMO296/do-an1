<?php
session_start();
require_once 'admin/connect.php';
include_once 'header.php';

$product_id = isset($_GET['id']) ? trim($_GET['id']) : '';

// Xử lý thêm vào giỏ hàng
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $id = $_POST['product_id'];
    $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + 1;
    header("Location: giohang.php");
    exit;
}

if (!empty($product_id)) {
    $stmt = $conn->prepare("SELECT * FROM sach WHERE MaSach = ?");
    if (!$stmt) {
        die("Lỗi prepare: " . $conn->error);
    }
    $stmt->bind_param("s", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        $giaGoc = number_format($row['GiaBan'], 0, ',', '.');
        if ($row['GiaUuDai'] > 0 && $row['GiaUuDai'] < $row['GiaBan']) {
            $giaKM = number_format($row['GiaUuDai'], 0, ',', '.');
            $discountPercent = round(100 - ($row['GiaUuDai'] / $row['GiaBan'] * 100));
        } else {
            $giaKM = $giaGoc;
            $discountPercent = 0;
        }

        $product_image = htmlspecialchars($row['HinhAnh']);
        ?>

        <div class="container product-section">
            <div class="row">
                <div class="col-md-5">
                    <div class="product-image">
                        <a href="index.php" class="btn btn-default" style="margin-bottom: 10px;">← Quay về danh sách</a>
                        <img src="<?= $product_image ?>" class="img-responsive" alt="Sách">
                    </div>
                </div>
                <div class="col-md-7 product-details">
                    <h2><?= htmlspecialchars($row['TenSach']) ?></h2>
                    <div class="product-price">
                        <?= $giaKM ?> đ
                        <?php if ($discountPercent > 0): ?>
                            <small><del><?= $giaGoc ?> đ</del> -<?= $discountPercent ?>%</small>
                        <?php endif; ?>
                    </div>

                    <form method="post" style="margin-bottom: 15px;">
                        <input type="hidden" name="product_id" value="<?= htmlspecialchars($row['MaSach']) ?>">
                        <button type="submit" name="add_to_cart" class="btn btn-buy">Thêm vào giỏ hàng</button>
                    </form>

                    <table class="table table-bordered details-table">
                        <tbody>
                            <tr><th>Mã hàng</th><td><?= $row['MaSach'] ?></td></tr>
                            <tr><th>Nhà Cung Cấp</th><td><?= $row['NhaCungCap'] ?></td></tr>
                            <tr><th>Tác giả</th><td><?= $row['TacGia'] ?></td></tr>
                            <tr><th>Người Dịch</th><td><?= $row['NguoiDich'] ?></td></tr>
                            <tr><th>NXB</th><td><?= $row['NhaXuatBan'] ?></td></tr>
                            <tr><th>Năm XB</th><td><?= $row['NamXuatBan'] ?></td></tr>
                            <tr><th>Ngôn ngữ</th><td><?= $row['NgonNgu'] ?></td></tr>
                            <tr><th>Số lượng</th><td><?= $row['SoLuong'] ?></td></tr>
                        </tbody>
                    </table>

                    <h3>Mô tả sản phẩm</h3>
                    <p style="white-space: pre-line;"><?= nl2br(htmlspecialchars($row['MoTa'])) ?></p>
                </div>
            </div>
        </div>

        <?php
    } else {
        echo "<div class='alert alert-warning'>Không tìm thấy sản phẩm.</div>";
    }

    $stmt->close();
} else {
    echo "<div class='alert alert-danger'>ID sản phẩm không hợp lệ.</div>";
}

include_once 'footer.php';