<?php
session_start();
require_once "connect.php";

if (isset($_POST['submit'])) {
    $makh = $_SESSION['MaKH'];
    $hoten = $_POST['HoTen'];
    $email = $_POST['Email'];
    $sdt = $_POST['SDT'];
    $ngaysinh = $_POST['NgaySinh'];
    $gioitinh = $_POST['GioiTinh'];
    $tendn = $_POST['TenDN'];
    $matKhauMoi = $_POST['MatKhauMoi'];

    if (!empty($matKhauMoi)) {
        $sql = "UPDATE khach_hang SET 
            HoTen = '$hoten',
            Email = '$email',
            DienThoai = '$sdt',
            NgaySinh = '$ngaysinh',
            GioiTinh = $gioitinh,
            TenDN = '$tendn',
            MatKhau = '$matKhauMoi'
            WHERE MaKH = $makh";
    } else {
        $sql = "UPDATE khach_hang SET 
            HoTen = '$hoten',
            Email = '$email',
            DienThoai = '$sdt',
            NgaySinh = '$ngaysinh',
            GioiTinh = $gioitinh,
            TenDN = '$tendn'
            WHERE MaKH = $makh";
    }

    if (mysqli_query($conn, $sql)) {
        $_SESSION['HoTen'] = $hoten;
        echo "<script>alert('Cập nhật thành công'); window.location='../index.php';</script>";
    } else {
        echo "Lỗi cập nhật: " . mysqli_error($conn);
    }
}

?>
