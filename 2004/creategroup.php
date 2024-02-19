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
	<center>
<div class="header">
		<a href="index.php" style="text-decoration: none"><h1 class="name">[ theretrobook ]</h1></a>
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
	<div class="mb">
	<div class="border">
		<h2 class="loginsign">[ Create Group ]</h2>
		<form action="group.inc.php" method="post">
		<p class="desc">Name: <br>Description:</p>
		<input type="text" maxlength="45" class="input" name="cname"><br>
		<textarea cols="30" rows="3" name="desc" maxlength="310" class="input" style="left:53px;top: -55px;"></textarea><br>
		
		<button type="submit" name="cresubmit" class="reg">Create!</button>
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
</div>
	</center>
</body>
<style type="text/css">
	.header {
		position: relative;
		border: 1px solid #3C589C;
		width: 700px;
		background-color: #3C589C;
		background-image: url("logo-left.jpg");
		background-repeat-x: no-repeat;
		height: 78px;
		background-repeat: no-repeat;
		
		z-index: 5;
	}
	.name {
		position: relative;
		left: 100px;
		left: 120px;
		color: #538BDE;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		font-size: 35px;
		top: -px;
		margin-top: 10px;
	}
	.loginsign {
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		font-size: 19px;
		font-weight: bolder;
	}
	.welcome {
		position: relative;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		border: 1px solid #3C589C;
		background-color: #3C589C;
		width: 548px;
		height: 30px;
		margin-top: 3px;
		left: 73px;
	}
	.welcometext {
		color: white;
		position: relative;
		margin-top: 3px;
		text-align: left;
		margin-left: 5px;
		font-size: 12px;
	}
	.border {
		position: relative;
		border: 1px solid #3C589C;
		min-height: 250px;
		background-color: white;
		top: -9px;
		width: 548px;
		left: 73px;
		margin-top: -7px;
		border-bottom: 2px solid #3C589C;
	}
	.desc {
		position: relative;
		text-align: left;
		left: 105px;
		font-size: 13px;
		width: 520px;
		line-height: 30px;
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
		left: 53px;
		top: -65px;
		width: 250px;
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
		order-style: solid;
    border-top-width: 1px;
    border-bottom-width: 2px;
    border-right-width: 2px;
    border-left-width: 1px;
    border-top-color: #D9DFEA;
    border-bottom-color: #3B5998;
    border-right-color: #3B5998;
    border-left-color: #D9DFEA;
    background-color: #538ADC;
    font-family: Tahoma, arial;
    font-size: 11px;
    color: #FFFFFF;
    	width: 80px;
	
	}
	.mb {
		width: 700px;
		left: -150px;
		position: relative;
		border: 1px dashed #3B5998;
		position: relative;
		top: -32px;
		padding-top: 40px;
		clear: both;
		border-top: 0px solid;
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
			left: -40px;
			height: 30px;
		}
		.reg {
			
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
		.desc {
			position: relative;
			left: 30px;
			top: 5px;
		}

	}
</style>
</html>