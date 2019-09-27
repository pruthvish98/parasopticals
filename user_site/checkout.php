<!doctype html>
<html lang="en">
    <head>

        <title>Checkout</title>
        <?php
        ob_start();
        include './css.php';
        include '../connection.php';
        ?>

    </head>
    <body>

        <!--================Header Menu Area =================-->
        <?php
        include './header.php';

        $_SESSION['url'] = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        require 'checklogincust.php';

        $q = mysqli_query($connection, "select * from customer where customer_id='{$_SESSION['c_id']}' ")or die(mysqli_error($connection));
        $row = mysqli_fetch_array($q);
        ?>
        <!--================Header Menu Area =================-->
        <br>
        <br>
        <br>
        <!--================Home Banner Area =================-->

        <!--================End Home Banner Area =================-->

        <!--================Checkout Area =================-->
        <section class="checkout_area p_120">
            <div class="container">

                <form method="post">

                    <div class="billing_details">
                        <div class="row">
                            <div class="col-lg-7">
                                <h3>Billing Details</h3>
                                <li class="row contact_form">
                                    <div class="col-md-12 form-group p_star">
                                        <label> Name </label>
                                        <input type="text" class="form-control" disabled="true" id="first" name="name" value="<?php echo "{$row['customer_name']}"; ?>" >
                                    </div>                          

                                    <div class="col-md-12 form-group p_star">
                                        <label> Mobile </label>
                                        <input type="text" class="form-control" disabled="true" id="number" name="number" value="<?php echo "{$row['mobile']}"; ?>" >

                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <label> Email </label>
                                        <input type="text" class="form-control" disabled="true" id="email" name="compemailany" value="<?php echo "{$row['email']}"; ?>" >

                                    </div>



                                    <div class="col-12" >

                                        <div class="payment_item order_box"style="height: 100%;">
                                            <div class="row">
                                            <div class="radion_btn">
                                                <input type="radio" id="f-option5" required="true" onclick="show1();" value="old" name="address">
                                                <label for="f-option5">Address</label>
                                                <div class="check"></div>
                                            </div>
                                            <div class="radion_btn">
                                                <input type="radio" required="true" onclick="show2();"  id="f-option6" value="new" name="address">
                                                <label for="f-option6">Add Address </label>

                                                <div class="check"></div>
                                            </div>
                                            </div>
                                            <div style="display: none;" id="old">
                                                <br>       
                                                <textarea class="form-control" id="old" disabled="true"  name="home"><?php echo "{$row['address']}"; ?></textarea>
                                            </div>
                                            <br>
                                            <div style="display: none;" id="new">
                                                <hr>
                                                <label>Add New Address</label>
                                                <textarea class="form-control"  name="work"></textarea>
                                                <label>Select Area</label>
                                                <br>
                                                
                                                <select class="form-group" name="area">
                                                        <?php
                                                        $query = mysqli_query($connection, "select * from area")or die(mysqli_error($connection));
                                                        while ($arearow = mysqli_fetch_array($query)) {
                                                            echo " <option class='form-control' value='{$arearow['area_id']}'> {$arearow['area_name']}</option>";
                                                        }
                                                        ?>

                                                </select>
                                               
                                            </div>
                                        </div>

                                    </div>



                            </div>
                            <div class="col-lg-5">
                                <div class="order_box">
                                    <h2>Your Order</h2>
                                    <ul class="list">
                                        <li><a href="#">Product Name<span>Total</span></a></li>
                                        <?php
                                        $sum = array();
                                        foreach ($_SESSION['productcart'] as $key => $value) {

                                            //Fetch Prodcuts From Database
                                            $select = mysqli_query($connection, "select * from product_master where product_id ='{$value}' ") or die(mysqli_error($connection));
                                            $productdata = mysqli_fetch_array($select);
                                            $qty = $_SESSION['qtycart'][$key];

                                            $offerq = mysqli_query($connection, "select * from offers where offer_id='{$productdata['offer_id']}' AND is_active='1' ")or die(mysqli_error($connection));
                                            $offerrow = mysqli_fetch_array($offerq);
                                            $disc = $offerrow['discount'];
                                            $price = $productdata['product_price'];
                                            $oprice = ($price * $disc) / 100;
                                            $fprice = $price - $oprice;
                                            if ($disc > 0) {

                                                //echo "₹". $fprice . "&nbsp;  <strike style='color:red;'> ₹ {$price}</strike> ";
                                                // echo "₹{$price}</strike> ";
                                            } else {
                                                $fprice = $price;
                                            }
                                            $subtotal = $fprice * $_SESSION['qtycart'][$key];
                                            $osubtotal = $productdata['product_price'] * $_SESSION['qtycart'][$key];




                                            echo "<li><a href='#'>{$productdata['product_name']}     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>{$productdata['product_price']}   x {$qty}   <span class='middle'> {$disc}% off   </span>  </strong><span class='last'>₹ {$subtotal}</span></a></li>";
                                            $sum[] = $subtotal;
                                            $osum[] = $osubtotal;
                                        }
                                        ?>


                                    </ul>
                                    <hr>
                                    <ul class="list list_2">
                                        <li><a href="#">Subtotal <span><?php echo "₹" . $ototal = array_sum($osum); ?></span></a></li>
                                        <li><a href="#">Offer Subtotal <span><?php echo "₹" . $total = array_sum($sum); ?></span></a></li>
                                        <hr> <li><a href="#">Shipping <span>Delivery Charge:  <?php echo "₹ " . $charge = 100; ?></span></a></li>
                                        <li><a href="#">Total <span><?php echo "₹ ";
                                        echo $amount = $charge + $total ?></span></a></li>
                                    </ul>
                                    <div class="creat_account">

                                    </div>
                                    <button type="submit" name="insert" class="main_btn col-12" >Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!--================End Checkout Area =================-->

        <!--================ start footer Area  =================-->	
