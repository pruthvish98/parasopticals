<?php

session_start();

unset($_SESSION['a_id']);
unset($_SESSION['a_email']);
unset($_SESSION['a_name']);
unset($_SESSION['photo']);

header("location:home.php");
?>