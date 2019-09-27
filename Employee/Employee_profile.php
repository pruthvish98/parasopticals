
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Employee Display</title>
        <?php
        session_start();
        include 'head.php';
        include 'checklogin.php';
        ?>
    </head>

    <body class="animsition">

        <?php include './emp_header.php'; ?>

        <?php
        include '../connection.php';
        $q = mysqli_query($connection, "select * from emp where emp_id = {$_SESSION['id']}")or die(mysqli_error($connection));
        $count = mysqli_num_rows($q);

        $row = mysqli_fetch_array($q);
        ?>
        <div class="page-container">
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card" style="box-shadow:0 0 10px  rgba(0,0,0,0.4); border-radius: 10px;">
                                    <div class="card-header" align="center">
                                        <strong class="card-title mb-3">Employee</strong>
                                    </div>
                                    <div class="card-body">
                                        <div class="mx-auto d-block">
                                            
                                            <h5 class="text-sm-center mt-2 mb-1">
                                                <strong>
                                                    <?php
                                                    echo " {$row['emp_fname']} ";
                                                    echo "{$row['emp_lname']} ";
                                                    ?>
                                                </strong>
                                            </h5>
                                            <div class="location text-sm-center">
                                                <strong>Designation :</strong>     <?php echo "{$row['desg']} ";  ?> </div>
                                        </div>
                                        <hr>
                                        <div class="location text-sm-center">
                                            <label class="form-control-label" > 
                                                <strong>Gender :</strong>
                                                <?php echo " {$row['gender']} "; ?></label>
                                            <br>

                                            <label class="form-control-label" > 
                                                <strong> Date of Birth :</strong>
                                                <?php echo "{$row['dob']} "; ?></label>
                                            <br>
                                            <label class="form-control-label"> 
                                                <strong>Email :</strong>
                                                <?php echo "{$row['email']}"; ?>
                                            </label>


                                        </div>
                                    </div>
                                <div class="card-footer">
                                    <div class="card-text text-sm-center">
                                        <?php
                                        if (isset($_SESSION['id']))
                                        {
                                            $uid = $_SESSION['id'];
                                        }

                                        echo " <a href='Employee_update.php?uid={$uid}'>
                                                <button class='md-btn' type='button' >
                                                           Edit Profile
                                                  </button>
                                                 </a>";
                                           ?>
                                        <a href='Emp_change_pwd.php'>
                                            <button type="button" class='md-btn'>
                                                Change Password
                                            </button>
                                        </a>

                                        </a>
                                      
                                    </div>
                                </div>

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
