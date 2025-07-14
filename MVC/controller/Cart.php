<?php
require_once 'model/CartModel.php';
class Cart extends MasterController
{
    public function index()
    {
        $this->render('Cart');
    }

    public function addCart()
    {
        $id = $_POST["id"];
        $name = $_POST["name"];
        $price = $_POST["price"];
        $img = $_POST["img"];
        $quantity = (isset($_POST["quantity"]) && $_POST["quantity"] > 0) ? $_POST["quantity"] : 1;

        if (isset($_SESSION["cart"][$id])) {
            $_SESSION["cart"][$id]["quantity"] += $quantity;
        } else {
            $_SESSION["cart"][$id] = array(
                "id" => $id,
                "name" => $name,
                "price" => $price,
                "img" => $img,
                "quantity" => $quantity
            );
        }
        echo "<script>window.location.href = '?controller=Details&action=index&id=$id';</script>";
        exit();
    }
    
    public function clearCart()
    {
        unset($_SESSION["cart"]);
        echo "<script>window.location.href = '?controller=Cart&action=index';</script>";
        exit();
    }

    public function removeItem()
    {
        $id = $_GET['id'];
        if (isset($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]);
        }
        echo "<script>window.location.href = '?controller=Details&action=index&id={$_SESSION['cart']['id']}';</script>";
        exit();
    }

    public function updateCart()
    {
        if (isset($_POST['quantity'])) {
            foreach ($_POST['quantity'] as $id => $quantity) {
                if ($quantity > 0 && isset($_SESSION['cart'][$id])) {
                    $_SESSION['cart'][$id]['quantity'] = $quantity;
                } else {
                    unset($_SESSION['cart'][$id]);
                }
            }
        }
        echo "<script>window.location.href = '?controller=Cart&action=index';</script>";
        exit();
    }

    public function addItem($itemId, $quantity)
    {
    }
}
?>