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
<div class="mb">
<div class="welcome">
	<p class="welcometext">Welcome to theretrobook!</p>
	<div class="border">
		<h3>[ Welcome to theretrobook ] </h3>
		<p class="desc">
			Theretrobook is an online directory that connects people through social networks at <br>colleges.<br><br>
			We have opened up Theretrobook for popular consumption <b>anywhere</b>.<br><br>
			You can use Theretrobook to:<br>
			• View profiles <br>
			• Find new people<br>
			• Find old friends<br>
		</p>
		<a href="login.php"><button class="login">Login</button></a>
		<a href="signup.php"><button class="signup">Register</button></a>
	</div>
</div>
</mb>
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
		background-color: #3C589C;
		background-image: url("logo-left.jpg");
		background-repeat-x: no-repeat;
		height: 78px;
		background-repeat: no-repeat;
		
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
		height: 250px;
		background-color: white;
		top: -9px;
		width: 548px;
		left: -1px;
		border-bottom: 2px solid #3C589C;
	}
	.desc {
		position: relative;
		text-align: left;
		left: 10px;
		font-size: 12px;
		width: 95%;
	}
	h3 {
		font-size: 19px;
	}
	.mb {
		width: 700px;
		min-height: 300px;
		border: 1px dashed #3B5998;
		position: relative;
		top: -1px;
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
			height: 30px;
		}
		

	}
</style>
</html>