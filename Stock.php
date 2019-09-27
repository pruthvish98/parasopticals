
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Product All Display</title>
        <?php
        include 'head.php';
        ob_start();
        session_start();
        include 'checklogin.php';
        ?>
        <style>
            .zoom:hover {

                transform: scale(1.1); 
                transition: .9s;
            }
             .bt:hover{text-shadow:0 10px 10px rgba(0,0,0,0.4); }
        </style>
    </head>
    <?php include 'Header.php'; ?>

    <body class="animsition">



        <?php
        include './connection.php';
        ?>
        <div class="page-container">
            <div class="main-content">
                <div class="section__content section__content--p30">
                    
                    <br>
                    <div class="row">



                        <?php
                        
                        
                        if(isset($_GET['search'])){
                            
                            $search=$_GET['search'];
    
                                                $proq = "SELECT * FROM      
                                                    `product_master`   
                                                    INNER JOIN `sub_category` 
                                                    ON (`product_master`.`sub_cat_id` = `sub_category`.`sub_cat_id`)
                                                INNER JOIN `product_color` 
                                                    ON (`product_master`.`color_id` = `product_color`.`color_id`)
                                                INNER JOIN `offers` 
                                                    ON (`product_master`.`offer_id` = `offers`.`offer_id`)
                                                INNER JOIN `brand` 
                                                    ON (`product_master`.`brand_id` = `brand`.`brand_id`)where `product_master`.`product_name` OR `product_color`.`color_name` OR `brand`.`brand_name` like '%{$search}%' AND `product_master`.`is_delete`='0' ";
                       

                                                }else {
                                                    $proq = "SELECT*  FROM
                                                `product_master`
                                                INNER JOIN `sub_category` 
                                                    ON (`product_master`.`sub_cat_id` = `sub_category`.`sub_cat_id`)
                                                INNER JOIN `product_color` 
                                                    ON (`product_master`.`color_id` = `product_color`.`color_id`)
                                                INNER JOIN `offers` 
                                                    ON (`product_master`.`offer_id` = `offers`.`offer_id`)
                                                INNER JOIN `brand` 
                                                    ON (`product_master`.`brand_id` = `brand`.`brand_id`) AND `product_master`.`is_delete`='0'";
                                                     }
                        $q = mysqli_query($connection, $proq)or die(mysqli_error($connection));

                        $count = mysqli_num_rows($q);
                        while ($row = mysqli_fetch_array($q)) {
                            ?>

                            <div class="col-md-3">
                                <div class="card zoom" style="border-radius: 10px; box-shadow: 0 0 12px  rgba(0,0,0,.2);">
                                    <div class="card-header">
                                        <strong class="card-title mb-3">Product</strong>
                                    </div>

                                   


                                    <div class="card-body ">

                                        <div class="mx-auto d-block">
                                            <a href="<?php echo "Product_Single_display.php?pid={$row['product_id']}"; ?>">
                                                <img style="margin-left: 25%;" src="<?php echo "./user_site/" . "{$row['img']}"; ?>"  width="50%" >
                                            </a> 

                                            <h5 class="text-sm-center mt-2 mb-1">
                                                <strong>
                                                    <?php
                                                    echo " {$row['product_name']} ";
                                                    ?>
                                                </strong>
                                            </h5>

                                            <div class="location text-sm-center">
                                                <?php echo " {$row['sub_cat_name']} "; ?></div>
                                        </div>
                                        <hr>
                                        <div class="location text-sm-center">
                                             <label class="form-control-label"> Stock :
                                                <?php echo "{$row['qty']}"; ?>
                                             </label><br>
                                            
                                           



                                            


                                            




                                        </div>

                                    </div>

                                </div>

                            </div>
                        <?php } ?>
                    </div>




                </div>



            </div>
        </div>

    




    </body>


</html>
<?php include 'Side_menu.php'; ?>
