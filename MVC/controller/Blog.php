<?php
require_once 'model/BlogModel.php';
class Blog extends MasterController
{
    public function index()
    {
        $this->render('Blog');
    }
}
?>
