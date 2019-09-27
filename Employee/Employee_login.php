<html>
<head>
    <title>Employee Login</title>
   <?php include 'head.php'; 
   ob_start();
   session_start();
   ?>
</head>
<body class="animsition" background="../img/bg.jpg">
  
    
            
                <div class="login-wrap">
                     <div class="shadow p-3 mb-5 bg-white rounded">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">                                
                                <img src="../images/employee.png" width="70%" alt="Paras">
                            </a>

                          </div>
                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" required="true" type="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" required="true" type="password" name="pwd" placeholder="Password">
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <a  href="../home.php">Back to home</a>
                                    </label>
                                    <label>
                                        <a  href="Employee_forgotpwd.php">Forgotten Password?</a>
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" name="btn" type="submit">sign in</button>
                            </form>
                        </div>
                    </div>
                </div>
     
    </div>
</body>

</html>

<?php 

include 'script.php';
include 'connection.php';


if(isset($_POST['btn']))
{
   
    
    $email=$_POST['email'];
    $pwd=$_POST['pwd'];
    
    
     $q = mysqli_query($connection,"select * from emp where email='{$email}' and pwd='{$pwd}'  ")or die(mysqli_error($connection));
     $count = mysqli_num_rows($q);
     $row= mysqli_fetch_array($q);
     
        
    
    if ($count>0)
    {
        
        $_SESSION['id']=$row{'emp_id'}; 
        $_SESSION['email']=$row{'email'};         
        $_SESSION['fname']=$row{'emp_fname'}; 
        $_SESSION['lname']=$row{'emp_lname'};
        //$_SESSION['photo']=$row{'photo'};
        header("location:Dashboard.php");
    } 
    else 
    {
         echo '<script>setTimeout(function(){alert(\'Please Check the Email & Password\');}, 100)</script>';
       
    }
   }





?>

