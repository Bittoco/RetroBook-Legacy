<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>theretrobook | Register</title>
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
	<p class="welcometext">Registration</p>
	<div class="border">
		<p class="desc">
			To register for theretrobook.net, just fill in the four fields below. You will have a chance to <br>enter additional information and submit a picture once you have registered.
		</p>
		<div class="form">
		<p class="namee">Name:<br><br>Status:<br><br>Email:<br><br>Password*: (choose)</p>
		<form method="post" action="signup.inc.php">
		<input class="nameinput" type="text" maxlength="28" name="name"><br>
		<select class="status" name="status"><option>Visitor to the site</option><option>Student (Full-Time)</option><option>Student (Summer)</option>
		<option>Grad Student</option>
		</select>
		<input type="email" name="email" maxlength="47" class="emailsignup">
		<input type="password" name="password" class="passsignup">
		<input type="checkbox" name="check" class="check"/>
		<p class="terms">I have read and understood the <a href="terms.php">Terms of Use</a>, and I
agree to them.</p>
		<button type="submit" name="submit" class="rn">Register Now!</button>
	</form>
	<?php 
	if(isset($_GET['e'])) {
		if ($_GET['e'] === "1") {
			$error = "<label class='error'>Empty Fields!</label>";
		} 
		if ($_GET['e'] === "2") {
			$error = "<label class='error'>Username in use!</label>";
		} 
		if ($_GET['e'] === "3") {
			$error = "<label class='error'>Email already in use.</label>";
		} 
		if ($_GET['e'] === "4") {
			$error = "<label class='error'>Didnt accept terms!</label>";
		} 
	}
	else {
			$error = "";
		}
	echo $error;
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
		height: 300px;
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
		top: 30px;
		border-top-color: #D9DFEA;
    	border-left-color: #D9DFEA;
    	border-bottom-color: #3B5998;
    	border-right-color: #3B5998;
    	background-color: #3D65C2;
    	color: white;
    	font-family: Tahoma,Verdana,Segoe,sans-serif;
    	left: -85px;
	}
	.error {
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		font-weight: bolder;
		font-size: 14px;
		position: relative;
		top: 40px;
	}
	.check {
		position: absolute;
		
		margin-top: -10px;
		margin-left: -150px;
	}
	.terms {
		position: absolute;
		font-size: 11px;
		text-align: left;
		margin-top: -35px;
		margin-left: 180px;
		max-width: 200px;
	}
	.terms a {
		text-decoration: none;
		color: #538BDE;
	}
	.terms a:hover  {
		text-decoration: underline;
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
			left: -20px;
			height: 30px;
		}
		.check {
			margin-left: -70px;
			margin-top: 0px;
		}
		.error {
			left: 60px;
			top: 40px;
		}

	}
</style>
</html>