<?php

$host = 'database-nguyenquangtrung13062005-8a5b.l.aivencloud.com'; // hoặc localhost nếu máy của bạn
$dbname = 'dulich';
$user = 'avnadmin'; // hoặc user bạn tạo cho bạn của mình
$pass = 'AVNS_MpspnXM3-9E7TgIuZb-';     // mật khẩu
$port = 27925;   // nếu không phải cổng mặc định thì sửa lại
$start = microtime(true);
try {
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8";
    $pdo = new PDO($dsn, $user, $pass, array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ));

    echo "✅ Kết nối thành công đến cơ sở dữ liệu '$dbname'!";
} catch (PDOException $e) {
    echo "❌ Lỗi kết nối CSDL: " . $e->getMessage();
}
$time = round((microtime(true) - $start) * 1000, 2);
echo "⏱️ Kết nối mất: {$time}ms";
?>
