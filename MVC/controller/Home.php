<?php
require_once 'model/'.$controller.'Model.php';
class Home extends MasterController {
    public function index() {
        $this->render('Home');
    }
}
?>