
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Product Detail</title>
        <?php
        session_start();
        include 'head.php';
        include 'checklogin.php';
        ?>
    </head>

    <body class="animsition">

        <?php 
         ob_start();
        include 'emp_header.php'; ?>

        <?php
        include '../connection.php';
       
        
         if (!isset($_GET['sid']) || empty($_GET['sid'])) {

                header("location:Offline_product.php");
            }
        
        $productq= mysqli_query($connection, "select * from product_master where `product_master`.`is_delete`='0'");
        
        if(isset($_POST['btn1'])){          
        
            
            $orderid=$_GET['sid'];
            $product=$_POST['product'];
            $qty=$_POST['qty'];
            
            $proq= mysqli_query($connection, "select * from product_master where product_id='{$product}' AND `product_master`.`is_delete`='0'");
            $pricerow= mysqli_fetch_array($proq);
            $price=$pricerow['product_price'];
            $amount= $qty*$price;
            $saledetailq= mysqli_query($connection,"insert into sales_order_details(sales_order_id,product_id,sales_qty,amount)values('{$orderid}','{$product}','{$qty}','{$amount}')")or die(mysqli_error($connection));
           if($saledetailq){
               $saleq= mysqli_query($connection,"update sales_order set total='{$amount}' where sales_order_id={$orderid}")or die(mysqli_error($connection)); 
               $qtyupdate= mysqli_query($connection, "update product_master set qty=qty-{$qty} where product_id= '{$product}'")or die(mysqli_error($connection));
               echo '<script> alert("Order Inserted Successfully") </script>';
               
           }
               
                      

        } 
            
        
         
        
        
        ?>
        <div class="page-container">
            <div class="main-content" style="background-image: url('img/bg.jpg')">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="card" style="box-shadow:0 0 10px  rgba(0,0,0,0.4); border-radius: 10px;">
                                    <div class="card-header" align="center">
                                        <strong> Offline Customer </strong>

                                    </div>
                                    <form  method="post" enctype="multipart/form-data" class="form-horizontal">
                                        <div class="card-body card-block">
                                            
                                            <div class="row form-group">   
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label  class=" form-control-label">Product Name</label>
                                                        
                                                        <select name="product" class="md-input">
                                                            <option selected value="0">Select Product </option>
                                                            <?php
                                                              
                                                             while($productrow= mysqli_fetch_array($productq))
                                                             {
                                                            echo " <option value='{$productrow['product_id']}'>{$productrow['product_name']}</option>";
                                                             }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row form-group">                                           
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="form-control-label">Quantity</label><br>
                                                        <input type="Number"  required="true" autocomplete="off" max="5" min="1" name="qty" class="md-input">
                                                    </div>
                                                </div>
                                            </div>



                                        </div>
                                        <div class="card-footer" align="center">
                                            <button type="submit" name="btn1" style="border:none; " class="btn btn-outline-success btn-sm">
                                                <i class="fa fa-check-circle"  ></i> Submit
                                            </button>
                                            &nbsp;
                                            <button type="reset" style="border:none; " class="btn btn-outline-danger btn-sm">
                                                <i class="fa fa-times-circle"  ></i> Reset
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
<?php include 'Emp_sidemenu.php'; ?>
