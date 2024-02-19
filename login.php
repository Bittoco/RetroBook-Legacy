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
	<p class="welcometext">Login</p>
	<div class="border">
	    	<?php 
	if(isset($_GET['e'])) {
		if ($_GET['e'] === "1") {
			$error = "<label style='color: black;' class='error'>Empty Fields!</label>";
		} 
		if ($_GET['e'] === "2") {
			$error = "<label style='color: black;' class='error'>Empty Password!</label>";
		} 
		if ($_GET['e'] === "3") {
			$error = "<label style='color: black;' class='error'>Invalid Email!</label>";
		}
		if ($_GET['e'] === "4") {
			$error = "<label style='color: black;' class='error'>Wrong Password!</label>";
		}  
	}
	else {
			$error = "";
		}
	echo $error;
	?>	
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

	</div>
</div>
<?php
	require 'loginarea.php';
?>
	</center>
</body>
<style type="text/css">
	.form {
		position: relative;
		top: 10px;
		left: 20px;
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
	.loginsign {
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		font-size: 19px;
		font-weight: bolder;
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
		left: 5px;
		font-size: 13px;
		width: 520px;
	}
	
	.namee {
		font-size: 11px;
		position: relative;
		left: 130px;
		top: 10px;
		text-align: left;
		line-height: 16px;
		color: #808080;
		font-weight: bolder;
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
		border: 1px solid #bdc7d8;
		padding: 3px;
    	font-size: 11px;
	}
	.passsignup {
		position: absolute;
		margin-left: -62px;
		margin-top: -40px;
		font-size: 12px;
		width: 200px;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		border: 1px solid #bdc7d8;
		padding: 3px;
    	font-size: 11px;
	}
	.rn {
		position: relative;
		top: -6.8px;
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
    	left: -40px;
    	width: 50px;
	}
	.reg {
		position: relative;
		top: -7px;
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
    	left: 30px;
    	width: 60px;
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
		font-size: 13px;
		position: relative;
		top: 13px;
		left: 20px;
		color: black;
		width: 500px;
		border: 1px solid #E2C822;
		padding: 5px;
		text-align: left;
		display: block;
		background: #FFF9D7;
	}
	.face {
		top: -31px;
		border-top-left-radius: 5px;
		border-bottom-left-radius: 5px;
		left: -365px;
		position: relative;
		z-index: -1;
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
			height: 250px;
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
		.head {
			display: hidden;
			display: none;
		}
		@media only screen and (max-width:500px) {
			.header {
				left: 0px;
			}
		}	
		@media only screen and (max-width:450px) {
			.reg {
				width: 80px;
				height: 20px;
				position: relative;
				top: -10px;
			}
			.rn {
				width: 80px;
				height: 20px;
			}
			.emailsignup {
				margin-left: -32px;
			}
			.passsignup {
				margin-left: -32px;
			}
		}
	}
</style>
</html>