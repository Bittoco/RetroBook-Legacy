<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>theretrobook | My Groups</title>
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
	<p class="welcometext">My Groups</p>
	<?php 
		$uid = $_SESSION['email'];
		$sql = "SELECT * FROM groupmem WHERE email = '$uid'";
		$result = $conn->query($sql);
		$resultCheck = mysqli_num_rows($result);
		echo '<div class="display"><p class="dis">Displaying 0 - '.$resultCheck.' groups</p></div>';

	?>
	<div class="border">
	<a href="creategroup.php" class="create">[ create group ]</a>
	<div class="groups">
	<?php 
	if($resultCheck > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$group = $row['fgroup'];
		$sql2 = "SELECT * FROM groups WHERE name = '$group' ORDER BY datemade DESC";
		$result2 = $conn->query($sql2);
		while($row2 = mysqli_fetch_assoc($result2)) {
		echo '
				<div class="mygroupborder">
				<table class="info">';
				$id = htmlspecialchars($row2['id'], ENT_QUOTES, 'UTF-8');
				$uid = htmlspecialchars($_SESSION['email'], ENT_QUOTES, 'UTF-8');
				$sql3 = "SELECT * FROM groupmem WHERE email = '$uid' AND groupid = '$id'";
				$result3 = $conn->query($sql3);
				$resultCheck3 = mysqli_num_rows($result3);
         		if($resultCheck3 > 0) {
				echo '<td class="leavegroup"><a style="color:#538ADC; text-decoration: none;" href="leavegroup.php?id='.$row2['id'].'">Leave Group</a><tr>';
				} else {
					echo '<td class="leavegroup"><a style="color:#538ADC; text-decoration: none;" href="joingroup.php?id='.$row2['id'].'">Join membership</a><tr>';
				}
				echo '<td class="board"><a style="color:#538ADC;text-decoration: none; " href="messageboard.php?gid='.$row2['id'].'">Message Board</a>
				
			</table>';
			
			if ($row2['pfp'] === "") {
             	$pfp = '<img src="default.jpg" class="pfp"/>';
         		} else {
         		$pfp = '<img src="https://www.theretrobook.net/img/'.$row2['pfp'].'" class="pfp"/>';
         		}
         		echo $pfp;
         		echo '</div>';   
         		echo '<p class="inform">Name: <a class="a" style="color:#538ADC;" href="group.php?id='.$row2['id'].'">'.$row2['name'].'</a><br>
         		'.$row2['description'].'<br>';
         		$id = $row2['id'];
         		$sqlf= "SELECT * FROM groupmem WHERE groupid = '$id'";
         	$resultf = $conn->query($sqlf);
         	$resultCheckf = mysqli_num_rows($resultf);
         		echo  '<a style="color:#538ADC;">'.$resultCheckf.' Members</a>
         		</p>';    
         	}
         }
         echo '</div>';
	} else {
		echo "<h2 class='groupsign' style='top: -0px;'>[ You're not in any groups. ]</h2>";
	}

	$sql = "SELECT * FROM groups ORDER BY datemade DESC LIMIT 15;";
	$result2 = $conn->query($sql);
	$resultCheck = mysqli_num_rows($result2);
	if($resultCheck > 0) {
			echo '<h2 class="groupsign">[ More Groups ]</h2>';
			echo '<div class="moregroups" style="position: relative;top: 20px;">';
	while($row2 = mysqli_fetch_assoc($result2)) {
		echo '
				<div class="mygroupborder">
				<table class="info">';
				$id = htmlspecialchars($row2['id'], ENT_QUOTES, 'UTF-8');
				$uid = htmlspecialchars($_SESSION['email'], ENT_QUOTES, 'UTF-8');
				$sql3 = "SELECT * FROM groupmem WHERE email = '$uid' AND groupid = '$id'";
				$result3 = $conn->query($sql3);
				$resultCheck3 = mysqli_num_rows($result3);
         		if($resultCheck3 > 0) {
				echo '<td class="leavegroup"><a style="color:#538ADC; text-decoration: none;" href="group.php?id='.$row2['id'].'">Leave Group</a><tr>';
				} else {
					echo '<td class="leavegroup"><a style="color:#538ADC; text-decoration: none;" href="joingroup.php?id='.$row2['id'].'">Join membership</a><tr>';
				}
				echo '
				<td class="board"><a style="color:#538ADC;text-decoration: none; " href="messageboard.php?gid='.$row2['id'].'">Message Board</a>
				
			</table>';
			
			if ($row2['pfp'] === "") {
             	$pfp = '<img src="default.jpg" class="pfp"/>';
         		} else {
         		$pfp = '<img src="https://www.theretrobook.net/img/'.$row2['pfp'].'" class="pfp"/>';
         		}
         		echo $pfp;
         		echo '</div>';   
         		echo '<p class="inform">Name: <a class="a" style="color:#538ADC;" href="group.php?id='.$row2['id'].'">'.$row2['name'].'</a><br>
         		'.$row2['description'].'<br>';
         			$id = $row2['id'];
         		$sqlf= "SELECT * FROM groupmem WHERE groupid = '$id'";
         	$resultf = $conn->query($sqlf);
         	$resultCheckf = mysqli_num_rows($resultf);
         		echo  '<a style="color:#538ADC;">'.$resultCheckf.' Members</a>
         		</p>';    
         	}
         echo '</div>';
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
		min-height: 100px;
		background-color: white;
		top: -9px;
		width: 550px;
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
	.groupsign {
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		font-size: 19px;
		font-weight: bolder;
		margin-top: 0px;
		top: 20px;
		position: relative;
		font-size: 17px;
	}
	.display {
		background-color: #F1F1F1;
		height: 30px;
		width: 550px;
		position: relative;
		left: -1px;
		color: #3D65C2;
		margin-top: -9px;
		text-align: left;
		border: 1px solid #F1F1F1;
	}
	.dis {
		font-size: 13px;
		position: relative;
		top: -10px;
		left: 5px;
	}
	.create {
		font-size: 13px;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		position: relative;
		margin-top: -10px;
		top: 20px;
		display: flex;
		left: 20px;
		color: #538AE3;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		text-decoration: none;
	}
	.create:hover {
		color: #6EABD8;
		text-decoration: underline;
	}
	.pfp {
		border: 1px solid #3D65C2;
		min-width: 80px;
		max-width: 110px;
		min-height: 70px;
		max-height: 170px;
		position: relative;
		margin-top: -50px;
		top: -35px;
		margin-left: -300px;
		margin-bottom: -25px;
		vertical-align: top;
	}
	.info {
		border: 1px solid #3D65C2;
		font-size: 12px;
		margin-top: 12px;
		text-decoration: none;
		margin-left: 310px;
		margin-bottom: -10px;
		position: relative;
		height: -20x;
		top: 3px;
		width:110px;
		margin-bottom: 20px;
	}
	.inform {
			position: relative;
		margin-top: -50px;
		top: -50px;
		font-size: 11px;
		left: 5px;
		text-align: left;
		line-height: 15px;
		width: 180px;
		 overflow: hidden;
   text-overflow: ellipsis;
   display: -webkit-box;
   -webkit-line-clamp: 4; /* number of lines to show */
   -webkit-box-orient: vertical;
	}
	.mygroupborder {
		border-bottom: 1px solid #3D65C2;
		min-height: 90px;
		width: 448px;
		position: relative;
	}
	.groups {
		margin-top: 40px;
		
	}
	.leavegroup {
		border-bottom: 1px solid #3D65C2;
		text-decoration: none;
		position: relative;
		top: -5px;
		height: 25px;
		margin-bottom: -10px;
	}
	.leavegroup:hover {
		color: #85CAF1;
		text-decoration: underline;
	}
	.board {
		border-bottom: 1px solid #3D65C2;
		position: relative;
		top: -10px;
		height: 25px;
	}
	.board:hover {
		color: #85CAF1;
		text-decoration: underline;
	}
	
	@media only screen and (max-width:700px) {
		.name {
			left: -30px;
			font-size: 25px;
			margin-top: 30px;
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
			margin-left: px;
		}
		.mygroupborder {
			width: 358px;
			border-bottom: 0px solid white;
		}
		.newmessage {
			width: 358px;
		}
		.mymessageborder {
			width: 358px;
		}
		.border {
			
			width: 400px;
			top: -12px;
		}
        .pfp {
        margin-left: -220px;

        }
        .info {
        margin-left: 10px;
        font-size: 10px;
        left: 120px;
        margin-top: 20px;
        }
        .inform {
        	font-size: 10px;
        	width: 100px;

        }
		.myaccount {
			width: 360px;
		}
		.connected {
        width: 100px;
        font-size: 10px;
        margin-left: 240px;
        }
		
		.numofmes {
			margin-left: 20px;
		}
		.messagephoto {
			margin-left: -150px;
		}
		.poke {
			width: 358px;
		}
		.youhave {
			position: relative;
			left: -20px;
		}
		.back {
			position: relative;
			left: 30px;
		}
		.hide {
			position: relative;
			left: -50px;
			top: 25px;
		}
		.display {
			width: 400px;
		}
		


	}
</style>
</html>