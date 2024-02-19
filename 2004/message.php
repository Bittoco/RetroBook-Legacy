<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>theretrobook | Read Message</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	 <link rel="icon" type="image/x-icon" href="favicon.png">
     <link ref="apple-touch-icon" sizes="128x128" href="favicon.png">
</head>
<body>
	<center>
<div class="header">
	<a href="index.php" style="text-decoration: none"><h1 class="name">[ theretrobook ]</h1></a>
	<?php 
	include 'header.php';
	if(!isset($_SESSION['email']) && $_SESSION['id']) {
		header("location: index.php");
	}
	?>
</div>
<div class="welcome">
	<p class="welcometext">Read Message</p>
	<div class="mb">
	<div class="border">
	<h2 class="messagesign">[ Read Message ]</h2><br>
	<?php 
	$id = $_GET['id'];
	$sql = "SELECT * FROM messages WHERE id = '$id'";
	$result = $conn->query($sql);
	$resultCheck = mysqli_num_rows($result);
	if($resultCheck > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		if($_SESSION['email'] != $row['toemail'] && $_SESSION['email'] != $row['fromemail']) {
			header("location: mymessages.php");
			exit();
		} else {
			
			echo '<div class="message">
			<div class="subjectheader">'.$row['subject'].'</div>
			<p class="info"><b>From: </b><br>';
			
			
			echo '<b>To: </b><br>';
			
			echo '
			<b>Subject: </b><br>
			<b>Message: </b>
			</p>';
			$from = $row['fromid'];
			$sql2 = "SELECT * FROM users WHERE id = '$from'";
			$result2 = $conn->query($sql2);
			while($row2 = mysqli_fetch_assoc($result2)) {
			echo '<p class="minfo"><a class="nlink" href="profile.php?id='.$from.'">'.$row2['name'].'</a>';
			}
			$from = $row['toid'];
			$sql2 = "SELECT * FROM users WHERE id = '$from'";
			$result2 = $conn->query($sql2);
			while($row2 = mysqli_fetch_assoc($result2)) {
			echo '<br><a class="nlink" href="profile.php?id='.$from.'">'.$row2['name'].'</a>';
			}
			echo '<br>'.$row['subject'].'<br>
			</p>';
			echo '<p class="mess">'.$row['message'].'</p>';
			if($_SESSION['email'] === $row['toemail'] && $row['status'] === "Unread") {
			echo '<form action="message.inc.php" method="post">
			<input type="hidden" value="'.$row['id'].'" name="id">
			<button type="submit" name="marksubmit" class="mar">Mark as Read</button>
			</form>';
			}
			echo '</div>';
		
	}}
	} else {
		header("location: mymessages.php");
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
		margin-top: 0px;
		margin-bottom: 25px;
		top: 20px;
		position: relative;
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
		min-height: 50px;
		border: 1px solid #3D65C2;
		width: 80%;
		margin-bottom: 20px;
	}
	.subjectheader {
		vertical-align: top;
		background-color: #3C589C;
		color: white;
		font-size: 11px;
		min-height: 18px;
		text-align: left;
		padding-left: 5px;
	}
	.info {
		font-size: 13px;
		text-align: left;
		line-height: 25px;
		
		width: 90%;
	}
	.minfo {
		text-align: left;
		font-size: 13px;
		line-height: 25px;
		width: 75%;
		margin-left: 120px;
		margin-bottom: 30px;
		margin-top: -115px;
	}
	.mar {
		position: relative;
		top: -5px;
		border-style: solid;
    border-top-width: 1px;
    border-bottom-width: 2px;
    border-right-width: 2px;
    border-left-width: 1px;
    border-top-color: #D9DFEA;
    border-bottom-color: #3B5998;
    border-right-color: #3B5998;
    border-left-color: #D9DFEA;
    background-color: #538ADC;
    font-family: Tahoma, arial;
    color: white;
    	margin-bottom: 20px;
	}
	.nlink {
		text-decoration: none;
		color: #538AE3;;
	}
	.nlink:hover {
		text-decoration: underline;
		color: #6EB3E3;
	}
	.mess {
		text-align: left;
		font-size: 13px;
		margin-top: -25px;
		width: 75%;
		margin-left: 120px;
		margin-bottom: 30px;
		
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
		.minfo {
			width: 70%;
		}
		.mess {
			width: 70%;
		}
	}
</style>
</html>