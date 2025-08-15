<?php
class MasterModel
{
    protected static $db = null;
    // Hàm khởi tạo của lớp MasterModel
    // Hàm này sẽ được gọi khi tạo một đối tượng của lớp MasterModel
    protected static function getDB()
    {
        if (self::$db === null) {
            self::$db = Connect::getInstance();
        }
        return self::$db;
    }
    //    public static function __construct() // hàm khỏi tạo: không thể sử dụng từ khóa public cùng với static
    public function __construct() {}

    //Hàm được dùng để đổ dữ liệu ra bảng khi gán giá trị bảng
    protected function get_all_from($table)
    {
        $db = self::getDB();
        $select = "select * from $table";
        $result = $db->getlist($select);
        return $result;
    }

    protected function ThemSP($title, $price, $img)
    {
        $db = self::getDB();
    }

    protected function get_by_id($table, $column, $value)
    {
        $db = self::getDB();
        $select = "select * from $table where $column = '$value'";
        $result = $db->getInstance($select); # tra ve 1 dong => thay phuong thuc getList bang getInstance
        return $result;
    }



    public function get_book_all_by_date_6b()
    {
        $select = <<<SQL
        SELECT
            s.MaSach,
            s.TenSach,
            s.AnhBia,
            s.GiaBan,
            COALESCE(AVG(d.DiemXepHang), 0) AS DiemTrungBinh,
            COUNT(d.MaDanhGia) AS TongLuotDanhGia,
            -- SỬA LỖI: Thêm DISTINCT để chỉ lấy các tên tác giả duy nhất
            GROUP_CONCAT(DISTINCT tg.HoTen SEPARATOR ', ') AS CacTacGia,
            (
                SELECT COALESCE(SUM(ctdh.SoLuong), 0)
                FROM chitietdonhang AS ctdh
                WHERE ctdh.MaSach = s.MaSach
            ) AS SoLuotMua
        FROM
            sach AS s
        LEFT JOIN
            danhgiasanpham AS d ON s.MaSach = d.MaSach
        LEFT JOIN
            nhaxuatban AS nxb ON s.MaNXB = nxb.MaNXB
        LEFT JOIN
            sach_tacgia AS st ON s.MaSach = st.MaSach
        LEFT JOIN
            nguoidung AS tg ON st.MaTacGia = tg.MaNguoiDung
        GROUP BY
            s.MaSach, s.TenSach, s.AnhBia, s.GiaBan
        ORDER BY
            s.MaSach DESC
        LIMIT 6;
    SQL;
        $db = self::getDB();
        $result = $db->getlist($select);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }



    public function get_best_selling_books() // Đổi tên hàm cho rõ nghĩa
    {
        $select = <<<SQL
            SELECT
                s.MaSach,
                s.TenSach,
                s.AnhBia,
                s.GiaBan,
                COALESCE(AVG(d.DiemXepHang), 0) AS DiemTrungBinh,
                COUNT(DISTINCT d.MaDanhGia) AS TongLuotDanhGia,
                GROUP_CONCAT(DISTINCT tg.HoTen SEPARATOR ', ') AS CacTacGia,
                (
                    SELECT COALESCE(SUM(ctdh.SoLuong), 0)
                    FROM chitietdonhang AS ctdh
                    WHERE ctdh.MaSach = s.MaSach
                ) AS SoLuotMua
            FROM
                sach AS s
            LEFT JOIN
                danhgiasanpham AS d ON s.MaSach = d.MaSach
            LEFT JOIN
                nhaxuatban AS nxb ON s.MaNXB = nxb.MaNXB
            LEFT JOIN
                theloai AS tl ON s.MaTheLoai = tl.MaTheLoai
            LEFT JOIN
                sach_tacgia AS st ON s.MaSach = st.MaSach
            LEFT JOIN
                nguoidung AS tg ON st.MaTacGia = tg.MaNguoiDung
            GROUP BY
                s.MaSach
            -- THAY ĐỔI (1): Sắp xếp theo số lượt mua giảm dần
            ORDER BY
                SoLuotMua DESC
            -- THAY ĐỔI (2): Giới hạn chỉ lấy 7 kết quả
            LIMIT 7;
        SQL;

        $db = self::getDB();
        $stmt = $db->getlist($select);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }






