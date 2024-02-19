<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>retrobook | </title>
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
	?>
</div>
<div class="welcome">
	<?php 
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		$sql = "SELECT * FROM users WHERE id = '$id'";
		$result = $conn->query($sql);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
			    
			    include 'friendvars.php';
			    
			    
				if($row['name'] === $_SESSION['name']) {
	echo '<p class="welcometext">'.$row['name'].'\'s Profile ( This is You )</p>';
	} else {
		echo '<p class="welcometext">'.$row['name'].'\'s Profile</p>';
	}

	echo '
	<div class="border">';
		$sql5 = "SELECT * FROM userapps WHERE appname = 'Video' AND id = '$id'";
	$result5 = $conn->query($sql5);
	echo '<div class="left">';
	if($row['pfp'] === "") {
		$pfp = "pfp2.jpg";
	} else {
		$pfp = "img/".$row['pfp']."";
	}
	if($row['pfp'] === "" && $_SESSION['id'] === $id) {
		$style = "display: none";
	} else {
		$style = "";
	}
	echo '<div class="left">
	<img src="'.$pfp.'" style="'.$style.'" class="pfp"/><br>';
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
				$gen = "Them";
				$gend2 = "They";
			}
			$id = $row['id'];
			$sql5 = "SELECT * FROM userapps WHERE appid = '1' AND id = '$id'";
	$result5 = $conn->query($sql5);
	if (isset($_SESSION['email']) && $row['email'] === $_SESSION['email']) {
			echo '<div class="accfun" ><a class="acclink" href="editprofile.php">Edit Profile</a></div><br>
			<div class="accfun" style="margin-top: -20px;"><a class="acclink" href="editprofile.php?picture">Edit Profile Picture</a></div><br>
			<div class="accfun" style="margin-top: -20px;"><a class="acclink" href="myphotos.php?id='.$_SESSION['id'].'">View My Photos</a></div><br>
			<div class="accfun" style="margin-top: -20px;"><a class="acclink" href="friends.php?id='.$row['id'].'">View My Friends</a></div>
			';
		if(mysqli_num_rows($result5) > 0) {
				echo '<br><div class="accfun" style="margin-top: -20px;"><a class="acclink" href="myvideos.php?id='.$row['id'].'">View My Videos</a></div>';
			}
			
			} else {
			
        	$fname2 = $row['name'];
        	$name2 = explode(" ", $fname2);
        	$friendemail = $row['email'];
        	$email2 = $_SESSION['email'];
			echo '<div class="accfun" ><a style="margin-top: -8px;margin-bottom: 12px;'.$styleinfo4.'" class="acclink"  href="myphotos.php?id='.$row['id'].'">View More Photos of '.$name2[0].'</a></div>';
			echo '<div class="accfun" style="margin-top: -10px;'.$styleinfo5.'"><a class="acclink" href="friends.php?id='.$row['id'].'">'; echo "View all of ".$name2[0]."'s Friends</a>"; echo '</div>';
				if(mysqli_num_rows($result5) > 0) {
				echo '<div class="accfun" ><a style="margin-top: 7px;margin-bottom: px;" class="acclink"  href="myvideos.php?id='.$row['id'].'">View More Videos of '.$name2[0].'</a></div>';
			}
			echo '<div class="accfun" style="margin-top: -1px;'.$styleinfo5.'"><a class="acclink" href="send.php?id='.$row['id'].'">Send '.$name2[0].' a Message</a></div><br>
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
			$fname2 = $row['name'];
        	$name2 = explode(" ", $fname2);
			$email2 = $row['email'];
			echo '<div class="status">
			<p class="fhe">Status</p>';
			if($_SESSION['id'] === $row['id']) {
			echo '<a href="editstatus.php" class="edit">edit</a>';
			}
			if($row['away'] != "") {
				echo '<img src="status.png" class="statuspic"></img>
				<p class="away">'.$name2[0].' is '.$row['away'].'</p>';
			} elseif($row['away'] === "" && $_SESSION['id'] === $id) {
			   	echo '<img src="status.png" class="statuspic"></img>
				<p class="away">Keep for friends updated on your current <a clas="editsa" href="editstatus.php">status</a></p>';
			}
			echo '</div>';
				$sql4 = "SELECT * FROM photos WHERE fromid = '$id' ORDER BY id DESC LIMIT 4";
			$result4 = $conn->query($sql4);
			$sql2 = "SELECT * FROM friends WHERE friend1 = '$email2' ORDER BY id DESC LIMIT 6";
			$result2 = $conn->query($sql2);
			if(mysqli_num_rows($result4) <= 0 && mysqli_num_rows($result2 && $_SESSION['id'] === $id) <= 0) {
			    echo '';
			}
			$email2 = $row['email'];
			$sql2 = "SELECT * FROM friends WHERE friend1 = '$email2' ORDER BY id DESC LIMIT 6";
			$result2 = $conn->query($sql2);
			if(mysqli_num_rows($result2) <= 0 && mysqli_num_rows($result4) <= 0 && $_SESSION['id'] === $id) {
			  	echo '<div class="friendsdiv">';
			echo '<p class="fhe">Photos</p>';
			echo '<p class="allow">Retrobook allows you to upload hundreds of photos, to add one, <a clas="editsa" href="uploadphoto.php">click here</a></p></div>';  
			} else {
			echo '<div style="'.$styleinfo5.'" class="friendsdiv">';
			echo '<p class="fhe">Friends</p>';
			echo '<div class="friends">';
			while($row2 = mysqli_fetch_assoc($result2)) {
				$friend = $row2['friend2'];
				$sql3 = "SELECT * FROM users WHERE email = '$friend'";
				$result3 = $conn->query($sql3);
				while($row3 = mysqli_fetch_assoc($result3)) {
					if($row3['pfp'] === "") {
					$pfp2 = "pfp2.jpg";
					} else {
						$pfp2 = "img/".$row3['pfp']."";
					}
					$fname3 = $row3['name'];
        			$name3 = explode(" ", $fname3);
					echo '<div class="friend">
					<a href="profile.php?id='.$row3['id'].'"><img src="'.$pfp2.'" class="friendpfp"/></a>
					<a href="profile.php?id='.$row3['id'].'" class="friendname">'.$row3['name'].'</a>
					</div>';
				}
			}
			
			echo '</div>';
			echo '</div><br>';
			}
	echo '
	</div></div>';
	//end of left side
		include 'variables.php';
		
		if($styleinfo === "display: none;") {
		echo '<p class="these">'.$row['name'].'\'s privacy settings forbid you from looking at their profile.</p>';
	}
	
	echo '<div class="info" style="'.$styleinfo.'">
	<p class="infoh">Information</p>';
	echo '
			<p class="accinfo" style="color: #3B59A3;">Account Info:</p>
			<p class="reg"><gi>Name: </gi>'.$row['name'].'<br>
			<gi>Member Since:</gi> '.$row['datejoined'].'<br>
			<gi>Last Updated: </gi>'.$row['lastupdated'].'</p><br>
			<p class="head"  style="color: #3B59A3;">Basic Info:</p><br>
			<p class="reg" style="margin-top: 5px;">
			<gi>Status: </gi>'.$row['status'].'<br>';
			if($row['sex'] != "") {
			echo '<gi>Sex: </gi><a style="color: #3B59A3;">'.$row['sex'].'</a><br>';
			}
				if($row['bday'] != "") {
		  echo '<gi>Birthday: </gi><a style="color: #3B59A3;">'.$row['bday'].'</a><br>';
			}
			echo '
			'.$residence.'
			'.$hschool.'
			</p><br>';
		 if(!empty($sn && $blog))  {
			echo '<p class="accinfo" style="color: #3B59A3;margin-top: -20px;top: -20px;">Contact Info:</p><br>
			<p class="reg" style="margin-top: -16px;">
			
			'.$sn.'
			'.$blog.'
			</p>';
			}
			echo '<p class="accinfo" style="margin-top: -10px;top: -20px;color: #3B59A3;"'.$vis.'" >Personal Info:</p><br>
			<p class="reg" style="margin-top: -16px;">
			'.$look.'
			'.$interested.'
			'.$rstatus.'';
			echo $pviews;
			echo $interests;
			echo $music;
			echo $favbooks;
			echo $favmovies;
			echo $favquotes;
			echo $aboutme;
			echo '
			</p>';
			
			$email = $row['email'];
			$sql4 = "SELECT * FROM photos WHERE fromid = '$id' ORDER BY id DESC LIMIT 4";
			$result4 = $conn->query($sql4);
			if(mysqli_num_rows($result4) > 0) {
			echo '<div class="photos" style="'.$styleinfo4.'"><p class="photosheader">Photos</p>';
				echo '<div class="photoslist">';
				while($row2 = mysqli_fetch_assoc($result4)) {
					echo '<a href="photo.php?p='.$row2['id'].'"><img src="img/'.$row2['photo'].'" class="photo"/></a>';
				}
				echo '</div>';
				echo '</div>';
			}
			$sql4 = "SELECT * FROM videos WHERE creator = '$id' ORDER BY id DESC LIMIT 4";
			$result4 = $conn->query($sql4);
			if(mysqli_num_rows($result4) > 0) {
				echo '<div class="photos"><p class="photosheader">Videos</p>';
				echo '<div class="photoslist">';
				while($row2 = mysqli_fetch_assoc($result4)) {
					echo '<a href="video.php?id='.$row2['id'].'"><video class="photo" >
				  <source src="img/'.$row2['video'].'#t=0.1" type="video/mp4">
				  <source src="img/'.$row2['video'].'#t=0.1" type="video/quicktime">
				  <source src="img/'.$row2['video'].'#t=0.1" type="video/mov">
				  Your browser does not support the video tag.
				</video></a>';
				}
				echo '</div>';
				echo '</div>';
			}
			
			$sql4 = "SELECT * FROM profilesongs WHERE email = '$email'";
				$result4 = $conn->query($sql4);
				if(mysqli_num_rows($result4) > 0) {
					echo '<p class="photosheader">iLike</p>';
					echo '<p class="displaying">Displaying '.mysqli_num_rows($result4).' Songs</p>';
					echo '<p class="songsilike">Songs iLike</p>';
					include 'profilesongs.php';
				}
			
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
			
			
			echo '<br><div class="wall" style=""><p class="wallhead">The Wall</p>
				<div class="wallform">
				<form method="post" action="profilewall.inc.php">
				<textarea name="comment" class="textarea" rows="3" cols="40"></textarea>
				<input type="hidden" value="'.$_GET['id'].'" name="toid"/>
				<button class="post" name="submit">Post</button>';
				if($_SESSION['email'] != $email) {
				echo '<a href="giftshop.php?u='.$_GET['id'].'" style="color: black;" class="givegift">Give a Gift</a>';
				}
				echo '</form>
				</div>';
			$toid = $_GET['id'];
				$sqlw = "SELECT * FROM profilewall WHERE toid = '$toid' ORDER BY id DESC";
				$resultw = $conn->query($sqlw);
				if(mysqli_num_rows($resultw) <=0) {
				    echo '<p style="position: relative;top:10px;font-size: 11px;">Nobody has said anything... yet.</p>';
				} else {
				while($row3 = mysqli_fetch_assoc($resultw)) {
					$fromid = $row3['fromid'];
					$sql5 = "SELECT * FROM users WHERE id = '$fromid'";
					$result5 = $conn->query($sql5);
					while($row5 = mysqli_fetch_assoc($result5)) {
						if ($row5['pfp'] === "") {
             			$pfp = 'pfp.jpg';
         				} else {
         				$pfp = 'img/'.$row5['pfp'].'';
         				}
         				echo '<div class="wallmessage">
         				<a href="profile.php?id='.$row3['fromid'].'"><img src="'.$pfp.'" class="wallpfp"/></a>
         				<div class="wallinfo">';
         				if($row3['type'] != "Gift") {
         					echo '<a href="profile.php?id='.$row3['fromid'].'">'.$row5['name'].'</a> wrote:<Br>';
         				} else {
         					echo '<a href="profile.php?id='.$row3['fromid'].'">'.$row5['name'].'</a> Gave a Gift:<Br>';
         				}
         				echo '<ti>at '.$row3['date'].'</ti>
         				</div>
         				<p class="act">'.$row3['message'].'</p><br>';
         				if($row3['type'] === "Gift") {
         						if($row3['gifttype'] === "smiley") {
         							echo '<img src="smiley.png" class="gift"/>';
         						}
         						elseif($row3['gifttype'] === "bear") {
         							echo '<img src="bear.png" class="gift"/>';
         						}
         						elseif($row3['gifttype'] === "heart") {
         							echo '<img src="heart.png" class="gift"/>';
         						}
         						elseif($row3['gifttype'] === "cupcake") {
         							echo '<img src="cupcake.png" class="gift"/>';
         						}
         						elseif($row3['gifttype'] === "cat") {
         							echo '<img src="cat.png" class="gift"/>';
         						}
         				}
         		echo '
         				<a href="profile.php?id='.$row3['fromid'].'" class="writeto">Write on '.$row3['fromname'].'\'s Wall';
         				if($_SESSION['id'] === $row3['fromid'] || $_SESSION['id'] === $row['id']) {
         				echo '<a href="deletewallcomment.php?id='.$row3['id'].'" class="delete">delete</a>';
         				}
         				echo '</a>';
         				echo '</div>';
					}
				}
				}
			 echo '
			</div>';


			echo '
			</div>';
		
	echo '</div>';
	if($_SESSION['id'] === $id) {
	echo '<div class="share"><p class="pl">Put a link of your Retrobook on your website:</p><br>
	<p class="retrome">&lt;a href="https://theretrobook.net/profile.php?id='.$id.'">Retrobook me!&gt;</p></div>';
	}
	echo '</div>
	</div>';
	}
	} else {
		echo '<p class="welcometext">Profile Not Found.</p>
	<div class="border">
		<h2 class="loginsign">Profile not found.</h2>	
	</div>
	
	</div>
	</div>';
	}


	} else {
		echo '<p class="welcometext">Profile Not Found.</p>
	<div class="border">
		<h2 class="loginsign">Profile not found.</h2>	
	</div>
	
	</div>
	</div>';
	}
	?>
