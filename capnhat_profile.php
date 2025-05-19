<?php
session_start();
include "connect.php";

if (!isset($_SESSION['MaKH'])) {
    header("Location: dangnhap.php");
    exit();
}

$MaKH = $_SESSION['MaKH'];
$thongbao = "";

// Xử lý cập nhật
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $HoTen = $_POST["HoTen"];
    $Email = $_POST["Email"];
    $DienThoai = $_POST["DienThoai"];
    $DiaChi = $_POST["DiaChi"];

    $sql = "UPDATE khach_hang SET HoTen='$HoTen', Email='$Email', DienThoai='$DienThoai', DiaChi='$DiaChi' WHERE MaKH=$MaKH";
    if (mysqli_query($conn, $sql)) {
        $thongbao = "Cập nhật thành công!";
    } else {
        $thongbao = "Có lỗi xảy ra!";
    }
}

// Lấy thông tin khách hàng
$sql = "SELECT HoTen, Email, DienThoai, DiaChi FROM khach_hang WHERE MaKH=$MaKH";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
?>

<h2>Cập nhật thông tin</h2>
<p><?= $thongbao ?></p>
<form method="post">
    Họ tên: <input type="text" name="HoTen" value="<?= $data['HoTen'] ?>"><br>
    Email: <input type="email" name="Email" value="<?= $data['Email'] ?>"><br>
    Điện thoại: <input type="text" name="DienThoai" value="<?= $data['DienThoai'] ?>"><br>
    Địa chỉ: <input type="text" name="DiaChi" value="<?= $data['DiaChi'] ?>"><br>
    <input type="submit" value="Cập nhật">
</form>