<!doctype html>
<html lang="en">
    <head>

        <title>Registeration</title>
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
        <br>
        <br>
        <br>
        <!--================Header Menu Area =================-->

        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
                <div class="container" >
                    <div class="banner_content text-center">
                        <section class="login_box_area p_120" >
                            <div class="container" >

                                <div class="row" >
                                    
                                    <div class="col-lg-6 animated zoomInLeft ">
                                        <div class="login_box_img">
                                            <img class="img-fluid "src="img/login_img.jpg" style="height:700px; width: 609px; box-shadow: 0 0 80px rgba(33,33,33,.2);  ">
                                            <div class="hover animated zoomIn">
                                                <h4>New to our website?</h4>
                                                
                                                <a class="main_btn" style="border-radius:25px;" href="login.php">Login To your account</a>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="col-lg-6 animated zoomInRight " >
                                        <div class="login_form_inner reg_form"  style=" background-color: white; box-shadow: 0 0 80px rgba(33,33,33,.2);">
                                            <h3>Create an Account</h3>
                                            <form class="row login_form" method="post" >
                                                <div class="col-md-12 form-group">
                                                    <input type="text" class="form-control" pattern="[a-zA-Z ]*$" title="Only Characters are Allowed" required="true" name="name" placeholder="Name">
                                                </div>
                                                <div class="col-md-12 form-group">
                                                    <input type="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Incorrect email format" required="true" name="email" placeholder="Email Address">
                                                </div>
                                                <div class="col-md-12 form-group">
                                                    <input type="text" class="form-control" pattern="(?=.*[0-9]).{10}" title="Only Digits are Allowed & 10 digits" required="true" name="mo" placeholder="Mobile">
                                                </div>



                                                <div style="height: 50px; border: none;" class="form-control">
                                                    <div class="single-element-widget">
                                                        <div class="default-select">

                                                            <select name="gender" required="true">

                                                                <option>Gender </option>
                                                                <option value="male">Male</option>
                                                                <option value="female"l>Female</option>
                                                            </select>
                                                            
                                                        </div>
                                                        
                                                    </div>

                                                </div>
                                                 
                                                <div class="col-md-12 form-group">
                                                    <label style="margin-right: 270px;">Birthdate</label> 
                                                    <input type="date" name="dob" required="true" class="form-control">
                                                </div>

                                                <div class="col-md-12 form-group">
                                                    <input type="password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,10}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 to 10 characters" required="true" name="pwd" placeholder="Password">
                                                </div>


                                                <div class="col-md-12 form-group">
                                                    <br>
                                                    <button type="submit" name="btn"  class="genric-btn success circle" style="  box-shadow: 0 11px 10px rgba(33,33,33,.2);">Register</button>
                                                    
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
    
    include '../connection.php';
    include '../check-data.php';
    
if(isset($_POST['btn']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mo'];
        $gender = $_POST['gender'];              
        $pwd = $_POST['pwd'];
        $add=$_POST['address'];
        $dob=$_POST['dob'];
        
        $check = checkdata($connection, "customer", "email", $email);

if ($check) {
    
        $q = mysqli_query($connection, "insert into customer(customer_name,mobile,gender,dob,email,pwd,address) values ('{$name}','{$mobile}','{$gender}','{$dob}','{$email}','{$pwd}','{$add}')") or die(mysqli_error($connection));
        if($q)
        {
            echo '<script> alert("Registration Sucsesful") </script>';
            
           
        }  } else {
        echo '<script> alert("Data Already Exits") </script>';
    }
    }
   ?>