<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Retrobook | Invite</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	 <link rel="icon" type="image/x-icon" href="favicon.png">
     <link ref="apple-touch-icon" sizes="128x128" href="favicon.png">
</head>
<body>
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
	<p class="welcometext">Invite Friends or Confirm Requests</p>
	<div class="border">
		<p class="ugot">Invite your Friends to Retrobook</p>
		<?php 
		if(isset($_GET['e'])) {
			if($_GET['e'] === "3") {
				echo '<p class="sent">Email Sent.</p>';
			}
		}
		?>
		<form method="post" action="invite.inc.php" style="margin-top: -20px;">
			<div class="flex"><p class="info" style="left: 25px;">Email Address:</p><input type="email" name="email" class="input"/></div>
			<div class="flex"><p class="info" style="left: 25px;">Subject:</p><input type="text" name="subject" value="Check out this 2006 Social Network Clone!" class="input"/></div>
			<div class="flex"><p style="margin-left: 55px;" class="info">Message:</p><textarea name="message" style="margin-left: 15px;left: -5px;" class="messagearea">Check out Retrobook! Heres my Retrobook Profile: https://theretrobook.net/profile.php?id=<?php echo $_SESSION['id'];?> </textarea></div>
			<div class="flex2"><button class="send" name="insubmit" type="submit">Send</button>
		</form>
		</div>
	
		<?php 
		$id = $_SESSION['id'];
		$sql = "SELECT * FROM invites WHERE toid = '$id'";
		$result = $conn->query($sql);
		$resultCheck = mysqli_num_rows($result);
		if($resultCheck > 0) {
			echo '<p class="ugot">You have group invitations awaiting confirmation.</p>';
			while($row = mysqli_fetch_assoc($result))  {
				$gid = $row['groupid'];
				$sql2 = "SELECT * FROM groups WHERE id = '$gid'";
				$result2 = $conn->query($sql2);
				while($row2 = mysqli_fetch_assoc($result2)) {
					echo '<div class="invite">';
					if($row2['pfp'] === "") {
						$pfp = "default.jpg";
					} else {
						$pfp = "img/".$row2['pfp'];
					}
					echo '<img src="'.$pfp.'" class="pfp"/>';
					echo '<p class="title">'.$row2['name'].'</p>';
					echo '<a href="joingroup.php?ind='.$row['groupid'].'&n='.$row['id'].'"><button class="join">Join Group</button></a>';
					echo '<a href="invite.inc.php?di='.$row['id'].'"><button style="margin-left: 10px;" class="join">Decline</button></a>';
					echo '</div>';
				}
			}
		} else {
			echo '<p class="no">You Have No Invites.</p>';
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
	
	.border {
		position: relative;
		border: 1px solid lightgray;
		min-height: 150px;
		background-color: white;
		top: -10px;
		width: 600px;
		left: -1px;
		border-bottom: 2px solid #3D65C2;
	}
	.desc {
		position: relative;
		top: 20px;
		margin-top: 20px;
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
	
	.status {
		position: relative;
		top: -107px;
		left: 93px;
		font-size: 12px;
		height: 20px;
		width: 150px;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
	}
	
	.error {
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		font-weight: bolder;
		font-size: 14px;
		position: relative;
		top: 5px;
	}
	.feature {
		font-weight: bolder;
		text-align: left;
		position: relative;
		margin-left: 20px;
		top: 20px;
	}
	.coming {
		margin-top: 50px;
		height: 100px;
		width: 100px;
		margin-bottom: 5px;
	}
	.no {
		border: 1px solid #dbe3e0;
		height: 30px;
		background-color: #f7f7f7;
		border-bottom: 1px solid #52566a;
		width: 90%;
		padding-top: 10px;
		color: #4D5E8B;
		font-weight: bolder;
		text-align: left;
		padding-left: 5%;
	}
	.ugot {
		font-size: 13px;
		color: #4D5E8B;
		font-weight: bolder;
		padding-bottom: 5px;
		border-bottom: 1px solid #d4dbdd;
		text-align: left;
		padding-left: 5%;
	}
	.invite {
		height: 230px;
		width: 90%;
		border-bottom: 1px solid #dedee0;
		margin-bottom: 5px;
	}
	.pfp {
		display: flex;
		min-height: 200px;
		max-height: 220px;
		min-width: 200px;
		max-width: 220px;
		border: 1px solid #3B5998;
		margin-left: %;
		margin-right: auto;
		position: absolute;
	}
	.title {
		position: relative;
		width: 50%;
		font-weight: bolder;
		left: 110px;
		font-size: 15px;
		text-align: left;
	}
	.join {
		border-style: solid;
    border-top-width: 1px;
    border-left-width: 1px;
    border-bottom-width: 1px;
    border-right-width: 1px;
    border-top-color: #D9DFEA;
    border-left-color: #D9DFEA;
    border-bottom-color: #0e1f5b;
    border-right-color: #0e1f5b;
    position: relative;
    left:35px;
    font-size: 11px;
    color: white;
    background-color: #3b5998;
    color: white;
    font-family: Tahoma,Verdana,Segoe,sans-serif;
	}
	.top {
		
		overflow: auto;
		overflow: hidden;
		
		white-space: normal;
		border-bottom: 1px solid lightgray;
		width: 90%;

		text-align: left;
	}
	.inviteimg {
		display: inline-block;
		position: relative;
		top:17px;


	}
	.text {
		display: inline-block;
		position: relative;
		font-weight: bold;
		margin-left:10px;
		color: #333333;
		font-size: 13px;
		margin-bottom: 20px;
		
	}
	.flex {
		position: relative;
		top:20px;
		margin-left: -30px;
	}
	.info {
		font-size: 12px;
		text-align: right;
		display: inline-block;
		color:  #333333;
		width: 80px;
		position: relative;
		vertical-align: top;
	}
	.input {
		border:1px solid lightgray;
		padding:3px;
		width: 250px;
		left:22px;
		position: relative;
		top:8px;
		margin-left: 15px;
	}
	.messagearea {
		border:1px solid lightgray;
		padding:3px;
		width: 250px;
		height: 150px;
		font-family: calibri;
		position: relative;
		margin-bottom: 30px;
	}
	.send {
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
    font-size: 12px;
    font-family: "lucida grande", tahoma, verdana, arial, sans-serif;
    text-align: center;
   height: 22px;
    width: 80px;
    position: relative;
    z-index: 5;
	}
	.flex2 {
		margin-left: 330px;
		overflow: auto;
		margin-bottom: 20px;
	}
	.cancel {
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
   	height: 22px;
    position: relative;
    overflow: auto;
    font-size: 12px;
   
	}
	.sent {
		text-align: left;
		font-size:12px;
		margin-left: 30px;
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
		
		.error {
			left: 60px;
			top: 30px;
		}
		.form1 {
			position: relative;
			left: 60px;
			margin-top: 15px;
		}
		.title {
			font-size: 10px;
		}
		.pfp {
				min-height: 170px;
		max-height: 190px;
		min-width: 170px;
		max-width: 190px;
		}
		.join {
			left: 80px;
		}
			@media only screen and (max-width:500px) {
			.header {
				left: 0px;
			}
		}
		@media only screen and (max-width:450px) {
			.join {
				left: 100px;
			}
		}
	}
</style>
</html>