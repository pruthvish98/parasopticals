<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Purchase</title>
        <?php
        include 'head.php';
        include './connection.php';
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
        $prog = "SELECT
  `supplier`.`supplier_name`,
  `purchase_order`.`purchase_date`,
  `purchase_order`.`purchase_id`
FROM
  `purchase_order`
  INNER JOIN `supplier`
    ON (
      `purchase_order`.`supplier_id` = `supplier`.`supplier_id`
    )";


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
                                            <th>Name</th>
                                            <th>Purchase Date</th>
                                            <th>Product Details</th>
                                            

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_array($q)) {
                                            echo "<tr  class='tr-shadow'>";
                                            echo "<td> {$row['purchase_id']} </td>";
                                            echo "<td> {$row['supplier_name']} </td>";
                                            echo "<td> {$row['purchase_date']} </td>";


                                            echo "<td><a href='purchase_order_details_display.php?did={$row['purchase_id']}'> Details</a> </td>";
                                           
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
        </div>




    </body>


</html>
<?php include 'Side_Menu.php'; ?>
