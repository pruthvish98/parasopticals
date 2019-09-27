<?php

session_start();

unset($_SESSION['c_id']);
unset($_SESSION['c_email']);
unset($_SESSION['c_name']);
unset($_SESSION['url']);


header("location:login.php") ;
 ?>