<?php 

include 'dbh.inc.php';
include 'header.php';
if(isset($_POST['submit'])) {
	if(empty($_FILES['file']['name'])) {
		header("location: uploadphoto.php");
		exit();
	}
$email = htmlspecialchars($_SESSION['email'], ENT_QUOTES, 'UTF-8');
$id = htmlspecialchars($_SESSION['id'], ENT_QUOTES, 'UTF-8');
 $filetype = mysqli_real_escape_string($conn, $_FILES['file']['type']);
$file = mysqli_real_escape_string($conn, $_FILES['file']['name']);
$allowed = array("image/jpeg", "image/gif", "image/png", "image/tif", "image/jpg");
$caption = $_POST['caption'];
$caption = htmlspecialchars($caption, ENT_QUOTES, 'UTF-8');
 $caption = mysqli_real_escape_string($conn, $caption);

		if(!in_array($filetype, $allowed) && !empty($_FILES['file']['name'])) {
			header("Location: uploadphoto.php?p=wrongfiletype!");
		} else {
		$date3 = date("Y-m-d");
      	$date2 = date("H:i:s");
      	 $date4 = $time_in_12_hour_format = date("g:i a", strtotime($date2));
      	 $date = $date3 . " " . $date4;
      	 $altdate = date("H:i:s");
      	  $altdate = $time_in_12_hour_format = date("g:i a", strtotime($date2));


		$filename = uniqid($file).$file;
		$filevid = password_hash($_FILES['file']['tmp_name'], PASSWORD_DEFAULT);
		$name = $_SESSION['name'];
		move_uploaded_file($_FILES['file']['tmp_name'],"img/".$filename);
		$sql2 = "INSERT INTO photos (fromname, fromid, photo, caption, date) VALUES ('$name', '$id', '$filename', '$caption','$date')";
		$result2 = $conn->query($sql2);
		$id = $_SESSION['id'];
		

		$sql2 = "INSERT INTO wall (fromname, fromid, typewall, date, altdate) VALUES ('$email', '$id', 'Photo', '$date', '$altdate')";
		$result2 = $conn->query($sql2);

		$sql = "SELECT * FROM photos WHERE photo = '$filename'";
		$result = $conn->query($sql);
		while($row = mysqli_fetch_assoc($result)) {
			header("location: photo.php?p=".$row['id']."");
		}
	}
}