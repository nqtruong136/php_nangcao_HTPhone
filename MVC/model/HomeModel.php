<?php
if (class_exists('Users')) {
    echo '<h1>Phát hiện class "Users" được khai báo lại!</h1>';
    echo '<p>Lần khai báo thứ hai được gọi từ luồng dưới đây:</p>';
    echo '<pre style="background-color: #f5f5f5; border: 1px solid #ccc; padding: 10px; border-radius: 5px;">';
    // In ra toàn bộ dấu vết của luồng gọi file
    debug_print_backtrace();
    echo '</pre>';
    // Dừng chương trình ngay lập tức để chỉ xem lỗi này
    die();
}
class HomeModel extends MasterModel
{
    public function __construct()
    {
        
    }
    public function get_5section_book(){
        $data1 = parent::get_phone_best_seller();
        $data2 = parent::get_phone_last_deals();
        $data3 = parent::get_phone_trend_week();
        $data4 = parent::get_phone_topselling();
        $data5 = parent::get_phone_last_newBlog();
        $data=[
            'data_best_seller' => $data1,
            'data_last_deals' => $data2,
            'data_trend_week' => $data3,
            'data_topselling' => $data4,
            'data_last_newBlog' => $data5
        ];
        return $data;
        
    }
}
?>