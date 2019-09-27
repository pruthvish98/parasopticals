<?php

include 'connection.php';
session_start();

?>
<html>
<head>
    <title>Change Password</title>
   <?php include 'head.php'; ?>
</head>

<body class="animsition" background="img/bg.jpg">
    
                <div class="login-wrap">
                     <div class="shadow p-3 mb-5 bg-white rounded">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">                                
                                <img src="images/admin.png" width="70%" alt="Paras">
                            </a>

                          </div>
                        <div class="login-form">
                            <form  method="post">
                                <div class="form-group">
                                    <label>Old Password</label>
                                    <input class="au-input au-input--full" type="password"  name="old_pwd" placeholder="Enter Old Password">
                                </div>
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input class="au-input au-input--full" type="password" name="new_pwd" placeholder="Enter New Password">
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input class="au-input au-input--full" type="password" name="c_pwd" placeholder="Confirm Password">
                                </div>
                                
                                
                                <button class="au-btn au-btn--block au-btn--green m-b-20" name="btn" type="submit">Change Password</button>
                                <div class="login-checkbox">
                                    &nbsp;
                                    <label>
                                        <a  href="Admin_login.php">Back to Login</a>
                                    </label>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
</div>
   
</body>

</html>

<?php include 'Script.php'; ?>
<?php 
if(!isset($_SESSION['a_id']))
{
    header("location:Admin_login.php");
}
if(isset($_POST['btn']))
    {
        
        $opwd = $_POST['old_pwd'];
        $npwd = $_POST['new_pwd'];
        $cpwd = $_POST['c_pwd'];
        
       $oldpwdq= mysqli_query($connection, "select admin_pwd from admin where admin_id ={$_SESSION['a_id']} ")or die(mysqli_error($connection));
       $oldpwd= mysqli_fetch_array($oldpwdq);
       
     if($oldpwd['admin_pwd']==$opwd)
     {
                         
        if($npwd == $cpwd)
        {
            if($oldpwd['admin_pwd']==$npwd)
            {
                echo '<script>alert("Old password is not consider as new password")</script>';
            } 
            else 
            {
               $changeq= mysqli_query($connection,"update admin set admin_pwd ={$npwd} where admin_id={$_SESSION['a_id']}")or die(mysqli_error($connection)) ;
               
              
               if($changeq)
               {
                      echo '<script>setTimeout(function(){alert("Paasword Change Succsesfully")}, 50)</script>';
                       echo '<script>setTimeout(function(){window.location ="Admin_login.php";}, 100)</script>';    
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
        echo '<script>alert("Old Password incorrect")</script>';
     }
    
       
            
  }



?>