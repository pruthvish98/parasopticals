<?php

session_start();

unset($_SESSION['id']);
unset($_SESSION['email']);
unset($_SESSION['fname']);
unset($_SESSION['lname']);

header("location:Employee_login.php");
?>