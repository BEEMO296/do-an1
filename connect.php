<?php
$servername = "localhost"; 
$username = "root";         
$password = "";            
$database = "quanlybansach";


$conn = mysqli_connect($servername, $username, $password, $database);
mysqli_set_charset($conn, 'utf8mb4');


if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}


?>
