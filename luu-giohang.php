<?php
session_start();
require_once 'admin/connect.php';

if (!isset($_SESSION['MaKH'])) {
    header("Location: giohang.php");
    exit;
}

$MaKH = (int)$_SESSION['MaKH'];


$sql_check = "SELECT MaGio FROM gio_hang WHERE MaKH = $MaKH LIMIT 1";
$res = mysqli_query($conn, $sql_check);

if ($res && mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);
    $MaGio = (int)$row['MaGio'];
} else {
    $MaGio = 0;
}


if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    if ($MaGio > 0) {

        mysqli_query($conn, "DELETE FROM gio_hang_ct WHERE MaGio = $MaGio");
        mysqli_query($conn, "DELETE FROM gio_hang WHERE MaGio = $MaGio");
    }


    unset($_SESSION['cart']);

  
    header("Location: giohang.php?deleted=1");
    exit;
}



if ($MaGio === 0) {
    mysqli_query($conn, "INSERT INTO gio_hang (MaKH) VALUES ($MaKH)");
    $MaGio = mysqli_insert_id($conn);
} else {

    mysqli_query($conn, "DELETE FROM gio_hang_ct WHERE MaGio = $MaGio");
}


foreach ($_SESSION['cart'] as $MaSach => $SoLuong) {
    $MaSach = (int)$MaSach;
    $SoLuong = (int)$SoLuong;

    if ($SoLuong > 0) {
        $sql_insert = "INSERT INTO gio_hang_ct (MaGio, MaSach, SoLuong) VALUES ($MaGio, $MaSach, $SoLuong)";
        mysqli_query($conn, $sql_insert);
    }
}

header("Location: giohang.php?saved=1");
exit;
?>
