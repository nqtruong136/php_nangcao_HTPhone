<?php
require_once 'model/CheckoutModel.php';
class Checkout extends MasterController
{
    public function index()
    {
        $this->render('Checkout');
    }

    public function processCheckout()
    {
        // Handle checkout form submission
    }
}?>