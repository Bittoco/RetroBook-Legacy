<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Theretrobook | </title>
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
	
<p class="welcometext">Edit Status</p>

	<div class="border">
		<h2 class="loginsign">Edit Your Profile Status</h2>	
		<hr class="line"/>
		<div class="body">
		<?php 
		echo '<p class="is">'.$name[0].' is </p>';
		?>
		<form method="post" action="status.inc.php">
		<select class="option" name="option">
			<option>at home.</option>
			<option>at the library.</option>
			<option>at work.</option>
			<option>at class.</option>
			<option>out at a party.</option>
			<option>sleeping.</option>
			<option>out celebrating.</option>
		</select><br>
		<button type="submit" name="submit"class="submit">Save</button>
	</form>
	</div>
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

		white-space: nowrap;
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
	.upload {
		text-decoration: none;
		position: relative;
		display: flex;
		margin-left: auto;
		left: -10px;
		top: -5px;
	}
	.upload a {
		text-decoration: none;
	}
	.havent {
		border-top: 1px solid #8B8B8B;
		background-color: #F2F2F2;
		width: 80%;
		font-weight: bolder;
		text-align: left;
		height: 35px;
		border: 1px solid #C8C8C8;
		padding-top: 20px;
		padding-left: 10px;
		padding-bottom: 8px;
	}
	.myphotos {
		position: relative;
		top: 20px;
	}
	.photo {
		position: relative;
		margin-left: 5px;
		position: relative;
		min-width: 200px;
		max-width: 580px;
		min-height: 200px;
		max-height: 700px;
		margin-bottom: 10px;
		border: 1px solid #3B5998;
	}
	.photos {
		text-align: left;
		margin-top: 10px;
	}
	.my {
		margin-top: -20px;
		border-bottom: 1px solid #E6E7ED;
		color: #4D5E8B;
		font-weight: bolder;
		width: 95%;
		text-align: left;
		font-size: 13px;
		padding-bottom: 5px;
	}
	.caption {
		font-size: 12px;
		margin-top: -5px;
	}
	.loginsign {
		text-align: left;
		font-family: Helvetica,Tahoma,Verdana;
		font-size: 14px;
		color: #212124;
		margin-left: 5%;
	}
	.line {

		border: 0.5px solid lightgray;
		border-color: lightgray;
	}
	.is {
		font-weight: bolder;
			color: #212124;
			font-size: 13px;
		display: inline-block;
		font-family: Helvetica,Tahoma,Verdana;
		position: relative;
		
	}
	.option {
		display: flex;
		display: flex;
		display: inline-block;
		border: 1px solid darkgray;
			font-family: Helvetica,Tahoma,Verdana;
			color: #212124;
			padding: 2px;
			width: 150px;
			margin-top: 9px;
			margin-left: 5px;
			margin-bottom: 5px;
	}
	.body {
		display: inline-block;
		float:left;
		display: flex;
		position: relative;
		left: 5%;
	}
	.submit {
		float: right;
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