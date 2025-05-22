<?php
session_start();
if (!isset($_SESSION['MaKH'])) {
    header("Location: login.php");
    exit();
}

require_once 'admin/connect.php';

$maKH = $_SESSION['MaKH'];
$sql = "SELECT HoTen, Email, DienThoai, NgaySinh, GioiTinh, TenDN FROM khach_hang WHERE MaKH = $maKH AND TrangThai = 1";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Lỗi truy vấn: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) === 0) {
    echo "Không tìm thấy người dùng hoặc tài khoản đã bị khóa.";
    exit;
}

$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" />
  <link rel="stylesheet" href="hosonguoidung.css" />
</head>
<body>
  <div class="container" style="max-width: 600px; margin-top: 30px;">
    <h2>Thông tin cá nhân</h2>
    <form action="admin/xuly-update-khachhang.php" method="post">
      <div class="form-group">
        <label>Họ tên</label>
        <input type="text" name="HoTen" class="form-control" value="<?= htmlspecialchars($user['HoTen']) ?>" required />
      </div>

      <div class="form-group">
        <label>Email</label>
        <input type="email" name="Email" class="form-control" value="<?= htmlspecialchars($user['Email']) ?>" required />
      </div>

      <div class="form-group">
        <label>Số điện thoại</label>
        <input type="text" name="SDT" class="form-control" value="<?= htmlspecialchars($user['DienThoai']) ?>" />
      </div>

      <div class="form-group">
        <label>Ngày sinh</label>
        <input type="date" name="NgaySinh" class="form-control" value="<?= htmlspecialchars($user['NgaySinh']) ?>" />
      </div>

      <div class="form-group">
        <label>Giới tính</label>
        <select name="GioiTinh" class="form-control" required>
          <option value="1" <?= $user['GioiTinh'] === 'Nam' ? 'selected' : '' ?>>Nam</option>
          <option value="0" <?= $user['GioiTinh'] === 'Nữ' ? 'selected' : '' ?>>Nữ</option>
          <option value="2" <?= $user['GioiTinh'] === 'Khác' ? 'selected' : '' ?>>Khác</option>
        </select>
      </div>

      <div class="form-group">
        <label>Tên đăng nhập</label>
        <input type="text" name="TenDN" class="form-control" value="<?= htmlspecialchars($user['TenDN']) ?>" required />
      </div>

      <div class="form-group">
        <label>Mật khẩu mới (để trống nếu không đổi)</label>
        <input type="password" name="MatKhauMoi" class="form-control" placeholder="Mật khẩu mới" />
      </div>

      <button type="submit" name="submit" class="btn btn-primary">Lưu thông tin</button>
     
    </form>
    
     <form action="admin/khoa-tai-khoan.php" method="post" onsubmit="return confirm('Bạn có chắc chắn muốn khóa tài khoản không?');">
  <button type="submit" name="khoa_tai_khoan" class="btn btn-danger">Khóa tài khoản</button>
</form>
  </div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
