
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Task</title>
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
        
        if(isset($_POST['update'])){
            
            $status= $_POST['txt1'];
            $sid=$_POST['id'];
            $update= mysqli_query($connection, "update service set status='{$status}' where service_id='{$sid}' ")or die(mysqli_error($connection));
            if($update){
                echo '<script> alert("Status Updated") </script>';
            }
        }
        
        
        $q = mysqli_query($connection,"SELECT
    `service`.`customer_id`
    ,`service`.`service_id`
    , `service`.`details`
    , `service`.`date`
    , `service`.`status`
    , `service`.`emp_id`
    , `customer`.`customer_name`
    , `customer`.`address`
    
FROM
    `service`
    INNER JOIN `customer` 
        ON (`service`.`customer_id` = `customer`.`customer_id`)
    INNER JOIN `emp` 
        ON (`service`.`emp_id` = `emp`.`emp_id`) where  `service`.`emp_id`= '{$_SESSION['id']}' " )or die(mysqli_error($connection));
      
     
        ?>
         <div class="page-container">
            <div class="main-content" style="background-image: url('img/bg.jpg')">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-md-12" >
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">Service</h3>
                               
                               
                            </div>


                            <div class="table-responsive table-responsive-data3" style="border-radius: 10px;box-shadow: 0 15px 10px -10px rgba(0,0,0,0.4);">
                                <table class="table table-borderless table-striped table-earning">
                                    <thead>
                                        <tr style="text-shadow:0 10px 10px rgba(0,0,0,0.4);">

                                            <th>No.<?php $i=0; ?></th>
                                            <th>Customer Name</th>
                                            <th>Service Time</th>
                                            <th>Detail</th>
                                            <th>Customer Address</th>
                                            <th>Status</th>
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
                                            <td> <?php echo $row['customer_name']?> </td>
                                            <td> <?php echo $row['date']?> </td>
                                            <td> <?php echo $row['details']?> </td>
                                            
                                            <td> <?php echo $row['address']?> </td>
                                            

                                                <td>
                                                    <input type="hidden" name="id" value="<?php echo "{$row['service_id']}"; ?>">
                                               <div>
                                                   
                                                   <select style="width: 110px;" class='form-control' name='txt1'> 
                                                         <option value="Pending" selected> Pending </option>
                                                         <option value="Repaired" > Repaired </option>
                                                         <option value="Deliverd"> Deliverd </option>
                                                    
                                                     </select>
                                                </div>
                               
                                            </td>
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
<?php include 'Emp_sidemenu.php'; ?>
