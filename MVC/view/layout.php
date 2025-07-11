<?php sleep(0.5);?>
<!doctype html>


<html class="no-js" lang="zxx">

<!-- Mirrored from preview.colorlib.com/theme/abcbook/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Jun 2025 09:18:22 GMT -->

<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Book Shop</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/icon/favicon.png">

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/price_rangs.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        /* --- Khối User Menu chính --- */
        .user-menu {
            position: relative;
            /* Rất quan trọng! Để dropdown định vị theo khối này */
            display: inline-block;
            font-family: Arial, sans-serif;
            /* Đặt font ở đây để không ảnh hưởng toàn trang */
        }

        /* --- Khu vực bấm vào (gồm ảnh và tên) --- */
        .user-menu-trigger {
            display: flex;
            align-items: center;
            cursor: pointer;
            padding: 5px 10px;
            border-radius: 20px;
            transition: background-color 0.3s ease;
        }

        .user-menu-trigger:hover {
            background-color: #e4e6eb;
        }

        .user-menu .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            /* Bo tròn ảnh avatar */
            object-fit: cover;
            /* Đảm bảo ảnh không bị méo */
            margin-right: 10px;
            border: 2px solid #fff;
        }

        .user-menu .username {
            font-weight: bold;
            color: #333;
        }

        /* --- Menu Dropdown (Mặc định bị ẩn) --- */
        .user-menu-dropdown {
            /* Ẩn đi và chuẩn bị cho hiệu ứng */
            position: absolute;
            top: calc(100% + 5px);
            /* Nằm ngay dưới trigger, cách 5px */
            right: 0;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            width: 220px;
            z-index: 1000;
            padding: 8px 0;
            list-style: none;
            /* Bỏ dấu chấm của list */
            margin: 0;

            /* Hiệu ứng mờ dần và trượt lên */
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: opacity 0.2s ease, transform 0.2s ease, visibility 0.2s;
        }

        /* --- Hiệu ứng khi HOVER hoặc có class "active" (khi click) --- */
        .user-menu:hover .user-menu-dropdown,
        .user-menu.active .user-menu-dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        /* --- Các mục trong dropdown --- */
        .user-menu-dropdown li a {
            display: block;
            padding: 10px 15px;
            color: #333;
            text-decoration: none;
            font-size: 15px;
            transition: background-color 0.2s ease;
        }

        .user-menu-dropdown li a:hover {
            background-color: #f0f2f5;
        }

        /* --- Đường kẻ ngang phân cách --- */
        .user-menu-dropdown .separator {
            height: 1px;
            background-color: #ddd;
            margin: 8px 0;
        }

        /* --- Mục "Đăng xuất" có màu khác biệt --- */
        .user-menu-dropdown li .logout:hover {
            background-color: #ffebee;
            color: #d32f2f;
        }
    </style>
</head>

