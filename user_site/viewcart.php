<!doctype html>
<html lang="en">
    <head>

        <title>Cart</title>
        <?php
        include './css.php';


        include '../connection.php';
        ?>
        <style>.zoom:hover {

                transform: scale(2.3); 
                transition: .4s;
            }


        </style>
    </head>
    <body>

        <!--================Header Menu Area =================-->
        <?php include './header.php'; 
          
        ?>
        <!--================Header Menu Area =================-->
        <br>
        <br>
        <br>
        <!--================Home Banner Area =================-->
        <section class="cart_area">
            <div class="container">
                <div class="cart_inner">
                    <div class="table-responsive">


                        <table class="table">
                            <?php
                            if (isset($_GET['remove'])) {
                                $key = $_GET['remove'];
                                unset($_SESSION['productcart'][$key]);
                                unset($_SESSION['qtycart'][$key]);
                            } elseif (isset($_GET['qty'])) {

                                $proid = $_GET['proid'];
                                $qty = $_GET['qty'];
                                foreach ($_SESSION['qtycart'] as $key => $val) {
                                    foreach ($_SESSION['productcart'] as $key => $val) {
                                        if ($_SESSION['productcart'][$key] == $proid) {
                                            $_SESSION['qtycart'][$key] = $qty;
                                        }
                                    }
                                }
                            }

                            if (isset($_SESSION['productcart']) && !empty($_SESSION['productcart'])) {
                                echo "
                            <tbody>

                            <thead>
                                <tr>
                                    <th scope='col'>Product</th>
                                    <th scope='col'>Price</th>
                                    <th scope='col'>Discount</th>
                                    <th scope='col'>Quantity</th>
                                    <th scope='col'>Total</th>
                                    <th scope='col'>Update</th>
                                    <th scope='col'>Remove</th>
                                </tr>
                            </thead>";
                                $sum = array();
                                foreach ($_SESSION['productcart'] as $key => $value) {



                                    //Fetch Prodcuts From Database
                                    $select = mysqli_query($connection, "select * from product_master where product_id ='{$value}' ") or die(mysqli_error($connection));
                                    $productdata = mysqli_fetch_array($select);
                                    


                                    echo " <form method='get'><tr>
                              
                                    <td>
                                        <div class='media'>
                                            <div class='col-lg-4'>
                                            
                                                <a href='single_product.php?pid={$productdata['product_id']}'>
                                                <img src='{$productdata['img']}' style='width:100%;  border:none;'>
                                                     </a>
                                            </div>
                                           
                                            <div class='media-body'>
                                                <h3 style='color:black;'>{$productdata['product_name']}</h3>
                                            </div>
                                        </div>
                                    </td>"; ?>
                                    <td>
                                        <h5><?php  
                                                $offerq = mysqli_query($connection, "select * from offers where offer_id='{$productdata['offer_id']}' AND is_active='1' ")or die(mysqli_error($connection));
                                                $offerrow = mysqli_fetch_array($offerq);
                                                $disc = $offerrow['discount'];
                                                $price = $productdata['product_price'];
                                                $oprice = ($price * $disc) / 100;
                                                $fprice = $price - $oprice;
                                                if ($disc > 0) {

                                                    //echo "₹". $fprice . "&nbsp;  <strike style='color:red;'> ₹ {$price}</strike> ";
                                                    echo "₹{$price}</strike> ";
                                                } else {
                                                    $fprice=$price;
                                                    echo "₹".$fprice;
                                                }
                                                 $subtotal = $fprice * $_SESSION['qtycart'][$key];
                                                ?>
                                           
                                        </h5> 
                                    </td>
                                    <td> <?php echo $disc."%"; ?></td>
                                   <?php echo " <td>
                                        <div class='product_count'>
                                        
                                        <input type='hidden' name='proid' value='{$value}'>
                                        <input type='number' name='qty' min='1' max='{$productdata['qty']}'    autocomplete='off' style='border-radius:9px;'   value='{$_SESSION['qtycart'][$key]}'  class='input-text qty'>
                                            
                                         
                                        </div>
                                    </td>
                                    
                                    <td style='width:70px;'>
                                        <h5>₹$subtotal</h5>
                                    </td>
                                    <td>
                                        
                                         <button style='padding-right:20px;padding-left:20px;background:none; border:none;' data-toggle='tooltip' data-placement='top' title='Update Quantity' class='gray_btn zoom' type='submit'><i class='lnr lnr-checkmark-circle'></i></button>
                                         

                                    </td>  
                                    <td>
                                    <a href='?remove={$key}'><i style='padding-right:20px;padding-left:20px;background:none; border:none;' data-toggle='tooltip' data-placement='top' title='Delete' class='gray_btn zoom'><i class='lnr lnr-cross-circle'></i></i></a>
                                    </td>
                                    
                              </tr>
                                    </form>";
                                    $sum[] = $subtotal;
                                }
                                $total = array_sum($sum);
                                echo "
                                        
                                        <tr>
                                            <td>

                                            </td>
                                            <td>

                                            </td>
                                             <td>

                                            </td>
                                            
                                            <td>
                                                
                                            </td>
                                            <td>
                                               <h5>Subtotal</h5>
                                                
                                            </td>
                                           
                                            <td>
                                                <h5>₹$total</h5>
                                            </td>
                            
                            </tr>

                            <tr class='out_button_area'>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                   
                                </td>
                                <td>
                                    

                                </td>
                                <td>
                                    

                                </td>
                                <td>
                                    <div class='checkout_btn_inner'>
                                        <a class='main_btn' href='checkout.php'>Proceed to checkout</a>
                                    </div>
                                </td>
                            </tr>
                            </tbody>";
                            } else {

                                echo "<div align='center' style='font-size:20pt;'><strong style='color:red;'><i class='lnr lnr-cart'></i> Cart Is Empty</strong></div>";
                            }
                            ?>




                        </table>
                        <div class="checkout_btn_inner" align="center">
                            <a class="gray_btn" href="shop.php">Continue Shopping</a>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!--================End Most Product Area =================-->

        <!--================ start footer Area  =================-->	
        <?php include './footer.php'; ?>
        <!--================ End footer Area  =================-->


        <?php include './script.php'; ?>
    </body>
</html>
<?php
echo "<pre>";
print_r($_SESSION);
?>
