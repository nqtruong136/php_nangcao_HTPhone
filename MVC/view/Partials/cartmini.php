<?php
    // File này là khung sườn, được gọi ở layout chính.
    // Nó tự chuẩn bị dữ liệu cho lần tải trang đầu tiên.
    $cartItems = isset($cart['items']) ? $cart['items'] : [];
    $cartTotal = isset($cart['total']) ? $cart['total'] : 0;
    $cartItemCount = isset($cart['count']) ? $cart['count'] : 0;
?>
<div class="d-inline-block box-dropdown-cart">
    <span class="font-lg icon-list icon-cart">
        <span>Cart</span>
        <span id="mini-cart-count" class="number-item font-xs"><?php echo $cartItemCount; ?></span>
    </span>
    <div class="dropdown-cart">
        <div id="mini-cart-dropdown">
            <?php
                // Nhúng file nội dung vào đây
                require 'view/Partials/_cart_content.php';
            ?>
        </div>
    </div>
</div>
