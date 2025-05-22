<?php
require_once 'admin/connect.php';
include_once 'header.php';

$product_id = isset($_GET['id']) ? $_GET['id'] : '';

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
            $discountPercent = round(100 - ($row['GiaUuDai'] / $row['GiaBan'] * 100));
            $giaKM = number_format($row['GiaUuDai'], 0, ',', '.');
        } else {
            $discountPercent = 0;
            $giaKM = $giaGoc;
        }

        $product_image = $row['HinhAnh'];

       
        ?>
        <div class="container product-section">
          <div class="row">
            <div class="col-md-5">
              
              <div class="product-image">
          <a href="danhsachsp.php?MaLoai=<?= urlencode($row['MaLoai']) ?>" class="btn btn-default" style="margin-bottom: 10px;">
         ← Quay về danh sách
        </a>
      <img src="<?php echo $product_image; ?>" class="img-responsive" alt="Sách">
        </div>

            </div>
            <div class="col-md-7 product-details">
              <h2><?php echo $row['TenSach']; ?></h2>
              <div class="product-price">
                <?php 
                echo $giaKM . " đ "; 
                if ($discountPercent > 0) {
                    echo '<small><del>' . $giaGoc . ' đ</del> -' . $discountPercent . '%</small>';
                }
                ?>
              </div>
              <div>
                <button class="btn btn-buy">Thêm vào giỏ hàng</button>
                <button class="btn btn-buy">Mua ngay</button>
              </div>

              <table class="table table-bordered details-table">
                <tbody>
                  <tr><th>Mã hàng</th><td><?php echo $row['MaSach']; ?></td></tr>
                  <tr><th>Tên Nhà Cung Cấp</th><td><?php echo $row['NhaCungCap']; ?></td></tr>
                  <tr><th>Tác giả</th><td><?php echo $row['TacGia']; ?></td></tr>
                  <tr><th>Người Dịch</th><td><?php echo $row['NguoiDich']; ?></td></tr>
                  <tr><th>NXB</th><td><?php echo $row['NhaXuatBan']; ?></td></tr>
                  <tr><th>Năm XB</th><td><?php echo $row['NamXuatBan']; ?></td></tr>
                  <tr><th>Ngôn ngữ</th><td><?php echo $row['NgonNgu']; ?></td></tr>
                  <tr><th>Số lượng</th><td><?php echo $row['SoLuong']; ?></td></tr>
                </tbody>
              </table>

              <h3>Mô tả sản phẩm</h3>
              <p style="white-space: pre-line;"><?php echo $row['MoTa']; ?></p>
            </div>
            
          </div>
        </div>
        <?php
    } else {
        echo "<div class='alert alert-warning'>Không tìm thấy sản phẩm.</div>";
        exit;
    }
    $stmt->close();
} else {
    echo "<div class='alert alert-danger'>ID sản phẩm không hợp lệ.</div>";
    exit;
}

include_once 'footer.php';
?>
