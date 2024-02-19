<?php 

include 'dbh.inc.php';
if (isset($_POST['annoucesubmit'])) {
$text = htmlspecialchars($_POST['text'], ENT_QUOTES, 'UTF-8');
$text = mysqli_real_escape_string($conn,  $text);
$id = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');
$id = mysqli_real_escape_string($conn,  $id);
$sql = "UPDATE groups SET annoucement = '$text' WHERE id = '$id'";
$result = $conn->query($sql);
$sql2 = "SELECT * FROM groups WHERE id = '$id'";
$result2 = $conn->query($sql2);
$resultCheck2 = mysqli_num_rows($result2);
if($resultCheck2 < 0) {
	header("location: home.php");
	exit();
}
header("location: group.php?id=".$id."");
exit();
}
if (isset($_POST['descsubmit'])) {
$text = htmlspecialchars($_POST['text'], ENT_QUOTES, 'UTF-8');
$text = mysqli_real_escape_string($conn,  $text);
$id = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');
$id = mysqli_real_escape_string($conn,  $id);
$sql = "UPDATE groups SET description = '$text' WHERE id = '$id'";
$result = $conn->query($sql);
$sql2 = "SELECT * FROM groups WHERE id = '$id'";
$result2 = $conn->query($sql2);
$resultCheck2 = mysqli_num_rows($result2);
if($resultCheck2 < 0) {
	header("location: home.php");
	exit();
}
header("location: group.php?id=".$id."");
exit();
}
if (isset($_POST['mainsubmit'])) {
$desc = htmlspecialchars($_POST['desc'], ENT_QUOTES, 'UTF-8');
$desc = mysqli_real_escape_string($conn,  $desc);
$id = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');
$id = mysqli_real_escape_string($conn,  $id);
$annouce = htmlspecialchars($_POST['annouce'], ENT_QUOTES, 'UTF-8');
$annouce = mysqli_real_escape_string($conn,  $annouce);
$custom1 = htmlspecialchars($_POST['custom1'], ENT_QUOTES, 'UTF-8');
$custom1 = mysqli_real_escape_string($conn,  $custom1);
$table1 = htmlspecialchars($_POST['table1'], ENT_QUOTES, 'UTF-8');
$table1 = mysqli_real_escape_string($conn,  $table1);
$sql = "UPDATE groups SET description = '$desc' WHERE id = '$id'";
$result = $conn->query($sql);
$sql = "UPDATE groups SET annoucement = '$annouce' WHERE id = '$id'";
$result = $conn->query($sql);
$sql = "UPDATE groups SET tableh1 = '$custom1' WHERE id = '$id'";
$result = $conn->query($sql);
$sql = "UPDATE groups SET customtable = '$table1' WHERE id = '$id'";
$result = $conn->query($sql);
$sql2 = "SELECT * FROM groups WHERE id = '$id'";
$result2 = $conn->query($sql2);
$resultCheck2 = mysqli_num_rows($result2);
if($resultCheck2 < 0) {
	header("location: home.php");
	exit();
}
header("location: group.php?id=".$id."");
exit();
}
if (isset($_POST['custsubmit'])) {
$text = htmlspecialchars($_POST['text'], ENT_QUOTES, 'UTF-8');
$text = mysqli_real_escape_string($conn,  $text);

$tableh = htmlspecialchars($_POST['tableh'], ENT_QUOTES, 'UTF-8');
$tableh = mysqli_real_escape_string($conn,  $tableh);

$id = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');
$id = mysqli_real_escape_string($conn,  $id);
$sql = "UPDATE groups SET customtable = '$text' WHERE id = '$id'";
$result = $conn->query($sql);
$sql = "UPDATE groups SET tableh1 = '$tableh' WHERE id = '$id'";
$result = $conn->query($sql);
$sql2 = "SELECT * FROM groups WHERE id = '$id'";
$result2 = $conn->query($sql2);
$resultCheck2 = mysqli_num_rows($result2);
if($resultCheck2 < 0) {
	header("location: home.php");
	exit();
}
header("location: group.php?id=".$id."");
exit();
}

