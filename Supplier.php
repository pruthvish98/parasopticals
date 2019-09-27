<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Supplier</title>
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
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Supplier</strong>
                                    </div>
                                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                        <div class="card-body card-block">
                                            <div class="row form-group">
                                                <div class="col-5">
                                                    <label>First Name </label>
                                                    <input type="text" pattern="[a-zA-Z ]*$" title="Only Characters are Allowed" name="fname" required="true" class="form-control">
                                                </div>
                                                <div class="col-5">
                                                    <label>Last Name </label>
                                                    <input type="text" pattern="[a-zA-Z ]*$" title="Only Characters are Allowed" name="lname" required="true" class="form-control">
                                                </div>
                                                
                                            </div>
                                           
                                            

                                            <div class="row form-group">                                           
                                                <div class="col-5">
                                                    <div class="form-group">
                                                        <label>Mobile</label>
                                                        <input type="text" name="mo" pattern="[0-9]*$" title="Only Digits are Allowed" required="true" class="form-control">
                                                    </div>
                                                </div>
                                            
                                                                                   
                                                
                                            </div>
                                              <div class="row form-group">  
                                                  <div class="col-5">
                                                    <div class="form-group">
                                                        <label>GST No.</label>
                                                        <input style="text-transform: uppercase;" type="text" required="true" pattern="(?=.*[0-9])(?=.*[A-Z]).{10}" name="gst" class="form-control">
                                                    </div>
                                                </div>
                                              </div>
                                               <div class="row form-group">                                           
                                                <div class="col-7">
                                                    <div class="form-group">
                                                        <label>Address</label>
                                                        <textarea row="3" name="add" required="true" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" name="btn" class="btn btn-success btn-sm">
                                                <i class="fa fa-check-circle"></i> Submit
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
    include 'Side_Menu.php';
    include 'connection.php';
   // include './check-data.php';
    if(isset($_POST['btn']))
    {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $name = $fname." ". $lname;
        $mo = $_POST['mo'];
         $gst = $_POST['gst'];
         $add = $_POST['add'];
                
        // $check = checkdata($connection, "supplier", "supplier_name", $mo);

//if ($check) {
        $q = mysqli_query($connection, "insert into supplier(supplier_name,supplier_mo,supplier_add,supplier_gst) values ('{$name}','{$mo}','{$add}','{$gst}')") or die(mysqli_error($connection));
        if($q)
        {            
            echo '<script> alert("Record Inserted") </script>';
        }
 
   // }
  //  } else {
    //    echo '<script> alert("Data Already Exits") </script>';
    }
   ?>

