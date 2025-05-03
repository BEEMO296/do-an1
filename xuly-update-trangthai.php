<?php
require_once "connect.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'];
    $trangthai = $_POST['trangthai'];

    $sql = "UPDATE khach_hang SET TrangThai = $trangthai WHERE MaKH = $id";

    if (mysqli_query($conn, $sql)) {
        header("Location: quantrikhachhang.php");
        exit;
    } else {
        echo "Lỗi khi cập nhật trạng thái!";
    }
} else {
    echo "Phương thức không hợp lệ!";
}
