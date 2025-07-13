<?php
class DetailsModel extends MasterModel
{
    public function __construct() {}
    public function get_quantity_comment($id){
        $db = self::getDB();
        $select = "SELECT COUNT(MaSach) AS TongComment FROM danhgiasanpham WHERE MaSach = :id;";
        $result = $db->getInstance_params($select, ['id' => $id]);
        return $result;
    }
    public function getDetails($id)
    {
        $data1 = parent::get_by_id_sach($id);
        $data2 = parent::get_by_id_sach_thongke_review($id);
        $data3 = parent::get_by_id_sach_comment($id);
        $soluongcomment = $this->get_quantity_comment($id);
        $data = [
            'data1' => $data1,
            'data2' => $data2,
            'data3' => $data3,
            'soluongcomment' => $soluongcomment
        ];
        return $data;
    }
}
