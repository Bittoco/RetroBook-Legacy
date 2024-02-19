<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Retrobook Apps</title>
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
		header("location: index.php");
		exit();
	}
	?>
</div>
<div class="welcome">
	
<p class="welcometext">Application Directory</p>

	<div class="border">
		<p class="retroapps">Introducing Retrobook Apps!</p>
		<?php 
		$id = $_SESSION['email'];
		$sql = "SELECT * FROM userapps WHERE name = '$id'";
		$result = $conn->query($sql);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$appid = $row['appid'];
				$sql = "SELECT * FROM app WHERE id = '$appid'";
		$result = $conn->query($sql);
		while($row = mysqli_fetch_assoc($result)) {
			echo '<div class="app">';
			if($row['photo'] === "") {
				$pfp = "default.jpg";
			
			} else {
				$pfp = "img/".$row['photo']."";
			}
			echo '<img src="'.$pfp.'" class="pfp"/>';
			echo '<div class="right">
			<a class="name" href="app.php?id='.$row['id'].'">'.$row['name'].'</a>
			<p class="by">By Retrobook</p>
			<p class="desc">'.$row['caption'].'</p>
			</div>';
			echo '</div>';
		}
			}
			

		} else {
			echo '<p class="noapps">You have not subscribed to any apps yet.</p>';
		}
		echo '<p class="retroapps">Applications</p>';
		$sql = "SELECT * FROM app";
		$result = $conn->query($sql);
		while($row = mysqli_fetch_assoc($result)) {
			echo '<div class="app">';
			if($row['photo'] === "") {
				$pfp = "default.jpg";
			
			} else {
				$pfp = "img/".$row['photo']."";
			}
			if($row['name'] === "iLike") {
				echo '<img style="margin-left: 25px;position: relative; left: -30px;" src="'.$pfp.'" class="pfp"/>';
			} else {
				echo '<img src="'.$pfp.'" class="pfp"/>';
			}
			
			echo '<div class="right">
			<a class="name" href="app.php?id='.$row['id'].'">'.$row['name'].'</a>
			<p class="by">By Retrobook</p>
			<p class="desc">'.$row['caption'].'</p>
			</div>';
			echo '</div>';
		}
		?>
	</div>
	
	</div>
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
	.welcometext {
		color: white;
		position: relative;
		margin-top: 5px;
		left: 5px;
		font-weight: bold;
		text-align: left;
	}
	.logo {

		height: 30px;
		display: flex;
		margin-right: auto;
		position: relative;
		top: 2px;
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
		min-height: 200px;
		background-color: white;
		top: -10px;
		width: 600px;
		left: -1px;
		border-bottom: 2px solid #3D65C2;
	}
	.desc {
		position: relative;
		text-align: left;
		left: 5px;
		font-size: 13px;
		width: 520px;
	}
	.namee {
	}
	.retroapps {
		font-weight: bolder;
		text-align: left;
		font-size: 20px;
		color: #424349;
		font-size: 14px;
		margin-left: 10px;
	}
	.noapps {
		font-size: 12px;
		text-align: left;
		margin-left: 5%;
	}
	.pfp {
		
		max-height: 100px;
		max-width: 150px;
		float: left;
	}
	.app {
		overflow: auto;
		width: 90%;
		white-space: normal;
		margin-bottom: 15px;
	}
	.right {
		
		text-align: left;
		width: 70%;
		position: relative;
		left: 70px;
		
		border-bottom: 1px solid lightgray;
	}
	.app a {
		text-align: left;
		
		color: #3B5998;
		text-decoration: none;
		font-weight: bolder;
		position: relative;
		left: -50px;
	
	}
	.app a:hover {
		text-decoration: underline;
	}
	.by {
		color: lightgray;
		font-size: 12px;
		text-align: left;
		position: relative;
		left: -50px;
		margin-top: 0.5px;
	}
	.desc {
		white-space: normal;
		width: 110%;
		position: relative;
		text-align: left;
		left: -50px;
		top: -5px;
	}
	@media only screen and (max-width:700px) {
		.name {
			left: -25px;
			font-size: 25px;
			margin-top: 25px;
		}
		.namee {
			margin-left: -20px;
			top: 15px;
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
			min-height: 400px;
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
			height: 40px;
		}
		.form {
			position: relative;
			left: -50px;
			margin-top: -2px;
		}
		.rn {
			left: -40px;
			height: 30px;
		}
		.reg {
			left: 110px;
			top: -15px;
			height: 30px;
		}
		.error {
			left: 60px;
			top: 30px;
		}
		.form1 {
			position: relative;
			left: 60px;
			margin-top: 15px;
		}
		.photo {
			max-width: 300px;
			max-height: 400px;
		}
		@media only screen and (max-width:500px) {
			.header {
				left: 0px;
			}
		}
	}
</style>
</html>