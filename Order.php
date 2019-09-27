<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Order</title>
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

        
        <div class="page-container">
            <div class="main-content" style="background-image: url('img/bg.jpg')">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                        <div class="row">





                            <div class="table-responsive table-responsive-data3" style="border-radius: 10px;box-shadow: 0 15px 10px -10px rgba(0,0,0,0.4);">
                                <table class="table table-borderless table-striped table-earning">
                                    <thead>
                                        <tr style="text-shadow:0 10px 10px rgba(0,0,0,0.4);">

                                            <th>No. <?php $i = 1; ?></th>
                                            <th>Date</th>
                                            <th>Customer Name</th>                                           
                                            <th>Mobile</th>
                                            <th>Address</th>
                                            <th>Total</th>
                                            <th>Order Status</th>
                                            <th>Offline/Online</th>
                                            <th>Details</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                            
                                            
                                           $sales= "SELECT  *
                                               
                                                            FROM `sales_order` INNER JOIN `customer` 
                                                            ON (`sales_order`.`customer_id` = `customer`.`customer_id`)
                                                            INNER JOIN `delivery` 
                                                            ON (`sales_order`.`sales_order_id` = `delivery`.`sales_order_id`)";
                                    $saleorderq= mysqli_query($connection, $sales)or die(mysqli_error($connection));
                                    while ($row = mysqli_fetch_array($saleorderq)) {
                                        ?>
                                        <form method="post">
                                            <tr  class="tr-shadow">
                                                <td><?php echo $i++ ?> </td>
                                                
                                            <input type="hidden" name='txt2' value="<?php echo $row['sales_order_id'] ?>">
                                             <td><?php echo $row['sales_order_date'] ?></td>
                                            <td><?php echo $row['customer_name'] ?></td>
                                             <td><?php echo $row['mobile'] ?></td>  
                                            
                                             <td><?php echo $row['delivery_add'] ?></td>
                                              <td>₹ <?php echo $row['total'] ?></td> 
                                              <td><?php echo $row['delivery_status'] ?></td> 
                                             <td><?php if($row['is_online']=='1'){ echo "Online";} else {echo "Offline";} ?></td>
                                             <td><a href="<?php echo "Order_product_display.php?sid={$row['sales_order_id']}";?>"> View Details</a></td>
                                           

                                            </tr>
                                        </form>
                                        <tr class='spacer'></tr>
<?php } ?>

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
