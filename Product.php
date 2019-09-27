<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Product</title>
        <?php
        include 'head.php';
        session_start();
        include './checklogin.php';
        ?>
    </head>

    <body class="animsition">

        <?php
        include 'Header.php';
        include './connection.php';
        include './check-data.php';
        ?>
        <div class="page-container">
            <div class="main-content" style="background-image: url('img/bg.jpg')">

                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                        <div class="row">

                            <div class="col-lg-12">


                                <div class="card"style="box-shadow:0 0 10px  rgba(0,0,0,0.4); border-radius: 10px;">

                                    <div class="card-header">
                                        <strong>Product</strong>

                                    </div>
                                    <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                        <div class="card-body card-block">

                                            <div class="row form-group">
                                                <div class="col-4">
                                                    <label class=" form-control-label">Product Name</label>
                                                    <input type="text"  name="pname" placeholder="Enter Product Name" class="form-control">
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label  class=" form-control-label">Lens Expiry</label>

                                                        <select name="lexp"  class="form-control">
                                                            <option value=" ">None</option>
                                                            <option value="0">Monthly</option>
                                                            <option value="1">Weekly</option>
                                                            <option value="2">Yearly</option>
                                                            <option value="3">Daily</option>

                                                        </select>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row form-group">                                           
                                                <div class="col-12">
                                                    <label  class=" form-control-label">Product Details</label>
                                                    <textarea name="pdet"  rows="2" placeholder="Content..." class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-4">
                                                    <label class=" form-control-label">Select File</label>
                                                    <input type="File"  name="file1" placeholder="Select" class="form-control" required="true">
                                                </div>
                                                <!--                                                    <div class="col-4">
                                                                                                        <label class=" form-control-label">Select File</label>
                                                                                                        <input type="File"  name="file2" placeholder="Select" class="form-control">
                                                                                                    </div>
                                                                                                    <div class="col-4">
                                                                                                        <label class=" form-control-label">Select File</label>
                                                                                                        <input type="File"  name="file3" placeholder="Select" class="form-control">
                                                                                                    </div>-->
                                            </div>
                                            <div class="row form-group">
                                                <div class=" col-md-4">
                                                    <label  class=" form-control-label">Brand</label>
                                                    <select name='brand'  class="form-control">
                                                        <?php
                                                        $brand = mysqli_query($connection, "select * from brand where is_delete='0'")or die(mysqli_error($connection));

                                                        while ($rowbrand = mysqli_fetch_array($brand)) {
                                                            echo "  <option value='{$rowbrand['brand_id']}'>{$rowbrand['brand_name']}</option>";
                                                        }
                                                        ?>
                                                    </select>


                                                </div>



                                                <div class=" col-md-4">
                                                    <label  class=" form-control-label">Color</label>
                                                    <select name='color'  class="form-control">
                                                        <?php
                                                        $color = mysqli_query($connection, "select * from product_color where is_delete='0'")or die(mysqli_error($connection));

                                                        while ($rowcolor = mysqli_fetch_array($color)) {
                                                            echo "  <option value='{$rowcolor['color_id']}'>{$rowcolor['color_name']}</option>";
                                                        }
                                                        ?>
                                                    </select>


                                                </div>
                                            </div>

                                            <div class="row form-group">



                                                <div class=" col-md-4">
                                                    <label  class=" form-control-label">Sub Category</label>
                                                    <select name='subcat'  class="form-control">
                                                        <?php
                                                        $subcat = mysqli_query($connection, "select * from sub_category where is_delete='0'")or die(mysqli_error($connection));

                                                        while ($rowsubcat = mysqli_fetch_array($subcat)) {
                                                            echo "  <option value='{$rowsubcat['sub_cat_id']}'>{$rowsubcat['sub_cat_name']}</option>";
                                                        }
                                                        ?>
                                                    </select>


                                                </div>
                                                <div class=" col-md-4">
                                                    <label  class=" form-control-label">Size</label>
                                                    <select name="size"  class="form-control">
                                                        <option value="small">Small</option>
                                                        <option value="medium">Medium</option>
                                                        <option value="large">Large</option>                                                            
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row form-group">                                           
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label  class=" form-control-label">Price </label>
                                                        <input type="text"  name="price" placeholder="Enter Price" class="form-control">
                                                    </div>
                                                </div>



                                                <div class="col-md-4">
                                                    <label  class=" form-control-label">Offers</label>
                                                    <select name="offer"  class="form-control">
                                                        <?php
                                                        $offerq = mysqli_query($connection, "select * from offers where is_active='1' ")or die(mysqli_error($connection));
                                                        while ($offerrow = mysqli_fetch_array($offerq)) {
                                                            echo " <option  value='{$offerrow['offer_id']}'> {$offerrow['offer_name']} </option>";
                                                            $disc = $offerrow['discount'];
                                                        }
                                                        ?>

                                                    </select>
                                                </div>




                                            </div>  




                                            <div class="card-footer">
                                                <button type="submit" name="product" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-check-circle"></i> Submit
                                                </button>
                                                <button type="reset" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-times-circle"></i> Reset
                                                </button>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--<div class="md-fab-wrapper">
                            <a class="md-fab md-fab-primary" href="<?php echo "Product_update.php?uid={$uid}"; ?>">
                                <button type="submit"></button>
                                <i class="material-icons">edit</i>
                            </a>
                        </div>-->
                    </div>
                </div>
            </div>

        </div>

    </div>
</body>

</html>
<?php include 'Side_Menu.php'; ?>
<?php
if (isset($_POST['product'])) {
    $pname = $_POST['pname'];
    $lens = $_POST['lexp'];
    $pdet = $_POST['pdet'];
    $path = "img/" . $_FILES['file1']['name'];
    $location = $_FILES['file1']['tmp_name'];
    $photo = move_uploaded_file($location, "user_site/" . $path);
    // $path2=$_FILES['file2']['name']; 
    // $path3=$_FILES['file3']['name']; 
    $brand1 = $_POST['brand'];
    $color1 = $_POST['color'];
    $subcat1 = $_POST['subcat'];
    $price = $_POST['price'];
    $offer = $_POST['offer'];
    $size = $_POST['size'];
    // $oprice= ($price*$disc)/100;
    //  $fprice=$price-$oprice;

    $check = checkdata($connection, "product_master", "product_name", $pname);

if ($check) {
    $pro = mysqli_query($connection, "insert into product_master(product_name,product_details,sub_cat_id,product_price,lens_expiry,offer_id,color_id,brand_id,size,img) values ('{$pname}','{$pdet}','{$subcat1}','{$price}','{$lens}','{$offer}','{$color1}','{$brand1}','{$size}','{$path}')") or die(mysqli_error($connection));
    if ($pro) {
        echo '<script>setTimeout(function(){alert("Product Added")}, 50)</script>';
        echo '<script>setTimeout(function(){window.location ="Product_display.php";}, 100)</script>';
    }
    } else {
        echo '<script> alert("Data Already Exits") </script>';
    }
}
?>
