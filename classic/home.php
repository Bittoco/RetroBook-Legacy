
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>theretrobook | Home</title>
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
	require_once 'header.php';
	if(!isset($_SESSION['email'])) {
		header("location: index.php");
		exit();
	}
	?>
</div>
<div class="welcome">
	<p class="welcometext">Welcome <?php echo $name[0]; ?>!</p>
	<div class="border">
		<h2 class="welcomename">[ Welcome <?php echo $name[0]; ?> ]</h2>

		<div class="myaccount"><p class="mytext">My Account</p></div>
		<div class="myaccountborder">
			
			<table class="info">
				<?php 
				$email = $_SESSION['email'];
				$sql = "SELECT * FROM users WHERE email = '$email'";
				$result = $conn->query($sql);
				while ($row = mysqli_fetch_assoc($result)) {
				echo '<td class="viewprofile"><a style="color:#538ADC; text-decoration: none;" href="profile.php?id='.$row['id'].'">View my profile</a><tr>';
				}
				?>
				<td class="viewfriends"><a style="color:#538ADC;text-decoration: none; " href="friends.php?id=<?php echo $_SESSION['id']; ?>">View my friends</a><tr>
				<td class="viewgroups"><a style="color:#538ADC; text-decoration: none;" href="mygroups.php">View my groups</a><tr>
				<td class="searchfor"><a style="color:#538ADC;text-decoration: none;" href="search.php">Search for people</a><tr>
				<td class="viewnetwork"><a style="color:#538ADC;text-decoration: none;" href="global.php">Browse my network</a><tr>
			</table>
           <?php 
             
            $email = $_SESSION['email'];
				$sql = "SELECT * FROM users WHERE email = '$email'";
				$result = $conn->query($sql);
				while ($row = mysqli_fetch_assoc($result)) {
						$status = $row['status'];
						if($status = "Visitor to the site") {
							$stat = "network";
							$link = $row['status'];
						} else {
							$stat = "classes";
							$link = $row['status'];
						}
						$sql2 = "SELECT * FROM users WHERE status = '$status' AND email != '$email'";
						$result2 = $conn->query($sql2);
						$resultCheck2 = mysqli_num_rows($result2);
						if ($resultCheck2 === 1) {
							$p = "person";
						} else {
							$p = "people";
						}
					  echo '<p class="connected">You are connected to <b>'.$resultCheck2.'</b>
            '.$p.' through <a style="color: #3D65C2;" 		 href="global.php?search='.$link.'">'.$stat.'.</a></p>';

					if ($row['pfp'] === "") {
             	$pfp = '<img src="default.jpg" class="pfp"/>';
         		} else {
         		$pfp = '<img src="https://www.theretrobook.net/img/'.$row['pfp'].'" class="pfp"/>';
         		}
         		echo $pfp;
         }
             ?>
		</div>
		<?php 
		$sql = "SELECT * FROM messages WHERE toemail = '$email' AND status = 'Unread'";
		$result = $conn->query($sql);
		$resultCheck = mysqli_num_rows($result);
		if($resultCheck > 0) {
        echo '<div class="messages">
    	<div class="newmessage"><p class="newmessages">You have new messages.</p></div>
    	<div class="mymessageborder">
    	<img src="message.png" class="messagephoto">
    	 <p class="numofmes">You have <b>'.$resultCheck.'</b> new messages.</p>
   	 	</div>';
}
    ?>
    <?php 
		$email = $_SESSION['email'];
				$sql = "SELECT * FROM users WHERE email = '$email'";
				$result = $conn->query($sql);
				while ($row = mysqli_fetch_assoc($result)) {
					$id = $row['id'];
					$sql2 = "SELECT * FROm poke WHERE toid = '$id'";
					$result2 = $conn->query($sql2);
					$resultCheck2 = mysqli_num_rows($result2);
					if ($resultCheck2 > 0) {
						while($row2 = mysqli_fetch_assoc($result2)) {
						echo '
						<div class="poke">
						<div class="upoked"><p class="pokedtext">You have been poked.</p></div>
						<img src="poke.png" class="pokedpic"/>
						<p class="youhave">You have been poked by 
						<a style="color: #538AE3;" class="pokelink" href="profile.php?id='.$row2['fromid'].'">'.$row2['fromname'].'</a></p>
						<div class="pokeinfo">
						<a class="back" href="poke.inc.php?po='.$row2['fromid'].'">[ poke back ]</a>
						<a class="hide" href="poke.inc.php?d='.$row2['id'].'">[ hide poke ]</a>
						</div>
						</div>
						';
					}
					} else {
						echo '';
					}
		}

		$sql = "SELECT * FROM friendalert WHERE sendto = '$email'";
		$result = $conn->query($sql);
		$resultCheck = mysqli_num_rows($result);
		if($resultCheck > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$whofriended = $row['whofriended'];
				$sql2 = "SELECT * FROM users WHERE email = '$whofriended'";
				$result2 = $conn->query($sql2);
				while($row2 = mysqli_fetch_assoc($result2)) {
				$sql3 = "SELECT * FROM friends WHERE friend1 = '$email' AND friend2 = '$whofriended'";
				$result3 = $conn->query($sql3);
				$resultCheck3 = mysqli_num_rows($result3);
				require_once 'friendvariables.php';
				if($resultCheck3 > 0) {
					echo $not;
				} else {
					echo $notif;
				}
				
			}
			}
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
		left: 120px;
		color: #538BDE;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		top: px;
		font-size: 35px;
	}
	
	
	.welcomename {
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		font-size: 19px;
		font-weight: bolder;
	}
	.myaccount {
		background-color: #3D65C2;
		width: 450px;
		height: 22px;
	}
	.mytext {
		text-align: left;
		margin-left: 3px;
		color: white;
		font-size: 14px;
        padding-top: 3px;
	}
	
  
	.info {
		border: 1px solid #3D65C2;
		font-size: 12px;
		margin-top: 12px;
		text-decoration: none;
		height: 90px;
		margin-left: -40px;
	}
	.viewprofile {
		border-bottom: 1px solid #3D65C2;
		text-decoration: none;
	}
	.viewprofile:hover {
		color: #85CAF1;
		text-decoration: underline;
	}
	.viewfriends {
		border-bottom: 1px solid #3D65C2;
	}
	.viewfriends:hover {
		color: #85CAF1;
		text-decoration: underline;
	}
	.viewgroups {
		border-bottom: 1px solid #3D65C2;
	}
	.viewgroups:hover {
		color: #85CAF1;
		text-decoration: underline;
	}
	.searchfor {
		border-bottom: 1px solid #3D65C2;
	}
	.searchfor:hover {
		color: #85CAF1;
		text-decoration: underline;
	}
	.viewnetwork {
		
	}
	.viewnetwork:hover {
		color: #85CAF1;
		text-decoration: underline;
	}
    .connected {
    width: 175px;
   
    font-size: 13px;
    margin-left: 250px;
    margin-top: 5px;
    position: relative;
    top: -100px;
    }
    .newmessage {
		
    	background-color: #3D65C2;
		width: 450px;
		height: 22px;
    }
    .newmessages {
    	text-align: left;
		margin-left: 3px;
		color: white;
		font-size: 14px;
        padding-top: 3px;
    }
    .mymessageborder {
    	border: 1px solid #3D65C2;
		height: 120px;
		width: 448px;
		margin-bottom: 35px;
    }
    .messagephoto {
    	position: absolute;
    	margin-top: 30px;
    	margin-left: -200px;
    }
    .numofmes {
    	font-size: 13px;
    	margin-top: 45px;
    	margin-left: -100px;
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
		margin-left: 5px;
	text-align: left;
	}
	.myaccountborder {
		border: 1px solid #3D65C2;
		height: 120px;
		width: 448px;
		margin-bottom: 30px;
	}
	.pfp {
		border: 1px solid #3D65C2;
		min-width: 80px;
		max-width: 110px;
		min-height: 70px;
		max-height: 100px;
		position: relative;
		top: -150px;
		margin-left: -300px;
	}
	.border {
		position: relative;
		border: 1px solid lightgray;
		min-height: 250px;
		background-color: white;
		top: -9px;
		width: 550px;
		left: -1px;
		border-bottom: 2px solid #3D65C2;
	}
	.poke {
		border: 1px solid #3D65C2;
		width: 448px;
		margin-bottom: 35px;
		height: 110px;
	}
	.upoked {
		background-color: #3D65C2;
		height: 23px;
		position: relative;
		top: -15px;
	}
	.pokedtext {
		color: white;
		font-size: 14px;
		text-align: left;
		padding-top: 3px;
		margin-left: 3px;
	}
	.pokedpic {
		height: 80px;
		position: relative;
		float: left;
		top: -5px;
		left: -10px;
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
	.back {
		color: #538AE3;
	}
	.hide {
		color: #538AE3;

	}
	.pokeinfo {
		position: relative;
		font-size: 13px;
		top: -50px;
		left: 85px;
	}
	.back:hover {
		color: #6EB3E3;
		text-decoration: underline;
	}
	.hide:hover {
		color: #6EB3E3;
		text-decoration: underline;
	}
	.friend {
		border: 1px solid #3D65C2;
		width: 448px;
		margin-bottom: 35px;
		height: 110px;
	}
	.ubeen {
		background-color: #3D65C2;
		height: 23px;
		position: relative;
		top: -15px;
	}
	.friendtext {
		color: white;
		font-size: 14px;
		text-align: left;
		padding-top: 3px;
		margin-left: 3px;

	}
	.friendpic {
		height: 50px;
		position: relative;
		float: left;
		top: 0px;
		left: 10px;
	}
	.frinfo {
		position: relative;
		font-size: 13px;
		top: -50px;
		left: 135px;
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
        .pfp {
        margin-left: -220px;
        }
        .info {
        margin-left: 10px;
        font-size: 10px;
        margin-top: 20px;
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
				margin-top: 10px;
			}
			.pfp {
				top: -158px;
			}
			.back {
				left: 40px;
			}
		}

	}
</style>
</html>