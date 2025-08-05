<?php
class MasterModel
{
    protected static $db = null;
    // Hàm khởi tạo của lớp MasterModel
    // Hàm này sẽ được gọi khi tạo một đối tượng của lớp MasterModel
    protected static function getDB()
    {
        if (self::$db === null) {
            self::$db = new Connect();
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
            ncc.TenNhaCungCap,
            -- Lấy giá thấp nhất trong các biến thể, ưu tiên giá khuyến mãi
            MIN(COALESCE(bt.GiaKhuyenMai, bt.GiaGoc)) AS GiaHienThi,
            -- Tính điểm đánh giá trung bình, nếu chưa có đánh giá thì là 0
            COALESCE(AVG(r.SoSao), 0) AS DiemTrungBinh,
            -- Đếm tổng số lượt đánh giá
            COUNT(DISTINCT r.MaReview) AS TongLuotDanhGia,
            -- Tính tổng số lượt bán của tất cả các biến thể thuộc sản phẩm này
            SUM(bt.SoLuotBan) AS TongSoLuotBan
        FROM
            SanPhams AS s
        LEFT JOIN
            -- Join với bảng biến thể để lấy giá và số lượt bán
            SanPham_BienThe AS bt ON s.MaSanPham = bt.MaSanPham
        LEFT JOIN
            -- Join với bảng đánh giá để lấy thông tin rating
            Reviews AS r ON s.MaSanPham = r.MaSanPham
        LEFT JOIN
            -- Join với nhà cung cấp để lấy tên thương hiệu
            NhaCungCaps AS ncc ON s.MaNhaCungCap = ncc.MaNhaCungCap
        -- Chỉ lấy các sản phẩm có tồn tại biến thể để tránh lỗi
        WHERE
            bt.MaBienThe IS NOT NULL
        GROUP BY
            s.MaSanPham, s.TenSanPham, s.AnhDaiDien, ncc.TenNhaCungCap
        ORDER BY
            -- Sắp xếp theo tổng số lượt bán giảm dần
            TongSoLuotBan DESC
        -- Giới hạn số lượng sản phẩm hiển thị (ví dụ: 8 sản phẩm)
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
            MIN(COALESCE(bt.GiaKhuyenMai, bt.GiaGoc)) AS GiaHienThi,
            -- Tính tổng số lượng bán ra chỉ trong tháng này
            SUM(ctdh.SoLuong) AS SoLuongBanTrongThang
        FROM
            ChiTietDonHangs AS ctdh
        INNER JOIN
            -- Join với bảng đơn hàng để lấy ngày đặt
            DonHangs AS dh ON ctdh.MaDonHang = dh.MaDonHang
        INNER JOIN
            -- Join với các bảng khác để lấy thông tin sản phẩm
            SanPham_BienThe AS bt ON ctdh.MaBienThe = bt.MaBienThe
        INNER JOIN
            SanPhams AS s ON bt.MaSanPham = s.MaSanPham
        LEFT JOIN
            NhaCungCaps AS ncc ON s.MaNhaCungCap = ncc.MaNhaCungCap
        WHERE
            -- **Điều kiện cốt lõi:** Chỉ lấy các đơn hàng được đặt trong tháng và năm hiện tại
            MONTH(dh.NgayDat) = MONTH(CURDATE())
            AND YEAR(dh.NgayDat) = YEAR(CURDATE())
        GROUP BY
            s.MaSanPham, s.TenSanPham, s.AnhDaiDien, ncc.TenNhaCungCap
        ORDER BY
            -- Sắp xếp theo tổng số lượng bán trong tháng giảm dần
            SoLuongBanTrongThang DESC
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
            ncc.TenNhaCungCap,
            -- Lấy giá gốc và giá khuyến mãi của biến thể có deal tốt nhất (giảm nhiều nhất)
            bt.GiaGoc,
            bt.GiaKhuyenMai,
            -- Tính phần trăm giảm giá để hiển thị
            ROUND(((bt.GiaGoc - bt.GiaKhuyenMai) / bt.GiaGoc) * 100) AS PhanTramGiam,
            -- Tính điểm đánh giá trung bình
            COALESCE(AVG(r.SoSao), 0) AS DiemTrungBinh
        FROM
            SanPham_BienThe AS bt
        INNER JOIN
            -- Join với bảng sản phẩm gốc
            SanPhams AS s ON bt.MaSanPham = s.MaSanPham
        LEFT JOIN
            -- Join với nhà cung cấp để lấy tên thương hiệu
            NhaCungCaps AS ncc ON s.MaNhaCungCap = ncc.MaNhaCungCap
        LEFT JOIN
            -- Join với bảng đánh giá để lấy thông tin rating
            Reviews AS r ON s.MaSanPham = r.MaSanPham
        WHERE
            -- **Điều kiện cốt lõi:** Chỉ lấy những biến thể đang có khuyến mãi
            bt.GiaKhuyenMai IS NOT NULL AND bt.GiaKhuyenMai > 0
        GROUP BY
            s.MaSanPham, s.TenSanPham, s.AnhDaiDien, ncc.TenNhaCungCap, bt.GiaGoc, bt.GiaKhuyenMai
        ORDER BY
            -- Sắp xếp ưu tiên theo ngày ra mắt mới nhất để deal của sản phẩm mới được hiển thị trước
            s.NgayRaMat DESC,
            -- Nếu cùng ngày ra mắt, ưu tiên deal có phần trăm giảm giá cao hơn
            PhanTramGiam DESC
        -- Giới hạn số lượng deal hiển thị
        LIMIT 8;
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
            ncc.TenNhaCungCap,
            s.SoLuotXem,
            -- Lấy giá thấp nhất trong các biến thể
            MIN(COALESCE(bt.GiaKhuyenMai, bt.GiaGoc)) AS GiaHienThi,
            -- Tính tổng số lượng bán ra chỉ trong tuần này
            COALESCE(SUM(CASE WHEN dh.NgayDat >= DATE_SUB(CURDATE(), INTERVAL 7 DAY) THEN ctdh.SoLuong ELSE 0 END), 0) AS SoLuongBanTrongTuan,
            -- Tính điểm xu hướng dựa trên công thức đề xuất
            (s.SoLuotXem + (COALESCE(SUM(CASE WHEN dh.NgayDat >= DATE_SUB(CURDATE(), INTERVAL 7 DAY) THEN ctdh.SoLuong ELSE 0 END), 0) * 50)) AS DiemXuHuong
        FROM
            SanPhams AS s
        LEFT JOIN
            -- Join với biến thể để lấy thông tin sản phẩm chi tiết
            SanPham_BienThe AS bt ON s.MaSanPham = bt.MaSanPham
        LEFT JOIN
            -- Join với chi tiết đơn hàng
            ChiTietDonHangs AS ctdh ON bt.MaBienThe = ctdh.MaBienThe
        LEFT JOIN
            -- Join với đơn hàng để lấy ngày đặt
            DonHangs AS dh ON ctdh.MaDonHang = dh.MaDonHang
        LEFT JOIN
            -- Join với nhà cung cấp
            NhaCungCaps AS ncc ON s.MaNhaCungCap = ncc.MaNhaCungCap
        GROUP BY
            s.MaSanPham, s.TenSanPham, s.AnhDaiDien, ncc.TenNhaCungCap, s.SoLuotXem
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
            b.MaBlog,
            b.TieuDe,
            b.AnhDaiDien,
            b.NgayDang,
            b.TheLoai,
            b.ThoiGianDoc,
            u.TenUser AS TenTacGia
        FROM
            Blogs AS b
        LEFT JOIN
            -- Join với bảng Users để lấy tên tác giả
            Users AS u ON b.MaUser = u.MaUser
        ORDER BY
            -- Sắp xếp theo ngày đăng mới nhất để đưa bài mới lên đầu
            b.NgayDang DESC
        -- Giới hạn chỉ lấy 3 bài viết mới nhất để hiển thị trên trang chủ
        LIMIT 3;
        SQL;
        $db = self::getDB();
        $result = $db->getlist($select);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}
