<?php
class Connect{
    //Khởi tạo thuộc tính cho lớp connect
    private static $instance = null;
    public $db = null;

    //Kết nối database
    public function __construct(){ //ham khoi tao
        $dsn='mysql:host=localhost;dbname=ht_phone';
        $user='root'; $pass='';
        $this->db=new PDO($dsn,$user,$pass, array(PDO::MYSQL_ATTR_INIT_COMMAND
        => "SET NAMES utf8"));
    }
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Connect();
        }
        return self::$instance;
    }
    //Lấy dữ liệu database
    public function getlist($sql, $params = null) {
        try {
            // **LOGIC QUAN TRỌNG:**
            // Nếu không có tham số nào được truyền vào, chạy câu lệnh trực tiếp (cách cũ).
            if ($params === null) {
                $stmt = $this->db->query($sql);
            } 
            // Nếu có tham số, sử dụng Prepared Statements để đảm bảo an toàn.
            else {
                $stmt = $this->db->prepare($sql);
                $stmt->execute($params);
            }
            return $stmt;
        } catch (PDOException $e) {
            // Xử lý lỗi
            return false;
        }
    }
    //Tạo phương thức câu lệnh insert, update, delete
    public function exec($query){
        $result = $this->db->exec($query);
        return $result;
    }
    public function getInstance_query($select){
        $results = $this->db->query($select);
        $result = $results->fetch();
        return $result;
    }
    public function query($select, $params = array()){
        $stmt = $this->db->prepare($select);
        $stmt->execute($params);
        return $stmt;
    }
    public function getInstance_params($select, $params = array()){
        $stmt = $this->db->prepare($select);
        $stmt->execute($params);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function close() {
    $this->db = null;
    self::$instance = null;
    }
} ?>
