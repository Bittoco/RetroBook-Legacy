<?php 
include 'header.php';
if(isset($_POST['submit'])) {
	$id = $_SESSION['id'];
	$vis = htmlspecialchars($_POST['vis'], ENT_QUOTES, 'UTF-8');
	$vis = mysqli_real_escape_string($conn,  $vis);
	$vis1 = htmlspecialchars($_POST['vis1'], ENT_QUOTES, 'UTF-8');
	$vis1 = mysqli_real_escape_string($conn,  $vis1);
	$vis2 = htmlspecialchars($_POST['vis2'], ENT_QUOTES, 'UTF-8');
	$vis2 = mysqli_real_escape_string($conn,  $vis2);
	$vis3 = htmlspecialchars($_POST['vis3'], ENT_QUOTES, 'UTF-8');
	$vis3 = mysqli_real_escape_string($conn,  $vis3);
	$sql = "UPDATE users SET accountvis = '$vis' WHERE id = '$id'";
	$result = $conn->query($sql);
	$sql = "UPDATE users SET messagevis = '$vis1' WHERE id = '$id'";
	$result = $conn->query($sql);
	$sql = "UPDATE users SET friendvis = '$vis2' WHERE id = '$id'";
	$result = $conn->query($sql);
	$sql = "UPDATE users SET photovis = '$vis3' WHERE id = '$id'";
	$result = $conn->query($sql);
	header("location: myprivacy.php?saved");
	exit();
} else {
	header("location: myprivacy.php");
	exit();
}