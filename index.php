<?php
require_once("admin/connect.php");
include("header.php");
?>

<div class="banner" style="background-image: url('https://www.shutterstock.com/shutterstock/photos/2591862727/display_1500/stock-vector-bookshelf-with-classic-novels-for-reading-book-spines-covers-standing-upright-in-row-fiction-2591862727.jpg'); background-size: cover; background-position: center; height: 300px;"></div>

<div class="container product-list">
    <h2 class="category-title">Danh sách sản phẩm</h2>
    <div class="row">
        <?php
        $sql = "SELECT MaSach, TenSach, GiaBan, GiaUuDai, HinhAnh FROM sach WHERE TrangThai = 1 LIMIT 20";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $giaBan = number_format($row["GiaBan"], 0, ',', '.');
                $giaUuDai = $row["GiaUuDai"] ? number_format($row["GiaUuDai"], 0, ',', '.') : null;
                $hinhAnh = htmlspecialchars($row["HinhAnh"]);
                $tenSach = htmlspecialchars($row["TenSach"]);
                $maSach = urlencode(trim($row["MaSach"]));
                ?>
                <div class="product-item">
                    <div class="card">
                        <img src="<?= $hinhAnh ?>" alt="<?= $tenSach ?>">
                        <div class="card-body">
                            <div class="card-title"><?= $tenSach ?></div>
                            <div class="card-price">
                                <?php if ($row["GiaUuDai"] && $row["GiaUuDai"] < $row["GiaBan"]) : ?>
                                    <span class="original-price"><?= $giaBan ?>₫</span>
                                    <span class="discount-price"><?= $giaUuDai ?>₫</span>
                                <?php else: ?>
                                    <span class="discount-price"><?= $giaBan ?>₫</span>
                                <?php endif; ?>
                            </div>
                            <a href="chitietsanpham.php?id=<?= $maSach ?>" class="btn-buy">Mua</a>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p>Không có sản phẩm nào.</p>";
        }

        mysqli_close($conn);
        ?>
    </div>
</div>

<?php include("footer.php"); ?>