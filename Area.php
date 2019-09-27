<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Area</title>
        <?php
        include 'head.php';

        session_start();
        ?>
    </head>

    <body class="animsition">

        <?php include 'Header.php'; ?>
        <div class="page-container">
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Area</strong>

                                    </div>
                                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                        <div class="card-body card-block">
                                            <div class="row form-group">


                                                <div class="col-10">
                                                    <label for="company" class=" form-control-label"> Enter Area</label>
                                                    <input type="text" id="company" name="txt1" class="md-input">
                                                </div>

                                            </div>

                                            <div class="row form-group">                                           
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label for="postal-code" class=" form-control-label">Enter Postal Code</label>
                                                        <input type="text" id="postal-code" name="txt2" class="md-input">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" name="btn1"  class="btn btn-success btn-sm">
                                                <i class="fa fa-check-circle"  ></i> Submit
                                            </button>
                                            <button type="reset" data-message="<a href='#' class='notify-action'>Clear</a> Success Message" data-status="info" data-pos="bottom-center" class="btn btn-danger btn-sm">
                                                <i class="fa fa-times-circle"  ></i> Reset
                                            </button>
                                            <a href="Area_display.php">
                                                <button type="button" class="btn btn-primary btn-sm">
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
<?php
include 'connection.php';
include 'check-data.php';
if (isset($_POST['btn1'])) {

    $name = $_POST['txt1'];
    $code = $_POST['txt2'];
    $check = checkdata($connection, "area", "area_name", $name);

    if ($check) {
        $q = mysqli_query($connection, "insert into area(area_name,postal) values ('{$name}','{$code}')") or die(mysqli_errno($connection));
        if ($q) {
            echo '<script> alert("Record Inserted") </script>';
        }
    } else {
        echo '<script> alert("Data Already Exits") </script>';
    }
}
?>
<!-- common functions -->
<script src="assets/js/common.min.js"></script>
<!-- uikit functions -->
<script src="assets/js/uikit_custom.min.js"></script>    
<!--  notifications functions -->
<script src="assets/js/pages/components_notifications.min.js"></script>
</body>


</html>
<?php include 'Side_Menu.php'; ?>