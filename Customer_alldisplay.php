
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Customer </title>
        <?php
        include 'head.php';
        session_start();
        include './checklogin.php';
        ?>
        <style>
            .c1:hover{box-shadow:0 0 10px rgba(0,0,0,0.3);}
        </style>
    </head>
    <?php include 'Header.php'; ?>

    <body class="animsition">



        <?php
        include './connection.php';
        $q = mysqli_query($connection, "select * from customer ")or die(mysqli_errno($connection));
        $count = mysqli_num_rows($q);
        ?>
        <div class="page-container">
            <div class="main-content"style="background-image: url('img/bg.jpg')">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                        <div class="row"><?php
                            while ($row = mysqli_fetch_array($q)) {
                                ?>
                                <div class="col-md-4">
                                    <div class="card c1" style=" border-radius: 10px;">
                                        <div class="card-header" align="center">
                                            <strong class="card-title mb-3 " > <i style="color:lightblue;" class="fa fa-user"></i>&nbsp; <?php echo " {$row['customer_name']} ";?>
                                            </strong>
                                        </div>
                                        <div class="card-body">
                                            <div class="mx-auto d-block">




                                                <div class="location text-sm-left">
                                                    <label class="form-control-label"> 
                                                       Gender : <?php 
                                                        
                                                         if($row['gender']=="male")
                                                        {
                                                            echo "<i style='color:lightblue' class='fa fa-male'></i>";
                                                            echo "    Male";
                                                        } else
                                                        {   
                                                           echo "<i style='color:lightpink' class='fa fa-female'></i>";
                                                           echo "    Female";
                                                        }
                                                        ?> &nbsp;
                                                        
                                                        
                                                    </label>
                                                    <br>
                                              
                                                    <label class="form-control-label">  <i style="color:greenyellow;" class="fa fa-phone"></i> &nbsp; Mobile :
                                                         <?php echo "{$row['mobile']} "; ?></label>
                                                    <br>
                                                    <label class="form-control-label"><i style="color:skyblue;" class="fa fa-envelope"></i> &nbsp; Email :
                                                        <?php echo "{$row['email']}"; ?>
                                                    </label>
                                                    <hr>
                                                    <label class="form-control-label"><i style="color:lightsalmon;" class="fa fa-home"></i> &nbsp; Address :
                                                        
                                                        <?php echo "{$row['address']}"; ?>
                                                    </label>
                                                </div>



                                            </div>
                                        </div>

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
