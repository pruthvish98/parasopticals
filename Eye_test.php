    <!DOCTYPE html>
<html lang="en">

    <head>
        <title>Eye Test</title>
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
        $serviceq = "SELECT  *  FROM  `appointment`  
                                                INNER JOIN `customer`
                                                  ON (`appointment`.`customer_id` = `customer`.`customer_id`)where `appointment`.`status`='Pending'";


        $q = mysqli_query($connection, $serviceq)or die(mysqli_error($connection));
        $count = mysqli_num_rows($q);


        if (isset($_POST['allocate'])) {
            $emp = $_POST['txt1'];
            $sid = $_POST['txt2'];
            $emp = mysqli_query($connection, "update appointment set emp_id='{$emp}',status='Accepted' where app_id={$sid}");
            if ($emp) {
                echo "<script>alert('Task Allocated'); </script>";
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
                                                <?php $frame = array($row['frame1'], $row['frame2'], $row['frame3'], $row['frame4'], $row['frame5']); ?>

                                                <?php
                                                foreach ($frame as $key => $value) {
                                                    $proq = mysqli_query($connection, "select * from product_master where product_id='{$value}'");
                                                    $rowpro = mysqli_fetch_array($proq);

                                                    echo "<table><tr aligh='center'><img src='./user_site/{$rowpro['img']}'width=30%>{$rowpro['product_name']}<tr></table>";
                                                }
                                                ?>


                                                <hr>
                                                <center>Date <p><?php echo $row['app_date'] ?> </p></center>
                                                <hr>
                                                



                                              
                                                
                                                <div class="col-md-12" >
 
                                                        <select class="form-control" name='txt1'>

                                                            <?php
                                                            $query = mysqli_query($connection, "select * from emp where is_delete='0'");


                                                            while ($emprow = mysqli_fetch_array($query)) {
                                                                if ($emprow['emp_id'] == $row['emp_id']) {
                                                                    echo " <option  value='{$emprow['emp_id']}' selected> {$emprow['emp_fname']} {$emprow['emp_lname']} </option>";
                                                                } else {
                                                                    echo " <option > Select Employee </option>";    
                                                                    echo " <option  value='{$emprow['emp_id']}'> {$emprow['emp_fname']} {$emprow['emp_lname']} </option>";
                                                                }
                                                            }
                                                            ?>

                                                                <div class="dropDownSelect2"></div>

                                                        </select>




                                                    </div>
                                                
                                               
                                                <center>
                                                    <input style="border:none;" class="btn btn-outline-success btn-md" name="allocate" type='submit'>
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
<?php include 'Side_Menu.php'; ?>
