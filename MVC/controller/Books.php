<?php
require_once 'model/'.$controller.'.php';
class Books extends MasterController
{
    public function index()
    {
        $this->render('Categories');
    }
}
?>