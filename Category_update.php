
<!DOCTYPE html>
<html lang="en">

<head>
<title>Area Update</title>
<?php 
ob_start();
include 'head.php';
session_start();?>
</head>

<body class="animsition">
    <?php
    
    include './connection.php'; 
    if (!isset($_GET['uid']) || empty($_GET['uid'])) 
    {
         header("location:Category_display.php") ;
    }
    
      
    if (isset($_GET['uid']))
    {
        $uid = $_GET['uid']; 
        $displayq = mysqli_query($connection,"select * from category where cat_id='{$uid}' ")or die(mysqli_error($connection));
        
    }
    

    
   ?>

<?php include 'Header.php';?>
<div class="page-container">
       <div class="main-content" style="background-image: url('img/bg.jpg')">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Category</strong>
                                        
                                    </div>
                                    <?php
                                    $row = mysqli_fetch_array($displayq);
                                    ?>
                                     
                                    <form  method='post' enctype='multipart/form-data' class='form-horizontal'>
                                 
                                    <div class='card-body card-block'>
                                        <div class='row form-group'>
                                          
                                                                             
                                            <div class='col-4'>
                                                <div class='form-group'>
                                                   
                                                      
                                                    <input type='text' name='txt1' hidden value = "<?php echo "{$row['cat_id']}"; ?>" class='md-input'>
                                                     
                                                
                                            </div>
                                        </div>
                                           
                                        <div class='col-10'>
                                        <div class='form-group'>
                                            <label  class=' form-control-label'> Enter Category</label>
                                            <input type='text'  name='txt2' value ="<?php echo "{$row['cat_name']}";?>" class='md-input'> 
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
                                        <a href='Category_display.php'>
                                        <button type='button' class='btn btn-primary btn-sm'>
                                             <i class='fa fa-list-alt'> Show</i>
                                        </button>
                                            </a>
                                    </div>
                                   
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
if(isset($_POST['update']))
    {
        
        $id = $_POST['txt1'];
        $name = $_POST['txt2'];
       
        
         
        
        $q = mysqli_query($connection, "update category set cat_id='{$id}', cat_name= '{$name}' where cat_id ='{$uid}'") or die(mysqli_error($connection));
        if($q)
        {
            echo '<script> alert("Record updated") </script>';
            header("location:Category_display.php") ;
        }        
    }
    ?>
<?php include 'Side_Menu.php'; ?>