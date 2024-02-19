<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>theretrobook | Message Board</title>
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
	if(isset($_GET['gid'])) {
	$id = htmlspecialchars($_GET['gid'], ENT_QUOTES, 'UTF-8');
	$id = mysqli_real_escape_string($conn,  $id);
	$sql = "SELECT * FROM groups WHERE id = '$id'";
	$result = $conn->query($sql);
	$resultCheck = mysqli_nuM_rows($result);
	if($resultCheck > 0) {
		while($row = mysqli_fetch_assoc($result)) {
	echo '<p class="welcometext">'.$row['name'].' Wall</p>
	<div class="border">';
		$sql2 = "SELECT * FROM messageboard WHERE fgroup = '$id' ORDER BY date DESC";
		$result2 = $conn->query($sql2);
		$resultCheck2 = mysqli_num_rows($result2);
		if($resultCheck2 > 0) {
			echo '<p class="desc2" style="visibility: hidden;" >Wall</p>';
			echo '<form action="group.inc.php" method="post">
			<div class="form">
			<p class="formh">Comment</p>
			<p class="displaying">Displaying 0 - '.$resultCheck2.' comment\'s</p>
			<textarea class="input" style="margin-top: 15px" placeholder="Add Message" rows="3" maxlength="300" cols="50" name="message"></textarea>
			<input type="hidden" name="gid" value="'.$_GET['gid'].'">
			<button type="submit" class="reg" name="csubmit">Post Message</button>
			</div>
			</form>';
			while($row2 = mysqli_fetch_assoc($result2)) {
				echo '<p class="desch"><b><a href="profile.php?id='.$row2['creator'].'" class="uid">'.$row2['creatorname'].'</a></b> wrote:<br>
				<gi>'.$row2['date'].'</gi></p>';
				echo '<p class="desc" style="font-size: 12px;margin-top: -3px;">'.$row2['message'].'</p>';
				echo '<p class="desc" style="border-bottom: 1px solid #3B5998; padding-bottom: 5px;"><a href="replymessage.php?id='.$row2['id'].'" class="uid"><a href="send.php?id='.$row2['creator'].'" class="uid">Message</a> - <a class="uid" href="viewmessage.php?id='.$row2['id'].'">View</a>';
				$id = $row2['id'];
				$sql3 = "SELECT * FROM replies WHERE ogmessage = '$id'";
				$result3 = $conn->query($sql3);
				$resultCheck3 = mysqli_num_rows($result3);
				if($resultCheck3 > 0) {
					echo ' - <a class="uid" href="viewmessage.php?id='.$row2['id'].'" >Reply ( '.$resultCheck3.' )</a>';
				} 
					echo '</p>';
			}
		} else {
			echo '<p class="desc2">This Group has no wall messages.</p>';
			echo '<form action="group.inc.php" method="post">
			<div class="form">
			<p class="formh">Comment</p>
			<p class="displaying">Displaying 0 - '.$resultCheck2.' comment\'s</p>
			<textarea class="input" style="margin-top: 15px" placeholder="Add Message" rows="3" maxlength="300" cols="50" name="message"></textarea>
			<input type="hidden" name="gid" value="'.$_GET['gid'].'">
			<button type="submit" class="reg" name="csubmit">Post Message</button>
			</div>
			</form>';
		}
	echo '</div>';
	}
	} else {
		echo '<p class="welcometext">No Group Found</p>
	<div class="border">
		<h2 class="loginsign">This Group does not exist.</h2>
		
		
	</form>
		
	</div>';
	}
	} else {
		header("location: home.php");
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
		left: 5px;
		font-size: 13px;
		width: 520px;
	}
	.desch {
		position: relative;
		text-align: left;
		left: 5px;
		font-size: 13px;
		width: 520px;
		background-color: #F8F6F8;
		padding: 3px;
		border-top: 1px solid #6B7794;
		border-bottom: 1px solid #E3EAF2;
	}
	.desc2 {
		position: relative;
		left: 5px;
		font-size: 15px;
		top: 10px;
		
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
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		display: flex;
		position: relative;
		margin-right: auto;
		top: px;
		height: 40px;
		width: 450px;
		left: 30px;
		font-size: 11px;
		border: 1px solid #BDC7D8;

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
    width: 80px;
    height: 20px;
    font-size: 11px;
    color: white;
    background-color: #3b5998;
    	color: white;
    	font-family: Tahoma,Verdana,Segoe,sans-serif;
    	z-index: 5;
    	left: -190px;
    	top: -5px;
    	margin-top: 12px;
	}
	.comments {
		font-weight: bolder;
		margin-right: auto;
		display: flex;
		margin-top: -10px;
		margin-left: 20px;
	}
	.uid {
		color: #538AE3;
		text-decoration: none;
	}
	.uid:hover {
		
		text-decoration: underline;
	}
	gi {
		font-size: 10px;
		color: #96A1A8;
	}
	.form {
		background-color: #F8F6F8;
		position: relative;
		top: -20px;
		width: 520px;
		left: 5px;
		border-bottom: 1px solid #3B59A3;
	}
	.formh {
		background-color: #D8DEEA;
		padding: 3px;

	}
	.formh {
		color: #3B59A3;
		font-size: 13px;
		padding-left: 5%;
		border-top: 1px solid #3B59A3;
		text-align: left;
		font-weight: bolder;
	}
	.displaying {
		background-color: #EAEAEA;
		color: black;
		font-size: 13px;
		padding-left: 5%;
		height: 20px;
		margin-top: -13px;
		padding-top: 3px;
		text-align: left;
		font-weight: none;
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
			left: -120px;
			top: -5px;
			margin-top: 18px;
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
		.desch {
			width: 350px;
		}
		.desc {
			width: 350px;
		}
	.input {
			width: 320px;
			position: relative;
			top: 7px;
			left: 10px;
		}
		.form {
			width: 350px;
			left: 0px;
		}
		@media only screen and (max-width:500px) {
			.header {
				left: -5px;
			}
		}
	}
</style>
</html>