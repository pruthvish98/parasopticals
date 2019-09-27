<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Employee</title>
        <?php include 'head.php'; 
        ob_start();
        session_start();
        include './checklogin.php';
        ?>
        <?php include 'Header.php'; ?>
       
        
    </head>

    <body class="animsition">

        
        <div class="page-container">
            <div class="main-content"style="background-image: url('img/bg.jpg')">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-lg-8">
                                <div class="card" style="box-shadow: 0 8px 10px rgba(0,0,0,0.4)">
                                    <div class="card-header">
                                        <strong>Employee</strong>
                                    </div>
                                    <form action="Employee.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                        <div class="card-body card-block">
                                            <div class="row form-group">
                                                <div class="col-5">
                                                    <label>First Name </label>
                                                    <input type="text" name="fname" pattern="[a-zA-Z ]*$" title="Only Characters are Allowed" class="form-control" required>
                                                </div>
                                                <div class="col-5">
                                                    <label>Last Name </label>
                                                    <input type="text" name="lname" pattern="[a-zA-Z ]*$" title="Only Characters are Allowed" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-5">
                                                    
                                                        <label >Birth Date</label>                                            
                                                     
                                                        <br>
                                                        <input autocomplete="off" class="form-control" type="date"  name="dob" >
                                                   
                                                </div>
                                                 
                                                    
                                                <div class="col col-md-4">
                                                    <label class=" form-control-label">Gender</label>
                                                
                                                    <div class="form-check-inline form-check">
                                                        <span>
                                                            <input type="radio"  name="rdb" required value="Male"  data-md-icheck/>
                                                            <label  class="inline-label">Male</label> 
                                                        </span>
                                                        &nbsp;  &nbsp;
                                                        <span>
                                                            <input type="radio" required name="rdb" value="Female" data-md-icheck/>
                                                        <label  class="inline-label"> Female</label>
                                                        </span>
                                                    </div>
                                                </div>
                                                

                                            </div>
                                            

                                            <div class="row form-group">                                           
                                                <div class="col-5">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Incorrect email format" name="email" class="form-control" required="true">
                                                    </div>
                                                </div>
                                            
                                                                                   
                                                <div class="col-5">
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input type="password" name="pwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,10}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  required  class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                              <div class="row form-group">                                           
                                                <div class="col-5">
                                                    <div class="form-group">
                                                        <label>Designation</label>
                                                        <select name="desg" class="form-control" required>
                                                            <option value="Delivery">Delivery</option>
                                                            <option value="Shopkeeper">Shopkeeper</option>
                                                        </select>
                                                       
                                                    </div>
                                                </div>
                                                  <div class="col-5">
                                                    <div class="form-group">
                                                        <label>Mobile</label>
                                                        <input type="text" name="mo" pattern="[0-9]*$" class="form-control">
                                                    </div>
                                                </div>
                                                                                   
                                                
                                                                                      
                                                
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" name="btn1" class="btn btn-success btn-sm">
                                                <i class="fa fa-check-circle"></i> Submit
                                            </button>
                                            <button type="reset" class="btn btn-danger btn-sm">
                                                <i class="fa fa-times-circle"></i> Reset
                                            </button>
                                            <a href="Employee_alldisplay.php" >
                                            <button type="button" class="btn btn-primary btn-sm">
                                                <i class="fa fa-file-text"></i> Show
                                            </button>
                                            </a>
                                            
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
<?php 
    include 'Side_Menu.php';
    include './connection.php';
    include './check-data.php';
if(isset($_POST['btn1']))
    {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $gender = $_POST['rdb'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        $desg = $_POST['desg'];
        $mo = $_POST['mo'];
        $check = checkdata($connection, "emp", "email", $email);

if ($check) {
    
        
        $q = mysqli_query($connection, "insert into emp(emp_fname,emp_lname,dob,gender,email,pwd,desg,emp_mo) values ('{$fname}','{$lname}','{$dob}','{$gender}','{$email}','{$pwd}','{$desg}','{$mo}')") or die(mysqli_error($connection));
        if($q)
        {
            
            echo '<script> alert("Record Inserted") </script>';
        }
         } else {
        echo '<script> alert("Data Already Exits") </script>';
    }
 
    }
   ?>

