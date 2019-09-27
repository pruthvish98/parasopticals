
<?php
    include 'connection.php';
    if(!isset($_GET['did']) || empty($_GET['did']) )  
    {       
        header("location:Category_display.php") ;   
    }
    $did = $_GET['did'];    
    
    $selectq = mysqli_query($connection, "update category set is_delete='1' where cat_id= {$did}") or die(mysqli_error($connection));
    
    header("location:Category_display.php") ;
?>

