<?php
    include 'connection.php';
    if(!isset($_GET['did']) || empty($_GET['did']) )  
    {
       
        header("location:Employee_alldisplay.php") ;   
    }
    $did = $_GET['did'];    
    
    $selectq = mysqli_query($connection, "update emp set is_delete='1' where emp_id= {$did}") or die(mysqli_error($connection));
    
    header("location:Employee_alldisplay.php") ;
?>
