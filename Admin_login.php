<html>
    <head>
        <title>Admin Login</title>
        <?php
        include 'head.php';
        include 'connection.php';
        ob_start();
        session_start();
        ?>
        <style>
            .flipInY{animation-delay: .7s;}
            
        </style>
    </head>
    <body class="animsition" background="img/bg.jpg">   
        <div class="login-wrap">
            <div class="shadow p-3 mb-5 bg-white rounded" >
                <div class="login-content" >
                    <div class="login-logo" >
                                                       
                            <img class="animated fadeInUp" src="images/Admin.png" width="70%" alt="Paras">
                     

                    </div>
                    <br>
                    <div class="login-form">
                        <form action="" method="post">

                            <div class="form-group">
                                <label>Email Address</label>
                                <input style="border-radius: 25px;" class="au-input au-input--full" required="true" type="email" name="email" placeholder="Enter Email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input style="border-radius: 25px;" class="au-input au-input--full" required="true" type="password" name="pwd" placeholder="Enter Password">
                            </div>
                            <br>
                            <div class="login-checkbox">
                                <label>
                                    <a  href="home.php">Back to home</a>
                                </label>
                                <label>
                                    <a  href="Admin_forgotpwd.php">Forgotten Password?</a>
                                </label>
                            </div>
                            
                            <button style="border-radius: 25px; box-shadow:0 10px 10px rgb(0,0,0,.2);" class="au-btn au-btn--block au-btn--green m-b-20" name="btn" type="submit">sign in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </body>

</html>

<?php
include 'script.php';



if (isset($_POST['btn'])) {


    $email = $_POST['email'];
    $pwd = $_POST['pwd'];



    $q = mysqli_query($connection, "select * from admin where admin_email='{$email}' and admin_pwd='{$pwd}' ")or die(mysqli_error($connection));
    $count = mysqli_num_rows($q);
    $row = mysqli_fetch_array($q);



    if ($count > 0) {

        $_SESSION['a_id'] = $row{'admin_id'};
        $_SESSION['a_email'] = $row{'admin_email'};
        $_SESSION['a_name'] = $row{'admin_name'};
        $_SESSION['photo'] = $row{'image'};

        header("location:dashboard.php");
    } else {
        echo '<script>setTimeout(function(){alert(\'Please Check the Email & Password\');}, 100)</script>';
    }
}
?>

