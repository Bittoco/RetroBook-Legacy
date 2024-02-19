<?php 
include 'header.php';
include 'dbh.inc.php';
if(isset($_GET['r'])) {
		$friend = $_GET['r'];
		$friend = htmlspecialchars($friend, ENT_QUOTES, 'UTF-8');
		$friend = mysqli_real_escape_string($conn,  $friend);
		$email = $_SESSION['email'];
		$sql2 = "SELECT * FROM users WHERE email = '$email'";
		$result2 = $conn->query($sql2);
		while($row2 = mysqli_fetch_assoc($result2)) {
		$u = $row2['id'];
		$u = htmlspecialchars($u, ENT_QUOTES, 'UTF-8');
		$u = mysqli_real_escape_string($conn,  $u);
		$sql = "DELETE FROM friends WHERE fid1 = '$u' AND fid2 = '$friend'";
		$result = $conn->query($sql);
		header("location: profile.php?id=".$friend."");
		exit();
		}
	}
