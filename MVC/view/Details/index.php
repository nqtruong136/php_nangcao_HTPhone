<main>
    <!--  services-area start-->
    <div class="services-area2">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="row">
                        <div class="col-xl-12">
                            <!-- Single -->
                            <?php
                            if (!empty($data1)) {
                                foreach ($data1 as $data1) {
                            ?>
                            <div class="single-services d-flex align-items-center mb-0">
                                <div class="features-img">
                                    <img src="assets/img/gallery/anhphp/<?php echo $data1['AnhBia']; ?>" alt="">
                                </div>

                                <div class="features-caption">
                                    <h3><?php echo $data1['TenSach']; ?></h3>
                                    <p><?php echo $data1['CacTacGia']; ?></p>
                                    <div class="price">
                                        <span><?php echo number_format($data1['GiaBan'], 0, ',', '.'); ?> VNĐ</span>
                                    </div>
                                    <div class="review">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                        </div>
                                        <p>(<?php echo $data1['SoLuotMua']; ?> Review)</p>
                                    </div> 
                                    <a href="#" class="white-btn mr-10">Add to Cart</a>
                                    <a href="#" class="border-btn share-btn"><i class="fas fa-share-alt"></i></a>
                                </div>
                            </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- services-area End-->
    <!--Books review Start -->
    <section class="our-client section-padding best-selling">
        <div class="container">
            <div class="row">
                <div class="offset-xl-1 col-xl-10">
                    <div class="nav-button f-left">
                        <!--Nav Button  -->
                        <nav>
                            <div class="nav nav-tabs " id="nav-tab" role="tablist">
                                <a class="nav-link active" id="nav-one-tab" data-bs-toggle="tab" href="#nav-one" role="tab" aria-controls="nav-one" aria-selected="true">Description</a>
                                <a class="nav-link" id="nav-two-tab" data-bs-toggle="tab" href="#nav-two" role="tab" aria-controls="nav-two" aria-selected="false">Author</a>
                                <a class="nav-link" id="nav-three-tab" data-bs-toggle="tab" href="#nav-three" role="tab" aria-controls="nav-three" aria-selected="false">Comments</a>
                                <a class="nav-link" id="nav-four-tab" data-bs-toggle="tab" href="#nav-four" role="tab" aria-controls="nav-four" aria-selected="false">Review</a>
                            </div>
                        </nav>
                        <!--End Nav Button  -->
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <!-- Nav Card -->
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">
                    <!-- Tab 1 -->
                    <div class="row">
                        <div class="offset-xl-1 col-lg-9">
                            <?php echo $data1['MoTaSach']; ?>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-two" role="tabpanel" aria-labelledby="nav-two-tab">
                    <!-- Tab 2 -->
                    <div class="row">
                        <div class="offset-xl-1 col-lg-9">
                            <?php echo $data1['CacTacGia']; ?>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-three" role="tabpanel" aria-labelledby="nav-three-tab">
                    <!-- Tab 3 -->
                    <div class="row">
                        <div class="offset-xl-1 col-lg-9">
                            <div class="comments-area">

                                <h4><?php echo $soluongcomment[0]['TongComment'];?> Comments</h4>
                                <?php
                                
                                
                                
                                if (isset($data3)) {
                                    foreach ($data3 as $item) {
                                ?>
                                        <div class="comment-list">
                                            <div class="single-comment justify-content-between d-flex">
                                                <div class="user justify-content-between d-flex">
                                                    <div class="thumb">
                                                        <img src="assets/img/blog/<?php /*echo $item['AnhDaiDien']; */?>comment_2.png" alt="">
                                                    </div>
                                                    <div class="desc">
                                                        <p class="comment">
                                                            <?php echo $item['BinhLuan']; ?>
                                                        </p>
                                                        <div class="d-flex justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <h5>
                                                                    <a href="#"><?php echo $item['TenNguoiBinhLuan']; ?></a>
                                                                </h5>
                                                                <p class="date"><?php echo $item['NgayDanhGia']; ?></p>
                                                            </div>
                                                            <div class="reply-btn">
                                                                <a href="#" class="btn-reply text-uppercase">reply</a>
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
                                <div class="comment-list">
                                    <div class="single-comment justify-content-between d-flex">
                                        <div class="user justify-content-between d-flex">
                                            <div class="thumb">
                                                <img src="assets/img/blog/comment_2.png" alt="">
                                            </div>
                                            <div class="desc">
                                                <p class="comment">
                                                    Multiply sea night grass fourth day sea lesser rule open subdue female fill which them
                                                    Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
                                                </p>
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex align-items-center">
                                                        <h5>
                                                            <a href="#">Emilly Blunt</a>
                                                        </h5>
                                                        <p class="date">December 4, 2017 at 3:12 pm </p>
                                                    </div>
                                                    <div class="reply-btn">
                                                        <a href="#" class="btn-reply text-uppercase">reply</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="comment-list">
                                    <div class="single-comment justify-content-between d-flex">
                                        <div class="user justify-content-between d-flex">
                                            <div class="thumb">
                                                <img src="assets/img/blog/comment_3.png" alt="">
                                            </div>
                                            <div class="desc">
                                                <p class="comment">
                                                    Multiply sea night grass fourth day sea lesser rule open subdue female fill which them
                                                    Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
                                                </p>
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex align-items-center">
                                                        <h5>
                                                            <a href="#">Emilly Blunt</a>
                                                        </h5>
                                                        <p class="date">December 4, 2017 at 3:12 pm </p>
                                                    </div>
                                                    <div class="reply-btn">
                                                        <a href="#" class="btn-reply text-uppercase">reply</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="comment-form">
                                <h4>Leave a Reply</h4>
                                <form class="form-contact comment_form" action="#" id="commentForm">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                                                    placeholder="Write Comment"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input class="form-control" name="name" id="name" type="text" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <input class="form-control" name="email" id="email" type="email" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input class="form-control" name="website" id="website" type="text" placeholder="Website">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="button button-contactForm btn_1 boxed-btn">Post Comment</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-four" role="tabpanel" aria-labelledby="nav-four-tab">
                    <!-- Tab 4 -->
                    <div class="row">
                        <div class="offset-xl-1 col-lg-9">
                            <p>Beryl Cook is one of Britain’s most talented and amusing artists .Beryl’s pictures feature women of all shapes and sizes enjoying themselves .Born between the two world wars, Beryl Cook eventually left Kendrick School in Reading at the age of 15, where she went to secretarial school and then into an insurance office. After moving to London and then Hampton, she eventually married her next door neighbour from Reading, John Cook. He was an officer in the Merchant Navy and after he left the sea in 1956, they bought a pub for a year before John took a job in Southern Rhodesia with a motor company. Beryl bought their young son a box of watercolours, and when showing him how to use it, she decided that she herself quite enjoyed painting. John subsequently bought her a child’s painting set for her birthday and it was with this that she produced her first significant work, a half-length portrait of a dark-skinned lady with a vacant expression and large drooping breasts. It was aptly named ‘Hangover’ by Beryl’s husband and</p>

                            <p>It is often frustrating to attempt to plan meals that are designed for one. Despite this fact, we are seeing more and more recipe books and Internet websites that are dedicated to the act of cooking for one. Divorce and the death of spouses or grown children leaving for college are all reasons that someone accustomed to cooking for more than one would suddenly need to learn how to adjust all the cooking practices utilized before into a streamlined plan of cooking that is more efficient for one person creating less.</p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-five" role="tabpanel" aria-labelledby="nav-five-tab">
                    <!-- Tab 5 -->
                    <div class="row">
                        <div class="offset-xl-1 col-lg-9">
                            <p>Beryl Cook is one of Britain’s most talented and amusing artists .Beryl’s pictures feature women of all shapes and sizes enjoying themselves .Born between the two world wars, Beryl Cook eventually left Kendrick School in Reading at the age of 15, where she went to secretarial school and then into an insurance office. After moving to London and then Hampton, she eventually married her next door neighbour from Reading, John Cook. He was an officer in the Merchant Navy and after he left the sea in 1956, they bought a pub for a year before John took a job in Southern Rhodesia with a motor company. Beryl bought their young son a box of watercolours, and when showing him how to use it, she decided that she herself quite enjoyed painting. John subsequently bought her a child’s painting set for her birthday and it was with this that she produced her first significant work, a half-length portrait of a dark-skinned lady with a vacant expression and large drooping breasts. It was aptly named ‘Hangover’ by Beryl’s husband and</p>

                            <p>It is often frustrating to attempt to plan meals that are designed for one. Despite this fact, we are seeing more and more recipe books and Internet websites that are dedicated to the act of cooking for one. Divorce and the death of spouses or grown children leaving for college are all reasons that someone accustomed to cooking for more than one would suddenly need to learn how to adjust all the cooking practices utilized before into a streamlined plan of cooking that is more efficient for one person creating less.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Books review End -->
    <!-- Subscribe Area Start -->
    <section class="subscribe-area">
        <div class="container">
            <div class="subscribe-caption text-center  subscribe-padding section-img2-bg" data-background="assets/img/gallery/section-bg1.jpg">
                <div class="row justify-content-center">

                    <div class="col-xl-6 col-lg-8 col-md-9">
                        <h3>Join Newsletter</h3>
                        <p>Lorem started its journey with cast iron (CI) products in 1980. The initial main objective was to ensure pure water and affordable irrigation.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your email">
                            <button class="subscribe-btn">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Subscribe Area End -->
</main>