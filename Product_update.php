<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Product Edit</title>
        <?php
        include 'head.php';
        ?>
    </head>

    <body class="animsition">

        <?php
        ob_start();
        session_start();
        include 'Header.php';
        include 'connection.php';

        if (!isset($_GET['uid']) || empty($_GET['uid'])) {
            header("location:Product_display.php");
        }

        if (isset($_GET['uid'])) {

            $pid = $_GET['uid'];
            $proq = "SELECT
    `product_master`.`product_name`
    , `product_master`.`product_id`
    , `product_master`.`product_price`
    , `product_master`.`lens_expiry`
    , `product_master`.`size`
    , `product_master`.`img`
    , `offers`.`offer_name`
    , `sub_category`.`sub_cat_name`
    , `product_color`.`color_name`
    , `brand`.`brand_name`
    , `product_master`.`product_details`
FROM
    `product_master`
    INNER JOIN `sub_category` 
        ON (`product_master`.`sub_cat_id` = `sub_category`.`sub_cat_id`)
    INNER JOIN `offers` 
        ON (`product_master`.`offer_id` = `offers`.`offer_id`)
    INNER JOIN `product_color` 
        ON (`product_master`.`color_id` = `product_color`.`color_id`)
    INNER JOIN `brand` 
        ON (`product_master`.`brand_id` = `brand`.`brand_id`) where `product_master`.`product_id` = '{$pid}'";

            $q = mysqli_query($connection, $proq)or die(mysqli_error($connection));


            $row = mysqli_fetch_array($q);
        }
        ?>
        <div class="page-container">
            <div class="main-content" style="background-image: url('img/bg.jpg')">

                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                        <div class="row">

                            <div class="col-lg-12">
                                

                                <div class="card" style="box-shadow: 0 0 10px rgba(0,0,0,0.4);">

                                        <div class="card-header">
                                            <strong>Product</strong>

                                        </div>
                                        <form method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="card-body card-block">

                                                <div class="row form-group">
                                                    <div class="col-4">
                                                        <label class=" form-control-label">Product Name</label>
                                                        <input type="text" name="pname" value="<?php echo $row['product_name']; ?>" class="form-control">
                                                    </div>
                                                    <div class="col-4">

                                                        <img style="margin-left: 140%;" src="<?php echo "user_site/" . "{$row['img']}"; ?>"  width="60%" >
                                                        <br>
                                                        <br>
                                                        <input style="margin-left: 140%;" type="file" name="photo" value="<?php echo $row['img']; ?>" class="form-group">

                                                    </div>


                                                </div>

                                                <div class="row form-group">                                           
                                                    <div class="col-8" style="margin-top: -7%;">
                                                        <label  class=" form-control-label">Product Details</label>
                                                        <textarea name="pdet"  class="form-control"><?php echo $row['product_details']; ?> </textarea>
                                                    </div>
                                                </div>

                                                <div class="row form-group">
                                                    <div class=" col-md-4" style="margin-top: .1%;">
                                                        <label  class=" form-control-label">Brand</label>
                                                        <select name='brand'  class="form-control">
                                                            <?php
                                                            $brand = mysqli_query($connection, "select * from brand where is_delete='0'")or die(mysqli_error($connection));

                                                            while ($rowbrand = mysqli_fetch_array($brand)) {

                                                                if ($rowbrand['brand_name'] == $row['brand_name']) {
                                                                    echo "<option value={$rowbrand['brand_id']} selected> {$rowbrand['brand_name']}</option>";
                                                                } else {
                                                                    echo "<option value={$rowbrand['brand_id']}> {$rowbrand['brand_name']}</option>";
                                                                }
                                                                
                                                            }
                                                            ?>
                                                        </select>


                                                    </div>



                                                    <div class=" col-md-4" style="margin-top: .1%;">
                                                        <label  class=" form-control-label">Color</label>
                                                        <select name='color'  class="form-control">
                                                            <?php
                                                            $color = mysqli_query($connection, "select * from product_color where is_delete='0'")or die(mysqli_error($connection));

                                                            while ($rowcolor = mysqli_fetch_array($color)) {
                                                                
                                                                if ($rowcolor['color_name'] == $row['color_name']) {
                                                                    echo "<option value={$rowcolor['color_id']} selected> {$rowcolor['color_name']}</option>";
                                                                } else {
                                                                    echo "<option value={$rowcolor['color_id']}> {$rowcolor['color_name']}</option>";
                                                                }
                                                               
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>

                                                    <div class="col-4" style="margin-top: .1%;">
                                                        <label  class=" form-control-label">Lens exp</label>
                                                        <select name="lexp"  class="form-control">
                                                            <option value=" ">None</option>
                                                            <option >Monthly</option>
                                                            <option >Weekly</option>
                                                            <option >Yearly</option>

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
                                                                
                                                                if ($rowsubcat['sub_cat_name'] == $row['sub_cat_name']) {
                                                                    echo "<option value={$rowsubcat['sub_cat_id']} selected> {$rowsubcat['sub_cat_name']}</option>";
                                                                } else {
                                                                    echo "<option value={$rowsubcat['sub_cat_id']}> {$rowsubcat['sub_cat_name']}</option>";
                                                                }
                                                               
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
                                                            <input type="text" name="price" value="<?php echo "{$row['product_price']}"; ?>" class="form-control">                                                      </div>
                                                    </div>
                                                    <div class=" col-md-4">
                                                        <label  class=" form-control-label">Offers</label>
                                                        <select name="offer" class="form-control">
                                                            <?php
                                                            $offerq = mysqli_query($connection, "select * from offers where is_active='1' ")or die(mysqli_error($connection));
                                                            while ($offerrow = mysqli_fetch_array($offerq)) {
                                                                
                                                                 if ($offerrow['offer_name'] == $row['color_name']) {
                                                                    echo "<option value={$offerrow['offer_id']} selected> {$offerrow['offer_name']}</option>";
                                                                } else {
                                                                    echo "<option value={$offerrow['offer_id']}> {$offerrow['offer_name']}</option>";
                                                                }
                                                                
                                                              
                                                                $disc = $offerrow['discount'];
                                                            }
                                                            ?>

                                                        </select>
                                                    </div>

                                                </div>






                                            </div>


                                            <div class="card-footer" align="center">
                                                <button type="submit" name="update" style="border:none; " class="btn btn-outline-success btn-lg">
                                                    <i class="fa fa-check-circle"  ></i> Submit
                                                </button>
                                                &nbsp;
                                                <button type="reset" style="border:none; "  class="btn btn-outline-danger btn-lg">
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
<?php include 'Side_Menu.php'; ?>
<?php
if (isset($_POST['update'])) {
    $pname = $_POST['pname'];
    $lens = $_POST['lexp'];
    $pdet = $_POST['pdet'];
    $path = "img/" . $_FILES['photo']['name'];
    $location = $_FILES['photo']['tmp_name'];

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

    if (isset($_FILES['photo']['name']) && !empty($_FILES['photo']['name'])) {

        $pro = mysqli_query($connection, "update product_master set product_name='{$pname}',product_details='{$pdet}',sub_cat_id='{$subcat1}',product_price='{$price}',lens_expiry='{$lens}',offer_id='{$offer}',color_id='{$color1}',brand_id='{$brand1}',size='{$size}',img='{$path}' where product_id='{$pid}'") or die(mysqli_error($connection));
        if ($pro) {
            $photo = move_uploaded_file($location, "user_site/" . $path);
            echo '<script> alert("Record Updated") </script>';
            header("location:Product_display.php");
        }
    } else {

        $pro = mysqli_query($connection, "update product_master set product_name='{$pname}',product_details='{$pdet}',sub_cat_id='{$subcat1}',product_price='{$price}',lens_expiry='{$lens}',offer_id='{$offer}',color_id='{$color1}',brand_id='{$brand1}',size='{$size}' where product_id='{$pid}'") or die(mysqli_error($connection));
        if ($pro) {
            echo '<script> alert("Record Updated") </script>';
            header("location:Product_display.php");
        }
    }
}
?>
