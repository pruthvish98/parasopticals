

<!DOCTYPE html>
<html lang="en">
<head>
<title>Update</title>
<?php include 'head.php';?>
</head>
<body class="animsition">
    <?php
    session_start();
    include '../connection.php'; 
    if (!isset($_GET['uid']) || empty($_GET['uid'])) 
    {
        header("location:Employee_login.php") ;
    }
    if (isset($_GET['uid']))
    {
        $uid = $_GET['uid']; 
        $displayq = mysqli_query($connection,"select * from emp where emp_id='{$uid}' ")or die(mysqli_error($connection));
    }
    ?>
    <?php
    if(isset($_POST['update']))
    {
        $id=$_POST_['eid'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $dob = $_POST['dob'];
        $gender = $_POST['rdb'];
        $email = $_POST['email']; 
        $path= "img/".$_FILES['photo']['name'];
        $location=$_FILES['photo']['tmp_name']; 
        
         
        if (isset($_FILES['photo']['name']) && !empty($_FILES['photo']['name'])) 
        {
            
        
                $q = mysqli_query($connection, "update emp set emp_fname= '{$fname}' , emp_lname= '{$lname}' , dob='{$dob}' , gender='{$gender}' , email='{$email}', photo='{$path}' where emp_id ='{$uid}'") or die(mysqli_error($connection));
                
                
                if($q)
                {
                    $upload = move_uploaded_file($_FILES['photo']['tmp_name'], $path);
                    $_SESSION['fname']=$fname;
                    $_SESSION['lname']=$lname;
                    $_SESSION['email']=$email;
                    $_SESSION['photo']=$path;
                    echo '<script> alert("Record updated") </script>';
                    header("location:Employee_profile.php") ;
                } 
        } else {
            $q = mysqli_query($connection, "update emp set emp_fname= '{$fname}' , emp_lname= '{$lname}' , dob='{$dob}' , gender='{$gender}' , email='{$email}' where emp_id ='{$uid}'") or die(mysqli_error($connection));
                if($q)
                {
                      $_SESSION['fname']=$fname;
                    $_SESSION['lname']=$lname;
                    $_SESSION['email']=$email;
                    echo '<script> alert("Record updated") </script>';
                    header("location:Employee_profile.php") ;
                }
            
        }
     
      
    }
   ?>
<?php include 'emp_header.php';?>
<div class="page-container">
       <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Edit Profile</strong>
                                    </div>
                                    <?php
                                    $row = mysqli_fetch_array($displayq);
                                    ?>
                                    <form  method='post' enctype="multipart/form-data" class='form-horizontal'>
                                        <div class='card-body card-block'>
                                        <div class='row form-group'>
                                          <div class="col-5">
                                                   <div class='form-group'> 
                                                       <input type='hidden' name='eid' value = "<?php echo "{$row['emp_id']}"; ?>" >
                                                  <label >First Name  </label>
                                                    <input type="text"  name="fname" value = "<?php echo "{$row['emp_fname']}"; ?>" class="form-control">
                                                 </div>
                                               </div>
                                             <div class="col-5">
                                                 <div class='form-group'> 
                                                    <label>Last Name  </label>
                                                    <input type="text" name="lname" value = "<?php echo "{$row['emp_lname']}"; ?>" class="form-control">
                                                   </div>
                                            </div>
                                            <div class='col-5'>   
                                                <div class='form-group'>
                                                <label > Enter Date of Birth </label>
                                                <input type='date'  name='dob' value ="<?php echo "{$row['dob']}";?>" class='form-control'> 
                                            </div>
                                        </div>                     
                                            <div class='col-5'>
                                                <div class='form-group'>
                                                    <label>Gender</label>
                                                    <input type='text' value ="<?php echo "{$row['gender']}";?>" name='rdb' class='form-control'>
                                                </div>
                                            </div>
                                            <div class='col-5'>
                                                <div class='form-group'>
                                                    <label >Email</label>
                                                   <input type='text'  value ="<?php echo "{$row['email']}";?>" name='email' class='form-control'>
                                                </div>
                                                <!-- <div class='form-group'>
                                                     <label>Upload Picture</label>
                                                   <input type='file' value ="<?php echo "{$row['photo']}";?>" name="photo" class='form-control' >
                                                </div> -->
                                            </div>
                                            </div>                                
                                    </div> 
                                    <div class='card-footer'>
                                        <button type='submit' name='update' class='btn btn-success btn-sm'>
                                            <i class='fa fa-check-circle'></i> Update
                                        </button>
                                        <button type='reset' class='btn btn-danger btn-sm'>
                                            <i class='fa fa-times-circle'></i> Reset
                                        </button>
                                        
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
<?php include 'Emp_sidemenu.php'; ?>
