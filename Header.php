<html>            
    <head>
        <?php
        
        include 'Head.php'; 
        include './confirm-delete.php';
        include 'head.php';
        include 'checklogin.php';
        include './connection.php';
        $notiq = mysqli_query($connection, "SELECT  *
                                               
                                                            FROM `sales_order` INNER JOIN `customer` 
                                                            ON (`sales_order`.`customer_id` = `customer`.`customer_id`)
                                                            INNER JOIN `delivery` 
                                                            ON (`sales_order`.`sales_order_id` = `delivery`.`sales_order_id`)where `delivery`.`delivery_status`='Pending' ")or die(mysqli_error($connection));

        $count = mysqli_num_rows($notiq);
        $_SESSION['noti_p'] = array();
        $_SESSION['noti_date_p'] = array();
        $cnt = 0;
        while ($rownotiq = mysqli_fetch_array($notiq)) {

            $_SESSION['noti_p'][$cnt] = $rownotiq['customer_name'];
            $_SESSION['noti_date_p'][$cnt] = $rownotiq['sales_order_date'];
            $cnt++;
        }
       
        ?>
      
    </head>
<?php


?>

    <body >
        <header class="header-desktop">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="header-wrap">
                        <form class="form-header"  action="Product_display.php" method="get">
                            <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for Product..." />
                            <button class="au-btn--submit" type="submit">
                                <i class="zmdi zmdi-search"></i>
                            </button>
                        </form>
                        <div class="header-button">
                            <div class="noti-wrap">
                               
                                <div class="noti__item js-item-menu">
                                    <i  class="zmdi zmdi-notifications"></i>
                                    <span class="quantity"><?php echo $count ?></span>
                                    <div class="notifi-dropdown js-dropdown">
                                        <div class="notifi__title">
                                            <p>You have <?php echo $count ?> Notifications</p>
                                        </div>
                                        <a href="service.php">
                                            <?php
                                            foreach ($_SESSION['noti_p'] as $key => $value) {
                                                echo " <div class='notifi__item'><div class='bg-c1 img-cir img-40'>
                                                <i class='zmdi zmdi-email-open'></i>
                                            </div>";


                                                $date = $_SESSION['noti_date_p'][$key];


                                                echo "<div class='content'>
                                                <p>$value</p>
                                                <span class='date'>$date</span>
                                            </div></div>";
                                            }
                                            ?>
                                            </a>
                                        <div class="notifi__footer">
                                            <a href="#">All notifications</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="account-wrap">
                                <div class="account-item clearfix js-item-menu">
                                    <div class="image">
                                        <a>
                                      
                                        <img src="<?php //echo $_SESSION['photo'] ; ?>" />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <a class="js-acc-btn" href="#">
                                         
                                           <?php     
                                                        echo $_SESSION['a_name'] ; 
                                                        
                                                        ?>
                                        </a>
                                    </div>
                                    <div class="account-dropdown js-dropdown">
                                        <div class="info clearfix">
                                            <div class="image">
                                                <a href="#">
                                                    <img src="<?php echo $_SESSION['photo'] ; ?>" />
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h5 class="name">
                                                    <a href="#"><?php                                                         
                                                        echo $_SESSION['a_name'] ; 
                                                        
                                                        ?></a>
                                                </h5>
                                                <span class="email"><?php echo $_SESSION['a_email'] ?></span>
                                            </div>
                                        </div>
                                        <div class="account-dropdown__body">

                                            <div class="account-dropdown__item">
                                                <a href="<?php echo "Admin_update.php?uid={$_SESSION['a_id']} ";?>">
                                                    <i class="zmdi zmdi-settings"></i>Edit Profile</a>
                                            </div>
                                            <div class="account-dropdown__item">
                                                <a href="Admin_change_pwd.php">
                                                    <i class="zmdi zmdi-settings"></i>Change Password</a>
                                            </div>

                                        </div>
                                        <div class="account-dropdown__footer">
                                            <a href="logout.php">
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
                                           