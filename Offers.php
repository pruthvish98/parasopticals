<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Offers</title>
        <?php 
        session_start();
        include 'head.php';
        include './check-data.php';
        include './checklogin.php';
        
        ?>

    </head>

    <body class="animsition">

        <?php include 'Header.php'; ?>
        <br>
        <div class="page-container">
            <div class="main-content" style="background-image: url('img/bg.jpg')">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-md-6 offset-md-2">
                                <div class="card" style="   box-shadow:0 0 10px  rgba(0,0,0,0.4); border-radius: 10px;">
                                    <div class="card-header" align="center">
                                        <strong>Offer</strong>

                                    </div>
                                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                        <div class="card-body card-block">
                                            <div class="row form-group">


                                                <div class="col-12">

                                                    <input placeholder="Offer Name" type="text" autocomplete="off" pattern="[a-zA-Z ]*$" title="Only Characters are Allowed" required="true" name="txt1" class="md-input">
                                                </div>

                                            </div>

                                            <div class="row form-group">                                           
                                                <div class="col-12">
                                                    <div class="form-group">

                                                        <input type="text" placeholder="Offer Details" autocomplete="off" name="txt2" class="md-input">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row form-group">                                           
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        
                                     
                                                        <input type="text"  pattern="[0-9]{0,2}?"  title="Only Digits are Allowed" placeholder="Enter Discount in %" autocomplete="off" name="txt3" class="md-input">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="card-footer" align="center">
                                            <button type="submit" name="btn1" style="border:none; " class="btn btn-outline-success btn-sm">
                                                <i class="fa fa-check-circle"  ></i> Submit
                                            </button>
                                            &nbsp;
                                            <button type="reset" style="border:none; "  class="btn btn-outline-danger btn-sm">
                                                <i class="fa fa-times-circle"  ></i> Reset
                                            </button>
                                            &nbsp;
                                            <a href="Offers_display.php">
                                                <button type="button" style="border:none; " class="btn btn-outline-primary btn-sm">
                                                    <i class="fa fa-list-alt"> Show</i>
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

    </div>

</div>


</body>


</html>
<?php include 'Side_Menu.php'; ?>
<?php
    include './connection.php';
    
    if(isset($_POST['btn1']))
    {
        
        $name = $_POST['txt1'];
        $detail = $_POST['txt2'];
        $discount = $_POST['txt3'];
        
        $check = checkdata($connection, "offers", "offer_name", $name);

if ($check) {
        $q = mysqli_query($connection, "insert into offers(offer_name,offer_details,discount) values ('{$name}','{$detail}','{$discount}')") or die(mysqli_error($connection));
        if($q)
        {
            echo '<script> alert("Offer Inserted") </script>';
        }  
        } else {
        echo '<script> alert("Data Already Exits") </script>';
    }
    }
   ?>