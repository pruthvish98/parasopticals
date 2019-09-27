<!doctype html>
<html lang="en">
    <head>
        <title>Eye Test</title>
        <?php
        ob_start();
        include './css.php';
        include '../connection.php';
        include '../head.php';
        include '../Script.php';
        ?>
        <style>

            body{
                background: url(img/banner/banner-bg.jpg)no-repeat fixed;

            }
            .con1{

                border-radius: 10px;
                box-shadow: 0 0 30px  rgba(0,0,0,0.4);
            }

            .bt:hover{
                text-shadow: 0 10px 20px rgba(0,0,0,.4);
                transform: scale(1.5);
                transition: .4s;
            }
            .zoom:hover {

                transform: scale(1.3); 
                transition: .3s;
            }

        </style>

        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="js/cal1.js" type="text/javascript"></script>
        <script src="js/cal.js" type="text/javascript"></script>
        <link href="css/checkbox.css" rel="stylesheet" type="text/css"/>
        <link href="css/cal.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="js/jquery.validate.min.js" type="text/javascript"></script>

    </head>
    <body>

        <!--================Header Menu Area =================-->
        <?php include './header.php';  
        $_SESSION['url']="http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            include './checklogincust.php';
        
        ?>

        <!--================Header Menu Area =================-->

        <!--================Home Banner Area =================-->

        <!--================End Home Banner Area =================-->


        <section class="blog_area single-post-area p_120">
            <div class="container">
                <div class="modal fade" id="scrollmodal" tabindex="-1" role="dialog" aria-labelledby="scrollmodalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <form method="post">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="scrollmodalLabel">Select Any 5 Frames</h5>
                                    <!--
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="product_top_bar"style="border-radius: 50px; background-color: white;" align="left"  >
                                        <form method="get" class="form-control" style="border-radius: 25px;">
                                            <span>
                                                <input style="border-radius: 25px;border: none; height: 110%;"  type="text" autocomplete="off" class="md-input" name="search">
                                                <input style="border-radius: 25px; border: none;height: 100%; margin-bottom:3%;" id="scrollmodal" type="submit" value="Search"   data-toggle="modal" data-target="#scrollmodal" class="animated bounceInRight btn btn-outline-success btn-sm">                                 
        
                                            </span>
                                        </form>
                                    </div>
                                    -->
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>

                                </div>
                                <div class="modal-body">
                                    <p>
                                    <div class="col-lg-12">




                                        <div class="latest_product_inner row">
                                            <?php
                                            $sql = "SELECT  
                                                                                  `sub_category`.`cat_id`
                                                                                , `product_master`.`product_name`
                                                                                , `product_master`.`product_id`
                                                                                , `product_master`.`product_details`
                                                                                , `product_master`.`product_price`
                                                                                , `product_master`.`lens_expiry`
                                                                                , `product_master`.`sub_cat_id`   
                                                                                , `product_master`.`lens_expiry`
                                                                                , `product_master`.`offer_id`
                                                                                , `product_master`.`color_id`
                                                                                , `product_master`.`brand_id`
                                                                                , `product_master`.`size`
                                                                                , `product_master`.`img`    
                                                                                , `sub_category`.`sub_cat_name`
                                                                                , `sub_category`.`sub_cat_id`
                                                                                  FROM
                                                                                    `product_master`
                                                                                    INNER JOIN `sub_category`
                                                                                      ON (
                                                                                        `product_master`.`sub_cat_id` = `sub_category`.`sub_cat_id`
                                                                                      )where `sub_category`.`cat_id`= '1'AND `product_master`.`is_delete`='0'";
                                            $q = mysqli_query($connection, $sql)or die(mysqli_error($connection));
                                            $count = mysqli_num_rows($q);
                                            while ($row = mysqli_fetch_array($q)) {
                                                ?>

                                                <div class="col-lg-3 col-md-5 col-sm-6" >

                                                    <div class="f_p_item">                                       

                                                        <div class="pretty p-icon p-round p-pulse">
                                                            <input type="checkbox" name="check_box[]" value="<?php echo $row['product_id'] ?>" id="<?php echo $row['product_id'] ?>" />
                                                            <div class="state p-success">
                                                                <i class="mdi mdi-check"></i>
                                                                <label>Select</label>
                                                            </div>
                                                        </div>
                                                        <div class="f_p_img zoom">




                                                            <br>
                                                            <a href="<?php echo "single_product.php?pid={$row['product_id']}"; ?>">
                                                                <img style="width: 80%; border-radius: 7px;" class="img-fluid" src="<?php echo "{$row['img']}"; ?>">
                                                            </a>
                                                            <br>





                                                        </div>

                                                        <br>
                                                        <br>

                                                        <a href="<?php echo "single_product.php?pid={$row['product_id']}"; ?>"><h4><?php echo "{$row['product_name']} "; ?></h4></a>
                                                        <h6>₹ <?php echo "{$row['product_price']} "; ?></h6>

                                                    </div>
                                                    <hr>
                                                </div>

                                            <?php } ?>


                                        </div>



                                    </div>
                                    </p>
                                </div>
                                
                                <div class="modal-footer">

                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" name="eye" class="btn btn-primary">Confirm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 posts-list" >

                        <div class="comment-form con1 "style="background-color: #F2F2F2;">
                            <h4>Appointment for Eye test</h4>
                            <form method="post">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-6 " style="margin-left: 25%;">
                                            <div class="form-group">
                                                <div  class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                                    <input style="border-radius: 25px;" name="date" type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1"/>

                                                    &nbsp;
                                                    <span style="border-radius: 25px; background-color:white;" class="input-group-addon" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                                        <span class="fa fa-calendar"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-6" style="margin-left: 25%;">

                                            <!-- Button trigger modal -->

                                            <button type="button" class="btn btn-secondary  mb-2 " data-toggle="modal" data-target="#scrollmodal">
                                                Select Frames
                                            </button>



                                        </div>

                                    </div>
                                    <?php
                                    
                                        $temparr = array();
                                    if (isset($_POST['eye'])) {

                                        if (!empty($_POST['check_box'])) {
                                            $i = 0;
                                            
                                            foreach ($_POST['check_box'] as $value) {
                                            
                                            $temparr[] = $value;
                                                $i++;
                                                $q1 = mysqli_query($connection, "select * from product_master where product_id={$value}");
                                                $selected = mysqli_fetch_array($q1);
                                                
                                                    echo "<img src='{$selected['img']}'/ width='10%'>  {$selected['product_name']} <a href=''><i style='padding-right:20px;padding-left:20px;background:none; border:none;' data-toggle='tooltip' data-placement='top' title='Delete' class='gray_btn zoom'><i class='lnr lnr-cross-circle'></i></i></a><br> <br/>";
                                               
                                            }
                                        }
                                    }
                                    
                                    $var = implode(",", $temparr);
                                   
                                    ?>
                                    <input type="hidden" name="arr" value="<?php echo $var ?>">
                                    
                                </div>

                                <br>
                                <button name="btn" class="genric-btn success circle bt" type="submit" style="box-shadow: 0 11px 10px rgba(33,33,33,.2);border-radius: 25px;">Submit</button>	

                            </form>
                        </div>
                    </div>
                </div>
            </div>







        </section>
         <section class="blog_area single-post-area p_120" >
            <div class="container">
                <div class="row">

                    <div class="card" style="width: 100%;border: none; background: transparent; ">
                        <div class="card-header" style="border-radius: 25px; background-color: #F2F2F2;box-shadow: 0 10px 10px rgba(0,0,0,0.4);">
                            <div align="center"> 

                                <label class="form-control-label" style=" font-size: 13pt; color: black;" > My Eye Test Appoinment & 5 Frame</label>

                            </div>


                        </div>
                        <br>
                        <table>
                            <thead style="background-color: #ED6B11;  color: white; ">
                                <tr >
                                    <th style="border: none;  text-align: center;">Date</th>
                                    <th style="border: none;  text-align: center;">Frames</th>
                                    <th></th>
                                    <th style="border: none;  text-align: center;">Frames</th>
                                    <th></th>
                                    <th style="border: none;  text-align: center;">Frames</th>
                                    <th></th>
                                    <th style="border: none;  text-align: center;">Frames</th>
                                    <th></th>
                                    <th style="border: none;  text-align: center;">Frames</th>
                                     <th></th>
                                    <th style="border: none;  text-align: center;">Status</th>
                                    
                                   

                                    

                                </tr>
                            </thead>
                            <tbody>
                                
                                                <?php
                                                $appq = "SELECT  *  FROM  `appointment`  
                                                INNER JOIN `customer`
                                                  ON (`appointment`.`customer_id` = `customer`.`customer_id`)where `appointment`.`customer_id`='{$_SESSION['c_id']}' ";


                                                 $q = mysqli_query($connection, $appq)or die(mysqli_error($connection));
                                             
                                            while ($row = mysqli_fetch_array($q)) {
                                                echo "<tr style='background-color: #F2F2F2;'>";
                                                echo "<td style='text-align: center;'>". $row['app_date']."</td>";
                                                $frame = array($row['frame1'], $row['frame2'], $row['frame3'], $row['frame4'], $row['frame5']); 
                                                
                                               
                                                foreach ($frame as $key => $value) {
                                                    $proq = mysqli_query($connection, "select * from product_master where product_id='{$value}'");
                                                    $rowpro = mysqli_fetch_array($proq);

                                                    echo "<td aligh='center'><img src='{$rowpro['img']}'width=100%><br><div style='text-align: center;'>{$rowpro['product_name']}</div><td>";
                                                    echo "";
                                                }
                                                   echo "<td style='text-align: center;'>". $row['status']."</td>";
                                                
                                            }
                                                ?>
                               





                            </tbody>
                        </table>
                        <!--
                                                <div class="card-footer">
                        
                                                    <div align="left"> 
                        
                                                        <label class="form-control-label" style=" padding: 5px; font-size: 11pt;color: black;" >Order On :</label>
                                                        <label class="form-control-label" style=" font-size: 10pt;color: black;" >Wed,Sep 13th </label>
                        
                        
                        <?php echo str_repeat("&nbsp;", 240); ?>
                        
                        
                        
                                                        <strong>
                                                            <label class="form-control-label" style=" font-size: 13pt;color: black;" >Total :</label>
                                                            <label class="form-control-label" style=" font-size: 12pt; color: black;" >1000 </label>
                                                        </strong>
                        -->

                    </div>

                </div>
            </div>




        </div>
    </div>
