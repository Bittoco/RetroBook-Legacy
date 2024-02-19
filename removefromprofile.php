<?php
include 'header.php';
if(isset($_GET['id'])) {
	$id = htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8');
	$id = mysqli_real_escape_string($conn,  $id);
	$sql = "SELECT * FROM profilesongs WHERE id = '$id'";
	$result = $conn->query($sql);
	if(mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			if($_SESSION['email'] === $row['email']) {

				$sql2 = "DELETE FROM profilesongs WHERE id = '$id'";
				$result2 = $conn->query($sql2);
				header("location: songsilike.php");
				exit();
			}
		}
	} else {
		header("location: app.php?id=2");
		exit();
	}
} else {
	header("location: myapps.php");
	exit();
}