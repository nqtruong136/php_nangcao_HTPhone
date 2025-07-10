<?php
require_once 'model/'.$controller.'.php';
class Blog extends MasterController
{
    public function index()
    {
        $this->render('Blog');
    }
}
?>
