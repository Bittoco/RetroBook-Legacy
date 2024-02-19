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
		<a href="index.php" style="text-decoration: none"><h1 class="name">[ theretrobook ]</h1></a>
	<?php 
	include 'header.php';
		if(!isset($_SESSION['email'])) {
		header("location: index.php");
		exit();
	}
	?>
</div>
<?php 
$id = htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8');
$sql = "SELECT * FROM groups WHERE id = '$id'";
$result = $conn->query($sql);
$resultCheck = mysqli_num_rows($result);
if($resultCheck > 0) {
while($row = mysqli_fetch_assoc($result)) {
	echo '<title>'.$row['name'].' Profile | theretrobook</title>';
$uid = htmlspecialchars($_SESSION['email'], ENT_QUOTES, 'UTF-8');
$sql2 = "SELECT * FROM groupmem WHERE email = '$uid' AND groupid = '$id'";
$result2 = $conn->query($sql2);
$resultCheck2 = mysqli_num_rows($result2);
if($resultCheck2 > 0) {
	$me = "(You are a member of this group)";
} else {
	$me = "";
}
echo '<div class="welcome">
	<p class="welcometext">'.$row['name'].' '.$me.'</p>
	<div class="mb">
	<div class="border">
	<div class="mpv">
	<div class="picturediv">
	<div class="picheader"><p class="pictext">Picture</p>';
	if($row['creator'] === $_SESSION['email']) {
			echo '<a href="editgrouppfp.php?gid='.$id.'" style="color: white;" class="editpfp">[ edit ]</a>';
		}

	echo '</div>';
	if ($row['pfp'] === "") {
             	$pfp = '<img src="default.jpg" class="pfp"/>';
         		} else {
         		$pfp = '<img src="https://www.theretrobook.net/img/'.$row['pfp'].'" class="pfp"/>';
         		}
     echo $pfp;
	echo '
	</div></div>';
	echo '<div class="accfun"><a class="acclink" href="messageboard.php?gid='.$row['id'].'">Message Board</a></div><br>';
	if($row['creator'] === $_SESSION['email']) {
		echo '<div class="accfun2"><a class="acclink2"  href="editgroup.php?gid='.$row['id'].'">Edit Group</a></div><br>';
	}
	elseif($resultCheck2 > 0) {
	echo '<div class="accfun2"><a class="acclink2" style="font-size: 12px;" href="leavegroup.php?gid='.$row['id'].'">Remove My Group Membership</a></div><br>';
	}
	 else {
		echo '<div class="accfun2"><a class="acclink2"  href="joingroup.php?gid='.$row['id'].'">Add To My Group Membership</a></div><br>';
	}
	if(strlen($row['annoucement']) >= 78) {
		$hei = "height: 160px; margin-bottom: 10px;";
	} else {
		$hei = "height: 80px; margin-bottom: 90px;";
	}
	if($row['annoucement'] != "") {
		echo '<div class="annouce" style="'.$hei.'">';
		if($row['creator'] === $_SESSION['email']) {
			echo '<a href="editannoucements.php?gid='.$id.'" style="font-size: 12px; color: white;" class="edita">[ edit ]</a>';
		}
		echo '
		<p class="atext">Annoucements</p>
		<p class="annoucetext">'.$row['annoucement'].'</p>
	</div>';
	} else {
		echo '<div class="annouce" style="'.$hei.'">';
		if($row['creator'] === $_SESSION['email']) {
			echo '<a href="editannoucements.php?gid='.$id.'" style="font-size: 12px; color: white;" class="edita">[ edit ]</a>';
		}
		echo '
		<p class="atext">Annoucements</p>
		<p class="annoucetext">This Group so far has no current Annoucements.</p>
	</div>';
	}
	echo '<div class="table">
	<div class="th"><p class="thtext">Group Description</p>';
	if($row['creator'] === $_SESSION['email']) {
	echo '<a href="editdesc.php?gid='.$row['id'].'" class="editdesc">[ edit ]</a>';
	}
	echo '</div>';
	if($row['description'] != "") {
		$ann = $row['description'];
	} else {
		$ann = "This Group has no description.";
	}
	echo '<p class="ttext">'.$ann.'</p>';
	echo '</div>';
	if($row['tableh1'] != "" || $row['customtable'] != "") {
		$sty = "margin-top: 30px; top: -270px;margin-bottom:-100px;";
		echo '<div class="table" style="margin-top: 30px; margin-bottom:-100px;">
	<div class="th"><p class="thtext">'.$row['tableh1'].'</p>';
	if($row['creator'] === $_SESSION['email']) {
			echo '<a href="editcust.php?gid='.$row['id'].'" class="editdesc">[ edit ]</a>';
		}
	echo '
	</div>';
	if($row['customtable'] != "") {
		$ann = $row['customtable'];
	} else {
		$ann = "";
	}
	echo '<p class="ttext">'.$ann.'</p>';
	echo '</div>';
	} else {
		$sty = "margin-top: 0px; top: -320px;margin-bottom:-100px;";
	}

	echo '<div class="table" style="'.$sty.'">
	<div class="th"><p class="thtext">Recent Discussion</p>
	<a href="editcust.php?gid='.$row['id'].'" class="editdesc"></a>
	</div>';
	$sqlr = "SELECT * FROM messageboard WHERE fgroup = '$id' AND date > current_date - interval 7 day ORDER BY date DESC LIMIT 2";
	$resultr = $conn->query($sqlr);
	$resultCheckr = mysqli_num_rows($resultr);
	if($resultCheckr > 0) {
		
		while($rowr = mysqli_fetch_assoc($resultr)) {
		echo ' <div class="bline" style="border: 1px solid #3D65C2;"></div><p class="ttext"><a class="namelink" href="profile.php?id='.$rowr['creator'].'">'.$rowr['creatorname'].'</a> wrote on '.$rowr['date'].':</p>
			 <div class="bline"></div>
			 <p class="boardtext">'.$rowr['message'].'</p>
			  <div class="bline"></div>
			  <p class="ttext" style="margin-bottom: 15px;"><a class="namelink" href="replymessage.php?id='.$rowr['id'].'">Respond</a> :: <a class="namelink" href="send.php?id='.$rowr['creator'].'">Message</a> :: <a class="namelink" href="viewmessage.php?id='.$rowr['id'].'">View</a></p>';
		}
	} else {
		
		echo '<p class="ttext">No recent discussions</p>';
	}
	
	echo '</div>';

	if($resultCheckr >= 2) {
			echo'<div class="mar" style="margin-bottom: -230px;"></div>';
		} elseif($resultCheckr === 1) {
			echo'<div class="mar" style="margin-top: -0px;"></div>';
		}
	echo '</div>';

}
} else {
	echo '<div class="welcome">
	<p class="welcometext">Group does not exist or is not found</p>
	<div class="border">
		<h2 class="loginsign">Group does not exist</h2>
		
		
	
	</div>';
}
?>
	</div>
	</div>
