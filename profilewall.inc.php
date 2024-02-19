<?php 
include 'header.php';
include 'dbh.inc.php';
if(isset($_POST['submit'])) {
	$name = htmlspecialchars($_SESSION['name'], ENT_QUOTES, 'UTF-8');
	$name = mysqli_escape_string($conn, $name);
	$email = $_SESSION['email'];
	$uid = htmlspecialchars($_SESSION['id'], ENT_QUOTES, 'UTF-8');
	$uid = mysqli_escape_string($conn, $uid);
	$toid = $_POST['toid'];
	$toid = htmlspecialchars($toid, ENT_QUOTES, 'UTF-8');
	$toid = mysqli_escape_string($conn, $toid);
	$message = htmlspecialchars($_POST['comment'], ENT_QUOTES, 'UTF-8');
	$message = mysqli_escape_string($conn, $message);
	$date3 = date("Y-m-d");
     $date2 = date("H:i:s");
     $date4 = $time_in_12_hour_format = date("g:i a", strtotime($date2));
     $date = $date3 . " " . $date4;
     $altdate = $date2;
     $sql = "INSERT INTO profilewall (fromname, fromid, toid, message, date) VALUES ('$name', '$uid', '$toid', '$message', '$date')";
     $result = $conn->query($sql);
     	$sql2 = "INSERT INTO wall (fromname, fromid, typewall, noteid, date, altdate) VALUES ('$email', '$uid', 'Profile Wall', 'none', '$date', '$date4')";
		$result2 = $conn->query($sql2);
     header("location: profile.php?id=".$toid."");
     exit();

} else {
	header("location: home.php");
}