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
	<div class="border">
		<h2 class="loginsign">[ '.$row2['name'].' Message ]</h2>
		<p class="desc"><b>( '.$row['date'].' ) <a href="profile.php?id='.$row['creator'].'" class="uid">'.$row['creatorname'].'</a> wrote:</b></p>
		<p class="desc" style="top: -10px;">'.$row['message'].'</p>';
		
			echo '<p class="comments">Replies</p>';
			$id = $row['id'];
			$sql3 = "SELECT * FROM replies WHERE ogmessage = '$id' ORDER BY date DESC";
			$result3 = $conn->query($sql3);
			echo '<form action="group.inc.php" method="post">
			<textarea class="input" style="margin-top: 15px" placeholder="Add Response" rows="3" cols="50" name="reply"></textarea>
			<input type="hidden" value="'.$row['id'].'" name="id">
			<input type="hidden" value="'.$row2['id'].'" name="group">
			<button type="submit" class="reg" name="resubmit">Post Message</button>
			</form>';
			while($row3 = mysqli_fetch_assoc($result3)) {
				echo '<p class="desc" style="margin-top: -10px;"><b>( '.$row3['date'].' ) <a href="profile.php?id='.$row3['creatorid'].'" class="uid">'.$row3['creatorname'].'</a> wrote:</b></p>';
				echo '<p class="desc" style="top: -20px;" style="">'.$row3['text'].'</p>';
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
		width: 700px;
		background-color: #3D65C2;
		background-image: url("banner3.png");
		height: 90px;

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
	.welcome {
		position: relative;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		border: 1px solid #3D65C2;
		background-color: #3D65C2;
		width: 550px;
		height: 30px;
		margin-top: 10px;
		left: 75px;
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
		top: -9px;
		width: 550px;
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
	}
	.uid:hover {
		color: #6EABD8;
		text-decoration: underline;
	}
	.reg {
		top: -55px;
		position: relative;
		border-top-color: #D9DFEA;
    	border-left-color: #D9DFEA;
    	border-bottom-color: #3B5998;
    	border-right-color: #3B5998;
    	background-color: #3D65C2;
    	color: white;
    	font-family: Tahoma,Verdana,Segoe,sans-serif;
    	z-index: 5;
    	
    	margin-top: 20px;
	}
	.input {
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		position: relative;
		top: -15px;
	}
	.comments {
		font-weight: bolder;
		margin-right: auto;
		display: flex;
		margin-top: 19px;
		margin-left: 20px;
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
			width: 90%;
		}

	}
</style>
</html>