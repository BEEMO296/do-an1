<?php  
require_once 'connect.php';
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Quản lý sản phẩm</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/quantri.css">
</head>

<body>

    <div class="container-fluid content">
        <div class="logout">
            <img src="https://cdn-icons-png.flaticon.com/512/126/126467.png" alt="logout" width="20" height="20">
          <a href="login.php">  <span>Đăng xuất</span></a>
        </div>

        <div class="sidebar">
            <div class="sidebar-logo">
                <img src="../../image/logo.png" alt="Logo" class="img-responsive">
            </div>
            <ul class="nav nav-pills nav-stacked">
                <li><a href="quantrisanpham.php">Sản phẩm</a></li>
                <li><a href="quantrikhachhang.php">Khách hàng</a></li>
                <li><a href="quantrihoadon.php">Hóa đơn</a></li><li>
            </ul>
        </div>