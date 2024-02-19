<?php 
	include 'header.php';
	include 'dbh.inc.php';
	if(isset($_POST['submit'])) {
		date_default_timezone_set('America/New_York');
		$email = htmlspecialchars($_SESSION['email'], ENT_QUOTES, 'UTF-8');
		$id = htmlspecialchars($_SESSION['id'], ENT_QUOTES, 'UTF-8');
		$message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');
		$message = mysqli_real_escape_string($conn,  $message);
		$title = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
		$title = mysqli_real_escape_string($conn,  $title);
		$date3 = date("Y-m-d");
      	$date2 = date("H:i:s");
      	 $date4 = $time_in_12_hour_format = date("g:i a", strtotime($date2));
      	 $date = $date3 . " " . $date4;
      	 $altdate = date("H:i:s");
      	  $altdate = $time_in_12_hour_format = date("g:i a", strtotime($date2));
		 if (empty($_FILES['file']['name'])) { 
		$sql = "INSERT INTO  notes (fromemail, fromid, title, message, date) VALUES ('$email', '$id', '$title', '$message', '$date')";
		$result = $conn->query($sql);
		$sqln = "SELECT * FROM notes WHERE fromemail = '$email' AND date = '$date'";
		$resultn = $conn->query($sqln);
		while($row = mysqli_fetch_assoc($resultn)) {
			$nid = $row['id'];
		$sql2 = "INSERT INTO wall (fromname, fromid, typewall, noteid, date, altdate) VALUES ('$email', '$id', 'Note', '$nid', '$date', '$altdate')";
		$result2 = $conn->query($sql2);
		header("Location: noteblog.php?id=".$nid."");
		exit();
		}
	}
		$filetype = mysqli_real_escape_string($conn, $_FILES['file']['type']);
		$file = mysqli_real_escape_string($conn, $_FILES['file']['name']);
		$allowed = array("image/jpeg", "image/gif", "image/png", "image/tif", "image/jpg");
		
		if(!in_array($filetype, $allowed) && !empty($_FILES['file']['name'])) {
			header("Location: writenote.php?filetypenotallowed");
		} else {
			$filename = uniqid($file).$file;
			$filevid = password_hash($_FILES['file']['tmp_name'], PASSWORD_DEFAULT);
			$filename = uniqid($file).$file;
			move_uploaded_file($_FILES['file']['tmp_name'],"img/".$filename);
			$vidtype = array("video/mp4", "video/mov", "video/quicktime", "video/MOV");
			if (in_array($filetype, $vidtype)) {
				$type = "Video";
			}
			$phototype = array("image/jpeg", "image/gif", "image/png", "image/tif", "image/jpg");
			if (in_array($filetype, $phototype)) {
				$type = "Photo";
			}
			
			
			$sql3 = "INSERT INTO notes (fromemail, fromid, title, message, file, filetype, date) VALUES ('$email', '$id', '$title', '$message', '$filename', '$type', '$date')";
			$result3 = $conn->query($sql3);
			$sqln = "SELECT * FROM notes WHERE fromemail = '$email' AND date = '$date'";
			$resultn = $conn->query($sqln);
			while($row = mysqli_fetch_assoc($resultn)) {
				$nid = $row['id'];
			$sql2 = "INSERT INTO wall (fromname, fromid, typewall, noteid, date, altdate) VALUES ('$email', '$id', '$type Note', '$nid', '$date', '$altdate')";
		$result2 = $conn->query($sql2);
			header("Location: noteblog.php?id=".$row['id']."");
	}}
	
}