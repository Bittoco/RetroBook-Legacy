
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>theretrobook | My friends</title>
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
	$id = mysqli_real_escape_string($conn,  $id);
	$sql = "SELECT * FROM users WHERE id = '$id'";
	$result = $conn->query($sql);
	$resultCheck = mysqli_num_rows($result);
	if($resultCheck > 0) {
	while($row = mysqli_fetch_assoc($result)) {
	echo "<p class='welcometext'>".$row['name']."'s friends</p>";
	
	$email2 = $row['email'];
				$friendemail = $row['email'];
				if($row['friendvis'] === "Friends" && $row['id'] != $_SESSION['id']) {
		$sqlf = "SELECT * FROM friends WHERE friend1 = '$email2' AND friend2 = '$friendemail'";
			$resultf = $conn->query($sqlf);
			$resultCheckf = mysqli_num_rows($resultf);
			if($resultCheckf > 0) {
			
			} else {
			header("location: profile.php?id=".$id."");
			exit();
			}
			
				}
	}
	} else {
		header("location: home.php");
	}
} else {
	header("location: home.php");
}
	?>
	<?php 
	$sql2 = "SELECT * FROM friends WHERE fid1 = '$id'";
			$result2 = $conn->query($sql2);
			$resultCheck2 = mysqli_num_rows($result2);
	echo '<div class="display"><p class="dis">Displaying 1 - '.$resultCheck2.' users</p></div>';
	?>
	<div class="border">
		<h2 class="welcomename"></h2>
		<?php 
		$id = $_GET['id'];
			$sql2 = "SELECT * FROM friends WHERE fid1 = '$id'";
			$result2 = $conn->query($sql2);
			$resultCheck2 = mysqli_num_rows($result2);
			if($resultCheck > 0) {
				echo '<div class="options">
				<div class="option">Friends List</div>&nbsp;<a style="text-decoration: none;" href="friendfinder.php"><div class="option" style="background: white; color: #3B5998;">Friend Finder</div></a>&nbsp;<a style="text-decoration: none;" href="friendgame.php"><div class="option" style="background: white; color: #3B5998;">Friend Game</div></a></a>
				</div>';
				while($row2 = mysqli_fetch_assoc($result2)) {
					$friend = $row2['fid2'];
					$sql = "SELECT * FROM users WHERE id = '$friend'";
					$result = $conn->query($sql);
					while($row = mysqli_fetch_assoc($result)) {
						if ($row['sex'] === "Female") {
				$gend = "Her!";
			} if ($row['sex'] === "Male") {
				$gend = "Him!";
			} elseif ($row['sex'] != "Male" && $row['sex'] != "Female") {
				$gend = "Them!";
			}
						$id = $_SESSION['id'];
						$id1 = $row['id'];
						$sql3 = "SELECT * FROM friends WHERE fid1 = '$id' AND fid2 = '$id1'";
					$result3 = $conn->query($sql3);
					$resultCheck3 = mysqli_num_rows($result3);
					if($resultCheck3 > 0) {
					while($row3 = mysqli_fetch_assoc($result3)) {
						$friend = 'Remove from Friends';
						$flink = 'removef.inc.php?roo='.$id1.'&id='.$_GET['id'].'';
					} 
					} elseif ($row['email'] === $_SESSION['email']) {
						$friend = "This is you";
						$flink = "profile.php?id=".$row['id']."";
					}	
						else {
						$friend = 'Add as Friend';
						$flink = 'friend.inc.php?foo='.$id1.'+id='.$_GET['id'].'';
					}

					
					echo '
				<div class="myaccountborder">
				<table class="info">
				<td class="viewnetwork"><a style="color:#3B5998;text-decoration: none;" href="send.php?id='.$row['id'].'">Send Message</a><tr>
				<td class="searchfor"><a style="color:#3B5998;text-decoration: none;" href="poke.inc.php?pok='.$id1.'&id='.$_GET['id'].'">Poke '.$gend.'</a><tr>
				<td class="viewfriends"><a style="color:#3B5998;text-decoration: none; " href="friends.php?id='.$id1.'">View Friends</a><tr>
				<td class="viewgroups"><a style="color:#3B5998; text-decoration: none;" href="'.$flink.'">'.$friend.'</a><tr>	
			</table>';
			
			if ($row['pfp'] === "") {
             	$pfp = '<img src="default.jpg" class="pfp"/>';
         		} else {
         		$pfp = '<img src="img/'.$row['pfp'].'" class="pfp"/>';
         		}
         		echo $pfp;
         		echo '</div>';   
         		echo '<p class="inform"><gi>Name: </gi><a class="a" style="color:#3B5998;font-size: 13px;" href="profile.php?id='.$row['id'].'">'.$row['name'].'</a><br>
         		<gi>Network: </gi>'.$row['status'].'<br>
         		<gi>Relationship status: </gi>'.$row['rstatus'].'
         		</p>';    
				}}
			}
		?>
   	<br>
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
	.mytext {
		text-align: left;
		margin-left: 3px;
		color: white;
		font-size: 14px;
        padding-top: 3px;
	}
	
  
	.info {
		border: 1px solid white;
		font-size: 12px;
		margin-top: 12px;
		text-decoration: none;
		height: 90px;
		margin-left: 310px;
		margin-bottom: -0px;
		position: relative;
		top: 3px;
		width:130px;
	}
	.viewprofile {
			border-bottom: 1px solid #D8DFEA;
		text-decoration: none;
	}
	.viewprofile:hover {
		color:#3B5998;
		text-decoration: underline;
	}
	.viewfriends {
		border-bottom: 1px solid #D8DFEA;
	}
	.viewfriends:hover {
		color:#3B5998;
		text-decoration: underline;
	}
	.viewgroups {
		border-bottom: 1px solid #D8DFEA;
	}
	.viewgroups:hover {
		color:#3B5998
		text-decoration: underline;
	}
	.searchfor {
		border-bottom: 1px solid #D8DFEA;
	}
	.searchfor:hover {
		color: #3B5998;
		text-decoration: underline;
	}
	.viewnetwork {
		border-bottom: 1px solid #D8DFEA;
	}
	.viewnetwork:hover {
		color: #85CAF1;
		text-decoration: underline;
	}
    .connected {
    width: 190px;
    font-size: 13px;
    margin-left: 250px;
    margin-top: 5px;
    position: relative;
    top: -100px;
    }
   
	.myaccountborder {
		border-bottom: 1px solid #D8DFEA;
		min-height: 90px;
		width: 448px;
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
	.border {
		position: relative;
		border: 1px solid lightgray;
		min-height: 230px;
		background-color: white;
		top: -9px;
		width: 600px;
		left: -1px;
		border-bottom: 2px solid #3D65C2;
	}
	
	.youhave {
		font-size: 13px;
		position: relative;
		left: -40px;
		top: -5px;
		text-align: left;
		width: 190px;
		
	}
	.pokelink {
		text-decoration: none;
		z-index: 5;
	}
	.pokelink:hover {
		text-decoration: underline;
	}
	.display {
		background-color: #F1F1F1;
		height: 30px;
		width: 600px;
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
	.inform {
		position: relative;
		margin-top: -50px;
		top: -50px;
		font-size: 11px;
		left: 0px;
		text-align: left;
			vertical-align: text-top;
		width: 170px;
	}
	.a {
		text-decoration: none;
	}
	.a:hover {
		text-decoration: underline;
	}
	gi {
		color: #96A1A8;
		padding-right: 5px;
	}
	.options {
		display: flex;
		border-bottom: 1px solid #3B5998;
		margin-top: -10px;
	}
	.option {
		background-color: #3B5998;
		color: white;
		padding: 5px;
		font-size: 12px;
		position: relative;
		left: 10px;
        display: inline-block;
	}
	.option a {
		text-decoration: none;
	}
	a .option {
		text-decoration: none;
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
			margin-left: px;
		}
		.myaccountborder {
			width: 358px;
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
		.display {
			width: 400px;
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
		@media only screen and (max-width:450px) {
			.info {
				margin-top: -10px;
			}
			.pfp {
				
			}
			.back {
				left: 40px;
			}
			.inform {
				margin-top: -70px;
				top: -30px;
			}
		}
		@media only screen and (max-width:500px) {
			.header {
				left: 0px;
			}
		}

	}
</style>
</html>