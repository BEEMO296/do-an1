<?php
session_start();
require_once 'admin/connect.php';

if (!isset($_SESSION['MaKH']) || !isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: giohang.php");
    exit;
}

$MaKH = (int)$_SESSION['MaKH'];

// Kiểm tra giỏ hàng đã tồn tại chưa
$sql_check = "SELECT MaGio FROM gio_hang WHERE MaKH = $MaKH LIMIT 1";
$res = mysqli_query($conn, $sql_check);

if ($res && mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);
    $MaGio = (int)$row['MaGio'];
} else {
    mysqli_query($conn, "INSERT INTO gio_hang (MaKH) VALUES ($MaKH)");
    $MaGio = mysqli_insert_id($conn);
}

// Xóa chi tiết cũ
mysqli_query($conn, "DELETE FROM gio_hang_ct WHERE MaGio = $MaGio");

// Thêm lại các sản phẩm từ session
$sql_insert = "INSERT INTO gio_hang_ct (MaGio, MaSach, SoLuong) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql_insert);

foreach ($_SESSION['cart'] as $MaSach => $SoLuong) {
    mysqli_stmt_bind_param($stmt, "isi", $MaGio, $MaSach, $SoLuong);
    mysqli_stmt_execute($stmt);
}

mysqli_stmt_close($stmt);

header("Location: giohang.php?saved=1");
exit;
