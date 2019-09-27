<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Product</title>
        <?php
        include 'head.php';
        ?>
    </head>

    <body class="animsition">

        <?php
        ob_start();
        session_start();
        include 'Header.php';
        include './connection.php';

        if (!isset($_GET['pid']) || empty($_GET['pid'])) {
            header("location:Product_display.php");
        }

        if (isset($_GET['pid'])) {

            $pid = $_GET['pid'];
            $proq = "SELECT
    `product_master`.`product_name`
    , `product_master`.`product_id`
    , `product_master`.`product_price`
    , `product_master`.`lens_expiry`
    , `product_master`.`size`
    , `product_master`.`img`
     , `product_master`.`offer_id`
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
        ON (`product_master`.`brand_id` = `brand`.`brand_id`) where `product_master`.`product_id` = '{$pid}'AND `product_master`.`is_delete`='0'";

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
                               

                                    <div class="card"style="box-shadow:0 0 10px  rgba(0,0,0,0.4); border-radius: 10px;">

                                        <div class="card-header">
                                            <strong>Product</strong>

                                        </div>
                                        <form method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="card-body card-block">

                                                <div class="row form-group">
                                                    <div class="col-4">
                                                        <label class=" form-control-label">Product Name</label>
                                                        <label class="form-control"><?php echo "{$row['product_name']}"; ?></label>
                                                    </div>
                                                    <div class="col-4">
                                                        <br>
                                                        <img style="margin-left: 140%;" src="<?php echo "user_site/" . "{$row['img']}"; ?>"  width="60%" >
                                                    </div>

                                                </div>

                                                <div class="row form-group">                                           
                                                    <div class="col-7">
                                                        <label  class=" form-control-label">Product Details</label>
                                                        <label class="form-control"><?php echo "{$row['product_details']}"; ?></label>                                                    </div>
                                                </div>
                                                
                                                <div class="row form-group">
                                                    <div class=" col-md-4">
                                                        <label  class=" form-control-label">Brand</label>
                                                        <label class="form-control"><?php echo "{$row['brand_name']}"; ?></label>


                                                    </div>



                                                    <div class=" col-md-4">
                                                        <label  class=" form-control-label">Color</label>
                                                        <label class="form-control"><?php echo "{$row['color_name']}"; ?></label>
                                                    </div>
                                                    <?php 
                                                    if($row['lens_expiry']="none")
                                                    {
                                                        echo "";
                                                    } 
                                                    else {
                                                         echo " <div class='col-4'>
                                                        <div class='form-group'>
                                                            <label  class='form-control-label'>Lens Expiry</label>
                                                            <label class='form-control'><?php echo {$row['lens_expiry']}; ?></label>

                                                        </div>
                                                    </div>" ; 
                                                        
                                                    }
                                                    ?>
                                                   
                                                </div>

                                                <div class="row form-group">

                                                    <div class=" col-md-4">
                                                        <label  class=" form-control-label">Sub Category</label>
                                                        <label class="form-control"><?php echo "{$row['sub_cat_name']}"; ?></label>


                                                    </div>
                                                    <div class=" col-md-4">
                                                        <label  class=" form-control-label">Size</label>
                                                        <label class="form-control"><?php echo "{$row['size']}"; ?></label>
                                                    </div>
                                                </div>

                                                <div class="row form-group">                                           
                                                    <div class="col-4">
                                                        
                                                        <div class="form-group">
                                                            <label  class=" form-control-label">Price </label>
                                                            <label class="form-control"><?php echo "{$row['product_price']}"; ?></label>                                                        </div>
                                                    </div>
                                                     <div class=" col-md-4">
                                                        <label  class=" form-control-label">Offers</label>
                                                        <label class="form-control"><?php echo "{$row['offer_name']}"; ?></label>
                                                    </div>
                                                    <div class="col-4">
                                                        
                                                        <div class="form-group">
                                                            
                                                            
                                                            <label  class=" form-control-label">Final Price </label>
                                                            <label class="form-control"><?php 
                                                
                                                $offerq = mysqli_query($connection,"select * from offers where offer_id='{$row['offer_id']}' ")or die(mysqli_error($connection));
                                                $offerrow = mysqli_fetch_array($offerq);                                              
                                                $disc=$offerrow['discount'];                                                
                                                $price=$row['product_price'];
                                                $oprice= ($price*$disc)/100;
                                                $fprice=$price-$oprice;
                                                if($disc>0)
                                                {
                                                    
                                                  echo $fprice;
                                                  
                                                } 
                                                else 
                                                {
                                                    echo "offer not avalible";
                                                }
                                                ?></label>                                                        </div>
                                                    </div>



                                                   



                                                    
                                                </div>  




                                                

                                            </div>
                                        </form>
                                    </div>
                              
                            </div>
                        </div>
                        <div class="md-fab-wrapper">
                            
                            <a class="md-fab md-fab-primary" href="<?php  $uid = $_GET['pid']; echo "Product_update.php?uid={$uid}"; ?>">
                                <button type="submit"></button>
                                <i class="material-icons">edit</i>
                            </a>
                            <a class="md-fab md-fab-primary" href="<?php echo "Product_delete.php?did=".$uid?>">
                                <button type="button"></button>
                                <i class="material-icons">delete</i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</body>

</html>
<?php include 'Side_Menu.php'; ?>
