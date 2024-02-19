<center>
<?php 
include 'dbh.inc.php';

if(!isset($_SESSION['name'])) {
echo '<div class="loginarea">
		<form method="post" action="login.inc.php">
		<p class="upbovet">Email:</p>
		<input type="text" name="email" placeholder="" class="email"><br><br><br>
		<p class="upboveta">Password:</p>
		<input type="password" name="password" placeholder="" class="password">
		<button class="loginalt" type="submit">Login</button></form>   <a href="signup.php"><button class="signupalt">Register</button></a>
		<a href="tourindex.php" style="text-decoration: none;"><div class="taketour"><p class="sitetour">Site Tour</p>
		<p class="learna">Learn about Retrobook.</p></div></a>
	</div>';
} else {
	$email = $_SESSION['email'];
	$sql = "SELECT * FROM users WHERE email = '$email'";
	$result = $conn->query($sql);
	while ($row = mysqli_fetch_assoc($result)) {
		$sql2 = "SELECT * FROM messages WHERE toemail = '$email' AND status = 'Unread'";
		$result2 = $conn->query($sql2);
		$resultCheck2 = mysqli_num_rows($result2);
	echo '<div class="searcharea">
	<form method="get" action="search.php">
	<input type="text" name="search" class="search" placeholder="Search">
	<img src="magglass.png" class="mag"/>
	</form>
	</div>
	<div class="loginarea2" style="margin-top: 5px; text-align: left; height: 130px">
	<a href="profile.php?id='.$row['id'].'" class="link">My Profile <a class="editl" style="color: #A4A2B0;" href="editprofile.php">edit</a></a>
	<hr class="linkline"/>
	<a href="friends.php?id='.$row['id'].'" class="link">My Friends</a>
		<hr class="linkline"/>
	<a href="myphotos.php?id='.$row['id'].'" class="link">My Photos</a>
	<hr class="linkline"/>
	<a href="notes.php?id='.$row['id'].'" class="link">My Notes</a>
		<hr class="linkline"/>
	<a href="mygroups.php" class="link">My Groups</a>
		<hr class="linkline"/>
	<a href="mymessages.php" class="link">My Messages <b>'.$resultCheck2.'</b></a>
		<hr class="linkline"/>
	<a href="myprivacy.php" class="link">My Privacy</a>
		<hr class="linkline"/>
	<a href="newsfeed.php" class="link">My News Feed</a>
	<hr class="linkline"/>
	<a href="myapps.php" class="link">My Applications</a>
		<hr class="linkline"/>';
	$sql3 = "SELECT * FROM userapps WHERE name = '$email'";
	$result3 = $conn->query($sql3);
	while($row3 = mysqli_fetch_assoc($result3)) {
		$id = $row3['appid'];
		$sql4 = "SELECT * FROM app WHERE id = '$id'";
		$result4 = $conn->query($sql4);
		while($row4 = mysqli_fetch_assoc($result4)) {
			if($row4['name'] === "Video") {
				echo '<a href="myvideos.php?id='.$_SESSION['id'].'" class="link">My Videos</a>
		<hr class="linkline"/>';
			}
		}
	}
	
	echo '</div>';
}}
?>
	<style type="text/css">
	
	.loginarea {
		
		position: relative;
		left: -290px;
		width: 140px;
		height: 170px;
		top: -32px;
	}
	.loginarea2 {
		width: 140px;
		position: relative;
		left: -290px;
		width: 140px;
		height: 170px;
		top: -82px;
	}
	.loginarea2 a {
		color: #3B5998;
		width: 140px;
	}
	.loginalt {
		position: relative;
		top: -5px;
		left: -40px;
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
    position: relative;
	}
	.signupalt {
		left: 10px;
		top: -23px;
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
    position: relative;
	
	}
	.login {
		position: relative;
		left: 50px;
		border-top-color: #D9DFEA;
    	border-left-color: #D9DFEA;
    	border-bottom-color: #3B5998;
    	border-right-color: #3B5998;
    	background-color: #3D65C2;
    	color: white;
    	font-family: Tahoma,Verdana,Segoe,sans-serif;;
	}
	.signup {
		position: relative;
		margin-left: -150px;
		border-top-color: #D9DFEA;
    	border-left-color: #D9DFEA;
    	border-bottom-color: #3B5998;
    	border-right-color: #3B5998;
    	background-color: #3D65C2;
    	color: white;
    	font-family: Tahoma,Verdana,Segoe,sans-serif;;
	}
	.linkline {
		margin-top: -5px;
		position: relative;
		top: 18px;
		left: -2px;
		width: 110px;
		border: 0.1px solid #D8DFEA;

	}
	.mag {
		display: block;
		margin-top: -5px;
		position: relative;
		margin-right: auto;
		left: px;
		top: -12px;
	}
	.email {
		position: relative;
		width: 110px;
		top: 10px;
		left: -3px;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		font-size: 11px;
    border: 1px solid #BDC7D8;
    height: 16px;
	}
	.password {
		position: relative;
		width: 110px;
		left: -3px;
		top: -10px;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		font-size: 11px;
    border: 1px solid #BDC7D8;
    height: 16px;
	}
	.searcharea {
		position: relative;
		left: -280px;
		width: 140px;
		height: 70px;
		top: -32px;
	}
	.search {
		width: 100px;
		position: relative;
		top: 0px;
		height: 20px;
		padding-left: 20px;
		border-radius: 5px;
		left: -15px;
		border: 1px solid #BDC7D8;
	}
	.quick {
		font-size: 13px;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		position: relative;
		top: 15px;
		left: -5px;
	}
	.searchbutton {
		position: relative;
		top: 15px;
		position: relative;
		border-top-color: #D9DFEA;
    	border-left-color: #D9DFEA;
    	border-bottom-color: #3B5998;
    	border-right-color: #3B5998;
    	background-color: #3D65C2;
    	color: white;
    	width: 40px;
    	font-family: Tahoma,Verdana,Segoe,sans-serif;;
	}
	.link {
		color: #538AE3;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		font-size: 13px;
		text-decoration: none;
		position: relative;
		left: 10px;
		top: 10px;
		
		min-width: 140px;
	}
	.link:hover {
		
		text-decoration: underline;
	}
	.editl {
		color: #A4A2B0;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		font-size: 13px;
		text-decoration: none;
		position: relative;
		top: 10px;
		left: 30px;
	}
	.editl:hover {
		
		text-decoration: underline;
	}
	.upbovet {
		margin-top: -15px;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		font-size: 11px;
		font-weight: bold;
		color: #808080;
		position: relative;
		text-align: left;
		top: 16px;
		left: 8px;
	}
	.upboveta {
		margin-top: -20px;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		font-size: 11px;
		font-weight: bold;
		color: #808080;
		position: relative;
		text-align: left;
		top: -3px;
		left: 8px;
	}
	a .taketour {
		text-decoration: none;
	}
	.taketour {
		height: 40px;
		border-top: 1px solid #cccccc;
		background-color: #f7f7f7;
		border-bottom: 1px solid #cccccc;
		text-align: left;
		position: relative;
		left: -3px;
		top: -10px;
		width: 115px;
		text-decoration: none;
	}
	.sitetour {
		margin-left: 5px;
		font-size: 11px;
		margin-top: 5px;
		color: #333333;
		font-weight: bolder;
		font-family: Tahoma,Verdana,Segoe,sans-serif;;
	}
	.learna {
		font-family: Tahoma,Verdana,Segoe,sans-serif;;
		font-size: 10px;
		color: #666666;
		margin-left: 5px;
		position: relative;
		top: -7px;
	}
	.taketour:hover {
		background-color: #D8DFEA;
		border-top-color: #3B5998;
		border-bottom-color: #3B5998;
		color: black;
	}
	.sitetour:hover {
		color: black;
	}
	.learna:hover {
		color: black;
	}
	.advertisement {
		background-color: darkblue;
		height: 350px;
		width: 112px;
		margin-left: 10px;
		margin-top: 40px;
		background-image: url("takeit.png");
		background-size: 120px;
	}
	@media only screen and (max-width:700px) {
		.loginarea {
			left: 310px;
			height: 200px;
			width: 180px;
		}
		.loginarea2 {
			left: 310px;
			height: 200px;
			width: 180px;
		}

		.email {
			left: -22px;
			height: 20px;
			top: 10px;

		}
		.password {
			left: 10px;
			height: 20px;
			top: 30px;
			position: absolute;
			margin-top: 50px;
			margin-left: 0px;
		}
		.loginalt {
			top: 60px;
			left: -40px;
			height: 20px;
			position: absolute;
			margin-top: 50px;
			margin-left: 55px;
		}
		.signupalt {
			top: 30px;
			left: -50px;
			height: 20px;
			position: absolute;
			margin-top: 80px;
			margin-left: 115px;
		}
		.searcharea {
			position: relative;
			left: 310px;
			width: 180px;
		}
		.quick {
			
		}
		.search {
			width: 150px;
		}
		.taketour {
			margin-left: -35px;
			margin-top: 80px;

		}
	}
	@media only screen and (max-width:450px) {
		.password {
			margin-top: 55px;
		}
		.loginalt {
			margin-top: 55px;
		margin-left: 45px;
		}
		.signupalt {
			margin-top: 85px;
		}
	}
	</style>