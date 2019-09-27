<!doctype html>
<html lang="en">
    <head>

        <title>Product</title>
        <?php
        ob_start();
        include './css.php';
        ?>
    </head>
    <body>

        <?php
        include './Header.php';

        include '../connection.php';
        if (!isset($_GET['pid']) || empty($_GET['pid'])) {
            header("location:shop.php");
        }


        $pid = $_GET['pid'];
        $ab = "SELECT
    `product_master`.`product_name`
    , `product_master`.`product_details`
    , `product_master`.`product_price`
    , `product_master`.`size`
    , `product_master`.`img`
    , `product_master`.`qty`
    , `offers`.`discount`
    , `offers`.`offer_id`
    , `offers`.`is_active`
    , `offers`.`offer_details`
    , `product_color`.`color_name`
    , `product_master`.`lens_expiry`
    , `sub_category`.`sub_cat_name`
    , `brand`.`brand_name`
FROM
    `db_demo`.`product_master`
    INNER JOIN `db_demo`.`brand` 
        ON (`product_master`.`brand_id` = `brand`.`brand_id`)
    INNER JOIN `db_demo`.`offers` 
        ON (`product_master`.`offer_id` = `offers`.`offer_id`)
    INNER JOIN `db_demo`.`product_color` 
        ON (`product_master`.`color_id` = `product_color`.`color_id`)
    INNER JOIN `db_demo`.`sub_category` 
        ON (`product_master`.`sub_cat_id` = `sub_category`.`sub_cat_id`) where `product_master`.`product_id` = '{$pid}' AND `product_master`.`is_delete`='0' ";

        $q = mysqli_query($connection, $ab)or die(mysqli_errno($connection));

        $row = mysqli_fetch_array($q);
        ?>




        <div class="product_image_area">
            <div class="container">
                <div class="row s_product_inner">
                    <div class="col-lg-6">
                        <div class="s_product_img">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">


                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        
                                        <img class="d-block w-100" src="<?php echo "{$row['img']}"; ?>" alt="First slide">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 offset-lg-1">
                        <div class="s_product_text">
                            <h3><?php echo "{$row['product_name']}"; ?></h3>
                            <br>
                            <h2> <?php  
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
                                                ?></h2>

                            <h3> <?php
                                if ($row['qty'] < 5 && $row['qty'] > 0) {
                                    echo "Hurry up only " . $row['qty'] . " left";
                                }
                                ?></h3>
                            <br>
                            <ul class="list">
                                <li><span>Frames Shape</span> &nbsp;: &nbsp; <?php echo "{$row['sub_cat_name']}"; ?></li>
                                <li><span>Brand</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp; <?php echo "{$row['brand_name']}"; ?></li>
                                <li><span>Colour</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; <?php echo "{$row['color_name']}"; ?></li>
                                <li><span>Size</span>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp; <?php echo "{$row['size']}"; ?></li>
                                <?php
                                        if ($row['offer_id'] != "0" && $row['is_active'] == "1") {
                                            echo " <li><span>Offer</span>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;{$row['discount']} %</li>";
                                            
                                        }
                                        ?>
                               
                            </ul>
                            <p><?php echo "{$row['product_details']}"; ?></p>
                            <hr>
                            <?php
                            if ($row['qty'] == 0) {
                                echo "<h2>Out of Stock</h2>";
                            } else {
                                ?>
                                <div class="product_count">

                                    <form method="get" action="cartprocess.php">
                                        <label for="qty">Quantity:</label>
                                        <input type="hidden" name="productid" value="<?php echo $pid ?>"  class="input-text qty">
                                        <input type="number" name="qty" max="<?php echo $row['qty'] ?>" value="1"  class="input-text qty">
                                        <br>
                                        <br>
                                        <input style="width: 65%;" type="submit" class=" main_btn" value="Add to Cart">

                                    </form>

                                </div>
                            <?php } ?>

                            <br>
                            <br>
                            <br>
                            <br>
                            <br>



                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--================End Single Product Area =================-->

        <!--================Product Description Area =================-->

        <!--================End Product Description Area =================-->



        <!--================ start footer Area  =================-->	
        <?php include './footer.php'; ?>
        <!--================ End footer Area  =================-->



        <?php include './script.php'; ?>
    </body>

</html>