<?php 
$serverName = "localhost";
$dBUsername = "shenhesassuwu";
$dBPassword = "123";
$dBName = "ilovekafkasthighs";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
error_reporting(0);