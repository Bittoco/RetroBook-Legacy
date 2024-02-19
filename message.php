<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>retrobook | Read Message</title>
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
	<p class="welcometext">Read Message</p>
	<div class="border"><br>
	<?php 
	$id = $_GET['id'];
	$sql = "SELECT * FROM messages WHERE id = '$id'";
	$result = $conn->query($sql);
	$resultCheck = mysqli_num_rows($result);
	if($resultCheck > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		if($_SESSION['email'] != $row['toemail'] && $_SESSION['email'] != $row['fromemail']) {
			header("location: mymessages.php");
			exit();
		} else {
			
			echo '<div class="message">';
			$from = $row['fromid'];
			$sql2 = "SELECT * FROM users WHERE id = '$from'";
			$result2 = $conn->query($sql2);
			while($row2 = mysqli_fetch_assoc($result2)) {
			    echo '<p class="messagefrom">Message From '.$row2['name'].'</p>';
			    echo'<p class="date">'.$row['date'].'</p>';
			}
			echo '<p class="info"><b>From: </b><br>';
			
			
			echo '<b>To: </b><br>';
			
			echo '
			<b>Subject: </b><br>
			<b>Message: </b>
			</p>';
			$from = $row['fromid'];
			$sql2 = "SELECT * FROM users WHERE id = '$from'";
			$result2 = $conn->query($sql2);
			while($row2 = mysqli_fetch_assoc($result2)) {
			 if($row2['pfp'] === "") {
			      $pfp = "pfp2.jpg";
			  } else {
			      $pfp = "img/".$row2['pfp']."";
			  }
			  echo '<a href="profile.php?id='.$row2['id'].'"><img src="'.$pfp.'" class="pfp"/></a>';
			echo '<p class="minfo"><a class="nlink" href="profile.php?id='.$from.'">'.$row2['name'].'</a>';
			}
			$from = $row['toid'];
			$sql2 = "SELECT * FROM users WHERE id = '$from'";
			$result2 = $conn->query($sql2);
			while($row2 = mysqli_fetch_assoc($result2)) {
			echo '<br><a class="nlink" href="profile.php?id='.$from.'">'.$row2['name'].'</a>';
			}
			echo '<br>'.$row['subject'].'<br>
			</p>';
			echo '<p class="mess">'.$row['message'].'</p>';
			if($_SESSION['email'] === $row['toemail'] && $row['status'] === "Unread") {
			echo '<form action="message.inc.php" method="post">
			<input type="hidden" value="'.$row['id'].'" name="id">
			<button type="submit" name="marksubmit" class="mar">Mark as Read</button>
			</form>';
			}
			echo '</div>';
		
	}}
	} else {
		header("location: mymessages.php");
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
	.pfp {
	    position: absolute;
	    max-width: 20%;
	    min-width: 10%;
	    min-height: 25%;
	    max-height: 35%;
	    display: flex;
	    margin-left: 5%;
	    margin-top: -110px;
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
	.face {
		top: -31px;
		border-top-left-radius: 5px;
		border-bottom-left-radius: 5px;
		left: -365px;
		position: relative;
		z-index: -1;
	}
	.messagefrom {
	    color: #3B5998;
	    font-weight: bolder;
	    font-size: 14px;
	    text-align: left;
	    width: 90%;
	    border-bottom: 1px solid #EAEBF0;
	    padding-bottom: 6px;
	}
	.date {
	    font-size: 11px;
	    color: darkgray;
	    margin-top: -10px;
	    text-align: left;
	    width: 90%;
	    margin-bottom: -5px;
	}
	.messagesign {
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		font-size: 19px;
		font-weight: bolder;
		margin-top: 0px;
		margin-bottom: 25px;
		top: 20px;
		position: relative;
	}
	
	.welcometext {
		color: white;
		position: relative;
		margin-top: 5px;
		text-align: left;
		margin-left: 5px;
		font-weight: bolder;
	}
	.border {
		position: relative;
		border: 1px solid lightgray;
		min-height: 50px;
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
		font-size: 15px;
	}
	.message {
		min-height: 50px;
		border: 1px solid #546AA3;
		width: 80%;
	     outline: 9px solid #D6E0E9;
		margin-bottom: 20px;
	}

	.subjectheader {
		vertical-align: top;
		background-color: #D8DEEA;
		color: #3B59A3;
		font-size: 13px;
		min-height: 20px;
		text-align: left;
		padding-left: 5px;
		font-weight: bolder;
	}
	.info {
		font-size: 13px;
		text-align: left;
		line-height: 25px;
		color: #808080;
		width: 30%;
		position: relative;
		top:-2px;
		z-index: 5;
			position: relative;
	}
	.minfo {
		text-align: left;
		font-size: 13px;
		line-height: 25px;
		width: 40%;
		margin-left: 190px;
		margin-bottom: 30px;
		margin-top: -115px;
			position: relative;
	}
	.mar {
		position: relative;
		top: -5px;
		display: flex;
		right: 5%;
		margin-left: auto;
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
    	margin-bottom: 20px;
	}
	.nlink {
		text-decoration: none;
		color: #3B59A3;
		position: relative;
		z-index: 6;
	}
	.nlink:hover {
		text-decoration: underline;
	}
	.mess {
		text-align: left;
		font-size: 13px;
		margin-top: -25px;
		width: 40%;
		margin-left: 190px;
		margin-bottom: 30px;
	    z-index: 5;
	    	position: relative;
	}
	@media only screen and (max-width:700px) {
		.name {
			left: -30px;
			font-size: 25px;
			margin-top: 30px;
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
			height: 30px;
		}
		.minfo {
			width: 70%;
		}
		.mess {
			width: 70%;
		}
	}
	@media only screen and (max-width:500px) {
			.header {
				left: 0px;
			}
		}
</style>
</html>