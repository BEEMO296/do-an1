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
                <img src="../image/logo.png" alt="Logo" class="img-responsive">
            </div>
            <ul class="nav nav-pills nav-stacked">
                <li><a href="quantrisanpham.php">Sản phẩm</a></li>
                <li><a href="quantrikhachhang.php">Khách hàng</a></li>
                <li><a href="quantrihoadon.php">Hóa đơn</a></li><li>
            </ul>
        </div>

        <div class="main-content">
            <h3>HÓA ĐƠN</h3>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>mã hóa đơn</th>
                            <th>ngày lập</th>
                            <th>email</th>
                            <th>họ tên người nhận</th>
                            <th>địa chỉ giao hàng</th>
                            <th>SDT giao hàng</th>
                            <th>mã khách hàng</th>
                            <th>mã ptvc</th>
                            <th>mã pttt</th>
                            <th>trạng thái</th>
                            <th colspan="2">hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td>112</td>
                        <td>24/4/2025</td>
                        <td>hoangtest@gmail.com</td>
                        <td>Hoàng</td>
                        <td>Hà Nội</td>
                        <td>0123456789 </td>
                        <td>456</td>
                        <td>12</td>
                        <td>13</td>
                        <td>giao thành công</td>
                        <td><button class="btn btn-info btn-xs">Sửa</button></td>
                                <td><button class="btn btn-danger btn-xs">Xóa</button></td>
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