
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
    
    include 'connection.php'; 
    if (!isset($_GET['uid']) || empty($_GET['uid'])) 
    {
         header("location:Sub_category_display.php") ;
    }
    
      
    if (isset($_GET['uid']))
    {
        $uid = $_GET['uid']; 
        $displayq = mysqli_query($connection,"SELECT
             `sub_category`.`sub_cat_id`    
            , `sub_category`.`sub_cat_name`  
             , `category`.`cat_name`
          FROM
            `sub_category`
             INNER JOIN `category`  ON (`sub_category`.`cat_id` = `category`.`cat_id`) where sub_cat_id='{$uid}' ")or die(mysqli_errno($connection));
        
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
                                        <strong>Sub Category</strong>
                                        
                                    </div>
                                    <?php
                                    $row = mysqli_fetch_array($displayq);
                                    ?>
                                     
                                    <form  method='post' enctype='multipart/form-data' class='form-horizontal'>
                                 
                                    <div class='card-body card-block'>
                                        <div class='row form-group'>
                                          
                                                                             
                                            <div class='col-4'>
                                                <div class='form-group'>
                                                   
                                                    
                                                      
                                                    <input type='text' name='txt1' hidden value = "<?php echo "{$row['sub_cat_id']}"; ?>" class='md-input'> 
                                                     
                                                
                                            </div>
                                        </div>
                                           
                                        <div class='col-10'>
                                        <div class='form-group'>
                                            <label  class=' form-control-label'> Enter Category</label>
                                            <select class="form-control" name="txt2">
                                                        <?php
                                                        
                                                        $query = mysqli_query($connection, "select * from category ")or die(mysqli_error($connection));
                                                        while ($catrow = mysqli_fetch_array($query)) {
                                                            
                                                            if($catrow['cat_name']==$row['cat_name']){
                                                                echo " <option  selected value='{$catrow['cat_id']}'> {$catrow['cat_name']}</option>";
                                                            } else {
                                                                 echo " <option  value='{$catrow['cat_id']}'> {$catrow['cat_name']}</option>";
                                                            }
                                                            
                                                        }
                                                        ?>

                                                    </select>
                                            
                                                 </div>
                                                
                                        </div> 
                                        
                                                                               
                                            <div class='col-4'>
                                                <div class='form-group'>
                                                    <label  class=' form-control-label'>Enter Sub Category</label>
                                                   <input type='text'  value="<?php echo "{$row['sub_cat_name']}";?>" name='txt3' class='md-input'>
                                                   
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
                                        <a href='Sub_category_display.php'>
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
        $code=$_POST['txt3' ];
        
         
        
        $q = mysqli_query($connection, "update sub_category set sub_cat_id='{$id}', cat_id= '{$name}' , sub_cat_name='{$code}' where sub_cat_id ='{$uid}'") or die(mysqli_error($connection));
        if($q)
        {
            echo '<script> alert("Record updated") </script>';
            header("location:Sub_category_display.php") ;
        }        
    }
    ?>
<?php include 'Side_Menu.php'; ?>