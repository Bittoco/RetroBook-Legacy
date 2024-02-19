<?php 

include 'dbh.inc.php';
$email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
 $filetype = mysqli_real_escape_string($conn, $_FILES['file']['type']);
$file = mysqli_real_escape_string($conn, $_FILES['file']['name']);
	$file = htmlspecialchars($file, ENT_QUOTES, 'UTF-8');
$allowed = array("image/jpeg", "image/gif", "image/png", "image/tif", "image/jpg");
		
		if(!in_array($filetype, $allowed) && !empty($_FILES['file']['name'])) {
			header("Location: editpicture.php?e=1");
		} else {
		
		$filename = uniqid($file).$file;
		$filevid = password_hash($_FILES['file']['tmp_name'], PASSWORD_DEFAULT);
		move_uploaded_file($_FILES['file']['tmp_name'],"img/".$filename);
		$sql2 = "UPDATE users SET pfp = '$filename' WHERE email = '$email'";
		$result2 = $conn->query($sql2);
		$sql = "SELECT * FROM users WHERE email = '$email'";
		$result = $conn->query($sql);
		while($row = mysqli_fetch_assoc($result)) {
			header("location: profile.php?id=".$row['id']."");
		}
	}
if(isset($_POST['lsubmit'])) {
	$email = $_POST['email'];
	$sql = "UPDATE users SET pfp = '' WHERE email = '$email'";
	$result = $conn->query($sql);
}	