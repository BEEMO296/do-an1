<?php
session_start();
require_once "connect.php";

if (!isset($_SESSION['MaKH'])) {
    header("Location: ../login.php");
    exit();
}

$makh = $_SESSION['MaKH'];


$sql = "UPDATE khach_hang SET TrangThai = 0 WHERE MaKH = $makh";

if (mysqli_query($conn, $sql)) {
    session_unset();
    session_destroy();
    header("Location: ../login.php");
    exit();
} else {
    echo "<script>alert('Có lỗi xảy ra khi khóa tài khoản.'); window.history.back();</script>";
}
?>
