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

<!-- Navbar -->
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.html">
        <img src="../image/logo.png" alt="logo" style="height:30px; display:inline;"> SHARK BookStore
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

      <!-- Thể loại Dropdown -->
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            Thể loại <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="danhsachsp.html">Light Novel</a></li>
            <li><a href="danhsachsp.html">Manga</a></li>
            <li><a href="danhsachsp.html">Ngôn tình / Học đường</a></li>
            <li><a href="danhsachsp.html">Kinh dị</a></li>
            <li><a href="danhsachsp.html">Truyện thiếu nhi</a></li>
            <li><a href="danhsachsp.html">Phiêu lưu / Kỳ ảo</a></li>
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

<!-- Nội dung chính -->
<div class="container py-5">
  <h2 class="mb-4">Lịch Sử Đơn Hàng</h2>
  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>Mã Đơn</th>
        <th>Ngày Đặt</th>
        <th>Tổng Tiền</th>
        <th>Trạng Thái</th>
        <th>Chi Tiết</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1920193006117</td>
        <td>2025-5-30</td>
        <td>250.000đ</td>
        <td><span class="label label-success">Đang giao</span></td>
        <td><a href="chitietsanpham.php?id=1920193006117" class="btn btn-xs btn-primary">Xem</a></td>
      </tr>
      <tr>
        <td>8934974209072</td>
        <td>2025-5-30</td>
        <td>40.800đ</td>
        <td><span class="label label-warning">Đang giao</span></td>
        <td><a href="chitietsanpham.php?id=8934974209072" class="btn btn-xs btn-primary">Xem</a></td>
      </tr>
    
    </tbody>
  </table>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<footer>
  <div>© 2025 SHARK BookStore - All Rights Reserved.</div>
</footer>

</body>
</html>
