<?php
session_start();
require_once 'admin/connect.php';
include 'header.php';

$tukhoa = '';
$results = [];

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['q'])) {
        $tukhoa = trim($_GET['q']);

        if ($tukhoa !== '') {
           
            $Liketukhoa = '%' . $tukhoa . '%';

           
            $sql = "SELECT MaSach, TenSach, GiaBan, GiaUuDai, HinhAnh FROM sach WHERE TenSach LIKE '$Liketukhoa'";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $results[] = $row;
                }
            } else {
                echo "<div class='alert alert-danger'>Lỗi truy vấn: " . mysqli_error($conn) . "</div>";
            }
        }
    }
}
?>

<div class="container product-list">
    <h2 class="category-title">Kết quả tìm kiếm cho:
        <strong><?= $tukhoa ?></strong>
    </h2>

    <?php if (count($results) === 0) : ?>
        <p>Không tìm thấy kết quả nào.</p>
    <?php else : ?>
        <div class="row">
            <?php foreach ($results as $row) : ?>
                <?php
                $maSach = $row['MaSach'];
                $tenSach = $row['TenSach'];
                $giaBan = number_format($row['GiaBan'], 0, ',', '.');
                $giaUuDai = number_format($row['GiaUuDai'], 0, ',', '.');
                $hinhAnh = $row['HinhAnh'];
                $gia = ($row['GiaUuDai'] > 0 && $row['GiaUuDai'] < $row['GiaBan']) ? $row['GiaUuDai'] : $row['GiaBan'];
                ?>
                <div class="col-md-3 product-item">
                    <div class="card">
                        <img src="<?= $hinhAnh ?>" alt="<?= $tenSach ?>" class="img-responsive">
                        <div class="card-body">
                            <div class="card-title"><?= $tenSach ?></div>
                            <div class="card-price">
                                <?php if ($row["GiaUuDai"] && $row["GiaUuDai"] < $row["GiaBan"]) : ?>
                                    <span class="original-price"><?= $giaBan ?>₫</span>
                                    <span class="discount-price"><?= $giaUuDai ?>₫</span>
                                <?php else : ?>
                                    <span class="discount-price"><?= $giaBan ?>₫</span>
                                <?php endif; ?>
                            </div>
                            <a href="chitietsanpham.php?id=<?= $maSach ?>" class="btn btn-buy">Xem chi tiết</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<?php include 'footer.php'; ?>
