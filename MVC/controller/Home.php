<?php
require_once 'model/HomeModel.php';
class Home extends MasterController {
    public function index() {
         $md = new HomeModel();
        $data =  $md->get_5section_book();
        $this->render('Home',$data);
        
    }
}
?>