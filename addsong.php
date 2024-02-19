<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>theretrobook</title>
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
	$email = $_SESSION['email'];
	$sql = "SELECT * FROM userapps WHERE name = '$name' AND appname = 'iLike'";
	$result = $conn->query($sql);
	if(mysqli_num_rows($result) < 0) {
		header("location: app.php?id=2");
		exit();
	}
	?>
</div>
<div class="welcome">
	<p class="welcometext">Add Song iLike</p>
	<div class="border"><a class="goback" href="app.php?id=2">Go Back to iLike</a><br>
		<div class="white">
			<?php 
				if(isset($_GET['e'])) {
					if($_GET['e'] === "1") {
						echo '<div class="error">Empty Artist and name fields.</div>';
					}
					if($_GET['e'] === "2") {
						echo '<div class="error">No file attached.</div>';
					}
					if($_GET['e'] === "3") {
						echo '<div class="error">Not proper file type. MP3 is only accepted.</div>';
					}
					if($_GET['e'] === "4") {
						echo '<div class="error">Audio length exceeds length.</div>';
					}
				}
				?>
			<div class="text">
				
			<img src="img/ilike.png" class="ilike"/>Add Song to Profile<br><br>
		</div>
		<form method="post" action="uploadfile.inc.php" enctype="multipart/form-data">
			<div class="line"><p class="artist">Song Name:</p><input type="text" name="name" class="name2" required/></div>
			<div class="line"><p class="artist">Artist:</p><input type="text" name="artist" class="name2"  required/><br></div>
			<input type="file" class="file" accept="audio/*" name="file" required/><br>
			<button class="submit" name="submit">Upload</button>
		</form>
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
	.error {
		position: relative;
		top: 5px;
		margin-top: 5px;
		font-size: 11px;
		text-align: left;
		width: 80%;
		background-color: #FDF0ED;
		padding: 5px;
		font-weight: bold;
		border: 1px solid #D14C1D;
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
		color: #3B5998;
		font-size: 11px;
		text-align: left;
		padding-left: 13px;
		margin-top: 20px;
		padding-bottom: 4px;
		border-bottom: 1px solid #D8DFEA;
		margin-bottom: 45px;
	}
	.artist {
		margin-right: 10px;
		font-size: 12px;
		text-align: left;
		width: 100px;
		font-weight: bold;
		display: inline-flex;
	}
	.line input {
		border: 1px solid lightgray;
		font-family: Tahoma,Verdana,Segoe,sans-serif;;
		font-size: 11px;
		width: 200px;
		padding: 5px;
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
	.goback {
		float: left;
		font-size: 12px;
		text-decoration: none;
		margin-left: 5px;
		margin-top: 5px;
	}
	.submit {
		padding: 5px;
	font-family:  Tahoma,Verdana,Segoe,sans-serif;
	width: 80px;
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
    margin-left: 50px;
    margin-left: 50%;

    top: 20px;
    cursor: pointer;
    position: relative;
	}
	.goback:hover {
		text-decoration: underline;
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
	.welcometext {
		color: white;
		position: relative;
		margin-top: 5px;
		text-align: left;
		margin-left: 10px;
		font-size: 14px;
		font-weight: bolder;
	}
	.ilike {
		height: 25px;
		text-align: left;
		border-radius: 5px;

	}
	.file {
		margin-left: 155px;
		margin-top: 20px;
	}
	.text {
		margin-left: 30px;
		display: flex;
		font-family: Helvetica,Tahoma,Verdana;
		font-weight: bold;
		font-size: 13px;
		margin-top: 30px;
	}
	.text img {
		position: relative;
		top: -8px;
		margin-right: 5px;
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
		min-height: 200px;
		background-color: white;
		top: -10px;
		width: 600px;
		background-color: #F6F9F8;
		left: -1px;
		border-bottom: 2px solid #3D65C2;
	}
	.white {
		border: 1px solid #A9A9A9;
		width: 98%;
		background-color: white;
		min-height: 300px;
		margin: 5px;
	}
	.desc {
		position: relative;
		text-align: left;
		left: 5px;
		font-size: 13px;
		width: 520px;
	}
	
	.questiondiv {
		min-height: 50px;
		width: 450px;
		margin-bottom: 15px;
	}
	.question {
		
		width: 452px;
		left: -1px;
		min-height: 20px;
		position: relative;
		top: -17px;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		color: white;
	}
	.questext {
		font-size: 12px;
		text-align: left;
		position: relative;
		top: 3px;
		color: #3B59B3;
		left: 5px;
		max-width: 452px;
		padding-bottom: 5px;
		border-bottom: 1px solid #D8DFEA;
		font-weight: bolder;
	}
	.answer {
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		color: black;
		font-size: 11px;
		text-align: left;
		margin-top: -10px;
		margin-left: -5px;
		width: 400px;
		margin-bottom: 40px;
	}
	@media only screen and (max-width:700px) {
		
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
		.questiondiv {
			width: 350px;
		}
		.question {
			width: 352px;
		}
		.answer {
			width: 300px;
		}
		@media only screen and (max-width:500px) {
			.header {
				left: 0px;
			}
		}
	}
</style>
</html>