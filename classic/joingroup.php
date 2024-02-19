<?php 
include 'dbh.inc.php';
if(isset($_GET['id'])) {
	$id = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');
	$id = mysqli_real_escape_string($conn,  $id);
	include 'header.php';
		if(!isset($_SESSION['email'])) {
		header("location: index.php");
		exit();
	}
	$email = $_SESSION['email'];
	$sql = "SELECT * FROM groupmem WHERE email = '$email' AND groupid = '$id'";
	$result = $conn->query($sql);
	$resultCheck = mysqli_num_rows($result);
	if($resultCheck > 0) {
		header("location: home.php");
		exit();
	}
	$id = $_GET['id'];
	$sql2 = "SELECT * FROM groups WHERE id = '$id'";
	$result2 = $conn->query($sql2);
	$resultCheck2 = mysqli_num_rows($result2);
	if($resultCheck2 > 0) {
		while($row = mysqli_fetch_assoc($result2)) {
		$groupname = htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8');
	$groupname = mysqli_real_escape_string($conn,  $groupname);
	$id = $row['id'];
		$sql3 = "INSERT INTO groupmem (fgroup, email, status, groupid) VALUES ('$groupname', '$email', 'member', '$id')";
		$result3 = $conn->query($sql3);
		$date3 = date("Y-m-d");
      	$date2 = date("H:i:s");
      	 $date4 = $time_in_12_hour_format = date("g:i a", strtotime($date2));
      	 $date = $date3 . " " . $date4;
      	 $altdate = date("H:i:s");
      	  $altdate = $time_in_12_hour_format = date("g:i a", strtotime($date2));

		$sql2 = "INSERT INTO wall (fromname, fromid, typewall, noteid, date, altdate) VALUES ('$email', '$fromid', 'Joined Group', '$id', '$date', '$altdate')";
		$result2 = $conn->query($sql2);
		header("location: group.php?id=".$id."");
		}
	} else {
		header("location: home.php");
		exit();
	}
} 
if(isset($_GET['gid'])) {
	$id = htmlspecialchars($_GET['gid'], ENT_QUOTES, 'UTF-8');
	$id = mysqli_real_escape_string($conn,  $id);
	include 'header.php';
		if(!isset($_SESSION['email'])) {
		header("location: index.php");
		exit();
	}
	$email = $_SESSION['email'];
	$sql = "SELECT * FROM groupmem WHERE email = '$email' AND groupid = '$id'";
	$result = $conn->query($sql);
	$resultCheck = mysqli_num_rows($result);
	if($resultCheck > 0) {
		header("location: home.php");
		exit();
	}
	$id = $_GET['gid'];
	$sql2 = "SELECT * FROM groups WHERE id = '$id'";
	$result2 = $conn->query($sql2);
	$resultCheck2 = mysqli_num_rows($result2);
	if($resultCheck2 > 0) {
		while($row = mysqli_fetch_assoc($result2)) {
		$groupname = htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8');
	$groupname = mysqli_real_escape_string($conn,  $groupname);
	$id = $row['id'];
		$id = $row['id'];
	$date3 = date("Y-m-d");
      	$date2 = date("H:i:s");
      	 $date4 = $time_in_12_hour_format = date("g:i a", strtotime($date2));
      	 $date = $date3 . " " . $date4;
      	 $altdate = date("H:i:s");
      	  $altdate = $time_in_12_hour_format = date("g:i a", strtotime($date2));

	$sql2 = "INSERT INTO wall (fromname, fromid, typewall, noteid, date, altdate) VALUES ('$email', '$fromid', 'Joined Group', '$id', '$date', '$altdate')";
		$result2 = $conn->query($sql2);
		$sql3 = "INSERT INTO groupmem (fgroup, email, status, groupid) VALUES ('$groupname', '$email', 'member', '$id')";
		$result3 = $conn->query($sql3);
		header("location: group.php?id=".$id."");
		}
	} else {
		header("location: home.php");
		exit();
	}
} 