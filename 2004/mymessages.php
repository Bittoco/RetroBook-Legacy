<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>theretrobook | My Messages</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	 <link rel="icon" type="image/x-icon" href="favicon.png">
     <link ref="apple-touch-icon" sizes="128x128" href="favicon.png">
</head>
<body>
	<center>
<div class="header">
	<h1 class="name">[ theretrobook ]</h1>
	<?php 
	include 'header.php';
		if(!isset($_SESSION['email'])) {
		header("location: index.php");
		exit();
	}
	?>
</div>
<div class="welcome">
	<p class="welcometext">My Messages</p>
	<div class="mb">
	<div class="border">
		<?php 
		if(!isset($_SESSION['email']) && $_SESSION['id']) {
			header("location: index.php");
		}
		$email = $_SESSION['email'];
		$sql = "SELECT * FROM messages WHERE toemail = '$email' AND status = 'Unread' ORDER BY date DESC";
		$result = $conn->query($sql);
		$resultCheck = mysqli_num_rows($result);
		if($resultCheck > 0) {
		echo '<h2 class="messagesign">[ '.$resultCheck.' New Messages ]</h2>';
	} else {
		echo '';
	}
		?>
		<br>
		<?php 
		$email = $_SESSION['email'];
		$sql = "SELECT * FROM messages WHERE toemail = '$email' ORDER BY date DESC";
		$result = $conn->query($sql);
		$resultCheck = mysqli_num_rows($result);
		if($resultCheck > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				if($row['date'] === "") {
					$date = "Unknown";
				} else {
					$date = $row['date'];
				}
				$fromid = $row['fromid'];
				$sql2 = "SELECT * FROM users WHERE id = '$fromid'";
				$result2 = $conn->query($sql2);
				while($row2 = mysqli_fetch_assoc($result2)) {
				echo '
				<a style="text-decoration: none; color" class="meslink" href="message.php?id='.$row['id'].'">
				<div class="message">
				<div class="messageheader">'.$row['subject'].'</div></a>
				<p class="mess">'.$row['message'].'</p><br>
				<p class="from">from: <a style="color: #538AE3;" class="flink" href="profile.php?id='.$fromid.'">'.$row2['name'].'</a></p>
				<p class="date">date sent: <a style="color: #538AE3;">'.$date.'</a></p>
				</div>';
			}}
		}  else {
			echo '<p class="desc"><b>You have no messages sent towards you.</b></p>';
		}
		?>
	</div>
</div></div>
<?php
	require 'loginarea.php';
?>
</div>
	</center>
</body>
<style type="text/css">
		.header {
		position: relative;
		border: 1px solid #3C589C;
		width: 700px;
		background-color: #3C589C;
		background-image: url("logo-left.jpg");
		background-repeat-x: no-repeat;
		height: 78px;
		background-repeat: no-repeat;
		
		z-index: 5;
	}
	.name {
		position: relative;
		left: 100px;
		left: 120px;
		color: #538BDE;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		font-size: 35px;
		top: -px;
		margin-top: 10px;
	}
	.messagesign {
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		font-size: 19px;
		font-weight: bolder;
		margin-top: -10px;
		top: 20px;
		position: relative;
	}
	.meslink {
		color: white;
	}
	.welcome {
		position: relative;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		border: 1px solid #3C589C;
		background-color: #3C589C;
		width: 548px;
		height: 30px;
		margin-top: 3px;
		left: 73px;
	}
	.welcometext {
		color: white;
		position: relative;
		margin-top: 3px;
		text-align: left;
		margin-left: 5px;
		font-size: 12px;

	}
	.border {
		position: relative;
		border: 1px solid #3C589C;
		min-height: 250px;
		background-color: white;
		top: -9px;
		width: 548px;
		left: 73px;
		margin-top: -7px;
		border-bottom: 2px solid #3C589C;
	}
	.desc {
		position: relative;
		text-align: left;
		left: 10px;
		font-size: 15px;
	}
	.message {
		border: 1px solid #3D65C2;
		min-height: 70px;
		margin-bottom: 20px;
		max-width: 90%;

	}
	.messageheader {
		font-size: 11px;
		background-color: #3C589C;
		color: White;
		text-align: left;
		padding-left: 5px;
		min-height: 16px;
		padding-top: 3px;
	}
	.mess {
		font-size: 11px;
		text-align: left;
		padding-left: 5px;
		white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
 
  width: 90%;
	}
	.from {
		text-align: left;
		font-size: 13px;
		margin-top: -20px;
		padding-left: 25px;
	}
	.flink {
		text-decoration: none;
	}
	.flink:hover {
		text-decoration: underline;
		color: #6EB3E3;
	}
	.date {
		text-align: left;
		font-size: 13px;
		padding-left: 25px;
	}
	.mb {
		width: 700px;
		left: -150px;
		position: relative;
		border: 1px dashed #3B5998;
		position: relative;
		top: -32px;
		padding-top: 40px;
		clear: both;
		border-top: 0px solid;
	}
	@media only screen and (max-width:700px) {
		.name {
			left: -30px;
			font-size: 25px;
			margin-top: 30px;
		}
		.header {
			width: 600px;
		}
		.welcome {
			left: 0px;
			width: 400px;
			z-index: 2;
		}
		.welcometext {
		
	}
		.border {
			
			width: 400px;
			top: -12px;
		}
		.desc {
			width: 380px;
		}
		.login {
			top: 30px;
			height: 30px;
		}
		.signup {
			top: 30px;
			height: 30px;
		}
		

	}
</style>
</html>