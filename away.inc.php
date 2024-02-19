<?php 
	include 'dbh.inc.php';
	include 'header.php';
if(isset($_POST['submit'])) {
	$email = $_SESSION['email'];
	$email = mysqli_real_escape_string($conn,  $email);
	$email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
	$away = $_POST['message'];
	$away = mysqli_real_escape_string($conn,  $_POST['message']);
	$away = htmlspecialchars($away, ENT_QUOTES, 'UTF-8');
	$id = $_POST['id'];
	$id = mysqli_real_escape_string($conn,  $id);
	$id = htmlspecialchars($id, ENT_QUOTES, 'UTF-8');
	$sql = "UPDATE users SET away = '$away' WHERE email = '$email'";
	$result = $conn->query($sql);

	header("location: awaymessage.php?u=1");
	exit();
}