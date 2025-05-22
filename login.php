<?php
session_start();
require_once "admin/connect.php";

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $pass = $_POST["password"];

    // Check admin
    $sql_admin = "SELECT * FROM quan_tri WHERE (Email='$username' OR Tai_khoan='$username') AND Mat_khau='$pass' AND TrangThai=1";
    $result_admin = mysqli_query($conn, $sql_admin);

    if (mysqli_num_rows($result_admin) > 0) {
        $_SESSION['admin'] = $username;
        header("Location: admin/quantrisanpham.php");
        exit();
    } else {
        // Check khách hàng
        $sql_user = "SELECT * FROM khach_hang WHERE (Email='$username' OR TenDN='$username') AND MatKhau='$pass' AND TrangThai=1";
        $result_user = mysqli_query($conn, $sql_user);

        if (mysqli_num_rows($result_user) > 0) {
            $row = mysqli_fetch_assoc($result_user);
            $_SESSION['user'] = $row['HoTen'];      
            $_SESSION['HoTen'] = $row['HoTen'];     
            $_SESSION['MaKH'] = $row['MaKH'];       
            header("Location: index.php");
            exit();
        } else {
            echo "<script>alert('Sai tài khoản hoặc mật khẩu');</script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Đăng Nhập</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link href="../css/login.css" rel="stylesheet">

</head>
<body>

<div class="khung-form">
  <h3>Đăng Nhập</h3>

  <form method="POST">
    <input type="text" class="form-control" name="username" placeholder="Nhập tên tài khoản hoặc email">

    <div class="form-group">
      <input type="password" id="password" class="form-control" name="password" placeholder="Nhập mật khẩu">
    </div>

    <a href="#" class="forgot">QUÊN MẬT KHẨU</a>
    <div class="text-center">
      <button type="button" class="btn btn-dangky"><a href="dangky.php">đăng ký</a></button>
      <button type="submit" name="submit" class="btn btn-dangnhap">đăng nhập</button>

    </div>
    <div class="text-center">
      <button type="button" class="btn btn-primary"><a href="index.php">Quay lại Trang Chủ</a></button>
    </div>
  </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
