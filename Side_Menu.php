<html lang="en">

    <head>

        <title>Side Menu</title>
        <?php include 'head.php'; ?>
        <style>

            .sh:hover{text-shadow:0 10px 10px rgba(0,0,0,.2);}

        </style>

    </head>
    <body>
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="Dashboard.php">
                    <img src="images/Admin.png" alt="Paras" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list" >

                        <li class="sh">
                            <a href="Dashboard.php"  >
                                <i class="fas fa-tachometer-alt "></i>Dashboard</a>
                        </li>


                        <li class="sh">
                            <a class="js-arrow" href="New_order.php">
                                <i class="fa  fa-archive"></i>New Order</a>

                        </li>

                        <li class="has-sub">
                            <a class="js-arrow sh" href="#">
                                <i  class="fa fa-shopping-cart"></i>Sales & Purchase</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">

                                <li class="sh">
                                    <a href="Order.php">
                                        <i class="fa  fa-angle-double-right"></i>Sales</a>
                                </li>

                                <li class="sh">
                                    <a href="purchase_display.php">
                                        <i class="fa  fa-angle-double-right"></i>Purchase</a>
                                </li>
                                <li class="sh">
                                    <a href="Supplier_display.php">
                                        <i class="fa  fa-angle-double-right"></i>Supplier</a>
                                </li>
                            </ul>
                        </li>



                        <li class="has-sub">
                            <a class="js-arrow sh" href="#">
                                <i  class="fas fa-wrench"></i>Product Manage</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">

                                <li class="sh">
                                    <a href="Product_display.php">
                                        <i class="fa  fa-angle-double-right"></i>Product</a>
                                </li>
                                <li class="sh">
                                    <a href="Brand.php">
                                        <i class="fa  fa-angle-double-right"></i>Brand</a>
                                </li>
                                <li class="sh">
                                    <a href="color_display.php">
                                        <i class="fa  fa-angle-double-right"></i>Colour</a>
                                </li>
                                <li class="sh">
                                    <a href="Category.php">
                                        <i class="fa  fa-angle-double-right"></i>Category</a>
                                </li>

                                <li class="sh">
                                    <a href="Sub_category.php">
                                        <i class="fa  fa-angle-double-right"></i>Sub Category</a>
                                </li>
                                <li class="sh">
                                    <a href="Offers.php">
                                        <i class="fa  fa-angle-double-right"></i>Offers</a>
                                </li>
                            </ul>
                        </li>



                        <li class="has-sub">
                            <a class="js-arrow sh" href="#">
                                <i  class="fa fa-shopping-cart"></i>Manage</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">


                                <li class="sh">
                                    <a href="Area_display.php">
                                        <i class="fa  fa-angle-double-right"></i>Area</a>
                                </li>
                                <li class="sh">
                                    <a href="Customer_alldisplay.php">
                                        <i class="fa  fa-angle-double-right"></i>Customer</a>
                                </li>
                                
                                <li class="sh">
                                    <a href="Complaint.php">
                                        <i class="fa  fa-angle-double-right"></i>Compalin</a>
                                </li>
                            </ul>
                        </li>


                        <li class="sh">
                            <a class="js-arrow" href="Employee_alldisplay.php">
                                <i class="fa fa-users"></i>Employee</a>

                        </li>
                        
                        
                        
                        <li class="has-sub">
                            <a class="js-arrow sh" href="#">
                                <i  class="fa fa-calendar-alt"></i>Appointment</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">


                                <li class="sh">
                                    <a href="Eye_test.php">
                                        <i class="fa  fa-angle-double-right"></i>Eye Test & Try Frame</a>
                                </li>
                                <li class="sh">
                                    <a href="Service.php">
                                        <i class="fa  fa-angle-double-right"></i>Repairing</a>
                                </li>
                                
                            </ul>
                        </li>
                        
                        

                       
                        <li class="sh">
                            <a href="Stock.php">
                                <i  class="fa fa-inbox"></i>Stock</a>
                        </li>
                        


                    </ul>
                </nav>
            </div>
        </aside>

        <?php include 'Script.php'; ?>

    </body>
</html>