<?php include './footer.php'; ?>
        <!--================ End footer Area  =================-->




<?php include './script.php'; ?>
    </body>
    <script>
        function show1() {

            var x = document.getElementById("old");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
        function show2() {

            var x = document.getElementById("new");
            if (x.style.display === "none") {

                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

    </script>
</html>
<?php
if (isset($_POST['insert'])) {
    //  $mo=$_POST['number'];
    $add = $_POST['address'];
    $oldadd = $row['address'];
    $newadd = $_POST['work'];
    $area = $_POST['area'];
    $saledate = date("d-m-y");
    $cid = $_SESSION['c_id'];
    if ($add == 'old') {
        $address = $oldadd;
        $area = $row['area_id'];
    } elseif ($add == 'new') {
        $address = $newadd;
    }


    $ordermasterq = mysqli_query($connection, "insert into sales_order (customer_id,sales_order_date,total,is_online,shipping_charge)values('{$cid}','{$saledate}','{$amount}','1',{$charge})")or die(mysqli_error($connection));
    $orderid = mysqli_insert_id($connection);
    $deliveryq = mysqli_query($connection, "insert into delivery (sales_order_id,delivery_add,area_id,delivery_status,customer_id,delivery_date) values('{$orderid}','{$address}','{$area}','Pending','{$_SESSION['c_id']}','0')")or die(mysqli_error($connection));
    if ($ordermasterq) {
        // echo "<script>alert('Order Placed'); </script>";
    }

    foreach ($_SESSION['productcart'] as $key => $value) {

        //Fetch Prodcuts From Database
        $select = mysqli_query($connection, "select * from product_master where product_id ='{$value}'") or die(mysqli_error($connection));
        $productdata = mysqli_fetch_array($select);
        $qty = $_SESSION['qtycart'][$key];


        $offerq = mysqli_query($connection, "select * from offers where offer_id='{$productdata['offer_id']}' AND is_active='1' ")or die(mysqli_error($connection));
        $offerrow = mysqli_fetch_array($offerq);
        $disc = $offerrow['discount'];
        $price = $productdata['product_price'];
        $oprice = ($price * $disc) / 100;
        $fprice = $price - $oprice;
        if ($disc > 0) {

            //echo "₹". $fprice . "&nbsp;  <strike style='color:red;'> ₹ {$price}</strike> ";
            // echo "₹{$price}</strike> ";
        } else {
            $fprice = $price;
        }
        $subtotal = $fprice * $_SESSION['qtycart'][$key];








        $invoicedate = date("d-m-Y");
        $orderdetailsq = mysqli_query($connection, "insert into sales_order_details(sales_order_id,product_id,sales_qty,amount,sales_discount)values('{$orderid}','{$value}','{$qty}','{$subtotal}','{$disc}')")or die(mysqli_error($connection));
        $qtyupdate = mysqli_query($connection, "update product_master set qty=qty-{$qty} where product_id= '{$value}'")or die(mysqli_error($connection));
    }
    if ($orderdetailsq) {

        $invoiceq = mysqli_query($connection, "insert into invoice (invoice_date,invoice_amounnt,sales_order_id) values('{$invoicedate}','{$amount}','{$orderid}')")or die(mysqli_error($connection));
        echo "<script>alert('Order Placed'); </script>";
        unset($_SESSION['productcart']);
        unset($_SESSION['qtycart']);
        unset($_SESSION['cnt']);
        header("location:invoice.php?saleid={$orderid}");
    }
}
?>