
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

	?>
</div>
<div class="welcome">
	<p class="welcometext">Welcome <?php echo $name[0]; ?>!</p>
	<div class="border">

		<div class="myaccount"><p class="mytext">My Account</p></div>
		<div class="myaccountborder">
			
			<table class="info">
				<?php 
				$email = $_SESSION['email'];
				$sql = "SELECT * FROM users WHERE email = '$email'";
				$result = $conn->query($sql);
				while ($row = mysqli_fetch_assoc($result)) {
				echo '<td class="viewprofile"><a style="color:#3B59A3; text-decoration: none;" href="profile.php?id='.$row['id'].'">View my profile</a><tr>';
				}
				?>
				<td class="viewfriends"><a style="color:#3B59A3;text-decoration: none; " href="friends.php?id=<?php echo $_SESSION['id']; ?>">View my friends</a><tr>
				<td class="viewgroups"><a style="color:#3B59A3; text-decoration: none;" href="mygroups.php">View my groups</a><tr>
				<td class="viewnetwork"><a style="color:#3B59A3;text-decoration: none;" href="mymessages.php">View my messages</a><tr>
				<tr>
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
            '.$p.' through <a style="color: #3B5998" 		 href="global.php?search='.$link.'">'.$stat.'.</a></p>';

					if ($row['pfp'] === "") {
             	$pfp = '<img src="default.jpg" class="pfp"/>';
         		} else {
         		$pfp = '<img src="img/'.$row['pfp'].'" class="pfp"/>';
         		}
         		echo $pfp;
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
		background-color: #D8DEEA;
		border-top: 1px solid #3B59A3;
		width: 500px;
		height: 19px;
		margin-top: 20px;
	}
	.mytext {
		text-align: left;
		margin-left: 3px;
		color: #3B59A3;
		font-size: 11.5px;
		position: relative;
		top: -13px;
        padding-top: 3px;
        font-weight: bolder;
	}
	
  
	.info {
		border: 1px solid white;
		font-size: 12px;
		margin-top: 12px;
		text-decoration: none;
		height: 90px;
		color: #3B59A3;
		margin-left: -40px;
	}
	.viewprofile {
		
		text-decoration: none;
	}
	.viewprofile:hover {
		color: #85CAF1;
		text-decoration: underline;
	}
	.viewfriends {
		
	}
	.viewfriends:hover {
		color: #85CAF1;
		text-decoration: underline;
	}
	.viewgroups {
		
	}
	.viewgroups:hover {
		color: #85CAF1;
		text-decoration: underline;
	}
	.searchfor {
		
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
    top: -90px;
    }
    .newmessage {
		border-bottom: 1px solid #EEEEEE;
    	background-color: #D8DEEA;
		width: 500px;
		height: 19px;
    }
    .newmessages {
    	border-top: 1px solid #3B5998;
    	position: relative;
    	text-align: left;
		margin-left: 3px;
		font-weight: bolder;
		color: #3B5998;
		font-size: 11.5px;
        padding-top: 2px;
    }
    .mymessageborder {
    	border-top: 0px solid white;
    	border: 1px solid white;
    	border-bottom: 0px solid;
		height: 80px;
		width: 498px;
		margin-bottom: 5px;
    }
    .messagephoto {
    	position: absolute;
    	margin-top: 10px;
    	margin-left: -200px;
    }
    .numofmes {
    	font-size: 11.5px;
    	margin-top: 25px;
    	margin-left: -100px;
    }
    .numofmes b, a {
    color: #538AE3;
    text-decoration: none;
    }
    .numofmes a {
    	text-decoration: underline;
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
	.myaccountborder {
		border: 1px solid white;
		height: 120px;
		width: 448px;
		margin-bottom: 5px;
	}
	.pfp {
		border: 1px solid #3B59A3;
		min-width: 80px;
		max-width: 110px;
		min-height: 70px;
		max-height: 100px;
		position: relative;
		top: -140px;
		margin-left: -300px;
	}
	.desc {
		position: relative;
		text-align: left;
		left: 5px;
		font-size: 11px;
		width: 520px;
	}
	.face {
		top: -31px;
		border-top-left-radius: 5px;
		border-bottom-left-radius: 5px;
		left: -365px;
		position: relative;
		z-index: -1;
	}
	.poke {

		border: 1px solid #3D65C2;
		width: 448px;
		margin-bottom: 5px;
		height: 110px;
		border-top: 0px solid white;
    	border: 1px solid white;
    	border-bottom: 0px solid;
		height: 100px;
		width: 498px;
	}
	.upoked {
		border-top: 1px solid #3B5998;
		background-color: #D8DEEA;
		height: 19px;
		position: relative;
		top: -15px;

	}
	.pokedtext {
		color: white;
		font-size: 11.5px;
		text-align: left;
		padding-top: 3px;
		margin-left: 3px;
		font-weight: bolder;
		color: #3B59A3;
		position: relative;
		top: -12px;
	}
	.pokedpic {
		height: 80px;
		position: relative;
		float: left;
		top: -10px;
		left: -10px;
	}
	.youhave {
		font-size: 11.5px;
		position: relative;
		left: -40px;
		top: -5px;
		text-align: left;
		width: 190px;
		
	}
	.youhave a {
		color: #3B59A3;
	}
	.pokelink {
		text-decoration: none;
		z-index: 5;
		color: #3B59A3;
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
		
		width: 500px;
		margin-bottom: 5px;
		height: 90px;
	}
	.ubeen {
		border-top: 1px solid #3B5998;;
		background-color: #D8DEEA;
		height: 19px;
		position: relative;
		top: -15px;
		font-weight: bolder;

	}
	.friendtext {
		color: #3B59A3;
		font-size: 11.5px;
		text-align: left;
		padding-top: 3px;
		margin-left: 3px;
		position: relative;
		top: -12px;
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
			height: 280px;
			width: 400px;
			top: -12px;
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
		@media only screen and (max-width:500px) {
			.header {
				left: 0px;
			}
		}	
</style>
</html>