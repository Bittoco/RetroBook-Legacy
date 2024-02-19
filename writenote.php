<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>retrobook | Write Note</title>
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
		header("location: home.php");
		exit();
	}
	?>
</div>
<div class="welcome">
	
	<p class='welcometext'>Write a Note</p>
	<div class="border">
		<h2 class="loginsign"></h2>
		<form method="post" action="note.inc.php" enctype="multipart/form-data">
		<div class="options">
			<button type="submit" class="submit" name="submit">Publish</button><br>
			<button  name="preview" class="preview">Preview</button><br>
			<button name="cancel" class="preview">Cancel</button><br>
			<p class="enote">( if you get a "Cannot Access Webpage" Error, it is most likely because in the preview it contains new lines. Just ignore it and go back. )</p>
		</div>
		<div class="formd">
		<p class="title">Title:</p>
		<input type="text" maxlength="130" name="name" class="input"/>
		<p class="body">Body:</p>
		<textarea class="textarea" name="message" cols="40" rows="18" maxlength="1650"></textarea>
		<p class="photo">Upload a File:</p>
		<input type="file" name="file" accept="|video/*|image/*">
	</div>
		</form>
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
	.image-upload > input {
  visibility:hidden;
  display: none;
  width:0;
  height:0;
  position: relative;
  z-index: -1;
  color: #F2F2F2;
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
	.welcometext {
		color: white;
		position: relative;
		margin-top: 5px;
		left: 5px;
		text-align: left;
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
		height: 450px;
		background-color: white;
		top: -10px;
		width: 600px;
		left: -1px;
		background-color: #EFEFEF;
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
	.form {
		background-color: #f2f2f2;
		border: 1px solid #c8c8c8;
		border-top: 1px solid #8b8b8b;
		width: 500px;
		height: 100px;
	}
	.preview {
		top: 5px;
		border-style: solid;
    border-top-width: 1px;
    border-left-width: 1px;
    border-bottom-width: 1px;
    border-right-width: 1px;
    border-top-color: #D9DFEA;
    border-left-color: #D9DFEA;
    border-bottom-color: #8F8E8F;
    border-right-color: #8F8E8F;
    background-color: white;
    color: black;
    font-size: 11px;
    width: 100px;
    top: 13px;
    height: 20px;
     z-index: 5;
    font-family: "lucida grande", tahoma, verdana, arial, sans-serif;
    position: relative;
	}
	.submit {
		position: absolute;
		font-family: font-family: Tahoma,Verdana,Segoe,sans-serif;;
		margin-top: 10px;
		    border-style: solid;
    border-top-width: 1px;
    border-left-width: 1px;
    border-bottom-width: 1px;
    border-right-width: 1px;
    border-top-color: #D9DFEA;
    border-left-color: #D9DFEA;
    border-bottom-color: #0e1f5b;
    border-right-color: #0e1f5b;
    width: 100px;
    height: 20px;
    z-index: 5;
    margin-left: -50px;
    font-size: 11px;
    color: white;
    background-color: #3b5998
	}
	.none {
		width: 400px;
		font-size: 17px;
		color: #696969;
		display: inline-block;
		margin-top: 15px;
	}
	.options {
		border: 1px solid #D9D9D9;
		width: 220px;
		height: 449px;
		margin-top: -21px;
		margin-left: auto;
		background-color: #F7F7F7;
	}
	.formd {
		position: relative;
		top: -400px;
		left: 30px;
		text-align: left;
	}
	.title {
		color: #787878;
		font-weight: bolder;
		font-size: 12px;
		position: relative;
		top: 4px;
		font-family: "lucida grande", tahoma, verdana, arial, sans-serif;
	}
	.input {
		position: relative;
		top: -4px;
		font-family: "lucida grande", tahoma, verdana, arial, sans-serif;
		border: 1px solid #BDC7D8;
		width: 330px;
		padding: 3px;
	}
	.body {
		color: #787878;
		font-family: "lucida grande", tahoma, verdana, arial, sans-serif;
		margin-top: -2px;
		font-weight: bolder;
		font-size: 12px;
		position: relative;
		top: 5px;
	}
	.textarea {
		font-family: "lucida grande", tahoma, verdana, arial, sans-serif;
		border: 1px solid #BDC7D8;
		width: 330px;
	}
	.enote {
		width: 90%;
		text-align: left;
		font-weight: bolder;
		position: relative;
		top: 20px;
		color: #333333;
		font-size: 11px;
	}
	.photo {
		color: #787878;
		font-family: "lucida grande", tahoma, verdana, arial, sans-serif;
		margin-top: -2px;
		font-weight: bolder;
		font-size: 12px;
		position: relative;
		top: 5px;
	}
	.formd {
		position: relative;
		margin-top: -50px;
		margin-left: -7px;
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
		.form {
			position: relative;
			left: 0px;
			width: 350px;
		}
		.input {
			width: 290px;
		}
		.camera {
			position: relative;
			left: -30%;
		}
		
		.line {
			width: 90%;
			left: 0px;
		}
		.uid {
			margin-left: 120px;
		}
		.capt {
			margin-left: 0px;
			width: 70%;
		}
		.date {
			margin-top: 0px;
		}
		.nphoto {
			position: relative;
			top: 20px;
		}
		.pvideo {
			position: relative;
			top: 20px;
		}
		.options {
			width: 100px;
		}
		.input {
			width: 250px;
		}
		.textarea {
			width: 250px;
		}
		
		@media only screen and (max-width:500px) {
			.header {
				left: 0px;
			}
		}
	}
</style>
</html>