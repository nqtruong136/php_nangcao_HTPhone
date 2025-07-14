<!-- view/Cart/index.php -->
<main>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="slider-area">
                    <div class="slider-height2 slider-bg5 d-flex align-items-center justify-content-center">
                        <div class="hero-caption hero-caption2">
                            <h2>Cart</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="cart_area section-padding">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <form action="?controller=Cart&action=updateCart" method="POST">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $subtotal = 0;
                                if (isset($_SESSION['cart'])) {
                                    foreach ($_SESSION['cart'] as $item) {
                                        $total = $item['price'] * $item['quantity'];
                                        $subtotal += $total;
                                ?>
                                        <tr>
                                            <td>
                                                <div class="media">
                                                    <div class="d-flex">
                                                        <img src="assets/img/gallery/anhphp/<?php echo $item['img']; ?>" alt="" />
                                                    </div>
                                                    <div class="media-body">
                                                        <p><?php echo $item['name']; ?></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <h5><?php echo number_format($item['price'], 0);  ?>VND</h5>
                                            </td>
                                            <td>
                                                <div class="product_count">
                                                    <span class="input-number-decrement"> <i class="ti-minus"></i></span>
                                                    <input class="input-number" type="number" name="quantity[<?php echo $item['id']; ?>]" value="<?php echo $item['quantity']; ?>" min="1" max="10">
                                                    <span class="input-number-increment"> <i class="ti-plus"></i></span>
                                                </div>
                                            </td>
                                            <td>
                                                <h5><?php echo number_format($total, 0); ?>VND</h5>
                                            </td>
                                            <td>
                                                <a href="?controller=Cart&action=removeItem&id=<?php echo $item['id']; ?>" class="btn"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                                <tr class="bottom_button">
                                    <td>
                                        <button class="btn" type="submit">Update Cart</button>
                                    </td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <div class="cupon_text float-right">
                                            <a class="btn" href="?controller=Cart&action=clearCart">Clear Cart</a>
                                        </div>
                                    </td>
                                </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <h5>Subtotal</h5>
                                </td>
                                <td>
                                    <h5>$<?php echo number_format($subtotal, 2); ?></h5>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="checkout_btn_inner float-right">
                        <a class="btn" href="?controller=Books&action=index">Continue Shopping</a>
                        <a class="btn checkout_btn" href="#">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>