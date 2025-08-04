<?php
require_once 'model/BooksModel.php';
class Books extends MasterController
{
    public function index()
    {
        // $md = new BooksModel();
        // $result = $md->get_book_all_by_date();
        // $data = [
        //     'data' => $result
        // ];
        // //$data = [];
        // $this->render('Categories',$data);
        $this->render('Categories');
    }
}
?>