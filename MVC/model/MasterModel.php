<?php
class MasterModel
{
    protected static $db=null;
    // Hàm khởi tạo của lớp MasterModel
    // Hàm này sẽ được gọi khi tạo một đối tượng của lớp MasterModel
    protected static function getDB(){
        if (self::$db === null) {
            self::$db = new Connect();
        }
        return self::$db;
    }
//    public static function __construct() // hàm khỏi tạo: không thể sử dụng từ khóa public cùng với static
    public function __construct()
    {
    }

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

    protected function get_by_id($table, $column, $value){
        $db = self::getDB();
        $select = "select * from $table where $column = '$value'";
        $result = $db->getInstance($select); # tra ve 1 dong => thay phuong thuc getList bang getInstance
        return $result;
    }



    public function get_book_all_by_date_6b()
    {  $select = <<<SQL
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
        $stmt=$db->getlist($select);
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }






    public function get_book_all_by_date()
    {  $select = <<<SQL
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
    public function get_by_id_sach($id){
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
    public function get_by_id_sach_thongke_review($id){
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
    public function get_by_id_sach_comment($id){
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
}
?>
