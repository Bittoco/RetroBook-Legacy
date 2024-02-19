<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	 <link rel="icon" type="image/x-icon" href="favicon.png">
     <link ref="apple-touch-icon" sizes="128x128" href="favicon.png">
</head>
<body>
	<center>
<div class="header">
	<a href="index.php" style="text-decoration: none;"><h1 class="name">[ thefacebook ]</h1></a>
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
	if (!isset($_GET['id'])) {
	echo '<p class="welcometext">Inactive Profile</p>
	<div class="mb">
	<title>Inactive Page</title>
	<div class="border">
	<p class="not">It seems that the user you are looking for on this page is not found.</p>
	</div>';
} else {

	$id = htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8');
	$sql = "SELECT * FROM users WHERE id = '$id'";
	$result = $conn->query($sql);
	$resultCheck = mysqli_num_rows($result);
	if ($resultCheck > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			echo '<title>thefacebook | '.$row['name'].'</title>';
			include_once 'variables.php';
			if ($row['sex'] === "Female") {
				$gend = "Her!";
				$gen = "Her";
				$gend2 = "She";
			} if ($row['sex'] === "Male") {
				$gend = "Him!";
				$gen = "Him";
				$gend2 = "He";
			} elseif ($row['sex'] != "Male" && $row['sex'] != "Female") {
				$gend = "Them!";
				$gen = "They";
				$gend2 = "They";
			}
			$fname2 = $row['name'];
        	$name2 = explode(" ", $fname2);
			echo "<p class='welcometext'>".$row['name']."'s Profile</p><div class='mb'>";
			echo '
			<div class="border">
			<div class="left">
			<div class="picture">
			<p class="ph">Picture</p>';
			if (isset($_SESSION['email']) && $row['email'] === $_SESSION['email']) {
				echo '<a href="editpicture.php" class="editpfp">[ edit ]</a>';
			}
			echo '<br>';
			if ($row['pfp'] === "") {
             	$pfp = '<img src="default.jpg" class="pfp"/>';
         		} else {
         		$pfp = '<img src="img/'.$row['pfp'].'" class="pfp"/>';
         		}
         	echo $pfp;
         	$friendemail = $row['email'];
         	$email2 = $_SESSION['email'];
         	echo '
			</div>';
			if (isset($_SESSION['email']) && $row['email'] === $_SESSION['email']) {
			echo '<div class="accfun"><a class="acclink" href="editprofile.php">Edit Profile</a></div><br>
			<div class="accfun" style="margin-top: -20px;"><a class="acclink" href="editpicture.php">Edit Profile Picture</a></div>';
			} elseif(isset($_SESSION['email']) && $row['email'] != $_SESSION['email']) {
				echo '<div class="accfun"><a class="acclink" href="send.php?id='.$row['id'].'">Send '.$name2[0].' a Message</a></div><br>
			<div class="accfun" style="margin-top: -20px;"><a class="acclink" href="poke.inc.php?p='.$row['id'].'">Poke '.$gend.'</a></div>';
			$sqlf = "SELECT * FROM friends WHERE friend1 = '$email2' AND friend2 = '$friendemail'";
			$resultf = $conn->query($sqlf);
			$resultCheckf = mysqli_num_rows($resultf);
			if($resultCheckf > 0) {
			echo '<br><div class="accfun" style="margin-top: -20px;"><a class="acclink" href="removep.inc.php?r='.$row['id'].'">Remove as Friend</a></div>';
			} else {
				echo '<br><div class="accfun" style="margin-top: -20px;"><a class="acclink" href="friendprofile.inc.php?f='.$row['id'].'">Add to Friends</a></div>';
			}
			}
			$sql2 = "SELECT * FROM users WHERE email = '$email2'";
			$result2 = $conn->query($sql2);
			while($row2 = mysqli_fetch_assoc($result2)) {

			
			$sqlf = "SELECT * FROM friends WHERE friend1 = '$email2' AND friend2 = '$friendemail'";
			$resultf = $conn->query($sqlf);
			$sqlu = "SELECT * FROM friends WHERE friend2 = '$email2' AND friend1 = '$friendemail'";
			$resultu = $conn->query($sqlu);
			$resultChecku = mysqli_num_rows($resultu);
			if(mysqli_num_rows($resultf) > 0) {
				$co = "You have ".$gen." as a friend.";
			}
			elseif (isset($_SESSION['email']) && $_SESSION['email'] === $row['email']) {
				$co = "This is you.";
			} 
			elseif($resultChecku > 0){
				$co = $gend2." has you as a friend.";
			}
			else {
				$co = "You have no Connection.";
			}

			echo '
			<div class="con">
			<p class="context">Connection</p>
			<p class="co">'.$co.'</p>
			</div>';
			
			if (isset($_SESSION['email']) && $row['email'] === $_SESSION['email'] && $row['away'] === "") {
				$access = "You are Online.";
			} elseif (isset($_SESSION['email']) && $row['onlinestatus'] === "Offline" && $row['away'] === "") {
				$access = $gend2 ." is Offline.";
			} 
			if (isset($_SESSION['email']) && $row['email'] === $_SESSION['email'] && $row['away'] != "") {
				$access = "You are Online.";
			} elseif (isset($_SESSION['email']) && $row['onlinestatus'] === "Offline" && $row['away'] != "") {
				$access = $row['away'];
			}
			echo '
			<div class="access">
			<p class="acce">Access</p>
			<p class="ac">'.$access.'</p>
			</div>';
			}
			$email = $row['email'];
			$sql2 = "SELECT * FROM friends WHERE friend1 = '$email' LIMIT 6";
				$result2 = $conn->query($sql2);
				if(mysqli_num_rows($result2) > 0) {
					echo '<div class="friends">
					<p class="fh">Friends</p>';
					echo '<p class="numfriend">Displaying '.mysqli_num_rows($result2).' friends</p>';
					$email = $row['email'];
					if(mysqli_num_rows($result2) > 0) {
					while($row2 = mysqli_fetch_assoc($result2)) {
						$friend = $row2['friend2'];
						$sql3 = "SELECT * FROM users WHERE email = '$friend'";
						$result3 = $conn->query($sql3);
						while($row3 = mysqli_fetch_assoc($result3)) {
							if($row3['pfp'] === "") {
								$pfp2 = "default.jpg";
							} else {
								$pfp2 = "img/".$row3['pfp'];
							}
							$uname2 = $row3['name'];
        					$uname2 = explode(" ", $uname2);
							echo '
							<div class="friend">
							<a href="profile.php?id='.$row3['id'].'"><img src="'.$pfp2.'" class="friendpfp" /></a>';
							echo '<a href="profile.php?id='.$row3['id'].'" class="friendname">'.$row3['name'].'</a>

							</div>';
						}
					}} 
					echo '</div>';
				}
			echo '</div>




			<div class="right">'; 
			include 'variables.php';
			echo '<div class="theirinfo">
			<p class="inform">Information</p>';
			if (isset($_SESSION['email']) && $row['email'] === $_SESSION['email']) {
				echo '<a href="editprofile.php" class="editinfo">[ edit ]</a>';
			}
			echo '
			<p class="accinfo" style="margin-top: -17px;"><b>Account Info:</b></p>
			<p class="reg" style="margin-top: -5px;">Name: '.$row['name'].'<br>
			Member Since: '.$row['datejoined'].'<br>
			Last Updated: '.$row['lastupdated'].'</p><br>
			<p class="head" style="margin-top: -20px;"><b>Basic Info:</b></p><br>
			<p class="reg" style="margin-top: -20px;">
			Status: '.$row['status'].'<br>
			Sex: <a style="color: #538AE3;">'.$row['sex'].'</a><br>
			Birthday: <a style="color: #538AE3;">'.$row['bday'].'</a><br>
			'.$residence.'
			'.$hschool.'
			</p><br>
			<p class="accinfo" style="margin-top: -20px;top: -20px;"><b>Contact Info:</b></p><br>
			<p class="reg" style="margin-top: -20px;">
			Email: <a style="color: #538AE3;">'.$row['email'].'</a><br>
			'.$sn.'
			'.$blog.'
			</p>
			<p class="accinfo" style="margin-top: -10px;top: -20px;'.$vis.'" ><b>Personal Info:</b></p><br>
			<p class="reg" style="margin-top: -23px;">
			'.$look.'
			'.$interested.'
			'.$rstatus.'';
			echo $pviews;
			echo $interests;
			echo $music;
			echo $aboutme;
			echo '
			</p>';
			echo '</div>';
			$email = $row['email'];
			$sql4 = "SELECT * FROM groupmem WHERE email = '$email'";
			$result4 = $conn->query($sql4);
			if(mysqli_num_rows($result4) > 0) {
			echo '<div class="groups">
			<p class="groupshe">Groups</p>';
			while($row2 = mysqli_fetch_assoc($result4)) {
				echo '<p class="grouptitles">&nbsp;<a href="group.php?id='.$row2['groupid'].'">'.$row2['fgroup'].'</a> •</p>';
			}
			echo '</div>';
			}
			echo '</div></div>';

		}
	} else {

	echo '<p class="welcometext">Inactive Profile</p>
	<div class="mb">
	<title>Inactive Page</title>
	<div class="border">
	<p class="not">It seems that the user you are looking for on this page is not found.</p>
	</div>';

	}
}
?>
</div></div>
<?php
	require 'loginarea.php';
