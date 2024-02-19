<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Retrobook | My Messages</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	 <link rel="icon" type="image/x-icon" href="favicon.png">
     <link ref="apple-touch-icon" sizes="128x128" href="favicon.png">
</head>
<body>
	<center>
<div class="header">
		<a href="index.php" style="text-decoration: none"><img src="logo.png" class="logo"/></a>
		<img src="faceman.png" class="face"/>
	<?php 
	include 'header.php';
	if(!isset($_SESSION['email'])) {
		header("location: home.php");
		exit();
	}
	?>
</div>
<div class="welcome">
	<p class="welcometext">My Messages</p>
	<div class="border">
		<?php 
		if(!isset($_SESSION['email']) && $_SESSION['id']) {
			header("location: index.php");
		}
		$email = $_SESSION['email'];
		$sql = "SELECT * FROM messages WHERE toemail = '$email' AND status = 'Unread' ORDER BY id DESC";
		$result = $conn->query($sql);
		$resultCheck = mysqli_num_rows($result);
		if($resultCheck > 0) {
	} else {
		echo '';
	}
		?>
		<br>
		<?php 
		$email = $_SESSION['email'];
		$sql = "SELECT * FROM messages WHERE toemail = '$email' ORDER BY id DESC";
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
					if($row2['pfp'] === "") {
						$pfp = "pfp.jpg";
					} else {
						$pfp = "img/".$row2['pfp'];
					}
					if($row['status'] === "Unread") {
						$style3 = "background: #F4F7FC;border-top: 1px solid #E5E7EA;border-bottom: 1px solid #E5E7EA;";
					} else {
						$style3 = "";
					}
					echo '<div class="message" style="'.$style3.'">
					<img src="'.$pfp.'" class="pfp"/>
					<a href="profile.php?id='.$row2['id'].'" class="name">'.$row2['name'].'</a>
					<a href="message.php?id='.$row['id'].'" class="subject">'.$row['subject'].'</a>

					</div>';
				}
			}
		}  else {
			echo '<p class="desc"><b>You have no messages sent towards you.</b></p>';
		}
		?>
	</div>
</div>
<?php
	require 'loginarea.php';
?>
	</center>
</body>
<style type="text/css">
	.header {
		position: relative;
		border: 1px solid #3B5999;
		width: 601px;
		margin-left: -1px;
		background-color: #3B5998;
		left: 75px;
		height: 35px;
		border-radius: 5px;
		z-index: 3;
	}
	.welcome {
		position: relative;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		border-top: 0px solid;
		border: 1px solid #3B5998;
		background-color: #6D84B4;
		width: 600px;
		height: 25px;
		z-index: 5;
		top: -15px;
		margin-top: 10px;
		left: 75px;
	}
	.welcome a {
		color: #6D84B4;
	}
	.logo {
		height: 30px;
		display: flex;
		margin-right: auto;
		position: relative;
		top: 2px;
	}
	.welcometext {
		color: white;
		position: relative;
		margin-top: 5px;
		text-align: left;
		margin-left: 10px;
		font-size: 14px;
		font-weight: bolder;
	}
	.welcometext {
		color: white;
		position: relative;
		margin-top: 5px;
		left: 5px;
		text-align: left;
	}
	.face {
		top: -31px;
		border-top-left-radius: 5px;
		border-bottom-left-radius: 5px;
		left: -365px;
		position: relative;
		z-index: -1;
	}
	.border {
		position: relative;
		border: 1px solid lightgray;
		min-height: 100px;
		background-color: white;
		top: -10px;
		width: 600px;
		left: -1px;
		border-bottom: 2px solid #3D65C2;
	}
	.desc {
		position: relative;
		text-align: left;
		left: 10px;
		font-size: 15px;
	}
	.note {
		text-align: left;
		position: relative;
		top: -8px;
		left: 14px;
		font-size: 14px;
		color: darkgray;
		font-family: calibri;
	}
	.no {
		text-align: left;
		color: darkgray;
		font-size: 12px;
		font-weight: bolder;
		border-top: 1px solid #D5D5D5;
		color: #56524A;
		padding-top: 10px;
		margin-top: -1px;
		padding-left: 10px;
	}
	.message {
		background: white;
		border-top: 1px solid lightgray;
		border-bottom: 1px solid lightgray;
		display: flex;
		position: relative;
		top: -1px;
		width: 90%;
		margin-bottom: 10px;
	}
	.pfp {
		min-height: 55px;
		
		max-width: 70px;
		max-height: 80px;
		padding: 5px;
		padding-left: 30px;
	}
	.name {
		vertical-align: center;
		margin-top: 4.5%;
		color: #3B5999;
		text-decoration: none;
		text-align: left;
		font-family: calibri;
		font-weight: bold;
		display: block;
		width: 200px;
	}
	.name:hover {
		text-decoration: underline;
	}
	.subject {
		 white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
 width: 360px;
 text-align: left;
 float: right;
 margin-left: auto;
 font-weight: bold;
 font-family: calibri;
font-weight: bold;
color: #3B5999;
text-decoration: none;
margin-top: 4.5%;
	}
	.subject:hover {
		text-decoration: underline;
	}
	@media only screen and (max-width:700px) {
		.name {
		
		}
		.header {
			width: 600px;
			left: 30px;
		}
		.welcome {
			left: 0px;
			width: 400px;
			z-index: 2;
		}
		.welcometext {
			margin-left: 5px;
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
	@media only screen and (max-width:500px) {
			.header {
				left: 0px;
			}
		}
</style>
</html>