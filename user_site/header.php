




<?php session_start(); ?>
<script>
function notifyMe() {
  // Let's check if the browser supports notifications
  if (!("Notification" in window)) {
    alert("This browser does not support desktop notification");
  }

  // Let's check if the user is okay to get some notification
  else if (Notification.permission === "granted") {
    // If it's okay let's create a notification
  var options = {
        body: "This is the body of the notification",
        icon: "icon.jpg",
        dir : "ltr"
    };
  var notification = new Notification("Hi there",options);
  }

  // Otherwise, we need to ask the user for permission
  // Note, Chrome does not implement the permission static property
  // So we have to check for NOT 'denied' instead of 'default'
  else if (Notification.permission !== 'denied') {
    Notification.requestPermission(function (permission) {
      // Whatever the user answers, we make sure we store the information
      if (!('permission' in Notification)) {
        Notification.permission = permission;
      }

      // If the user is okay, let's create a notification
      if (permission === "granted") {
        var options = {
              body: "This is the body of the notification",
              icon: "icon.jpg",
              dir : "ltr"
          };
        var notification = new Notification("Hi there",options);
      }
    });
  }

  // At last, if the user already denied any notification, and you
  // want to be respectful there is no need to bother them any more.
}
</script>
<header class="header_area"  >


    <div class="top_menu row m0">
        <div class="container">
            <div class="float-left">

            </div>
            <div class="float-right">
                <ul class="header_social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    &nbsp;
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    &nbsp;
                    <a href="#"><i class="fa fa-instagram"></i></a>
                </ul>
            </div>
        </div>	
    </div>	
    <div class="main_menu" >
        <nav class="navbar navbar-expand-lg navbar-light main_box" style="border-radius: 10px;">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="index.php"><img src="img/Paras.png" width="230px" style="filter: opacity(.9) drop-shadow(0 5px 5px #4C4C4C);" ></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li> 
                        <li class="nav-item"><a class="nav-link" href="shop.php">Shop</a></li>
                        <!--
                        <li class="nav-item submenu dropdown">
                            <a href="shop.php" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="text-shadow:0 10px 10px rgba(0,0,0,.2);">Shop</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="shop.php">Shop Category</a>
                                <li class="nav-item"><a class="nav-link" href="single-product.php">Product Details</a>
                                <li class="nav-item"><a class="nav-link" href="checkout.html">Product Checkout</a>
                                <li class="nav-item"><a class="nav-link" href="cart.html">Shopping Cart</a></li>
                                <li class="nav-item"><a class="nav-link" href="confirmation.html">Confirmation</a></li>
                            </ul>
                        </li> 
                        -->
                        <li class="nav-item"><a class="nav-link" href="appointment.php">Appointment</a></li>


                        <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
                        <li class="nav-item"><a href="viewcart.php" class="cart"><i class="lnr lnr lnr-cart"></i></a></li>

                    </ul>


                    


                   


                    <ul class="nav navbar-nav navbar-right">


                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <?php
                                if (isset($_SESSION['c_name'])) {
                                    echo $_SESSION['c_name'];
                                } else {
                                    echo "<a class='nav-link' href='./login.php'>Login</a>";
                                }
                                ?></a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="#"></a>
                                <li class="nav-item"><a class="nav-link" href="myprofile.php">My profile</a>
                                <li class="nav-item"><a class="nav-link" href="order.php">My Order</a>
                                <li class="nav-item"><a class="nav-link" href="changepwd.php">Change Password</a>
                                <li class="nav-item"><a class="nav-link" href="logout.php">Log out</a></li>

                            </ul>
                        </li> 

                    </ul>
                </div> 
            </div>
        </nav>
    </div>
</header>
