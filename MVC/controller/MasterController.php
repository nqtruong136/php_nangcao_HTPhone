<?php
require_once 'model/CartModel.php';
class MasterController
{
    protected $model;
    protected $view;
    protected $cartModel_c;
    public $cartData = [];
    public function __construct()
    {
        //Khởi tạo kết nối database
        $this->cartModel_c = new CartModel();
        $this->prepareCartData(); // Chuẩn bị dữ liệu giỏ hàng
    }

    protected function prepareCartData()
    {
        $cart = [
            'items' => $this->cartModel_c->getContents(),
            'total' => $this->cartModel_c->getTotal(),
            'count' => $this->cartModel_c->getItemCount()
        ];

        $this->cartData = $cart; // Cập nhật biến tĩnh để có thể sử dụng trong các view
        return $cart; // Trả về dữ liệu giỏ hàng
    }

    public function formatPriceToK($price)
    {
        // Nếu giá tiền lớn hơn hoặc bằng 1000
        if ($price >= 1000) {
            // Chia cho 1000, làm tròn xuống và thêm chữ 'K'
            return floor($price / 1000) . 'K';
        }

        // Nếu nhỏ hơn 1000, giữ nguyên
        return $price;
    }
    // Phương thức render view
    protected function render($view, $data = [])
    {

        $viewData = array_merge($data, ['cart' => $this->cartData]);// Chuyển đổi mảng data thành các biến để sử dụng trong view
        extract($viewData);

        // Đường dẫn đến file view
        $viewPath = "view/" . $view . "/index.php";

        // Kiểm tra file view có tồn tại không
        if (file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            die("View không tồn tại: " . $viewPath);
        }
    }

    // Phương thức chuyển hướng
    protected function redirect($url)
    {
        header("Location: " . $url);
        exit();
    }

    // Phương thức kiểm tra request method
    protected function isPost()
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    protected function isGet()
    {
        return $_SERVER['REQUEST_METHOD'] === 'GET';
    }

    // Phương thức lấy dữ liệu từ POST request
    protected function getPost($key = null)
    {
        if ($key === null) {
            return $_POST;
        }
        return isset($_POST[$key]) ? $_POST[$key] : null;
    }

    // Phương thức lấy dữ liệu từ GET request
    protected function getQuery($key = null)
    {
        if ($key === null) {
            return $_GET;
        }
        return isset($_GET[$key]) ? $_GET[$key] : null;
    }

    // Phương thức xử lý lỗi
    protected function handleError($message, $code = 404)
    {
        http_response_code($code);
        $this->render('error', ['message' => $message]);
        exit();
    }

    // Phương thức kiểm tra đăng nhập
    protected function checkLogin()
    {
        if (!isset($_SESSION['user'])) {
            $this->redirect('?controller=Auth&action=login');
        }
    }

    // Phương thức kiểm tra quyền admin
    protected function checkAdmin()
    {
        $this->checkLogin();
        if (!isset($_SESSION['user']['role']) || $_SESSION['user']['role'] !== 'admin') {
            $this->handleError('Bạn không có quyền truy cập trang này', 403);
        }
    }
}
