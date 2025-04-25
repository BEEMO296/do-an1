<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Hồ sơ người dùng</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="../css/hosonguoidung.css">
</head>
<body>

<div class="container">
  <div class="row profile-container">

    <div class="col-sm-4">
      <div class="khung-avt">
        <img src="https://via.placeholder.com/200" alt="Avatar">
        <p>Ảnh đại diện</p>
      </div>

      <div class="link-box">
        <p>Liên kết ngoài</p>
        <a href="#" target="_blank"><span class="glyphicon glyphicon-link"></span> Facebook</a><br>
        <a href="#" target="_blank"><span class="glyphicon glyphicon-link"></span> GitHub</a>
      </div>
    </div>

    <div class="col-sm-8">
      <h3>Thông tin người dùng</h3>
      <form>
        <div class="form-group">
          <label>Họ tên</label>
          <input type="text" class="form-control" placeholder="Nhập họ tên">
        </div>

        <div class="form-group">
          <label>Email</label>
          <input type="email" class="form-control" placeholder="Nhập email">
        </div>

        <div class="form-group">
          <label>Số điện thoại</label>
          <input type="text" class="form-control" placeholder="Nhập số điện thoại">
        </div>

        <div class="form-group">
          <label>Giới thiệu bản thân</label>
          <textarea class="form-control" rows="4" placeholder="Mô tả ngắn gọn về bạn..."></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Lưu hồ sơ</button>
      </form>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>
