<?php
require_once 'model/DetailsModel.php';



function render_simple_product_card($product) {
    $giaHienThi = !empty($product['GiaKhuyenMai']) ? $product['GiaKhuyenMai'] : $product['GiaGoc'];
    $formattedPrice = number_format($giaHienThi, 0, ',', '.') . 'đ';
    $rating = round($product['DiemTrungBinh']);
    $stars = str_repeat('<img src="assets/imgs/template/icons/star.svg" alt="Ecom">', $rating) . str_repeat('<img src="assets/imgs/template/icons/star-gray.svg" alt="Ecom">', 5 - $rating);
    $priceLine = !empty($product['GiaKhuyenMai']) ? '<span class="color-gray-500 price-line">' . number_format($product['GiaGoc'], 0, ',', '.') . 'đ</span>' : '';
    $tenDayDu = $product['TenSanPham'] . ' ' . $product['DungLuong'];

    echo <<<HTML
    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="card-grid-style-2 card-grid-none-border hover-up">
            <div class="image-box">
                <a href="?url=Details/index/{$product['MaSanPham']}">
                    <img src="assets/imgs/phone/{$product['AnhDaiDien']}" alt="Product Image">
                </a>
            </div>
            <div class="info-right">
                <span class="font-xs color-gray-500">{$product['TenNhaCungCap']}</span><br>
                <a class="color-brand-3 font-xs-bold" href="?url=Details/index/{$product['MaSanPham']}">{$tenDayDu}</a>
                <div class="rating">
                    {$stars}
                    <span class="font-xs color-gray-500">({$product['TongLuotDanhGia']})</span>
                </div>
                <div class="price-info">
                    <strong class="font-lg-bold color-brand-3 price-main">{$formattedPrice}</strong>
                    {$priceLine}
                </div>
            </div>
        </div>
    </div>
HTML;
}


class Details extends MasterController
{
    public function __construct()
    {
        
    }
    public function index()
    {
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $md = new DetailsModel();
            $data1 = $md->TongQuanChiTiet($id);
            $data2 = $md->tab4($id);
            $data3 = $md->ProductReated($id);
            $data=[
                'TongQuanChiTiet' => $data1,
                'tab4' => $data2,
                'ProductReated' => $data3,
            ];
            //var_dump($data);
            $this->render('Details', $data);
        }else{
            echo "<script>window.location.href = '?controller=Home&action=index';</script>";
        }
        
    }
    public function getRecentlyViewed() {
        $json = file_get_contents('php://input');
        $data = json_decode($json, true);
        $ids = $data['ids'] ?? [];

        if (!empty($ids)) {
            $Details = new DetailsModel();
            
            $products = $Details->getProductsByIds($ids);
            foreach ($products as $product) {
                render_simple_product_card($product);
            }
        }
        // Dừng script để không có HTML thừa nào được in ra
        exit();
    }

    
}
?>