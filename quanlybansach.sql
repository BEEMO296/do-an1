-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 05, 2025 lúc 05:50 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlybansach`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gio_hang`
--

CREATE TABLE `gio_hang` (
  `MaGio` int(11) NOT NULL,
  `MaKH` int(11) NOT NULL,
  `MaSach` int(11) NOT NULL,
  `NgayCapNhat` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinh_anh`
--

CREATE TABLE `hinh_anh` (
  `MaHA` int(11) NOT NULL,
  `Ten_file_anh` varchar(255) NOT NULL,
  `TrangThai` tinyint(4) NOT NULL,
  `MaSach` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don`
--

CREATE TABLE `hoa_don` (
  `MaHD` int(11) NOT NULL,
  `NgayLap` date NOT NULL,
  `HoTenNguoiNhan` varchar(255) NOT NULL,
  `DiaChiGiaoHang` varchar(255) NOT NULL,
  `SDTGiaoHang` varchar(255) NOT NULL,
  `MaKH` int(11) NOT NULL,
  `MaPTVC` int(11) NOT NULL,
  `MaPTTT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don_ct`
--

CREATE TABLE `hoa_don_ct` (
  `MaHD` int(11) NOT NULL,
  `MaSach` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `GiaBan` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `MaKH` int(11) NOT NULL,
  `HoTen` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `MatKhau` varchar(255) NOT NULL,
  `DienThoai` varchar(255) NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `NgayTao` date NOT NULL,
  `TrangThai` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lien_he`
--

CREATE TABLE `lien_he` (
  `MaLH` int(11) NOT NULL,
  `Dia_chi` varchar(255) NOT NULL,
  `Dien_thoai` varchar(50) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Ghi_chu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_sach`
--

CREATE TABLE `loai_sach` (
  `MaLoai` int(11) NOT NULL,
  `TenLoai` varchar(255) NOT NULL,
  `TrangThai` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pt_thanh_toan`
--

CREATE TABLE `pt_thanh_toan` (
  `MaPTTT` int(11) NOT NULL,
  `TenPTTT` varchar(255) NOT NULL,
  `TrangThai` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pt_van_chuyen`
--

CREATE TABLE `pt_van_chuyen` (
  `MaPTVC` int(11) NOT NULL,
  `TenPTVC` varchar(255) NOT NULL,
  `Don_gia` float NOT NULL,
  `TrangThai` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quan_tri`
--

CREATE TABLE `quan_tri` (
  `Tai_khoan` varchar(255) NOT NULL,
  `Mat_khau` varchar(255) NOT NULL,
  `TrangThai` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sach`
--

CREATE TABLE `sach` (
  `MaSach` int(11) NOT NULL,
  `MaLoai` int(11) NOT NULL,
  `TenSach` varchar(255) NOT NULL,
  `TacGia` varchar(255) NOT NULL,
  `NhaXuatBan` varchar(255) NOT NULL,
  `NamXuatBan` int(11) NOT NULL,
  `GiaNhap` float NOT NULL,
  `GiaBan` float NOT NULL,
  `GiaUuDai` float NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `NgayCapNhat` date NOT NULL,
  `DinhDang` varchar(255) NOT NULL,
  `SoTrang` int(11) NOT NULL,
  `NgonNgu` varchar(255) NOT NULL,
  `MoTa` text NOT NULL,
  `TrangThai` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `hinh_anh`
--
ALTER TABLE `hinh_anh`
  ADD PRIMARY KEY (`MaHA`),
  ADD KEY `FK_MaSach_hinh_anh` (`MaSach`);

--
-- Chỉ mục cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`MaHD`),
  ADD KEY `FK_khachhang_hoadon` (`MaKH`),
  ADD KEY `FK_maptvc_hoadon` (`MaPTVC`),
  ADD KEY `FK_mapttt_hoadon` (`MaPTTT`);

--
-- Chỉ mục cho bảng `hoa_don_ct`
--
ALTER TABLE `hoa_don_ct`
  ADD KEY `FK_maHD_hdct` (`MaHD`),
  ADD KEY `FK_maSach_hdct` (`MaSach`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`MaKH`);

--
-- Chỉ mục cho bảng `lien_he`
--
ALTER TABLE `lien_he`
  ADD PRIMARY KEY (`MaLH`);

--
-- Chỉ mục cho bảng `loai_sach`
--
ALTER TABLE `loai_sach`
  ADD PRIMARY KEY (`MaLoai`);

--
-- Chỉ mục cho bảng `pt_thanh_toan`
--
ALTER TABLE `pt_thanh_toan`
  ADD PRIMARY KEY (`MaPTTT`);

--
-- Chỉ mục cho bảng `pt_van_chuyen`
--
ALTER TABLE `pt_van_chuyen`
  ADD PRIMARY KEY (`MaPTVC`);

--
-- Chỉ mục cho bảng `quan_tri`
--
ALTER TABLE `quan_tri`
  ADD PRIMARY KEY (`Tai_khoan`,`Mat_khau`);

--
-- Chỉ mục cho bảng `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`MaSach`),
  ADD KEY `FK_MaLoai_loai_sach` (`MaLoai`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `hinh_anh`
--
ALTER TABLE `hinh_anh`
  ADD CONSTRAINT `FK_MaSach_hinh_anh` FOREIGN KEY (`MaSach`) REFERENCES `sach` (`MaSach`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `FK_khachhang_hoadon` FOREIGN KEY (`MaKH`) REFERENCES `khach_hang` (`MaKH`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_mapttt_hoadon` FOREIGN KEY (`MaPTTT`) REFERENCES `pt_thanh_toan` (`MaPTTT`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_maptvc_hoadon` FOREIGN KEY (`MaPTVC`) REFERENCES `pt_van_chuyen` (`MaPTVC`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hoa_don_ct`
--
ALTER TABLE `hoa_don_ct`
  ADD CONSTRAINT `FK_maHD_hdct` FOREIGN KEY (`MaHD`) REFERENCES `hoa_don` (`MaHD`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_maSach_hdct` FOREIGN KEY (`MaSach`) REFERENCES `sach` (`MaSach`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sach`
--
ALTER TABLE `sach`
  ADD CONSTRAINT `FK_MaLoai_loai_sach` FOREIGN KEY (`MaLoai`) REFERENCES `loai_sach` (`MaLoai`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
