<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Service</title>
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
        $serviceq="SELECT  *  FROM  `service`  
                                                INNER JOIN `customer`
                                                  ON (`service`.`customer_id` = `customer`.`customer_id`)where `service`.`status`='Pending'";
                                                
                                            
        $q = mysqli_query($connection,$serviceq )or die(mysqli_error($connection));
        $count = mysqli_num_rows($q);
        
        
        if(isset($_POST['allocate']))
        {
            $emp=$_POST['txt1'];
            $sid=$_POST['txt2'];
            $emp= mysqli_query($connection,"update service set emp_id='{$emp}' where service_id={$sid}" );
            if($emp){
                echo "<script>alert('Task Allocated'); </script>";
            }
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

                                            <th>ID <?php $i=1; ?></th>
                                            <th>Customer Name</th>
                                            <th>Details</th>
                                            <th>Date</th>
                                            <th>Employee</th>
                                            <th></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while ($row = mysqli_fetch_array($q)) {
                                            ?>
                                        <form method="post">
                                            <tr  class="tr-shadow">
                                            <td><?php echo $i++ ?> </td>
                                            <input type="hidden" name='txt2' value="<?php echo $row['service_id'] ?>">
                                            <td><?php echo $row['customer_name'] ?></td>
                                            <td><?php echo $row['details'] ?></td>
                                            <td><?php echo $row['date']?> </td>
                                            

                                        
                                           <td>
                                               
                                               <div >
                                                   
                                                   <select style="width: 165px;" class='form-control' name='txt1'>
                                                
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
                                        
                                                     
                                                
                                                
                                                </div>
                               
                                            </td>
                                            
                                            <td>
                                                <input style="border:none;" class="btn btn-outline-success btn-md" name="allocate" type='submit'>
                                            </td>
                                           
                                            </tr>
                                             </form>
                                            <tr class='spacer'></tr>
                                      <?php  } ?>
                                        
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
