<?php

session_start();

$pid = $_GET['productid'];
$qty = $_GET['qty'];



if (isset($_SESSION['productcart'])) {


    if (in_array($pid, $_SESSION['productcart'])) {
       echo '<script>setTimeout(function(){alert("Product is already in cart")}, 50)</script>';
       echo '<script>setTimeout(function(){window.location ="viewcart.php";}, 100)</script>';    
    } else {
    $cnt = $_SESSION['cnt'] + 1;
    $_SESSION['productcart'][$cnt] = $pid;
    $_SESSION['qtycart'][$cnt] = $qty;
    $_SESSION['cnt'] = $cnt;
     echo '<script>setTimeout(function(){alert("Product added")}, 50)</script>';
    echo '<script>setTimeout(function(){window.location ="viewcart.php";}, 100)</script>';
    }


} else {

    $_SESSION['productcart'] = array();
    $_SESSION['qtycart'] = array();

    $_SESSION['productcart'][0] = $pid;
    $_SESSION['qtycart'][0] = $qty;
    $_SESSION['cnt'] = 0;
    echo '<script>setTimeout(function(){alert("Product added")}, 50)</script>';
    echo '<script>setTimeout(function(){window.location ="viewcart.php";}, 100)</script>'; 
    //header("location:viewcart.php");
}

//echo "<pre>";
//print_r($_SESSION);

