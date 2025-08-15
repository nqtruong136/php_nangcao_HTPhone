/**
 * =================================================================
 * LOGIC JAVASCRIPT CHO TÍNH NĂNG "SẢN PHẨM ĐÃ XEM GẦN ĐÂY"
 * Sử dụng localStorage của trình duyệt để lưu trữ dữ liệu.
 * =================================================================
 */

// Đặt một tên key cố định để lưu trữ trong localStorage.
const RECENTLY_VIEWED_KEY = 'recently_viewed_products';
// Giới hạn số lượng sản phẩm hiển thị trong danh sách.
const MAX_ITEMS = 8;

/**
 * PHẦN 1: HÀM ĐỂ LƯU SẢN PHẨM VỪA XEM
 * -----------------------------------------------------------------
 * Hàm này sẽ được gọi ở trang chi tiết sản phẩm.
 * Mục đích: Thêm ID của sản phẩm hiện tại vào danh sách đã xem.
 *
 * @param {number|string} productId - ID của sản phẩm vừa được xem.
 */
function addProductToRecentlyViewed(productId) {
    console.log('Thêm sản phẩm vào danh sách đã xem:');
    if (!productId) {
        return; // Bỏ qua nếu không có productId
    }

    // 1. Lấy danh sách sản phẩm đã xem hiện tại từ localStorage.
    let viewedItems = JSON.parse(localStorage.getItem(RECENTLY_VIEWED_KEY)) || [];

    // 2. Xóa sản phẩm này nếu nó đã tồn tại trong danh sách
    //    để đảm bảo khi thêm lại, nó sẽ lên đầu danh sách.
    viewedItems = viewedItems.filter(id => id != productId);

    // 3. Thêm sản phẩm mới vào đầu danh sách.
    viewedItems.unshift(productId);

    // 4. Giới hạn số lượng sản phẩm trong danh sách.
    if (viewedItems.length > MAX_ITEMS) {
        viewedItems = viewedItems.slice(0, MAX_ITEMS);
    }

    // 5. Lưu danh sách đã cập nhật trở lại localStorage.
    localStorage.setItem(RECENTLY_VIEWED_KEY, JSON.stringify(viewedItems));

    console.log('Đã cập nhật danh sách xem gần đây:', viewedItems);
}


/**
 * PHẦN 2: HÀM ĐỂ LẤY DANH SÁCH SẢN PHẨM ĐÃ XEM
 * -----------------------------------------------------------------
 * Hàm này sẽ được gọi ở những trang cần hiển thị khu vực "Đã xem gần đây".
 * Mục đích: Lấy ra danh sách các ID sản phẩm đã xem để gửi lên server.
 *
 * @returns {Array} - Một mảng chứa các ID sản phẩm đã xem.
 */
function getRecentlyViewedProductIds() {
    return JSON.parse(localStorage.getItem(RECENTLY_VIEWED_KEY)) || [];
}


/**
 * =================================================================
 * HƯỚNG DẪN SỬ DỤNG TRONG PHP
 * =================================================================
 *
 * **Bước 1: Tại trang chi tiết sản phẩm (ví dụ: `views/details/index.php`)**
 *
 * Ngay dưới cùng của file, em hãy thêm đoạn script này.
 * Giả sử em có một biến PHP `$product_id` chứa ID của sản phẩm đang xem.
 *
 * <script>
 * // Lấy ID sản phẩm từ PHP và truyền vào hàm JavaScript
 * const currentProductId = <?php echo json_encode($product_id); ?>;
 * addProductToRecentlyViewed(currentProductId);
 * </script>
 *
 *
 * **Bước 2: Tại nơi cần hiển thị (ví dụ: `views/home/index.php` hoặc cuối trang chi tiết)**
 *
 * Em sẽ cần dùng JavaScript để lấy danh sách ID, sau đó dùng AJAX để gửi
 * danh sách này lên một file PHP xử lý và nhận về HTML để hiển thị.
 *
 * <div id="recently-viewed-container">
 * <!-- Các sản phẩm đã xem sẽ được chèn vào đây -->
 * </div>
 *
 * <script>
 * document.addEventListener('DOMContentLoaded', function() {
 * // 1. Lấy danh sách ID từ localStorage
 * const productIds = getRecentlyViewedProductIds();
 *
 * // 2. Nếu có sản phẩm đã xem, gửi yêu cầu AJAX lên server
 * if (productIds.length > 0) {
 * fetch('?url=Product/getRecentlyViewed', { // Đây là một controller/action mới em cần tạo
 * method: 'POST',
 * headers: {
 * 'Content-Type': 'application/json',
 * },
 * body: JSON.stringify({ ids: productIds }) // Gửi mảng ID đi
 * })
 * .then(response => response.text()) // Nhận về chuỗi HTML
 * .then(html => {
 * // 3. Chèn HTML nhận được vào trang
 * document.getElementById('recently-viewed-container').innerHTML = html;
 * })
 * .catch(error => console.error('Lỗi khi tải sản phẩm đã xem:', error));
 * }
 * });
 * </script>
 *
 *
 * **Bước 3: Tạo file xử lý phía server (ví dụ: `controllers/ProductController.php`)**
 *
 * Em cần tạo một hàm mới, ví dụ `getRecentlyViewed()`, để nhận danh sách ID,
 * truy vấn CSDL và trả về HTML.
 *
 * public function getRecentlyViewed() {
 * $json = file_get_contents('php://input');
 * $data = json_decode($json, true);
 * $ids = $data['ids']; // Nhận mảng ID
 *
 * if (!empty($ids)) {
 * // Gọi model để lấy thông tin các sản phẩm có ID trong mảng $ids
 * $products = $this->productModel->getProductsByIds($ids);
 *
 * // Lặp qua các sản phẩm và gọi hàm render card của em
 * foreach ($products as $product) {
 * render_product_card($product); // Tái sử dụng hàm render em đã có
 * }
 * }
 * }
 *
 */
