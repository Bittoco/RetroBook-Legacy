<?php 

include 'header.php';
include 'dbh.inc.php';
if(!isset($_SESSION['email'])) {
	header("location: login.php");
} else {
	$id = $_GET['s'];
	$sql = "SELECT * FROM users WHERE id = '$id'";
	$result = $conn->query($sql);
	if(mysqli_num_rows($result) > 0) {
		$feature = $_GET['h'];
		if($feature === "music") {
			$var = "music";
		} if($feature === "aboutme") {
			$var = "aboutme";
		} if($feature === "interest") {
			$var = "interests";
		}
		while($row = mysqli_fetch_assoc($result)) {
			if($_GET['h'] === "music") {
				if($row['music'] === $_GET['m']) {
						$email = $_SESSION['email'];
					$sql2 = "UPDATE friendgame SET score = score + 1 WHERE email = '$email'";
					$result2 = $conn->query($sql2);
					header("location: friendgame.php");
					exit();
				} else {
					header("location: friendgame.php");
				}
				
			}
			if($_GET['h'] === "aboutme") {
				if($row['aboutme'] === $_GET['m']) {
				$email = $_SESSION['email'];
					$sql2 = "UPDATE friendgame SET score = score + 1 WHERE email = '$email'";
					$result2 = $conn->query($sql2);
					header("location: friendgame.php");
					exit();
				}else {
					header("location: friendgame.php");
					exit();
				}
			}
			if($_GET['h'] === "interest") {
					if($row['interests'] === $_GET['m']) {
					$email = $_SESSION['email'];
					$sql2 = "UPDATE friendgame SET score = score + 1 WHERE email = '$email'";
					$result2 = $conn->query($sql2);
					header("location: friendgame.php");
					exit();
					
				} else {
					header("location: friendgame.php");
					exit();
				}
			}
		}

	} else {
		header("location: signup.php");
	}
}