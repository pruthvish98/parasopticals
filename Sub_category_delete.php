
<?php
    include 'connection.php';
    if(!isset($_GET['did']) || empty($_GET['did']) )  
    {       
        header("location:Sub_category_display.php") ;   
    }
    $did = $_GET['did'];    
    
    $selectq = mysqli_query($connection, "update sub_category set is_delete='1' where sub_cat_id= {$did}") or die(mysqli_error($connection));
    
    header("location:Sub_category_display.php") ;
?>

