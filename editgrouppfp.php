<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>theretrobook | Group Picture</title>
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
	if(!isset($_SESSION['email'])) {
		header("location: home.php");
		exit();
	}
	?>
</div>
<div class="welcome">
	<p class="welcometext">Edit Group Picture</p>
	<div class="border">
		<div class="form">
		<?php 
		include 'dbh.inc.php';
		$id = htmlspecialchars($_GET['gid'], ENT_QUOTES, 'UTF-8');
		$id = mysqli_real_escape_string($conn,  $id);
		$sql = "SELECT * FROM groups WHERE id = '$id'";
		$result = $conn->query($sql);
		$resultCheck = mysqli_num_rows($result);
		if($resultCheck > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				if($row['creator'] != $_SESSION['email']) {
					header("location: home.php");
					exit();
				}
				if($row['pfp'] === "") {
						$pfp = "default.jpg";
					} else {
						$pfp = "img/".$row['pfp'];
					}
				echo '<p class="current">Current Group Picture</p>';
					echo '<p class="upload">Upload Picture</p>';
					echo '<p class="youcan">You can upload a JPG, PNG, or GIF.</p>';
					echo '<form method="post" enctype="multipart/form-data" action="grouppfp.inc.php">
					<input type="file" class="file" name="file"/>
					<input type="hidden" value="'.$_GET['gid'].'" name="id"/>
					<button type="submit" name="submit" class="psubmit">Upload Photo</button>
					</form>';
					echo '<img src="'.$pfp.'" class="pfp"/>';
			}
		} else {
			header("location: home.php");
			exit();
		}
		?>
		
	
		
	
	</div>
	<?php 
	if(isset($_GET['e'])) {
		if ($_GET['e'] === "1") {
			$error = "<label class='error1'>Unsupported File Type</label>";
		} 
		
	}
	else {
			$error = "";
		}
	echo $error;
	?>	
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
	.loginsign {
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		font-size: 19px;
		font-weight: bolder;
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
		left: 150px;
		top: 10px;
		text-align: left;
		line-height: 16px;
	}
	
	.rn {
		position: relative;
		top: 15px;
		border-top-color: #D9DFEA;
    	border-left-color: #D9DFEA;
    	border-bottom-color: #3B5998;
    	border-right-color: #3B5998;
    	background-color: #3D65C2;
    	color: white;
    	font-family: Tahoma,Verdana,Segoe,sans-serif;
    	left: -180px;
    	width: 100px;
	}
	.reg {
		position: relative;
		top: 13px;
		border-top-color: #D9DFEA;
    	border-left-color: #D9DFEA;
    	border-bottom-color: #3B5998;
    	border-right-color: #3B5998;
    	background-color: #3D65C2;
    	color: white;
    	font-family: Tahoma,Verdana,Segoe,sans-serif;
    	left: 70px;
    	width: 110px;
    	z-index: 5;
	}
	.error1 {
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		font-weight: bolder;
		font-size: 14px;
		position: relative;
		top: 30px;
	}
	
	.file {
		position: relative;
		top: -43px;
		left: 150px;
	}
	.form1 {
		position: relative;
		top: 20px;
		left: 0px;
	}
	.error {
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		font-weight: bolder;
		font-size: 14px;
		position: relative;
		top: 5px;
	}
	.current {
		margin-top: -30px;
		text-align: left;
		color: #4D5E8B;
		font-size: 14px;
		position: relative;
		left: 3px;
		padding-bottom: 3px;
		border-bottom: 1px solid #E6E7ED;
		width: 550px;
		font-weight: bolder;
	}
	.upload {
		margin-top: -30px;
		text-align: right;
		color: #4D5E8B;
		font-size: 14px;
		position: relative;
		left: 3px;
		padding-bottom: 3px;
		top: -5px;
		width: 550px;
		font-weight: bolder;
	}
	.pfp {
		display: flex;
		margin-left: 30px;
		position: relative;
		top: -60px;
		margin-right: auto;
		border: 1px solid #4D5E8B;
		max-height: 200px;
		min-height: 160px;
		min-width: 180px;
		max-width: 200px;
	}
	.youcan {
		font-weight: bolder;
		font-size: 13px;
		position: relative;
		left: 50px;
	}
	.file {
		position: relative;
		top: 10px;
		left: 120px;
	}
	.psubmit {
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
    left: -140px;
    font-size: 11px;
    top: 80px;
    font-family: "lucida grande", tahoma, verdana, arial, sans-serif;
    position: relative;
	}
	.form {
		margin-top: 50px;
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
			min-height: 200px;
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
			top: 25px;
			margin-top: 12px;
		}
		.rn {
			left: -200px;
			height: 30px;
			font-size: 10px;
		}
		
		.reg {
			margin-top: -5px;
			left: 110px;
			top: -22px;
			height: 30px;
			top: 5px;
			font-size: 10px;
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
		.current {
			width: 358px;
			left: 15%;
		}
		.upload {
			left: -28%;
		}
		.pfp {
			left: 10%;
			top: -70px;
		}
		.youcan {
			left: 33%;
			width: 150px;
			text-align: left;
		}
		.file {
			position: relative;
			left: 59%;
		}
		.psubmit {
			left: -5.5%;
		}
		@media only screen and (max-width:500px) {
			.header {
				left: 0px;
			}
		}	
	}
</style>
</html>