


<!doctype html>
<html lang="en">
    <head>

        <title>Complain</title>
        <?php
        include './css.php';
        ?>
        <style>
            body{
                background: url(img/banner/banner-bg.jpg)no-repeat fixed;

            }
            .bt:hover{
                text-shadow: 0 10px 20px rgba(0,0,0,.4);
                transform: scale(1.5);
                transition: .4s;}
            </style>


        </head>
        <body>

            <!--================Header Menu Area =================-->
            <?php
            include './header.php';
            include '../connection.php';
            ?>

            <?php
            if (isset($_POST['complain'])) {
                $detail = $_POST['detail'];
                $name = $_SESSION['c_id'];


                $q = mysqli_query($connection, "insert into complain(customer_id,complain_details) values ('{$name}','{$detail}')") or die(mysqli_error($connection));
                if ($q) {
                    echo '<script> alert("Complain Registerd") </script>';
                }
            }
            ?>

            <?php
            $abc = "SELECT
  `product_master`.`product_name`,
  `product_master`.`product_id`,
  `complain`.`complain_details`,
  `complain`.`complain_date`
FROM
  `product_master`,
  `complain`;


";

            $query1 = mysqli_query($connection, $abc)or die(mysqli_errno($connection));
            $row = mysqli_fetch_array($query1);
            ?>

            <!--================Home Banner Area =================-->
            <br>
            <br>
            <br>
            <!--================End Home Banner Area =================-->

            <section class="blog_area single-post-area p_120" >
            <div class="container">
                <div class="row">
                    <div class="card" style="width: 100%;border: none; background: transparent; ">
                        <div class="card-header" style="border-radius: 25px; background-color: #F2F2F2;box-shadow: 0 10px 10px rgba(0,0,0,0.4);">
                            <div align="center"> 

                                <label class="form-control-label" style=" font-size: 13pt; color: black;" > My Comaplian</label>

                            </div>


                        </div>
                        <br>
                        <table>
                            <thead style="background-color: #ED6B11;  color: white; ">
                                <tr >
                                    <th style=" border: none; text-align: center; font-size: 12pt;" scope="col">Product Name</th>

                                    <th style="border: none;text-align: center; font-size: 12pt;"scope="col">Complain Details</th>

                                    <th style="border: none;text-align: center; font-size: 12pt;" scope="col">Date</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="border: none;text-align: center; color: black;">
                                        <label><?php echo "{$row['product_name']}"; ?></label>
                                    </td>

                                    <td style="border: none;text-align: center;color: black;">
                                        <label><?php echo "{$row['complain_details']}"; ?></label>
                                    </td>

                                    <td style="border: none;text-align: center; color: black;">
                                        <label><?php echo "{$row['complain_date']}"; ?></label>
                                    </td>

                                </tr>





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
<section class="blog_area single-post-area p_120">
    <div class="container">
        <div class="row">

            <?php include './myprofile_card.php'; ?>


            <div class="col-lg-12 posts-list"  >
                <div class="comment-form con1 "style="background-color: #F2F2F2;border-radius: 10px; box-shadow: 0 0 20px rgba(0,0,0,0.4);">
                    <h4>Complaint</h4>
                    <form method="post" >

                        <div class="form-group">
                            <textarea class="form-control " rows="4" name="detail" placeholder="Address" required="true"></textarea>
                        </div>
                        <button name="complain" class="genric-btn success circle bt"style="box-shadow: 0 11px 10px rgba(33,33,33,.2);border-radius: 25px;">Submit</button>	

                    </form>
                </div>
            </div>

        </div>
    </div>
</section>





<?php include './footer.php'; ?>
<?php include './script.php'; ?>
</body>
</html>
