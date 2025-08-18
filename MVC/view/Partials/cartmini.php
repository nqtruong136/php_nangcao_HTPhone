<?php
// Giả sử bạn đã nạp các model và controller cần thiết
    
    // Giả sử các hàm quản lý giỏ hàng đã được nạp
    $cartItems = isset($cart['items']) ? $cart['items'] : [];
    $cartTotal = isset($cart['total']) ? $cart['total'] : 0;
    $cartItemCount = isset($cart['count']) ? $cart['count'] : 0;
    //var_dump($cartItems, $cartTotal, $cartItemCount); // Kiểm tra dữ liệu giỏ hàng
?>

<div class="d-inline-block box-dropdown-cart">
    <span class="font-lg icon-list icon-cart">
        <span>Cart</span>
        <!-- ID="mini-cart-count" để JavaScript có thể cập nhật -->
        <span id="mini-cart-count" class="number-item font-xs"><?php echo $cartItemCount; ?></span>
    </span>
    <div class="dropdown-cart">
        <!-- ID="mini-cart-dropdown" để JavaScript có thể cập nhật -->
        <div id="mini-cart-dropdown">
            <?php if (empty($cartItems)): ?>
                <p class="text-center p-20">Giỏ hàng của bạn đang trống.</p>
            <?php else: ?>
                <!-- Bắt đầu lặp qua các sản phẩm trong giỏ -->
                <?php foreach ($cartItems as $variant_id => $item): ?>
                    <div class="item-cart mb-20">
                        <div class="cart-image">
                            <img src="assets/imgs/phone/<?php echo htmlspecialchars($item['image']); ?>" alt="Product Image">
                        </div>
                        <div class="cart-info">
                            <a class="font-sm-bold color-brand-3" href="?url=Details/index/<?php echo $item['product_id']; ?>">
                                <?php echo htmlspecialchars($item['name']); ?>
                            </a>
                            <p>
                                <span class="color-brand-2 font-sm-bold">
                                    <?php echo $item['quantity']; ?> x <?php echo number_format($item['price']); ?>đ
                                </span>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
                <!-- Kết thúc lặp -->

                <div class="border-bottom pt-0 mb-15"></div>
                <div class="cart-total">
                    <div class="row">
                        <div class="col-6 text-start"><span class="font-md-bold color-brand-3">Total</span></div>
                        <div class="col-6"><span class="font-md-bold color-brand-1"><?php echo number_format($cartTotal); ?>đ</span></div>
                    </div>
                    <div class="row mt-15">
                        <div class="col-6 text-start"><a class="btn btn-cart w-auto" href="?url=Cart/index">View cart</a></div>
                        <div class="col-6"><a class="btn btn-buy w-auto" href="?url=Checkout/index">Checkout</a></div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
