<?php
include_once 'header.php';

$MaLoai = isset($_GET['MaLoai']) ? mysqli_real_escape_string($conn, $_GET['MaLoai']) : '';

if (!empty($MaLoai)) {
    
    $sqlLoai = "SELECT TenLoai FROM loai_sach WHERE MaLoai = '$MaLoai'";
    $resultLoai = mysqli_query($conn, $sqlLoai);
    $loai = mysqli_fetch_assoc($resultLoai);
    $tenLoai = $loai['TenLoai'];
    

    $sql = "SELECT * FROM sach WHERE MaLoai = '$MaLoai'";
    $resultSanPham = mysqli_query($conn, $sql);
}
?>

<div class="container product-list">
  <h2 class="category-title">Danh Sách Sản Phẩm - Thể Loại: <?php echo htmlspecialchars($tenLoai); ?></h2>
  <div class="row">
    <?php 
    while ($row = mysqli_fetch_assoc($resultSanPham)) { 
    ?>
      <div class="product-item">
        <div class="card">
          <img src="<?php echo $row['HinhAnh']; ?>" alt="<?php echo htmlspecialchars($row['TenSach']); ?>" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title"><?php echo htmlspecialchars($row['TenSach']); ?></h5>
            <p class="card-price">
              <?php 
              if (!empty($row['GiaUuDai']) && $row['GiaUuDai'] > 0) { 
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
            <a href="chitietsanpham.php?id=<?php echo $row['MaSach']; ?>" class="btn btn-buy">Xem chi tiết</a>

          </div>
        </div>
      </div>
    <?php 
    } 
    ?>
  </div>
</div>

<?php
include_once 'footer.php';
?>