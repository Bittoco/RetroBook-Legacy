<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>theretrobook | Welcome</title>
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
	if(isset($_SESSION['email'])) {
		header("location: home.php");
		exit();
	}
	?>
</div>
<div class="welcome">
	<p class="welcometext">Login</p>
	<div class="border">
		<h2 class="loginsign">[ Login ]</h2>
		<div class="form">
		<p class="namee">Email:<br><br>Password: </p>

		<form method="post" action="login.inc.php">
		<div class="form1">
		<input type="email" name="email" class="emailsignup">
		<input type="password" name="password" class="passsignup">
		<button type="submit" name="submit" class="rn">Login</button>
		</form>
	</form>
		
	</div>
	<a href="signup.php"><button class="reg">Register</button></a>
	
	</div>
	<?php 
	if(isset($_GET['e'])) {
		if ($_GET['e'] === "1") {
			$error = "<label class='error'>Empty Fields!</label>";
		} 
		if ($_GET['e'] === "2") {
			$error = "<label class='error'>Empty Password!</label>";
		} 
		if ($_GET['e'] === "3") {
			$error = "<label class='error'>Invalid Email!</label>";
		}
		if ($_GET['e'] === "4") {
			$error = "<label class='error'>Wrong Password!</label>";
		}  
	}
	else {
			$error = "";
		}
	echo $error;
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
	.nameinput {
		position: relative;
		top: -115px;
		left: 70px;
		font-size: 12px;
		height: 16px;
		width: 200px;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
	}
	.status {
		position: relative;
		top: -107px;
		left: 93px;
		font-size: 12px;
		height: 20px;
		width: 150px;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
	}
	.emailsignup {
		position: absolute;
		margin-left: -62px;
		margin-top: -75px;
		font-size: 12px;
		width: 200px;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
	}
	.passsignup {
		position: absolute;
		margin-left: -62px;
		margin-top: -40px;
		font-size: 12px;
		width: 200px;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
	}
	.rn {
		position: relative;
		top: -5px;
		border-top-color: #D9DFEA;
    	border-left-color: #D9DFEA;
    	border-bottom-color: #3B5998;
    	border-right-color: #3B5998;
    	background-color: #3D65C2;
    	color: white;
    	font-family: Tahoma,Verdana,Segoe,sans-serif;
    	left: -60px;
    	width: 80px;
	}
	.reg {
		position: relative;
		top: -7px;
		border-top-color: #D9DFEA;
    	border-left-color: #D9DFEA;
    	border-bottom-color: #3B5998;
    	border-right-color: #3B5998;
    	background-color: #3D65C2;
    	color: white;
    	font-family: Tahoma,Verdana,Segoe,sans-serif;
    	left: 30px;
    	width: 80px;
    	z-index: 5;
	}
	.error {
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		font-weight: bolder;
		font-size: 14px;
		position: relative;
		top: 20px;
	}
	.form1 {
		position: relative;
		top: 20px;
		left: 0px;
	}
	.error {
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		font-weight: bolder;
		font-size: 14px;
		position: relative;
		top: 5px;
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


	}
</style>
</html>