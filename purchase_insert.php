<html lang="en">

    <head>
        <title>Purchase</title>
        <?php
        include 'head.php';
        include './connection.php';
        session_start();
        include './checklogin.php';

        if (isset($_POST['purchase'])) {

            $countq = mysqli_query($connection, "select * from purchase_order");
            $count = mysqli_num_rows($countq);

            $id = $count + 1;

            $sup = mysqli_real_escape_string($connection, $_POST['txt1']);
            $date = mysqli_real_escape_string($connection, $_POST['date']);


            $q = mysqli_query($connection, "insert into purchase_order (supplier_id,purchase_date,is_delete) values('{$sup}','{$date}','0')") or die(mysqli_error($connection));
            if ($q) {
                header("location:purchase_details_insert.php?eid={$id}");
            }
        }
        ?>



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
                                    <div class="card-header" align="center">
                                        <strong>Purchase</strong>

                                    </div>
                                    <form method="post" class="form-horizontal" >
                                        <div class="card-body card-block">
                                            <div class="row form-group">
                                                <div class="col-6">
                                                    <label  class=" form-control-label"> Supplier Name</label>
                                                    <select class="form-control" required="true" name="txt1">
                                                        <?php
                                                        $supplier = mysqli_query($connection, "select * from supplier");
                                                        while ($suprow = mysqli_fetch_array($supplier)) {
                                                            echo " <option  value='{$suprow['supplier_id']}'> {$suprow['supplier_name']}</option>";
                                                        }
                                                        ?>

                                                    </select>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6" >
                                                    <div class="form-group">
                                                        <label  class=" form-control-label">Date</label>
                                                        <input  required autocomplete="off"  name="date" type="date" class="form-control" >

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-footer" align="center">
                                            <button type="submit" name="purchase" style="border:none; " class="btn btn-outline-success btn-sm">
                                                <i class="fa fa-check-circle"  ></i> Submit
                                            </button>
                                            &nbsp;
                                            <button type="reset" style="border:none; " data-message="<a href='#' class='notify-action'>Clear</a> Success Message" data-status="info" data-pos="bottom-center" class="btn btn-outline-danger btn-sm">
                                                <i class="fa fa-times-circle"  ></i> Reset
                                            </button>
                                            &nbsp;
                                            <a href="purchase_display.php">
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
    </body>


</html>
<?php include'side_menu.php' ?>