<!DOCTYPE html>
<html>
<head>
    <title>Form Đăng Ký</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        .khung-form {
            width: 400px;
            margin: 50px auto;
            border: 1px solid #ccc;
            padding: 25px;
            border-radius: 10px;
        }
        .input-gioitinh {
            margin-top: 2px;
        }
        
    </style>
</head>
<body>

<div class="khung-form">
    <h4>Tạo tài khoản mới</h4>
    <p>Nhanh chóng và dễ dàng.</p>
    <form action="xulydangky.php" method="post">
    <div class="form-group">
        <div class="row">
            <div class="col-xs-6"><input type="text" name="ho" class="form-control" placeholder="HỌ"></div>
            <div class="col-xs-6"><input type="text" name="ten" class="form-control" placeholder="TÊN"></div>
        </div>
    </div>
    <div class="form-group">
        <input type="email" name="email" class="form-control" placeholder="EMAIL">
    </div>
    <div class="form-group">
        <input type="text" name="username" class="form-control" placeholder="TÊN ĐĂNG NHẬP">
    </div>
    <div class="form-group">
        <input type="password" name="password" class="form-control" placeholder="MẬT KHẨU">
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-xs-4">
                <select name="ngay" class="form-control">
                    <option>Ngày</option>
                    <script> for (var i = 1; i <= 31; i++) document.write('<option>' + i + '</option>'); </script>
                </select>
            </div>
            <div class="col-xs-4">
                <select name="thang" class="form-control">
                    <option>Tháng</option>
                    <script> for (var i = 1; i <= 12; i++) document.write('<option>' + i + '</option>'); </script>
                </select>
            </div>
            <div class="col-xs-4">
                <select name="nam" class="form-control">
                    <option>Năm</option>
                    <script> for (var i = 1980; i <= 2025; i++) document.write('<option>' + i + '</option>'); </script>
                </select>
            </div>
        </div>
    </div>
    <div class="form-group">
        <input type="tel" name="sdt" class="form-control" placeholder="Số điện thoại">
    </div>
    <div class="form-group">
        <label>Giới tính:</label><br>
        <label><input type="radio" name="gender" value="1"> Nam</label>
        <label><input type="radio" name="gender" value="0"> Nữ</label>
        <label><input type="radio" name="gender" value="2"> Khác</label>
    </div>
    <button type="submit" name="submit" class="btn btn-danger btn-block">Đăng ký</button>
</form>

</div>

</body>
</html>