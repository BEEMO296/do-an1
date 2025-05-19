<?php
    session_start();
    if(!isset($_SESSION['khach_hang'])) {
        header("Location: login.php");
        exit();
    }

    include_once "header.php";
    require_once "connect.php";

    $MaKH = $_SESSION['khach_hang']['MaKH'];

    $sql = "SELECT * FROM khach_hang WHERE MaKH = $MaKH";
    $query = mysqli_query($conn, $sql);
    $khach_hang = mysqli_fetch_assoc($query);
?>

<div class="container">
    <h1>Thông tin cá nhân</h1>
    <form action="capnhat_profile.php" method="post" class="form">
        <div class="input-box">
          <label>Họ tên</label>
          <input type="text" name="hoten" value="<?php echo $khach_hang['hoten']; ?>" readonly/>
        </div>
        <div class="input-box">
          <label>Email</label>
          <input type="text" name="email" value="<?php echo $khach_hang['email']; ?>" readonly/>
        </div>
        <div class="input-box">
          <label>Số điện thoại</label>
          <input type="text" name="DienThoai" value="<?php echo $khach_hang['DienThoai']; ?>" />
        </div>
        <button type="submit">Cập nhật thông tin</button>
    </form>
    <a href="doimatkhau_khachhang.php">Đổi mật khẩu</a>
</div>

<?php include_once "footer.php";?>