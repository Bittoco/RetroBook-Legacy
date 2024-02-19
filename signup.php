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
      <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MPG37RZ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
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
	<p class="welcometext">Registration</p>
	<div class="border">
		<p class="desc">
			To register, fill in the fields below. You will be able to enter more information once you have registered.
		</p>
		<div class="form">
		<p class="namee">Name:<br><br>Status:<br><br>Email:<br><br>Password*: (choose)</p>
		<form method="post" action="signup.inc.php">
		<input class="nameinput" type="text" maxlength="28" name="name"><br>
		<select class="status" name="status"><option>Visitor to the site</option><option>Undergrad</option><option>Alumnus/Alumna</option>
		<option>Grad Student</option>
		</select>
		<input type="email" name="email" maxlength="47" class="emailsignup">
		<input type="password" name="password" class="passsignup">
		<input type="checkbox" name="check" class="check"/>
		<p class="terms">I have read and agreed the <a href="terms.php">Terms of Use</a></p>
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
		min-height: 260px;
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
		font-size: 11px;
		width: 520px;
	}
	.namee {
		font-size: 11px;
		font-weight: bolder;
		color: #808090;
		line-height: 15px;
		position: relative;
		left: 100px;
		top: 10px;
		text-align: left;
	}
	.nameinput {
		position: relative;
		top: -115px;
		left: 79px;
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
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		font-size: 11px;
    border: 1px solid #BDC7D8;
    height: 25px;
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
    	left: -85px;
	}
	.error {
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		font-weight: bolder;
		font-size: 13px;
		position: relative;
		top: 35px;
		
		color: #808090;
	}
	.check {
		position: absolute;
		
		margin-top: -3px;
		margin-left: -150px;
	}
	.terms {
		position: absolute;
		font-size: 11px;
		text-align: left;
		margin-top: -26px;
		margin-left: 210px;
		max-width: 200px;
	}
	.terms a {
		text-decoration: none;
		color: #3B5998;
	}
	.terms a:hover  {
		text-decoration: underline;
	}
	.face {
		top: -31px;
		border-top-left-radius: 5px;
		border-bottom-left-radius: 5px;
		left: -365px;
		position: relative;
		z-index: -1;
	}
	.form input {
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		font-size: 11px;
   		border: 1px solid #BDC7D8;
   		height: 17px;
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
			height: 280px;
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
		.terms {
			margin-top: -30px;
			margin-left: 190px;
		}
		.error {
			left: 60px;
			top: 40px;
		}

	}
	@media only screen and (max-width:500px) {
			.header {
				left: 0px;
			}
		}	
</style>
</html>