</section>




        <!--================ start footer Area  =================-->	

        <?php include './footer.php'; ?>

        <!--================ End footer Area  =================-->



        <?php include './script.php'; ?>
    </body>
  
    <script>
                    var array = [];
                $("input").change(function () {
                    if ($(this).is(":checked")) {
                        array.push(this.id);
                        if (array.length > 5) {
                            array.splice(0, 1);
                        }
                        $("input").prop("checked", false);
                        for (var i = 0; i < array.length; i++) {
                            $("#" + array[i]).prop("checked", true);
                        }
                    }
                    else {
                        var index = array.indexOf(this.id);
                        array.splice(index, 1);
                    }
                });
    </script>
</html>
<?php

include '../check-data.php';
if (isset($_POST['btn'])) {
    $date = $_POST['date'];    
    $customer = $_SESSION['c_id'];
    $var = $_POST['arr'];

$a = explode(",", $var);
 $no1 = $a[0];
 $no2 = $a[1];
 $no3 = $a[2];
 $no4 = $a[3];
 $no5 = $a[4];



//print_r($var);
 
    
$check = checkdata($connection, "appointment", "app_date", $date);

if ($check) {

    $q = mysqli_query($connection, "insert into appointment(customer_id,app_date,frame1,frame2,frame3,frame4,frame5,emp_id,status) values ('{$customer}','{$date}','{$no1}','{$no2}','{$no3}','{$no4}','{$no5}','0','Pending')") or die(mysqli_error($connection));
    if ($q) {
       echo '<script> alert("Record Inserted") </script>';
    }
    } else {
        echo '<script> alert("Data Already Exits") </script>';
    }
}
?>