<body>
    <header>
        <div class="header-area">
            <div class="main-header ">
                <div class="header-top ">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="d-flex justify-content-between align-items-center flex-sm">
                                    <div class="header-info-left d-flex align-items-center">
                                        <!-- logo -->
                                        <div class="logo">
                                            <a href="?controller=Home&action=index"><img src="assets/img/logo/logo.png" alt=""></a>
                                        </div>
                                        <!-- Search Box -->
                                        <form action="#" class="form-box">
                                            <input type="text" name="Search" placeholder="Search book by author or publisher">
                                            <div class="search-icon">
                                                <i class="ti-search"></i>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="header-info-right d-flex align-items-center">
                                        <ul style="display: flex; align-items: center;">
                                            <!--<li><a href="#">FAQ</a></li> cái này là để sau
                                            <li><a href="#">Track Order</a></li>-->
                                            <li class="shopping-card">
                                                <a href="cart.html"><img src="assets/img/icon/cart.svg" alt=""></a>
                                            </li>
                                            <!--<li><a href="?controller=Users&action=Login" class="btn header-btn">Sign in</a></li>-->
                                            <?php
                                            if (isset($_SESSION['nhanvien'])) {
                                                echo "<li>
                                                <div class='user-menu'>
                                                    <div class='user-menu-trigger'>
                                                        <img src='https://picsum.photos/id/237/100/100' alt='Avatar người dùng' class='avatar'>
                                                        <span class='username'>Chào, Gemini!</span>
                                                    </div>

                                                    <ul class='user-menu-dropdown'>
                                                        <li><a href='#'>Trang cá nhân</a></li>
                                                        <li><a href='#'>Cài đặt tài khoản</a></li>
                                                        <li><a href='#'>Bảng điều khiển</a></li>
                                                        <li><a href='#'>Trợ giúp & Hỗ trợ</a></li>
                                                        <li class='separator'></li>
                                                        <li><a href='?controller=Users&action=Logout' class='logout'>Đăng xuất</a></li>
                                                    <FFFFFF/ul>
                                                </div>
                                            </li>";
                                            } else {
                                                echo "<li><a href='?controller=Users&action=Login' class='btn header-btn'>Sign in</a></li>";
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom  header-sticky">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-12">
                                <!-- logo 2 -->
                                <div class="logo2">
                                    <a href="index.html"><img src="assets/img/logo/logo.png" alt=""></a>
                                </div>
                                <!-- Main-menu -->
                                <div class="main-menu text-center d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li><a href="?controller=Home&action=index">Home</a></li>
                                            <li><a href="?controller=Books&action=index">Categories</a></li>
                                            <li><a href="?controller=About&action=index">About</a></li>
                                            <li><a href="#">Pages</a>
                                                <ul class="submenu">
                                                    <li><a href="login.html">login</a></li>
                                                    <li><a href="cart.html">Cart</a></li>
                                                    <li><a href="checkout.html">Checkout</a></li>
                                                    <li><a href="book-details.html">book Details</a></li>
                                                    <li><a href="blog_details.html">Blog Details</a></li>
                                                    <li><a href="elements.html">Element</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="?controller=Blog&action=index">Blog</a></li>
                                            <li><a href="?controller=Contact&action=index">Contect</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-xl-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </header>
    <?php

    require_once 'view/route.php';

    ?>
    <footer>
        <div class="footer-wrappper section-bg">
            <div class="footer-area footer-padding">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-xl-3 col-lg-5 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="single-footer-caption mb-30">
                                    <!-- logo -->
                                    <div class="footer-logo mb-25">
                                        <a href="index.html"><img src="assets/img/logo/logo2_footer.png" alt=""></a>
                                    </div>
                                    <div class="footer-tittle">
                                        <div class="footer-pera">
                                            <p>Get the breathing space now, and we’ll extend your term at the other end year for go.</p>
                                        </div>
                                    </div>
                                    <!-- social -->
                                    <div class="footer-social">
                                        <a href="../../../bit.ly/sai4ull"><i class="fab fa-facebook"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                        <a href="#"><i class="fab fa-youtube"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-5">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Book Category</h4>
                                    <ul>
                                        <li><a href="#">History</a></li>
                                        <li><a href="#">Horror - Thriller</a></li>
                                        <li><a href="#">Love Stories</a></li>
                                        <li><a href="#">Science Fiction</a></li>
                                        <li><a href="#">Business</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>&nbsp;</h4>
                                    <ul>
                                        <li><a href="#">Biography</a></li>
                                        <li><a href="#">Astrology</a></li>
                                        <li><a href="#">Digital Marketing</a></li>
                                        <li><a href="#">Software Development</a></li>
                                        <li><a href="#">Ecommerce</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Site Map</h4>
                                    <ul class="mb-20">
                                        <li><a href="#">Home</a></li>
                                        <li><a href="#">About Us</a></li>
                                        <li><a href="#">FAQs</a></li>
                                        <li><a href="#">Blog</a></li>
                                        <li><a href="#">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer-bottom area -->
            <div class="footer-bottom-area">
                <div class="container">
                    <div class="footer-border">
                        <div class="row d-flex align-items-center">
                            <div class="col-xl-12 ">
                                <div class="footer-copy-right text-center">
                                    Copyright &copy;<script>
                                        document.write(new Date().getFullYear());
                                    </script> All rights reserved | This template is made with <i class="fa fa-heart color-danger" aria-hidden="true"></i> by <a href="../../../colorlib.com/index.html" style="color: black" target="_blank" rel="nofollow noopener">Colorlib</a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Scroll Up -->
    <div id="back-top">
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>

    <!-- JS here -->
    <!-- Jquery, Popper, Bootstrap -->
    <script src="assets/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Slick-slider , Owl-Carousel ,slick-nav -->
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!--wow , counter , waypoint, Nice-select -->
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.js"></script>
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/price_rangs.js"></script>

    <!-- contact js -->
    <script src="assets/js/contact.js"></script>
    <script src="assets/js/jquery.form.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/mail-script.js"></script>
    <script src="assets/js/jquery.ajaxchimp.min.js"></script>

    <!--  Plugins, main-Jquery -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="../../../www.googletagmanager.com/gtag/jsa055?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script>
        // Tìm phần tử user-menu dựa trên class hoặc id nếu có
        const userMenu = document.querySelector('.user-menu');

        if (userMenu) {
            userMenu.addEventListener('click', function(event) {
                event.stopPropagation();
                this.classList.toggle('active');
            });

            document.addEventListener('click', function(event) {
                if (!userMenu.contains(event.target)) {
                    userMenu.classList.remove('active');
                }
            });
        }
        //sdf sdfasfdgafsdgsdafgdsfgedafgdag
    </script>

    <script defer src="../../../static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"94b6d25bcf59ce79","version":"2025.5.0","serverTiming":{"name":{"cfExtPri":true,"cfEdge":true,"cfOrigin":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"cd0b4b3a733644fc843ef0b185f98241","b":1}' crossorigin="anonymous"></script>
</body>

<!-- Mirrored from preview.colorlib.com/theme/abcbook/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 Jun 2025 09:19:04 GMT -->

</html>