<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>theretrobook | Group Message</title>
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
	if(isset($_GET['id'])) {
	$id = htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8');
	$sql = "SELECT * FROM messageboard WHERE id = '$id'";
	$result = $conn->query($sql);
	$resultCheck = mysqli_num_rows($result);
	if($resultCheck > 0) {
	while($row = mysqli_fetch_assoc($result)) {
	$group = $row['fgroup'];
	$sql2 = "SELECT * FROM groups WHERE id = '$group'";
	$result2 = $conn->query($sql2);
	$resultCheck2 = mysqli_num_rows($result2);
	if($resultCheck2 > 0) {
	while($row2 = mysqli_fetch_assoc($result2)) {
	echo '<p class="welcometext">Group Wall Message</p>
	<div class="border">';
	$ma = $row['creator'];
		$sql4 = "SELECT * FROM users WHERE id = '$ma'";
		$result4 = $conn->query($sql4);
		while($row4 = mysqli_fetch_assoc($result4)) {
			if($row4['pfp'] === "") {
				$pfp = "default.jpg";
			} else {
				$pfp = "img/".$row4['pfp'];
			}
			echo '<a href="profile.php?id='.$ma.'"><img src="'.$pfp.'" class="pfp"/></a>';
		echo '<p class="desch" style="background: #F8F6F8;"><b><a href="profile.php?id='.$row['creator'].'" class="uid"></b>'.$row['creatorname'].'</a> wrote:</p>';
		}
		echo '<p class="desc" style="top: -10px;left:10px;"><gi>'.$row['message'].'</gi></p>
		<p class="desc"><di>'.$row['date'].'</di></p>';
		
			echo '<p class="comments">Replies</p>';
			$id = $row['id'];
			$sql3 = "SELECT * FROM replies WHERE ogmessage = '$id' ORDER BY date DESC";
			$result3 = $conn->query($sql3);
			echo '<form action="group.inc.php" method="post">
			<textarea class="input" style="margin-top: 15px" placeholder="Add Response" rows="3" cols="50" name="reply"></textarea>
			<input type="hidden" value="'.$row['id'].'" name="id">
			<input type="hidden" value="'.$row2['id'].'" name="group">
			<input type="hidden" name="tname" value="'.$row['creatorname'].'">
			<input type="hidden" value="com" value="'.$_GET['id'].'">
			<input type="hidden" name="uemail" value="'.$_SESSION['email'].'">
			<button type="submit" class="reg" name="resubmit">Post</button>
			</form>';
			while($row3 = mysqli_fetch_assoc($result3)) {
				echo '<p class="desc" style="margin-top: -10px;"><b><a href="profile.php?id='.$row3['creatorid'].'" class="uid">'.$row3['creatorname'].'</a></b> wrote:</p><br><da>'.$row3['date'].'</da>';
				echo '<p class="desc" style="top: -25px;" style="">'.$row3['text'].'</p>';
			}
	echo '</div>';
	}
	} else {
		echo '<p class="welcometext">Group not found.</p>
	<div class="border">
		<h2 class="loginsign">Group has not been found or is deleted.</h2>	
	</div>';
	}
}
	} else {
		echo '<p class="welcometext">Message Not Found</p>
	<div class="border">
		<h2 class="loginsign">The Board Message has not been found or is deleted.</h2>	
	</div>';
	}
} else {
	echo '<p class="welcometext">Message Not Found</p>
	<div class="border">
		<h2 class="loginsign">The Board Message has not been found or is deleted.</h2>
	</div>';
}
	?>
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
		left: 10px;
		font-size: 13px;
		width: 500px;
		margin-top: 30px;
	}
	.desch {
		position: relative;
		text-align: left;
		left: 10px;
		border-top: 1px solid #6B7794;
		padding-top: 7px;
		padding: 3px;
		height: 20px;
		font-size: 13px;
		width: 450px;
		border-bottom: 1px solid #E3EAF2;
		margin-top: 30px;
	}
	.namee {
		font-size: 13px;
		position: relative;
		left: 100px;
		top: 10px;
		text-align: left;
		line-height: 16px;
	}
	.uid {
		color: #538AE3;
		text-decoration: none;
		font-weight: bolder;
	}
	.uid:hover {
	
		text-decoration: underline;
	}
	.reg {
		top: -55px;
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
    width: 50px;
    height: 20px;
    font-size: 11px;
    color: white;
    background-color: #3b5998;
    	z-index: 5;
    	
    	margin-top: 20px;
	}
	.input {
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		position: relative;
		border: 1px solid #BDC7D8;
		font-size: 11px;
		height: 50px;
		width: 400px;
		top: -15px;
	}
	.comments {
		border-bottom: 1px solid #E6E7ED;
		padding-bottom: 5px;
		font-weight: bolder;
		margin-right: auto;
		display: flex;
		color: #4D5E8B;
		margin-top: 19px;
		margin-left: 20px;
	}
	.pfp {
		display: block;
		position: relative;
		margin-right: auto;
		margin-top: -50px;
		height: 50px;
		width: 50px;
		top: 80px;
		border: 1px solid #6B7794;
		left: 25px;
	}
	gi {
		position: relative;
		left: 25px;
		top: -15px;
	}
	di {
		display: block;
		position: relative;
		left: 25px;
		top: 5px;
		color: #96A1A8;
		font-size: 11px;
		margin-top: -50px;
	}
	da {
		display: block;
		color: #96A1A8;
		margin-top: -28px;
		text-align: left;
		padding-left: 10%;
		font-size: 11px;
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
			width: 90%;
		}
		.pfp {
			top: 120px;
		}
		gi {
			margin-left: 40px;
			top: -5px;
		}
		di {
			margin-top: -35px;
			padding-left: 0px;
			left: 10px;

			top: 25px;
		}
		.comments {
			width: 90%;
			margin-top: 35px;
		}
		.input {
			width: 90%;
		}
		.reg {
			left: -150px;
			height: 20px;
			top: -30px;
			margin-right: auto;
		}
		.desch {
			width: 90%;
			left: 0px;
		}
		@media only screen and (max-width:500px) {
			.header {
				left: 0px;
			}
		}
	}
</style>
</html>