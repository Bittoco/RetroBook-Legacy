<?php 
include 'header.php';
include 'dbh.inc.php';
if(isset($_SESSION['email'])) {
	$status = htmlspecialchars($_POST['option'], ENT_QUOTES, 'UTF-8');
	$status = mysqli_real_escape_string($conn,  $status);
	$email = $_SESSION['email'];
	$sql = "UPDATE users SET away = '$status' WHERe email = '$email'";
	$result = $conn->query($sql);
	$fromid = $_SESSION['id'];
	$email = $_SESSION['email'];
	$date3 = date("Y-m-d");
	 $date = $date3 . " " . $date4;
	   $date2 = date("H:i:s");
	    $date4 = $time_in_12_hour_format = date("g:i a", strtotime($date2));
	 	$sql2 = "INSERT INTO wall (fromname, fromid, typewall, noteid, date, altdate) VALUES ('$email', '$fromid', 'Status', '$status', '$date', '$date4')";
		$result2 = $conn->query($sql2);
	header("location: profile.php?id=".$fromid."");
	exit();
} else {
	header("location: index.php");
	exit();
}