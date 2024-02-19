<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>theretrobook | respond to message</title>
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
<?php 
if(isset($_GET['id'])) {
echo '<div class="welcome">
	<p class="welcometext">Respond to Message</p>
	<div class="mb">
	<div class="border">';

		$id = htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8');
		$id = mysqli_real_escape_string($conn,  $id);
		$sql = "SELECT * FROM messageboard WHERE id = '$id'";
		$result = $conn->query($sql);
		$resultCheck = mysqli_num_rows($result);
		if($resultCheck > 0) {
			while($row = mysqli_fetch_assoc($result)) {
		   echo '<h2 class="loginsign">[ respond to message ]</h2>';
		   echo '<form method="post" action="group.inc.php">';
		   echo '<p class="info">From: <a href="profile.php?id='.$row['creator'].'" class="namelink">'.$row['creatorname'].'</a></p><br>';
		   echo '<textarea cols="50" rows="4" class="input" maxlength="200" placeholder="Respond to '.$row['creatorname'].'" name="reply"></textarea><br>
		   <input type="hidden" value="'.$id.'" name="id"/>';
		   echo '<button class="reg" name="rsubmit">Submit</button>
		   </form>';
		}
		} else {
			echo '<h2 class="loginsign">Message not found.</h2>';
		}
		
	echo '	
	</div>
	</div>';
} else {
	header("location: home.php");
	exit();
}
	?>

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
		left: 5px;
		font-size: 13px;
		width: 520px;
	}
	.reg {
		top: -10px;
		position: relative;
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
    	z-index: 5;
    	margin-top: 20px;
	}
	.namee {
		font-size: 13px;
		position: relative;
		left: 100px;
		top: 10px;
		text-align: left;
		line-height: 16px;
	}
	.info {
		text-align: left;
		color: black;
		position: relative;
		left: 170px;
		top: 10px;
		font-size: 12px;
	}
	.namelink {
		color:  #538AE3;
		text-decoration: none;
	}
	.namelink:hover {
		color: #6EBDEA;
		text-decoration: underline;
	}
	.input {
		font-family: Tahoma,Verdana,Segoe,sans-serif;
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
		
		.error {
			left: 60px;
			top: 30px;
		}
		.form1 {
			position: relative;
			left: 60px;
			margin-top: 15px;
		}
		.reg {
			height: 30px;
			font-weight: bolder;
		}

	}
</style>
</html>