if(isset($_POST['rsubmit'])) {
	$reply = htmlspecialchars($_POST['reply'], ENT_QUOTES, 'UTF-8');
	$reply = mysqli_real_escape_string($conn,  $reply);
	$id = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');
	$id = mysqli_real_escape_string($conn,  $id);
	include 'header.php';
	$name = htmlspecialchars($_SESSION['name'], ENT_QUOTES, 'UTF-8');
	$name = mysqli_real_escape_string($conn,  $name);
	$uid = htmlspecialchars($_SESSION['id'], ENT_QUOTES, 'UTF-8');
	$uid = mysqli_real_escape_string($conn,  $uid);
	$date3 = date("Y-m-d");
     $date2 = date("H:i:s");
     $date4 = $time_in_12_hour_format = date("g:i a", strtotime($date2));
     $date = $date3 . " " . $date4;
	$sql = "INSERT INTO replies (creatorid, creatorname, ogmessage, text, date) VALUES ('$uid', '$name', '$id', '$reply', '$date')";
	$result = $conn->query($sql);
	header("location: viewmessage.php?id=".$id."");
	exit();
}
if(isset($_POST['resubmit'])) {
	$reply = htmlspecialchars($_POST['reply'], ENT_QUOTES, 'UTF-8');
	$reply = mysqli_real_escape_string($conn,  $reply);
	$id = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');
	$id = mysqli_real_escape_string($conn,  $id);
	$group = htmlspecialchars($_POST['group'], ENT_QUOTES, 'UTF-8');
	$group = mysqli_real_escape_string($conn,  $group);
	include 'header.php';
	$name = htmlspecialchars($_SESSION['name'], ENT_QUOTES, 'UTF-8');
	$name = mysqli_real_escape_string($conn,  $name);
	$uid = htmlspecialchars($_SESSION['id'], ENT_QUOTES, 'UTF-8');
	$uid = mysqli_real_escape_string($conn,  $uid);
	$date3 = date("Y-m-d");
     $date2 = date("H:i:s");
     $date4 = $time_in_12_hour_format = date("g:i a", strtotime($date2));
     $date = $date3 . " " . $date4;
	$sql = "INSERT INTO replies (creatorid, creatorname, ogmessage, text, date) VALUES ('$uid', '$name', '$id', '$reply', '$date')";
	$result = $conn->query($sql);
	header("location: viewmessage.php?id=".$id."");
	exit();
}
if(isset($_POST['csubmit'])) {
	$message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');
	$message = mysqli_real_escape_string($conn,  $message);
	$group = $_POST['gid'];
	include 'header.php';
	$name = htmlspecialchars($_SESSION['name'], ENT_QUOTES, 'UTF-8');
	$name = mysqli_real_escape_string($conn,  $name);
	$uid = htmlspecialchars($_SESSION['id'], ENT_QUOTES, 'UTF-8');
	$uid = mysqli_real_escape_string($conn,  $uid);
	$date3 = date("Y-m-d");
     $date2 = date("H:i:s");
     $date4 = $time_in_12_hour_format = date("g:i a", strtotime($date2));
     $date = $date3 . " " . $date4;

	$sql = "INSERT INTO messageboard (fgroup, message, date, creator, creatorname) VALUES ('$group', '$message', '$date', '$uid', '$name')";
	$result = $conn->query($sql);
	$sql2 = "SELECT * FROM messageboard WHERE fgroup = '$group' AND date = '$date'";
	$result2 = $conn->query($sql2);
	while($row = mysqli_fetch_assoc($result2)) {
		header("location: viewmessage.php?id=".$row['id']."");
		exit();
	}
	

}
if(isset($_POST['cresubmit'])) {
		include 'header.php';
	$name = $_POST['cname'];
	$name = htmlspecialchars($_POST['cname'], ENT_QUOTES, 'UTF-8');
	$name = mysqli_real_escape_string($conn,  $name);
	$desc = htmlspecialchars($_POST['desc'], ENT_QUOTES, 'UTF-8');
	$desc = mysqli_real_escape_string($conn,  $desc);
	if(empty($name)) {
			header("location: creategroup.php?e=Emptyf");
			exit();
		}
	$creator = $_SESSION['email'];
	$sql = "SELECT * FROM groups WHERE creator = '$creator'";
	$result = $conn->query($sql);
	$resultCheck = mysqli_num_rows($result);
	if($resultCheck >= 3) {
		header("location: creategroup.php?e=made");
		exit();
	}
	$date3 = date("Y-m-d");
     $date2 = date("H:i:s");
     $date4 = $time_in_12_hour_format = date("g:i a", strtotime($date2));
     $date = $date3 . " " . $date4;

	$sql = "INSERT INTO groups (name, creator, description, datemade) VALUES ('$name', '$creator', '$desc', '$date')";
	$result = $conn->query($sql);
	$sql2 = "SELECT * FROM groups WHERE name = '$name' AND creator = '$creator'";
	$result2 = $conn->query($sql2);
	while($row = mysqli_fetch_assoc($result2)) {
		$id = $row['id'];
	
	$sql = "INSERT INTO groupmem (fgroup, email, status, groupid) VALUES ('$name', '$creator', 'member', '$id')";
	$result = $conn->query($sql);
	header("location: group.php?id=".$id."");
	exit();
	}
}