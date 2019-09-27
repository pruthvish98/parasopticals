<!doctype html>
<html lang="en">
    <head>

        <title>Appointment</title>
        <?php
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
                border:none;
            }

            .bt:hover{
                text-shadow: 0 10px 20px rgba(0,0,0,.4);
                transform: scale(1.5);
                transition: .4s;
            }
            .zoom:hover {
                transition: 1s;
                transform: scale(1.1); 
            }

        </style>


    </head>
    <body>

        <!--================Header Menu Area =================-->
        <?php include './header.php'; ?>

        <!--================Header Menu Area =================-->

        <!--================Home Banner Area =================-->

        <!--================End Home Banner Area =================-->

        <br>
        <br>
        <br>



        <section class="blog_area single-post-area p_120">

            <div class="container">
                <div class="row">
                    <div class="row hot_product_inner"  >


                        <div class="col-lg-6">
                            <div class="hot_p_item zoom">
                                <div data-aos="fade-right" data-aos-easing="ease-out-cubic" data-aos-duration="1800" >
                                    <a href="Eye_test_app.php">  <img class="img-fluid" src="img/eyetest.jpeg" style="box-shadow: 0 0 30px rgba(0,0,0,.5); border-radius: 7px; height: 80%; width: 70%; margin-left: 27%;  "></a>

                                    <div>
                                        
                                        <label style="font-size: 15pt; color: black;margin-left: 55%;margin-top: 2%">Eye Test</label>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="hot_p_item zoom"  >
                                <div data-aos="fade-left" data-aos-easing="ease-out-cubic" data-aos-duration="1500">
                                    <a href="service_app.php"> <img class="img-fluid" src="img/repair.jpg" style="box-shadow: 0 0 30px rgba(0,0,0,.5);border-radius: 7px; height: 80%; width: 70%;"></a>
                                   
                                    <div>
                                        <label  style="font-size: 15pt; color: black;margin-left:30%;margin-top: 2%">Services</label>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </section>


        <!--================ start footer Area  =================-->	


        <!--================ End footer Area  =================-->



        <?php include './script.php'; ?>
    </body>

</html>

