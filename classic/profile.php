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
	<a href="index.php" style="text-decoration: none;"><h1 class="name">[ theretrobook ]</h1></a>
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
	<title>Inactive Page</title>
	<div class="border">
	<p class="not">It seems that the user you are looking for on this page is not found.</p>
	</div>';
} else {

	$id = $_GET['id'];
	$sql = "SELECT * FROM users WHERE id = '$id'";
	$result = $conn->query($sql);
	$resultCheck = mysqli_num_rows($result);
	if ($resultCheck > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			echo '<title>theretrobook | '.$row['name'].'</title>';
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
			echo "<p class='welcometext'>".$row['name']."'s Profile</p>";
			echo '
			<div class="border">
			<div class="picture">
			<p class="ph">Picture</p>';
			if (isset($_SESSION['email']) && $row['email'] === $_SESSION['email']) {
				echo '<a href="editpicture.php" class="editpfp">[ edit ]</a>';
			}
			echo '<br>';
			if ($row['pfp'] === "") {
             	$pfp = '<img src="default.jpg" class="pfp"/>';
         		} else {
         		$pfp = '<img src="https://www.theretrobook.net/img/'.$row['pfp'].'" class="pfp"/>';
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
			} elseif (isset($_SESSION['email']) && $row['onlinestatus'] === "Offline" && $row['away'] === "" && $gend2 != "They") {
				$access = $gend2 ." is Offline.";
			} elseif(isset($_SESSION['email']) && $row['onlinestatus'] === "Offline" && $row['away'] === "" && $gend2 === "They") {
			    	$access = $gend2 ." are Offline.";
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
			
			$sqlm = "SELECT * FROM friends WHERE friend1 = '$friendemail' LIMIT 6";
			$resultm = $conn->query($sqlm);
			$resultCheckm = mysqli_num_rows($resultm);
			if($resultCheckm > 0) {
			if($resultCheckm <= 3) {
         				$heigt = "100px;";
         			}  elseif ($resultCheckm > 3) {
         				$heigt = "160px;";
         				$hf = "height: 30px";
         			}
         			
         	} elseif ($resultCheckm <= 0) {
         		$heigt = "50px;";
         		$hf = "";
         	}
			echo '<div class="friends" style="height: '.$heigt.'">
			<p class="friendstext">Friends</p>';
			if($resultCheckm > 0) {
				
				while($rowm = mysqli_fetch_assoc($resultm)) {
				$friend = $rowm['friend2'];
				$sqlmi = "SELECT * FROM users WHERE email = '$friend'";
				$resultmi = $conn->query($sqlmi);
				$resultCheckmi = mysqli_num_rows($resultmi);
				if($resultCheckmi > 0) {
					
					echo '<div class="pfps" >';
					
         			echo '<div class="pfparea" >';
				while($rowmi = mysqli_fetch_assoc($resultmi)) {
					if ($rowmi['pfp'] === "") {
             	$pfp = 'default.jpg';
         		} else {
         		$pfp = 'https://www.theretrobook.net/img/'.$rowmi['pfp'].'';
         		}
         			
					echo '<div class="fpfps">
					<a href="profile.php?id='.$rowmi['id'].'"><img src="'.$pfp.'" style="float: left;" class="friendpfp"/></a>
					</div>';
				}
				
				echo '</div></div>';

			}
			}
			}
			echo '
			</div>';
			include 'variables.php';
			echo '
			<div class="info">
			<p class="inform">Information</p>';
			if (isset($_SESSION['email']) && $row['email'] === $_SESSION['email']) {
				echo '<a href="editprofile.php" class="editinfo">[ edit ]</a>';
			}
			
			if (empty($interests && $music && $aboutme && $pviews && $row['interested']) && $resultCheckm >= 0) {
				$hei = "min-height: 110px;";
			} else {
				$hei = "min-height: 200px;";
			}
			if (strlen($aboutme) > 107) {
				$hei = "min-height: 260px;";
			}
			if (empty($interests && $music && $aboutme && $pviews) && $row['websites'] != "") {
				$hei = "min-height: 200px;";
			}

			echo '
			<p class="accinfo">Account Info:</p>
			<p class="reg">Name: '.$row['name'].'<br>
			Member Since: '.$row['datejoined'].'<br>
			Last Updated: '.$row['lastupdated'].'</p><br>
			<p class="head">Basic Info:</p><br>
			<p class="reg" style="margin-top: 5px;">
			Status: '.$row['status'].'<br>
			Sex: <a style="color: #538AE3;">'.$row['sex'].'</a><br>
			Birthday: <a style="color: #538AE3;">'.$row['bday'].'</a><br>
			'.$residence.'
			'.$hschool.'
			</p><br>
			<p class="accinfo" style="margin-top: -20px;top: -20px;">Contact Info:</p><br>
			<p class="reg" style="margin-top: -16px;">
			Email: <a style="color: #538AE3;">'.$row['email'].'</a><br>
			'.$sn.'
			'.$blog.'
			</p>
			<p class="accinfo" style="margin-top: -10px;top: -20px;'.$vis.'" >Personal Info:</p><br>
			<p class="reg" style="margin-top: -16px;">
			'.$look.'
			'.$interested.'
			'.$rstatus.'';
			echo $pviews;
			echo $interests;
			echo $music;
			echo $aboutme;
			echo '
			</p>
			</div>';
			echo '<div style="'.$hei.'"class="whiteheight"></div>';
			echo '
			</div>';

		}
	} else {

	echo '<p class="welcometext">Inactive Profile</p>
	<title>Inactive Page</title>
	<div class="border">
	<p class="not">It seems that the user you are looking for on this page is not found.</p>
	</div>';

	}
}
?>
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
		margin-left: 10px;
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
		max-height: 550px;
	}
	.desc {
		position: relative;
		text-align: left;
		left: 10px;
		font-size: 15px;
	}
	.not {
		position: relative;
		margin-top: 30px;
	}
	.picture {
		border: 1px solid #3D65C2;
		width: 190px;
		margin-right: auto;
		max-height: 180px;
		margin-left: 10px;
		margin-top: 20px;
	}
	.ph {
		width: 98%;
		margin-top: -0px;
		background-color: #3D65C2;
		color: white;
		text-align: left;
		padding-left: 5px;
		font-size: 13px;
	}
	.pfp {
		border: 1px solid #3D65C2;
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
	.inform {
		background-color: #3D65C2;
		font-size: 13px;
		color: white;
		position: relative;
		padding-left: 5px;
		top: -14px;
		height: 17px;
	}
	.info {
		font-size: 11px;
		position: absolute;
		top: 20px;
		
		border: 1px solid #3D65C2;
		width: 330px;
		text-align: left;
		margin-left: auto;
		margin-left: 210px;
		min-height: 300px;
	}
	.accinfo {
		font-weight: bold;
		font-size: 11.3px;
		position: relative;
		left: 5px;
		top: -15px;
	}
	.editinfo {
		font-size: 13.3px;
		display: block;
		margin-top: -25px;
		position: relative;
		top: -20px;
		left: 280px;
		color: white;
		text-decoration: none;
	}
	.reg {
		line-height: 17px;
		position: relative;
		left: 5px;
		top: -23px;
		
		width: 300px;
	}
	.head {
		font-weight: bold;
		font-size: 11.3px;
		position: relative;
		margin-top: -40px;
		left: 5px;
	}
	.accfun {
		border: 1px solid #3D65C2;
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
		border: 1px solid #3D65C2;
		width: 190px;
		margin-right: auto;
		position: relative;
		left: 10px;
		top: 10px;
		height: 50px;
	}
	.context {
		background-color: #3D65C2;
		color: white;
		position: relative;
		top: -15px;
		text-align: left;
		font-size: 14px;
		padding-left: 5px;
	}
	.co {
		font-size: 13px;
		position: relative;
		top: -20px;
	}
	.access {
			border: 1px solid #3D65C2;
		width: 190px;
		margin-right: auto;
		position: relative;
		left: 10px;
		top: 20px;
		min-height: 50px;
	}
	.acce {
			background-color: #3D65C2;
		color: white;
		position: relative;
		top: -15px;
		text-align: left;
		font-size: 14px;
		padding-left: 5px;
	}
	.ac {
		font-size: 13px;
		position: relative;
		margin-top: -20px;
		margin-bottom: 5px;
	}
	.friends {
		border: 1px solid #3D65C2;
		margin-top: -50px;
		width: 190px;
		margin-right: auto;
		position: relative;
		left: 10px;
		top: 80px;
		max-height: 160px;
		min-height: 50px;
		margin-bottom: 25px;
	}
	.pfparea {
		
	}
	.friendstext {
		text-align: left;
		background-color: #3D65C2;
		font-size: 13px;
		color: white;
		position: relative;
		padding-left: 5px;
		top: -14px;
		height: 17px;
	}
	.friendpfp {
		border: 1px solid #3D65C2;
		min-width: 40px;
		height: 50px;
		float: left;
		width: 50px;
		margin-left: 5px;
		position: relative;
		top: -10px;
		margin-bottom: 10px;
	}
	.fpfps {
		position: relative;
		left: 6px;
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