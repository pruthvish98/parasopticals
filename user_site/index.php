<!doctype html>
<html lang="en">
    <head>

        <title>Home</title>
        <?php include './css.php';
        include '../connection.php';
        ?>
        <style>



            .zoom:hover {
                transition: transform 1s;
                transform: scale(1.3); 
            }

            @keyframes yourAnimation{
                0%{
                    transform: rotate(0) scale(1.6);
                    opacity: 0;
                }
                100%{
                }
            }
            .elementToAnimate{
                animation: yourAnimation 3s forwards 0s ease;
            }

            @keyframes yourAnimation{
                0%{
                    transform: rotate(0) translateX(-50%);
                    opacity: 0;
                }
                100%{
                    transform: rotate(0);
                    opacity: 1;
                }
            }
            .bt{
                animation: yourAnimation 2s forwards 0s ease-in;
            }
            .left{
                animation: left 3s forwards 0s ease;
            }
            @keyframes left{
                0%{
                    transform: rotate(0) translateX(50%);
                    opacity: 0;
                }
                100%{
                    transform: rotate(0);
                    opacity: 1;
                }
            }

        </style>
    </head>
    <body onload="notifyMe()">

        <!--================Header Menu Area =================-->
<?php include './header.php'; ?>
        <!--================Header Menu Area =================-->
        <br>
        <br>
        <br>
        <!--================Home Banner Area =================-->
        <section class="home_banner_area" >
            <div class="banner_inner d-flex align-items-center"style="  background-image: url(img/banner/banner-bg.jpg);background-position:center ;">
                <div class="container" style="margin-top:-200px;">
                    <div class="banner_content row" >
                        <div class="col-lg-5 elementToAnimate">
                            <br><h3>Best &nbsp;<img src="img/rayban_1.png" Width="30%" style=" filter: opacity(.9) drop-shadow(0 0 10px  orange); margin-bottom: 12px;" > <br><div style="margin-bottom: 50px;">Collections!</div></h3>
                            <p>Check out the Latest Arrivals in the brightest collection and Check out the wide range of models, shapes and colors created for the new season.Discover the full Scuderia Ferrari Collection. Made to win.</p>
                            <a class="white_bg_btn bt" style="background-color: #ED6B11; color: white;" href="shop.php?search=ray">View Collection</a>
                        </div>
                        <div class="col-lg-7 ">
                            <div class="halemet_img left">
                                <img src="img/sunglasses.png" Width="100%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->

        <!--================Feature Product Area =================-->
        <section class="feature_product_area">
            <div class="main_box">
                <div class="container">
                    <div class="row hot_product_inner"  >
                        <div class="col-lg-6">
                            <div class="hot_p_item">
                                <div data-aos="fade-right" data-aos-easing="ease-out-cubic" data-aos-duration="1800" >
                                    <img class="img-fluid " src="img/gucci.jpg" style="border-radius: 7px; ">

                                    <div class="product_text">
                                        <h4>Hot Deals of <br />this Month</h4>

                                        <a href="shop.php?search=gucci" class="zoom">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="hot_p_item"  >
                                <div data-aos="fade-left" data-aos-easing="ease-out-cubic" data-aos-duration="1500">
                                    <img class="img-fluid" src="img/i1.jpg" style="border-radius: 7px;">
                                    <div class="product_text">
                                        <h4>Hot Deals of <br />this Month</h4>
                                        <a href="#" class="zoom">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="feature_product_inner">
                        <div class="main_title">
                            <h2 style="font-family:Segoe Print;">Featured Products</h2>

                        </div>
                        <div class="feature_p_slider owl-carousel ">

                            <div data-aos="zoom-in-up" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                                <div class="item">
                                    <div class="f_p_item">
                                        <div class="f_p_img">
                                            <img class="img-fluid zoom" src="img/Category/a.jpg" >

                                        </div>
                                        <a href="shop.php?search=lens"><h4>Contact Lenses</h4></a>
                                        <h6>Upto 15% Off</h6>
                                    </div>
                                </div>
                            </div>
                            <div data-aos="zoom-in-down" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                                <div class="item">
                                    <div class="f_p_item">
                                        <div class="f_p_img">
                                            <img class="img-fluid zoom" src="img/Category/b.jpg">

                                        </div>
                                        <a href="shop.php?search=eyeglass"><h4>Sunglasses</h4></a>
                                        <h6>From &#8377 1999</h6>
                                    </div>
                                </div>
                            </div>
                            <div data-aos="zoom-in-up" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                                <div class="item">
                                    <div class="f_p_item">
                                        <div class="f_p_img">
                                            <img class="img-fluid zoom" src="img/Category/c.jpg" >

                                        </div>
                                        <a href="shop.php?search=eyeglass"><h4>Eyeglasses</h4></a>
                                        <h6>Start From &#8377 999</h6>
                                    </div>
                                </div>
                            </div>
                            <div data-aos="zoom-in-down" data-aos-easing="ease-out-cubic" data-aos-duration="1000"sss>
                                <div class="item">
                                    <div class="f_p_item">
                                        <div class="f_p_img">
                                            <img class="img-fluid zoom" src="img/aqualens-24-h-contact-lens-30-lens-box-contact-lens_aqualens-24-h-contact-lens-30-lens-box-contact-lens_118538_cl-fb_1__1.jpg"  style=" height: 165px; ">

                                        </div>
                                        <a href="shop.php?search=lens"><h4>Colour Lens</h4></a>
                                        <h6>From &#8377 150.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Feature Product Area =================-->

        <!--================Top selling Product Area =================-->
        <section class="feature_product_area">
            <div class="main_box">
                <div class="container">

                    <div class="feature_product_inner">
                        <br>
                        <br>
                        <div class="main_title">
                            <h2 style="font-family:Segoe Print;">Top Selling Products</h2>

                        </div>
                        <div class="feature_p_slider owl-carousel ">
                            <?php
                            $latestq = mysqli_query($connection, "select * from `product_master` INNER JOIN `sales_order_details` ON(`product_master`.`product_id`=`sales_order_details`.`product_id`)  where `product_master`.`is_delete`='0'  order by `sales_order_details`.`sales_qty` DESC limit 8")or die(mysqli_error($connection));
                            $count = mysqli_num_rows($latestq);
                            while ($rowlate = mysqli_fetch_array($latestq)) {
                                ?>
                                <div data-aos="zoom-in-up" data-aos-easing="ease-out-cubic" data-aos-duration="1000">
                                    <div class="item">
                                        <div class="f_p_item ">
                                            <div class="f_p_img zoom">

                                                <img class="img-fluid " src="<?php echo $rowlate['img'] ?>" style="border-radius: 7px;">

                                            </div>
                                            <a href="<?php echo "single_product.php?pid={$rowlate['product_id']}"; ?>"><h4><?php echo $rowlate['product_name'] ?></h4></a>

                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Top selling Product Area =================-->

        <!--================Deal Timer Area =================-->
        <section class="clients_logo_area">
            <div class="container">
                <div class="main_title">
                    <h2 style="font-family:Segoe Print;">Top Brands of this Month</h2>
                    <p style="font-family:Segoe Print;">Who are in extremely love with Style.</p>
                </div>
                <div class="clients_slider owl-carousel">
                    <div class="item" data-aos="zoom-out-right" data-aos-easing="ease-out-cubic"data-aos-duration="1500">
                        <img src="img/clients-logo/1.png" style="width: 100%; margin-bottom: 10px;" >
                    </div>
                    <div class="item" data-aos="zoom-out-right" data-aos-easing="ease-out-cubic"data-aos-duration="1500">
                        <img src="img/clients-logo/2.png" style="width: 100%;">
                    </div>
                    <div class="item" data-aos="fade-up" data-aos-easing="ease-out-cubic"data-aos-duration="1000">
                        <img src="img/clients-logo/3.png" style="width: 70%;">
                    </div>
                    <div class="item"data-aos="zoom-out-left" data-aos-easing="ease-out-cubic"data-aos-duration="1500">
                        <img src="img/clients-logo/4.png" style="width: 80%;">
                    </div>
                    <div class="item"data-aos="zoom-out-left" data-aos-easing="ease-out-cubic"data-aos-duration="1500">
                        <img src="img/clients-logo/5.png" style="width: 50%;">
                    </div>
                </div>
            </div>
        </section>
        <!--================End Deal Timer Area =================-->

        <!--================Latest Product Area =================-->
        <section class="feature_product_area latest_product_area">
            <div class="main_box">
                <div class="container">
                    <div class="feature_product_inner">
                        <div class="main_title" data-aos="fade-right" data-aos-easing="ease-out-cubic"data-aos-duration="500">
                            <h2 style="font-family:Segoe Print;">Latest Products</h2>

                        </div>

                        <div class="latest_product_inner row">

                            <?php
                            $q = mysqli_query($connection, "select * from product_master where is_delete='0' order by product_id DESC limit 8")or die(mysqli_error($connection));
                            $count = mysqli_num_rows($q);
                            while ($row = mysqli_fetch_array($q)) {
                                ?>

                                <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-down" data-aos-easing="ease-out-cubic"data-aos-duration="1000">
                                    <div class="f_p_item">
                                        <div class="f_p_img">
                                            <a href="<?php echo "single_product.php?pid={$row['product_id']}"; ?>">
                                                <img style="width: 80%; border-radius: 7px;" class="img-fluid" src="<?php echo "{$row['img']}"; ?>">
                                            </a>
                                            <div class="p_icon">

                                                <form method="get" action="cartprocess.php">

                                                    <input type="hidden" name="productid" value="<?php echo $row['product_id'] ?>"  class="input-text qty">
                                                    <input type="hidden" name="qty" value="1"  class="input-text qty">

                                                    <a> <button type="submit" style="background: none; border: none;" class="lnr lnr-cart"></button></a>
                                                </form>

                                            </div>
                                        </div>
                                        <a href="<?php echo "single_product.php?pid={$row['product_id']}"; ?>"><h4><?php echo "{$row['product_name']} "; ?></h4></a>
                                        <h6>₹ <?php echo "{$row['product_price']} "; ?></h6>
                                    </div>
                                </div>
<?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!--================ start footer Area  =================-->	
<?php include './footer.php'; ?>
        <!--================ End footer Area  =================-->


<?php include './script.php'; ?>
    </body>
</html>
