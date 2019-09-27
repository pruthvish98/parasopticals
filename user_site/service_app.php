<!doctype html>
<html lang="en">
    <head>

        <title>Services</title>
        <?php
        ob_start();
        include './css.php';
       
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
        </style>

        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="js/cal1.js" type="text/javascript"></script>
        <script src="js/cal.js" type="text/javascript"></script>
        <link href="css/cal.css" rel="stylesheet" type="text/css"/>




    </head>
    <body>
        

        <!--================Header Menu Area =================-->
        <?php
        include './header.php';
         $_SESSION['url']="http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            require  'checklogincust.php';
        include '../connection.php';

        $ab = "SELECT *FROM `service` where customer_id='{$_SESSION['c_id']}' ";



        $q = mysqli_query($connection, $ab)or die(mysqli_error($connection));
        ?>

        <!--================Header Menu Area =================-->

        <!--================Home Banner Area =================-->

        <!--================End Home Banner Area =================-->


        <br>
        <br>
        <br>
        <section class="blog_area single-post-area p_120" >
            <div class="container">
                <div class="row">

                    <div class="card" style="width: 100%;border: none; background: transparent; ">
                        <div class="card-header" style="border-radius: 25px; background-color: #F2F2F2;box-shadow: 0 10px 10px rgba(0,0,0,0.4);">
                            <div align="center"> 

                                <label class="form-control-label" style=" font-size: 13pt; color: black;" > My Services</label>

                            </div>


                        </div>
                        <br>
                        <table>
                            <thead style="background-color: #ED6B11;  color: white; ">
                                <tr >
                                    <th style=" border: none; text-align: center; font-size: 12pt;" scope="col">Service Detail</th>

                                    <th style="border: none;text-align: center; font-size: 12pt;"scope="col">Date</th>

                                    <th style="border: none;text-align: center; font-size: 12pt;" scope="col">Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_array($q)) {
                                    ?>
                                    <tr>
                                        <td  style="border: none;text-align: center; color: black; background-color: #F2F2F2;">
                                            <label><?php echo "{$row['details']}"; ?></label>
                                            
                                        </td>

                                        <td style="border: none;text-align: center;color: black;  background-color: #F2F2F2;">
                                            <label><?php echo "{$row['date']}"; ?></label>
                                        </td>

                                        <td style="border: none;text-align: center; color: black; background-color: #F2F2F2;">
                                            <label><?php echo "{$row['status']}"; ?></label>
                                        </td>

                                    </tr>
                                <?php } ?>





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
            <div class="col-lg-12 posts-list" >

                <div class="comment-form con1 "style="background-color: #F2F2F2;">
                    <h4>Appointment for Repairing</h4>
                    <form method="post" >



                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6" style="margin-left: 25%;">
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
                                    <textarea class="form-control " style="border-radius: 10px;" rows="4" name="detail" placeholder="Type Here...." required="true"></textarea>
                                </div>
                            </div>
                        </div>

                        <br>
                        <button name="btn" class="genric-btn success circle bt" type="submit" style="box-shadow: 0 11px 10px rgba(33,33,33,.2);border-radius: 25px;">Submit</button>	

                    </form>
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
</html>







<?php


if (isset($_POST['btn'])) {
    $date = $_POST['date'];
    $detail = $_POST['detail'];
    $customer = $_SESSION['c_id'];

    $q = mysqli_query($connection, "insert into service(customer_id,date,details,status) values ('{$customer}','{$date}','{$detail}','Pending')") or die(mysqli_error($connection));
    if ($q) {
        echo '<script> alert("Record Inserted") </script>';
    }
}
?>



