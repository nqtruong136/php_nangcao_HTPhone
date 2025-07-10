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
    
}
?>
