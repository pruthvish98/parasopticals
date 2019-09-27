<?php



include './connection.php';
include './check-data.php';
include './checklogin.php';


$check = checkdata($connection, "area", "area_name", $name);

if ($check) {
    
    
    
    
    
 } else {
        echo '<script> alert("Data Already Exits") </script>';
    }