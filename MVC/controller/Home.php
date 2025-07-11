<?php
require_once 'model/HomeModel.php';
class Home extends MasterController {
    public function index() {
        $this->render('Home');
    }
}
?>