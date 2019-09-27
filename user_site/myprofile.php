<!doctype html>
<html lang="en">
    <head>

        <title>My Profile</title>
        <?php
        ob_start();
        include './css.php';
        include '../connection.php';
        
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


    </head>
    <body>

        <!--================Header Menu Area =================-->
        <?php include './header.php'; 
        $_SESSION['url']="http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            require  'checklogincust.php';?>

        <!--================Header Menu Area =================-->
        <?php
        
        $q = mysqli_query($connection, "select * from customer where customer_id = {$_SESSION['c_id']}")or die(mysqli_error($connection));
        $count = mysqli_num_rows($q);
        $row = mysqli_fetch_array($q);
        ?>
        <!--================Home Banner Area =================-->

        <!--================End Home Banner Area =================-->


        <section class="blog_area single-post-area p_120">
            <div class="container">
                <div class="row">


                    <div class="col-lg-12">
                        <div class="blog_right_sidebar" style=" background-color: #F2F2F2;border-radius: 10px; box-shadow: 0 0 30px   rgba(0,0,0,0.4);">
                            <aside class="single_sidebar_widget author_widget">
                                <h4><?php
                                    if (isset($_SESSION['c_name'])) {
                                        echo $_SESSION['c_name'];
                                    } else {
                                        echo "Login";
                                    }
                                    ?></h4>
                                <div class="br"></div>
                            </aside>
                            <div style="margin-left: 5.4%;">


                                <a href="myprofile.php"><button class="genric-btn success circle bt"style="box-shadow: 0 10px 10px rgba(33,33,33,.2);border-radius: 25px; background-color: #ED6B11; color: white; border: none;"><i class="fa fa-exclamation"></i> &nbsp; Edit Profile</button></a>
                                &nbsp;
                                &nbsp;
                                &nbsp;
                                &nbsp;
                                
                                <a href="compalin.php"><button class="genric-btn success circle bt"style="box-shadow: 0 11px 10px rgba(33,33,33,.2);border-radius: 25px;background-color: #ED6B11; color: white; border: none;"><i class="fa fa-map-signs"></i> &nbsp; Complain</button></a>
                                &nbsp;
                                &nbsp;
                                &nbsp;
                                &nbsp;
                                
                                

                            </div>





                        </div>
                    </div>




                    <div class="col-lg-12 posts-list">
                        <div class="comment-form "style="border-radius: 10px; box-shadow: 0 0 20px rgba(0,0,0,0.4); background-color: #F2F2F2;">
                            <h4>Personal Information</h4>

                            <form method="post">
                                <div class="form-group form-inline">
                                    <div class="form-group col-lg-6 col-md-6 name">
                                        <input type="hidden" class="form-control" name="cid" value="<?php echo "{$row['customer_id']}"; ?>" required="true">
                                        <input type="text" class="form-control" name="name" value="<?php echo "{$row['customer_name']}"; ?>" required="true">
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 email">
                                        <input type="text" class="form-control" name="mo" value="<?php echo "{$row['mobile']}"; ?>"  required="true">
                                    </div>										
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email"  value="<?php echo "{$row['email']}"; ?>" required="true">
                                </div>
                                <div class="form-group">
                                    <input type="date" class="form-control" name="dob"  value="<?php echo "{$row['dob']}"; ?>" required="true">
                                </div>
                                <div class="form-group">
                                <div style="height: 50px; border: none;  " class="form-control">
                                    <div class="single-element-widget">
                                        <div class="default-select">
                                           
                                                <?php       
                                                                 if ($row['gender']== 'Male') {
                                                                    echo "<input type='radio' name='gender' value='Male' checked> Male</option>";
                                                                    echo "<input type='radio' name='gender' value='Female' > Female</option>";
                                                                                                                                      
                                                                } else {
                                                                     echo "<input type='radio' name='gender' value='Male'> Male";
                                                                    echo "<input type='radio' name='gender' value='Female' checked> Female";
                                                                    
                                                                }
                                                            
                                                            ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="address"   required="true"> <?php echo "{$row['address']}"; ?></textarea>
                                </div>
                                <div style="height: 50px; border: none;  " class="form-control">
                                    <div class="single-element-widget">
                                        <div class="default-select">
                                            <select name="area"   required="true">
                                                <?php
                                                            $areaq = mysqli_query($connection, "select * from area  ")or die(mysqli_error($connection));
                                                            while ($arearow = mysqli_fetch_array($areaq)) {
                                                                
                                                                 if ($arearow['area_id'] == $row['area_id']) {
                                                                    echo "<option value={$arearow['area_id']} selected> {$arearow['area_name']}</option>";
                                                                } else {
                                                                    echo "<option value={$arearow['area_id']}> {$arearow['area_name']}</option>";
                                                                }
                                                                
                                                              
                                                            }
                                                            ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" name="update" class="genric-btn success circle bt"style="box-shadow: 0 11px 10px rgba(33,33,33,.2); border:none; border-radius: 25px;">Submit</button>
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


if (isset($_POST['update'])) {
    $cid = $_POST['cid'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mo'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $add = $_POST['address'];
    $area = $_POST['area'];

    $q = mysqli_query($connection, "update customer set customer_name= '{$name}' ,mobile='{$mobile}', dob='{$dob}' , gender='{$gender}' , email='{$email}', address='{$add}', area_id='{$area}' where customer_id ='{$cid}'") or die(mysqli_error($connection));
    if ($q) {
        $_SESSION['name'] = $name;
        echo '<script> alert("Record updated") </script>';
        header("location:myprofile.php");
    }
}
?>


