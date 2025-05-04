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
    $stmtImg = $conn->prepare($sqlImage);
    $stmtImg->bind_param("s", $maSach);
    $stmtImg->execute();
    $resultImg = $stmtImg->get_result();
    $rowImg = $resultImg->fetch_assoc();
    $oldImage = $rowImg['HinhAnh'];
    $stmtImg->close();

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
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("dddisssis", $giaNhap, $giaBan, $giaUuDai, $soLuong, $nhaCungCap, $moTa, $uploadImage, $trangThai, $maSach);

    if ($stmt->execute()) {
        header("Location: quantrisanpham.php");
        exit();
    } else {
        echo "Lỗi cập nhật: " . $stmt->error;
    }

    $stmt->close();
}
?>
