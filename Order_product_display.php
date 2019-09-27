<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Purchase</title>
        <?php
        include 'head.php';
        include './connection.php';
        ob_start();
        session_start();
        include './checklogin.php';
        ?>

        <style>
            .bt:hover{text-shadow:0 10px 10px rgba(0,0,0,0.4); }

        </style>

    </head>

    <body class="animsition">

        <?php include 'Header.php'; ?>

        <?php 
         if (!isset($_GET['sid']) || empty($_GET['sid'])) {

                header("location:Order.php");
            }
       
        ?>
        <div class="page-container">
            <div class="main-content" style="background-image: url('img/bg.jpg')">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                        <div class="row">
                            


                            <div class="table-responsive table-responsive-data3" style="border-radius: 10px;box-shadow: 0 15px 10px -10px rgba(0,0,0,0.4);">
                                <table class="table table-borderless table-striped table-earning">
                                    <thead>
                                        <tr style="text-shadow:0 10px 10px rgba(0,0,0,0.4);">

                                            <th>No.</th>
                                            <th>Product Name</th>
                                            <th>Qty</th>
                                            <th>Rate</th>
                                            <th>Discount</th>
                                            <th>Total</th>
                                            


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        
                                          include 'connection.php';
                                          
                                          $sid=$_GET['sid'];
                                       $saledetail="SELECT * FROM `sales_order_details`
                                        INNER JOIN `sales_order`
                                          ON (`sales_order_details`.`sales_order_id` = `sales_order`.`sales_order_id`)
                                        INNER JOIN `product_master`
                                          ON (`sales_order_details`.`product_id` = `product_master`.`product_id`)where  `sales_order`.`sales_order_id`={$sid} ";

                                       $salesdetailq= mysqli_query($connection, $saledetail)or die(mysqli_error($connection));
                                       $i=0;
                                        while ($row = mysqli_fetch_array($salesdetailq)) {
                                            $i++;
                                            echo "<tr  class='tr-shadow'>";
                                            echo "<td> {$i} </td>";
                                            echo "<td> {$row['product_name']} </td>";
                                            echo "<td> {$row['sales_qty']} </td>";
                                            echo "<td>₹ {$row['product_price']} </td>";
                                            echo "<td> {$row['sales_discount']} % Off </td>";
                                            echo "<td>₹ {$row['amount']} </td>";
                                            
                                            
                                            
                                            echo "</tr>"; $total= $row['total'];
                                            $ship=$row['shipping_charge'];
                                           
                                            echo "<tr class='spacer'></tr>";
                                        } echo "<tr class='spacer'><td></td><td></td><td></td><td></td><td>Shipping Charge:$ship</td><td>$total</td> </tr>";
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>





    </body>


</html>
<?php include 'Side_Menu.php'; ?>
