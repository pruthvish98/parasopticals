<?php
    include 'connection.php';
    if(!isset($_GET['did']) || empty($_GET['did']) )  
    {
       
        header("location:Brand_display.php") ;   
    }
    $did = $_GET['did'];    
    
    $selectq = mysqli_query($connection, "update brand set is_delete='1' where brand_id= {$did}") or die(mysqli_error($connection));
    
    header("location:Brand_display.php") ;
?>
