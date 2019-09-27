<?php
    include 'connection.php';
    if(!isset($_GET['did']) || empty($_GET['did']) )  
    {
       
        header("location:color_display.php") ;   
    }
    $did = $_GET['did'];    
    
    $selectq = mysqli_query($connection, "delete from product_color where color_id= {$did}") or die(mysqli_error($connection));
    
    header("location:color_display.php") ;
?>
