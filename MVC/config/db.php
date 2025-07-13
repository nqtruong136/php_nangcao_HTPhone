<?php
class Connect{
    //Khởi tạo thuộc tính cho lớp connect
    public $db = null;

    //Kết nối database
    public function __construct(){ //ham khoi tao
        $dsn='mysql:host=172.25.173.248;dbname=mvc_book';
        $user='guest'; $pass='gt123';
        $this->db=new PDO($dsn,$user,$pass, array(PDO::MYSQL_ATTR_INIT_COMMAND
        => "SET NAMES utf8"));
    }
    //Lấy dữ liệu database
    public function getlist($select){
        $result = $this->db->query($select);
        return $result;
    }
    //Tạo phương thức câu lệnh insert, update, delete
    public function exec($query){
        $result = $this->db->exec($query);
        return $result;
    }
    public function getInstance($select){
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
} ?>
