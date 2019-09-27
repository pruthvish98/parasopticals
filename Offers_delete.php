<?php

include 'connection.php';
if (!isset($_GET['did']) || empty($_GET['did'])) {

    header("location:Offers_display.php");
}
$did = $_GET['did'];
$q = mysqli_query($connection, "select * from offers where offer_id='{$did}' ")or die(mysqli_error($connection));
$row = mysqli_fetch_array($q);
if ($row['is_active'] == 0) {
    $status = mysqli_query($connection, "update offers set is_active= '1' where offer_id='{$did}'") or die(mysqli_error($connection));
} else {
    $status = mysqli_query($connection, "update offers set is_active= '0' where offer_id='{$did}'") or die(mysqli_error($connection));
}



header("location:Offers_display.php");
?>