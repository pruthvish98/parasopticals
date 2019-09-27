<!doctype html>
<html lang="en">

    <head>
        <?php
        ob_start();
        ?>

        <title>Login</title>
        <?php include './css.php'; ?>
        <style>
            .zoomIn{
                animation-delay:  1s;


            }
        </style> 
    </head>
    <body>

        <!--================Header Menu Area =================-->
        <?php include './header.php'; ?>
        <!--================Header Menu Area =================-->
        <br>
        <br>
        <br>
        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
                <div class="container">
                    <div class="banner_content text-center">

                    
                        <section class="login_box_area p_120" >
                            <div class="container" style="margin-top:-4%;">
                                <div class="row" >
                                    <div class=" animated zoomInLeft  col-lg-6">
                                        <div class="login_box_img" >
                                            <img class="img-fluid"src="img/login_img.jpg" style="height:585px; object-fit: fill;  box-shadow: 0 0 80px rgba(33,33,33,.2); width: 609px; ">
                                            <div class="hover animated zoomIn">
                                                <h4>New to our website?</h4>
                                                
                                                <a class="main_btn bt" style="border-radius:25px;" href="signup.php">Create an Account</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="animated zoomInRight col-lg-6" >
                                        <div class="login_form_inner" style="background-color: white; box-shadow: 0 0 80px rgba(33,33,33,.2);">
                                            <h3>Log in to enter</h3>
                                            <form class="row login_form" method="post" id="contactForm" novalidate="novalidate">
                                                <div class="col-md-12 form-group">
                                                    <input type="email" required="true" class="form-control" name="email" placeholder="Enter Email">
                                                </div>
                                                <div class="col-md-12 form-group">
                                                    <input type="password" required="true" class="form-control" name="pwd" placeholder="Enter Password">
                                                </div>

                                                

                                                <div class="col-md-12 form-group">
                                                    <button type="submit" name="btn" class="genric-btn success circle " style="  box-shadow: 0 11px 10px rgba(33,33,33,.2);">Log In</button>
                                                    <a href="customerforgot.php ">Forgot Password?</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>


                    </div>
                </div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->

        <!--================Login Box Area =================-->

        <!--================End Login Box Area =================-->

        <!--================ start footer Area  =================-->	
        <?php include './footer.php'; ?>
        <!--================ End footer Area  =================-->



        <?php include './script.php'; ?>
    </body>
</html>
<?php
include './script.php';
include '../connection.php';


if (isset($_POST['btn'])) {


    $email = $_POST['email'];
    $pwd = $_POST['pwd'];


    $q = mysqli_query($connection, "select * from customer where email='{$email}' and pwd='{$pwd}' ")or die(mysqli_error($connection));
    $count = mysqli_num_rows($q);
    $row = mysqli_fetch_array($q);



    if ($count > 0) {

        $_SESSION['c_id'] = $row{'customer_id'};
        $_SESSION['c_email'] = $row{'email'};

        $_SESSION['c_name'] = $row{'customer_name'};
        if(isset($_SESSION['url'])){
            header("location:{$_SESSION['url']}");
        } else {
            header("location:index.php");
        }
    } else {
        echo '<script>alert("Check Email & Password")</script>';
    }
}
?>
