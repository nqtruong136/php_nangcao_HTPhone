<?php
require_once 'model/CartModel.php';
session_start();
class Cart extends MasterController
{
    private $cartModel;

    public function __construct()
    {
        $this->cartModel = new CartModel();
    }
    public function index()
    {
        $cartItems = $this->cartModel->getContents();
        $cartTotal = $this->cartModel->getTotal();

        // Truyền dữ liệu giỏ hàng ra view
        $this->render('Cart', [
            'cartItems' => $cartItems,
            'cartTotal' => $cartTotal
        ]);
    }
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product_id = $_POST['product_id'];
            $variant_id = $_POST['variant_id'];
            $product_name = $_POST['product_name'];
            $price = $_POST['price'];
            $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
            $image = $_POST['image'];

            // Gọi Model để xử lý logic
            $this->cartModel->add($variant_id, $product_id, $product_name, $price, $quantity, $image);
            ob_start();
            // Lấy dữ liệu mới nhất
            $cart = [
                'items' => $this->cartModel->getContents(),
                'total' => $this->cartModel->getTotal(),
                'count' => $this->cartModel->getItemCount()
            ];
            // Gọi một file view partial để render (tái sử dụng code)
            require 'view/Partials/_cart_content.php';
            $miniCartHtml = ob_get_clean();
            //var_dump($miniCartHtml);

            // Phản hồi lại cho AJAX (ví dụ) hoặc chuyển hướng
            $response = [
                'success' => true,
                'message' => 'Đã thêm sản phẩm vào giỏ hàng!',
                'item_count' => $cart['count'],
                'mini_cart_html' => $miniCartHtml // Gửi cả HTML đi
            ];

            header('Content-Type: application/json');
            echo json_encode($response);
            //header('Location: ' . $_SERVER['HTTP_REFERER']); // Quay lại trang trước đó
            exit();
        }
    }

    // Xử lý yêu cầu cập nhật giỏ hàng
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $variant_id = $_POST['variant_id'];
            $quantity = (int)$_POST['quantity'];

            $this->cartModel->update($variant_id, $quantity);

            header('Location: ?url=Cart/index'); // Tải lại trang giỏ hàng
            exit();
        }
    }

    // Xử lý yêu cầu xóa sản phẩm
    public function remove()
    {
        if (isset($_GET['variant_id'])) {
            $variant_id = $_GET['variant_id'];
            $this->cartModel->remove($variant_id);

            header('Location: ?url=Cart/index'); // Tải lại trang giỏ hàng
            exit();
        }
    }
    public function clear()
    {
        $this->cartModel->clear();
         // Tải lại trang giỏ hàng
        exit();
    }
}
