<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>theretrobook | Edit Group Annoucement</title>
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
	if(!isset($_SESSION['email'])) {
		header("location: index.php");
	}
	?>
</div>
<div class="welcome">
	<?php 
	if(isset($_GET['gid'])) {
	$id = htmlspecialchars($_GET['gid'], ENT_QUOTES, 'UTF-8');
	$sql = "SELECT * FROM groups WHERE id = '$id'";
	$result = $conn->query($sql);
	$resultCheck = mysqli_num_rows($result);
	if($resultCheck > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		if($row['creator'] != $_SESSION['email']) {
			header("location: group.php?id=".$id."");
			exit();
		}
	echo '	
	<p class="welcometext">Edit '.$row['name'].' Annoucements</p>
	<div class="border">
		<h2 class="loginsign">Edit Annoucement</h2>
		<form method="post" action="group.inc.php">
		<textarea name="text" class="input" cols="50" rows="4" maxlength="210">'.$row['annoucement'].'</textarea><br>
		<button name="annoucesubmit" type="submit" class="rn">Edit</button>
		<input type="hidden" value="'.$id.'" name="id"/>
		</form>
	</div>';
	}
	} elseif($resultCheck <= 0) {
		header("location: home.php");
		exit();
	}
	} elseif (!isset($_GET['gid'])) {
		header("location: home.php");
		exit();
	}
	?>
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
		width: 700px;
		background-color: #3D65C2;
		background-image: url("banner3.png");
		height: 90px;

	}
	.name {
		position: relative;
		left: 100px;
		left: 120px;
		color: #538BDE;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		font-size: 35px;
		top: -px;
	}
	.loginsign {
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		font-size: 19px;
		font-weight: bolder;
	}
	.welcome {
		position: relative;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		border: 1px solid #3D65C2;
		background-color: #3D65C2;
		width: 550px;
		height: 30px;
		margin-top: 10px;
		left: 75px;
	}
	.welcometext {
		color: white;
		position: relative;
		margin-top: 5px;
		left: 5px;
		text-align: left;
	}
	.border {
		position: relative;
		border: 1px solid lightgray;
		height: 200px;
		background-color: white;
		top: -9px;
		width: 550px;
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
		font-size: 13px;
		position: relative;
		left: 100px;
		top: 10px;
		text-align: left;
		line-height: 16px;
	}
	.input {
		font-family: Tahoma,Verdana,Segoe,sans-serif;
	}
	.rn {
		position: relative;
		top: 15px;
		border-top-color: #D9DFEA;
    	border-left-color: #D9DFEA;
    	border-bottom-color: #3B5998;
    	border-right-color: #3B5998;
    	background-color: #3D65C2;
    	color: white;
    	font-family: Tahoma,Verdana,Segoe,sans-serif;
    	
    	width: 80px;
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
			height: 400px;
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


	}
</style>
</html>