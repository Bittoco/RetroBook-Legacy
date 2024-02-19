<?php 
$serverName = "localhost";
$dBUsername = "u196915737_user";
$dBPassword = "WarMachineRocks9";
$dBName = "u196915737_retrobook";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
