<html lang="en">

<head>
    
<title>Side Menu</title>
<?php include 'head.php';?>

</head>
<body>
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="../images/employee.png" alt="Paras" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="sh">
                            <a href="Dashboard.php"  >
                                <i class="fas fa-tachometer-alt "></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="Employee_profile.php">
                                <i class="fa fa-users"></i>Profile</a>
                        </li>
                                                                       
                        
                        <li class="has-sub">
                            <a class="js-arrow sh" href="#">
                                <i  class="fa fa-calendar-alt"></i>Task</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">

                                <li class="sh">
                                    <a href="Eye_test.php">
                                        <i class="fa  fa-angle-double-right"></i>Eye-Test</a>
                                </li>
                                <li class="sh">
                                    <a href="Service.php">
                                        <i class="fa  fa-angle-double-right"></i>Repairing</a>
                                </li>
                                <li class="sh">
                                    <a href="Delivery.php">
                                        <i class="fa  fa-angle-double-right"></i>Delivery</a>
                                </li>
                               



                            </ul>
                        </li>
                        <li>
                            <a href="Stock.php">
                                <i class="fa fa-inbox"></i>Stock</a>
                        </li>
                        
                        <li>
                            <a href="Customer.php">
                                <i class="fa fa-child"></i>Customer</a>
                        </li>
                        
                        <li>
                            <a href="Offline_product.php">
                                <i class="fa fa-bar-chart-o"></i>Offline Product</a>
                        </li>
                        
                       
                        
                    </ul>
                </nav>
            </div>
        </aside>
    


</body>
</html>
<?php include 'Script.php';?>
        