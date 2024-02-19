<?php 
include 'header.php';
include 'dbh.inc.php';
if(isset($_POST['subscribe'])) {
	$id = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');
	$id = mysqli_real_escape_string($conn,  $id);
	$email = $_SESSION['email'];
	$uid = $_SESSION['id'];
	$sql = "SELECT * FROM app WHERE id = '$id'";
	$result = $conn->query($sql);
	if(mysqli_num_rows($result) > 0) {
		$sql2 = "INSERT INTO userapps (name, id, appid) VALUES ('$email', '$uid', '$id')";
		$result2 = $conn->query($sql2);
		header("location: app.php?id=".$id."");
		exit();
	} else {
		header("location: myapps.php");
		exit();
	}
}