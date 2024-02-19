<?php 

include 'dbh.inc.php';
include 'header.php';
if(isset($_POST['submit'])) {
$email = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');
$sql = "SELECT * FROM groups WHERE id = '$email'";
$result = $conn->query($sql);
$resultCheck = mysqli_num_rows($result);
if($resultCheck > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		if($row['creator'] != $_SESSION['email']) {
			header("location: mygroups.php");
			exit();
		}
	}
} else {
 	header("location: mygroups.php");
 	exit();
}
 $filetype = mysqli_real_escape_string($conn, $_FILES['file']['type']);
$file = mysqli_real_escape_string($conn, $_FILES['file']['name']);
$allowed = array("image/jpeg", "image/gif", "image/png", "image/tif", "image/jpg");
		
		if(!in_array($filetype, $allowed) && !empty($_FILES['file']['name'])) {
			header("Location: editpicture.php?e=1");
		} else {
		
		$filename = uniqid($file).$file;
		$filevid = password_hash($_FILES['file']['tmp_name'], PASSWORD_DEFAULT);
		move_uploaded_file($_FILES['file']['tmp_name'],"img/".$filename);
		$sql2 = "UPDATE groups SET pfp = '$filename' WHERE id = '$email'";
		$result2 = $conn->query($sql2);     	  

		$sql = "SELECT * FROM groups WHERE id = '$email'";
		$result = $conn->query($sql);
		while($row = mysqli_fetch_assoc($result)) {
			$name = $row['name'];
			$date = date("Y-m-d");
			 $altdate = date("H:i:s");
			 $date2 = date("H:i:s");
			 $altdate = $time_in_12_hour_format = date("g:i a", strtotime($date2));
			$sql2 = "INSERT INTO wall (fromname, fromid, typewall, date, altdate) VALUES ('$name', '$email', 'Group Picture', '$date', '$altdate')";
			$result2 = $conn->query($sql2);
			header("location: group.php?id=".$row['id']."");
		}
	}
}
if(isset($_POST['gsubmit'])) {
	$email = $_POST['id'];
	$sql = "UPDATE groups SET pfp = '' WHERE id = '$email'";
	$result = $conn->query($sql);
	header("location: group.php?id=".$email."");
	exit();
}	