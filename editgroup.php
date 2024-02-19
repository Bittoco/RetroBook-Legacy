<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>theretrobook | Edit Group</title>
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
	<?php
	$id = htmlspecialchars($_GET['gid'], ENT_QUOTES, 'UTF-8');
	$sql = "SELECT * FROM groups WHERE id = '$id'";
	$result = $conn->query($sql);
	$resultCheck = mysqli_num_rows($result);
	if($resultCheck > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		if($row['creator'] != $_SESSION['email']) {
			header("location: group.php?id=".$id."");
			exit();
		}
	echo "<p class='welcometext'>Edit ".$row['name']."'s Group</p>";
	echo '<div class="border">
		<h2 class="loginsign">Edit Description</h2>
		<form method="post" action="group.inc.php">
		<textarea class="input" rows="4" name="desc" maxlength="410" cols="50">'.$row['description'].'</textarea>
		<h2 style="margin-top: 40px;" class="loginsign">Edit Annoucements</h2>
		<input type="hidden" value="'.$id.'" name="id" />
		<textarea class="input" rows="4" name="annouce" maxlength="210" cols="50">'.$row['annoucement'].'</textarea>
		<h2 style="margin-top: 40px;" class="loginsign">Custom Table 1</h2>
		<input type="text" class="inputtext" name="custom1" maxlength="45" placeholder="Custom Table Header" value="'.$row['tableh1'].'" />
		<textarea class="input" rows="4" name="table1" maxlength="310" cols="50">'.$row['customtable'].'</textarea><br>
		<button type="submit" style="margin-top: 30px;" name="mainsubmit" class="submit">Save all</button>
		</form>
		
	</div>
	
	</div>';
	}} elseif($resultCheck <= 0) {
		header("location: home.php");
		exit();
	}
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
		font-size: 13px;
		position: relative;
		text-align: left;
		left: 50px;
		color: #808080;
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
		left: 100px;
		top: 10px;
		text-align: left;
		line-height: 16px;
	}
	.input {
		font-family:  Tahoma,Verdana,Segoe,sans-serif;
		border: 1px solid #BDC7D8;
		font-size: 11px;
	}
	.inputtext {
		width: 300px;
		position: relative;
		padding: 3px;
		margin-bottom: 5px;
		border: 1px solid #BDC7D8;
		font-size: 11px;
	}
	.submit {
		top: -15px;
		left: -110px;
		height: 17px;
		position: relative;
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
    	font-family: Tahoma,Verdana,Segoe,sans-serif;
    	width: 80px;
	
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
		.loginsign {
			left: 30px;
		}
		@media only screen and (max-width:500px) {
			.header {
				left: 0px;
			}
		}
	}
</style>
</html>