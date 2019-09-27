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

        <?php include 'Header.php'; 
        ?>

        <?php 
         if (!isset($_GET['did']) || empty($_GET['did'])) {

                header("location:purchase_display.php");
            }
        $ddid = $_GET['did'];
        $prog = "SELECT
  `purchase_order_details`.`purchase_id`,
  `purchase_order_details`.`purchase_qty`,
  `purchase_order_details`.`purchase_total`,
  `purchase_order_details`.`purchase_amount`,
  `product_master`.`product_name`
FROM
  `purchase_order_details`
  INNER JOIN `product_master`
    ON (
      `purchase_order_details`.`product_id` = `product_master`.`product_id`
    )where `purchase_order_details`.`purchase_id`={$ddid} ;

";


        $q = mysqli_query($connection, $prog)or die(mysqli_errno($connection));
        $count = mysqli_num_rows($q);
        ?>
        <div class="page-container">
            <div class="main-content" style="background-image: url('img/bg.jpg')">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-md-12" >
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">Purchase</h3>
                                <div class="table-data__tool-right">
                                    <a href="purchase_insert.php">
                                        <button style="border-radius: 25px;" class="au-btn au-btn-icon au-btn--green au-btn--small bt">
                                            <i class="zmdi zmdi-plus"></i>add item</button></a>

                                </div>
                                <br>
                            </div>


                            <div class="table-responsive table-responsive-data3" style="border-radius: 10px;box-shadow: 0 15px 10px -10px rgba(0,0,0,0.4);">
                                <table class="table table-borderless table-striped table-earning">
                                    <thead>
                                        <tr style="text-shadow:0 10px 10px rgba(0,0,0,0.4);">

                                            <th>No.</th>
                                            <th>Product Name</th>
                                            <th>Qty</th>
                                            <th>Rate</th>
                                            <th>Total</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_array($q)) {
                                            echo "<tr  class='tr-shadow'>";
                                            echo "<td> {$row['purchase_id']} </td>";
                                            echo "<td> {$row['product_name']} </td>";
                                            echo "<td> {$row['purchase_qty']} </td>";
                                            echo "<td>₹ {$row['purchase_amount']} </td>";
                                            echo "<td>₹ {$row['purchase_total']} </td>";
                                            
                                            
                                            echo "</tr>";
                                            echo "<tr class='spacer'></tr>";
                                        }
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