</div>
<?php
	require 'loginarea.php';
?>
	</center>
</body>
<style type="text/css">
    .left {
        max-width: 200px;
    }
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
	.these {
		background-color: #E3776C;
		font-size: 12px;
		border: 2px solid #DA4031;
		width: 60%;
		padding: 3px;
		font-weight: normal;
		text-align: left;
		margin-right: 10px;
		float: right;
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
		.face {
		top: -31px;
		border-top-left-radius: 5px;
		border-bottom-left-radius: 5px;
		left: -365px;
		position: relative;
		z-index: -1;
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
		overflow: auto;
		overflow: hidden;
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
	.delete {
		font-size: 10px;
		position: relative;
		left: 300px;
		display: block;
		margin-top: -28px;
		top: 16px;
		color: #3B5998;
		text-decoration: none;
	}
	.delete:hover {
		text-decoration: underline;
	}
	.left {
		float: left;
		min-height: 300px;
		

	}
	.pfp {
			overflow: auto;
		float: left;
		padding: 10px;
		max-height: 250px;
		width: 200px;
	}
	.status {

	}
	.edit {
		font-weight: bolder;font-size: 11px;display: block;
		margin-top: -20px;
		text-align: right;
		position: relative;
		right: 15px;
		top: -23px;
		color: #3B599A;
		text-decoration: none;
	}
	.edithover {
		text-decoration: underline;
	}
	.editsa {
	    font-size: 15px;
	    text-decoration: none;
	}
	.statuspic {
		height: 20px;
		float: left;
		overflow: auto;
		position: relative;
		top: -13px;
		left: 20px;
	}
	.away {
		position: relative;
		text-align: left;
		width: 150px;
		margin-top: -13px;
		font-size: 11px;
		left: 23px;
	
		padding-bottom: 10px;
	}
	.edit {
		font-size: bolder;
	}
	.accfun {
		display: block;
		margin-top: -5px;
		text-align: left;

	}
	.allow {
	    font-size: 10.5px;
	    text-align: left;
	    position: relative;
	    left: 10px;
	    top: -15px;
	}
	.acclink {
		position: relative;
		top: -5px;
		z-index: 5;
		font-size: 13px;
		margin-left: 15px;
		text-decoration: none;
		display: block;
		border-bottom: 1px solid #D8DFEA;
		width: 90%;
		margin-bottom: 3px;
	}
	.acclink:hover {
		text-decoration: underline;
	}
	.fhe {
		border-top: 1px solid #3B59AA;
		text-align: left;
		background-color: #D8DEEA;
		font-size: 13px;
		color: #3B59AA;
		position: relative;
		padding-left: 5px;
		top: -14px;
		width: 200px;
		max-width: 220px;
		height: 17px;
		margin-left: 5px;
		font-weight: bolder;
	}
	.friendsdiv {
		display: block;
		position: relative;
		top: 10px;
		margin-top: 10px;
	
	}
	.friend {
		margin-left: auto;
		margin-right: auto;
		float: left;
		position: relative;
		left: 3%;
		width: 60px;
		height: 90px;
		margin-left: 2%;
		margin-top: -px;
		
	}
	.friend a {
		text-decoration: none;
		font-size: 11px;
		line-height: -3px;
		margin-top: -2px;
		display: block;
	}
	.friend a:hover {
		text-decoration: underline;
	}
	.friendname {
	    margin-left: 5%;
	    justify-content: center;
	}
	.friendpfp {
		justify-content: center;
		max-height: 80px;
		max-width: 60px;
		justify-content: center;
    margin-left: 5px;
    
		
	}
	.info {
		width: 60%;
		float: right;
		position: relative;
		top: 10px;
		padding-right: 10px;
		font-size: 11px;
		text-align: left;
	}
	.infoh {
		background-color: #D8DEEA;
		font-size: 11.5px;
		color: #3B59A3;
		position: relative;
		font-weight: bolder;
		padding-left: 5px;
		top: -14px;
		height: 18px;
		border-top: 1px solid #3B59A3;
		padding-top: 1px;
		text-align: left;

	}
	.head {
    font-weight: bold;
    font-size: 11.3px;
    position: relative;
    margin-top: -40px;
    left: 5px;
}
	.accinfo {
		font-weight: bold;
		font-size: 11.3px;
		position: relative;
		left: 5px;
		top: -15px;
	}
	.reg {
		line-height: 17px;
		position: relative;
		left: 5px;
		top: -23px;
		
		width: 300px;
	}
	gi {
		color: #96A1A8;
	}
	.groupshe {
		background-color: #D8DEEA;
		font-size: 11.5px;
		color: #3B59A3;
		position: relative;
		font-weight: bolder;
		padding-left: 5px;
		top: -14px;
		height: 18px;
		border-top: 1px solid #3B59A3;
		padding-top: 1px;
		text-align: left;
	}
	.grouptitles {
		float: left;
		line-height: 0px;
		position: relative;
		top: -20px;
	}
	.photos {

	}
	.photo {
		min-height: 40px;
		min-width: 70px;
		max-height: 80px;
		max-width: 80px;
		margin-left: 5px;
	z-index: 5;
		position: relative;
		top: -20px;
		display: inline-block;
		vertical-align: top;
	}
	.photosheader {
		background-color: #D8DEEA;
		font-size: 11.5px;
		color: #3B59A3;
		position: relative;
		font-weight: bolder;
		padding-left: 5px;
		top: -14px;
		height: 18px;
		border-top: 1px solid #3B59A3;
		padding-top: 1px;
		text-align: left;
	}
	.writeto {
		font-size: 10px;
		position: relative;
		left: 60px;
		display: block;
		margin-top: -28px;
		color: #3B5998;
		text-decoration: none;
	}
	.writeto:hover {
		text-decoration: underline;
	}
	.gift {
		
		height: 100px;
		width: 100px;
		position: relative;
		top: -30px;
		left: 105px;
	}
	.act {
		font-size: 12px;
		margin-top: -20px;
		
		width: 275px;
		position: relative;
		left: 60px;
		top: -5px;
	}
	ti {
		font-size: 10px;
	}
	.wallinfo {
		background-color: #F7F7F7;
		margin-top: -20px;
		position: relative;
		width: 275px;
		left: 55px;
		top: -30px;
		font-size: 12px;
		padding-top: 5px;
		border-top: 1px solid #3A5B96;
		border-bottom: 1px solid #F4F4F4;
		padding-left: 5px;
	}
	.wallinfo a {
		text-decoration: none;
		color: #3B5998;
	}
	.wallinfo a:hover {
		text-decoration: underline;
	}
	.wallpfp {
		height: 50px;
		width: 50px;
	}
	.wallmessage {
		position: relative;
		width: 335px;
		text-align: left;
		margin-top: 20px;
	}
	.givegift {
		text-decoration: none;
		color: black;
		font-size: 11px;
		display: block;
		margin-top: -4px;
		margin-right: 15px;
		text-align: right;
	}
	.givegift:hover {
		text-decoration: underline;

	}
	.post {
		position: relative;
		top: 10px;
		margin-right: auto;
		display: flex;
		left: 15px;
		border-style: solid;
    border-top-width: 1px;
    border-left-width: 1px;
    border-bottom-width: 1px;
    border-right-width: 1px;
    border-top-color: #D9DFEA;
    border-left-color: #D9DFEA;
    border-bottom-color: #0e1f5b;
    border-right-color: #0e1f5b;
    width: 35px;
    font-size: 11px;
    color: white;
    background-color: #3b5998;
	}
		.textarea {
		position: relative;
		top: 10px;
		border: 1px solid #BFC9D9;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		width: 90%;
		font-size: 11px;
		height: 45px;
		margin-left: 15px;
	}
	.wallhead {
		background-color: #D8DEEA;
		width: 330px;
		padding: 3px;
		border-top: 1px solid #3B5998;
	}
	.wallhead {
		text-align: left;
		font-size: 12px;
		font-weight: bolder;
		color: #3B5998;
	}
	.wall {
		position: relative;
		top: -30px;
		
		position: relative;
		margin-left: 0px;
	}
	.wallform {
		border-top: 1px solid #C8C8C8;
		background-color: #F2F2F2;
		height: 90px;
		width: 335px;
		position: relative;
		top: -12px;
		margin-bottom: -20px;
	}
	.groups {
		width: 360px;
		display: inline-block;
		margin-bottom: 5px;
		position: relative;
		top: -10px;
	}
	.share {
	    border:1px solid #EEEEEE;
	    background: #F7F7F7;
	    margin-top: -10px;
	}
	.pl {
	    position: relative;
	    top: -8px;
	    font-size: 11px;
	    color: #717171;
	    
	}
	.retrome {
	   margin-top: -35px;
	   font-size: 12px;
	  margin-bottom: 0.5px;
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
			height: 40px;
		}
		.form {
			position: relative;
			left: -50px;
			margin-top: -2px;
		}
		.rn {
			left: -40px;
			height: 30px;
		}
		.reg {
			left: 110px;
			top: -15px;
			height: 30px;
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
	.left {
	    width: 150px;
	}
    .wall {
        
    }
    	.pfp {
			overflow: auto;
		float: left;
		padding: 10px;
		max-height: 200px;
		width: 150px;
	}
	.fhe {
	    width: 150px;
	}
	.info {
	    width: 220px;
	}
	.reg {
	    float:left;
	    margin-left: -200px;
	    display: none;
	}
	}
</style>
</html>