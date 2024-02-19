<?php
include 'header.php';
if(isset($_GET['id'])) {
	$id = htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8');
	$id = mysqli_real_escape_string($conn,  $id);
	$sql = "SELECT * FROM songs WHERE id = '$id'";
	$result = $conn->query($sql);
	$fid = $_SESSION['id'];
	$email = $_SESSION['email'];
	if(mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$sql2 = "INSERT INTO profilesongs (songid, email) VALUES ('$id', '$email')";
			$result2 = $conn->query($sql2);
			$date3 = date("Y-m-d");
      	$date2 = date("H:i:s");
      	 $date4 = $time_in_12_hour_format = date("g:i a", strtotime($date2));
      	 $date = $date3 . " " . $date4;
      	 $altdate = date("H:i:s");
      	  $altdate = $time_in_12_hour_format = date("g:i a", strtotime($date2));
				$sql4 = "INSERT INTO wall (fromname, fromid, typewall, date, altdate) VALUES ('$email', '$fid', 'iLike', '$date', '$altdate')";
				$result4 = $conn->query($sql4);
			header("location: songsilike.php");
			exit();
		}
	} else {
		header("location: app.php?id=2");
		exit();
	}
} else {
	header("location: myapps.php");
	exit();
}