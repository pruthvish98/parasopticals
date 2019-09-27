
<!DOCTYPE html>
<html lang="en">

<head>
<title>Supplier Edit</title>
<?php include 'head.php';
 ob_start();
session_start();?>
</head>

<body class="animsition">
    <?php
    
    include 'connection.php'; 
    if (!isset($_GET['uid']) || empty($_GET['uid'])) 
    {
         header("location:Supplier_display.php") ;
    }
    
      
    if (isset($_GET['uid']))
    {
        $uid = $_GET['uid']; 
        $displayq = mysqli_query($connection,"select * from supplier where supplier_id='{$uid}' ")or die(mysqli_error($connection));
        
    }
    

    
   ?>

<?php include 'Header.php';?>
<div class="page-container">
       <div class="main-content"style="background-image: url('img/bg.jpg')">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Supplier</strong>
                                        
                                    </div>
                                    <?php
                                    $row = mysqli_fetch_array($displayq);
                                    ?>
                                     
                                    <form  method="post" enctype="multipart/form-data" class="form-horizontal">
                                        <div class="card-body card-block">
                                            <div class="row form-group">
                                                
                                                <div class="col-5">
                                                    <input type="hidden" name="id" value="<?php echo $row{'supplier_id'} ?>"  class="form-control">
                                                    <label>Name </label>
                                                    <input type="text" name="name" value="<?php echo $row{'supplier_name'} ?>" required="true" class="form-control">
                                                </div>
                                                
                                                
                                            </div>
                                           
                                            

                                            <div class="row form-group">                                           
                                                <div class="col-5">
                                                    <div class="form-group">
                                                        <label>Mobile</label>
                                                        <input type="text" name="mo" value="<?php echo $row{'supplier_mo'} ?>" required="true" class="form-control">
                                                    </div>
                                                </div>
                                            
                                                                                   
                                                
                                            </div>
                                              <div class="row form-group">  
                                                  <div class="col-5">
                                                    <div class="form-group">
                                                        <label>GST No.</label>
                                                        <input type="text" required="true" value="<?php echo $row{'supplier_gst'} ?>" name="gst" class="form-control">
                                                    </div>
                                                </div>
                                              </div>
                                               <div class="row form-group">                                           
                                                <div class="col-7">
                                                    <div class="form-group">
                                                        <label>Address</label>
                                                        <textarea  name="add"  rows="3" required="true" class="form-control"><?php echo $row{'supplier_add'} ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" name="update" class="btn btn-success btn-sm">
                                                <i class="fa fa-check-circle"></i> Update
                                            </button>
                                            <button type="reset" class="btn btn-danger btn-sm">
                                                <i class="fa fa-times-circle"></i> Reset
                                            </button>
                                            <a href="Supplier_display.php" >
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

                                    
if(isset($_POST['update']))
    {
        
        $id = $_POST['id'];                
        $name = $_POST['name'];        
        $mo = $_POST['mo'];
        $gst = $_POST['gst'];
        $add = $_POST['add'];
        
        $q = mysqli_query($connection, "update supplier set supplier_id='{$id}', supplier_name= '{$name}' , supplier_mo='{$mo}',supplier_add='{$add}',supplier_gst='{$gst}' where supplier_id ='{$uid}'") or die(mysqli_error($connection));
        if($q)
        {
             echo '<script>setTimeout(function(){alert("Record Updated")}, 50)</script>';
            header("location:Supplier_display.php") ;
        }        
    }
    ?>
<?php include 'Side_Menu.php'; ?>