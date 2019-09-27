
<html>
    <head>
        <title>Reset Password</title>
        <?php
        ob_start();
        include './css.php';
       
        include '../connection.php';
 include './header.php'; 
        if (isset($_POST['btn'])) {


            $email = $_POST['email'];


            $q = mysqli_query($connection, "select * from customer where email='{$email}' ")or die(mysqli_error($connection));
            $count = mysqli_num_rows($q);
            $row = mysqli_fetch_array($q);



            if ($count > 0) {

                $_SESSION['email'] = $row{'email'};
                $_SESSION['name'] = $row{'customer_name'};
                $_SESSION['pwd'] = $row{'pwd'};
                $_SESSION['url'] = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

                header("location:../maildemo.php");
            } else {
                echo '<script>alert("Email is not Exists")</script>';
            }
        }
        ?>
       
    </head>

    <body class="animsition">


        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
                <div class="container" style=" margin-top: 70px;">
                    <div class="banner_content text-center" >
                        <section class="login_box_area p_120" >
                            <div class="container" >
                                <div class="login-wrap card col-12" style="border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.4);">
                                    <div class="login-content"> 
                                        <br>    
                                        <h1 class="animated flipInX">Forgot Password</h1>
                                        <div class="login-logo">
                                            <!--
                                            <a href="#">                                
                                                <img src="../images/reset.png" width="20%" alt="Paras">
                                            </a>
                                            -->
                                        </div>
                                        <br>

                                        <div class="login-form">
                                            <form  method="post">
                                                <center>
                                                <div class="form-group">
                                                    <div class="col-md-6 form-group">
                                                        <input type="email" required="true" class="form-control" name="email" placeholder="Enter Email">
                                                    </div>
                                                </div>
                                                </center>


                                                <button class="main_btn bt" style="border-radius:25px;" name="btn" type="submit">Reset Password</button>
                                                <div class="login-checkbox">
                                                    &nbsp;<br>
                                                    <label>
                                                        <a  href="login.php">Back to Login</a>
                                                    </label>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    </section>

                </div>
            </div>
        </div>
    </section>

    <?php include './footer.php'; ?>
</body>

</html>

<?php include './script.php'; ?>