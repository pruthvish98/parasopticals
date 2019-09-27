<html>            
    <head>
        <?php
        include 'head.php';
         include 'checklogin.php';
        include '../connection.php';
        $noti = mysqli_query($connection, "select * from `service` 
                INNER JOIN `customer`
                ON(`service`.`customer_id`=`customer`.`customer_id`)where `service`.`status`='Pending' AND `service`.`emp_id`='{$_SESSION['id']}' order by service_id DESC")or die(mysqli_error($connection));

        $count1 = mysqli_num_rows($noti);
        $_SESSION['noti'] = array();
        $_SESSION['noti_date'] = array();
        $cnt = 0;
        while ($rownoti = mysqli_fetch_array($noti)) {

            $_SESSION['noti'][$cnt] = $rownoti['customer_name'];
            $_SESSION['noti_date'][$cnt] = $rownoti['date'];
            $cnt++;
        }
        $notiq = mysqli_query($connection, "SELECT  *
                                               
                                                            FROM `sales_order` INNER JOIN `customer` 
                                                            ON (`sales_order`.`customer_id` = `customer`.`customer_id`)
                                                            INNER JOIN `delivery` 
                                                            ON (`sales_order`.`sales_order_id` = `delivery`.`sales_order_id`)where `delivery`.`delivery_status`='Accepted' AND `delivery`.`emp_id`='{$_SESSION['id']}' ")or die(mysqli_error($connection));

        $count2 = mysqli_num_rows($notiq);
        $_SESSION['noti_a'] = array();
        $_SESSION['noti_date_a'] = array();
        $cnt = 0;
        while ($rownotiq = mysqli_fetch_array($notiq)) {

            $_SESSION['noti_a'][$cnt] = $rownotiq['customer_name'];
            $_SESSION['noti_date_a'][$cnt] = $rownotiq['sales_order_date'];
            $cnt++;
        }
        $notiappq = mysqli_query($connection, "SELECT  *
                                               
                                                            FROM `appointment` INNER JOIN `customer` 
                                                            ON (`appointment`.`customer_id` = `customer`.`customer_id`)
                                                            INNER JOIN `emp` 
                                                            ON (`appointment`.`emp_id` = `emp`.`emp_id`)where `emp`.`emp_id`='{$_SESSION['id']}' AND `appointment`.`status`='Accepted'")or die(mysqli_error($connection));

        $count3 = mysqli_num_rows($notiappq);
        $_SESSION['noti_app'] = array();
        $_SESSION['noti_date_app'] = array();
        $cnt = 0;
        while ($rownotiappq = mysqli_fetch_array($notiappq)) {

            $_SESSION['noti_app'][$cnt] = $rownotiappq['customer_name'];
            $_SESSION['noti_date_app'][$cnt] = $rownotiappq['app_date'];
            $cnt++;
        }
        
        ?>
    </head>


    <body>
        <header class="header-desktop">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="header-wrap">
                        <form class="form-header"  action="Stock.php" method="get">
                            <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for Product..." />
                            <button class="au-btn--submit" type="submit">
                                <i class="zmdi zmdi-search"></i>
                            </button>
                        </form>
                        <div class="header-button">
                            <div class="noti-wrap">


                                <div class="noti__item js-item-menu">
                                    <i class="zmdi zmdi-notifications"></i>
                                    <span class="quantity"><?php echo $count=$count1+$count2+$count3; ?></span>
                                    <div class="notifi-dropdown js-dropdown">
                                        <div class="notifi__title">
                                            <p>You have <?php 
                                            
                                       
                                            echo $count ?> Notifications</p>
                                        </div>
                                        
                                        <a href="service.php">
                                            <?php
                                            foreach ($_SESSION['noti'] as $key => $value) {
                                                echo " <div class='notifi__item'><div class='bg-c1 img-cir img-40'>
                                                <i class='zmdi zmdi-settings'></i>
                                            </div>";


                                                $date = $_SESSION['noti_date'][$key];


                                                echo "<div class='content'>
                                                <p>$value</p>
                                                <span class='date'>$date</span>
                                            </div></div>";
                                            }
                                            ?>
                                            </a>
                                        <a href="Delivery.php">
                                            <?php
                                            foreach ($_SESSION['noti_a'] as $key => $value) {
                                                echo " <div class='notifi__item'><div class='bg-c1 img-cir img-40'>
                                                <i class='zmdi zmdi-truck'></i>
                                            </div>";


                                                $date = $_SESSION['noti_date_a'][$key];


                                                echo "<div class='content'>
                                                <p>$value</p>
                                                <span class='date'>$date</span>
                                            </div></div>";
                                            }
                                            ?>
                                        </a><br>
                                        <a href="Eye_test.php">
                                            <?php
                                            foreach ($_SESSION['noti_app'] as $key => $value) {
                                                echo " <div class='notifi__item'><div class='bg-c1 img-cir img-40'>
                                                <i class='zmdi zmdi-eye'></i>
                                            </div>";


                                                $date = $_SESSION['noti_date_app'][$key];


                                                echo "<div class='content'>
                                                <p>$value</p>
                                                <span class='date'>$date</span>
                                            </div></div>";
                                            }
                                            ?>
                                            </a>


                                        

                                        <div class="notifi__footer">
                                            <a href="#"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="account-wrap">
                                <div class="account-item clearfix js-item-menu">
                                    <div class="image">
                                      
                                    </div>
                                    <div class="content">
                                        <a class="js-acc-btn" href="#">
<?php echo $_SESSION['fname']; ?>                                                   

                                        </a>
                                    </div>
                                    <div class="account-dropdown js-dropdown">
                                        <div class="info clearfix">
                                           
                                            <div class="content">
                                                <h5 class="name">
                                                    <a href="#"><?php
echo $_SESSION['fname'] . '&nbsp';
echo $_SESSION['lname'];
?></a>
                                                </h5>
                                                <span class="email"><?php echo $_SESSION['email'] ?></span>
                                            </div>
                                        </div>
                                        <div class="account-dropdown__body">

                                            <div class="account-dropdown__item">
                                                <a href="#">
                                                    <i class="zmdi zmdi-settings"></i>Profile Manage</a>
                                            </div>

                                        </div>
                                        <div class="account-dropdown__footer">
                                            <a href="./logout.php">
                                                <i class="zmdi zmdi-power"></i>Logout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
<?php include 'Script.php'; ?>
    </body>
</html>