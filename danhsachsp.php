<?php
require_once 'admin/connect.php'; // Đảm bảo include kết nối db trước
include_once 'header.php';

$MaLoai = isset($_GET['MaLoai']) ? (int)$_GET['MaLoai'] : 0;
$tenLoai = '';

if ($MaLoai > 0) {
    
    $sqlLoai = "SELECT TenLoai FROM loai_sach WHERE MaLoai = $MaLoai";
    $resultLoai = mysqli_query($conn, $sqlLoai);
    if ($resultLoai && mysqli_num_rows($resultLoai) > 0) {
        $loai = mysqli_fetch_assoc($resultLoai);
        $tenLoai = $loai['TenLoai'];
    } else {
        $tenLoai = 'Không xác định';
    }

   
   $sql = "SELECT * FROM sach WHERE MaLoai = $MaLoai AND TrangThai = 1";

    $resultSanPham = mysqli_query($conn, $sql);
    if (!$resultSanPham) {
        die("Lỗi truy vấn sản phẩm: " . mysqli_error($conn));
    }
} else {
    die("Mã loại không hợp lệ.");
}
?>

<div class="container product-list">
  <h2 class="category-title">Danh Sách Sản Phẩm - Thể Loại: <?php echo htmlspecialchars($tenLoai); ?></h2>
  <div class="row">
    <?php 
    if ($resultSanPham && mysqli_num_rows($resultSanPham) > 0) {
        while ($row = mysqli_fetch_assoc($resultSanPham)) { 
    ?>
      <div class="product-item">
        <div class="card">
          <img src="<?php echo htmlspecialchars($row['HinhAnh']); ?>" alt="<?php echo htmlspecialchars($row['TenSach']); ?>" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title"><?php echo htmlspecialchars($row['TenSach']); ?></h5>
            <p class="card-price">
              <?php 
              if (!empty($row['GiaUuDai']) && $row['GiaUuDai'] > 0 && $row['GiaUuDai'] < $row['GiaBan']) { 
              ?>
                <span class="original-price"><?php echo number_format($row['GiaBan'], 0, ',', '.'); ?> đ</span>
                <span class="discount-price"><?php echo number_format($row['GiaUuDai'], 0, ',', '.'); ?> đ</span>
              <?php 
              } else { 
              ?>
                <span class="discount-price"><?php echo number_format($row['GiaBan'], 0, ',', '.'); ?> đ</span>
                <span class="empty-price">&nbsp;</span>
              <?php 
              } 
              ?>
            </p>
            <a href="chitietsanpham.php?id=<?php echo (int)$row['MaSach']; ?>" class="btn btn-buy">Xem chi tiết</a>
          </div>
        </div>
      </div>
    <?php 
        }
    } else {
        echo '<p>Không có sản phẩm nào trong thể loại này.</p>';
    }
    ?>
  </div>
</div>

<?php
include_once 'footer.php';
?>
