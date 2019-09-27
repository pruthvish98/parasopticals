
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Delivery</title>
        <?php
        session_start();
        include 'head.php';
        include 'checklogin.php';
        ?>
    </head>

    <body class="animsition">

        <?php include 'emp_header.php'; ?>

        <?php
        include '../connection.php';




        $q = mysqli_query($connection, "SELECT *
    
FROM
    `delivery`
    INNER JOIN `sales_order` 
        ON (`delivery`.`sales_order_id` = `sales_order`.`sales_order_id`)
    INNER JOIN `customer` 
        ON (`delivery`.`customer_id` = `customer`.`customer_id`)
    INNER JOIN `area` 
        ON (`delivery`.`area_id` = `area`.`area_id`)    
    INNER JOIN `emp` 
        ON (`delivery`.`emp_id` = `emp`.`emp_id`) where `sales_order`.`is_online`='1' AND `delivery`.`emp_id`= '{$_SESSION['id']}' AND (`delivery`.`delivery_status`= 'On the way' OR `delivery`.`delivery_status`= 'Accepted') ")or die(mysqli_error($connection));
        ?>
        <div class="page-container">
            <div class="main-content" style="background-image: url('img/bg.jpg')">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-md-12" >
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">Delivery</h3>


                            </div>


                            <div class="table-responsive table-responsive-data3" style="border-radius: 10px;box-shadow: 0 15px 10px -10px rgba(0,0,0,0.4);">
                                <table class="table table-borderless table-striped table-earning">
                                    <thead>
                                        <tr style="text-shadow:0 10px 10px rgba(0,0,0,0.4);">

                                            <th>No.<?php $i = 0; ?></th>
                                            <th>Customer Name</th>
                                            <th>Time</th>
                                            <th>Customer Address</th>
                                            <th>Area</th>
                                            <th>Status</th>
                                            <th>Details</th>
                                            <th></th>

                                        </tr>
                                    </thead>
                                    <tbody>
<?php
while ($row = mysqli_fetch_array($q)) {
    $i++;
    ?>
                                        <form method="post">
                                            <tr  class='tr-shadow'>
                                                <td><?php echo $i ?> </td>
                                                <td> <?php echo $row['customer_name'] ?> </td>
                                                <td> <?php echo $row['sales_order_date'] ?> </td>
                                                <td> <?php echo $row['delivery_add'] ?> </td>
                                                <td> <?php echo $row['area_name'] ?> </td>




                                                <td>
                                                    <input type="hidden" name="id" value="<?php echo "{$row['delivery_id']}"; ?>">
                                                    <div>

                                                        <select style="width: 140px;" class='form-control' name='txt1'> 


                                                            <option value="On the way" > On the way  </option>
                                                            <option value="Deliverd"> Deliverd </option>

                                                        </select>
                                                    </div>

                                                </td>
                                                <td><a href="<?php echo "Delivery_detail.php?sid={$row['sales_order_id']}"; ?>"> View Details</a></td>
                                                <td>

                                                    <input style="border:none;" class="btn btn-outline-success btn-md" name="update" type='submit'>
                                                </td>


                                            </tr>
                                        </form>
                                        <tr class='spacer'></tr>


    <?php
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
<?php
include 'Emp_sidemenu.php';
if (isset($_POST['update'])) {
    
    $status = $_POST['txt1'];
    $sid = $_POST['id'];
    $ddate=date("d-m-Y");
    if($status=='Deliverd')
    {
        $updateq = mysqli_query($connection, "update delivery set delivery_date='{$ddate}' where delivery_id='{$sid}' ")or die(mysqli_error($connection));
    }

   
    $update = mysqli_query($connection, "update delivery set delivery_status='{$status}' where delivery_id='{$sid}' ")or die(mysqli_error($connection));
    if ($update) {
        echo '<script> alert("Status Updated") </script>';
    }
}
?>
