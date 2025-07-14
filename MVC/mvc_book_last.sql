-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 14, 2025 lúc 05:33 PM
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
-- Cơ sở dữ liệu: `mvc_book`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog_category`
--

CREATE TABLE `blog_category` (
  `MaDanhMuc` int(11) NOT NULL,
  `TenDanhMuc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `blog_category`
--

INSERT INTO `blog_category` (`MaDanhMuc`, `TenDanhMuc`) VALUES
(1, 'Tin Tức Sách'),
(2, 'Review Sách'),
(3, 'Góc Tác Giả');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog_comment`
--

CREATE TABLE `blog_comment` (
  `MaComment` int(11) NOT NULL,
  `MaBaiViet` int(11) NOT NULL,
  `MaNguoiDung` int(11) NOT NULL,
  `NoiDung` text NOT NULL,
  `ThoiGian` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `blog_comment`
--

INSERT INTO `blog_comment` (`MaComment`, `MaBaiViet`, `MaNguoiDung`, `NoiDung`, `ThoiGian`) VALUES
(1, 1, 2, 'Cảm ơn bài viết, danh sách rất hữu ích! Mình sẽ tìm mua ngay cuốn Shorter.', '2025-07-02 11:15:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog_newsletter_subscriber`
--

CREATE TABLE `blog_newsletter_subscriber` (
  `MaSubscriber` int(11) NOT NULL,
  `Email` varchar(150) NOT NULL,
  `NgayDangKy` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog_post`
--

CREATE TABLE `blog_post` (
  `MaBaiViet` int(11) NOT NULL,
  `TieuDe` varchar(255) NOT NULL,
  `MoTa` text DEFAULT NULL,
  `NoiDung` longtext DEFAULT NULL,
  `AnhBia` varchar(255) DEFAULT NULL,
  `MaDanhMuc` int(11) DEFAULT NULL,
  `MaNguoiDung` int(11) NOT NULL,
  `NgayDang` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `blog_post`
--

INSERT INTO `blog_post` (`MaBaiViet`, `TieuDe`, `MoTa`, `NoiDung`, `AnhBia`, `MaDanhMuc`, `MaNguoiDung`, `NgayDang`) VALUES
(1, 'Chào mừng tháng 7: Top sách mới không thể bỏ lỡ', 'Khám phá những tựa sách hay nhất vừa được phát hành trong tháng này, từ kỹ năng, kinh doanh đến văn học.', 'Nội dung chi tiết về các cuốn sách mới... Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', NULL, 1, 1, '2025-07-01 09:00:00'),
(2, 'Vài dòng suy ngẫm khi viết Chí Phèo', 'Nhà văn Nam Cao chia sẻ về quá trình thai nghén và những trăn trở khi sáng tác nên một trong những tác phẩm vĩ đại nhất của văn học Việt Nam.', 'Nội dung chi tiết về quá trình viết Chí Phèo... Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', NULL, 3, 13, '2025-07-05 14:20:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog_post_tag`
--

CREATE TABLE `blog_post_tag` (
  `MaBaiViet` int(11) NOT NULL,
  `MaTag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `blog_post_tag`
--

INSERT INTO `blog_post_tag` (`MaBaiViet`, `MaTag`) VALUES
(1, 1),
(1, 2),
(2, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog_tag`
--

CREATE TABLE `blog_tag` (
  `MaTag` int(11) NOT NULL,
  `TenTag` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `blog_tag`
--

INSERT INTO `blog_tag` (`MaTag`, `TenTag`) VALUES
(1, 'sach-moi'),
(2, 'best-seller'),
(3, 'van-hoc-viet-nam'),
(4, 'ky-nang');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `MaChiTietDonHang` int(11) NOT NULL,
  `MaDonHang` int(11) NOT NULL,
  `MaSach` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGia` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`MaChiTietDonHang`, `MaDonHang`, `MaSach`, `SoLuong`, `DonGia`) VALUES
(1, 1, 11, 2, 56000.00),
(2, 1, 5, 1, 135000.00),
(3, 2, 8, 1, 250000.00),
(4, 2, 1, 1, 189000.00),
(5, 2, 11, 1, 56000.00),
(6, 3, 12, 1, 78000.00),
(7, 3, 9, 1, 175000.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgiasanpham`
--

CREATE TABLE `danhgiasanpham` (
  `MaDanhGia` int(11) NOT NULL,
  `MaSach` int(11) NOT NULL,
  `MaNguoiDung` int(11) NOT NULL,
  `DiemXepHang` tinyint(4) NOT NULL CHECK (`DiemXepHang` >= 1 and `DiemXepHang` <= 5),
  `BinhLuan` text DEFAULT NULL,
  `NgayDanhGia` datetime DEFAULT current_timestamp(),
  `TrangThaiPheDuyet` varchar(20) DEFAULT 'Chờ duyệt'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhgiasanpham`
--

INSERT INTO `danhgiasanpham` (`MaDanhGia`, `MaSach`, `MaNguoiDung`, `DiemXepHang`, `BinhLuan`, `NgayDanhGia`, `TrangThaiPheDuyet`) VALUES
(1, 11, 2, 5, 'Tác phẩm kinh điển của văn học Việt Nam, đọc lại lần nào cũng thấy day dứt.', '2025-07-11 17:52:45', 'Đã duyệt'),
(2, 11, 4, 5, 'Một kiệt tác, xây dựng nhân vật và bối cảnh quá xuất sắc.', '2025-07-11 17:52:45', 'Đã duyệt'),
(3, 11, 5, 4, 'Cốt truyện bi kịch và sâu sắc. Rất đáng đọc.', '2025-07-11 17:52:45', 'Đã duyệt'),
(4, 5, 2, 4, 'Nhiều ý tưởng hay và có tính ứng dụng cao để làm việc hiệu quả hơn.', '2025-07-11 17:52:45', 'Đã duyệt'),
(5, 5, 6, 5, 'Cuốn sách đã thay đổi cách tôi làm việc. Rất khuyến khích!', '2025-07-11 17:52:45', 'Đã duyệt'),
(6, 13, 2, 4, 'Truyện nhẹ nhàng, dễ thương, đọc giải trí cuối tuần rất hợp lý.', '2025-07-11 17:52:45', 'Đã duyệt'),
(7, 13, 7, 3, 'Cốt truyện hơi cũ nhưng giọng văn mượt mà, đọc cũng ổn.', '2025-07-11 17:52:45', 'Đã duyệt'),
(8, 8, 2, 5, 'Tư liệu lịch sử quý giá, được viết lại một cách rất hào hùng và chi tiết.', '2025-07-11 17:52:45', 'Đã duyệt'),
(9, 8, 9, 5, 'Ghi lại một chặng đường lịch sử không thể nào quên của dân tộc.', '2025-07-11 17:52:45', 'Đã duyệt'),
(10, 1, 2, 5, 'Phân tích sâu sắc và đáng đọc về một giai đoạn lịch sử quan trọng.', '2025-07-11 17:54:20', 'Đã duyệt'),
(11, 1, 10, 5, 'Là một tài liệu tham khảo tuyệt vời cho những ai nghiên cứu về ngoại giao Việt Nam.', '2025-07-11 17:54:20', 'Đã duyệt'),
(12, 2, 2, 4, 'Cách tiếp cận mới lạ, nhiều kiến thức khoa học bổ ích.', '2025-07-11 17:54:20', 'Đã duyệt'),
(13, 2, 4, 4, 'Sách hay, giúp mình hiểu hơn về cơ chế hoạt động của não bộ và sự sáng tạo.', '2025-07-11 17:54:20', 'Đã duyệt'),
(14, 4, 2, 5, 'Rất cần thiết cho các bạn đang làm nghiên cứu sinh. Thực tế và hữu ích!', '2025-07-11 17:54:20', 'Đã duyệt'),
(15, 4, 6, 4, 'Giá như mình đọc được cuốn này sớm hơn. Tác giả chia sẻ rất chân thành.', '2025-07-11 17:54:20', 'Đã duyệt'),
(16, 6, 2, 3, 'Nội dung chủ yếu là tổng hợp lại các bài phát biểu, không có nhiều phân tích sâu.', '2025-07-11 17:54:20', 'Đã duyệt'),
(17, 6, 8, 4, 'Học hỏi được nhiều về cách diễn đạt và truyền cảm hứng từ một nhân vật lớn.', '2025-07-11 17:54:20', 'Đã duyệt'),
(18, 12, 2, 5, 'Câu chuyện rất cảm động và nhân văn. Hình minh họa cũng tuyệt đẹp.', '2025-07-11 17:54:20', 'Đã duyệt'),
(19, 12, 14, 5, 'Một cuốn sách thiếu nhi nhưng người lớn đọc cũng sẽ suy ngẫm. Rất hay!', '2025-07-11 17:54:20', 'Đã duyệt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diachi_nguoidung`
--

CREATE TABLE `diachi_nguoidung` (
  `MaDiaChi` int(11) NOT NULL,
  `MaNguoiDung` int(11) NOT NULL,
  `TenNguoiNhan` varchar(100) NOT NULL,
  `SoDienThoaiNhan` varchar(20) NOT NULL,
  `DiaChiChiTiet` text NOT NULL,
  `PhuongXa` varchar(100) DEFAULT NULL,
  `QuanHuyen` varchar(100) DEFAULT NULL,
  `TinhThanh` varchar(100) DEFAULT NULL,
  `LaMacDinh` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `diachi_nguoidung`
--

INSERT INTO `diachi_nguoidung` (`MaDiaChi`, `MaNguoiDung`, `TenNguoiNhan`, `SoDienThoaiNhan`, `DiaChiChiTiet`, `PhuongXa`, `QuanHuyen`, `TinhThanh`, `LaMacDinh`) VALUES
(1, 2, 'Khách Hàng A', '0909123456', '123 Đường ABC', 'Phường 4', 'Quận 5', 'Thành phố Hồ Chí Minh', 1),
(2, 13, 'Nhà văn Nam Cao', '0909987654', '456 Đường Văn Học', 'Phường Bến Nghé', 'Quận 1', 'Thành phố Hồ Chí Minh', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `MaDonHang` int(11) NOT NULL,
  `MaNguoiDung` int(11) DEFAULT NULL,
  `NgayDatHang` datetime DEFAULT current_timestamp(),
  `TongTien` decimal(12,2) NOT NULL,
  `TrangThaiDonHang` varchar(50) DEFAULT 'Đang xử lý',
  `MaDiaChiGiaoHang` int(11) DEFAULT NULL,
  `PhuongThucThanhToan` varchar(100) DEFAULT NULL,
  `GhiChuDonHang` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`MaDonHang`, `MaNguoiDung`, `NgayDatHang`, `TongTien`, `TrangThaiDonHang`, `MaDiaChiGiaoHang`, `PhuongThucThanhToan`, `GhiChuDonHang`) VALUES
(1, 2, '2025-07-10 10:30:00', 247000.00, 'Đã giao', 1, 'Thanh toán khi nhận hàng', NULL),
(2, 2, '2025-07-11 15:00:00', 495000.00, 'Đang xử lý', 1, 'Chuyển khoản', NULL),
(3, 13, '2025-07-12 11:45:00', 253000.00, 'Đang xử lý', 2, 'Ví điện tử', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `MaKhuyenMai` int(11) NOT NULL,
  `TenKhuyenMai` varchar(255) NOT NULL,
  `MoTa` text DEFAULT NULL,
  `LoaiKhuyenMai` varchar(50) DEFAULT NULL,
  `GiaTriGiam` decimal(10,2) DEFAULT NULL,
  `NgayBatDau` datetime NOT NULL,
  `NgayKetThuc` datetime NOT NULL,
  `DieuKienApDung` text DEFAULT NULL,
  `MaGiamGiaCoupon` varchar(50) DEFAULT NULL,
  `SoLuongGioiHan` int(11) DEFAULT NULL,
  `TrangThai` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `MaNguoiDung` int(11) NOT NULL,
  `HoTen` varchar(100) NOT NULL,
  `TenDangNhap` varchar(50) NOT NULL,
  `MatKhau` varchar(255) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `SoDienThoai` varchar(20) DEFAULT NULL,
  `MaVaiTro` int(11) NOT NULL,
  `NgayDangKy` datetime DEFAULT current_timestamp(),
  `AnhDaiDien` varchar(255) DEFAULT NULL,
  `WebsiteTacGia` varchar(255) DEFAULT NULL,
  `GhiChuTacGia` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`MaNguoiDung`, `HoTen`, `TenDangNhap`, `MatKhau`, `Email`, `SoDienThoai`, `MaVaiTro`, `NgayDangKy`, `AnhDaiDien`, `WebsiteTacGia`, `GhiChuTacGia`) VALUES
(1, 'Quang Trường', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin@bookstore.com', NULL, 5, '2025-07-11 16:43:32', NULL, NULL, NULL),
(2, 'Khách Hàng A', 'customer', 'e10adc3949ba59abbe56e057f20f883e', 'customer@example.com', NULL, 1, '2025-07-11 16:43:32', NULL, NULL, NULL),
(3, 'Nhiều tác giả', 'collective.author', 'e10adc3949ba59abbe56e057f20f883e', 'collective.author@example.com', NULL, 2, '2025-07-11 16:43:32', NULL, NULL, NULL),
(4, 'Joël Guillon', 'joel.guillon', 'e10adc3949ba59abbe56e057f20f883e', 'joel.guillon@example.com', NULL, 2, '2025-07-11 16:43:32', NULL, NULL, NULL),
(5, 'Bùi Thị Ngọc Lan', 'buingoclan', 'e10adc3949ba59abbe56e057f20f883e', 'buingoclan@example.com', NULL, 2, '2025-07-11 16:43:32', NULL, NULL, NULL),
(6, 'Phạm Hiệp', 'phamhiep', 'e10adc3949ba59abbe56e057f20f883e', 'phamhiep@example.com', NULL, 2, '2025-07-11 16:43:32', NULL, NULL, NULL),
(7, 'Alex Soojung-Kim Pang', 'alex.pang', 'e10adc3949ba59abbe56e057f20f883e', 'alex.pang@example.com', NULL, 2, '2025-07-11 16:43:32', NULL, NULL, NULL),
(8, 'Trương Vũ', 'truongvu', 'e10adc3949ba59abbe56e057f20f883e', 'truongvu@example.com', NULL, 2, '2025-07-11 16:43:32', NULL, NULL, NULL),
(9, 'Trần Văn Trà', 'tranvantra', 'e10adc3949ba59abbe56e057f20f883e', 'tranvantra@example.com', NULL, 2, '2025-07-11 16:43:32', NULL, NULL, NULL),
(10, 'Văn Tiến Dũng', 'vantiendung', 'e10adc3949ba59abbe56e057f20f883e', 'vantiendung@example.com', NULL, 2, '2025-07-11 16:43:32', NULL, NULL, NULL),
(11, 'Ngô Thảo', 'ngothao', 'e10adc3949ba59abbe56e057f20f883e', 'ngothao@example.com', NULL, 2, '2025-07-11 16:43:32', NULL, NULL, NULL),
(12, 'Dương Đình Lập', 'duongdinhlap', 'e10adc3949ba59abbe56e057f20f883e', 'duongdinhlap@example.com', NULL, 2, '2025-07-11 16:43:32', NULL, NULL, NULL),
(13, 'Nam Cao', 'namcao', 'e10adc3949ba59abbe56e057f20f883e', 'namcao@example.com', NULL, 2, '2025-07-11 16:43:32', NULL, NULL, NULL),
(14, 'Larissa Theule', 'larissa.theule', 'e10adc3949ba59abbe56e057f20f883e', 'larissa.theule@example.com', NULL, 2, '2025-07-11 16:43:32', NULL, NULL, NULL),
(15, 'Lộ Lộ', 'lolo', 'e10adc3949ba59abbe56e057f20f883e', 'lolo@example.com', NULL, 2, '2025-07-11 16:43:32', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhaxuatban`
--

CREATE TABLE `nhaxuatban` (
  `MaNXB` int(11) NOT NULL,
  `TenNXB` varchar(255) NOT NULL,
  `DiaChi` text DEFAULT NULL,
  `SoDienThoai` varchar(20) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhaxuatban`
--

INSERT INTO `nhaxuatban` (`MaNXB`, `TenNXB`, `DiaChi`, `SoDienThoai`, `Email`) VALUES
(1, 'NXB Quân đội nhân dân', NULL, NULL, NULL),
(2, 'Times Books', NULL, NULL, NULL),
(3, 'NXB Tổng hợp TP.HCM', NULL, NULL, NULL),
(4, 'NXB Dân trí', NULL, NULL, NULL),
(5, 'NXB Thế Giới', NULL, NULL, NULL),
(6, 'Nhà xuất bản Văn học', NULL, NULL, NULL),
(7, 'Nhà xuất bản Hà Nội', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sach`
--

CREATE TABLE `sach` (
  `MaSach` int(11) NOT NULL,
  `TenSach` varchar(255) NOT NULL,
  `MaNXB` int(11) DEFAULT NULL,
  `MaTheLoai` int(11) DEFAULT NULL,
  `NamXuatBan` int(11) DEFAULT NULL,
  `GiaBan` decimal(10,2) NOT NULL,
  `SoLuongTon` int(11) DEFAULT 0,
  `MoTaSach` text DEFAULT NULL,
  `AnhBia` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sach`
--

INSERT INTO `sach` (`MaSach`, `TenSach`, `MaNXB`, `MaTheLoai`, `NamXuatBan`, `GiaBan`, `SoLuongTon`, `MoTaSach`, `AnhBia`) VALUES
(1, 'Ngoại Giao Hồ Chí Minh Trong Khang Chiến Chống Mỹ', 1, 1, 2024, 189000.00, 75, 'Phân tích nghệ thuật ngoại giao của Chủ tịch Hồ Chí Minh trong cuộc kháng chiến chống Mỹ, cứu nước.', 'ls1.jpg'),
(2, 'Trực Giác và Thiên Bẩm Sáng Tạo Của Bạn MoZi', 2, 2, 2023, 159000.00, 110, 'Khám phá nền tảng thần kinh học của trực giác và cách khai phá tiềm năng sáng tạo bên trong bạn.', 'kt2.jpg'),
(3, 'Lý Thuyết về Dịch Thuật: Một Dẫn Nhập Ngắn', 3, 3, 2022, 89000.00, 95, 'Giới thiệu những khái niệm cốt lõi và các trường phái chính trong lý thuyết dịch thuật hiện đại.', 'kt4.jpg'),
(4, 'Để Vượt Qua 81 \"Kiếp Nạn\" Của Nghiên Cứu Sinh', 2, 4, 2023, 119000.00, 150, 'Cẩm nang sinh tồn dành cho các nghiên cứu sinh, giúp vượt qua những thử thách trên con đường học thuật.', 'kt1.jpg'),
(5, 'Shorter: Rút Ngắn Tuần Làm Việc', 4, 5, 2024, 135000.00, 200, 'Làm việc hiệu quả hơn, thông minh hơn và ít hơn với phương pháp rút ngắn tuần làm việc.', 'kt5.jpg'),
(6, 'Nói Hay Như Jack Ma: Ngộ Để Thông', 5, 6, 2021, 99000.00, 180, 'Tuyển tập những bài phát biểu và nghệ thuật diễn thuyết truyền cảm hứng của Jack Ma.', 'kt3.jpg'),
(7, 'Kết Thúc Cuộc Chiến Tranh 30 Năm', 1, 1, 2024, 210000.00, 80, 'Hồi ức của Thượng tướng Trần Văn Trà về những ngày cuối cùng của cuộc kháng chiến.', 'ls2.jpg'),
(8, 'Đại Thắng Mùa Xuân', 1, 1, 2024, 250000.00, 100, 'Tác phẩm kinh điển của Đại tướng Văn Tiến Dũng, ghi lại toàn cảnh cuộc Tổng tiến công và nổi dậy mùa Xuân 1975.', 'ls3.jpg'),
(9, '30 Năm Văn Học Kháng Chiến 1945 - 1975', 1, 1, 2025, 175000.00, 90, 'Tổng quan về nền văn học Việt Nam trong suốt giai đoạn kháng chiến cứu nước (1945 - 1975).', 'ls4.jpg'),
(10, 'Từ Trận Phai Khắt, Nà Ngần Đến Chiến Dịch Hồ Chí Minh', 1, 1, 2025, 195000.00, 85, 'Hành trình lịch sử của Quân đội Nhân dân Việt Nam từ những ngày đầu thành lập đến chiến thắng cuối cùng.', 'ls5.jpg'),
(11, 'Chí Phèo', 6, 7, 2022, 56000.00, 250, 'Tác phẩm kinh điển của nhà văn Nam Cao, một bức tranh chân thực về xã hội nông thôn Việt Nam trước Cách mạng.', 'image_7be685.jpg'),
(12, 'Kafka và cô búp bê', 7, 8, 2023, 78000.00, 120, 'Câu chuyện cảm động và đầy trí tưởng tượng về cuộc gặp gỡ giữa nhà văn Kafka và một cô bé bị mất búp bê.', 's2.webp'),
(13, 'Vì em gặp anh', 6, 9, 2021, 105000.00, 180, 'Một câu chuyện tình yêu lãng mạn, nhẹ nhàng và sâu lắng của tác giả Lộ Lộ.', 's2.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sach_khuyenmai`
--

CREATE TABLE `sach_khuyenmai` (
  `MaSach` int(11) NOT NULL,
  `MaKhuyenMai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sach_tacgia`
--

CREATE TABLE `sach_tacgia` (
  `MaSach` int(11) NOT NULL,
  `MaTacGia` int(11) NOT NULL,
  `VaiTro` varchar(100) NOT NULL DEFAULT 'Tác giả chính'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sach_tacgia`
--

INSERT INTO `sach_tacgia` (`MaSach`, `MaTacGia`, `VaiTro`) VALUES
(1, 3, 'Tác giả chính'),
(2, 4, 'Tác giả chính'),
(3, 5, 'Tác giả chính'),
(4, 6, 'Tác giả chính'),
(5, 7, 'Tác giả chính'),
(6, 8, 'Tác giả chính'),
(7, 9, 'Tác giả chính'),
(8, 10, 'Tác giả chính'),
(9, 11, 'Tác giả chính'),
(10, 12, 'Tác giả chính'),
(11, 13, 'Tác giả chính'),
(12, 14, 'Tác giả chính'),
(13, 15, 'Tác giả chính');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theloai`
--

CREATE TABLE `theloai` (
  `MaTheLoai` int(11) NOT NULL,
  `TenTheLoai` varchar(100) NOT NULL,
  `MoTa` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `theloai`
--

INSERT INTO `theloai` (`MaTheLoai`, `TenTheLoai`, `MoTa`) VALUES
(1, 'Lịch sử - Chính trị', NULL),
(2, 'Khoa học - Sáng tạo', NULL),
(3, 'Học thuật - Ngôn ngữ', NULL),
(4, 'Kỹ năng - Hướng nghiệp', NULL),
(5, 'Kinh doanh - Phát triển bản thân', NULL),
(6, 'Kỹ năng - Giao tiếp', NULL),
(7, 'Văn học Kinh điển', NULL),
(8, 'Văn học Thiếu nhi', NULL),
(9, 'Tiểu thuyết Lãng mạn', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vaitro`
--

CREATE TABLE `vaitro` (
  `MaVaiTro` int(11) NOT NULL,
  `TenVaiTro` varchar(50) NOT NULL,
  `MoTaVaiTro` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `vaitro`
--

INSERT INTO `vaitro` (`MaVaiTro`, `TenVaiTro`, `MoTaVaiTro`) VALUES
(1, 'Khách hàng', 'Người dùng cuối, có thể mua sắm và đánh giá sản phẩm.'),
(2, 'Tác giả', 'Người dùng có vai trò là tác giả của các đầu sách.'),
(3, 'Quản lý Nội dung', 'Nhân viên quản lý sản phẩm, bài viết.'),
(4, 'Quản lý Đơn hàng', 'Nhân viên xử lý đơn hàng và khách hàng.'),
(5, 'Super Admin', 'Quản trị viên cấp cao, có toàn quyền trên hệ thống.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlist`
--

CREATE TABLE `wishlist` (
  `MaNguoiDung` int(11) NOT NULL,
  `MaSach` int(11) NOT NULL,
  `NgayThem` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`MaDanhMuc`);

--
-- Chỉ mục cho bảng `blog_comment`
--
ALTER TABLE `blog_comment`
  ADD PRIMARY KEY (`MaComment`),
  ADD KEY `blogcomment_fk_post` (`MaBaiViet`),
  ADD KEY `blogcomment_fk_user` (`MaNguoiDung`);

--
-- Chỉ mục cho bảng `blog_newsletter_subscriber`
--
ALTER TABLE `blog_newsletter_subscriber`
  ADD PRIMARY KEY (`MaSubscriber`);

--
-- Chỉ mục cho bảng `blog_post`
--
ALTER TABLE `blog_post`
  ADD PRIMARY KEY (`MaBaiViet`),
  ADD KEY `blogpost_fk_category` (`MaDanhMuc`),
  ADD KEY `blogpost_fk_user` (`MaNguoiDung`);

--
-- Chỉ mục cho bảng `blog_post_tag`
--
ALTER TABLE `blog_post_tag`
  ADD PRIMARY KEY (`MaBaiViet`,`MaTag`),
  ADD KEY `blogposttag_fk_tag` (`MaTag`);

--
-- Chỉ mục cho bảng `blog_tag`
--
ALTER TABLE `blog_tag`
  ADD PRIMARY KEY (`MaTag`);

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`MaChiTietDonHang`),
  ADD KEY `ctdh_fk_donhang` (`MaDonHang`),
  ADD KEY `ctdh_fk_sach` (`MaSach`);

--
-- Chỉ mục cho bảng `danhgiasanpham`
--
ALTER TABLE `danhgiasanpham`
  ADD PRIMARY KEY (`MaDanhGia`),
  ADD KEY `danhgia_fk_sach` (`MaSach`),
  ADD KEY `danhgia_fk_nguoidung` (`MaNguoiDung`);

--
-- Chỉ mục cho bảng `diachi_nguoidung`
--
ALTER TABLE `diachi_nguoidung`
  ADD PRIMARY KEY (`MaDiaChi`),
  ADD KEY `diachi_fk_nguoidung` (`MaNguoiDung`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`MaDonHang`),
  ADD KEY `donhang_fk_nguoidung` (`MaNguoiDung`),
  ADD KEY `donhang_fk_diachi` (`MaDiaChiGiaoHang`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`MaKhuyenMai`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`MaNguoiDung`),
  ADD KEY `nguoidung_fk_vaitro` (`MaVaiTro`);

--
-- Chỉ mục cho bảng `nhaxuatban`
--
ALTER TABLE `nhaxuatban`
  ADD PRIMARY KEY (`MaNXB`);

--
-- Chỉ mục cho bảng `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`MaSach`),
  ADD KEY `sach_fk_nxb` (`MaNXB`),
  ADD KEY `sach_fk_theloai` (`MaTheLoai`);

--
-- Chỉ mục cho bảng `sach_khuyenmai`
--
ALTER TABLE `sach_khuyenmai`
  ADD PRIMARY KEY (`MaSach`,`MaKhuyenMai`),
  ADD KEY `sachkhuyenmai_fk_khuyenmai` (`MaKhuyenMai`);

--
-- Chỉ mục cho bảng `sach_tacgia`
--
ALTER TABLE `sach_tacgia`
  ADD PRIMARY KEY (`MaSach`,`MaTacGia`),
  ADD KEY `sachtacgia_fk_tacgia` (`MaTacGia`);

--
-- Chỉ mục cho bảng `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`MaTheLoai`);

--
-- Chỉ mục cho bảng `vaitro`
--
ALTER TABLE `vaitro`
  ADD PRIMARY KEY (`MaVaiTro`);

--
-- Chỉ mục cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`MaNguoiDung`,`MaSach`),
  ADD KEY `wishlist_fk_sach` (`MaSach`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `MaDanhMuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `blog_comment`
--
ALTER TABLE `blog_comment`
  MODIFY `MaComment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `blog_newsletter_subscriber`
--
ALTER TABLE `blog_newsletter_subscriber`
  MODIFY `MaSubscriber` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `MaBaiViet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `blog_tag`
--
ALTER TABLE `blog_tag`
  MODIFY `MaTag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `MaChiTietDonHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `danhgiasanpham`
--
ALTER TABLE `danhgiasanpham`
  MODIFY `MaDanhGia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `diachi_nguoidung`
--
ALTER TABLE `diachi_nguoidung`
  MODIFY `MaDiaChi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `MaDonHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `MaKhuyenMai` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `MaNguoiDung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `nhaxuatban`
--
ALTER TABLE `nhaxuatban`
  MODIFY `MaNXB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `sach`
--
ALTER TABLE `sach`
  MODIFY `MaSach` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `theloai`
--
ALTER TABLE `theloai`
  MODIFY `MaTheLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `vaitro`
--
ALTER TABLE `vaitro`
  MODIFY `MaVaiTro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `blog_comment`
--
ALTER TABLE `blog_comment`
  ADD CONSTRAINT `blogcomment_fk_post` FOREIGN KEY (`MaBaiViet`) REFERENCES `blog_post` (`MaBaiViet`) ON DELETE CASCADE,
  ADD CONSTRAINT `blogcomment_fk_user` FOREIGN KEY (`MaNguoiDung`) REFERENCES `nguoidung` (`MaNguoiDung`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `blog_post`
--
ALTER TABLE `blog_post`
  ADD CONSTRAINT `blogpost_fk_category` FOREIGN KEY (`MaDanhMuc`) REFERENCES `blog_category` (`MaDanhMuc`) ON DELETE SET NULL,
  ADD CONSTRAINT `blogpost_fk_user` FOREIGN KEY (`MaNguoiDung`) REFERENCES `nguoidung` (`MaNguoiDung`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `blog_post_tag`
--
ALTER TABLE `blog_post_tag`
  ADD CONSTRAINT `blogposttag_fk_post` FOREIGN KEY (`MaBaiViet`) REFERENCES `blog_post` (`MaBaiViet`) ON DELETE CASCADE,
  ADD CONSTRAINT `blogposttag_fk_tag` FOREIGN KEY (`MaTag`) REFERENCES `blog_tag` (`MaTag`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `ctdh_fk_donhang` FOREIGN KEY (`MaDonHang`) REFERENCES `donhang` (`MaDonHang`) ON DELETE CASCADE,
  ADD CONSTRAINT `ctdh_fk_sach` FOREIGN KEY (`MaSach`) REFERENCES `sach` (`MaSach`);

--
-- Các ràng buộc cho bảng `danhgiasanpham`
--
ALTER TABLE `danhgiasanpham`
  ADD CONSTRAINT `danhgia_fk_nguoidung` FOREIGN KEY (`MaNguoiDung`) REFERENCES `nguoidung` (`MaNguoiDung`) ON DELETE CASCADE,
  ADD CONSTRAINT `danhgia_fk_sach` FOREIGN KEY (`MaSach`) REFERENCES `sach` (`MaSach`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `diachi_nguoidung`
--
ALTER TABLE `diachi_nguoidung`
  ADD CONSTRAINT `diachi_fk_nguoidung` FOREIGN KEY (`MaNguoiDung`) REFERENCES `nguoidung` (`MaNguoiDung`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_fk_diachi` FOREIGN KEY (`MaDiaChiGiaoHang`) REFERENCES `diachi_nguoidung` (`MaDiaChi`) ON DELETE SET NULL,
  ADD CONSTRAINT `donhang_fk_nguoidung` FOREIGN KEY (`MaNguoiDung`) REFERENCES `nguoidung` (`MaNguoiDung`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD CONSTRAINT `nguoidung_fk_vaitro` FOREIGN KEY (`MaVaiTro`) REFERENCES `vaitro` (`MaVaiTro`);

--
-- Các ràng buộc cho bảng `sach`
--
ALTER TABLE `sach`
  ADD CONSTRAINT `sach_fk_nxb` FOREIGN KEY (`MaNXB`) REFERENCES `nhaxuatban` (`MaNXB`) ON DELETE SET NULL,
  ADD CONSTRAINT `sach_fk_theloai` FOREIGN KEY (`MaTheLoai`) REFERENCES `theloai` (`MaTheLoai`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `sach_khuyenmai`
--
ALTER TABLE `sach_khuyenmai`
  ADD CONSTRAINT `sachkhuyenmai_fk_khuyenmai` FOREIGN KEY (`MaKhuyenMai`) REFERENCES `khuyenmai` (`MaKhuyenMai`) ON DELETE CASCADE,
  ADD CONSTRAINT `sachkhuyenmai_fk_sach` FOREIGN KEY (`MaSach`) REFERENCES `sach` (`MaSach`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `sach_tacgia`
--
ALTER TABLE `sach_tacgia`
  ADD CONSTRAINT `sachtacgia_fk_sach` FOREIGN KEY (`MaSach`) REFERENCES `sach` (`MaSach`) ON DELETE CASCADE,
  ADD CONSTRAINT `sachtacgia_fk_tacgia` FOREIGN KEY (`MaTacGia`) REFERENCES `nguoidung` (`MaNguoiDung`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_fk_nguoidung` FOREIGN KEY (`MaNguoiDung`) REFERENCES `nguoidung` (`MaNguoiDung`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlist_fk_sach` FOREIGN KEY (`MaSach`) REFERENCES `sach` (`MaSach`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
