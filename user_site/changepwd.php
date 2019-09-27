<html>
    <head>

        <title>Change Password</title>
        <?php include './css.php'; 
       ?>

    </head>
    <body>

        <!--================Header Menu Area =================-->
        <?php
        ob_start();
        include './header.php';
  
             $_SESSION['url']="http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            require  'checklogincust.php';
        ?>

        <!--================Header Menu Area =================-->

        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
                <div class="container" style="margin-right: -100px; margin-top: 70px;">
                    <div class="banner_content text-center" >
                        <section class="login_box_area p_120" >
                            <div class="container" >

                                <div class="row" >
                                    <div class="col-lg-6"  >
                                        <div class="login_form_inner reg_form"  style=" border-radius: 12px; background-color: white; box-shadow: 0 0 80px rgba(33,33,33,.2);">
                                            <h3>Change Password</h3>
                                            <form class="row login_form"  method="post" >

                                                <div class="col-md-12 form-group">
                                                    <input type="password" class="form-control" required="true" name="old_pwd" placeholder=" Old Password">
                                                </div>

                                                <div class="col-md-12 form-group">
                                                    <input type="password" class="form-control" required="true" name="new_pwd" placeholder="New Password">
                                                </div>

                                                <div class="col-md-12 form-group">
                                                    <input type="password" class="form-control" required="true" name="c_pwd" placeholder=" Confirm Password">
                                                </div>

                                                <div class="col-md-12 form-group">
                                                    <br>
                                                    <button type="submit" name="btn" class="genric-btn success circle" style="  box-shadow: 0 11px 10px rgba(33,33,33,.2); width: 50%;">Change</button>

                                                </div>
                                                &nbsp;
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



       

    </body>
</html>
 <?php include './script.php'; ?>
<?php 
    
    include '../connection.php';
    

if(isset($_POST['btn']))
    {
        
        $opwd = $_POST['old_pwd'];
        $npwd = $_POST['new_pwd'];
        $cpwd = $_POST['c_pwd'];
        
       $oldpwdq= mysqli_query($connection, "select pwd from customer where customer_id ={$_SESSION['c_id']} ")or die(mysqli_error($connection));
       $oldpwd= mysqli_fetch_array($oldpwdq);
       
     if($oldpwd['pwd']==$opwd)
     {
                
        if($npwd == $cpwd)
        {
            if($oldpwd['pwd']==$npwd)
            {
                echo '<script>alert("Old password is not consider as new password")</script>';
            } 
            else 
            {
               $changeq= mysqli_query($connection,"update customer set pwd ={$npwd} where customer_id= {$_SESSION['c_id']}");
               if($changeq)
               {
                      echo '<script>setTimeout(function(){alert("Paasword Change Succsesfully")}, 50)</script>';
                       echo '<script>setTimeout(function(){window.location ="index.php";}, 100)</script>';    
               }
            }
        }
        else 
        {
            echo '<script>alert("Password Not Match")</script>';
        }
     } 
     else
     {
        echo '<script>alert("Old Password Incorrect")</script>';
     }      
            
  }
  ?>

