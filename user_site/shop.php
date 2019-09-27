<!doctype html>
<html lang="en">
    <head>

        <title>Shop</title>
        <?php
        include './css.php';
        include '../connection.php';
        ?>
        <style>
            input[type=text] {
                width: 130px;
                -webkit-transition: width 0.4s ease-in-out;
                transition: width 0.4s ease-in-out;
            }

            /* When the input field gets focus, change its width to 100% */
            input[type=text]:focus {
                width: 35%;
            }
            .zoom:hover {

                transform: scale(1.3); 
                transition: .6s;
            }
            ::placeholder{text-align: center;}
            .sh:hover{box-shadow:0 7px 10px rgba(0,0,0,.3); transition: .2s;}

            .box {
                width: 150px; height: 20px;

            }
            .ribbon {
                position: absolute;
                left: -5px; top: -5px;
                z-index: 1;
                overflow: hidden;
                width: 75px; height: 75px;
                text-align: right;
            }
            .ribbon span {
                font-size: 10px;
                font-weight: bold;
                color: #FFF;
                text-transform: uppercase;
                text-align: center;
                line-height: 20px;
                transform: rotate(-45deg);
                -webkit-transform: rotate(-45deg);
                width: 100px;
                display: block;
                background: #79A70A;
                background: linear-gradient(#2989d8 0%, #1e5799 100%);
                box-shadow: 0 3px 10px -5px rgba(0, 0, 0, 1);
                position: absolute;
                top: 19px; left: -21px;
            }
            .ribbon span::before {
                content: "";
                position: absolute; left: 0px; top: 100%;
                z-index: -1;
                border-left: 3px solid #1e5799;
                border-right: 3px solid transparent;
                border-bottom: 3px solid transparent;
                border-top: 3px solid #1e5799;
            }
            .ribbon span::after {
                content: "";
                position: absolute; right: 0px; top: 100%;
                z-index: -1;
                border-left: 3px solid transparent;
                border-right: 3px solid #1e5799;
                border-bottom: 3px solid transparent;
                border-top: 3px solid #1e5799;
            }
        </style>
    </head>
    <body>


        <!--================Header Menu Area =================-->
        <?php include './header.php'; ?>


        <!--================Category Product Area =================-->
        <section class="cat_product_area p_120">



            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-lg-9">
                        <div class="product_top_bar"style="border-radius: 50px;" align="right"  >
                            <form method="get" class="form-control" style="border-radius: 25px; background-color:transparent;border: none;">


                                <span>
                                    <input style=" background-color: #FF6C00; text-align: center; color:white; border-radius: 25px;border: none; height: 110%;"  type="text" autocomplete="off" class="md-input" name="search">
                                    <input style="background-color: #FF6C00;border-radius: 25px; border: none;height: 110%; " type="submit" value="Search" class=" btn btn-danger btn-sm">                                 

                                </span>
                            </form>
                            <!--
                            <div class="left_dorp">

                                <select class="show">
                            


                                </select>
                            </div>
                            -->
                        </div>



                        <div class="latest_product_inner row">
                            <?php
                            if (isset($_GET['subcatid'])) {
                                $subcatid = $_GET['subcatid'];
                                $q = mysqli_query($connection, "select * from product_master INNER JOIN `offers` 
                                                    ON (`product_master`.`offer_id` = `offers`.`offer_id`) where sub_cat_id={$subcatid} AND `product_master`.`is_delete`='0'")or die(mysqli_error($connection));
                            } elseif (isset($_GET['search'])) {

                                $search = $_GET['search'];
                                $q = mysqli_query($connection, "select * from product_master INNER JOIN `offers` 
                                                    ON (`product_master`.`offer_id` = `offers`.`offer_id`) where product_name like '%{$search}%' AND `product_master`.`is_delete`='0'")or die(mysqli_error($connection));
                            } elseif (isset($_GET['color'])) {

                                $color = $_GET['color'];
                                $q = mysqli_query($connection, "select * from product_master INNER JOIN `offers` 
                                                    ON (`product_master`.`offer_id` = `offers`.`offer_id`) where color_id ={$color} AND `product_master`.`is_delete`='0'")or die(mysqli_error($connection));
                            } elseif (isset($_GET['brand'])) {

                                $brand = $_GET['brand'];
                                $q = mysqli_query($connection, "select * from product_master INNER JOIN `offers` 
                                                    ON (`product_master`.`offer_id` = `offers`.`offer_id`) where brand_id ={$brand} AND `product_master`.`is_delete`='0'")or die(mysqli_error($connection));
                            } else {
                                $q = mysqli_query($connection, "select * from product_master INNER JOIN `offers` 
                                                    ON (`product_master`.`offer_id` = `offers`.`offer_id`) where `product_master`.`is_delete`='0' "
                                        )or die(mysqli_error($connection));
                            }


                            $count = mysqli_num_rows($q);
                            while ($row = mysqli_fetch_array($q)) {
                                ?>

                                <div class="col-lg-3 col-md-5 col-sm-6" style=" margin-left: 5%; "data-aos="zoom-in-up" data-aos-easing="ease-out-cubic"data-aos-duration="1000">

                                    <div class="f_p_item ">                                       


                                        <?php
                                        if ($row['offer_id'] != "0" && $row['is_active'] == "1") {
                                            echo " <div class='ribbon'><span> {$row['discount']} % Off</span></div>";
                                            
                                        }
                                        ?>

                                        <div class="f_p_img">
                                            <br>
                                            <br>
                                            <div class="zoom">


                                                <a href="<?php echo "single_product.php?pid={$row['product_id']}"; ?>">
                                                    <img style="width: 80%; border-radius: 7px;" class="img-fluid" src="<?php echo "{$row['img']}"; ?>">
                                                </a><br>
                                            </div>
                                            
                                            <?php if($row['qty']>0){?>
                                            <div class="p_icon">
                                                <form method="get" action="cartprocess.php">
                                                
                                                    <!-- <a href="#"><i class="lnr lnr-gift"></i></a> -->
                                                

                                                    <input type="hidden" name="productid" value="<?php echo $row['product_id'] ?>"  class="input-text qty">
                                                    <input type="hidden" name="qty" value="1" max="<?php echo $row['qty']?>" class="input-text qty">

                                                    <a> <button type="submit" style="background: none; border: none;" class="lnr lnr-cart"></button></a>
                                                </form>

                                            </div>
                                            <?php }?>
                                        </div>

                                        <br>
                                        <br>

                                        <a href="<?php echo "single_product.php?pid={$row['product_id']}"; ?>"><h4><?php echo "{$row['product_name']} "; ?></h4></a>
                                        <hr>
                                        <h6 style="color:black;"> 
                                         <?php  
                                                $offerq = mysqli_query($connection, "select * from offers where offer_id='{$row['offer_id']}' AND is_active='1' ")or die(mysqli_error($connection));
                                                $offerrow = mysqli_fetch_array($offerq);
                                                $disc = $offerrow['discount'];
                                                $price = $row['product_price'];
                                                $oprice = ($price * $disc) / 100;
                                                $fprice = $price - $oprice;
                                                if ($disc > 0) {

                                                    echo "₹". $fprice . "&nbsp &nbsp <strike style='color:red;'>MRP ₹ {$price}</strike> ";
                                                } else {
                                                    echo "₹".$price;
                                                }
                                                ?></h6>
                                        <hr>
                                    </div>

                                </div>

                            <?php } ?>


                        </div>



                    </div>
                    <div class="col-lg-3">
                        <div class="left_sidebar_area">


                            <!--
                                                        <div  style="margin-top: 4%; ">
                            
                                                            <form>
                            
                                                                <div style="background-color: #e8f0f2;">
                                                                    <input style="width: 100%;border: none;border-radius: 50px; height: 50px;  "  type="text" placeholder="search">
                                                                    <input  type="submit" style="position: absolute;bottom: 96.1%; width: 30%;  border: none;border-radius: 50px;margin-top: 5%; height: 51px; ">
                                                                </div>
                            
                                                            </form>
                            
                            
                                                        </div>       
                                                        <br>
                            -->
                            <aside class="left_widgets p_filter_widgets">


                                <div class="l_w_title" style="border-radius: 50px; ">
                                    <h3>Frame Style</h3>
                                </div>
                                <div class="widgets_inner">


                                    <?php
                                    $subcatq = mysqli_query($connection, "select * from sub_category where is_delete='0'")or die(mysqli_error($connection));


                                    while ($subcatrow = mysqli_fetch_array($subcatq)) {
                                        ?>
                                        <ul class="list">
                                            <li><a href="<?php echo"?subcatid={$subcatrow['sub_cat_id']}"; ?>"><?php echo $subcatrow['sub_cat_name']; ?></a></li>&nbsp;

                                        </ul>
                                    <?php } ?>

                                </div>
                            </aside>
                            <aside class="left_widgets p_filter_widgets">

                                <div class="l_w_title"style="border-radius: 50px;">
                                    <h3>Brand</h3>
                                </div>
                                <div class="widgets_inner">


                                    <?php
                                    $brandq = mysqli_query($connection, "select * from brand where is_delete='0'")or die(mysqli_error($connection));


                                    while ($brandrow = mysqli_fetch_array($brandq)) {
                                        ?>
                                        <ul class="list ">
                                            <li><a href="<?php echo"?brand={$brandrow['brand_id']}"; ?>"><?php echo $brandrow['brand_name']; ?></a></li>&nbsp;

                                        </ul>
                                    <?php } ?>

                                </div>
                            </aside>
                           

                        </div>

                    </div>
                    <!--
                    <div class="product_top_bar"style="border-radius: 50px; width: 74%;" >

                        <div class="right_page ml-auto"  >
                            <nav class="cat_page"  aria-label="Page navigation example">
                                <ul class="pagination" >
                                    <li class="page-item"><a class="page-link" href="#"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a></li>
                                    <li class="page-item active"><a  class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item blank"><a class="page-link" href="#">...</a></li>
                                    <li class="page-item"><a class="page-link" href="#">6</a></li>
                                    <li class="page-item" ><a class="page-link" href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
-->
                </div>

            </div>

        </section>
        <!--================End Category Product Area =================-->

        <!--================Most Product Area =================-->

        <!--================End Most Product Area =================-->

        <!--================ start footer Area  =================-->	
        <?php include './footer.php'; ?>
        <!--================ End footer Area  =================-->
        <?php include './script.php'; ?>
    </body>
</html>


