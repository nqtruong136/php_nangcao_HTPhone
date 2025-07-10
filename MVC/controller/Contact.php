<?php
require_once 'model/'.$controller.'.php';
class Contact extends MasterController
{
    public function index()
    {
        $this->render('Contact');
    }
}
?>