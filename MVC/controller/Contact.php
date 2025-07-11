<?php
require_once 'model/ContactModel.php';
class Contact extends MasterController
{
    public function index()
    {
        $this->render('Contact');
    }
}
?>