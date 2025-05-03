<?php
require_once "connect.php";

if (!isset($_GET['id'])) {
    echo "Thiếu mã khách hàng!";
    exit;
}

$id = $_GET['id'];
$sql = "SELECT HoTen, TrangThai FROM khach_hang WHERE MaKH = $id";
$result = mysqli_query($conn, $sql);

if (!$result || mysqli_num_rows($result) != 1) {
    echo "Không tìm thấy khách hàng!";
    exit;
}

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Sửa trạng thái khách</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body class="p-4">
  <div class="container">
    <h4>Sửa trạng thái cho khách: <strong><?= $row['HoTen'] ?></strong></h4>

    <form action="xuly-update-trangthai.php" method="POST">
      <input type="hidden" name="id" value="<?= $id ?>">

      <div class="mb-3">
        <label class="form-label">Trạng thái</label>
        <select name="trangthai" class="form-select">
          <option value="1" <?= $row['TrangThai'] == 1 ? 'selected' : '' ?>>Hoạt động</option>
          <option value="0" <?= $row['TrangThai'] == 0 ? 'selected' : '' ?>>Khóa</option>
        </select>
      </div>

      <button type="submit" class="btn btn-primary">Lưu</button>
      <a href="danhsach-khachhang.php" class="btn btn-secondary">Hủy</a>
    </form>
  </div>
</body>
</html>
