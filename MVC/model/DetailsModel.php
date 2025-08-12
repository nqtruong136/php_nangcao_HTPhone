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

}
