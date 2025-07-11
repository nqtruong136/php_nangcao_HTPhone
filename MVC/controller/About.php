<?php
require_once 'model/AboutModel.php';
class About extends MasterController
{
    public function index()
    {
        $this->render('About');
    }
}
?>