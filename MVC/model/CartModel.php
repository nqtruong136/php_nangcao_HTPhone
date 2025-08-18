<?php

class CartModel
{
    public function __construct() {
        // Khởi tạo giỏ hàng ngay khi một đối tượng CartModel được tạo
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }

    public function add($variant_id, $product_id, $product_name, $price, $quantity, $image) {
        if (isset($_SESSION['cart'][$variant_id])) {
            $_SESSION['cart'][$variant_id]['quantity'] += $quantity;
        } else {
            $_SESSION['cart'][$variant_id] = [
                'product_id' => $product_id,
                'name'       => $product_name,
                'price'      => $price,
                'quantity'   => $quantity,
                'image'      => $image
            ];
        }
    }

    public function update($variant_id, $quantity) {
        if (isset($_SESSION['cart'][$variant_id])) {
            if ($quantity > 0) {
                $_SESSION['cart'][$variant_id]['quantity'] = $quantity;
            } else {
                $this->remove($variant_id);
            }
        }
    }

    public function remove($variant_id) {
        if (isset($_SESSION['cart'][$variant_id])) {
            unset($_SESSION['cart'][$variant_id]);
        }
    }

    public function getContents() {
        return $_SESSION['cart'];
    }

    public function getTotal() {
        $total = 0;
        foreach ($_SESSION['cart'] as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }

    public function getItemCount() {
        $count = 0;
        foreach ($_SESSION['cart'] as $item) {
            $count += $item['quantity'];
        }
        return $count;
    }

    public function clear() {
        $_SESSION['cart'] = [];
    }
}
?>