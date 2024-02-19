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
		<a href="index.php" style="text-decoration: none"><img src="logo.png" class="logo"/></a>
		<img src="faceman.png" class="face"/>
	<?php 
	include 'header.php';
	if(isset($_SESSION['email'])) {
		header("location: home.php");
		exit();
	}
	?>
</div>
<div class="welcome">
	<p class="welcometext">Welcome to theretrobook!</p>
	<div class="border">
		<p class="desc">
			<b>retrobook is an retro-online directory that connects people through social networks.</b><br><br>You can use the retrobook to: <br><br>
			<ul>
			<li><a style="color: black;">Look up people around you.</a></li>
				<li><a style="color: black;">See how people know each other.</a></li>
				<li><a style="color: black;">Make groups and events with your friends.</a></li>
			</ul>
		</p>
		<a href="login.php"><button class="login">Login</button></a>
		<a href="signup.php"><button class="signup">Register</button></a>
	</div>
	
</div>

<?php
	require 'loginarea.php';
?>
	</center>
	
</body>

<style type="text/css">
	ul {
		margin-top: -10px;
		 list-style-type: square;
		 color: #3B5998;
	}
	li a {
		color: black;
	}
	li {
		text-align: left;
		font-size: 11px;
	}
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
	.name {
		position: relative;
		left: 100px;
		left: 120px;
		color: #538BDE;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		font-size: 35px;
		top: -px;
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
	.border {
		position: relative;
		border: 1px solid lightgray;
		height: 160px;
		background-color: white;
		top: -10px;
		width: 600px;
		left: -1px;
		border-bottom: 2px solid #3D65C2;
	}
	.desc {
		position: relative;
		text-align: left;
		left: 20px;
		font-size: 11px;

	}
	.face {
		top: -31px;
		border-top-left-radius: 5px;
		border-bottom-left-radius: 5px;
		left: -365px;
		position: relative;
		z-index: -1;
	}
	.login {
		border-style: solid;
    border-top-width: 1px;
    border-left-width: 1px;
    border-bottom-width: 1px;
    border-right-width: 1px;
    border-top-color: #D9DFEA;
    border-left-color: #D9DFEA;
    border-bottom-color: #0e1f5b;
    border-right-color: #0e1f5b;
    background-color: #3b5998;
    color: #FFFFFF;
    font-size: 11px;
    font-family: "lucida grande", tahoma, verdana, arial, sans-serif;
    position: relative;
    left: -80px;
	}
	.signup {
		border-style: solid;
    border-top-width: 1px;
    border-left-width: 1px;
    border-bottom-width: 1px;
    border-right-width: 1px;
    border-top-color: #D9DFEA;
    border-left-color: #D9DFEA;
    border-bottom-color: #0e1f5b;
    border-right-color: #0e1f5b;
    background-color: #3b5998;
    color: #FFFFFF;
    font-size: 11px;
    font-family: "lucida grande", tahoma, verdana, arial, sans-serif;
    position: relative;
    left: 80px;
	}
	@media only screen and (max-width:700px) {
		.name {
			left: -30px;
			font-size: 25px;
			margin-top: 30px;
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
			height: 250px;
			width: 400px;
			top: -12px;
		}
		.desc {
			width: 360px;
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