<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>theretrobook | Create Group</title>
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
		header("location: index.php");
		exit();
	}
	?>
</div>
<div class="welcome">
	<p class="welcometext">Create a Group</p>
	<div class="border">
		<form action="group.inc.php" method="post">
		<p class="desc">Group Name: <br>Description:</p>
		<input type="text" maxlength="45" style="left:53px;" class="input" name="cname"><br>
		<textarea cols="40" rows="5" name="desc" maxlength="310" class="input" style="left:53px;top: -55px;"></textarea><br>
		
		<button type="submit" name="cresubmit" class="reg">Create Group</button>
		<button type="submit" name="cresubmit" class="rn">Cancel</button>
	</form>
		<?php 
		if(isset($_GET['e'])) {
	 		if($_GET['e'] === "Emptyf") {
	 			$error = "Empty Fields!";
	 		} if($_GET['e'] === "made") {
	 			$error = "Max amount of groups created!";
	 		}
	 		echo '<p class="error">'.$error.'</p>';
		}
		?>

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
	
	.loginsign {
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		font-size: 19px;
		font-weight: bolder;
	}
	
	.border {
		position: relative;
		border: 1px solid lightgray;
		max-height: 270px;
		background-color: white;
		top: -10px;
		width: 600px;
		left: -1px;
		border-bottom: 2px solid #3D65C2;
	}
	.desc {
		position: relative;
		text-align: left;
		left: 105px;
		font-size: 12px;
		width: 520px;
		line-height: 30px;
		color: #808080;
		font-weight: bolder;
	}
	.bold {
		position: relative;
		text-align: left;
		left: 105px;
		top: -55px;
		font-size: 13px;
		width: 520px;
		font-weight: bolder;
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
		position: relative;
		left: 20px;
		top: -65px;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		border: 1px solid #bdc7d8;
		font-size: 11px;
		padding: 3px;
		width: 200px;
	}
	.error {
		position: relative;
		
		
		top: -50px;
		font-size: 13px;
		margin-top: 20px;
		width: 520px;
		font-weight: bolder;
	}
	.reg {
		top: -45px;
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
    position: relative;
    	width: 80px;
		left: 25px;
	}
	.rn {
		position: relative;
		top: -45px;
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
    font-family: "lucida grande", tahoma, verdana, arial, sans-serif;
    position: relative;
    	left: 30px;
    	width: 70px;
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
			margin-left: px;
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
			left: 30px;
			height: 20px;
		}
		.reg {
			
			top: -45px;
			height: 20px;
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
		.desc {
			position: relative;
			left: 30px;
			top: 5px;
		}
			@media only screen and (max-width:500px) {
			.header {
				left: 0px;
			}
		}
	}
</style>
</html>