
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>theretrobook | Global</title>
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
	<?php 
	if(isset($_GET['search'])) {
		echo '<p class="welcometext" style="font-size: 13px;">Searched for all people who have "'.$_GET['search'].'" as their status.</p>';
	} else {
		echo '<p class="welcometext">Browse</p>';
	}
?>
	<?php 
	if(isset($_GET['page'])) {
    $page = (int) $_GET['page'];
	} else {
	    $page = 1;
	}
	$items_per_page = 15;
	if(isset($_GET['search'])) {
		$search = $_GET['search'];
		$sql = "SELECT * FROM users WHERE status = '$search'";
	} else {
	$sql = "SELECT * FROM users;";
}
	$result = $conn->query($sql);
	$resultCheck = mysqli_num_rows($result);
	$email = $_SESSION['email'];
	$result2 = $conn->query("SELECT * FROM users WHERE email != '$email' ORDER BY lastupdated DESC LIMIT $items_per_page OFFSET " . ($page - 1) * $items_per_page);
	?>
	<div class="border">
		<h2 class="welcomename"></h2>
		<?php 
		echo '<div class="display"><p class="dis">Displaying '.mysqli_num_rows($result2).' - '.$resultCheck.' users'; 
		$email = $_SESSION['email'];
				if(isset($_GET['search'])) {
				$search = $_GET['search'];
				
				$result = $conn->query("SELECT * FROM users WHERE email != '$email' AND status = '$search' ORDER lastupdated DESC LIMIT $items_per_page OFFSET " . ($page - 1) * $items_per_page);
				} else {	
				
				$result = $conn->query("SELECT * FROM users WHERE email != '$email' ORDER BY lastupdated DESC LIMIT $items_per_page OFFSET " . ($page - 1) * $items_per_page);
				}
				echo '<mi>';
		if($page > 1) {
		    echo '<a class="prev" href="?page=' . ($page - 1) . '">Prev</a> <ri>|</ri> ';
		}
		if($result->num_rows == $items_per_page) {
		    $next_result = $conn->query("SELECT * FROM users WHERE email != '$email' ORDER BY datejoined AND lastupdated DESC LIMIT 1 OFFSET " . ($page * $items_per_page));
		    if($next_result->num_rows > 0) {
		        echo '<a class="next" href="?page=' . ($page + 1) . '">Next</a>';
		    }
		}
		echo '</mi></p></div>';
				
				
				$resultCheck = mysqli_num_rows($result);
				if($resultCheck > 0) {
				while ($row = mysqli_fetch_assoc($result)) {

				if ($row['sex'] === "Female") {
				$gend = "Her!";
			} if ($row['sex'] === "Male") {
				$gend = "Him!";
			} elseif ($row['sex'] != "Male" && $row['sex'] != "Female") {
				$gend = "Them!";
			}
				$sql2 = "SELECT * FROM users WHERE email = '$email'";
				$result2 = $conn->query($sql2);
				while($row2 = mysqli_fetch_assoc($result2)) {
					$id = $row2['id'];
					$id1 = $row['id'];
					$sql3 = "SELECT * FROM friends WHERE fid1 = '$id' AND fid2 = '$id1'";
					$result3 = $conn->query($sql3);
					$resultCheck3 = mysqli_num_rows($result3);
					if($resultCheck3 > 0) {
					while($row3 = mysqli_fetch_assoc($result3)) {
						$friend = 'Remove from Friends';
						$flink = 'remove.inc.php?r='.$id1.'';
					} 
					} else {
						$friend = 'Add to Friends';
						$flink = 'friend.inc.php?f='.$id1.'';
					}
			} 
				echo '
				<div class="myaccountborder">
				<table class="info">
				<td class="viewprofile"><a style="color:#3B5998; text-decoration: none;" href="profile.php?id='.$row['id'].'">View Profile</a><tr>
				<td class="viewfriends"><a style="color:#3B5998;text-decoration: none; " href="friends.php?id='.$row['id'].'">View Friends</a><tr>
				<td class="viewgroups"><a style="color:#3B5998; text-decoration: none;" href="'.$flink.'">'.$friend.'</a><tr>
				<td class="searchfor"><a style="color:#3B5998;text-decoration: none;" href="poke.inc.php?poo='.$id1.'">Poke '.$gend.'</a><tr>
				<td class="viewnetwork"><a style="color:#3B5998;text-decoration: none;" href="send.php?id='.$row['id'].'">Send Message</a><tr>
			</table>';
			
			if ($row['pfp'] === "") {
             	$pfp = '<img src="default.jpg" class="pfp"/>';
         		} else {
         		$pfp = '<img src="img/'.$row['pfp'].'" class="pfp"/>';
         		}
         		echo $pfp;
         		echo '</div>';   
         		echo '<p class="inform"><gi>Name: </gi><a class="a" style="color:#3B5998; font-size: 14px;" href="profile.php?id='.$row['id'].'">'.$row['name'].'</a><br>
         		<gi>Network: </gi>'.$row['status'].'<br>
         		<gi>Relationship status: </gi>'.$row['rstatus'].'
         		</p>';    
		}} else {
			echo '<b>No users found</b>';
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
	.info {
		border: 1px solid white;
		font-size: 12px;
		margin-top: 12px;
		text-decoration: none;
		height: 90px;
		margin-left: 310px;
		margin-bottom: -10px;
		position: relative;
		top: 3px;
		width:110px;
	}
	.viewprofile {
		border-bottom: 1px solid #D8DFEA;
		text-decoration: none;
	}
	.viewprofile:hover {
		color: #85CAF1;
		text-decoration: underline;
	}
	.viewfriends {
		border-bottom: 1px solid #D8DFEA;
	}
	.viewfriends:hover {
		color: #85CAF1;
		text-decoration: underline;
	}
	.viewgroups {
		border-bottom: 1px solid #D8DFEA;
	}
	.viewgroups:hover {
		color: #85CAF1;
		text-decoration: underline;
	}
	.searchfor {
		border-bottom: 1px solid #D8DFEA;
	}
	.searchfor:hover {
		color: #85CAF1;
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
		border: 1px solid #dfdfdf;
		min-height: 90px;
		width: 448px;
		background: white;
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
		background-color: #f7f7f7;
		top: -10px;
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
		
		height: 10px;
		width: 95%;
		position: relative;
		left: -1px;
		color: #3B5998;
		margin-top: -9px;
		font-weight: bolder;
		font-size: 13px;
		text-align: left;
		margin-top: 20px;
		padding-bottom: 3px;
		border-bottom: 1px solid #D8DFEA;
		margin-bottom: 5px;
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
		left: 5px;
		text-align: left;
		
		width: 180px;
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
	.dis a {
		font-weight: normal;
		text-decoration: none;
		color: #3B5998;
	}
	.dis a:hover {
		text-decoration: underline;
	}
	.dis ri {
		color: lightgray;
	}
	.dis mi {
		float: right;
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
		@media only screen and (max-width:500px) {
			.header {
				left: 0px;
			}
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

	}
</style>
</html>