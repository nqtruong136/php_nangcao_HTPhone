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
            $data1 = $md->TongQuanChiTiet($id);
            $data2 = $md->tab4($id);
            $data=[
                'data1' => $data1,
                'data2' => $data2,
            ];
            //var_dump($data);
            $this->render('Details', $data);
        }else{
            echo "<script>window.location.href = '?controller=Home&action=index';</script>";
        }
        
    }
    
}
?>