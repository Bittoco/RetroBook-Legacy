<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>retrobook | Site Tour</title>
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
	
	?>
</div>
<div class="welcome">
	<p class="welcometext">Site Tour</p>
	<div class="border">
		<h2 class="loginsign"></h2>	
		<div class="info">
			<p class="stour">Site Tour</p>
			<a href="tourhomepage.php" ><img src="f.png" class="r"/></a>
			<a class="getstarted" style="color: #3B5998;" href="tourindex.php">Getting Started</a>
			<a href="tourprofile.php"><img src="friendguy.gif" class="icon2"/></a>
			<a class="yourprofile" style="color: #333333;" href="tourprofile.php">Your Profile</a>
			<a href="tournotes.php"><img src="photonote.gif" class="icon3"/></a>
			<a class="photonotes" style="color: #3B5998;" href="tournotes.php">Photo and Notes</a>
			<a href="tourhomepage.php"><img src="homepage.gif" class="icon4"/></a>
			<a class="homepage" style="color: #3B5998;" href="tourhomepage.php">Your Home Page</a>
		</div>
		<div class="signup2">
			<p class="regi">Register</p>
			<p class="take"><a style="color: #3B5998;" href="signup.php">Register now</a> to take <br>advantage of all Retrobook has<br> to offer.</p>
		</div>
		<div class="tour">
			<p class="started">Edit Your Profile</p>
			<p class="isnot">Fill out your profile with your photo and interests, your work and education history, your favorites and more.</p>
			<img src="profile.png" class="register"></img>
			<p class="lower">What's on your profile?</p>
			<p class="from">Your personal profile contains information about you, such as your profile picture, personal information, and contact information. It also shows you your friend list and your profile wall.</p>
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
	.info {
		position: absolute;
		z-index: 5;
		right: 0;
		text-align: left;
		width: 180px;
		margin-left: auto;
	}
	.signup2 {
		position: absolute;
		z-index: 5;
		right: 0;
		text-align: left;
		width: 180px;
		margin-left: auto;
		top: 156px;
	}
	.stour {
		font-weight: bolder;
		font-size: 12px;
		background-color: #E9E9E9;
		width: 160px;
		padding: 4px;
		color: #333333;
		position: relative;
		top: -26px;
	}
	.regi {
		font-weight: bolder;
		font-size: 12px;
		background-color: #E9E9E9;
		width: 160px;
		padding: 4px;
		color: #333333;
		position: relative;
		
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
		background-color: #F7F7F7;
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
		font-size: 13px;
		position: relative;
		left: 100px;
		top: 10px;
		text-align: left;
		line-height: 16px;
	}
	.tour {
		border: 1px solid #CCCCCC;
		background-color: white;
		height: min-400px;
		width: 400px;
		position: relative;
		margin-right: auto;
		margin-bottom: 5px;
		margin-left: 5px;
		margin-top: -15px;
	}
	.started {
		color: #3B59A5;
		font-weight: bold;
		font-size: 13.3px;
		text-align: left;
		position: relative;
		top: 10px;
		left: 10px;
	}
	.isnot {
		text-align: left;
		font-size: 11px;
		margin-left: 10px;
		position: relative;
		top: 10px;
		color: #111111;
	}
	.register {
		width: 370px;
		height: 350px;
		position: relative;
		margin-top: 10px;

	}
	.lower {
		color: #333333;
		font-weight: bolder;
		font-size: 13px;
		text-align: left;
		margin-left: 10px;
	}
	
	.from {
		margin-top: -15px;
		text-align: left;
		font-size: 11px;
		margin-left: 10px;
		position: relative;
		top: 10px;
		margin-bottom: 30px;
		color: #111111;
	}
	.r {
		height: 20px;
		margin-left: 10px;
		position: relative;
		top: -30px;
		z-index: 6;
	}
	.getstarted {
		
		color: #333333;
		display: block;
		width: 120px;
		
		font-size: 11px;
		padding: 5px;
		padding-left: 35px;
		text-decoration: none;
		position: relative;
		top: -57px;
		padding-bottom: 10px;
		border-bottom: 1px solid #DDDDDD;
	}
	.getstarted:hover {
		text-decoration: underline;
	}
	.icon2 {
		height: 17px;
		margin-left: 8px;
		position: relative;
		top: -50px;
		z-index: 6;
	}
	.yourprofile {
		font-size: 11px;
		color: #3B5998;
		font-weight: bolder;
		position: relative;
		width: 125px;
		display: block;
		height: 10px;
		margin-top: -7px;
		padding-top: 10px;
		background-color: white;
		padding-left: 35px;
		text-decoration: none;
		position: relative;
		top: -70px;
		padding-bottom: 12px;
		border-bottom: 1px solid #DDDDDD;
	}
	.yourprofile:hover {
		
	}
	.icon3 {
		height: 17px;
		margin-left: 10px;
		position: relative;
		top: -62px;
		z-index: 6;
	}
	.photonotes {
		font-size: 11px;
		color: #3B5998;
		position: relative;
		width: 125px;
		display: block;
		padding-left: 35px;
		text-decoration: none;
		position: relative;
		top: -80px;
		padding-bottom: 10px;
		border-bottom: 1px solid #DDDDDD;
	}
	.photonotes:hover {
		text-decoration: underline;
	}
	.icon4 {
		height: 17px;
		margin-left: 10px;
		position: relative;
		top: -72px;
		z-index: 6;
	}
	.homepage {
		font-size: 11px;
		color: #3B5998;
		position: relative;
		width: 125px;
		display: block;
		padding-left: 35px;
		text-decoration: none;
		position: relative;
		top: -90px;
		padding-bottom: 10px;
		border-bottom: 1px solid #DDDDDD;
	}
	.homepage:hover {
		text-decoration: underline;
	}
	.take {
		font-size: 10.5px;
		position: relative;
		width: 85%;
		top: 0px;
		padding-left: 5%;
		text-decoration: none;
	}
	.take a {
		text-decoration: none;
	}
	.take a:hover {
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
		.tour {
			width: 250px;
		}
		.register {
			width: 200px;
			height: 160px;
		}
		.stour {
			width: 130px;
			left: 40px;
		}
		.regi {
			width: 130px;
			left: 40px;
		}
		.take {
			position: relative;
			left: 35px;
			width: 70%;
			font-size: 10px;
		}
		.info {

		}
		.getstarted {
			width: 100px;
			left: 40px;
		}
		.r {
			left: 35px;
		}
		.yourprofile {
			width: 100px;
			left: 40px;
		}
		.icon2 {
			left: 35px;
		}
		.icon3 {
			left: 35px;
		}
		.photonotes {
			width: 100px;
			left: 40px;
		}
		.icon4 {
			left: 35px;
		}
		.homepage {
			width: 100px;
			left: 40px;
		}
		@media only screen and (max-width:500px) {
			.header {
				left: 0px;
			}
		}
	}
</style>
</html>