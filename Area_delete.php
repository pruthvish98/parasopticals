<?php
    include 'connection.php';
    if(!isset($_GET['did']) || empty($_GET['did']) )  
    {
       
        header("location:Area_display.php") ;   
    }
    $did = $_GET['did'];    
    
    $selectq = mysqli_query($connection, "update area set is_delete='1' where area_id= {$did}") or die(mysqli_error($connection));
    
    header("location:Area_display.php") ;
?>