</div>
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
	.loginsign {
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		font-size: 19px;
		font-weight: bolder;
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
		min-height: 250px;
		background-color: white;
		top: -9px;
		width: 548px;
		left: 73px;
		margin-top: -7px;
		border-bottom: 2px solid #3C589C;
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
	.mpv {
		float: right;
		position: relative;
		left: -10px;
		margin-bottom: 10px;
		margin-top: 30px;
	}	
	.picturediv {
		position: absolute;
		border: 1px solid #3C589C;
		width: 180px;
		height: 170px;
		position:absolute;
		right:0;

	}
	.pfp {
		padding-top: 10%;
		position: relative;
		max-width: 155px;
		max-height: 107px;
		
		display: flex;
		margin-top: 3%;
		display: block;
  margin-left: auto;
  margin-right: auto;
	}
	.picheader {
		background-color: #3C589C;
		color: white;
		font-size: 13px;
		text-align: left;
	}
	.pictext {
		margin-top: -0px;
		margin-left: 3px;
	}
	.accfun {
		border: 1px solid #3D65C2;
		font-size: 13px;
		text-align: left;
		
		width: 180px;
		position: relative;
		left: -10px;
		margin-top: 220px;
		height: 20px;
		color: #538AE3;
		display: flex;
		margin-left: auto;
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
	.accfun2 {
		border: 1px solid #3D65C2;
		font-size: 13px;
		text-align: left;
		
		width: 180px;
		position: relative;
		left: -10px;
		margin-top: -20px;
		height: 20px;
		color: #538AE3;
		display: flex;
		margin-left: auto;
	}
	.acclink2 {
		color: #538AE3;
		text-decoration: none;
		position: relative;
		left: 5px;
		display: block;
		width: 300px;
	}
	.acclink2:hover {
		color: #6EABD8;
		text-decoration: underline;
	}
	.annouce {
		border: 1px solid #3C589C;
		width: 180px;
		position: relative;
		left: -10px;
		height: 130px;
		margin-left: auto;
		margin-bottom: 2px;
	}
	.atext {
		background-color: #3C589C;
		font-size: 12px;
		color: white;
		height: 15px;
		padding-top: 1px;
		text-align: left;
		padding-left: 3px;
		margin-top: 0px;
		margin-left: -1px;
		width: 179px;
	}
	.annoucetext {
		font-size: 11px;
		text-align: left;
		padding-left: 5px;
	}
	.edita {
		font-family: 10px;
		color: white;
		display: block;
		margin-top: -20px;
		left: -10px;
		top: 15px;
		color: black;
		position: relative;
		text-align: right;
	}
	.editpfp {
			font-family: 10px;
		color: white;
		z-index: 5;
		display: block;
		margin-top: -27px;
		left: -10px;
		top: -2px;
		color: black;
		position: relative;
		text-align: right;
	}
	.table {
		border: 1px solid #3C589C;
		width: 335px;
		margin-right: auto;
		margin-left: 10px;
		margin-top: -70px;
		position: relative;
		top: -352px;
		margin-bottom: -20px;
		min-height: 80px;
	}
	.th {
		background-color: #3C589C;
		margin-top: -13px;
		color: white;
		text-align: left;
		font-size: 13px;
		height: 20px;
		width: 337px;
		margin-left: -1px;

	}
	.ttext {
		font-size: 12px;
		text-align: left;
		width: 90%;
		white-space: pre-wrap;
	}
	.thtext {
		margin-left: 5px;
	}
	.editdesc {
		text-decoration: none;
		position: relative;
		top: -28px;
		text-align: right;
		margin-left: auto;
		left: 280px;
		color: white;
	}
	.htext a {
		color: #538AE3;
	}
	.bline {
		border: 0.5px dashed #3D65C2;
	}
	.namelink {
		color: #538AE3;
		text-decoration: none;
	}
	.namelink:hover {
		color: #85CAF1;
		text-decoration: underline;
	}
	.boardtext {
		font-size: 12px;
		text-align: left;
		width: 90%;
		white-space: pre-wrap;
		text-overflow: ellipsis;
   display: -webkit-box;
   -webkit-line-clamp: 6; /* number of lines to show */
   -webkit-box-orient: vertical;
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
	@media only screen and (max-width:700px) {
		.welcome {
			max-height: 50px;
		}
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
		.table {
			width: 180px;
		}
		.th {
			width: 182px;
		}
		.editdesc {

			left: 130px;
		}

	}
</style>
</html>