<?php
require_once 'connect.php'; 

if (isset($_GET['makh'])) {
    $makh = $_GET['makh']; 


    $sql = "DELETE FROM khach_hang WHERE MaKH = $makh";


    if (mysqli_query($conn, $sql)) {
                header("Location: quantrikhachhang.php");
        exit;
    } else {
        echo "Xóa thất bại: " . mysqli_error($conn);
    }
} else {
    echo "Không có mã khách để xóa.";
}
?>
