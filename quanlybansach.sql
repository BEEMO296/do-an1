-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 12, 2025 lúc 07:36 AM
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
(4, ' 893525071629', '../image/1746292445_86-vol13.webp'),
(5, '8935280915091', '../image/1746292809_Screenshot 2025-05-04 001914.png'),
(6, '1920193006117', '../image/1746293320_resize_image.jpg'),
(7, '9781526628244', '../image/1746293843_image_239129.webp'),
(8, '0404202500', '../image/1746365824_combo-0110202411_1.jpg'),
(10, '8934974209072', '../image/1746406982_nxbtre_full_21442025_094448_1.webp'),
(11, '8935325026782', '../image/1747027587_b_a-1-nh_ng-c_u-chuy_n-kinh-d_.webp');

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
(2, 'Nguyễn Hoàng', 'testdk@gmail.com', 'testdk', 'testdk', '123123', '2000-01-01', 0, '2025-05-04 21:28:50', 1),
(3, 'Nguyễn Khôi', 'khoitest@gmail.com', 'khoitest', 'khoitest', '123123123', '1980-01-01', 1, '2025-05-03 21:17:18', 1),
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
('hoangadmin', 'test@gmail.com', '123', 1);

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
(' 893525071629', 1, '86-EIGHTY SIX - Ep.13 - Hỡi Chàng Thợ Săn Thân Mến - Bản Đặc Biệt - Tặng Kèm Set 4 Bookmark', 'Asato Asato, Shirabii, I-IV', 'Lao Động', 'IPM', 2025, 'Nhật Tuyến', 100000, 145000, 125000, 5000, '../image/1746292445_86-vol13.webp', '2025-05-04 21:27:36', 'Bìa mềm', 400, 'Tiếng Việt', 'Khủng bố đánh bom tự sát gây rúng động thủ đô, Legion tấn công dữ dội, dân tị nạn gia tăng đột biến, vô vàn suy đoán và hoài nghi khiến hỗn loạn phát sinh. Trong bối cảnh đó, một bộ phận dân Cộng hòa còn tổ chức bạo động vũ trang tại Liên bang. Đang làm nhiệm vụ hỗ trợ rút quân tại tiền tuyến, Lữ đoàn Biệt kích cũng bị điều đi trấn áp. Tuy nhiên, việc Lena còn bị giữ ở hậu phương khiến lòng Shin rối bời.\r\n\r\nMặt khác, Yuto dẫn theo nhóm Actaeon gồm Chitori, bước vào “hành trình cuối cùng” tìm về Cộng hòa. Nhận được tin từ họ, Dustin bị giằng xé giữa quá khứ và hiện tại, Ange không khỏi tự dằn vặt khi thấy cậu như vậy.\r\n\r\n“Lời nhắn gửi cho chàng trai thân thương ấy là lời nguyền, hay...”', 1),
('0404202500', 1, 'Combo Manga - Spy X Family: Tập 1 - 10 (Bộ 10 Tập)', 'Tatsuya Endo', 'Kim Đồng', 'Nhà Xuất Bản Kim Đồng', 2025, 'Phương Nga, Hồng Hà, Altair', 230000, 270000, 256000, 100, '../image/1746365824_combo-0110202411_1.jpg', '2025-05-04 20:37:04', 'Bìa mềm', 1899, 'Tiếng Việt', '1. Spy X Family Tập 1\r\n\r\nNhằm ngăn chặn âm mưu gây chiến, giữ vững nền hòa bình Đông - Tây, điệp viên hàng đầu của Westalis, Twilight phải xây dựng một gia đình và cho con theo học tại học viện danh giá nhất Ostania hòng tiếp cận yếu nhân cầm đầu phe chủ chiến của đất nước này: Desmon Donavan! Và thật tình cờ, đứa trẻ mà Twilight nhận làm \"\"con\"\" ở cô nhi viện, Anya, lại có khả năng đọc suy nghĩ của người khác. Chưa kể \"\"người vợ\"\" anh buộc phải chọn lựa trong lúc vội vàng, Yor, lại là một… sát thủ...!!\r\n\r\nBa người với lí do riêng để che giấu thân phận đã cùng chung sống với nhau dưới một mái nhà. Từ đây câu chuyện siêu hấp dẫn và hài hước về gia đình điệp viên chính thức mở ra...!!\r\n\r\nMùa đông năm nay, xin mời các bạn độc giả cùng theo dõi SPY x FAMILY - Siêu phẩm Manga mới với số lượng bản in lên tới hơn 1 triệu bản cho mỗi cuốn phát hành tại Nhật!! Với phiên bản Việt, mỗi cuốn sẽ được tặng kèm 1 Standee PVC cho lần phát hành đầu tiên, đừng bỏ lỡ nhé!!', 1),
('1920193006117', 1, '夏へのトンネル、さよならの出口', 'Mei Hachimoku', 'Shogakukan', 'Gagaga Bunko', 2019, 'Không có', 200000, 250000, NULL, 10, '../image/1746293320_resize_image.jpg', '2025-05-04 00:28:40', 'Bìa mềm', 326, 'Tiếng Nhật', '時空を超えるトンネルに挑む少年と少女の夏\r\n\r\n「ウラシマトンネルって、知ってる? そのトンネルに入ったら、欲しいものがなんでも手に入るの」\r\n「なんでも?」\r\n「なんでも。でもね、ウラシマトンネルはただでは帰してくれなくて――」\r\n海に面する田舎町・香崎。\r\n夏の日のある朝、高二の塔野カオルは、『ウラシマトンネル』という都市伝説を耳にした。\r\nそれは、中に入れば年を取る代わりに欲しいものがなんでも手に入るというお伽噺のようなトンネルだった。\r\nその日の夜、カオルは偶然にも『ウラシマトンネル』らしきトンネルを発見する。\r\n最愛の妹・カレンを五年前に事故で亡くした彼は、トンネルを前に、あることを思いつく。\r\n――『ウラシマトンネル』に入れば、カレンを取り戻せるかもしれない。\r\n放課後に一人でトンネルの検証を開始したカオルだったが、そんな彼の後をこっそりとつける人物がいた。\r\n転校生の花城あんず。クラスでは浮いた存在になっている彼女は、カオルに興味を持つ。\r\n二人は互いの欲しいものを手に入れるために協力関係を結ぶのだが……。\r\n優しさと切なさに満ちたひと夏の青春を繊細な筆致で描き、第13回小学館ライトノベル大賞のガガガ賞と審査員特別賞のW受賞を果たした話題作。', 1),
('8934974209072', 1, 'Attack On Titan - Tập 29', 'Hajime Isayama', 'Trẻ', 'NXB Trẻ', 2025, 'Torarika', 35000, 48000, 40800, 50000, '../image/1746406982_nxbtre_full_21442025_094448_1.webp', '2025-05-05 08:03:26', 'Bìa mềm', 192, 'Tiếng Việt', 'Sau nhiều năm sống yên ổn sau những bức tường thành cao lừng lững, loài người đã bắt đầu cảm nhận được nguy cơ diệt vong đến từ một giống loài khổng lồ mang tên Titan. Dù muốn dù không, họ buộc phải đứng lên, và đã đứng lên một cách đầy quyết tâm, mạnh mẽ để chống lại những kẻ thù hùng mạnh nhất.\r\n\r\nThế rồi họ dần nhận ra bản chất thật sự của những kẻ thù khổng lồ kia...', 1),
('8935250707961', 1, '86-EIGHTY SIX- Ep.6', ' ASATO ASATO, SHIRABII', 'Hồng Đức', 'IPM', 2022, 'Nhật Tuyến', 100000, 145000, 125000, 5000, '../image/1746291751_86-vol-6_bia-1.webp', '2025-05-04 00:07:25', 'Bìa mềm', 384, 'Tiếng Việt', 'Kiêu hãnh chiến đấu, rồi hi sinh. Số phận của Tám Sáu là vậy. Lòng ham sống đã bị họ bỏ lại ở quá khứ rất xa.\r\n\r\nHọ từng nghĩ, từng tin như vậy.\r\n\r\nThế nhưng, lối sống mà Tám Sáu theo đuổi bấy lâu dường như bị coi thường, bị xem là biểu hiện điên rồ không hơn không kém khi đặt cạnh cách mà những thiếu nữ người máy Sirin lao ra chiến trường, sẵn sàng bị giẫm nát, phá hủy và chôn vùi.\r\n\r\nShin khổ sở khi tìm kiếm ý nghĩa của việc sống tiếp. Lena lo lắng khôn nguôi khi cố gắng thấu hiểu Shin. Giữa lúc hai người còn đang luẩn quẩn trong vòng xoáy mâu thuẫn và hiểu lầm, chiến dịch công chiếm núi Ryuga đã rục rịch khai màn. Mang ý nghĩa sống còn đối với vận mệnh Vương quốc Liên hiệp, trận chiến này rồi sẽ có kết cục ra sao…?\r\n\r\nKhông chiến đấu thì không thể tồn tại. Nhưng không phải cứ chiến đấu là có thể sống', 1),
('8935280915091', 1, 'Đường hầm tới mùa hạ - Lối thoát của biệt ly - Bản siêu đặc biệt', 'Mei Hachimoku', 'Hà Nội', 'Thái Hà', 2023, 'Đỗ Nguyên', 229000, 500000, NULL, 500, '../image/1746292809_Screenshot 2025-05-04 001914.png', '2025-05-04 00:20:09', 'Bìa mềm', 314, 'Tiếng Việt', '“Cậu biết đường hầm Urashima chứ? Nghe bảo bước vào bên trong thì mọi mong ước sẽ biến thành hiện thực, nhưng phải đánh đổi bằng tuổi tác…”\r\n\r\n\r\n\r\nCậu học sinh cấp ba Tono Kaoru tình cờ nghe hóng được về truyền thuyết đô thị đó. Ngay đêm hôm ấy, cậu lại tình cờ tìm thấy một đường hầm có nét tương đồng…\r\n\r\nVào trong đường hầm, chưa biết chừng cậu sẽ đưa được đứa em gái đã mất năm năm trước quay về. Sau giờ học, Kaoru tiến hành điều tra về đường hầm này, ai ngờ lại bị cô bạn Hanashiro Anzu – học sinh mới chuyển tới - phát hiện ra. Hai cô cậu cộng tác với nhau để cùng đạt được mong ước của cả hai… Khởi đầu một mùa hè đầy những bất ngờ lý thú mà chưa ai từng biết tới. Đường hầm tới mùa hạ - Lối thoát của biệt ly, câu chuyện đầy ý nghĩa về tình cảm gia đình và tình yêu, là lời tạm biệt gửi tới những vui buồn trong quá khứ, tìm lại những điều đã đánh mất để có thể hướng tới tương lai. \r\n\r\n', 1),
('8935325026782', 4, 'Những Câu Chuyện Kinh Dị Khiến Bạn Dựng Tóc Gáy', 'Quỷ Cổ Nhân', 'Hà Nội', ' AZ Việt Nam', 2025, 'Đỗ Anh Dũng', 79000, 119000, 892000, 100000, '../image/1747027587_b_a-1-nh_ng-c_u-chuy_n-kinh-d_.webp', '2025-05-12 12:26:27', 'Bìa mềm', 192, 'Tiếng Việt', 'Quỷ dị - Hai từ ngắn gọn nhưng lại mang đến cho con người nhiều cảm xúc kích thích: Ớn lạnh, ám ảnh, rùng rợn!\r\n\r\nNhững câu chuyện kinh dị khiến bạn dựng tóc gáy – Tổng hợp những câu chuyện bí ẩn và ma mị dẫn dắt bạn đến một thế giới của “Quỷ vương, “xác sống” và “âm tào địa phủ”, đem đến cho bạn những trải nghiệm dựng tóc gáy.\r\n\r\nCẩn thận đấy! Chớ ngoảnh đầu lại đằng sau khi ở một mình.', 1),
('9781526628244', 6, 'Harry Potter - Christmas: A Movie Scrapbook', 'Warner Bros.', 'Bloomsbury', 'Macmillan Publishers', 2020, 'Không có', 350000, 436000, 376200, 20, '../image/1746293843_image_239129.webp', '2025-05-04 00:38:43', 'Bìa mềm', 48, 'Tiếng Anh', 'The snowy Great Hall festooned with Christmas trees, the shimmering Yule Ball, Mrs Weasley\'s festive jumpers – Christmas at Hogwarts is filled with magic and wonder.\r\n\r\nThis equally magical scrapbook takes readers on an interactive tour of the Christmas season in the Wizarding World, as seen in the Harry Potter films. With detailed profiles on everything from Harry\'s Firebolt broomstick – a festive gift from his godfather, Sirius Black – to Hogsmeade, this book includes concept illustrations, behind-the-scenes photographs, and fascinating reflections from actors and film-makers.\r\n\r\nFans can revisit key moments from the films, including Harry Potter\'s first Christmas at Hogwarts when he receives the Invisibility Cloak, as well as his holiday spent at number twelve, Grimmauld Place in Harry Potter and the Order of the Phoenix.\r\n\r\nDestined to be a must-have collectable for fans of Harry Potter, this book also comes packed with interactive inserts.', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

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
-- AUTO_INCREMENT cho bảng `hinhanh`
--
ALTER TABLE `hinhanh`
  MODIFY `MaHA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
