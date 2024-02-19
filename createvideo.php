<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Retrobook | Create a Video</title>
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
	<p class="welcometext">Create a Video</p>
	<div class="border">
		<p class="create">Create a New Video</p>
		<div class="b2">

			<?php 
			$email = $_SESSION['email'];
			$sql = "SELECT * FROM userapps WHERE name = '$email' AND appid = '1'";
			$result = $conn->query($sql);
			if(mysqli_num_rows($result) > 0) {
				echo '<div class="b3">
				<p class="select">Select a video file on your computer.</p>
				<form method="post" action="video.inc.php" accept="video/*" enctype="multipart/form-data">
				<div class="b4">
				<input type="file" name="file" class="upload" accept="video/*">
				
				
				</div>
				<p class="only">Please upload a file only if:</p>
				<p class="the"><gi>•</gi> The video was made by you or one of your friends</p>
				<p class="the"><gi>•</gi> You or one of your friends appears in the video.</p>
					<p class="the"><gi>•</gi> Your File name is one word with no spaces.</p>
				<button type="submit" name="submit" class="submit">Next Step</button>
				</div><br>

				</form>';
			} else {
				header("location: app.php?id=1");
				exit();
			}
			?>	
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
		background-color: white;
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
	.create {
		text-align: left;
		color: #383838;
		position: relative;
		font-weight: bolder;
		left: 10px;
		font-size: 14px;
	}
	.b2 {
		background-color: #EEEEEE;
		border-top: 1px solid darkgray;
		min-height: 200px;
		position: relative;
		margin-top: 20px;

	}
	.b3 {
		border: 1px solid darkgray;
		background-color: white;
		width: 90%;
		margin-top: 10px;

	}
	.select {
		font-weight: bolder;
		margin-top: 30px;
		color: #343434;
			font-family:  Helvetica,Tahoma,Verdana;
	}
	.upload {
		position: relative;
		top: 10px;
	}
	.b4 {
		border: 1px solid darkgray;
		width: 60%;
		background-color: #EEEEEE;
		margin-bottom: 10px;
		height: 40px;
	}
	.only {
		text-align: left;
		width: 60%;
		font-family:  Helvetica,Tahoma,Verdana;
		font-weight: bolder;
		font-size: 15px;
	}
	.the {
		text-align: left;
		width: 60%;
		font-size: 13px;
			font-family:  Helvetica,Tahoma,Verdana;
	}
	gi {
		color: #3B5999;
	}
	.submit {
		border-style: solid;
    border-top-width: 1px;
    border-left-width: 1px;
    border-bottom-width: 1px;
    border-right-width: 1px;
    border-top-color: #D9DFEA;
    border-left-color: #D9DFEA;
    border-bottom-color: #0e1f5b;
    border-right-color: #0e1f5b;
    height: 20px;
   padding-top: 3px;
    font-size: 11px;
    color: white;
    background-color: #3b5998;
    margin-bottom: 5px;
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