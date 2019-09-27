
<html>
<head>
    <title>Reset Password</title>
   <?php include 'head.php'; 
   session_start();
   include '../connection.php';
   
if(isset($_POST['btn']))
{
   
    
    $email=$_POST['email'];  
    
    
     $q = mysqli_query($connection,"select * from emp where email='{$email}' ")or die(mysqli_error($connection));
     $count = mysqli_num_rows($q);
     $row= mysqli_fetch_array($q);
     
        
    
    if ($count>0)
    {
              
        $_SESSION['email']=$row{'email'};         
        $_SESSION['name']=$row{'emp_fname'}; 
        $_SESSION['pwd']=$row{'pwd'}; 
        header("location:../maildemo.php");
    } 
    else 
    {
       echo '<script>alert("Email is not Exists")</script>';
    }
   }
   
   
   ?>
</head>

<body class="animsition" background="../img/bg.jpg" >
    
      
            <div class="container">
                <div class="login-wrap"><div class="shadow p-3 mb-5 bg-white rounded">
                    <div class="login-content">  
                         <div class="login-logo">
                            <a href="#">                                
                                <img src="images/reset.png" width="20%" alt="Paras">
                            </a>

                          </div>

                        
                        <div class="login-form">
                            <form  method="post">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                </div>
                                
                                
                                <button class="au-btn au-btn--block au-btn--green m-b-20" name="btn" type="submit">Reset Password</button>
                                <div class="login-checkbox">
                                    &nbsp;
                                    <label>
                                        <a  href="Employee_login.php">Back to Login</a>
                                    </label>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>

   
</body>

</html>

<?php include 'Script.php'; ?>