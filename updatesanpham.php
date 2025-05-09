<?php
include_once 'header-admin.php';


$maSach = $_GET['MaSach'] ?? '';
$sql = "SELECT * FROM sach WHERE MaSach = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $maSach);
$stmt->execute();
$result = $stmt->get_result();
$sach = $result->fetch_assoc();
$stmt->close();
?>

<div class="container mt-5">
    <h3>Sửa Sách</h3>
    <form action="xulyupdatesanpham.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="MaSach" value="<?php echo $sach['MaSach']; ?>">

        <div class="form-group">
            <label>Giá nhập</label>
            <input type="number" name="GiaNhap" class="form-control" value="<?php echo $sach['GiaNhap']; ?>" required>
        </div>

        <div class="form-group">
            <label>Giá bán</label>
            <input type="number" name="GiaBan" class="form-control" value="<?php echo $sach['GiaBan']; ?>" required>
        </div>

        <div class="form-group">
            <label>Giá ưu đãi</label>
            <input type="number" name="GiaUuDai" class="form-control" value="<?php echo $sach['GiaUuDai']; ?>">
        </div>

        <div class="form-group">
            <label>Số lượng</label>
            <input type="number" name="SoLuong" class="form-control" value="<?php echo $sach['SoLuong']; ?>" required>
        </div>

        <div class="form-group">
            <label>Nhà cung cấp</label>
            <input type="text" name="NhaCungCap" class="form-control" value="<?php echo $sach['NhaCungCap']; ?>">
        </div>

        <div class="form-group">
            <label>Tóm tắt nội dung</label>
            <textarea name="MoTa" class="form-control" rows="3"><?php echo $sach['MoTa']; ?></textarea>
        </div>

        <div class="form-group">
            <label>Ảnh hiện tại</label><br>
            <img src="<?php echo '../../image/' . basename($sach['HinhAnh']);   ?>" style="width: 100px;"><br><br>
            <label>Thay ảnh mới (nếu muốn)</label>  
            <input type="file" name="HinhAnh" class="form-control-file">
        </div>

        <div class="form-group">
            <label>Trạng thái</label>
            <select name="TrangThai" class="form-control">
                <option value="1" <?php if ($sach['TrangThai'] == 1) echo 'selected'; ?>>Còn hàng</option>
                <option value="0" <?php if ($sach['TrangThai'] == 0) echo 'selected'; ?>>Hết hàng</option>
                <option value="2" <?php if ($sach['TrangThai'] == 2) echo 'selected'; ?>>Ngừng kinh doanh</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
        <a href="quantrisanpham.php" class="btn btn-secondary">Hủy</a>
    </form>
</div>

<?php include_once 'footer-admin.php'; ?>
