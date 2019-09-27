<html>
    <head>
        <title>Dashboard</title>
        <?php include 'head.php'; ?>
        <?php
        session_start();
       include './checklogin.php';
        ?>
        <style>


            .zoom {
                padding: 10px;
                transition: transform .2s;
                width: 100%;


            }

            .zoom:hover {

                transform: scale(1.5); 
            }
            .bounceInDown , .bounceInUp {animation-delay: .8s;}
        </style>
    </head>


    <body class="animsition">

        <?php include 'Header.php'; ?>

        <div class="page-container">
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">


                        <div class="row form-group" style="margin-top:-5%;">

                            
                                <div class="col-lg-3 animated bounceInDown">
                                    <div class="au-card recent-report">
                                        <a href="product_display.php">
                                            <img  src="images/8.png" width="100%" class="zoom" >
                                            <div class="au-card-inner">
                                                <br>

                                                <h2 class="title-2" align="center" >
                                                    Product 
                                                </h2> 

                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-3 animated bounceInDown">
                                    <div class="au-card recent-report">
                                        <a href="Employee_alldisplay.php">
                                            <br>
                                            <br>
                                            <img src="images/4.png" width="100%"class="zoom" >
                                            <div class="au-card-inner">
                                                <br>
                                                <br>
                                                <h2 class="title-2" align="center" >Employee</h2>
                                            </div>
                                        </a>
                                    </div>
                                </div>


                                <div class="col-lg-3 animated bounceInDown">
                                    <div class="au-card recent-report">
                                        <a href="Customer_alldisplay.php">
                                            <img src="images/5.png" width="100%" class="zoom" >
                                            <div class="au-card-inner">
                                                <br>
                                                <h2 class="title-2" align="center" >Customer</h2>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-3 animated bounceInDown">
                                    <div class="au-card recent-report">
                                        <a href="Area_display.php">
                                            <img src="images/3.png" width="100%" class="zoom" >
                                            <div class="au-card-inner">
                                                <br>
                                                <h2 class="title-2" align="center" >Area</h2>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                        
                            <div class="col-lg-3 animated bounceInUp">
                                <div class="au-card recent-report">
                                    <a href="Offers.php">
                                        <br>
                                        <img src="images/7.png" width="100%" class="zoom" >
                                        <div class="au-card-inner">
                                            <br>
                                            <br>
                                            <h2 class="title-2" align="center" >Offers</h2>
                                        </div>
                                    </a>
                                </div>
                            </div>


                            <div class="col-lg-3 animated bounceInUp">
                                <div class="au-card recent-report">
                                    <a href="#">
                                        <img src="images/2.png" width="100%" class="zoom" >
                                        <div class="au-card-inner">
                                            <br>
                                            <h2 class="title-2" align="center" >Appointment</h2>
                                        </div>
                                    </a>
                                </div>
                            </div>



                            <div class="col-lg-3 animated bounceInUp">
                                <div class="au-card recent-report">
                                    <a href="#">
                                        <img src="images/1.png" width="100%" class="zoom" >
                                        <div class="au-card-inner">
                                            <br>
                                            <h2 class="title-2" align="center" >Stock</h2>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-3 animated bounceInUp">
                                <div class="au-card recent-report">
                                    <a href="#">
                                        <img src="images/9.png" width="100%" class="zoom" >
                                        <div class="au-card-inner">
                                            <br>
                                            <h2 class="title-2" align="center" >Complain</h2>
                                        </div>
                                    </a>
                                </div>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </body>
    <?php include 'Script.php'; ?>
</html>
<?php include 'Side_Menu.php'; ?>