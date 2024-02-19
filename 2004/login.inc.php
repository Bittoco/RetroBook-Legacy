<?php 
	include 'dbh.inc.php';
$email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
$pwd = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');
if (empty($_POST['email'])) {
		header("location: login.php?e=1");
     	exit();
	}
if (empty($_POST['password'])) {
		header("location: login.php?e=2");
     	exit();
	}
	 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {     	
     	header("location: ../login.php?e=2");
     	exit();
     } 
     $sql = "SELECT * FROM users WHERE email = '$email'";
     $result = $conn->query($sql);
     $resultCheck = mysqli_num_rows($result);
     if ($resultCheck <= 0) {
     	header("location: login.php?e=3");
     	exit();
     } else {
     	while($row = mysqli_fetch_assoc($result)) {
     		if (password_verify($pwd, $row['password']) === true) {
     			session_start();
     			$name = $row['name'];
     			$email = $row['email'];
     			$sql2 = "UPDATE users SET onlinestatus = 'Online' WHERE email = '$email'";
				$result2 = $conn->query($sql2);
     			$_SESSION['name'] = $name;
				$_SESSION['email'] = $email;
				$_SESSION['id'] = $row['id'];
				header("location: home.php");
				exit();
     		} else {
     			header("location: login.php?e=4");
     	exit();
     		}
     	}
     }