?>
</div>
	</center>
</body>
<style type="text/css">
	.header {
		position: relative;
		border: 1px solid #3C589C;
		width: 700px;
		background-color: #3C589C;
		background-image: url("logo-left.jpg");
		background-repeat-x: no-repeat;
		height: 78px;
		background-repeat: no-repeat;
		background-size: 342px;
		z-index: 5;
	}
	.name {
		position: relative;
		left: 100px;
		left: 120px;
		color: #538BDE;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		font-size: 35px;
		top: -px;
		margin-top: 10px;
	}
	
	.welcome {
		position: relative;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		border: 1px solid #3C589C;
		background-color: #3C589C;
		width: 548px;
		height: 30px;
		margin-top: 3px;
		left: 73px;
	}
	.welcometext {
		color: white;
		position: relative;
		margin-top: 3px;
		text-align: left;
		margin-left: 5px;
		font-size: 12px;
	}
	.border {
		position: relative;
		border: 1px solid #3C589C;
		min-height: 200px;
		background-color: white;
		top: -9px;
		width: 548px;
		left: 73px;
		margin-top: -7px;
		
		border-bottom: 2px solid #3C589C;
		display: inline-block;
	}
	
	.mb {
		width: 700px;
		left: -150px;
		position: relative;
		border: 1px dashed #3B5998;
		position: relative;
		top: -32px;
		padding-top: 40px;
		clear: both;
		border-top: 0px solid;
	}
	.picture {
		border: 1px solid #3C589C;
		width: 190px;
		margin-right: auto;
		max-height: 180px;
		margin-left: 10px;
		margin-top: 20px;
	}
	.ph {
		width: 98%;
		margin-top: -0px;
		background-color: #3C589C;
		color: white;
		text-align: left;
		padding-left: 5px;
		font-size: 13px;
	}
	.pfp {
		border: 1px solid #3C589C;
		min-height: 85px;
		min-width: 110px;
		max-height: 130px;
		max-width: 130px;
		margin-top: -20px;
		margin-bottom: 10px;
	}
	.editpfp {
		position: relative;
		top: -33px;
		color: white;
		font-size: 13.3px;
		text-decoration: none;
		left: 70px;
	}
	.editpfp:hover {
		text-decoration: underline;
		color: #85CAF1;
	}
	.left {
		width: 205px;
		white-space: normal;
		float: left;
		overflow: auto;
		overflow-x: hidden;
		overflow-y: hidden;
	}
	.accfun {
		border: 1px solid #3C589C;
		font-size: 13px;
		text-align: left;
		margin-right: auto;
		width: 190px;
		position: relative;
		left: 10px;
		margin-top: 10px;
		height: 20px;
		color: #538AE3;
	}
	.acclink {
		color: #538AE3;
		text-decoration: none;
		position: relative;
		left: 5px;
	}
	.acclink:hover {
		color: #6EABD8;
		text-decoration: underline;
	}
	.con {
		border: 1px solid #3C589C;
		width: 190px;
		margin-right: auto;
		position: relative;
		left: 10px;
		top: 10px;
		height: 50px;
	}
	.context {
		background-color: #3C589C;
		color: white;
		position: relative;
		top: -15px;
		text-align: left;
		font-size: 12px;
		padding: 1px;
		padding-left: 5px;
	}
	.co {
		font-size: 13px;
		position: relative;
		top: -20px;
	}
	.access {
			border: 1px solid #3C589C;
		width: 190px;
		margin-right: auto;
		position: relative;
		left: 10px;
		top: 20px;
		min-height: 50px;
		margin-bottom: 30px;
	}
	.acce {
			background-color: #3C589C;
		color: white;
		position: relative;
		top: -15px;
		text-align: left;
		font-size: 12px;
		padding: 1px;
		padding-left: 5px;
	}
	.ac {
		font-size: 11px;
		position: relative;
		margin-top: -20px;
		margin-bottom: 5px;
	}
	.numfriend {
		background:#F1F1F1 ;
		position: relative;
		z-index: 5;
		text-align: left;
		border-top: 1px solid #DDDCE0;
		width: 185px;
		padding: 2px;
		margin-top: -13px;
		font-size: 10px;
		left: -10px;
		margin-left: 20px;
		padding-left: 5px;
		color: #3B5998;
	}
	.friends {
		
		white-space: normal;
	}
	.fh {
		background: #3C589C;
		position: relative;
		z-index: 5;
		text-align: left;
		width: 185px;
		padding: 2px;
		left: -10px;
		margin-left: 20px;
		font-size: 12px;
		padding-left: 5px;
		color: white;
	}
	.friend {
		float: left;
		margin-right: auto;
		margin-left: auto;
		justify-content: center;
		height: 80px;
		position: relative;
		left: 18px;
		right: 0;
		margin-left: -5px;
		margin-top: -2px;
		display: block;
		width: 60px;
		margin: 3px;
		border: 0px solid white;
		text-align: left;
		margin-top: -4px;
	}
	.friendname {
		color: #3B5998;
		text-decoration: none;
		font-size: 10px;
		line-height: 10px;
		height: 15px;
		text-align: center;
		display: block;
		width: 40px;
		white-space: normal;
		position: relative;
		top: 2px;
	}
	.friendname:hover {
		text-decoration: underline;
	}
	.friendpfp {
		display: flex;
		max-width: 60px;
		justify-content: center;
		min-height: 30px;
		border: 0px solid;
		max-height: 55px;
	}
	.right {
		float: right;
		overflow: auto;
		width: 330px;
		position: relative;
		left: -5px;
	}
	.info {
		font-size: 11px;
		position: absolute;
		top: 20px;
		
		border: 1px solid #3C589C;
		
		text-align: left;
		margin-left: auto;
		margin-left: 210px;
		min-height: 300px;
	}
	.inform {
		background-color: #3C589C;
		font-size: 13px;
		color: white;
		position: relative;
		padding-left: 5px;
		top: -19px;
		height: 17px;
		left: -5px;
		width: 105%;
	}
	.info {
		font-size: 11px;
		position: absolute;
		top: 20px;
		overflow-x: hidden;
		overflow-y: hidden;
		border: 1px solid #3C589C;
		width: 320px;
		text-align: left;
		margin-left: auto;
		margin-left: 210px;
		min-height: 300px;

	}

	.theirinfo {
		border: 1px solid #3C589C;
		text-align: left;
		font-size: 11px;
		margin-top: 20px;
		overflow-x: hidden;
		overflow-y: hidden;
		padding: 5px;
		margin-bottom: 5px;
	}
	
	.editinfo {
		font-size: 13.3px;
		display: block;
		margin-top: -25px;
		position: relative;
		top: -23.5px;
		left: 280px;
		margin-left: -10px;
		color: white;
		text-decoration: none;
	}
	.groupshe {
		background-color: #3B5998;
		font-size: 11.5px;
		color: #3B59A3;
		position: relative;
		font-weight: bolder;
		padding-left: 5px;
		top: -14px;
		height: 18px;
		color: white;
		font-weight: normal;
		padding-top: 1px;
		text-align: left;
	}
	.grouptitles {
		display: inline-block;
		line-height: 0px;
		position: relative;
		font-size: 11px;
		top: -20px;
		text-align: left;
		display: flex;
		margin-right: auto;
	}
	.groups {
		width: 328px;
		display: inline-block;
		margin-bottom: 5px;
		position: relative;
		top: -0px;
		display: flex;
		border: 1px solid #3B5998;
		display: block;
		margin-right: auto;
		
	}
	.groups a {
		color: #538AE3;
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
			margin-top: -0px;
	}
		.border {
			height: 400px;
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
		.picture {
		width: 130px;
		max-height: 150px;
		margin-left: 10px;
		margin-top: 20px;
	}
	.editpfp {
		display: none;
	}
	.pfp {
		border: 1px solid #3D65C2;
		min-height: 65px;
		min-width: 70px;
		max-height: 90px;
		max-width: 90px;
		margin-top: -20px;
		margin-bottom: 10px;
	}
	.accfun {
		width: 130px;
		font-size: 10px;
	}
	.con {
		width: 130px;
	}
	.access {
		width: 130px;
	}
	.friends {
		width: 130px;
		<?php echo $heig;?>
	}
	.friendpfp {
		margin-top: -8px;
		min-width: 30px;
		max-width: 35px;
		max-height: 40px;
	}
	.pfparea {
		position: relative;
		left: -7px;
	}
	.info {
		font-size: 9px;
		position: absolute;
		top: 20px;
		border: 1px solid #3D65C2;
		width: 250px;
		text-align: left;
		margin-left: auto;
		margin-left: 150px;
		min-height: 300px;
	}
	.reg {
		width: 230px;
	}
	.border {
		height: 2000px;
	}
	.ac {
		font-size: 8px;
	}
	.co {
		font-size: 8px;
	}
	}
</style>
</html>