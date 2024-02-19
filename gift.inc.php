<?php 
include 'dbh.inc.php';
include 'header.php';
if(isset($_POST['submit'])) {
	$fromname = $_SESSION['name'];
	$email = $_SESSION['email'];
	$fromid = $_SESSION['id'];
	$gift = htmlspecialchars($_POST['gift'], ENT_QUOTES, 'UTF-8');
	$gift = mysqli_real_escape_string($conn,  $gift);
	$person = htmlspecialchars($_POST['person'], ENT_QUOTES, 'UTF-8');
	$person = mysqli_real_escape_string($conn,  $person);
	if($person === "") {
		header("location: giftshop.php?e=1");
		exit();
	}
	if($gift === "") {
		header("location: giftshop.php?e=2");
		exit();
	}
	if($person === $_SESSION['id']) {
		header("location: giftshop.php?e=3");
		exit();
	}
	$date3 = date("Y-m-d");
     $date2 = date("H:i:s");
     $date4 = $time_in_12_hour_format = date("g:i a", strtotime($date2));
     $date = $date3 . " " . $date4;
     $altdate = $date2;

	$message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');
	$message = mysqli_real_escape_string($conn,  $message);

	$sql = "INSERT INTO profilewall (type, fromname, fromid, toid, message, gifttype, date) VALUES ('Gift', '$fromname', '$fromid', '$person', '$message', '$gift', '$date')";
	$result = $conn->query($sql);
	$sql2 = "INSERT INTO wall (fromname, fromid, toid, typewall, noteid, date, altdate) VALUES ('$email', '$fromid', '$person', 'Profile Gift', '$gift', '$date', '$altdate')";
		$result2 = $conn->query($sql2);
		header("location: profile.php?id=".$person."");
		exit();
}