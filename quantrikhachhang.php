<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Quản lý sản phẩm</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/quantri.css">
</head>

<body>

    <div class="container-fluid content">
        <div class="logout">
            <img src="https://cdn-icons-png.flaticon.com/512/126/126467.png" alt="logout" width="20" height="20">
            <a href="login.php">  <span>Đăng xuất</span></a>
        </div>

        <div class="sidebar">
            <div class="sidebar-logo">
              <img src="logo.png" alt="Logo" class="img-responsive">
            </div>
            <ul class="nav nav-pills nav-stacked">
            <li><a href="quantrisanpham.php">Sản phẩm</a></li>
                <li><a href="quantrikhachhang.php">Khách hàng</a></li>
                <li><a href="quantrihoadon.php">Hóa đơn</a></li><li>
            </ul>
          </div>

            <div class="main-content">
                <h3>KHÁCH HÀNG</h3>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>mã khách</th>
                                <th>tên khách</th>
                                <th>email</th>
                                <th>mật khẩu</th>
                                <th>điện thoại</th>
                                <th>địa chỉ</th>
                                <th>ngày tạo</th>
                                <th>trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                           <td>001</td>
                           <td>Hoàng</td>
                           <td>hoangtest@gmail.com</td>
                           <td>hoanghoanghoang1231323</td>
                           <td>012345678</td>
                           <td>hà nội </td>
                           <td>24/4/2025</td>
                           <td>hoạt động</td>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>