<center>
<?php 
include 'dbh.inc.php';

if(!isset($_SESSION['name'])) {
echo '<div class="loginarea">
		<form method="post" action="login.inc.php">
		<input type="text" name="email" placeholder="Email:" class="email"><br><br><br>
		<input type="password" name="password" placeholder="Password:" class="password">
		<button class="loginalt" type="submit">Login</button></form>   <a href="signup.php"><button class="signupalt">Register</button></a>
		
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
	<input type="text" name="search" class="search">
	<label class="quick">quick search</label>
	<button type="submit" class="searchbutton" name="submit">go</button>
	</form>
	</div>
	<div class="loginarea" style="margin-top: 5px; text-align: left; height: 130px">
	<a href="profile.php?id='.$row['id'].'" class="link">My Profile <a class="editl" href="editprofile.php">[ edit ]</a></a><br>
	<a href="mygroups.php" class="link">My Groups</a><br>
	<a href="friends.php?id='.$row['id'].'" class="link">My Friends</a><br>
	<a href="mymessages.php" class="link">My Messages <b>'.$resultCheck2.'</b></a><br>
	<a href="awaymessage.php" class="link">My Away Messages</a><br>
	<a href="privacy.php" class="link">My Privacy</a>
	</div>';
}}
?>


	<style type="text/css">
	
	.loginarea {
		border: 1px dashed #3D65C2;
		position: relative;
		left: -280px;
		width: 140px;
		height: 170px;
		top: -32px;
	}
	.loginalt {
		position: relative;
		top: 50px;
		border-top-color: #D9DFEA;
    	border-left-color: #D9DFEA;
    	border-bottom-color: #3B5998;
    	border-right-color: #3B5998;
    	background-color: #3D65C2;
    	color: white;
    	left: -35px;
    	font-family: Tahoma,Verdana,Segoe,sans-serif;;
	}
	.signupalt {
		left: 30px;
		top: 28px;
		position: relative;
		border-top-color: #D9DFEA;
    	border-left-color: #D9DFEA;
    	border-bottom-color: #3B5998;
    	border-right-color: #3B5998;
    	background-color: #3D65C2;
    	color: white;
    	font-family: Tahoma,Verdana,Segoe,sans-serif;;
	
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
	.email {
		position: relative;
		width: 120px;
		top: 10px;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
	}
	.password {
		position: relative;
		width: 120px;
		top: -10px;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
	}
	.searcharea {
		border: 1px dashed #3D65C2;
		position: relative;
		left: -280px;
		width: 140px;
		height: 70px;
		top: -32px;
	}
	.search {
		width: 120px;
		position: relative;
		top: 10px;
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
	}
	.link:hover {
		color: #6EABD8;
		text-decoration: underline;
	}
	.editl {
		color: #538AE3;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		font-size: 13px;
		text-decoration: none;
		position: relative;
		top: 10px;
		left: 10px;
	}
	.editl:hover {
		color: #6EABD8;
		text-decoration: underline;
	}
	.new {
		border: 1px solid #3D65C2;
		width: 140px;
		font-size: 11px;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		position: relative;
		left: -280px;	
		top: -20px;
	}
	.new p {
		width: 120px;
		text-align: left;
	}
	.new a {
		color: #3D65C2;
	}
	@media only screen and (max-width:700px) {
		.loginarea {
			left: 310px;
			height: 200px;
			width: 180px;
		}
		.new {
			left: 310px;
			height: 200px;
			width: 180px;
		}
		.email {
			left: px;
			height: 20px;
			top: 35px;

		}
		.password {
			left: 25px;
			height: 20px;
			top: 35px;
			position: absolute;
			margin-top: 50px;
			margin-left: 0px;
		}
		.loginalt {
			top: 100px;
			left: -30px;
			height: 30px;
			position: absolute;
			margin-top: 50px;
			margin-left: 55px;
		}
		.signupalt {
			top: 70px;
			left: -30px;
			height: 30px;
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
	}
	</style>