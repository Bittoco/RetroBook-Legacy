<?php 
include 'dbh.inc.php';
include 'header.php';
$email = $_SESSION['email'];
$sql = "UPDATE users SET onlinestatus = 'Offline' WHERE email = '$email'";
$result = $conn->query($sql);

session_start();

session_unset();
session_destroy();

header("location: index.php");
exit();