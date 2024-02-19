<?php 
include 'dbh.inc.php';
if(isset($_POST['preview'])) {
	$title = $_POST['name'];
	
	$title = mysqli_real_escape_string($conn,  $title);
	$body = mysqli_real_escape_string($conn,  $_POST['message']);
	header("location: preview.php?t=".$title."&b=".$body."");
	exit();
}
if(isset($_POST['cancel'])) {
	include 'header.php';
	header("location: notes.php?id=".$_SESSION['id']."");
	exit();
}
if(isset($_POST['submit'])) {
	include 'header.php';
	include 'dbh.inc.php';
	date_default_timezone_set('America/New_York');
		$email = htmlspecialchars($_SESSION['email'], ENT_QUOTES, 'UTF-8');
		$id = htmlspecialchars($_SESSION['id'], ENT_QUOTES, 'UTF-8');
		$message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');
		if(empty($_POST['name'])) {
			$message = "Empty Title";
		}
		$title = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
		$title = mysqli_real_escape_string($conn,  $title);
		$date3 = date("Y-m-d");
      	$date2 = date("H:i:s");
      	 $date4 = $time_in_12_hour_format = date("g:i a", strtotime($date2));
      	 $date = $date3 . " " . $date4;
      	 $altdate = date("H:i:s");
      	  $altdate = $time_in_12_hour_format = date("g:i a", strtotime($date2));
		 if (empty($_FILES['file']['name'])) { 
		$sql = "INSERT INTO notes (fromemail, fromid, title, message, date) VALUES ('$email', '$id', '$title', '$message', '$date')";
		$result = $conn->query($sql);
		$sql2 = "INSERT INTO wall (fromname, fromid, typewall, date, altdate) VALUES ('$email', '$id', 'Note', '$date', '$altdate')";
		$result2 = $conn->query($sql2);
		header("Location: notes.php?id=".$id."");
		exit();
	}
		$filetype = mysqli_real_escape_string($conn, $_FILES['file']['type']);
		$file = mysqli_real_escape_string($conn, $_FILES['file']['name']);
		$allowed = array("image/jpeg", "image/gif", "image/png", "image/tif", "image/jpg");
		
		if(!in_array($filetype, $allowed) && !empty($_FILES['file']['name'])) {
			header("Location: notes.php?id=".$id."&filetypenotallowed");
		} else {
			$filename = uniqid($file).$file;
			$filevid = password_hash($_FILES['file']['tmp_name'], PASSWORD_DEFAULT);
			$filename = uniqid($file).$file;
			move_uploaded_file($_FILES['file']['tmp_name'],"img/".$filename);
			
			$sql3 = "INSERT INTO notes (fromemail, fromid, title, message, file, filetype, date) VALUES ('$email', '$id', '$title', '$message', '$filename', '$type', '$date')";
			$result3 = $conn->query($sql3);
			$sql2 = "INSERT INTO wall (fromname, fromid, typewall, date, altdate) VALUES ('$email', '$id', 'Note', '$date', '$altdate')";
		$result2 = $conn->query($sql2);
			header("Location: notes.php?id=".$id."");
	}
	
}