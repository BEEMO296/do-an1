<?php
require_once 'connect.php';
$maHD = !empty($_GET['id']) ? (int)$_GET['id'] : 0;
if ($maHD > 0) {
    $sql = "DELETE FROM hoa_don WHERE MaHD = $maHD";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo 'thành công';
        exit();
    } else {
        echo "thất bại";
        exit();
    }
}
?>