    public function get_book_all_by_date()
    {
        $select = <<<SQL
        SELECT
            s.MaSach,
            s.TenSach,
            s.AnhBia,
            s.GiaBan,
            COALESCE(AVG(d.DiemXepHang), 0) AS DiemTrungBinh,
            COUNT(d.MaDanhGia) AS TongLuotDanhGia,
            -- SỬA LỖI: Thêm DISTINCT để chỉ lấy các tên tác giả duy nhất
            GROUP_CONCAT(DISTINCT tg.HoTen SEPARATOR ', ') AS CacTacGia,
            (
                SELECT COALESCE(SUM(ctdh.SoLuong), 0)
                FROM chitietdonhang AS ctdh
                WHERE ctdh.MaSach = s.MaSach
            ) AS SoLuotMua
        FROM
            sach AS s
        LEFT JOIN
            danhgiasanpham AS d ON s.MaSach = d.MaSach
        LEFT JOIN
            nhaxuatban AS nxb ON s.MaNXB = nxb.MaNXB
        LEFT JOIN
            sach_tacgia AS st ON s.MaSach = st.MaSach
        LEFT JOIN
            nguoidung AS tg ON st.MaTacGia = tg.MaNguoiDung
        GROUP BY
            s.MaSach, s.TenSach, s.AnhBia, s.GiaBan
        ORDER BY
            s.MaSach DESC
        LIMIT 12;
    SQL;
        $db = self::getDB();
        $result = $db->getlist($select);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function get_book_by_price()
    {
        $db = self::getDB();
        $select = <<<SQL
        SELECT
            s.MaSach,
            s.TenSach,
            s.AnhBia,
            s.GiaBan,
            COALESCE(AVG(d.DiemXepHang), 0) AS DiemTrungBinh,
            COUNT(d.MaDanhGia) AS TongLuotDanhGia,
            -- Thêm tên tác giả
            GROUP_CONCAT(DISTINCT tg.HoTen SEPARATOR ', ') AS CacTacGia
        FROM
            sach AS s
        LEFT JOIN
            danhgiasanpham AS d ON s.MaSach = d.MaSach
        -- Nối thêm 2 bảng để lấy tên tác giả
        LEFT JOIN
            sach_tacgia AS st ON s.MaSach = st.MaSach
        LEFT JOIN
            nguoidung AS tg ON st.MaTacGia = tg.MaNguoiDung
        GROUP BY
            s.MaSach, s.TenSach, s.AnhBia, s.GiaBan
        ORDER BY
            s.GiaBan DESC 
        LIMIT 12;
        SQL;
        $result = $db->getlist($select);
        return $result;
    }
    public function get_by_id_sach($id)
    {
        $db = self::getDB();
        $select = <<<SQL
        SELECT
            s.*, -- Lấy tất cả các cột từ bảng sách
            nxb.TenNXB,
            tl.TenTheLoai,
            GROUP_CONCAT(DISTINCT tg.HoTen SEPARATOR ', ') AS CacTacGia,
            (
                SELECT COALESCE(SUM(ctdh.SoLuong), 0)
                FROM chitietdonhang AS ctdh
                WHERE ctdh.MaSach = s.MaSach
            ) AS SoLuotMua
        FROM
            sach AS s
        LEFT JOIN
            nhaxuatban AS nxb ON s.MaNXB = nxb.MaNXB
        LEFT JOIN
            theloai AS tl ON s.MaTheLoai = tl.MaTheLoai
        LEFT JOIN
            sach_tacgia AS st ON s.MaSach = st.MaSach
        LEFT JOIN
            nguoidung AS tg ON st.MaTacGia = tg.MaNguoiDung
        WHERE
            s.MaSach = :id
        GROUP BY
            s.MaSach;
        SQL;
        $result = $db->getInstance_params($select, ['id' => $id]);
        return $result;
    }
    public function get_by_id_sach_thongke_review($id)
    {
        $db = self::getDB();
        $select = <<<SQL
        SELECT
            COUNT(MaDanhGia) AS TongLuotDanhGia,
            COALESCE(AVG(DiemXepHang), 0) AS DiemTrungBinh
        FROM
            danhgiasanpham
        WHERE
            MaSach = :id
            AND TrangThaiPheDuyet = 'Đã duyệt';
        SQL;
        $result = $db->getInstance_params($select, ['id' => $id]);
        return $result;
    }
    public function get_by_id_sach_comment($id)
    {
        $db = self::getDB();
        $select = <<<SQL
        SELECT
            c.BinhLuan,
            c.NgayDanhGia,
            u.HoTen AS TenNguoiBinhLuan,
            u.AnhDaiDien
        FROM
            danhgiasanpham AS c
        JOIN
            nguoidung AS u ON c.MaNguoiDung = u.MaNguoiDung
        WHERE
            c.MaSach = :id
        ORDER BY
            c.NgayDanhGia DESC;
        SQL;
        $result = $db->getInstance_params($select, ['id' => $id]);
        return $result;
    }
    public function get_phone_best_seller()
    {
        $select = <<<SQL
        SELECT
            s.MaSanPham,
            s.TenSanPham,
            s.AnhDaiDien,
            s.NgayRaMat,
            ncc.TenNhaCungCap,
            bt.MaBienThe,
            bt.DungLuong,
            bt.MauSac,
            bt.GiaGoc,
            bt.GiaKhuyenMai,
            bt.SoLuotBan,
            tsk.ManHinhRong,
            tsk.ChipXuLy,
            tsk.RAM,
            
            -- Dùng subquery để lấy điểm đánh giá chung cho dòng sản phẩm
            (SELECT COALESCE(AVG(r.SoSao), 0) FROM Reviews r WHERE r.MaSanPham = s.MaSanPham) AS DiemTrungBinh,
            (SELECT COUNT(r.MaReview) FROM Reviews r WHERE r.MaSanPham = s.MaSanPham) AS TongLuotDanhGia
        FROM
            SanPham_BienThe AS bt
        INNER JOIN
            SanPhams AS s ON bt.MaSanPham = s.MaSanPham
        LEFT JOIN
            NhaCungCaps AS ncc ON s.MaNhaCungCap = ncc.MaNhaCungCap
        LEFT JOIN
            ThongSoKyThuat AS tsk ON s.MaSanPham = tsk.MaSanPham
        ORDER BY
            -- Sắp xếp theo số lượt bán của từng biến thể
            bt.SoLuotBan DESC
        LIMIT 8;
        SQL;
        $db = self::getDB();
        $result = $db->getlist($select);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function get_phone_last_deals()
    {
        $select = <<<SQL
        SELECT
            s.MaSanPham,
            s.TenSanPham,
            s.AnhDaiDien,
            s.DacDiemNoiBat, -- Lấy ra đặc điểm nổi bật đã thêm
            ncc.TenNhaCungCap,
            bt.MaBienThe,
            bt.DungLuong,
            bt.MauSac,
            bt.GiaGoc,
            bt.GiaKhuyenMai,
            SUM(ctdh.SoLuong) AS SoLuongBanTrongThang,
            -- Dùng subquery để lấy điểm đánh giá chung cho dòng sản phẩm
            (SELECT COALESCE(AVG(r.SoSao), 0) FROM Reviews r WHERE r.MaSanPham = s.MaSanPham) AS DiemTrungBinh,
            (SELECT COUNT(r.MaReview) FROM Reviews r WHERE r.MaSanPham = s.MaSanPham) AS TongLuotDanhGia
        FROM
            ChiTietDonHangs AS ctdh
        INNER JOIN
            DonHangs AS dh ON ctdh.MaDonHang = dh.MaDonHang
        INNER JOIN
            SanPham_BienThe AS bt ON ctdh.MaBienThe = bt.MaBienThe
        INNER JOIN
            SanPhams AS s ON bt.MaSanPham = s.MaSanPham
        LEFT JOIN
            NhaCungCaps AS ncc ON s.MaNhaCungCap = ncc.MaNhaCungCap
        WHERE
            -- Chỉ lấy các đơn hàng được đặt trong tháng và năm hiện tại
            MONTH(dh.NgayDat) = MONTH(CURDATE())
            AND YEAR(dh.NgayDat) = YEAR(CURDATE())
        GROUP BY
            -- Nhóm theo từng biến thể cụ thể
            bt.MaBienThe, s.MaSanPham, s.TenSanPham, s.AnhDaiDien, ncc.TenNhaCungCap, bt.DungLuong, bt.MauSac, bt.GiaGoc, bt.GiaKhuyenMai, s.DacDiemNoiBat
        ORDER BY
            -- Sắp xếp theo tổng số lượng bán trong tháng giảm dần
            SoLuongBanTrongThang DESC
        LIMIT 8;
        SQL;
        $db = self::getDB();
        $result = $db->getlist($select);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function get_phone_topselling()
    {
        $select = <<<SQL
        SELECT
            s.MaSanPham,
            s.TenSanPham,
            s.AnhDaiDien,
            ncc.TenNhaCungCap,
            bt.MaBienThe,
            bt.DungLuong,
            bt.MauSac,
            bt.GiaGoc,
            bt.GiaKhuyenMai,
            SUM(ctdh.SoLuong) AS SoLuongBanTrongThang,
            -- Dùng subquery để lấy điểm đánh giá chung cho dòng sản phẩm
            (SELECT COALESCE(AVG(r.SoSao), 0) FROM Reviews r WHERE r.MaSanPham = s.MaSanPham) AS DiemTrungBinh,
            (SELECT COUNT(r.MaReview) FROM Reviews r WHERE r.MaSanPham = s.MaSanPham) AS TongLuotDanhGia
        FROM
            ChiTietDonHangs AS ctdh
        INNER JOIN
            DonHangs AS dh ON ctdh.MaDonHang = dh.MaDonHang
        INNER JOIN
            SanPham_BienThe AS bt ON ctdh.MaBienThe = bt.MaBienThe
        INNER JOIN
            SanPhams AS s ON bt.MaSanPham = s.MaSanPham
        LEFT JOIN
            NhaCungCaps AS ncc ON s.MaNhaCungCap = ncc.MaNhaCungCap
        WHERE
            -- Chỉ lấy các đơn hàng được đặt trong tháng và năm hiện tại
            MONTH(dh.NgayDat) = MONTH(CURDATE())
            AND YEAR(dh.NgayDat) = YEAR(CURDATE())
        GROUP BY
            -- Nhóm theo từng biến thể cụ thể
            bt.MaBienThe, s.MaSanPham
        ORDER BY
            -- Sắp xếp theo tổng số lượng bán trong tháng giảm dần
            SoLuongBanTrongThang DESC
        -- Lấy 12 sản phẩm để chia thành 2 slide, mỗi slide 6 sản phẩm
        LIMIT 12;

        SQL;
        $db = self::getDB();
        $result = $db->getlist($select);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function get_phone_trend_week()
    {
        $select = <<<SQL
        SELECT
            s.MaSanPham,
            s.TenSanPham,
            s.AnhDaiDien,
            s.DacDiemNoiBat,
            ncc.TenNhaCungCap,
            bt.MaBienThe,
            bt.DungLuong,
            bt.MauSac,
            bt.GiaGoc,
            bt.GiaKhuyenMai,
            s.SoLuotXem,
            -- Thêm các cột thông số kỹ thuật
            tsk.ManHinhRong,
            tsk.ChipXuLy,
            tsk.RAM,
            -- Tính tổng số lượng bán ra chỉ trong 7 ngày qua
            COALESCE(SUM(CASE WHEN dh.NgayDat >= DATE_SUB(CURDATE(), INTERVAL 7 DAY) THEN ctdh.SoLuong ELSE 0 END), 0) AS SoLuongBanTrongTuan,
            -- Tính điểm xu hướng dựa trên công thức
            (s.SoLuotXem + (COALESCE(SUM(CASE WHEN dh.NgayDat >= DATE_SUB(CURDATE(), INTERVAL 7 DAY) THEN ctdh.SoLuong ELSE 0 END), 0) * 50)) AS DiemXuHuong,
            -- Dùng subquery để lấy điểm đánh giá chung cho dòng sản phẩm
            (SELECT COALESCE(AVG(r.SoSao), 0) FROM Reviews r WHERE r.MaSanPham = s.MaSanPham) AS DiemTrungBinh,
            (SELECT COUNT(r.MaReview) FROM Reviews r WHERE r.MaSanPham = s.MaSanPham) AS TongLuotDanhGia
        FROM
            SanPham_BienThe AS bt
        INNER JOIN
            SanPhams AS s ON bt.MaSanPham = s.MaSanPham
        LEFT JOIN
            -- Join với đơn hàng để tính toán doanh số trong tuần
            ChiTietDonHangs AS ctdh ON bt.MaBienThe = ctdh.MaBienThe
        LEFT JOIN
            DonHangs AS dh ON ctdh.MaDonHang = dh.MaDonHang
        LEFT JOIN
            NhaCungCaps AS ncc ON s.MaNhaCungCap = ncc.MaNhaCungCap
        LEFT JOIN
            -- **THÊM MỚI**: Join với bảng thông số kỹ thuật
            ThongSoKyThuat AS tsk ON s.MaSanPham = tsk.MaSanPham
        GROUP BY
            bt.MaBienThe, tsk.ManHinhRong, tsk.ChipXuLy, tsk.RAM -- **CẬP NHẬT**: Thêm các cột mới vào GROUP BY
        ORDER BY
            -- Sắp xếp theo điểm xu hướng giảm dần
            DiemXuHuong DESC
        LIMIT 8;
        SQL;
        $db = self::getDB();
        $result = $db->getlist($select);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function get_phone_last_newBlog()
    {
        $select = <<<SQL
        SELECT
            MaBlog,
            TieuDe,
            AnhDaiDien,
            NgayDang,
            TheLoai,
            ThoiGianDoc
        FROM
            Blogs
        ORDER BY
            -- Sắp xếp theo ngày đăng mới nhất để đưa bài mới lên đầu
            NgayDang DESC
        -- Giới hạn số lượng bài viết hiển thị trong slider
        LIMIT 5;

        SQL;
        $db = self::getDB();
        $result = $db->getlist($select);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getMainProductInfo($id)
    {
        $select = <<<SQL
        SELECT
            s.*, -- Lấy tất cả cột từ bảng SanPhams
            ncc.TenNhaCungCap,
            ncc.LogoURL,
            c.TenCategory,
            tsk.* -- Lấy tất cả cột từ bảng ThongSoKyThuat
        FROM
            SanPhams AS s
        LEFT JOIN
            NhaCungCaps AS ncc ON s.MaNhaCungCap = ncc.MaNhaCungCap
        LEFT JOIN
            Categories AS c ON s.MaCategory = c.MaCategory
        LEFT JOIN
            ThongSoKyThuat AS tsk ON s.MaSanPham = tsk.MaSanPham
        WHERE
            s.MaSanPham = ?; -- Dấu ? sẽ được thay bằng ID sản phẩm

        SQL;
        $db = self::getDB();
        $result = $db->getlist($select, [$id]);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getVariants($id)
    {
        $select = <<<SQL
        SELECT
            *
        FROM
            SanPham_BienThe
        WHERE
            MaSanPham = ?
        ORDER BY
            MauSac, DungLuong;

        SQL;
        $db = self::getDB();
        $result = $db->getlist($select, [$id]);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getGalleryImages($id)
    {
        $select = <<<SQL
        SELECT
            URL_Anh
        FROM
            AnhSanPham
        WHERE
            MaSanPham = ?;


        SQL;
        $db = self::getDB();
        $result = $db->getlist($select, [$id]);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function full4tab($id)
    {
        $select = <<<SQL
        SELECT
            -- Dữ liệu cho tab "Description"
            s.MoTaChiTiet,
            -- Dữ liệu cho tab "Vendor"
            ncc.*,
            -- Dữ liệu cho tab "Specification" và "Additional Information"
            tsk.*
        FROM
            SanPhams AS s
        LEFT JOIN
            NhaCungCaps AS ncc ON s.MaNhaCungCap = ncc.MaNhaCungCap
        LEFT JOIN
            ThongSoKyThuat AS tsk ON s.MaSanPham = tsk.MaSanPham
        WHERE
            s.MaSanPham = ?; -- Thay ? bằng ID sản phẩm, ví dụ: 1


        SQL;
        $db = self::getDB();
        $result = $db->getlist($select, [$id]);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function Review_product($id)
    {
        $select = <<<SQL
        -- Lấy tất cả đánh giá của một sản phẩm, kèm tên người dùng
        SELECT
            r.SoSao,
            r.NoiDung,
            r.ThoiGian,
            u.TenUser,
            u.AnhDaiDien
        FROM
            Reviews AS r
        INNER JOIN
            Users AS u ON r.MaUser = u.MaUser
        WHERE
            r.MaSanPham = ? -- Thay ? bằng ID sản phẩm
        ORDER BY
            r.MaReview DESC; -- Sắp xếp theo review mới nhất


        SQL;
        $db = self::getDB();
        $result = $db->getlist($select, [$id]);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function star_comment_product($id)
    {
        $select = <<<SQL
        SELECT
            COUNT(MaReview) AS TongSoDanhGia,
            COALESCE(ROUND(AVG(SoSao), 1), 0) AS DiemTrungBinh,
            SUM(CASE WHEN SoSao = 5 THEN 1 ELSE 0 END) AS SoLuong5Sao,
            SUM(CASE WHEN SoSao = 4 THEN 1 ELSE 0 END) AS SoLuong4Sao,
            SUM(CASE WHEN SoSao = 3 THEN 1 ELSE 0 END) AS SoLuong3Sao,
            SUM(CASE WHEN SoSao = 2 THEN 1 ELSE 0 END) AS SoLuong2Sao,
            SUM(CASE WHEN SoSao = 1 THEN 1 ELSE 0 END) AS SoLuong1Sao
        FROM
            Reviews
        WHERE
            MaSanPham = ?; -- Thay ? bằng ID sản phẩm


        SQL;
        $db = self::getDB();
        $result = $db->getlist($select, [$id]);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_related_products($category_id, $current_product_id)
    {
        $select = <<<SQL
        SELECT
            s.MaSanPham,
            s.TenSanPham,
            s.AnhDaiDien,
            s.NgayRaMat,
            s.DacDiemNoiBat, -- Thêm cột này để khớp với hàm render
            ncc.TenNhaCungCap,
            bt.MaBienThe,
            bt.DungLuong,
            bt.MauSac,
            bt.GiaGoc,
            bt.GiaKhuyenMai,
            bt.SoLuotBan,
            tsk.ManHinhRong,
            tsk.ChipXuLy,
            tsk.RAM,
            (SELECT COALESCE(AVG(r.SoSao), 0) FROM Reviews r WHERE r.MaSanPham = s.MaSanPham) AS DiemTrungBinh,
            (SELECT COUNT(r.MaReview) FROM Reviews r WHERE r.MaSanPham = s.MaSanPham) AS TongLuotDanhGia
        FROM
            SanPham_BienThe AS bt
        INNER JOIN
            SanPhams AS s ON bt.MaSanPham = s.MaSanPham
        LEFT JOIN
            NhaCungCaps AS ncc ON s.MaNhaCungCap = ncc.MaNhaCungCap
        LEFT JOIN
            ThongSoKyThuat AS tsk ON s.MaSanPham = tsk.MaSanPham
        WHERE
            -- Điều kiện vẫn được giữ nguyên: cùng danh mục và khác sản phẩm hiện tại
            s.MaCategory = ? AND s.MaSanPham != ?
        GROUP BY
            s.MaSanPham -- Nhóm lại để mỗi sản phẩm chỉ xuất hiện 1 lần
        ORDER BY
            s.NgayRaMat DESC -- Sắp xếp theo ngày ra mắt mới nhất
        LIMIT 5;
        SQL;

        $db = self::getDB();

        $result = $db->getList($select, [$category_id, $current_product_id]);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function get_you_may_also_like_products($current_product_id, $current_rating)
    {
        $select = <<<SQL
        SELECT
            s.MaSanPham,
            s.TenSanPham,
            s.AnhDaiDien,
            s.NgayRaMat,
            s.DacDiemNoiBat,
            ncc.TenNhaCungCap,
            bt.MaBienThe,
            bt.DungLuong,
            bt.MauSac,
            bt.GiaGoc,
            bt.GiaKhuyenMai,
            bt.SoLuotBan,
            tsk.ManHinhRong,
            tsk.ChipXuLy,
            tsk.RAM,
            COALESCE(AVG(r.SoSao), 0) AS DiemTrungBinh,
            COUNT(DISTINCT r.MaReview) AS TongLuotDanhGia
        FROM
            SanPhams AS s
        LEFT JOIN
            Reviews AS r ON s.MaSanPham = r.MaSanPham
        LEFT JOIN
            SanPham_BienThe AS bt ON s.MaSanPham = bt.MaSanPham
        LEFT JOIN
            NhaCungCaps AS ncc ON s.MaNhaCungCap = ncc.MaNhaCungCap
        LEFT JOIN
            ThongSoKyThuat AS tsk ON s.MaSanPham = tsk.MaSanPham
        WHERE
            -- Điều kiện: Khác sản phẩm hiện tại
            s.MaSanPham != ?
        GROUP BY
            s.MaSanPham
        HAVING
            -- Điều kiện: Có điểm đánh giá tương tự
            DiemTrungBinh BETWEEN ? AND ?
        ORDER BY
            s.SoLuotXem DESC
        LIMIT 5;
        SQL;

        $db = self::getDB();

        $params = [$current_product_id, $current_rating - 0.5, $current_rating + 0.5];
        $result = $db->getList($select, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function get_similar_products($current_product_id, $current_price)
    {
        $select = <<<SQL
        SELECT
            s.MaSanPham,
            s.TenSanPham,
            s.AnhDaiDien,
            s.NgayRaMat,
            s.DacDiemNoiBat,
            ncc.TenNhaCungCap,
            bt.MaBienThe,
            bt.DungLuong,
            bt.MauSac,
            bt.GiaGoc,
            bt.GiaKhuyenMai,
            bt.SoLuotBan,
            tsk.ManHinhRong,
            tsk.ChipXuLy,
            tsk.RAM,
            (SELECT COALESCE(AVG(r.SoSao), 0) FROM Reviews r WHERE r.MaSanPham = s.MaSanPham) AS DiemTrungBinh,
            (SELECT COUNT(r.MaReview) FROM Reviews r WHERE r.MaSanPham = s.MaSanPham) AS TongLuotDanhGia
        FROM
            SanPham_BienThe AS bt
        INNER JOIN
            SanPhams AS s ON bt.MaSanPham = s.MaSanPham
        LEFT JOIN
            NhaCungCaps AS ncc ON s.MaNhaCungCap = ncc.MaNhaCungCap
        LEFT JOIN
            ThongSoKyThuat AS tsk ON s.MaSanPham = tsk.MaSanPham
        WHERE
            -- Điều kiện vẫn được giữ nguyên: cùng phân khúc giá và khác sản phẩm hiện tại
            bt.GiaGoc BETWEEN ? AND ? AND s.MaSanPham != ?
        GROUP BY
            s.MaSanPham -- Nhóm lại để mỗi sản phẩm chỉ xuất hiện 1 lần
        ORDER BY
            s.SoLuotXem DESC -- Sắp xếp theo lượt xem nhiều nhất
        LIMIT 5;
        SQL;

        $db = self::getDB();
        // Dùng hàm getList an toàn với 3 tham số
        $params = [$current_price - 3000000, $current_price + 3000000, $current_product_id];
        $result = $db->getList($select, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}
