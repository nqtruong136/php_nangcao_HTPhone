<?php


class Users extends MasterController
{
    public function Login()
    {
        $this->render('Authentication/Login');
    }
    public function Logout()
    {
        unset($_SESSION['nhanvien']);
        echo "<script>window.location.href = '?controller=Home&action=index';</script>";
        exit();
    }
    public function Register()
    {
        $this->render('Authentication/Register');
    }
    public function confirmLogin()
    {

        //var_dump($_POST);
        // Kiểm tra xem người dùng có gửi dữ liệu từ form lên không
        if (isset($_POST['username']) && isset($_POST['password'])) {
            // Lấy dữ liệu từ form
            $username = $_POST['username'];
            $password = $_POST['password'];
            // Nên kiểm tra 'keep-log' có tồn tại không trước khi sử dụng
            $keep_log = isset($_POST['keep-log']);

            // Tạo đối tượng User và tiến hành xác thực
            $user = new UsersModel();

            // Giả sử hàm validateLogin() sẽ trả về `true` nếu đăng nhập thành công
            // và `false` nếu đăng nhập thất bại.
            if ($user->validateLogin($username, $password, $keep_log)) {
                // XÁC THỰC THÀNH CÔNG
                
                $_SESSION['nhanvien'] = $user;
                // Thông thường ở đây bạn sẽ chuyển hướng người dùng đến trang dashboard
                header('Location: ?controller=Home&action=index');
                exit();
            } else {
                // XÁC THỰC THẤT BẠI
                // Đây là nơi bạn thực thi logic mà ban đầu nằm trong khối `else` của bạn
                echo "Login Failed controller";
                // Render lại form đăng nhập với thông báo lỗi
                $this->render('Authentication/Login');
            }
        } else {
            // Nếu không có dữ liệu POST, tức là người dùng vừa truy cập trang đăng nhập
            // thì chỉ cần render form ra.
            // Không nên hiển thị "Login Failed" ở đây vì người dùng chưa thử đăng nhập.
            $this->render('Authentication/Login');
        }

    }
    
}
