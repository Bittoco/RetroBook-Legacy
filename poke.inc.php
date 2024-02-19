<?php 
include 'dbh.inc.php';
	include 'header.php';
		if(!isset($_SESSION['email'])) {
		header("location: index.php");
		exit();
	}
	if(isset($_GET['p'])) {
		$fromuser = $_SESSION['email'];
		$sql = "SELECT * FROM users WHERE email = '$fromuser'";
		$result = $conn->query($sql);
		$resultCheck = mysqli_num_rows($result);
		if($resultCheck > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				
				
				$fromid = htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8');
				$fromname = htmlspecialchars($_SESSION['name'], ENT_QUOTES, 'UTF-8');
				$date3 = date("Y-m-d");
				$toid = $_GET['p'];
				$sql2 = "INSERT INTO poke (fromname, fromid, toid, date) VALUES ('$fromname', '$fromid', '$toid', '$date3')";
				$result2 = $conn->query($sql2);
				header("location: profile.php?id=".$_GET['p']."");
				exit();
			}
		} else {
			header("location: profile.php?id=".$_GET['p']."");
			exit();
		}
	}
	if(isset($_GET['po'])) {
		$fromuser = $_SESSION['email'];
		$sql = "SELECT * FROM users WHERE email = '$fromuser'";
		$result = $conn->query($sql);
		$resultCheck = mysqli_num_rows($result);
		if($resultCheck > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				if($row['email'] != $_SESSION['email']) {
					header("location: profile.php?id=".$_GET['p']."");
				exit();
				}
				
				$fromid = htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8');
				$fromname = htmlspecialchars($_SESSION['name'], ENT_QUOTES, 'UTF-8');
				$date3 = date("Y-m-d");
				$toid = $_GET['po'];
				$sql2 = "INSERT INTO poke (fromname, fromid, toid, date) VALUES ('$fromname', '$fromid', '$toid', '$date3')";
				$result2 = $conn->query($sql2);
				header("location: home.php");
				exit();
			}
		} else {
			header("location: home.php");
			exit();
		}
	}
	if(isset($_GET['poo'])) {
		$fromuser = $_SESSION['email'];
		$sql = "SELECT * FROM users WHERE email = '$fromuser'";
		$result = $conn->query($sql);
		$resultCheck = mysqli_num_rows($result);
		if($resultCheck > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				if($row['email'] != $_SESSION['email']) {
					header("location: global.php");
				exit();
				}
			
				$fromid = htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8');
				$fromname = htmlspecialchars($_SESSION['name'], ENT_QUOTES, 'UTF-8');
				$date3 = date("Y-m-d");
				$toid = $_GET['poo'];
				$sql2 = "INSERT INTO poke (fromname, fromid, toid, date) VALUES ('$fromname', '$fromid', '$toid', '$date3')";
				$result2 = $conn->query($sql2);
				header("location: global.php");
				exit();
			}
		} else {
			header("location: global.php");
			exit();
		}
	}
		if(isset($_GET['d'])) {
			$id = $_GET['d'];
			$sql = "DELETE FROM poke WHERE id = '$id'";
			$result = $conn->query($sql);
			header("location: home.php");
			exit();
		}
		if(isset($_GET['pok'])) {
		$fromuser = $_SESSION['email'];
		$sql = "SELECT * FROM users WHERE email = '$fromuser'";
		$result = $conn->query($sql);
		$resultCheck = mysqli_num_rows($result);
		if($resultCheck > 0) {
			while($row = mysqli_fetch_assoc($result)) {
					if($row['email'] === $_SESSION['email']) {
					header("location: profile.php?id=".$_SESSION['id']."");
					exit();
				}
				

				$fromid = htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8');
				$fromname = htmlspecialchars($_SESSION['name'], ENT_QUOTES, 'UTF-8');
				$date3 = date("Y-m-d");
				$toid = $_GET['pok'];
				$sql2 = "INSERT INTO poke (fromname, fromid, toid, date) VALUES ('$fromname', '$fromid', '$toid', '$date3')";
				$result2 = $conn->query($sql2);
				header("location: friends.php?id=".$_GET['id']."");
				exit();
			}
		} else {
			header("location: global.php");
			exit();
		}
	}