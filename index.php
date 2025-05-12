<?php 
include_once 'header.php';
include_once 'connect.php'; // file này chứa kết nối CSDL

// Lấy sách mới nhất (giới hạn 8 cuốn)
$sql = "SELECT s.MaSach, s.TenSach, s.GiaBan, ha.Ten_file_anh 
        FROM sach s 
        LEFT JOIN hinh_anh ha ON s.MaSach = ha.MaSach AND ha.TrangThai = 1 
        ORDER BY s.NgayCapNhat DESC 
        LIMIT 8";
$result = mysqli_query($conn, $sql);
?>

<div class="banner"></div>

<div class="container">
  <h3 class="text-center">Sách Mới</h3>
  <div class="row">
    <?php while($row = mysqli_fetch_assoc($result)) { ?>
      <div class="col-sm-6 col-md-3">
        <div class="panel panel-default panel-book text-center">
          <div class="panel-body">
            <img src="images/<?php echo htmlspecialchars($row['Ten_file_anh'] ?? 'no-image.jpg'); ?>" 
                 class="img-responsive center-block" 
                 alt="<?php echo htmlspecialchars($row['TenSach']); ?>">
            <h4><?php echo htmlspecialchars($row['TenSach']); ?></h4>
            <p class="text-danger"><?php echo number_format($row['GiaBan'], 0, ',', '.') . 'đ'; ?></p>
            <button class="btn btn-buy">Mua ngay</button>
            <a href="chitiet.php?MaSach=<?php echo $row['MaSach']; ?>" class="btn btn-default">Xem chi tiết</a>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>

<?php 
include_once 'footer.php';
?>
