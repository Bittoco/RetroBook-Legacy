<?php 

include 'dbh.inc.php';
include 'header.php';
	if(!isset($_SESSION['email'])) {
		header("location: index.php");
		exit();
	}
if(isset($_POST['submit'])) {
$toemail = $_POST['toemail'];
$toemail = htmlspecialchars($toemail, ENT_QUOTES, 'UTF-8');
$toemail = mysqli_real_escape_string($conn,  $toemail);

$toid = $_POST['toid'];
$toid = htmlspecialchars($toid, ENT_QUOTES, 'UTF-8');
$toid = mysqli_real_escape_string($conn,  $toid);

$fromid = $_SESSION['id'];
$fromid = htmlspecialchars($fromid, ENT_QUOTES, 'UTF-8');
$fromid = mysqli_real_escape_string($conn,  $fromid);

$fromemail = $_SESSION['email'];
$fromemail = htmlspecialchars($fromemail, ENT_QUOTES, 'UTF-8');
$fromemail = mysqli_real_escape_string($conn,  $fromemail);

$subject = $_POST['subject'];
$subject = htmlspecialchars($subject, ENT_QUOTES, 'UTF-8');
$subject = mysqli_real_escape_string($conn,  $subject);

$message = $_POST['message'];
$message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
$message = mysqli_real_escape_string($conn,  $message);
$date3 = date("Y-m-d");
if(empty($subject)) {
	$subject = "Empty Subject";
}
	if(empty($message)) {
		header("location: send.php?id=".$to."&e=1");
		exit();
	}
	$date3 = date("Y-m-d");
$date3 = date("Y-m-d");
      	$date2 = date("H:i:s");
      	  $date4 = $time_in_12_hour_format = date("g:i a", strtotime($date2));
      	  $date = $date3 . " " . $date4;
	
	$sql = "INSERT INTO messages (toemail, fromemail, subject, message, toid, fromid, status, date) VALUES ('$toemail', '$fromemail', '$subject', '$message', '$toid', '$fromid', 'Unread', '$date')";
	$result = $conn->query($sql);
	header("location: mymessages.php");
	exit();
}
if(isset($_POST['marksubmit'])) {
	$id = $_POST['id'];
	$sql = "UPDATE messages SET status = 'Read' WHERE id = '$id'";
	$result = $conn->query($sql);
	header("location: message.php?id=".$id."");
	exit();
}