<?php 
include 'dbh.inc.php';
if(isset($_GET['id'])) {
	$id = htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8');
	$id = mysqli_real_escape_string($conn,  $id);
	include 'header.php';
	$uid = $_SESSION['email'];
	$uid = htmlspecialchars($uid, ENT_QUOTES, 'UTF-8');
	$uid = mysqli_real_escape_string($conn,  $uid);
	$sql2 = "SELECT * FROM groups WHERE id = '$id'";
	$result2 = $conn->query($sql2);
	$resultCheck2 = mysqli_num_rows($result2);
	if($resultCheck2 < 0) {
		header("location: mygroups.php");
	exit();
	} else {
	$sql = "DELETE FROM groupmem WHERE groupid = '$id' AND email = '$uid'";
	$result = $conn->query($sql);
	header("location: mygroups.php");
	exit();
	}
}
include 'dbh.inc.php';
if(isset($_GET['gid'])) {
	$id = htmlspecialchars($_GET['gid'], ENT_QUOTES, 'UTF-8');
	$id = mysqli_real_escape_string($conn,  $id);
	include 'header.php';
	$uid = $_SESSION['email'];
	$uid = htmlspecialchars($uid, ENT_QUOTES, 'UTF-8');
	$uid = mysqli_real_escape_string($conn,  $uid);
	$sql2 = "SELECT * FROM groups WHERE id = '$id'";
	$result2 = $conn->query($sql2);
	$resultCheck2 = mysqli_num_rows($result2);
	if($resultCheck2 < 0) {
		header("location: mygroups.php");
	exit();
	} else {
	$sql = "DELETE FROM groupmem WHERE groupid = '$id' AND email = '$uid'";
	$result = $conn->query($sql);
	header("location: group.php?id=".$id."");
	exit();
	}
}