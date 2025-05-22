<?php
require_once 'admin/connect.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $MaSach = $_POST['MaSach'];
    $TenSach = $_POST['TenSach'];
    $TacGia = $_POST['TacGia'];
    $NhaXuatBan = $_POST['NhaXuatBan'];
    $NhaCungCap = $_POST['NhaCungCap'];
    $NamXuatBan = $_POST['NamXuatBan'];
    $NguoiDich = $_POST['NguoiDich'];
    $SoTrang = $_POST['SoTrang'];
    $NgonNgu = $_POST['NgonNgu'];
    $DinhDang = $_POST['DinhDang'];
    $GiaNhap = $_POST['GiaNhap'];
    $GiaBan = $_POST['GiaBan'];
    $GiaUuDai = $_POST['GiaUuDai'] ?: null;
    $SoLuong = $_POST['SoLuong'];
    $MoTa = $_POST['MoTa'];
    $TrangThai = $_POST['TrangThai'];
    $MaLoai = $_POST['MaLoai'];

  
    $targetdir = "../image/";
    $fileName = basename($_FILES["HinhAnh"]["name"]);
    $targetFile = $targetdir . time() . "_" . $fileName;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $allowTypes = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

    if (!in_array($imageFileType, $allowTypes)) {
        die("Chỉ chấp nhận file ảnh JPG, JPEG, PNG, GIF, WEBP.");
    }

    if (move_uploaded_file($_FILES["HinhAnh"]["tmp_name"], $targetFile)) {
  
        $sql = "INSERT INTO sach (
            MaSach, TenSach, TacGia, NhaXuatBan, NhaCungCap, NamXuatBan,
            NguoiDich, SoTrang, NgonNgu, HinhAnh, DinhDang,
            GiaNhap, GiaBan, GiaUuDai, SoLuong, MoTa, TrangThai, MaLoai
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $sql);

        if (!$stmt) {
            unlink($targetFile); 
            die("Lỗi chuẩn bị câu lệnh SQL: " . mysqli_error($conn));
        }

        mysqli_stmt_bind_param($stmt, "sssssisissssddisii", 
            $MaSach, $TenSach, $TacGia, $NhaXuatBan, $NhaCungCap, $NamXuatBan,
            $NguoiDich, $SoTrang, $NgonNgu, $targetFile, $DinhDang,
            $GiaNhap, $GiaBan, $GiaUuDai, $SoLuong, $MoTa, $TrangThai, $MaLoai
        );

        if (mysqli_stmt_execute($stmt)) {
            
            $sql_hinh = "INSERT INTO hinhanh (MaSach, DuongDanHinh) VALUES (?, ?)";
            $stmt_hinh = mysqli_prepare($conn, $sql_hinh);
            mysqli_stmt_bind_param($stmt_hinh, "ss", $MaSach, $targetFile);
            mysqli_stmt_execute($stmt_hinh);
            mysqli_stmt_close($stmt_hinh);

            header("Location: admin/quantrisanpham.php");
            exit();
        } else {
            unlink($targetFile); 
            echo "Lỗi khi thêm sách: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Không thể upload hình ảnh.";
    }

    mysqli_close($conn);
}
?>
