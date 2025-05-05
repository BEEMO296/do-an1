<?php
require_once 'connect.php';
$maGio = !empty($_GET['id']) ? (int)$_GET['id'] : 0;
if ($maGio > 0) {
    $sql = "DELETE FROM gio_hang WHERE MaGio = $maGio";
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