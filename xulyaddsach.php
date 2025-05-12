<?php
require_once 'admin/connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy dữ liệu từ form
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

    // Xử lý ảnh
    $targetdir = "../image/";
    $fileName = basename($_FILES["HinhAnh"]["name"]);
    $targetFile = $targetdir . time() . "_" . $fileName;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $allowTypes = ['jpg', 'jpeg', 'png', 'gif', 'webp'];

    if (!in_array($imageFileType, $allowTypes)) {
        die("Chỉ chấp nhận file ảnh JPG, JPEG, PNG, GIF, WEBP.");
    }

    if (move_uploaded_file($_FILES["HinhAnh"]["tmp_name"], $targetFile)) {
        // Thêm vào bảng sách
        $sql = "INSERT INTO sach (
            MaSach, TenSach, TacGia, NhaXuatBan, NhaCungCap, NamXuatBan,
            NguoiDich, SoTrang, NgonNgu, HinhAnh, DinhDang,
            GiaNhap, GiaBan, GiaUuDai, SoLuong, MoTa, TrangThai, MaLoai
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            unlink($targetFile); // Xóa ảnh nếu lỗi
            die("Lỗi chuẩn bị câu lệnh SQL: " . $conn->error);
        }


        //debug
        $stmt->bind_param("sssssisissssddisii", 
    $MaSach, $TenSach, $TacGia, $NhaXuatBan, $NhaCungCap, $NamXuatBan,
    $NguoiDich, $SoTrang, $NgonNgu, $targetFile, $DinhDang,
    $GiaNhap, $GiaBan, $GiaUuDai, $SoLuong, $MoTa, $TrangThai, $MaLoai
);


    
        

        if ($stmt->execute()) {
            // Thêm vào bảng hinh_anh
            $stmt_hinh = $conn->prepare("INSERT INTO hinhanh (MaSach, DuongDanHinh) VALUES (?, ?)");
            $stmt_hinh->bind_param("ss", $MaSach, $targetFile);
            $stmt_hinh->execute();
            $stmt_hinh->close();
        
            header("Location: admin/quantrisanpham.php");
        } else {
            unlink($targetFile); // Xóa ảnh nếu lỗi
            echo "Lỗi khi thêm sách: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Không thể upload hình ảnh.";
    }

    $conn->close();
}
?>
