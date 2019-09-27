<?php
    include 'connection.php';
    if(!isset($_GET['did']) || empty($_GET['did']) )  
    {
       
        header("location:Product_display.php") ;   
    }
    $did = $_GET['did'];    
    
    $selectq = mysqli_query($connection, "update product_master set is_delete='1' where product_id= {$did}") or die(mysqli_error($connection));
    
    header("location:Product_display.php") ;
?>
