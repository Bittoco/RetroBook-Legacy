<?php 
include 'header.php';
	include 'dbh.inc.php';

if(isset($_GET['re'])) {
		$id = $_GET['re'];
		$sql = "DELETE FROM friendalert WHERE id = '$id'";
		$result = $conn->query($sql);
		header("location: home.php");
		exit();
	}