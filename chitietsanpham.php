<?php
session_start();
require_once 'admin/connect.php';
include_once 'header.php';


$maSach = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($maSach <= 0) {
    header('Location: index.php');
    exit;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $id = (int)$_POST['product_id'];
    if (!isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id] = 0;
    }
    $_SESSION['cart'][$id]++;
    header("Location: giohang.php");
    exit;
}


$sql = "
    SELECT s.*, l.TenLoai 
    FROM sach s 
    LEFT JOIN loai_sach l ON s.MaLoai = l.MaLoai 
    WHERE s.MaSach = $maSach
";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    $giaBan = $row['GiaBan'];
    $giaUuDai = $row['GiaUuDai'];
    $giaGoc = number_format($giaBan, 0, ',', '.');
    $giaKM = number_format($giaUuDai, 0, ',', '.');
    $discountPercent = 0;

    if ($giaUuDai > 0 && $giaUuDai < $giaBan) {
        $discountPercent = round(100 - ($giaUuDai / $giaBan * 100));
    } else {
        $giaKM = $giaGoc;
    }

    $product_image = htmlspecialchars($row['HinhAnh']);
    $maLoai = (int)$row['MaLoai'];
    ?>

    <div class="container product-section">
        <div class="row">
            <div class="col-md-5">
                <div class="product-image">
                   <a href="danhsachsp.php?MaLoai=<?= $maLoai ?>" class="btn btn-default">← Quay về danh sách</a>


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
                    <input type="hidden" name="product_id" value="<?= $maSach ?>">
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

include_once 'footer.php';
?>
