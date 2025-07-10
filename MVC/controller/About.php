<?php
require_once 'model/'.$controller.'.php';
class About extends MasterController
{
    public function index()
    {
        $this->render('About');
    }
}
?>