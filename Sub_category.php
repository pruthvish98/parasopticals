<!DOCTYPE html>
<?php
session_start();
include './checklogin.php';
include './connection.php';
include './check-data.php';




$query = mysqli_query($connection, "select * from category ")or die(mysqli_error($connection));
if (isset($_POST['btn1'])) {
    $cat = $_POST['txt1'];
    $subcat = $_POST['txt2'];
    $check = checkdata($connection, "sub_category", "sub_cat_name", $subcat);
if ($check) {

    $q = mysqli_query($connection, "insert into sub_category(sub_cat_name,cat_id) values ('{$subcat}','{$cat}')") or die(mysqli_error($connection));
    if ($q) {
        echo '<script> alert("Record Inserted") </script>';
    }
    } else {
        echo '<script> alert("Data Already Exits") </script>';
    }
}
?>
<html lang="en">

    <head>
        <title>Sub Category</title>
        <?php include 'head.php'; ?>
        
    </head>

    <body class="animsition">

        <?php include 'Header.php'; ?>
        <div class="page-container">
            <div class="main-content"style="background-image: url('img/bg.jpg')">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="card"style="box-shadow:0 0 10px  rgba(0,0,0,0.4); border-radius: 10px;">
                                    <div class="card-header"align="center">
                                        <strong>Sub Category</strong>

                                    </div>
                                    <form action="" method="post"  class="form-horizontal">
                                        <div class="card-body card-block">
                                            <div class="row form-group">
                                                <div class="col-5">
                                                    <label  class=" form-control-label"> Enter Category</label>
                                                    <select class="form-control" name="txt1">
                                                        <?php
                                                        while ($catrow = mysqli_fetch_array($query)) {
                                                            echo " <option  value='{$catrow['cat_id']}'> {$catrow['cat_name']}</option>";
                                                        }
                                                        ?>

                                                    </select>

                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-12">
                                                    
                                                    <input placeholder="Enter Sub Category" type="text"  name="txt2" class="md-input">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer"align="center">
                                            <button type="submit" name="btn1" style="border:none; " class="btn btn-outline-success btn-sm">
                                                <i class="fa fa-check-circle"></i> Submit
                                            </button>
                                            <button type="reset" style="border:none; " class="btn btn-outline-danger btn-sm">
                                                <i class="fa fa-times-circle"></i> Reset
                                            </button>
                                            <a href="Sub_category_display.php">
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