<?php
    session_start();
    if(!isset($_SESSION['khach_hang'])) {
        header("Location: dang_nhap.php");
        exit();
    }

    include_once "header.php";
    require_once "connect.php";

    $MaKH = $_SESSION['khach_hang']['MaKH'];

    if(isset($_POST['submit'])) {
        $matkhau_cu = $_POST['matkhau_cu'];
        $matkhau_moi = $_POST['matkhau_moi'];
        $matkhau_moi2 = $_POST['matkhau_moi2'];

        if($matkhau_moi != $matkhau_moi2) {
          echo"Mật khẩu mới không trùng khớp.";
        } else {

            $sql_check = "SELECT MatKhau FROM khach_hang WHERE MaKH = $MaKH";
            $query_check = mysqli_query($conn, $sql_check);
            $row_check = mysqli_fetch_assoc($query_check);

            if(md5($matkhau_cu) != $row_check['MatKhau']) {
                echo "Mật khẩu cũ không đúng.";
            } else {
                $matkhau_moi_mahoa = md5($matkhau_moi);
                $sql_update = "UPDATE khach_hang SET MatKhau = '$matkhau_moi_mahoa' WHERE MaKH = $MaKH";
                $query_update = mysqli_query($conn, $sql_update);

                if($query_update) {
                    echo "Đổi mật khẩu thành công!";
                } else {
                    echo "Có lỗi khi đổi mật khẩu.";
                }
            }
        }
    }
?>

<div class="container">
    <h1>Đổi mật khẩu</h1>
    <form action="" method="post" class="form">
        <div class="input-box">
          <label>Mật khẩu cũ</label>
          <input type="password" name="matkhau_cu" required/>
        </div>
        <div class="input-box">
          <label>Mật khẩu mới</label>
          <input type="password" name="matkhau_moi" required/>
        </div>
        <div class="input-box">
          <label>Nhập lại mật khẩu mới</label>
          <input type="password" name="matkhau_moi2" required/>
        </div>
        <button type="submit" name="submit">Đổi mật khẩu</button>
    </form>
</div>

<?php include_once "footer.php";?>