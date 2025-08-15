<?php
$check_erro =false;
if($check_erro){
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    session_start();
}



//Nhúng thư viện Model và Database
require_once 'config/db.php';

require_once 'model/MasterModel.php';

require_once 'controller/MasterController.php';


require_once 'model/UsersModel.php';
//require_once 'model/Home.php';
//Gọi URL dưới tên demo.com/?controller=yourController&action=yourAction

if (
    isset($_GET['controller'], $_GET['action']) &&
    $_GET['controller'] === 'Details' &&
    $_GET['action'] === 'getRecentlyViewed'
) {
    require_once 'controller/Details.php';
    $controller = new Details();
    $controller->getRecentlyViewed(); // Gọi hàm trả về HTML/data
    exit; // Dừng lại, không include layout nữa
}

if(isset($_GET['controller'], $_GET['action'])){
    $controller = $_GET['controller'];
    $action = $_GET['action'];
    
}else{
    $controller = 'Home';
    $action = 'index';
    
}





require_once "view/layout.php";

?>
