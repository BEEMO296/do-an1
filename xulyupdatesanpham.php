<?php
require_once 'connect.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $maSach = $_POST['MaSach'];
    $giaNhap = $_POST['GiaNhap'];
    $giaBan = $_POST['GiaBan'];
    $giaUuDai = $_POST['GiaUuDai'] ?: null;  
    $soLuong = $_POST['SoLuong'];
    $nhaCungCap = $_POST['NhaCungCap'];
    $moTa = $_POST['MoTa'];
    $trangThai = $_POST['TrangThai'];

  
    $sqlImage = "SELECT HinhAnh FROM sach WHERE MaSach = ?";
    $stmtImg = mysqli_prepare($conn, $sqlImage);
    mysqli_stmt_bind_param($stmtImg, "s", $maSach);
    mysqli_stmt_execute($stmtImg);

    $resultImg = mysqli_stmt_get_result($stmtImg);
    $rowImg = mysqli_fetch_assoc($resultImg);
    $oldImage = $rowImg['HinhAnh'];
    mysqli_stmt_close($stmtImg);

    $uploadImage = $oldImage;

  
    if (isset($_FILES['HinhAnh']) && $_FILES['HinhAnh']['error'] === UPLOAD_ERR_OK) {
        $targetDir = "../image/";
        $fileName = basename($_FILES["HinhAnh"]["name"]);
        $targetFile = $targetDir . time() . "_" . $fileName;

        if (move_uploaded_file($_FILES["HinhAnh"]["tmp_name"], $targetFile)) {
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
            $uploadImage = $targetFile;
        }
    }

    $sql = "UPDATE sach SET GiaNhap = ?, GiaBan = ?, GiaUuDai = ?, SoLuong = ?, NhaCungCap = ?, MoTa = ?, HinhAnh = ?, TrangThai = ?, NgayCapNhat = NOW() WHERE MaSach = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "dddisssis", $giaNhap, $giaBan, $giaUuDai, $soLuong, $nhaCungCap, $moTa, $uploadImage, $trangThai, $maSach);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: quantrisanpham.php");
        exit();
    } else {
        echo "Lỗi cập nhật: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
}
?>
