

<!DOCTYPE html>
<html lang="en">
<head>
<title>Update</title>
<?php include 'head.php';?>
</head>
<body class="animsition">
    <?php
    session_start();
    include 'connection.php'; 
    if (!isset($_GET['uid']) || empty($_GET['uid'])) 
    {
        header("location:Admin_login.php") ;
    }
    if (isset($_GET['uid']))
    {
        $uid = $_GET['uid']; 
        $displayq = mysqli_query($connection,"select * from admin where admin_id='{$uid}' ")or die(mysqli_error($connection));
    }
    ?>
    <?php
    if(isset($_POST['update']))
    {
        $id=$_POST_['eid'];
        $name = $_POST['name'];   
        $email = $_POST['email']; 
        $path= "img/".$_FILES['photo']['name'];
        $location=$_FILES['photo']['tmp_name'];      
       
         
        if (isset($_FILES['photo']['name']) && !empty($_FILES['photo']['name'])) 
        {
                $q = mysqli_query($connection, "update admin set admin_name= '{$name}',admin_email='{$email}',image='{$path}' where admin_id ='{$uid}'") or die(mysqli_error($connection));
                if ($q) 
                {
                    $upload = move_uploaded_file($_FILES['photo']['tmp_name'], $path);
                    if ($upload) {
                        $_SESSION['a_email']=$email; 
                        $_SESSION['photo']=$path;
                         $_SESSION['a_name']=$name; 

                        header("location:Dashboard.php");
                    }
        }
    }
    else
        {
        $q = mysqli_query($connection, "update admin set admin_name= '{$name}',admin_email='{$email}' where admin_id ='{$uid}'") or die(mysqli_error($connection));
        if($q)
        {
             $_SESSION['a_email']=$email; 
            
             $_SESSION['a_name']=$name; 
            echo '<script> alert("Record updated") </script>';
            header("location:Dashboard.php") ;
        }   
    }  
     
      
    }
   ?>
<?php include 'header.php';?>
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
                                                       <input type='hidden' name='eid' value = "<?php echo "{$row['admin_id']}"; ?>" >
                                                  <label >Name  </label>
                                                    <input type="text"  name="name" value = "<?php echo "{$row['admin_name']}"; ?>" class="form-control">
                                                 </div>
                                               </div>
                                             
                                                            
                                            
                                            <div class='col-5'>
                                                <div class='form-group'>
                                                    <label >Email</label>
                                                   <input type='text'  value ="<?php echo "{$row['admin_email']}";?>" name='email' class='form-control'>
                                                </div>
                                                
                                                 <div class='form-group'>
                                                     <label>Upload Picture</label>
                                                   <input type='file' value ="<?php echo "{$row['image']}";?>" name="photo" class='form-control' >
                                                </div>
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
<?php include 'Side_menu.php'; ?>
