
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Employee Display</title>
        <?php
        include 'head.php';
        session_start();
         include './checklogin.php';
        include './connection.php';
        ?>
    </head>
    <?php include 'Header.php'; ?>

    <body class="animsition">

        <div class="page-container">
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row form-group" >

                                <div class="table-data__tool-right">
                                    <a href="Employee.php">
                                        <button  class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>Add Employee</button>
                                    </a>                                
                                </div>
                            
                            <div class="col-md-4">
                                
                                
                                        
                                            
                                           <a href='<?php echo "?desg=Shopkeeper";?>'><lable class='form-control'> Shopkeeper</lable></a>&nbsp; 
                                           <a href='<?php echo "?desg=Delivery";?>'><lable class='form-control'> Delivery</lable></a>&nbsp; 
                                            
                                        
                                
                               
                                </div>

                            </div>

                        </div>

                        <div class="row">



                            <?php
                            if (isset($_GET['desg'])) {
                                $desg = $_GET['desg'];
                                $q = mysqli_query($connection, "select * from emp where is_delete='0' AND desg like '%$desg%' ")or die(mysqli_errno($connection));
                            } else {
                                $q = mysqli_query($connection, "select * from emp where is_delete='0'")or die(mysqli_error($connection));
                            }
                            $count = mysqli_num_rows($q);
                            while ($row = mysqli_fetch_array($q)) {
                                ?>

                                <div class="col-md-4">
                                    <div class="card" style="box-shadow: 0 7px 10px rgba(0,0,0,0.4);">
                                        <div class="card-header">
                                            <strong class="card-title mb-3">Employee</strong>
                                            <a OnClick='return ConfirmDelete();' href="<?php echo "Emp_delete.php?did=".$row['emp_id']?>"> <?php echo str_repeat("&nbsp;", 62); ?><i class="fa fa-trash"></i></a>
                                        </div>
                                        <div class="card-body">
                                            <div class="mx-auto d-block">
                                                <img class="rounded-circle mx-auto d-block" width="100px"  >
                                                <h5 class="text-sm-center mt-2 mb-1">
                                                    <strong>
                                                        <?php
                                                        echo " {$row['emp_fname']} ";
                                                        echo "{$row['emp_lname']} ";
                                                        ?>
                                                    </strong>
                                                </h5>
                                                <div class="location text-sm-center">
                                                    <?php echo " {$row['desg']} "; ?></div>
                                            </div>
                                            <hr>
                                            <div class="location text-sm-center">
                                                <label class="form-control-label"> 
                                                    Gender :
                                                    <?php echo " {$row['gender']} "; ?></label>
                                                <br>

                                                <label class="form-control-label" > 
                                                    Date of Birth :
                                                    <?php echo "{$row['dob']} "; ?></label>
                                                <br>
                                                <label class="form-control-label"> Email :
                                                    <?php echo "{$row['email']}"; ?>
                                                </label>


                                            </div>
                                        </div>
                                        <hr>
                                        <div class="card-text text-sm-center">
                                            <a href="#">

                                            </a>

                                        </div>
                                    </div>

                                </div>
                            <?php } ?>
                        </div>




                    </div>



                </div>
            </div>
        </div>
    </div>





</body>


</html>
<?php include 'Side_Menu.php'; ?>
