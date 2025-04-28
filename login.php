<?php
session_start();
require_once "connect.php";


if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $pass = ($_POST["password"]);


    $sql = "SELECT * FROM quan_tri WHERE (Email='$username' OR Tai_khoan='$username') AND Mat_khau='$pass'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['username'] = $username;
        header("Location: quantrisanpham.php"); 
        exit();
    } else {
        echo "<script>alert('Sai tài khoản hoặc mật khẩu');</script>";
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
      <button type="button" class="btn btn-dangky"><a href="dangky.html">đăng ký</a></button>
      <button type="submit" name="submit" class="btn btn-dangnhap">đăng nhập</button>
    </div>
  </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
