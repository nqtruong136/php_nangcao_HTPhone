<?php
require_once 'model/BooksModel.php';
class Books extends MasterController
{
    public function index()
    {
        $this->render('Categories');
    }
}
?>