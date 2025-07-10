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

class UsersModel extends MasterModel
{
    public function validateLogin($username, $password, $keep_log)
    {
        $db = self::getDB();
        $password = md5($password);
        
        try{
        $select = "select * from nhanvien where TenDangNhapNV = :username and MatKhauNV = :password";
        $result = $db->query($select, ['username' => $username, 'password' => $password]);
        if($result && $result->rowCount() > 0){
        
            $result = $result->fetch(PDO::FETCH_ASSOC);
            $_SESSION['nhanvien'] = [
                'MaNhanVien' => $result[0]['MaNhanVien'],
                'TenDangNhapNV' => $result[0]['TenDangNhapNV'],
                'HoTenNV' => $result[0]['HoTenNV'],
                'EmailNV' => $result[0]['EmailNV']
            ];
            return true;
        }
        else{
            return false;
        }
        }
        catch(PDOException $e){
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
?>