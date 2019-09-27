<?php
    include 'connection.php';
    if(!isset($_GET['did']) || empty($_GET['did']) )  
    {
       
        header("location:Supplier_display.php") ;   
    }
    $did = $_GET['did'];    
    
    $selectq = mysqli_query($connection, "update supplier set is_delete='1' where supplier_id= {$did}") or die(mysqli_error($connection));
    
    header("location:Supplier_display.php") ;
?>