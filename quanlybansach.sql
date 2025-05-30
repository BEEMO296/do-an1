-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 30, 2025 lúc 03:58 AM
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
  `NgayCapNhat` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `gio_hang`
--

INSERT INTO `gio_hang` (`MaGio`, `MaKH`, `NgayCapNhat`) VALUES
(6, 3, '2025-05-29 20:22:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gio_hang_ct`
--

CREATE TABLE `gio_hang_ct` (
  `MaGio` int(11) NOT NULL,
  `MaSach` varchar(13) NOT NULL,
  `SoLuong` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `gio_hang_ct`
--

INSERT INTO `gio_hang_ct` (`MaGio`, `MaSach`, `SoLuong`) VALUES
(6, '3300000052915', 1),
(6, '8935250707961', 1),
(6, '8935250716215', 2),
(6, '9784041093689', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhanh`
--

CREATE TABLE `hinhanh` (
  `MaHA` int(11) NOT NULL,
  `MaSach` varchar(13) NOT NULL,
  `DuongDanHinh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hinhanh`
--

INSERT INTO `hinhanh` (`MaHA`, `MaSach`, `DuongDanHinh`) VALUES
(3, '8935250707961', '../image/1746291751_86-vol-6_bia-1.webp'),
(5, '8935280915091', '../image/1746292809_Screenshot 2025-05-04 001914.png'),
(6, '1920193006117', '../image/1746293320_resize_image.jpg'),
(7, '9781526628244', '../image/1746293843_image_239129.webp'),
(8, '0404202500', '../image/1746365824_combo-0110202411_1.jpg'),
(10, '8934974209072', '../image/1746406982_nxbtre_full_21442025_094448_1.webp'),
(11, '8935325026782', '../image/1747027587_b_a-1-nh_ng-c_u-chuy_n-kinh-d_.webp'),
(12, '8935352621707', '../image/1747900343_solo-leveling_tap-19_bia_obi_card.webp'),
(16, '8935250716215', '../image/1748507847_8935250707534_2.jpg'),
(17, '8935250716178', '../image/1748508004_8935250706582_1.jpg'),
(18, '3300000052915', '../image/1748508220_th_ng-b_o-ph_t-h_nh_2.webp'),
(19, '9784041093689', '../image/1748508387_image_244718_1_4941.webp'),
(20, '9784041093696', '../image/1748508615_image_244718_1_4942.webp'),
(21, '9784041093719', '../image/1748508713_image_244718_1_4943.jpg'),
(22, '9784041093702', '../image/1748508864_image_230880.webp'),
(23, '9784041093726', '../image/1748508970_image_230881.jpg'),
(24, '9786042268547', '../image/1748509104_conan-27_ban-nang-cap_bia_bookmark.webp'),
(26, '8935352626320', '../image/1748509575_co-nang-shimotsuki-trot-phai-long-nhan-vat-nen_tap-5_ban-gioi-han.jpg');

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
  `MaPTTT` int(11) NOT NULL,
  `TrangThai` tinyint(3) NOT NULL COMMENT '0=hủy\r\n1=đang giao\r\n2=giao thành công'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoa_don`
--

INSERT INTO `hoa_don` (`MaHD`, `NgayLap`, `HoTenNguoiNhan`, `DiaChiGiaoHang`, `SDTGiaoHang`, `MaKH`, `MaPTVC`, `MaPTTT`, `TrangThai`) VALUES
(1, '2025-05-01', 'Trần Văn An', '123 Lê Lợi, Quận 1, TP.HCM', '0901234567', 2, 1, 1, 2),
(2, '2025-05-03', 'Nguyễn Thị Bình', '456 Trần Hưng Đạo, Q5, TP.HCM', '0934567890', 3, 2, 2, 1),
(3, '2025-05-05', 'Phạm Văn Cao', '789 Cách Mạng Tháng 8, Q10, TP.HCM', '0987654321', 4, 3, 3, 0),
(4, '2025-05-07', 'Lê Thị Dung', '12 Nguyễn Huệ, TP. Huế', '0911222333', 2, 1, 4, 2),
(5, '2025-05-10', 'Đặng Văn Quân', '99 Hai Bà Trưng, Hà Nội', '0977888999', 6, 4, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don_ct`
--

CREATE TABLE `hoa_don_ct` (
  `MaHD` int(11) NOT NULL,
  `MaSach` varchar(13) NOT NULL,
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
  `TenDN` varchar(255) NOT NULL,
  `MatKhau` varchar(255) NOT NULL,
  `DienThoai` varchar(255) NOT NULL,
  `NgaySinh` date NOT NULL,
  `GioiTinh` tinyint(3) NOT NULL,
  `NgayTao` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `TrangThai` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`MaKH`, `HoTen`, `Email`, `TenDN`, `MatKhau`, `DienThoai`, `NgaySinh`, `GioiTinh`, `NgayTao`, `TrangThai`) VALUES
(2, 'Nguyễn Hoàng', 'testdk@gmail.com', 'testdk', 'testdk', '123123', '2000-01-01', 1, '2025-05-23 10:27:38', 1),
(3, 'Nguyễn Khôi', 'khoitest@gmail.com', 'khoitest', 'khoitest', '0123456789', '1980-01-01', 1, '2025-05-22 15:05:13', 1),
(4, 'Nguyễn Nguyễn', 'hoangcansa2k6@gmail.com', 'nguyennguyen', 'h123', '123123123', '1998-12-19', 2, '2025-05-04 21:41:02', 0),
(6, 'Nguyễn Hoàng Hoàng', 'testdk3@gmail.com', 'testdk3', 'testdk3', '123123123123', '1980-01-01', 2, '2025-05-12 12:30:59', 1);

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
  `TrangThai` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_sach`
--

INSERT INTO `loai_sach` (`MaLoai`, `TenLoai`, `TrangThai`) VALUES
(1, 'Light Novel', 1),
(2, 'Manga', 1),
(3, 'Ngôn tình/học đường', 1),
(4, 'Kinh dị', 1),
(5, 'Truyện thiếu nhi', 1),
(6, 'Phiêu lưu/kỳ ảo', 1),
(7, 'sách nước ngoài', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pt_thanh_toan`
--

CREATE TABLE `pt_thanh_toan` (
  `MaPTTT` int(11) NOT NULL,
  `TenPTTT` varchar(255) NOT NULL,
  `TrangThai` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `pt_thanh_toan`
--

INSERT INTO `pt_thanh_toan` (`MaPTTT`, `TenPTTT`, `TrangThai`) VALUES
(1, 'Thanh toán khi nhận hàng (COD)', 1),
(2, 'Chuyển khoản ngân hàng', 1),
(3, 'Thanh toán qua ví điện tử Momo', 1),
(4, 'Thẻ tín dụng/ghi nợ', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pt_van_chuyen`
--

CREATE TABLE `pt_van_chuyen` (
  `MaPTVC` int(11) NOT NULL,
  `TenPTVC` varchar(255) NOT NULL,
  `Don_gia` float NOT NULL,
  `TrangThai` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `pt_van_chuyen`
--

INSERT INTO `pt_van_chuyen` (`MaPTVC`, `TenPTVC`, `Don_gia`, `TrangThai`) VALUES
(1, 'Giao hàng tiêu chuẩn (3-5 ngày)', 20000, 1),
(2, 'Giao hàng nhanh (1-2 ngày)', 35000, 1),
(3, 'Giao hàng hỏa tốc (trong ngày)', 50000, 1),
(4, 'Nhận tại cửa hàng', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quan_tri`
--

CREATE TABLE `quan_tri` (
  `Tai_khoan` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Mat_khau` varchar(255) NOT NULL,
  `TrangThai` tinyint(2) NOT NULL COMMENT '0=off 1=onl\r\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `quan_tri`
--

INSERT INTO `quan_tri` (`Tai_khoan`, `Email`, `Mat_khau`, `TrangThai`) VALUES
('admin', 'admin01@gmail.com', '123456', 1),
('hoangadmin', 'test@gmail.com', '123', 1),
('mod02', 'mod02@gmail.com', '123456', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sach`
--

CREATE TABLE `sach` (
  `MaSach` varchar(13) NOT NULL,
  `MaLoai` int(11) NOT NULL,
  `TenSach` varchar(255) NOT NULL,
  `TacGia` varchar(255) NOT NULL,
  `NhaXuatBan` varchar(255) NOT NULL,
  `NhaCungCap` varchar(255) NOT NULL,
  `NamXuatBan` int(11) NOT NULL,
  `NguoiDich` varchar(255) NOT NULL,
  `GiaNhap` float NOT NULL,
  `GiaBan` float NOT NULL,
  `GiaUuDai` float DEFAULT NULL,
  `SoLuong` int(11) NOT NULL,
  `HinhAnh` varchar(255) NOT NULL,
  `NgayCapNhat` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `DinhDang` varchar(255) NOT NULL,
  `SoTrang` int(11) NOT NULL,
  `NgonNgu` varchar(255) NOT NULL,
  `MoTa` text NOT NULL,
  `TrangThai` tinyint(3) NOT NULL COMMENT '0= hết\r\n1=còn\r\n2=ngừng bán'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sach`
--

INSERT INTO `sach` (`MaSach`, `MaLoai`, `TenSach`, `TacGia`, `NhaXuatBan`, `NhaCungCap`, `NamXuatBan`, `NguoiDich`, `GiaNhap`, `GiaBan`, `GiaUuDai`, `SoLuong`, `HinhAnh`, `NgayCapNhat`, `DinhDang`, `SoTrang`, `NgonNgu`, `MoTa`, `TrangThai`) VALUES
('0404202500', 1, 'Combo Manga - Spy X Family: Tập 1 - 10 (Bộ 10 Tập)', 'Tatsuya Endo', 'Kim Đồng', 'Nhà Xuất Bản Kim Đồng', 2025, 'Phương Nga, Hồng Hà, Altair', 230000, 270000, 256000, 100, '../image/1746365824_combo-0110202411_1.jpg', '2025-05-26 18:03:11', 'Bìa mềm', 1899, 'Tiếng Việt', 'Combo Manga - Spy X Family: Tập 1 - 10 (Bộ 10 Tập)\r\n\r\n1. Spy X Family Tập 1\r\n\r\nNhằm ngăn chặn âm mưu gây chiến, giữ vững nền hòa bình Đông - Tây, điệp viên hàng đầu của Westalis, Twilight phải xây dựng một gia đình và cho con theo học tại học viện danh giá nhất Ostania hòng tiếp cận yếu nhân cầm đầu phe chủ chiến của đất nước này: Desmon Donavan! Và thật tình cờ, đứa trẻ mà Twilight nhận làm \"\"con\"\" ở cô nhi viện, Anya, lại có khả năng đọc suy nghĩ của người khác. Chưa kể \"\"người vợ\"\" anh buộc phải chọn lựa trong lúc vội vàng, Yor, lại là một… sát thủ...!!\r\n\r\nBa người với lí do riêng để che giấu thân phận đã cùng chung sống với nhau dưới một mái nhà. Từ đây câu chuyện siêu hấp dẫn và hài hước về gia đình điệp viên chính thức mở ra...!!\r\n\r\nMùa đông năm nay, xin mời các bạn độc giả cùng theo dõi SPY x FAMILY - Siêu phẩm Manga mới với số lượng bản in lên tới hơn 1 triệu bản cho mỗi cuốn phát hành tại Nhật!! Với phiên bản Việt, mỗi cuốn sẽ được tặng kèm 1 Standee PVC cho lần phát hành đầu tiên, đừng bỏ lỡ nhé!!\r\n\r\nTATSUYA ENDO\r\n\r\n“Tôi rất thích những bộ phim hay hoạt hình nói về chủ đề “che giấu danh tính”. Nhất là cái cảm giác hồi hộp khi sắp bị bại lộ, hay có những lúc thực sự muốn nói ra tất cả nhưng lại không thể.\r\n\r\nTác phẩm này cũng chỉ thể hiện được tí chút những nội dung đó mà thôi, nhưng mong rằng các bạn sẽ cảm thấy thích thú khi đọc truyện.”\r\n\r\n2. Spy X Family Tập 2\r\n\r\nĐể hoàn thành nhiệm vụ gìn giữ hòa bình cho hai nước Ostania và Westalis, gia đình Forger đã vượt qua kì thi tuyển đầy thử thách của học viện danh tiếng. Nhưng sau đó Anya phải trở thành học sinh ưu tú của trường để tiếp cận Desmond. Kế hoạch tác chiến “xây dựng tình bạn” của Twilight sẽ được thực hiện thế nào đây…!?\r\n\r\nTATSUYA ENDO\r\n\r\nCó một thuyết cho rằng gián điệp là nghề nghiệp cổ xưa thứ 2 trên thế giới. Lừa lọc, đánh bẫy, đó chính là lịch sử dối trá của nhân loại.\r\n\r\nNgay cả tôi, ngày nào cũng đưa cho biên tập viên thông tin sai lệch rằng: “Trong hôm nay tôi sẽ nộp bản thảo!” đấy.\r\n\r\n3. Spy X Family Tập 3\r\n\r\nYuri, em trai của Yor đã tới thăm nhà Forger!! Twilight và Yuri cùng giấu nhẹm thân phận điệp viên, cũng như cảnh sát mật của mình, và giở đủ chiêu thăm dò lẫn nhau. Yuri, cậu em cuồng chị gái đang gấp rút muốn điều tra xem liệu Twilight có phải là người chồng thật sự của chị mình hay không…!?\r\n\r\nTATSUYA ENDO\r\n\r\nHầu hết các giai thoại được kể về điệp viên đều là những nhiệm vụ thất bại. Bởi đã hoàn thành nhiệm vụ một cách hoàn hảo không vết tích thì sẽ chẳng có bất kì một ghi chép công khai nào còn lưu lại về vụ việc đó.\r\n\r\nNgoài những lần gặp thất bại ra, tôi không có khả năng làm công việc mà chẳng được ai biết đến, hay trở thành điệp viên. Bởi tôi thuộc trường phái thích được khen ngợi mà.\r\n\r\n4. Spy X Family Tập 4\r\n\r\nHọ đã phát hiện được âm mưu dùng chó đánh bom ám sát bộ trưởng của Westalis! Cả gia đình cùng nhau ra ngoài để tìm cho Anya một chú cún cưng, nhưng Twilight lại kết hợp việc đó với chiến dịch chống khủng bố khẩn cấp…!! Và rồi, Anya gặp được một chú chó kì lạ biết rõ cả gia đình Forger…!?\r\n\r\nTATSUYA ENDO\r\n\r\n“Tôi là người yêu mèo, nhưng chó cũng dễ thương lắm.”\r\n\r\n5. Spy X Family Tập 5\r\n\r\nChú chó có khả năng tiên đoán tương lai, Bond đã trở thành một thành viên trong gia đình. Những tưởng chiến dịch “Strix” cũng như gia đình Forger đã đi vào quỹ đạo, nhưng… Anya lại lâm vào khủng hoảng khi đối mặt với bài thi giữa kì!?\r\n\r\nRốt cuộc kì thi hỗn loạn với sao Stella và sét Tonitrus treo lơ lửng trên đầu sẽ có kết quả ra sao…!!\r\n\r\n6. Spy X Family Tập 6\r\n\r\nNhận nhiệm vụ lấy trộm văn kiện mật về cuộc chiến, Twilight và Nightfall phải tham chiến trong đại hội ngầm dưới lòng đất!! Nhưng Nightfall, một người âm thầm ngưỡng mộ Loid và luôn cho rằng mình phù hợp với vai trò người vợ hơn ai hết, đã khiến vợ chồng nhà Forger rơi vào tình cảnh nguy hiểm…!?\r\n\r\n“Thế giới giả định mà tôi xây dựng trong bộ truyện này là vào khoảng thập niên 60~70, nhưng bởi vì mọi thứ cứ bị nửa nọ nửa kia giữa thế giới hiện đại và quá khứ nên rất hay bắt gặp những câu hỏi kiểu như: “Ủa thời đó đã có thứ OO này chưa ta…?” Những lúc tra cứu rồi mà vẫn không rõ thứ ấy có ở thời đó hay chưa, tôi lại lắc tách trà và tự nhủ rằng: “Thôi, dù sao đây cũng là câu chuyện về một đất nước hư cấu mà.” - TATSUYA ENDO\r\n\r\n7. Spy X Family Tập 7\r\n\r\nCuối cùng thì Twilight cũng tiếp xúc được với mục tiêu Desmond lần đầu tiên bằng cách xen vào cuộc gặp gỡ giữa hắn và cậu con trai thứ Damian!! Liệu thông qua cuộc trò chuyện, Twilight có tìm ra được bản chất của mục tiêu không thể dò xét tâm tư này hay không...!?\r\n\r\n8. Spy X Family - Tập 8\r\n\r\nTrong một nhiệm vụ của “Garden” – tổ chức bí mật của Ostania, Yor phải trà trộn lên một chiếc du thuyền hạng sang để bảo vệ nhân vật quan trọng gia tộc mafia! Nhưng cả Loid và Anya cũng\r\n\r\nđi du lịch trên chiếc du thuyền ấy khiến Yor băn khoăn về công việc bí mật của mình!?\r\n\r\nTatsuya Endo\r\n\r\n“Mừng quá, tác phẩm của tôi được chuyển thể thành phim hoạt hình rồi!”\r\n\r\n9. Spy X Family - Tập 9\r\n\r\nTrận giao tranh giữa Yor và đám sát thủ đã đi đến hồi kết…!! Cùng lúc đó, bom trên chiếc du thuyền hạng sang cũng được cài xong! Cảm nhận được mối nguy hiểm, Loid và Anya đều tận lực cứu vãn tình hình theo cách của riêng mình…\r\n\r\n10. Spy X Family - Tập 10\r\n\r\nThuở ấu thơ sống bình yên bên ba mẹ, chơi trò đánh trận giả với bạn bè, thỉnh thoảng cãi nhau với ba.\r\n\r\nCậu thiếu niên cứ ngỡ những tháng ngày thường nhật ấy sẽ mãi tiếp diễn mà chẳng mảy may nghi ngờ, thế nhưng…!?', 2),
('1920193006117', 1, '夏へのトンネル、さよならの出口', 'Mei Hachimoku', 'Shogakukan', 'Gagaga Bunko', 2019, 'Không có', 200000, 250000, 0, 10, '../image/1746293320_resize_image.jpg', '2025-05-16 08:24:28', 'Bìa mềm', 326, 'Tiếng Nhật', '時空を超えるトンネルに挑む少年と少女の夏\r\n\r\n「ウラシマトンネルって、知ってる? そのトンネルに入ったら、欲しいものがなんでも手に入るの」\r\n「なんでも?」\r\n「なんでも。でもね、ウラシマトンネルはただでは帰してくれなくて――」\r\n海に面する田舎町・香崎。\r\n夏の日のある朝、高二の塔野カオルは、『ウラシマトンネル』という都市伝説を耳にした。\r\nそれは、中に入れば年を取る代わりに欲しいものがなんでも手に入るというお伽噺のようなトンネルだった。\r\nその日の夜、カオルは偶然にも『ウラシマトンネル』らしきトンネルを発見する。\r\n最愛の妹・カレンを五年前に事故で亡くした彼は、トンネルを前に、あることを思いつく。\r\n――『ウラシマトンネル』に入れば、カレンを取り戻せるかもしれない。\r\n放課後に一人でトンネルの検証を開始したカオルだったが、そんな彼の後をこっそりとつける人物がいた。\r\n転校生の花城あんず。クラスでは浮いた存在になっている彼女は、カオルに興味を持つ。\r\n二人は互いの欲しいものを手に入れるために協力関係を結ぶのだが……。\r\n優しさと切なさに満ちたひと夏の青春を繊細な筆致で描き、第13回小学館ライトノベル大賞のガガガ賞と審査員特別賞のW受賞を果たした話題作。', 1),
('3300000052915', 1, 'Về Chuyện Tôi Chuyển Sinh Thành Slime - Tập 6 - Bản Đặc Biệt - Tặng Kèm Bookmark + Postcard + Card Hologram', 'Fuse, Mizt Vah', 'Phụ Nữ Việt Nam', 'SkyBooks', 2025, 'Thùy Linh', 150000, 205000, 1740000, 50, '../image/1748508220_th_ng-b_o-ph_t-h_nh_2.webp', '2025-05-29 15:43:40', 'Bìa mềm', 600, 'Tiếng Việt', 'Về Chuyện Tôi Chuyển Sinh Thành Slime - Tập 6\r\n\r\nTiếp nối nội dung tập 5, vương quốc Tempest của Rimuru đã rơi vào hỗn loạn. Sau những sự kiện tàn khốc, Rimuru - một slime đã tiến hóa tới Hạt Giống Ma Vương, mang theo quyền lực mới nhưng cũng kéo theo hàng loạt hệ lụy. Không lâu sau, anh nhận được lời triệu tập đến Yến tiệc Ma vương Walpurgis, đó là buổi hội họp đặc biệt quy tụ cả mười Ma vương nhưng chủ đề chính của của bội hội họp lại là về hình phạt dành cho Rimuru, kẻ dám tự xưng là Ma vương.\r\n\r\nTuy nhiên, đây không chỉ là một phiên tòa xét xử. Rimuru thầm hiểu rằng trong mười Ma vương có một kẻ đang giật dây mọi chuyện, lợi dụng tình hình để loại bỏ anh khỏi bàn cờ quyền lực. Nhưng với những đồng minh mạnh mẽ bên cạnh, cuộc hội nghị này có thể chính là cơ hội vàng để Rimuru trả thù và lật mặt “kẻ đó” trước toàn thể hội đồng Ma vương.\r\n\r\nLiệu Rimuru có đủ sự tinh ranh và sức mạnh để cùng lúc bảo vệ vị thế, cũng như trả thù kẻ gây nên chuyện rối ren này và thay đổi trật tự Ma vương? Liệu anh có tấn công buổi yến tiệc nơi các Ma vương tụ hội? Một trận chiến mang tính quyết định đang chờ đợi phía trước…\r\n\r\nMời các bạn cùng đón đọc Tập 6 “Về chuyện tôi chuyển sinh thành Slime” để tìm được câu trả lời nha!', 1),
('8934974209072', 1, 'Attack On Titan - Tập 29', 'Hajime Isayama', 'Trẻ', 'NXB Trẻ', 2025, 'Torarika', 35000, 48000, 40800, 50000, '../image/1746406982_nxbtre_full_21442025_094448_1.webp', '2025-05-05 08:03:26', 'Bìa mềm', 192, 'Tiếng Việt', 'Sau nhiều năm sống yên ổn sau những bức tường thành cao lừng lững, loài người đã bắt đầu cảm nhận được nguy cơ diệt vong đến từ một giống loài khổng lồ mang tên Titan. Dù muốn dù không, họ buộc phải đứng lên, và đã đứng lên một cách đầy quyết tâm, mạnh mẽ để chống lại những kẻ thù hùng mạnh nhất.\r\n\r\nThế rồi họ dần nhận ra bản chất thật sự của những kẻ thù khổng lồ kia...', 1),
('8935250707961', 1, '86-EIGHTY SIX- Ep.6', ' ASATO ASATO, SHIRABII', 'Hồng Đức', 'IPM', 2022, 'Nhật Tuyến', 100000, 145000, 125000, 5000, '../image/1746291751_86-vol-6_bia-1.webp', '2025-05-04 00:07:25', 'Bìa mềm', 384, 'Tiếng Việt', 'Kiêu hãnh chiến đấu, rồi hi sinh. Số phận của Tám Sáu là vậy. Lòng ham sống đã bị họ bỏ lại ở quá khứ rất xa.\r\n\r\nHọ từng nghĩ, từng tin như vậy.\r\n\r\nThế nhưng, lối sống mà Tám Sáu theo đuổi bấy lâu dường như bị coi thường, bị xem là biểu hiện điên rồ không hơn không kém khi đặt cạnh cách mà những thiếu nữ người máy Sirin lao ra chiến trường, sẵn sàng bị giẫm nát, phá hủy và chôn vùi.\r\n\r\nShin khổ sở khi tìm kiếm ý nghĩa của việc sống tiếp. Lena lo lắng khôn nguôi khi cố gắng thấu hiểu Shin. Giữa lúc hai người còn đang luẩn quẩn trong vòng xoáy mâu thuẫn và hiểu lầm, chiến dịch công chiếm núi Ryuga đã rục rịch khai màn. Mang ý nghĩa sống còn đối với vận mệnh Vương quốc Liên hiệp, trận chiến này rồi sẽ có kết cục ra sao…?\r\n\r\nKhông chiến đấu thì không thể tồn tại. Nhưng không phải cứ chiến đấu là có thể sống', 1),
('8935250716178', 1, '5 Centimet Trên Giây (Tái Bản 2025)', 'Shinkai Makoto', 'Hồng Đức', 'IPM', 2025, 'Thúy An', 40000, 65000, 50000, 20, '../image/1748508004_8935250706582_1.jpg', '2025-05-29 15:40:04', 'Bìa mềm', 162, 'Tiếng Việt', '5 Centimet Trên Giây\r\n\r\n5cm/s không chỉ là vận tốc của những cánh anh đào rơi, mà còn là vận tốc khi chúng ta lặng lẽ bước qua đời nhau, đánh mất bao cảm xúc thiết tha nhất của tình yêu. Bằng giọng văn tinh tế, truyền cảm, Năm centimet trên giây mang đến những khắc họa mới về tâm hồn và khả năng tồn tại của cảm xúc, bắt đầu từ tình yêu trong sáng, ngọt ngào của một cô bé và cậu bé. Ba giai đoạn, ba mảnh ghép, ba ngôi kể chuyện khác nhau nhưng đều xoay quanh nhân vật nam chính, người luôn bị ám ảnh bởi kí ức và những điều đã qua… Khác với những câu chuyện cuốn bạn chạy một mạch, truyện này khó mà đọc nhanh. Ngón tay bạn hẳn sẽ ngừng lại cả trăm lần trên mỗi trang sách. Chỉ vì một cử động rất khẽ, một câu thoại, hay một xúc cảm bất chợt có thể sẽ đánh thức những điều tưởng chừng đã ngủ quên trong tiềm thức, như ngọn đèn vừa được bật sáng trong tâm trí bạn. Và rồi có lúc nó vượt quá giới hạn chịu đựng, bạn quyết định gấp cuốn sách lại chỉ để tận hưởng chút ánh sáng từ ngọn đèn, hay đơn giản là để vết thương trong lòng mình có thời gian tự tìm xoa dịu.', 1),
('8935250716215', 1, ' Your Name (Tái Bản 2025)', 'Shinkai Makoto', 'Hồng Đức', 'IPM', 2025, 'Thúy An', 60000, 85000, 65000, 10, '../image/1748507847_8935250707534_2.jpg', '2025-05-29 15:37:27', 'Bìa mềm', 256, 'Tiếng Việt', 'Your Name\r\n\r\nMitsuha là nữ sinh trung học sống ở vùng quê hẻo lánh. Một ngày nọ, cô mơ thấy mình ở Tokyo trong một căn phòng xa lạ, biến thành con trai, gặp những người bạn chưa từng quen biết.\r\n\r\nTrong khi đó ở một nơi khác, Taki, một nam sinh trung học người Tokyo lại mơ thấy mình biến thành con gái, sống ở vùng quê hẻo lánh.\r\n\r\nCuối cùng hai người họ nhận ra đang bị hoán đổi với nhau qua giấc mơ. Kể từ lúc hai con người xa lạ ấy gặp nhau, bánh xe số phận bắt đầu chuyển động.\r\n\r\nĐây là phiên bản tiểu thuyết của bộ phim hoạt hình Your Name., do chính đạo diễn Shinkai Makoto chấp bút.', 1),
('8935280915091', 1, 'Đường hầm tới mùa hạ - Lối thoát của biệt ly - Bản siêu đặc biệt', 'Mei Hachimoku', 'Hà Nội', 'Thái Hà', 2023, 'Đỗ Nguyên', 229000, 500000, NULL, 500, '../image/1746292809_Screenshot 2025-05-04 001914.png', '2025-05-16 08:23:30', 'Bìa mềm', 314, 'Tiếng Việt', '“Cậu biết đường hầm Urashima chứ? Nghe bảo bước vào bên trong thì mọi mong ước sẽ biến thành hiện thực, nhưng phải đánh đổi bằng tuổi tác…”\r\n\r\n\r\n\r\nCậu học sinh cấp ba Tono Kaoru tình cờ nghe hóng được về truyền thuyết đô thị đó. Ngay đêm hôm ấy, cậu lại tình cờ tìm thấy một đường hầm có nét tương đồng…\r\n\r\nVào trong đường hầm, chưa biết chừng cậu sẽ đưa được đứa em gái đã mất năm năm trước quay về. Sau giờ học, Kaoru tiến hành điều tra về đường hầm này, ai ngờ lại bị cô bạn Hanashiro Anzu – học sinh mới chuyển tới - phát hiện ra. Hai cô cậu cộng tác với nhau để cùng đạt được mong ước của cả hai… Khởi đầu một mùa hè đầy những bất ngờ lý thú mà chưa ai từng biết tới. Đường hầm tới mùa hạ - Lối thoát của biệt ly, câu chuyện đầy ý nghĩa về tình cảm gia đình và tình yêu, là lời tạm biệt gửi tới những vui buồn trong quá khứ, tìm lại những điều đã đánh mất để có thể hướng tới tương lai. \r\n\r\n', 1),
('8935325026782', 4, 'Những Câu Chuyện Kinh Dị Khiến Bạn Dựng Tóc Gáy', 'Quỷ Cổ Nhân', 'Hà Nội', ' AZ Việt Nam', 2025, 'Đỗ Anh Dũng', 79000, 119000, 892000, 100000, '../image/1747027587_b_a-1-nh_ng-c_u-chuy_n-kinh-d_.webp', '2025-05-12 12:26:27', 'Bìa mềm', 192, 'Tiếng Việt', 'Quỷ dị - Hai từ ngắn gọn nhưng lại mang đến cho con người nhiều cảm xúc kích thích: Ớn lạnh, ám ảnh, rùng rợn!\r\n\r\nNhững câu chuyện kinh dị khiến bạn dựng tóc gáy – Tổng hợp những câu chuyện bí ẩn và ma mị dẫn dắt bạn đến một thế giới của “Quỷ vương, “xác sống” và “âm tào địa phủ”, đem đến cho bạn những trải nghiệm dựng tóc gáy.\r\n\r\nCẩn thận đấy! Chớ ngoảnh đầu lại đằng sau khi ở một mình.', 1),
('8935352621707', 1, 'Solo Leveling - Tôi Thăng Cấp Một Mình - Tập 19 - Tặng Kèm Obi + 2 PVC Card', 'Dubu (Redice Studio), Chugong', 'Nhà Xuất Bản Kim Đồng', 'Kim Đồng', 2025, 'Huyền Linh', 75000, 88000, 83600, 0, '../image/1747900343_solo-leveling_tap-19_bia_obi_card.webp', '2025-05-22 14:52:54', 'Bìa mềm', 152, 'Tiếng Việt', 'Solo Leveling - Tôi Thăng Cấp Một Mình - Tập 19\r\n\r\nSung Jin Woo đến Tokyo để giải quyết Hầm ngục vỡ hạng S. Sau khi tiêu diệt toàn bộ ma thú khổng lồ và tiến vào trong Cổng, cậu đụng độ Vua Khổng Lồ, kẻ tự nhận là chúa tể. Hắn đã đưa ra một giao kèo khiến Sung Jin Woo phải lựa chọn.\r\n\r\nLiệu kẻ nào sẽ trở thành tai ương đe dọa con người…?\r\n\r\nVà trận chiến sắp tới sẽ là…?\r\n\r\n“KHÔNG LÂU NỮA, THẾ GIỚI CỦA CÁC NGƯƠI SẼ CHÌM TRONG BIỂN LỬA KHÔNG CÒN NHIỀU THỜI GIAN ĐÂU.”', 0),
('8935352626320', 3, 'Cô Nàng Shimotsuki Trót Phải Lòng Nhân Vật Nền - Tập 5 - Bản Giới Hạn - Tặng Kèm Bookmark + Thiệp Kỉ Niệm + Bìa Áo Limited', 'Kagami Yagami, Roha', 'Kim Đồng', 'Nhà Xuất Bản Kim Đồng', 2025, 'Tifa', 80000, 115000, 100000, 8, '../image/1748509575_co-nang-shimotsuki-trot-phai-long-nhan-vat-nen_tap-5_ban-gioi-han.jpg', '2025-05-29 16:06:15', 'Bìa mềm', 300, 'Tiếng Việt', 'Cô Nàng Shimotsuki Trót Phải Lòng Nhân Vật Nền - Tập 5\r\n\r\nTớ sẽ luôn yêu thương cậu, Koutarou!\r\n\r\nNakayama Koutarou và Shimotsuki Shiho đã trở thành người yêu thực sự của nhau. Koutarou đã bắt đầu hành động theo ý chí của bản thân. Để đối mặt với mẹ, và cũng để giải quyết vấn đề giữa nhà Kurumizawa với bố của Shiho...\r\n\r\nHãy cùng chào đón đoạn kết hạnh phúc của câu chuyện lãng mạn về chàng trai tự xem mình là nhân vật nền và cô gái coi cậu là người rất đặc biệt!', 1),
('9781526628244', 6, 'Harry Potter - Christmas: A Movie Scrapbook', 'Warner Bros.', 'Bloomsbury', 'Macmillan Publishers', 2020, 'Không có', 350000, 436000, 376200, 20, '../image/1746293843_image_239129.webp', '2025-05-04 00:38:43', 'Bìa mềm', 48, 'Tiếng Anh', 'The snowy Great Hall festooned with Christmas trees, the shimmering Yule Ball, Mrs Weasley\'s festive jumpers – Christmas at Hogwarts is filled with magic and wonder.\r\n\r\nThis equally magical scrapbook takes readers on an interactive tour of the Christmas season in the Wizarding World, as seen in the Harry Potter films. With detailed profiles on everything from Harry\'s Firebolt broomstick – a festive gift from his godfather, Sirius Black – to Hogsmeade, this book includes concept illustrations, behind-the-scenes photographs, and fascinating reflections from actors and film-makers.\r\n\r\nFans can revisit key moments from the films, including Harry Potter\'s first Christmas at Hogwarts when he receives the Invisibility Cloak, as well as his holiday spent at number twelve, Grimmauld Place in Harry Potter and the Order of the Phoenix.\r\n\r\nDestined to be a must-have collectable for fans of Harry Potter, this book also comes packed with interactive inserts.', 1),
('9784041093689', 1, '【愛蔵版】新世紀エヴァンゲリオン 1 - Neon Genesis Evangelion (Collector\'s Edition)', '貞本 義行, カラー', 'Kadokawa', 'Kinokuniya Book Stores', 2021, 'Không có', 400000, 609000, 490000, 5, '../image/1748508387_image_244718_1_4941.webp', '2025-05-29 15:46:27', 'Bìa mềm', 336, 'Tiếng Nhật', '【愛蔵版】新世紀エヴァンゲリオン 1\r\n\r\nコミック版「エヴァ」が遂に愛蔵版で登場!\r\n\r\n完結14巻で累計2500万部を突破したコミック版「エヴァ」。本書が遂に【愛蔵版】(全7巻)で登場! カバーイラストは描き下ろし、A5判での刊行! イラスト集にもなる【ポストカードブック】付き!\r\n\r\n愛蔵版は2巻ずつの内容を収録した、[全7巻]! カバーイラストはすべて描き下ろし、A5判での刊行!\r\n各巻ごとにグッズが付属したプレミアムな仕様となっています。\r\n\r\n1巻に付属するグッズの内容はこちら!!\r\n\r\n【ポストカードブック】\r\n貞本義行の「エヴァ」のイラストがポストカードブックに! イラスト集としてもポストカードとしても楽しめる!!', 1),
('9784041093696', 1, '【愛蔵版】新世紀エヴァンゲリオン 2 - Neon Genesis Evangelion (Collector\'s Edition)', '貞本 義行, カラー', 'Kadokawa', 'Kinokuniya Book Stores', 2021, 'Không có', 400000, 492000, 442000, 20, '../image/1748508615_image_244718_1_4942.webp', '2025-05-29 15:50:25', 'Bìa mềm', 344, 'Tiếng Nhật', '【愛蔵版】新世紀エヴァンゲリオン 2\r\n\r\nコミック版「エヴァ」が遂に愛蔵版で登場!\r\n\r\nコミック版「エヴァ」が【愛蔵版】(全7巻)で登場! カバーイラストは描き下ろし、A5判での刊行! 著者の直筆メッセージとイラストをプリントした【記念色紙】付き!\r\n\r\n愛蔵版は2巻ずつの内容を収録した、[全7巻]! カバーイラストはすべて描き下ろし、A5判での刊行!\r\n各巻ごとにグッズが付属したプレミアムな仕様となっています。\r\n\r\n2巻に付属するグッズの内容はこちら!!\r\n\r\n【サイン色紙 〈綾波レイ〉】\r\n貞本義行直筆のイラスト・メッセージ・サインが印刷された、愛蔵版ならではの逸品!!\r\n[色紙サイズ:約15cm×約13.5cm]', 1),
('9784041093702', 1, '【愛蔵版】新世紀エヴァンゲリオン 4 - Neon Genesis Evangelion (Collector\'s Edition)', '貞本 義行, カラー', 'Kadokawa', 'Kinokuniya Book Stores', 2022, 'Không có', 540000, 622000, 599000, 5, '../image/1748508864_image_230880.webp', '2025-05-29 15:54:24', 'Bìa mềm', 364, 'Tiếng Nhật', '【愛蔵版】新世紀エヴァンゲリオン 4 - Neon Genesis Evangelion (Collector\'s Edition)\r\n\r\nコミック版「エヴァ」が遂に愛蔵版で登場!\r\n\r\nコミック版「エヴァ」が【愛蔵版】(全7巻)で登場! カバーイラストは描き下ろし、A5判での刊行! 数々の「貞本エヴァ」のイラストを収録した【豪華イラスト集】付き!\r\n\r\n愛蔵版は2巻ずつの内容を収録した、[全7巻]! カバーイラストはすべて描き下ろし、A5判での刊行!\r\n各巻ごとにグッズが付属したプレミアムな仕様となっています。\r\n\r\n4巻に付属するグッズの内容はこちら!!\r\n\r\n【イラスト集 〈Part.I〉】\r\n貞本義行の「エヴァ」のイラストが、A5判サイズの約50ページのイラスト集に!', 1),
('9784041093719', 1, '【愛蔵版】新世紀エヴァンゲリオン 3 - Neon Genesis Evangelion (Collector\'s Edition)', '貞本 義行, カラー', 'Kadokawa', 'Kinokuniya Book Stores', 2022, 'Không có', 350000, 465000, 422000, 35, '../image/1748508713_image_244718_1_4943.jpg', '2025-05-29 15:51:53', 'Bìa mềm', 368, 'Tiếng Nhật', '【愛蔵版】新世紀エヴァンゲリオン 3\r\n\r\nコミック版「エヴァ」が遂に愛蔵版で登場!\r\n\r\nコミック版「エヴァ」が【愛蔵版】(全7巻)で登場! カバーイラストは描き下ろし、A5判での刊行! 著者の直筆メッセージとイラストをプリントした【記念色紙】付き!\r\n\r\n愛蔵版は2巻ずつの内容を収録した、[全7巻]! カバーイラストはすべて描き下ろし、A5判での刊行!\r\n各巻ごとにグッズが付属したプレミアムな仕様となっています。\r\n\r\n3巻に付属するグッズの内容はこちら!!\r\n\r\n【サイン色紙 〈惣流・アスカ・ラングレー〉】\r\n貞本義行直筆のイラスト・メッセージ・サインが印刷された、愛蔵版ならではの逸品!!\r\n[色紙サイズ:約15cm×約13.5cm]', 1),
('9784041093726', 1, '【愛蔵版】新世紀エヴァンゲリオン 5 - Neon Genesis Evangelion (Collector\'s Edition)', '貞本 義行, カラー', 'Kadokawa', 'Kinokuniya Book Stores', 2024, 'Không có', 468000, 541000, 400000, 20, '../image/1748508970_image_230881.jpg', '2025-05-29 15:56:10', 'Bìa mềm', 368, 'Tiếng Nhật', '【愛蔵版】新世紀エヴァンゲリオン 5 - Neon Genesis Evangelion (Collector\'s Edition)\r\n\r\nコミック版「エヴァ」が遂に愛蔵版で登場!\r\n\r\nコミック版「エヴァ」が【愛蔵版】(全7巻)で登場! カバーイラストは描き下ろし、A5判での刊行! 著者の直筆メッセージとイラストをプリントした【記念色紙】付き!\r\n\r\n愛蔵版は2巻ずつの内容を収録した、[全7巻]! カバーイラストはすべて描き下ろし、A5判での刊行!\r\n各巻ごとにグッズが付属したプレミアムな仕様となっています。\r\n\r\n5巻に付属するグッズの内容はこちら!!\r\n\r\n【サイン色紙 〈碇シンジ&渚カヲル〉】\r\n貞本義行直筆のイラスト・メッセージ・サインが印刷された、愛蔵版ならではの逸品!!\r\n[色紙サイズ:約15cm×約13.5cm]', 1),
('9786042268547', 2, 'Thám Tử Lừng Danh Conan - Tập 27 - Bản Nâng Cấp - Tặng Kèm Bookmark', 'Gosho Aoyama', 'Kim Đồng', 'Nhà Xuất Bản Kim Đồng', 2025, 'Nhiều Người Dịch', 30000, 35000, 33000, 100, '../image/1748509104_conan-27_ban-nang-cap_bia_bookmark.webp', '2025-05-29 15:58:24', 'Bìa mềm', 180, 'Tiếng Việt', 'Thám Tử Lừng Danh Conan - Tập 27\r\n\r\nGiáo viên nước ngoài vào dạy ở trường cấp 3 Teitan! Tên cô ấy là Jodie Saintemillion… Bề ngoài thì có vẻ vui tính, hiền hậu nhưng khuôn mặt thật dưới lớp mặt nạ đó là…!? Cùng với cô Jodie chưa rõ thân phận, một vụ án lại xảy ra là…!?\r\n\r\n', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`MaGio`),
  ADD UNIQUE KEY `MaKH` (`MaKH`);

--
-- Chỉ mục cho bảng `gio_hang_ct`
--
ALTER TABLE `gio_hang_ct`
  ADD PRIMARY KEY (`MaGio`,`MaSach`),
  ADD KEY `MaSach` (`MaSach`);

--
-- Chỉ mục cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
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
  ADD PRIMARY KEY (`MaKH`),
  ADD UNIQUE KEY `TenDN` (`TenDN`);

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
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  MODIFY `MaGio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  MODIFY `MaHA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `MaKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `loai_sach`
--
ALTER TABLE `loai_sach`
  MODIFY `MaLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD CONSTRAINT `gio_hang_ibfk_1` FOREIGN KEY (`MaKH`) REFERENCES `khach_hang` (`MaKH`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `gio_hang_ct`
--
ALTER TABLE `gio_hang_ct`
  ADD CONSTRAINT `gio_hang_ct_ibfk_1` FOREIGN KEY (`MaGio`) REFERENCES `gio_hang` (`MaGio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gio_hang_ct_ibfk_2` FOREIGN KEY (`MaSach`) REFERENCES `sach` (`MaSach`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
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
