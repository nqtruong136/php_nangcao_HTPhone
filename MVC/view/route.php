<?php
require_once 'controller/'.$controller.'.php';

//require_once 'config/db.php';

switch($controller){
    case 'Home':
        $controller = new Home();
        break;
    case 'Books':
        $controller = new Books();
        break;
    case 'About':
        $controller = new About();
        break;
    case 'Contact':
        $controller = new Contact();
        break;
    case 'Blog':
        $controller = new Blog();
        break;
    case 'Users':
        $controller = new Users();
        break;
    case 'Details':
        $controller = new Details();
        break;
    default:
        $controller = new Home();
        break;
}
$controller->{ $action }();
?>
