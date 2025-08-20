-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 20, 2025 lúc 06:58 AM
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
-- Cơ sở dữ liệu: `ht_phone`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `anhsanpham`
--

CREATE TABLE `anhsanpham` (
  `MaAnh` int(11) NOT NULL,
  `MaSanPham` int(11) NOT NULL,
  `URL_Anh` varchar(255) NOT NULL COMMENT 'Đường dẫn tới file ảnh'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `anhsanpham`
--

INSERT INTO `anhsanpham` (`MaAnh`, `MaSanPham`, `URL_Anh`) VALUES
(1, 1, 'gallery/iphone15-1.jpg'),
(2, 1, 'gallery/iphone15-2.jpg'),
(3, 1, 'gallery/iphone15-3.jpg'),
(4, 2, 'gallery/s24-1.jpg'),
(5, 2, 'gallery/s24-2.jpg'),
(6, 9, 'gallery/pixel8-1.jpg'),
(8, 11, 'gallery/iphone14-1.jpg'),
(9, 11, 'gallery/iphone14-2.jpg'),
(10, 12, 'gallery/iphone14-1.jpg'),
(11, 12, 'gallery/iphone14-2.jpg'),
(12, 13, 'gallery/a54-1.jpg'),
(13, 14, 'gallery/13tpro-1.jpg'),
(14, 15, 'gallery/reno10-1.jpg'),
(15, 16, 'gallery/pixel7a-1.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogcomments`
--

CREATE TABLE `blogcomments` (
  `MaComment` int(11) NOT NULL,
  `MaBlog` int(11) NOT NULL,
  `MaUser` int(11) DEFAULT NULL,
  `NoiDung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blogcomments`
--

INSERT INTO `blogcomments` (`MaComment`, `MaBlog`, `MaUser`, `NoiDung`) VALUES
(1, 1, 2, 'Bài viết rất hữu ích, cảm ơn admin!'),
(2, 3, 4, 'Đang phân vân em này, đọc xong bài của ad chắc chốt luôn.'),
(3, 4, 5, 'Mình đang dùng Pixel 8 Pro và rất hài lòng với các tính năng AI.'),
(4, 1, 8, 'Bài viết hay, cảm ơn đã chia sẻ!'),
(5, 2, 9, 'Rất hữu ích, mình đã áp dụng thử.'),
(6, 4, 10, 'Bài review chi tiết, giúp mình nhiều trong chọn mua.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogs`
--

CREATE TABLE `blogs` (
  `MaBlog` int(11) NOT NULL,
  `TieuDe` varchar(255) NOT NULL,
  `NoiDung` longtext NOT NULL,
  `AnhDaiDien` varchar(255) DEFAULT NULL,
  `MaUser` int(11) DEFAULT NULL,
  `NgayDang` timestamp NOT NULL DEFAULT current_timestamp(),
  `TheLoai` varchar(50) DEFAULT NULL,
  `ThoiGianDoc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blogs`
--

INSERT INTO `blogs` (`MaBlog`, `TieuDe`, `NoiDung`, `AnhDaiDien`, `MaUser`, `NgayDang`, `TheLoai`, `ThoiGianDoc`) VALUES
(1, 'The latest technologies to be used for VR in 2024', 'Nội dung bài viết về công nghệ VR mới nhất...', '/images/blog-vr.jpg', 1, '2025-08-11 11:21:17', 'Technology', 4),
(2, 'How can Web 3.0 Bring Changes to the Gaming?', 'Nội dung bài viết về Web 3.0 và Gaming...', '/images/blog-web3.jpg', 1, '2025-08-11 11:21:17', 'Technology', 5),
(3, 'NFT Blockchain Games That Might Take Off', 'Nội dung bài viết về các game NFT tiềm năng...', '/images/blog-nft.jpg', 1, '2025-08-11 11:21:17', 'Gaming', 3),
(4, 'Đánh giá Google Pixel 8 Pro: \"Bộ não\" AI trong một chiếc điện thoại', 'Nội dung bài viết đánh giá chi tiết Google Pixel 8 Pro...', '/images/blog-pixel8.jpg', 1, '2025-08-11 11:21:17', 'Review', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `MaCategory` int(11) NOT NULL,
  `TenCategory` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`MaCategory`, `TenCategory`) VALUES
(1, 'Apple'),
(5, 'Google'),
(4, 'OPPO'),
(2, 'Samsung'),
(3, 'Xiaomi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhangs`
--

CREATE TABLE `chitietdonhangs` (
  `MaChiTiet` int(11) NOT NULL,
  `MaDonHang` int(11) NOT NULL,
  `MaBienThe` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGia` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhangs`
--

INSERT INTO `chitietdonhangs` (`MaChiTiet`, `MaDonHang`, `MaBienThe`, `SoLuong`, `DonGia`) VALUES
(1, 1, 1, 1, 30990000.00),
(2, 1, 4, 1, 27990000.00),
(3, 2, 8, 1, 22990000.00),
(4, 2, 13, 1, 8990000.00),
(5, 3, 15, 1, 27990000.00),
(6, 1, 18, 1, 29990000.00),
(7, 1, 19, 2, 9490000.00),
(8, 2, 20, 1, 15990000.00),
(9, 2, 21, 1, 17990000.00),
(10, 3, 22, 1, 9990000.00),
(11, 4, 18, 1, 29990000.00),
(12, 5, 20, 1, 15990000.00),
(13, 6, 22, 1, 9990000.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhangs`
--

CREATE TABLE `donhangs` (
  `MaDonHang` int(11) NOT NULL,
  `MaUser` int(11) DEFAULT NULL,
  `NgayDat` timestamp NOT NULL DEFAULT current_timestamp(),
  `TongTien` decimal(15,2) NOT NULL,
  `TrangThai` enum('Chờ xác nhận','Đang xử lý','Đang giao','Đã giao','Đã hủy') NOT NULL DEFAULT 'Chờ xác nhận'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `donhangs`
--

INSERT INTO `donhangs` (`MaDonHang`, `MaUser`, `NgayDat`, `TongTien`, `TrangThai`) VALUES
(1, 2, '2025-08-11 11:21:17', 58980000.00, 'Đã giao'),
(2, 4, '2025-08-11 11:21:17', 31980000.00, 'Đang xử lý'),
(3, 5, '2025-08-11 11:21:17', 27990000.00, 'Đã giao'),
(4, 8, '2025-08-12 06:34:24', 29990000.00, 'Chờ xác nhận'),
(5, 9, '2025-08-12 06:34:24', 15990000.00, 'Chờ xác nhận'),
(6, 10, '2025-08-12 06:34:24', 9990000.00, 'Chờ xác nhận');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacungcaps`
--

CREATE TABLE `nhacungcaps` (
  `MaNhaCungCap` int(11) NOT NULL,
  `TenNhaCungCap` varchar(100) NOT NULL,
  `Website` varchar(255) DEFAULT NULL,
  `DiaChi` text DEFAULT NULL,
  `SoDienThoai` varchar(50) DEFAULT NULL,
  `MoTa` text DEFAULT NULL,
  `RatingPhanTram` int(11) DEFAULT 90 COMMENT 'Rating dạng %',
  `ShipOnTimePhanTram` int(11) DEFAULT 95 COMMENT 'Tỉ lệ giao đúng hẹn %',
  `ChatResponsePhanTram` int(11) DEFAULT 90 COMMENT 'Tỉ lệ phản hồi chat %',
  `TongLuotDanhGia` int(11) DEFAULT 0 COMMENT 'Tổng lượt đánh giá nhà cung cấp',
  `LogoURL` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhacungcaps`
--

INSERT INTO `nhacungcaps` (`MaNhaCungCap`, `TenNhaCungCap`, `Website`, `DiaChi`, `SoDienThoai`, `MoTa`, `RatingPhanTram`, `ShipOnTimePhanTram`, `ChatResponsePhanTram`, `TongLuotDanhGia`, `LogoURL`) VALUES
(1, 'Apple Inc.', 'https://www.apple.com', '1 Apple Park Way, Cupertino, California, U.S.', '(+1) 800–692–7753', 'Apple Inc. is an American multinational technology company that specializes in consumer electronics, software and online services.', 98, 100, 95, 1250, NULL),
(2, 'Samsung Electronics', 'https://www.samsung.com', '129 Samsung-ro, Yeongtong-gu, Suwon-si, Gyeonggi-do, South Korea', '(+82) 2-2255-0114', 'Samsung Electronics is a South Korean multinational major appliance and consumer electronics corporation headquartered in Yeongtong-gu, Suwon.', 95, 98, 92, 2100, NULL),
(3, 'Xiaomi Corporation', 'https://www.mi.com', 'Haidian District, Beijing, China', '(+86) 10-6060-6666', 'Xiaomi Corporation is a Chinese multinational electronics company founded in April 2010 and headquartered in Beijing. Xiaomi makes and invests in smartphones, mobile apps, laptops, home appliances, bags, shoes, consumer electronics, and many other products.', 94, 97, 88, 1850, NULL),
(4, 'OPPO', 'https://www.oppo.com/vn/', 'Dongguan, Guangdong, China', '(+86) 769-8607-6999', 'OPPO is a Chinese consumer electronics and mobile communications company headquartered in Dongguan, Guangdong. It is a subsidiary of BBK Electronics Corporation along with OnePlus, Vivo, and Realme.', 93, 96, 91, 1500, NULL),
(5, 'Google LLC', 'https://store.google.com/', '1600 Amphitheatre Parkway, Mountain View, California, U.S.', '(+1) 650-253-0000', 'Google LLC is an American multinational technology company that specializes in Internet-related services and products, which include online advertising technologies, a search engine, cloud computing, software, and hardware.', 97, 99, 93, 980, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `MaReview` int(11) NOT NULL,
  `MaSanPham` int(11) NOT NULL,
  `MaUser` int(11) DEFAULT NULL,
  `SoSao` tinyint(4) NOT NULL,
  `NoiDung` text DEFAULT NULL,
  `ThoiGian` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `reviews`
--

INSERT INTO `reviews` (`MaReview`, `MaSanPham`, `MaUser`, `SoSao`, `NoiDung`, `ThoiGian`) VALUES
(1, 1, 2, 5, 'Dòng iPhone 15 Pro Max này chụp ảnh quá đỉnh!', '2024-08-10 07:30:00'),
(2, 2, 3, 5, 'Bút S Pen trên S24 Ultra rất tiện cho công việc.', '2024-08-09 11:22:15'),
(3, 8, 4, 5, 'Giá rẻ mà camera 200MP, không thể tin được!', '2024-08-05 02:05:41'),
(4, 9, 5, 5, 'Camera của Pixel chụp ảnh chân thực, rất thích Android gốc.', '2024-07-28 14:45:10'),
(5, 7, 6, 4, 'Máy dùng ổn trong tầm giá, pin khá tốt.', '2024-07-15 04:12:30'),
(6, 5, 7, 4, 'Thiết kế gập rất thời trang, nhưng màn hình phụ hơi nhỏ.', '2024-07-11 09:50:00'),
(7, 12, 2, 5, 'Máy mạnh mẽ, camera rất chất. Rất đáng tiền!', '2025-08-12 11:55:57'),
(8, 13, 3, 4, 'Máy ổn, pin tốt và màn hình đẹp.', '2025-08-12 11:55:57'),
(9, 14, 4, 5, 'Ảnh chụp rất đẹp, hiệu năng mượt.', '2025-08-12 11:55:57'),
(10, 15, 5, 4, 'Chụp chân dung đẹp, sạc siêu nhanh.', '2025-08-12 11:55:57'),
(11, 16, 6, 5, 'Android gốc mượt, camera AI tốt.', '2025-08-12 11:55:57'),
(12, 12, 8, 5, 'Trải nghiệm mượt, camera ổn. Mình rất thích máy này.', '2025-08-12 11:55:57'),
(13, 13, 9, 4, 'Pin rất trâu, màn đẹp trong tầm giá.', '2025-08-12 11:55:57'),
(14, 14, 10, 5, 'Ảnh đẹp, hiệu năng ổn cho công việc nặng.', '2025-08-12 11:55:57'),
(15, 15, 8, 4, 'Sạc nhanh thật sự, camera ổn.', '2025-08-12 11:55:57'),
(16, 16, 9, 5, 'Android gốc, mượt và camera AI ấn tượng.', '2025-08-12 11:55:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanphams`
--

CREATE TABLE `sanphams` (
  `MaSanPham` int(11) NOT NULL,
  `TenSanPham` varchar(255) NOT NULL,
  `TieuDePhu` varchar(255) DEFAULT NULL COMMENT 'Dòng mô tả/tên phụ ngắn gọn của sản phẩm',
  `MoTaChiTiet` text DEFAULT NULL,
  `DacDiemNoiBat` varchar(255) DEFAULT NULL,
  `MoTaNgan_HTML` text DEFAULT NULL COMMENT 'Mô tả ngắn dạng gạch đầu dòng HTML',
  `Tags` varchar(255) DEFAULT NULL COMMENT 'Lưu các thẻ, phân cách bởi dấu phẩy',
  `AnhDaiDien` varchar(255) DEFAULT NULL,
  `MaCategory` int(11) DEFAULT NULL,
  `MaNhaCungCap` int(11) DEFAULT NULL,
  `NgayRaMat` date DEFAULT NULL,
  `SoLuotXem` int(11) NOT NULL DEFAULT 0,
  `IsFeatured` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanphams`
--

INSERT INTO `sanphams` (`MaSanPham`, `TenSanPham`, `TieuDePhu`, `MoTaChiTiet`, `DacDiemNoiBat`, `MoTaNgan_HTML`, `Tags`, `AnhDaiDien`, `MaCategory`, `MaNhaCungCap`, `NgayRaMat`, `SoLuotXem`, `IsFeatured`) VALUES
(1, 'iPhone 15 Pro Max', 'Chip A17 Pro, Khung Titan, Nút Action đa năng', 'Chip A17 Pro. Khung Titan.', 'Khung Titan siêu bền, siêu nhẹ', '<ul class=\"list-dot\"><li>Chip A17 Pro hiệu năng Pro</li><li>Khung Titan chuẩn hàng không vũ trụ</li><li>Hệ thống camera Pro zoom 5x</li><li>Nút Action tùy biến nhanh</li><li>Thời lượng pin dài nhất trên iPhone</li></ul>', 'New, Smartphone, Apple', '/images/iphone-15-pro-max.jpg', 1, 1, '2023-09-22', 1520, 1),
(2, 'Samsung Galaxy S24 Ultra', 'Camera 8K, Màn hình siêu sáng, Tích hợp S Pen', 'Galaxy AI tiện lợi. Bút S Pen quyền năng.', 'Tích hợp Galaxy AI thông minh', '<ul class=\"list-dot\"><li>Tích hợp Galaxy AI thông minh</li><li>Camera 200MP zoom 100x</li><li>Bút S Pen cho công việc và sáng tạo</li><li>Màn hình phẳng, siêu sáng</li><li>Hiệu năng đỉnh cao với Snapdragon 8 Gen 3</li></ul>', 'New, AI, Samsung', '/images/galaxy-s24-ultra.jpg', 2, 2, '2024-01-17', 2100, 1),
(3, 'Xiaomi 14', 'Hệ thống camera Leica chuyên nghiệp, Snapdragon 8 Gen 3', 'Hợp tác cùng Leica, nhiếp ảnh di động đỉnh cao.', 'Hệ thống camera Leica thế hệ mới', '<ul class=\"list-dot\"><li>Hệ thống camera đồng chế tác bởi Leica</li><li>Ống kính Summilux thế hệ mới</li><li>Màn hình CrystalRes AMOLED 120Hz</li><li>Snapdragon 8 Gen 3 mạnh mẽ</li></ul>', 'Leica, Flagship', '/images/xiaomi-14.jpg', 3, 3, '2023-10-26', 850, 0),
(4, 'Samsung Galaxy Z Fold5', 'Màn hình gập lớn, Trải nghiệm đa nhiệm như PC', 'Điện thoại gập tiên tiến nhất.', 'Trải nghiệm đa nhiệm như PC', '<ul class=\"list-dot\"><li>Màn hình gập lớn 7.6 inch</li><li>Thanh tác vụ đa nhiệm như PC</li><li>Bản lề Flex thế hệ mới, gập không kẽ hở</li><li>Bút S Pen Fold Edition</li></ul>', 'Gập, Foldable, Samsung', '/images/galaxy-z-fold5.jpg', 2, 2, '2023-07-26', 970, 1),
(5, 'OPPO Find N3 Flip', 'Gập vỏ sò thời trang, Camera Hasselblad cho ảnh chân dung', 'Smartphone gập vỏ sò với camera Hasselblad.', 'Camera Hasselblad cho ảnh chân dung', NULL, 'Gập, Flip, Hasselblad', '/images/oppo-find-n3-flip.jpg', 4, 4, '2023-08-29', 650, 0),
(6, 'iPhone 15 Plus', 'Màn hình lớn, Dynamic Island, Pin cả ngày dài', 'Màn hình lớn, Dynamic Island.', 'Màn hình Dynamic Island độc đáo', NULL, 'Apple, Big Screen', '/images/iphone-15-plus.jpg', 1, 1, '2023-09-22', 1100, 0),
(7, 'Samsung Galaxy S23 FE', 'Hiệu năng flagship, Camera Mắt Thần Bóng Đêm', 'Fan Edition với tính năng cao cấp.', 'Thiết kế cao cấp với giá tốt nhất', NULL, 'Fan Edition, Giá tốt', '/images/samsung-s23-fe.jpg', 2, 2, '2023-10-04', 1800, 1),
(8, 'Xiaomi Redmi Note 13 Pro', 'Camera 200MP siêu nét, Sạc nhanh 67W', 'Camera 200MP siêu nét, màn hình AMOLED 120Hz.', 'Camera 200MP siêu nét trong phân khúc', NULL, 'Camera 200MP, Tầm trung', '/images/redmi-note-13-pro.jpg', 3, 3, '2024-01-15', 2500, 1),
(9, 'Google Pixel 8 Pro', 'Sức mạnh AI từ chip Google Tensor G3, Camera tốt nhất', 'Trải nghiệm Android thuần khiết với sức mạnh của chip Google Tensor G3.', 'Sức mạnh AI từ chip Google Tensor G3', NULL, 'Google, AI Camera', '/images/pixel-8-pro.jpg', 5, 5, '2023-10-04', 1350, 1),
(10, 'iPhone 14 Pro Max', 'Chip A16 Bionic, Dynamic Island', 'Hiệu năng mạnh mẽ, camera 48MP, Dynamic Island tiện ích.', 'Dynamic Island mới mẻ', '<ul><li>Chip A16 Bionic</li><li>Camera 48MP</li><li>Màn hình Super Retina XDR</li></ul>', 'Apple, Flagship', '/images/iphone-14-pro-max.jpg', 1, 1, '2022-09-16', 500, 0),
(11, 'iPhone 14 Pro Max', 'Chip A16 Bionic, Dynamic Island', 'Hiệu năng mạnh mẽ, camera 48MP, Dynamic Island tiện ích.', 'Dynamic Island mới mẻ', '<ul><li>Chip A16 Bionic</li><li>Camera 48MP</li><li>Màn hình Super Retina XDR</li></ul>', 'Apple, Flagship', '/images/iphone-14-pro-max.jpg', 1, 1, '2022-09-16', 500, 0),
(12, 'iPhone 14 Pro Max (2022)', 'Chip A16 Bionic, Dynamic Island', 'Hiệu năng mạnh mẽ, camera 48MP, Dynamic Island tiện ích.', 'Dynamic Island', '<ul><li>Chip A16 Bionic</li><li>Camera 48MP</li><li>Màn hình Super Retina XDR</li></ul>', 'Apple, Flagship', '/images/iphone-14-pro-max.jpg', 1, 1, '2022-09-16', 500, 0),
(13, 'Samsung Galaxy A54', 'Màn hình Super AMOLED, Pin 5000mAh', 'Smartphone tầm trung; camera 50MP; pin trâu.', 'Pin 5000mAh', '<ul><li>Camera 50MP</li><li>Pin 5000mAh</li></ul>', 'Samsung, Midrange', '/images/galaxy-a54.jpg', 2, 2, '2023-03-15', 1200, 0),
(14, 'Xiaomi 13T Pro', 'Leica Camera, Dimensity 9200+', 'Hiệu năng cao, camera Leica chuyên nghiệp.', 'Camera Leica', '<ul><li>Leica camera</li><li>Hiệu năng mạnh</li></ul>', 'Leica, Flagship', '/images/xiaomi-13t-pro.jpg', 3, 3, '2023-09-26', 900, 1),
(15, 'OPPO Reno10 Pro+', 'Camera Tele 64MP, Sạc nhanh 100W', 'Camera Tele cho chân dung, sạc siêu nhanh.', 'Camera Tele 64MP', '<ul><li>Camera Tele 64MP</li><li>Sạc 100W</li></ul>', 'OPPO, Camera', '/images/oppo-reno10-proplus.jpg', 4, 4, '2023-07-20', 750, 0),
(16, 'Google Pixel 7a', 'Chip Tensor G2, Camera AI', 'Android gốc, camera AI tốt trong tầm giá.', 'Camera AI', '<ul><li>Chip Tensor G2</li><li>Camera AI</li></ul>', 'Google, Midrange', '/images/pixel-7a.jpg', 5, 5, '2023-05-10', 600, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham_bienthe`
--

CREATE TABLE `sanpham_bienthe` (
  `MaBienThe` int(11) NOT NULL,
  `MaSanPham` int(11) NOT NULL,
  `DungLuong` varchar(50) DEFAULT NULL,
  `MauSac` varchar(50) DEFAULT NULL,
  `Style` varchar(100) DEFAULT NULL COMMENT 'Kiểu dáng hoặc phiên bản phụ của sản phẩm',
  `GiaGoc` decimal(12,2) NOT NULL,
  `GiaKhuyenMai` decimal(12,2) DEFAULT NULL,
  `SoLuongTonKho` int(11) NOT NULL DEFAULT 0,
  `SoLuotBan` int(11) NOT NULL DEFAULT 0,
  `SKU` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham_bienthe`
--

INSERT INTO `sanpham_bienthe` (`MaBienThe`, `MaSanPham`, `DungLuong`, `MauSac`, `Style`, `GiaGoc`, `GiaKhuyenMai`, `SoLuongTonKho`, `SoLuotBan`, `SKU`) VALUES
(1, 1, '256GB', 'Titan Tự nhiên', 'Pro Max', 31500000.00, 30990000.00, 200, 150, NULL),
(2, 1, '512GB', 'Titan Tự nhiên', 'Pro Max', 36990000.00, NULL, 100, 80, NULL),
(3, 1, '256GB', 'Titan Xanh', 'Pro Max', 31500000.00, 30990000.00, 150, 120, NULL),
(4, 2, '256GB', 'Xám Titan', 'S24 Ultra', 28990000.00, 27990000.00, 250, 180, NULL),
(5, 2, '512GB', 'Xám Titan', 'S24 Ultra', 32490000.00, NULL, 120, 95, NULL),
(6, 3, '256GB', 'Đen', NULL, 19990000.00, NULL, 100, 70, NULL),
(7, 4, '512GB', 'Xanh Icy', 'Z Fold5', 38500000.00, 37500000.00, 60, 40, NULL),
(8, 5, '256GB', 'Vàng', NULL, 22990000.00, NULL, 80, 55, NULL),
(9, 5, '256GB', 'Đen', NULL, 22990000.00, NULL, 60, 45, NULL),
(10, 6, '128GB', 'Hồng', 'Plus', 24500000.00, 23990000.00, 150, 110, NULL),
(11, 6, '256GB', 'Xanh lá', 'Plus', 27990000.00, NULL, 90, 60, NULL),
(12, 7, '128GB', 'Xanh Mint', 'S23 FE', 12890000.00, 11990000.00, 300, 250, NULL),
(13, 8, '256GB', 'Tím', NULL, 9490000.00, 8990000.00, 400, 320, NULL),
(14, 9, '128GB', 'Obsidian', NULL, 25990000.00, NULL, 80, 65, NULL),
(15, 9, '256GB', 'Porcelain', NULL, 28990000.00, 27990000.00, 60, 45, NULL),
(16, 10, '256GB', 'Tím Deep Purple', NULL, 30990000.00, 29990000.00, 100, 80, NULL),
(17, 11, '256GB', 'Tím Deep Purple', NULL, 30990000.00, 29990000.00, 100, 80, NULL),
(18, 12, '256GB', 'Tím Deep Purple', 'Pro Max', 30990000.00, 29990000.00, 100, 80, NULL),
(19, 13, '128GB', 'Xanh Awesome', 'Standard', 9990000.00, 9490000.00, 200, 150, NULL),
(20, 14, '512GB', 'Xanh Alpine', 'Pro', 16990000.00, 15990000.00, 80, 50, NULL),
(21, 15, '256GB', 'Xám Starlight', 'Standard', 18990000.00, 17990000.00, 120, 70, NULL),
(22, 16, '128GB', 'Than Charcoal', 'Standard', 10990000.00, 9990000.00, 150, 90, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongsokythuat`
--

CREATE TABLE `thongsokythuat` (
  `MaSanPham` int(11) NOT NULL,
  `CongNgheManHinh` varchar(100) DEFAULT NULL,
  `DoPhanGiai` varchar(100) DEFAULT NULL,
  `ManHinhRong` varchar(50) DEFAULT NULL,
  `ChipXuLy` varchar(100) DEFAULT NULL,
  `RAM` varchar(50) DEFAULT NULL,
  `DungLuongPin` varchar(50) DEFAULT NULL,
  `TrongLuong` varchar(50) DEFAULT NULL,
  `KichThuoc` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thongsokythuat`
--

INSERT INTO `thongsokythuat` (`MaSanPham`, `CongNgheManHinh`, `DoPhanGiai`, `ManHinhRong`, `ChipXuLy`, `RAM`, `DungLuongPin`, `TrongLuong`, `KichThuoc`) VALUES
(1, 'OLED', '2796 x 1290', '6.7\"', 'Apple A17 Pro', '8 GB', '4422 mAh', '221 g', '159.9 x 77.9 x 8.9 mm'),
(2, 'Dynamic AMOLED 2X', '3120 x 1440', '6.8\"', 'Snapdragon 8 Gen 3', '12 GB', '5000 mAh', '234 g', '162.3 x 79 x 8.6 mm'),
(3, 'AMOLED', '2670 x 1200', '6.36\"', 'Snapdragon 8 Gen 3', '12 GB', '4610 mAh', '188 g', '152.8 x 71.5 x 8.2 mm'),
(4, 'Dynamic AMOLED 2X', '2176 x 1812', '7.6\"', 'Snapdragon 8 Gen 2', '12 GB', '4400 mAh', '253 g', '154.9 x 129.9 x 6.1 mm'),
(5, 'AMOLED', '2640 x 1080', '6.8\"', 'Dimensity 9200', '12 GB', '4300 mAh', '191 g', '156.7 x 74.3 x 7 mm'),
(6, 'OLED', '2796 x 1290', '6.7\"', 'Apple A16 Bionic', '6 GB', '4383 mAh', '194 g', '160.9 x 77.8 x 7.8 mm'),
(7, 'Dynamic AMOLED 2X', '2340 x 1080', '6.4\"', 'Exynos 2200', '8 GB', '4500 mAh', '209 g', '158 x 76.5 x 8.2 mm'),
(8, 'AMOLED', '2712 x 1220', '6.67\"', 'Snapdragon 7s Gen 2', '8 GB', '5100 mAh', '187 g', '161.1 x 75 x 8 mm'),
(9, 'LTPO OLED', '2992 x 1344', '6.7\"', 'Google Tensor G3', '12 GB', '5050 mAh', '213 g', '162.6 x 76.5 x 8.8 mm'),
(10, 'OLED', '2796 x 1290', '6.7\"', 'Apple A16 Bionic', '6 GB', '4323 mAh', '240 g', '160.7 x 77.6 x 7.85 mm'),
(11, 'OLED', '2796 x 1290', '6.7\"', 'Apple A16 Bionic', '6 GB', '4323 mAh', '240 g', '160.7 x 77.6 x 7.85 mm'),
(12, 'OLED', '2796 x 1290', '6.7\"', 'Apple A16 Bionic', '6 GB', '4323 mAh', '240 g', '160.7 x 77.6 x 7.85 mm'),
(13, 'Super AMOLED', '2340 x 1080', '6.4\"', 'Exynos 1380', '8 GB', '5000 mAh', '202 g', '158.2 x 76.7 x 8.2 mm'),
(14, 'AMOLED', '2712 x 1220', '6.67\"', 'Dimensity 9200+', '12 GB', '5000 mAh', '205 g', '162.2 x 75.7 x 8.49 mm'),
(15, 'AMOLED', '2772 x 1240', '6.74\"', 'Snapdragon 8+ Gen 1', '12 GB', '4700 mAh', '194 g', '162.9 x 74 x 8.28 mm'),
(16, 'OLED', '2400 x 1080', '6.1\"', 'Google Tensor G2', '8 GB', '4385 mAh', '193 g', '152 x 72.9 x 9 mm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `MaUser` int(11) NOT NULL,
  `TenUser` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `PasswordHash` varchar(255) NOT NULL,
  `Role` enum('admin','customer') NOT NULL DEFAULT 'customer',
  `AnhDaiDien` varchar(255) DEFAULT 'default-avatar.png' COMMENT 'URL ảnh đại diện của người dùng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`MaUser`, `TenUser`, `Email`, `PasswordHash`, `Role`, `AnhDaiDien`) VALUES
(1, 'Admin Quang Minh', 'admin@shopdienthoai.com', '$2y$10$NotRealHashButLooksLikeOne123', 'admin', 'default-avatar.png'),
(2, 'Nguyễn Văn An', 'nguyen.an@email.com', '$2y$10$AnotherFakeHashForDemoPurposes', 'customer', 'author-2.png'),
(3, 'Trần Thị Bích', 'tran.bich@email.com', '$2y$10$YetAnotherFakeHashForTestingNow', 'customer', 'author-3.png'),
(4, 'Lê Minh Khang', 'le.khang@email.com', '$2y$10$SomeOtherFakeHashForMoreData', 'customer', 'author-4.png'),
(5, 'Phạm Thị Duyên', 'pham.duyen@email.com', '$2y$10$HashForDuyenPham123', 'customer', 'author-5.png'),
(6, 'Hoàng Văn Long', 'hoang.long@email.com', '$2y$10$HashForHoangLong456', 'customer', 'author-2.png'),
(7, 'Đỗ Mỹ Linh', 'do.linh@email.com', '$2y$10$HashForDoMyLinh789', 'customer', 'author-3.png'),
(8, 'Người Dùng Mẫu A', 'usera@example.com', '$2y$10$FakeHashUserA', 'customer', 'default-avatar.png'),
(9, 'Người Dùng Mẫu B', 'userb@example.com', '$2y$10$FakeHashUserB', 'customer', 'default-avatar.png'),
(10, 'Người Dùng Mẫu C', 'userc@example.com', '$2y$10$FakeHashUserC', 'customer', 'default-avatar.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlists`
--

CREATE TABLE `wishlists` (
  `MaUser` int(11) NOT NULL,
  `MaSanPham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wishlists`
--

INSERT INTO `wishlists` (`MaUser`, `MaSanPham`) VALUES
(2, 3),
(3, 1),
(4, 2),
(5, 9),
(6, 1),
(7, 4),
(8, 13),
(8, 16),
(9, 12),
(10, 15);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `anhsanpham`
--
ALTER TABLE `anhsanpham`
  ADD PRIMARY KEY (`MaAnh`),
  ADD KEY `MaSanPham` (`MaSanPham`);

--
-- Chỉ mục cho bảng `blogcomments`
--
ALTER TABLE `blogcomments`
  ADD PRIMARY KEY (`MaComment`),
  ADD KEY `MaBlog` (`MaBlog`),
  ADD KEY `MaUser` (`MaUser`);

--
-- Chỉ mục cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`MaBlog`),
  ADD KEY `MaUser` (`MaUser`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`MaCategory`),
  ADD UNIQUE KEY `TenCategory` (`TenCategory`);

--
-- Chỉ mục cho bảng `chitietdonhangs`
--
ALTER TABLE `chitietdonhangs`
  ADD PRIMARY KEY (`MaChiTiet`),
  ADD KEY `MaDonHang` (`MaDonHang`),
  ADD KEY `MaBienThe` (`MaBienThe`);

--
-- Chỉ mục cho bảng `donhangs`
--
ALTER TABLE `donhangs`
  ADD PRIMARY KEY (`MaDonHang`),
  ADD KEY `MaUser` (`MaUser`);

--
-- Chỉ mục cho bảng `nhacungcaps`
--
ALTER TABLE `nhacungcaps`
  ADD PRIMARY KEY (`MaNhaCungCap`),
  ADD UNIQUE KEY `TenNhaCungCap` (`TenNhaCungCap`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`MaReview`),
  ADD KEY `MaSanPham` (`MaSanPham`),
  ADD KEY `MaUser` (`MaUser`);

--
-- Chỉ mục cho bảng `sanphams`
--
ALTER TABLE `sanphams`
  ADD PRIMARY KEY (`MaSanPham`),
  ADD KEY `MaCategory` (`MaCategory`),
  ADD KEY `MaNhaCungCap` (`MaNhaCungCap`);

--
-- Chỉ mục cho bảng `sanpham_bienthe`
--
ALTER TABLE `sanpham_bienthe`
  ADD PRIMARY KEY (`MaBienThe`),
  ADD UNIQUE KEY `SKU` (`SKU`),
  ADD KEY `MaSanPham` (`MaSanPham`);

--
-- Chỉ mục cho bảng `thongsokythuat`
--
ALTER TABLE `thongsokythuat`
  ADD PRIMARY KEY (`MaSanPham`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`MaUser`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Chỉ mục cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`MaUser`,`MaSanPham`),
  ADD KEY `MaSanPham` (`MaSanPham`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `anhsanpham`
--
ALTER TABLE `anhsanpham`
  MODIFY `MaAnh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `blogcomments`
--
ALTER TABLE `blogcomments`
  MODIFY `MaComment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `blogs`
--
ALTER TABLE `blogs`
  MODIFY `MaBlog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `MaCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `chitietdonhangs`
--
ALTER TABLE `chitietdonhangs`
  MODIFY `MaChiTiet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `donhangs`
--
ALTER TABLE `donhangs`
  MODIFY `MaDonHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `nhacungcaps`
--
ALTER TABLE `nhacungcaps`
  MODIFY `MaNhaCungCap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `MaReview` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `sanphams`
--
ALTER TABLE `sanphams`
  MODIFY `MaSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `sanpham_bienthe`
--
ALTER TABLE `sanpham_bienthe`
  MODIFY `MaBienThe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `MaUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `anhsanpham`
--
ALTER TABLE `anhsanpham`
  ADD CONSTRAINT `anhsanpham_ibfk_1` FOREIGN KEY (`MaSanPham`) REFERENCES `sanphams` (`MaSanPham`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `blogcomments`
--
ALTER TABLE `blogcomments`
  ADD CONSTRAINT `blogcomments_ibfk_1` FOREIGN KEY (`MaBlog`) REFERENCES `blogs` (`MaBlog`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `blogcomments_ibfk_2` FOREIGN KEY (`MaUser`) REFERENCES `users` (`MaUser`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`MaUser`) REFERENCES `users` (`MaUser`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `chitietdonhangs`
--
ALTER TABLE `chitietdonhangs`
  ADD CONSTRAINT `chitietdonhangs_ibfk_1` FOREIGN KEY (`MaDonHang`) REFERENCES `donhangs` (`MaDonHang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chitietdonhangs_ibfk_2` FOREIGN KEY (`MaBienThe`) REFERENCES `sanpham_bienthe` (`MaBienThe`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `donhangs`
--
ALTER TABLE `donhangs`
  ADD CONSTRAINT `donhangs_ibfk_1` FOREIGN KEY (`MaUser`) REFERENCES `users` (`MaUser`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`MaSanPham`) REFERENCES `sanphams` (`MaSanPham`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`MaUser`) REFERENCES `users` (`MaUser`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sanphams`
--
ALTER TABLE `sanphams`
  ADD CONSTRAINT `sanphams_ibfk_1` FOREIGN KEY (`MaCategory`) REFERENCES `categories` (`MaCategory`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `sanphams_ibfk_2` FOREIGN KEY (`MaNhaCungCap`) REFERENCES `nhacungcaps` (`MaNhaCungCap`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sanpham_bienthe`
--
ALTER TABLE `sanpham_bienthe`
  ADD CONSTRAINT `sanpham_bienthe_ibfk_1` FOREIGN KEY (`MaSanPham`) REFERENCES `sanphams` (`MaSanPham`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `thongsokythuat`
--
ALTER TABLE `thongsokythuat`
  ADD CONSTRAINT `thongsokythuat_ibfk_1` FOREIGN KEY (`MaSanPham`) REFERENCES `sanphams` (`MaSanPham`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_ibfk_1` FOREIGN KEY (`MaUser`) REFERENCES `users` (`MaUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wishlists_ibfk_2` FOREIGN KEY (`MaSanPham`) REFERENCES `sanphams` (`MaSanPham`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
