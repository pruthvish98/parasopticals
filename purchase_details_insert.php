

<html lang="en">
    <head>
        <title>Purchase detail</title>
        <?php
        include 'head.php';
        include './connection.php';
        session_start();
        include './checklogin.php';
        if (!isset($_GET['eid']) || empty($_GET['eid'])) {

                header("location:purchase_insert.php");
            }

        if (isset($_POST['insert'])) {

            
            $purid= $_GET['eid'];
            echo $purid;
            $product = mysqli_real_escape_string($connection, $_POST['product']);
            $qty = mysqli_real_escape_string($connection, $_POST['qty']);
            $amount = mysqli_real_escape_string($connection, $_POST['amount']);
            $total=$qty*$amount;

            $q = mysqli_query($connection, "insert into purchase_order_details (purchase_id,product_id,purchase_qty,purchase_amount,purchase_total, is_delete) values('{$purid}','{$product}','{$qty}','{$amount}','{$total}','0')") or die(mysqli_error($connection));
            $qtyupdate= mysqli_query($connection, "update product_master set qty=qty+{$qty} where product_id= '{$product}'")or die(mysqli_error($connection));
            if ($q) {
                echo" <script>alert('Record Inserted'); </script>";
            }
        }
        ?>



    </head>


    <body class="animsition">

        <?php include 'Header.php'; ?>
        <div class="page-container">
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-lg-7">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Purchase</strong>

                                    </div>
                                    <form method="post" class="form-horizontal">
                                        <div class="card-body card-block">
                                            <div class="row form-group">
                                                <div class="col-6">
                                                    <label  class=" form-control-label"> Product Name</label>
                                                    <select class="form-control" required="true" name="product">
                                                        <?php
                                                        $product = mysqli_query($connection, "select * from product_master Where is_delete='0'");
                                                        while ($productrow = mysqli_fetch_array($product)) {
                                                            echo " <option  value='{$productrow['product_id']}'> {$productrow['product_name']}</option>";
                                                        }
                                                        ?>

                                                    </select>

                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-6">
                                                    <label  class=" form-control-label"> Quantity</label>
                                                    <input type="text" pattern="[0-9]*$" min="1" autocomplete="off" class="form-control" name="qty">

                                                </div>
                                                
                                            </div>
                                             <div class="row form-group">
                                                <div class="col-6">
                                                    <label  class=" form-control-label"> Amount</label>
                                                    <input type="text" min="0" autocomplete="off" pattern="[0-9]*$" class="form-control" name="amount">

                                                </div>
                                                
                                            </div>
                                           
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" name="insert" class="btn btn-success btn-sm">
                                                <i class="fa fa-check-circle"></i> Submit
                                            </button>
                                            <button type="reset" class="btn btn-danger btn-sm">
                                                <i class="fa fa-times-circle"></i> Reset
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
<?php include'side_menu.php' ?>