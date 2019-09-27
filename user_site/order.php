<!doctype html>
<html lang="en">
    <head>

        <title>My Order</title>
        <?php
        ob_start();
        include './css.php';
        include '../connection.php';
        ?>
        <style>.zoom:hover {

                transform: scale(1.7); 
                transition: .4s;
            }


        </style>
    </head>
    <body>

        <!--================Header Menu Area =================-->
        <?php include './header.php'; 
         $_SESSION['url']="http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            require  'checklogincust.php';
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
                        <hr>
                        <h1 align="center" style="color:black;"> My orders </h1>
                        <hr>
                        <br>
                        <?php
                        $saleq = mysqli_query($connection, "SELECT *  FROM
                                                                            `sales_order`
                                                                            INNER JOIN `delivery` 
                                                                                ON (`sales_order`.`sales_order_id` = `delivery`.`sales_order_id`)

                                                                             where `delivery`.`customer_id`='{$_SESSION['c_id']}'");
                        while ($salerow = mysqli_fetch_array($saleq)) {
                            ?>
                            <div class="card">

                                <div class="card-header">
                                    <!--
                                    <div align="left"> 

                                        <label class="form-control-label" style="background-color:lightsalmon; padding: 5px; border-radius: 5px; font-size: 13pt; color: whitesmoke;" > <?php echo "OD" . $salerow['sales_order_id'] ?></label>

                                    </div>
                                    -->
                                    
                                        <div align="center">
                                            <label class="form-control-label" style="background-color:lightsalmon; padding: 5px; border-radius: 5px; font-size: 13pt; width: 7%; text-align: center; color: whitesmoke;" > <?php echo "OD" . $salerow['sales_order_id'] ?></label>
                                      <?php echo str_repeat("&nbsp;", 270); ?>
                                      <a href="invoice.php?saleid=<?php echo $salerow['sales_order_id'] ?>">  <label class="form-control-label" style="background-color:lightsalmon; padding: 5px; border-radius: 5px; font-size: 13pt; width: 7%; text-align: center; color: whitesmoke;" > Invoice</label></a>
                                        </div>
                                 

                                </div>
                                
                                <table class="table" >

                                    <thead >
                                        <tr>
                                            <th style="color: black;" scope="col">Product</th>
                                            <th scope="col"></th>
                                            <th scope="col" > </th>
                                            <th style="color: black;" scope="col" >Status </th>
                                            <th scope="col" > </th>
                                            <th scope="col" > </th>
                                            <th scope="col" > </th>
                                            <th scope="col" > </th>
                                            <th scope="col" > </th>
                                            <th scope="col" > </th>
                                            <th style="color: black;" scope="col" > Quantity</th>
                                            <th scope="col" > </th>
                                            <th scope="col" > </th>
                                            <th scope="col" > </th>
                                            <th scope="col" > </th>
                                            <th scope="col" > </th>
                                            <th scope="col" > </th>

                                            <th style="color: black;" scope="col">Total</th>
                                            <th scope="col" > </th>
                                            <th scope="col"></th>

                                        </tr>
                                    </thead>

                                    <?php
                                    $saledetailq = mysqli_query($connection, "SELECT *  FROM
                                                                            `sales_order_details`                                                                                 
                                                                            INNER JOIN `product_master` 
                                                                                ON (`sales_order_details`.`product_id` = `product_master`.`product_id`)
                                                                            INNER JOIN `product_color` 
                                                                                ON (`product_master`.`color_id` = `product_color`.`color_id`)
                                                                            INNER JOIN `sub_category` 
                                                                                ON (`product_master`.`sub_cat_id` = `sub_category`.`sub_cat_id`) where `sales_order_details`.`sales_order_id`='{$salerow['sales_order_id']}'")or die(mysqli_error($connection));

                                    while ($detailrow = mysqli_fetch_array($saledetailq)) {
                                        ?>
                                        <tbody>
                                            <tr>

                                                <td>
                                                    <div class="media ">

                                                        <div class="col-lg-4">

                                                            <img style="height: 95%; width: 95%; border:none;" src="<?php echo $detailrow['img'] ?>" >
                                                        </div>
                                                        <div class="media-body">
                                                            <h3><?php echo $detailrow['product_name'] ?></h3>

                                                            <label>Style : </label> <label> <?php echo $detailrow['sub_cat_name'] ?></label>
                                                            <br>

                                                            <label>Colour : </label><label> <?php echo $detailrow['color_name'] ?></label>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>



                                                </td>
                                                <td>
                                                </td>
                                                <td>
                                                    <?php echo $salerow['delivery_status'] ?>
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
                                                </td>
                                                <td>
                                                </td>
                                                <td>
                                                    <?php echo $detailrow['sales_qty'] ?>
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

                                                </td>
                                                <td>
                                                </td>
                                                <td>
                                                    <h5>₹&nbsp;<?php echo $detailrow['amount'] ?></h5>
                                                </td>
                                                <td>
                                                </td>
                                                <td>
                                                </td>

                                            </tr>





                                        </tbody>
                                    <?php } ?>
                                </table>
                                <br>
                                <div class="card-footer"style="   height: 60px;">

                                    <div align="left"> 

                                        <label class="form-control-label" style=" padding: 5px; font-size: 11pt;color: black;" >Order On :</label>
                                        <label class="form-control-label" style=" font-size: 10pt;color: black;" ><?php echo $salerow['sales_order_date'] ?> </label>
                                        
                                        
                                        
                                        <?php if($salerow['delivery_date']!='0'){?>
                                         <?php echo str_repeat("&nbsp;", 10); ?>
                                         <label class="form-control-label" style=" padding: 5px; font-size: 11pt;color: black;" >Deliverd on :</label>
                                        <label class="form-control-label" style=" font-size: 10pt;color: black;" ><?php echo $salerow['delivery_date'] ?> </label>
                                          <?php echo str_repeat("&nbsp;", 100); ?>
                                            <?php }else{echo str_repeat("&nbsp;", 170);}?>

                                      
                                        <strong>
                                            <label class="form-control-label" style=" font-size: 11pt;color: black;" >Shipping Charge :</label>
                                            <label class="form-control-label" style=" font-size: 12pt;color: black; " >₹ <?php echo $salerow['shipping_charge'] ?> </label>
                                        </strong>
                                        <?php echo str_repeat("&nbsp;", 18); ?>

                                        <strong>
                                            <label class="form-control-label" style=" font-size: 13pt;color: black;" >Total :</label>
                                            <label class="form-control-label" style=" font-size: 12pt; color: black;" >₹ <?php echo $salerow['total'] ?> </label>
                                        </strong>


                                    </div>

                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                        <?php } ?>
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
