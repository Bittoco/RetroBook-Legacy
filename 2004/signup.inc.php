<?php 

include 'dbh.inc.php';
$name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
$status =htmlspecialchars($_POST['status'], ENT_QUOTES, 'UTF-8');
$email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
$pwd = password_hash($_POST['password'], PASSWORD_DEFAULT);
$pwd = htmlspecialchars($pwd, ENT_QUOTES, 'UTF-8');
$date3 = date("Y-m-d");

if (empty($_POST['email'] && $_POST['name'] && $_POST['password'])) {
		header("location: signup.php?e=1");
     	exit();
	}

$sql = "SELECT * FROM users WHERE email = '$email'";
$result = $conn->query($sql);
$resultCheck = mysqli_num_rows($result);
if($resultCheck > 0) {
	header("location: signup.php?e=3");
	exit();
}
if(!isset($_POST['check'])) {
	header("location: signup.php?e=4");
	exit();
}

$sql = "INSERT INTO users (name, status, email, password, datejoined, lastupdated) VALUES ('$name', '$status', '$email', '$pwd', '$date3', '$date3')";
$result = $conn->query($sql);
$sql3 = "SELECT * FROM users WHERE email = '$email';";
$result3 = $conn->query($sql3);
while($row3 = mysqli_fetch_assoc($result3)) {
session_start();
$_SESSION['id'] = $row3['id'];
$_SESSION['name'] = $name;
$_SESSION['email'] = $email;
$sql2 = "UPDATE users SET onlinestatus = 'Online' WHERE email = '$email'";
$result2 = $conn->query($sql2);
 header("location: home.php");
 exit();
}