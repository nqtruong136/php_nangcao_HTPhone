<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <div class="slider-area">
                <div class="slider-height2 slider-bg4 d-flex align-items-center justify-content-center">
                    <div class="hero-caption hero-caption2">
                        <h2>Book Category</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    function formatPriceToK($price) {
        // Nếu giá tiền lớn hơn hoặc bằng 1000
        if ($price >= 1000) {
            // Chia cho 1000, làm tròn xuống và thêm chữ 'K'
            return floor($price / 1000) . 'K';
        }
        
        // Nếu nhỏ hơn 1000, giữ nguyên
        return $price;
    }
    ?>
<!--  Hero area End -->
<!-- listing Area Start -->
<div class="listing-area pt-50 pb-50">
    <div class="container">
        <div class="row">
            <!--? Left content -->
            <div class="col-xl-4 col-lg-4 col-md-6">
                <!-- Job Category Listing start -->
                <div class="category-listing mb-50">
                    <!-- single one -->
                    <div class="single-listing">
                        <!-- select-Categories  -->
                        <div class="select-Categories pb-30">
                            <div class="small-tittle mb-20">
                                <h4>Filter by Genres</h4>
                            </div>
                            <label class="container">History
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container">Horror - Thriller
                                <input type="checkbox" checked="checked active">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container">Love Stories
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container">Science Fiction
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container">Biography
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <!-- select-Categories End -->

                        <!-- Range Slider Start -->
                        <aside class="left_widgets p_filter_widgets price_rangs_aside sidebar_box_shadow mb-40">
                            <div class="small-tittle">
                                <h4>Filter by Price</h4>
                            </div>
                            <div class="widgets_inner">
                                <div class="range_item">
                                    <input type="text" class="js-range-slider" value="" />
                                    <div class="d-flex align-items-center">

                                        <div class="price_value d-flex justify-content-center">
                                            <input type="text" class="js-input-from" id="amount" readonly />
                                            <span>to</span>
                                            <input type="text" class="js-input-to" id="amount" readonly />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </aside>
                        <!-- range end -->

                        <!-- Select City items start -->
                        <div class="select-job-items2 mb-30">
                            <div class="col-xl-12">
                                <select name="select2">
                                    <option value="">Filter by Rating</option>
                                    <option value="">5 Star Rating</option>
                                    <option value="">4 Star Rating</option>
                                    <option value="">3 Star Rating</option>
                                    <option value="">2 Star Rating</option>
                                    <option value="">1 Star Rating</option>
                                </select>
                            </div>
                        </div>
                        <!--  Select City items End-->

                        <!-- select-Categories start -->
                        <div class="select-Categories pt-100 pb-60">
                            <div class="small-tittle mb-20">
                                <h4>Filter by Publisher</h4>
                            </div>
                            <label class="container">Green Publications
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container">Anondo Publications
                                <input type="checkbox" checked="checked active">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container">Rinku Publications
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container">Sheba Publications
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container">Red Publications
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <!-- select-Categories End -->
                        <!-- select-Categories start -->
                        <div class="select-Categories">
                            <div class="small-tittle mb-20">
                                <h4>Filter by Author Name</h4>
                            </div>
                            <label class="container">Buster Hyman
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container">Phil Harmonic
                                <input type="checkbox" checked="checked active">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container">Cam L. Toe
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container">Otto Matic
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container">Juan Annatoo
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <!-- select-Categories End -->
                    </div>
                </div>
                <!-- Job Category Listing End -->
            </div>
            <!--?  Right content -->
            <div class="col-xl-8 col-lg-8 col-md-6">
                <div class="row justify-content-end">
                    <div class="col-xl-4">
                        <div class="product_page_tittle">
                            <div class="short_by">
                                <select name="#" id="product_short_list">
                                    <option>Browse by popularity</option>
                                    <option>Name</option>
                                    <option>NEW</option>
                                    <option>Old</option>
                                    <option>Price</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="best-selling p-0">
                    <div class="row">
                        <?php
                        if (!empty($data)) {
                            foreach ($data as $book) {
                        ?>
                                <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-12 col-sm-6">
                                    <div class="properties pb-30">
                                        <div class="properties-card">
                                            <div class="properties-img">
                                                <a href="?controller=Details&action=index&id=<?php echo $book['MaSach']; ?>"><img src="assets/img/gallery/anhphp/<?php echo $book['AnhBia']; ?>" alt=""></a>
                                            </div>
                                            <div class="properties-caption properties-caption2">
                                                <h3><a href="?controller=Details&action=index&id=<?php echo $book['MaSach']; ?>"><?php echo $book['TenSach']; ?></a></h3>
                                                <p><?php echo $book['CacTacGia']; ?></p>
                                                <div class="properties-footer d-flex justify-content-between align-items-center">
                                                    <div class="review">
                                                        <div class="rating">
                                                            
                                                            <?php
                                                            // Giả sử $book['DiemTrungBinh'] có giá trị là 4.3 hoặc 4.7 v.v...
                                                            $rating = $book['DiemTrungBinh'];

                                                            // 1. Tính toán số lượng cho mỗi loại sao
                                                            $fullStars = floor($rating); // Số sao đầy (làm tròn xuống)
                                                            $halfStar = ($rating - $fullStars) > 0; // Có sao rưỡi hay không?
                                                            $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0); // Số sao trống còn lại

                                                            // --- Bắt đầu vòng lặp để hiển thị ---

                                                            // 2. Vòng lặp để hiển thị các SAO ĐẦY
                                                            for ($i = 0; $i < $fullStars; $i++) {
                                                                echo '<i class="fas fa-star" ></i>';
                                                            }

                                                            // 3. Hiển thị SAO RƯỠI (nếu có)
                                                            if ($halfStar) {
                                                                echo '<i class="fas fa-star-half-alt"></i>';
                                                            }

                                                            // 4. Vòng lặp để hiển thị các SAO TRỐNG
                                                            for ($i = 0; $i < $emptyStars; $i++) {
                                                                // Dùng class "far" của Font Awesome cho sao rỗng
                                                                echo '<i class="far fa-star"></i>';
                                                            }
                                                            ?>
                                                            
                                                        </div>
                                                        <p>(<span><?php echo $book['SoLuotMua'];?></span></span> Review)</p>
                                                    </div>
                                                    <div class="price">
                                                        <span><?php echo formatPriceToK($book['GiaBan']); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>
                        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-12 col-sm-6">
                            <div class="properties pb-30">
                                <div class="properties-card">
                                    <div class="properties-img">
                                        <a href="book-details.html"><img src="assets/img/gallery/best_selling8.jpg" alt=""></a>
                                    </div>
                                    <div class="properties-caption properties-caption2">
                                        <h3><a href="book-details.html">Moon Dance</a></h3>
                                        <p>J. R Rain</p>
                                        <div class="properties-footer d-flex justify-content-between align-items-center">
                                            <div class="review">
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>

                                                    <i class="fas fa-star-half-alt"></i>
                                                    <i class="far fa-star"></i>

                                                </div>
                                                <p>(<span>120</span> Review)</p>
                                            </div>
                                            <div class="price">
                                                <span>$50</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-12 col-sm-6">
                            <div class="properties pb-30">
                                <div class="properties-card">
                                    <div class="properties-img">
                                        <a href="book-details.html"><img src="assets/img/gallery/best_selling6.jpg" alt=""></a>
                                    </div>
                                    <div class="properties-caption properties-caption2">
                                        <h3><a href="book-details.html">Moon Dance</a></h3>
                                        <p>J. R Rain</p>
                                        <div class="properties-footer d-flex justify-content-between align-items-center">
                                            <div class="review">
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                </div>
                                                <p>(<span>120</span> Review)</p>
                                            </div>
                                            <div class="price">
                                                <span>$50</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-12 col-sm-6">
                            <div class="properties pb-30">
                                <div class="properties-card">
                                    <div class="properties-img">
                                        <a href="book-details.html"><img src="assets/img/gallery/best_selling4.jpg" alt=""></a>
                                    </div>
                                    <div class="properties-caption properties-caption2">
                                        <h3><a href="book-details.html">Moon Dance</a></h3>
                                        <p>J. R Rain</p>
                                        <div class="properties-footer d-flex justify-content-between align-items-center">
                                            <div class="review">
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                </div>
                                                <p>(<span>120</span> Review)</p>
                                            </div>
                                            <div class="price">
                                                <span>$50</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-12 col-sm-6">
                            <div class="properties pb-30">
                                <div class="properties-card">
                                    <div class="properties-img">
                                        <a href="book-details.html"><img src="assets/img/gallery/best_selling9.jpg" alt=""></a>
                                    </div>
                                    <div class="properties-caption properties-caption2">
                                        <h3><a href="book-details.html">Moon Dance</a></h3>
                                        <p>J. R Rain</p>
                                        <div class="properties-footer d-flex justify-content-between align-items-center">
                                            <div class="review">
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                </div>
                                                <p>(<span>120</span> Review)</p>
                                            </div>
                                            <div class="price">
                                                <span>$50</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-12 col-sm-6">
                            <div class="properties pb-30">
                                <div class="properties-card">
                                    <div class="properties-img">
                                        <a href="book-details.html"><img src="assets/img/gallery/best_selling2.jpg" alt=""></a>
                                    </div>
                                    <div class="properties-caption properties-caption2">
                                        <h3><a href="book-details.html">Moon Dance</a></h3>
                                        <p>J. R Rain</p>
                                        <div class="properties-footer d-flex justify-content-between align-items-center">
                                            <div class="review">
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                </div>
                                                <p>(<span>120</span> Review)</p>
                                            </div>
                                            <div class="price">
                                                <span>$50</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-12 col-sm-6">
                            <div class="properties pb-30">
                                <div class="properties-card">
                                    <div class="properties-img">
                                        <a href="book-details.html"><img src="assets/img/gallery/best_selling7.jpg" alt=""></a>
                                    </div>
                                    <div class="properties-caption properties-caption2">
                                        <h3><a href="book-details.html">Moon Dance</a></h3>
                                        <p>J. R Rain</p>
                                        <div class="properties-footer d-flex justify-content-between align-items-center">
                                            <div class="review">
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                </div>
                                                <p>(<span>120</span> Review)</p>
                                            </div>
                                            <div class="price">
                                                <span>$50</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-12 col-sm-6">
                            <div class="properties pb-30">
                                <div class="properties-card">
                                    <div class="properties-img">
                                        <a href="book-details.html"><img src="assets/img/gallery/best_selling8.jpg" alt=""></a>
                                    </div>
                                    <div class="properties-caption properties-caption2">
                                        <h3><a href="book-details.html">Moon Dance</a></h3>
                                        <p>J. R Rain</p>
                                        <div class="properties-footer d-flex justify-content-between align-items-center">
                                            <div class="review">
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                </div>
                                                <p>(<span>120</span> Review)</p>
                                            </div>
                                            <div class="price">
                                                <span>$50</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-12 col-sm-6">
                            <div class="properties pb-30">
                                <div class="properties-card">
                                    <div class="properties-img">
                                        <a href="book-details.html"><img src="assets/img/gallery/best_selling6.jpg" alt=""></a>
                                    </div>
                                    <div class="properties-caption properties-caption2">
                                        <h3><a href="book-details.html">Moon Dance</a></h3>
                                        <p>J. R Rain</p>
                                        <div class="properties-footer d-flex justify-content-between align-items-center">
                                            <div class="review">
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                </div>
                                                <p>(<span>120</span> Review)</p>
                                            </div>
                                            <div class="price">
                                                <span>$50</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-12 col-sm-6">
                            <div class="properties pb-30">
                                <div class="properties-card">
                                    <div class="properties-img">
                                        <a href="book-details.html"><img src="assets/img/gallery/best_selling4.jpg" alt=""></a>
                                    </div>
                                    <div class="properties-caption properties-caption2">
                                        <h3><a href="book-details.html">Moon Dance</a></h3>
                                        <p>J. R Rain</p>
                                        <div class="properties-footer d-flex justify-content-between align-items-center">
                                            <div class="review">
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                </div>
                                                <p>(<span>120</span> Review)</p>
                                            </div>
                                            <div class="price">
                                                <span>$50</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-12 col-sm-6">
                            <div class="properties pb-30">
                                <div class="properties-card">
                                    <div class="properties-img">
                                        <a href="book-details.html"><img src="assets/img/gallery/best_selling9.jpg" alt=""></a>
                                    </div>
                                    <div class="properties-caption properties-caption2">
                                        <h3><a href="book-details.html">Moon Dance</a></h3>
                                        <p>J. R Rain</p>
                                        <div class="properties-footer d-flex justify-content-between align-items-center">
                                            <div class="review">
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                </div>
                                                <p>(<span>120</span> Review)</p>
                                            </div>
                                            <div class="price">
                                                <span>$50</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-12 col-sm-6">
                            <div class="properties pb-30">
                                <div class="properties-card">
                                    <div class="properties-img">
                                        <a href="book-details.html"><img src="assets/img/gallery/best_selling2.jpg" alt=""></a>
                                    </div>
                                    <div class="properties-caption properties-caption2">
                                        <h3><a href="book-details.html">Moon Dance</a></h3>
                                        <p>J. R Rain</p>
                                        <div class="properties-footer d-flex justify-content-between align-items-center">
                                            <div class="review">
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                </div>
                                                <p>(<span>120</span> Review)</p>
                                            </div>
                                            <div class="price">
                                                <span>$50</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- button -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="more-btn text-center mt-15">
                            <a href="#" class="border-btn border-btn2 more-btn2">Browse More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>