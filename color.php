<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Colour</title>
        <?php
        ob_start();
        session_start();
        include './checklogin.php';
        include './check-data.php';
        include 'head.php';
        ?>
        <style>
            ::placeholder{text-align: center;}
        </style>
    </head>

    <body class="animsition">
        
<?php include 'Header.php'; ?>
        <div class="page-container">

            <div class="main-content" style="background-image: url('img/bg.jpg')">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="card" style="box-shadow:0 0 10px  rgba(0,0,0,0.4); border-radius: 10px;">
                                    <div class="card-header" align="center">
                                        <strong>Colour</strong>

                                    </div>
                                    <form  method="post"  class="form-horizontal">
                                        <div class="card-body card-block">
                                            <div class="row form-group">
                                                <div class="col-12">
                                                    
                                                    <input placeholder="Enter Color" type="text" pattern="[a-zA-Z ]*$" required="true" title="Only Characters are Allowed"  name="txt1"  class="md-input">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-footer" align="center">
                                            <button type="submit" name="btn1" style="border:none;" class="btn btn-outline-success btn-sm">
                                                <i class="fa fa-check-circle" ></i> Submit
                                            </button>
                                            <button type="reset" style="border:none;" class="btn btn-outline-danger btn-sm">
                                                <i class="fa fa-times-circle"></i> Reset
                                            </button>
                                            <a href="color_display.php">
                                                <button type="button" style="border:none;" class="btn btn-outline-primary btn-sm">
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
   



</body>


</html>
<?php include 'Side_Menu.php'; ?>

<?php
include './connection.php';

if (isset($_POST['btn1'])) {

    $name = $_POST['txt1'];

    $check = checkdata($connection, "product_color", "color_name", $name);

if ($check) {
    $q = mysqli_query($connection, "insert into product_color(color_name) values ('{$name}')") or die(mysqli_errno($connection));
    if ($q)
        {
        
        echo '<script> alert("Record Inserted") </script>';
    }
     } else {
        echo '<script> alert("Data Already Exits") </script>';
    }
}
?>

