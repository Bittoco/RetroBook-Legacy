<?php 

include 'dbh.inc.php';
if(isset($_POST['submit'])) {
$email = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');
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