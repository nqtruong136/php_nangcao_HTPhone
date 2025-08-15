<?php
class DetailsModel extends MasterModel
{
    protected static $current_product_id;
    protected static $category_id;
    protected static $current_rating;
    protected static $current_price;
    public function __construct() {}
    // public function get_quantity_comment($id){
    //     $db = self::getDB();
    //     $select = "SELECT COUNT(MaSach) AS TongComment FROM danhgiasanpham WHERE MaSach = :id;";
    //     $result = $db->getInstance_params($select, ['id' => $id]);
    //     return $result;
    // }
    public function TongQuanChiTiet($id)
    {
        $data1 = parent::getMainProductInfo($id);
        $data2 = parent::getVariants($id);
        $data3 = parent::getGalleryImages($id);
        self::$current_price = $data2[0]['GiaGoc'];
        self::$category_id = $data1[0]['MaCategory'];
        $data = [
            'getMainProductInfo' => $data1,
            'getVariants' => $data2,
            'getGalleryImages' => $data3,
        ];
        return $data;
    }
    public function tab4($id){
        $data1 = parent::full4tab($id);
        $data2 = parent::Review_product($id);
        $data3 = parent::star_comment_product($id);
        self::$current_rating = $data3[0]['DiemTrungBinh'];
        $data = [
            'TabFull' => $data1,
            'ReviewTab' => $data2,
            'StarCommentTab' => $data3,
        ];
        return $data;
    }
    public function ProductReated($id)
    {
        self::$current_product_id = $id;
        $data1 = parent::get_related_products(self::$category_id, self::$current_product_id);
        $data2 = parent::get_you_may_also_like_products(self::$current_product_id, self::$current_rating);
        $data3 = parent::get_similar_products(self::$current_product_id, self::$current_price);
        $data = [
            'RelatedProducts' => $data1,
            'YouMayAlsoLike' => $data2,
            'SimilarProducts' => $data3,
        ];
        return $data;
    
    
    }
    public function getProductsByIds(array $ids) {
        if (empty($ids)) {
            return [];
        }

        // Tạo chuỗi placeholder (?, ?, ?) cho câu lệnh IN
        $placeholders = implode(',', array_fill(0, count($ids), '?'));

        // Câu truy vấn này lấy thông tin cần thiết cho thẻ sản phẩm kiểu đơn giản (card-grid-style-2)
        // và sắp xếp đúng theo thứ tự ID em gửi lên bằng hàm FIELD().
        $sql = "
            SELECT
                s.MaSanPham, s.TenSanPham, s.AnhDaiDien,
                ncc.TenNhaCungCap,
                bt.MaBienThe, bt.DungLuong, bt.GiaGoc, bt.GiaKhuyenMai,
                (SELECT COALESCE(AVG(r.SoSao), 0) FROM Reviews r WHERE r.MaSanPham = s.MaSanPham) AS DiemTrungBinh,
                (SELECT COUNT(r.MaReview) FROM Reviews r WHERE r.MaSanPham = s.MaSanPham) AS TongLuotDanhGia
            FROM SanPhams AS s
            JOIN SanPham_BienThe AS bt ON s.MaSanPham = bt.MaSanPham
            LEFT JOIN NhaCungCaps AS ncc ON s.MaNhaCungCap = ncc.MaNhaCungCap
            WHERE s.MaSanPham IN ($placeholders)
            GROUP BY s.MaSanPham
            ORDER BY FIELD(s.MaSanPham, $placeholders)
        ";
        
        // Gộp mảng ID 2 lần vì nó được dùng ở cả IN và FIELD
        $params = array_merge($ids, $ids);

        $db = self::getDB();
        $stmt = $db->getList($sql, $params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
