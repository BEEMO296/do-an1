<?php

if (isset($_POST['ho'], $_POST['ten'], $_POST['email'], $_POST['username'], $_POST['password'], $_POST['sdt'], $_POST['ngay'], $_POST['thang'], $_POST['nam'], $_POST['gender'])) {
    require_once "connect.php"; 


    $ho = mysqli_real_escape_string($conn, $_POST['ho']);
    $ten = mysqli_real_escape_string($conn, $_POST['ten']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $sdt = mysqli_real_escape_string($conn, $_POST['sdt']);
    $ngay = mysqli_real_escape_string($conn, $_POST['ngay']);
    $thang = mysqli_real_escape_string($conn, $_POST['thang']);
    $nam = mysqli_real_escape_string($conn, $_POST['nam']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);



    if (empty($ho) || empty($ten) || empty($email) || empty($username) || empty($password) || empty($sdt) || empty($ngay) || empty($thang) || empty($nam) || empty($gender)) {
        echo "<p>Vui lòng điền đầy đủ thông tin.</p>";
        exit;
    }

    $ngaysinh = $nam . '-' . $thang . '-' . $ngay; 

    // check tránh trung tên đăng nhập
    $sql_check = "SELECT * FROM khach_hang WHERE TenDN = '$username'";
    $result_check = mysqli_query($conn, $sql_check);

    if (mysqli_num_rows($result_check) > 0) {
        echo "<p>Tên đăng nhập đã tồn tại. Vui lòng chọn tên khác.</p>";
        exit; 
    }

    //check mail đúng định dạng
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p>Email không hợp lệ. Vui lòng nhập lại.</p>";
        exit; 
    }

    $sql = "INSERT INTO khach_hang (HoTen, Email, TenDN, MatKhau, DienThoai, NgaySinh, GioiTinh, TrangThai)
            VALUES ('$ho $ten', '$email', '$username', '$password', '$sdt', '$ngaysinh', '$gender', 1)";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
        alert('Đăng ký thành công!');
        window.location.href = 'login.php';
    </script>";
    exit; 
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "<p>Vui lòng điền đầy đủ thông tin.</p>";
}
?>
