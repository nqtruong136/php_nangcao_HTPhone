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
        var_dump($data1);
        $data = [
            'TQ1' => $data1,
            'TQ2' => $data2,
            'TQ3' => $data3,
            
        ];
        return $data;
    }
    public function tab4($id){
        $data1 = parent::full4tab($id);
        $data2 = parent::Review_product($id);
        $data3 = parent::star_comment_product($id);

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

    }

}
