<?php
session_start();
//Nhúng thư viện Model và Database
require_once 'config/db.php';
require_once 'model/MasterModel.php';
require_once 'controller/MasterController.php';


require_once 'model/UsersModel.php';
//require_once 'model/Home.php';
//Gọi URL dưới tên demo.com/?controller=yourController&action=yourAction
If(isset($_GET['controller'], $_GET['action'])){
    $controller = $_GET['controller'];
    $action = $_GET['action'];
}else{
    $controller = 'Home';
    $action = 'index';
}



// Gom 2 trường hợp Login và Register vì chúng dùng chung một layout
if ($controller == "Users" && ($action == "Login" || $action == "Register" || $action == "confirmLogin")) {
    require_once "view/Authentication/layout.php";
} 
// Nếu điều kiện trên sai, kiểm tra tiếp điều kiện này
else if ($controller == "Admin") {
    require_once "view/admin/layout.php";
} 
// Nếu tất cả các điều kiện trên đều sai, thực hiện cái cuối cùng
else {
    require_once "view/layout.php";
}

?>
