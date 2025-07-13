<?php
require_once 'model/DetailsModel.php';
class Details extends MasterController
{
    public function __construct()
    {
        
    }
    public function index()
    {
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $md = new DetailsModel();
            $data = $md->getDetails($id);
            $this->render('Details', $data);
        }else{
            echo "<script>window.location.href = '?controller=Home&action=index';</script>";
        }
        
    }
    
}
?>