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
}
?>