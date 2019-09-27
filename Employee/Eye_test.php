
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
        $appq = "SELECT  *  FROM  `appointment`  
                                                INNER JOIN `customer`
                                                  ON (`appointment`.`customer_id` = `customer`.`customer_id`)where `appointment`.`emp_id`={$_SESSION['id']} AND `appointment`.`status`='Accepted' ";


        $q = mysqli_query($connection, $appq)or die(mysqli_error($connection));
        $count = mysqli_num_rows($q);
        
         if(isset($_POST['allocate'])){
            
            $status= $_POST['txt1'];
            $sid=$_POST['txt2'];
            $update= mysqli_query($connection, "update appointment set status='{$status}' where app_id='{$sid}' ")or die(mysqli_error($connection));
            if($update){
                echo '<script> alert("Status Updated") </script>';
            }
        }


        
        ?>

        <div class="page-container">
            <div class="main-content" style="background-image: url('img/bg.jpg')">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                        <div class="row">


 <?php
                                            while ($row = mysqli_fetch_array($q)) {
                                                ?>  


                          <div class="col-6">
                              <div class="card" style="box-shadow: 0 10px 10px rgba(0,0,0,0.4);">

                                    
                                       
                                    <div class="card-body">
                                        <div class="col-lg-12">
                                       
                                           

                                            <form method="post">
                                               
                                                <input type="hidden" name='txt2' value="<?php echo $row['app_id'] ?>">
                                                <strong><p align="center"><?php echo $row['customer_name'] ?></p></strong>
                                                 <hr>
                                                <center>Date <p><?php echo $row['app_date'] ?> </p></center>
                                             
                                                <hr>
                                                <?php $frame = array($row['frame1'], $row['frame2'], $row['frame3'], $row['frame4'], $row['frame5']); ?>

                                                <?php
                                                foreach ($frame as $key => $value) {
                                                    $proq = mysqli_query($connection, "select * from product_master where product_id='{$value}'");
                                                    $rowpro = mysqli_fetch_array($proq);

                                                    echo "<table><tr aligh='center'><img src='../user_site/{$rowpro['img']}'width=30%>{$rowpro['product_name']}<tr></table>";
                                                }
                                                ?>


                                               
                                                <hr>
                                                <center>Mobile <p><?php echo $row['mobile'] ?> </p></center>
                                                <hr>
                                                <hr>
                                                <center>Address <p><?php echo $row['address'] ?> </p></center>
                                                <hr>
                                                
                                                <center>

                                                <div class="col-lg-12">
                                                   
                                                   <select style="width: 110px;" class='form-control' name='txt1'> 
                                                         
                                                         <option value="Deliverd"> Completed </option>
                                                    
                                                     </select>
                                                </div>
                                                </center>
                                                
                                                
                                                <hr>
                                                <center>
                                                    
                                                    <input  class="btn btn-outline-success col-md-3 btn-md" name="allocate" type='submit'>
                                                </center>

                                                </tr>
                                            </form>
                                            <tr class='spacer'></tr>
                                       

                                        </div>
                                    </div>
                                </div>
                          </div>
                             <?php } ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


</body>


</html>
<?php include 'Emp_sidemenu.php'; ?>
