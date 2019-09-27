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
                                            
                                            <th>Total</th>
                                            <th>Emplyoee Name</th>
                                            <th>Offline/Online</th>
                                            <th>Details</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                            
                                            
                                           $sales= "SELECT    *
                                               
                                                            FROM `sales_order` INNER JOIN `customer` 
                                                            ON (`sales_order`.`customer_id` = `customer`.`customer_id`)
                                                            INNER JOIN `delivery` 
                                                            ON (`sales_order`.`sales_order_id` = `delivery`.`sales_order_id`)where `delivery`.`delivery_status`='Pending' ";
                                    $saleorderq= mysqli_query($connection, $sales)or die(mysqli_error($connection));
                                    while ($row = mysqli_fetch_array($saleorderq)) {
                                        ?>
                                        <form method="post">
                                            <tr  class="tr-shadow">
                                                <td><?php echo $i++ ?> </td>
                                                
                                            <input type="hidden" name='txt2' value="<?php echo $row['sales_order_id'] ?>">
                                             <td><?php echo $row['sales_order_date'] ?></td>
                                            <td><?php echo $row['customer_name'] ?></td>
                                            
                                              <td>₹ <?php echo $row['total'] ?></td>
                                              <td> <div>
                                                   
                                                     <select class='form-control' name='txt1'>
                                                
                                                 <?php
                                                 $query= mysqli_query($connection, "select * from emp");
                                                 
                                                 
                                                while ($emprow = mysqli_fetch_array($query)) 
                                                {
                                                     if ($emprow['emp_id'] == $row['emp_id']) {
                                                                   echo " <option  value='{$emprow['emp_id']}' selected> {$emprow['emp_fname']} {$emprow['emp_lname']} </option>";
                                                                } else {
                                                                    
                                                                    echo " <option  value='{$emprow['emp_id']}'> {$emprow['emp_fname']} {$emprow['emp_lname']} </option>";
                                                                }
                                                    
                                                }
                                                ?>            
                                            </select>
                                        
                                                </div>  </td>
                                             <td><?php if($row['is_online']=='1'){ echo "Online";} else {echo "Offline";} ?></td>
                                             <td><input style="border:none;" class="btn btn-outline-success btn-md" name="allocate" type='submit'></td>
                                           

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
<?php

if(isset($_POST['allocate']))
        {
            $emp=$_POST['txt1'];
            $sid=$_POST['txt2'];
            $emp= mysqli_query($connection,"update delivery set emp_id='{$emp}' where sales_order_id={$sid}" )or die(mysqli_error($connection));
            $update= mysqli_query($connection, "update delivery set delivery_status='Accepted' where sales_order_id='{$sid}' ")or die(mysqli_error($connection));
            if($emp){
                echo "<script>alert('Task Allocated'); </script>";
            }
        }

?>