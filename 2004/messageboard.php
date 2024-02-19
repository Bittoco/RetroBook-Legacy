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
	<center>
<div class="header">
	<h1 class="name">[ theretrobook ]</h1>
	<?php 
	include 'header.php';
		if(!isset($_SESSION['email'])) {
		header("location: index.php");
		exit();
	}
	?>
</div>
<div class="welcome">
	<div class="mb">
	<?php 
	if(isset($_GET['gid'])) {
	$id = htmlspecialchars($_GET['gid'], ENT_QUOTES, 'UTF-8');
	$id = mysqli_real_escape_string($conn,  $id);
	$sql = "SELECT * FROM groups WHERE id = '$id'";
	$result = $conn->query($sql);
	$resultCheck = mysqli_nuM_rows($result);
	if($resultCheck > 0) {
		while($row = mysqli_fetch_assoc($result)) {
	echo '<p class="welcometext">'.$row['name'].' Group Message Board</p>
	<div class="border">
		<h2 class="loginsign"> [ Group Wall ]</h2>';
		$sql2 = "SELECT * FROM messageboard WHERE fgroup = '$id' ORDER BY date DESC";
		$result2 = $conn->query($sql2);
		$resultCheck2 = mysqli_num_rows($result2);
		if($resultCheck2 > 0) {
			echo '<p class="desc2" style="visibility: hidden;" >Wall</p>';
			echo '<form action="group.inc.php" method="post">
			<textarea class="input" style="margin-top: 15px" placeholder="Add Message" rows="3" maxlength="300" cols="50" name="message"></textarea>
			<input type="hidden" name="gid" value="'.$_GET['gid'].'">
			<button type="submit" class="reg" name="csubmit">Post Message</button>
			</form>';
			echo '<p class="comments">'.$resultCheck2.' Comments</p>';
			while($row2 = mysqli_fetch_assoc($result2)) {
				echo '<p class="desc"><b>[ '.$row2['date'].' ]</b><b> <a href="profile.php?id='.$row2['creator'].'" class="uid">'.$row2['creatorname'].'</a> wrote:</b></p>';
				echo '<p class="desc">'.$row2['message'].'</p>';
				echo '<p class="desc"><a href="replymessage.php?id='.$row2['id'].'" class="uid">Respond</a> :: <a href="send.php?id='.$row2['creator'].'" class="uid">Message</a> ::  <a class="uid" href="viewmessage.php?id='.$row2['id'].'">View</a>';
				$id = $row2['id'];
				$sql3 = "SELECT * FROM replies WHERE ogmessage = '$id'";
				$result3 = $conn->query($sql3);
				$resultCheck3 = mysqli_num_rows($result3);
				if($resultCheck3 > 0) {
					echo ' :: <a class="uid" style="text-decoration: none;">Replies ( '.$resultCheck3.' )</a>';
				} 
					echo '</p>';
			}
		} else {
			echo '<p class="desc2">This Group has no wall messages.</p>';
			echo '<form action="group.inc.php" method="post">
			<textarea class="input" style="margin-top: 15px" placeholder="Add Message" rows="3" cols="50" name="message"></textarea>
				<input type="hidden" name="gid" value="'.$_GET['gid'].'">
			<button type="submit" class="reg" name="csubmit">Post Message</button>
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
		margin-top: -3px;
		text-align: left;
		font-size: 12px;
	}
	.loginsign {
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		font-size: 19px;
		font-weight: bolder;
	}
	
	.border {
		position: relative;
		border: 1px solid #3C589C;
		min-height: 250px;
		background-color: white;
		top: -9px;
		width: 548px;
		left: 73px;
		margin-top: 5px;
		border-bottom: 2px solid #3C589C;
	}
	.desc {
		position: relative;
		text-align: left;
		left: 5px;
		font-size: 13px;
		width: 520px;
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
		top: -10px;
		width: 400px;
		font-size: 11px;
		left: 20px;
	}
		.reg {
		top: -65px;
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
    	left: 200px;
    	margin-top: 20px;
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
		color: #6EABD8;
		text-decoration: underline;
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
			top: -5px;
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
	.input {
			width: 320px;
			position: relative;
			top: 7px;
		}

	}
</style>
</html>