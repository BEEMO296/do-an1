<?php
require_once 'connect.php';
$queryLoai = "SELECT MaLoai, TenLoai FROM loai_sach WHERE TrangThai = 1";
$resultLoai = mysqli_query($conn, $queryLoai);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Trang Chủ Bán Sách</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/index.css">
</head>
<body>
 
  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php">
          <img src="../image/logo.png" alt="SHARK BookStore"> SHARK BookStore
        </a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
          <span class="icon-bar" style="background:white;"></span>
          <span class="icon-bar" style="background:white;"></span>
          <span class="icon-bar" style="background:white;"></span>
        </button>
      </div>

      <div class="collapse navbar-collapse" id="navbar-collapse">
        <form class="navbar-form navbar-left" role="search">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Tìm kiếm sách...">
          </div>
          <button type="submit" class="btn btn-default">Tìm</button>
        </form>

        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              Thể loại <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <?php
                if (mysqli_num_rows($resultLoai) > 0) {
                    while ($row = mysqli_fetch_assoc($resultLoai)) {
                        echo '<li><a href="danhsachsp.php?MaLoai=' . $row['MaLoai'] . '">' . htmlspecialchars($row['TenLoai']) . '</a></li>';
                    }
                }
              ?>
            </ul>
          </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
          <li><a href="giohang.html">Giỏ hàng</a></li>
          <li><a href="login.php">Đăng nhập</a></li>
        </ul>
      </div>
    </div>
  </nav>
