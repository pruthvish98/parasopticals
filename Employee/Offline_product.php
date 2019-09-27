
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Offline Product</title>
        <?php
        ob_start();
        session_start();
        include 'head.php';
        include 'checklogin.php';
        ?>
    </head>

    <body class="animsition">

        <?php include 'emp_header.php'; ?>

        <?php
        include '../connection.php';
        
        if(isset($_POST['btn1'])){
            
        $name = $_POST['name'];
        $mobile = $_POST['mo'];
        $add=$_POST['add'];
        $area=$_POST['area'];
        $saledate=$_POST['date'];
        $customerq = mysqli_query($connection, "insert into customer(customer_name,mobile) values ('{$name}','{$mobile}')") or die(mysqli_error($connection));
                if($customerq)
                {
                      $cid= mysqli_insert_id($connection);
                      $saleq= mysqli_query($connection,"insert into sales_order (customer_id,sales_order_date,is_online)values('{$cid}','{$saledate}','0')")or die(mysqli_error($connection)); 
                      $sid=mysqli_insert_id($connection);
                      $deliveryq= mysqli_query($connection, "insert into delivery (sales_order_id,delivery_add,area_id,emp_id,delivery_status,customer_id,delivery_date) values('{$sid}','{$add}','{$area}','{$_SESSION['id']}','Deliverd','{$cid}','{$saledate}')")or die(mysqli_error($connection));
                      header("location:Offline_product_details.php?sid={$sid}");

                } 
            
        }
         
        
        
        ?>
        <div class="page-container">
            <div class="main-content" style="background-image: url('img/bg.jpg')">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="card" style="box-shadow:0 0 10px  rgba(0,0,0,0.4); border-radius: 10px;">
                                    <div class="card-header" align="center">
                                        <strong> Offline Customer </strong>

                                    </div>
                                    <form method="post" enctype="multipart/form-data" class="form-horizontal">
                                        <div class="card-body card-block">
                                            <div class="row form-group">


                                                <div class="col-12">
                                                    <label>Enter Customer Name</label>
                                                    <input   type="text" autocomplete="off" pattern="[a-zA-Z ]*$" title="Only Characters are Allowed" required="true" name="name" class="md-input">
                                                </div>

                                            </div>

                                            <div class="row form-group">                                           
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Enter Mobile</label>
                                                        <input type="text"  autocomplete="off" name="mo" class="md-input">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row form-group">                                           
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>Enter Address</label>
                                                        <input type="text"  autocomplete="off" name="add" class="md-input">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row form-group">   
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label  class=" form-control-label">Area</label>

                                                        <select  name="area" class="md-input">
                                                            <?php
                                                              $areaq= mysqli_query($connection, "select * from area");
                                                             while( $arearow= mysqli_fetch_array($areaq))
                                                             {
                                                            echo " <option value={$arearow['area_id']}>{$arearow['area_name']}</option>";
                                                             }
                                                                ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row form-group">                                           
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Date</label><br>
                                                        <input type="Date"  name="date" class="md-input">
                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                        <div class="card-footer" align="center">
                                            <button type="submit" name="btn1" style="border:none; " class="btn btn-outline-success btn-sm">
                                                <i class="fa fa-check-circle"  ></i> Submit
                                            </button>
                                            &nbsp;
                                            <button type="reset" style="border:none; " data-message="<a href='#' class='notify-action'>Clear</a> Success Message" data-status="info" data-pos="bottom-center" class="btn btn-outline-danger btn-sm">
                                                <i class="fa fa-times-circle"  ></i> Reset
                                            </button>
                                            

                                        </div>

                                    </form>                                    




                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>






    </body>


</html>
<?php include 'Emp_sidemenu.php'; ?>
