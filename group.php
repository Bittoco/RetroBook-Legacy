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
<?php 
$id = htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8');
if($_GET['id'] === "56" && $_SESSION['id'] === "41") {
    echo '<p>You will pay!</p>';
} else {
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
	<div class="border">
	<div class="mpv">
	<div class="picturediv">
	<div class="picheader"><p class="pictext">Picture</p>';
	if($row['creator'] === $_SESSION['email']) {
			echo '<a href="editgrouppfp.php?gid='.$id.'" style="color: white;" class="editpfp">[ edit ]</a>';
		}

	echo '</div>';
	echo '<div class="remove"></div>';
	if ($row['pfp'] === "") {
             	$pfp = '<img src="pfp2.jpg" class="pfp"/>';
         		} else {
         		$pfp = '<img src="img/'.$row['pfp'].'" class="pfp"/>';
         		}
     echo $pfp;
	echo '
	</div></div>';
	echo '<div class="accfun"><a class="acclink" href="messageboard.php?gid='.$row['id'].'">View Discussion Board</a></div><br>';
	echo '<div class="accfun" style="margin-top: -20px"><a class="acclink" href="invitefriends.php?gid='.$row['id'].'">Invite People to join</a></div><br>';
	if($row['creator'] === $_SESSION['email']) {
		echo '<div class="accfun2"><a class="acclink2"  href="editgroup.php?gid='.$row['id'].'">Edit Group</a></div><br>';
	}
	elseif($resultCheck2 > 0) {
	echo '<div class="accfun2"><a class="acclink2" style="font-size: 12px;" href="leavegroup.php?gid='.$row['id'].'">Leave Group</a></div><br>';
	}
	 else {
		echo '<div class="accfun2"><a class="acclink2"  href="joingroup.php?gid='.$row['id'].'">Join Group</a></div><br>';
	}
	if($row['creator'] === $_SESSION['email']) {
		echo '<div class="accfun2"><a class="acclink2"  href="editgrouppfp.php?gid='.$row['id'].'">Edit Picture</a></div>';
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
	<div class="th"><p class="thtext">lnformation</p>';
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
	<div class="th"><p class="thtext">The Wall</p>
	<a href="editcust.php?gid='.$row['id'].'" class="editdesc"></a>
	</div>';
	$sqlr = "SELECT * FROM messageboard WHERE fgroup = '$id' AND date > current_date - interval 7 day ORDER BY date DESC LIMIT 5";
	$resultr = $conn->query($sqlr);
	$resultCheckr = mysqli_num_rows($resultr);
	if($resultCheckr > 0) {
		echo '<p class="display">Displaying '.$resultCheckr.' Wall Posts</p>';
		while($rowr = mysqli_fetch_assoc($resultr)) {
		echo ' <div class="bline" style="border: 0.5px solid #ECEDF8;"></div><p style="margin-top: 4px;" class="ttext"><a href="viewmessage.php?id='.$rowr['id'].'" style="font-weight: bolder;">'.$rowr['creatorname'].'</a> wrote:<br><gi>at '.$rowr['date'].'</gi>
		<p class="pinfo">'.$rowr['message'].'</gi></p>';
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
		width: 601px;
		margin-left: -1px;
		background-color: #3B5998;
		left: 75px;
		height: 35px;
		border-radius: 5px;
		z-index: 3;
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
	.welcometext {
		color: white;
		position: relative;
		margin-top: 5px;
		left: 5px;
		font-weight: bold;
		text-align: left;
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

	.border {
		position: relative;
		border: 1px solid lightgray;
		min-height: 450px;
		background-color: white;
		top: -10px;
		width: 600px;
		left: -1px;
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
	.mpv {
		float: right;
		position: relative;
		left: -10px;
		margin-bottom: 10px;
		margin-top: 30px;
	}	
	.picturediv {
		position: absolute;
		border: 1px solid white;
		width: 180px;
		height: 170px;
		position:absolute;
		right:0;

	}
	.pfp {
		padding-top: %;
		position: relative;
		max-width: 155px;
		max-height: 130px;
		min-height: 130px;
		display: flex;
		margin-top: -13%;
		display: block;
		border: 1px solid #3B5998;
  margin-left: auto;
  margin-right: auto;
	}
	.picheader {
		visibility: hidden;
		background-color: #3D65C2;
		color: white;
		font-size: 13px;
		text-align: left;
	}
	.pictext {
		margin-top: -0px;
		margin-left: 3px;
	}
	.accfun {
		border: 1px solid white;
		font-size: 13px;
		text-align: left;
		top: -20px;
		width: 180px;
		position: relative;
		left: -10px;
		margin-top: 190px;
		height: 20px;
		color: #538AE3;
		display: flex;
		margin-left: auto;
	}
	.acclink {
		color: #538AE3;
		border-bottom: 1px solid #ECEDF8;
		width: 165px;
		text-decoration: none;
		position: relative;
		left: 5px;
	}
	.acclink:hover {
		
		text-decoration: underline;
	}
	.accfun2 {
		border: 1px solid white;
		font-size: 13px;
		text-align: left;
		top: -20px;
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
		border-bottom: 1px solid #ECEDF8;
		width: 170px;
		margin-left: px;
		left: 5px;
		display: block;
		
	}
	.acclink2:hover {
		
		text-decoration: underline;
	}
	.annouce {
		border: 1px solid white;
		width: 180px;
		position: relative;
		left: -10px;
		height: 130px;
		margin-left: auto;
		margin-bottom: 2px;
	}
	.atext {
		background-color: #DDE6F3;
		font-size: 12px;
		border-top: 1px solid #3B5998;
		color: #3B5998;
		font-weight: bolder;
		height: 18px;
		padding-top: 2px;
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
		visibility: hidden;
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
		border: 1px solid white;
		width: 335px;
		margin-right: auto;
		margin-left: 10px;
		margin-top: -60px;
		position: relative;
		top: -362px;
		margin-bottom: -20px;
		min-height: 80px;
	}
	.th {
		background-color: #DDE6F3;
		margin-top: 5px;
		color: #3B5998;
		text-align: left;
		font-size: 13px;
		height: 20px;
		width: 337px;
		top: -10px;
		font-weight: bolder;
		margin-left: -1px;
		border-bottom: 1px solid #C6CACD;
		border-top: 1px solid #3B5998;
	}
	.ttext {
		position: relative;
		top: ;
		font-size: 12px;
		text-align: left;
		width: 90%;

		white-space: pre-wrap;

	}
	.ttext a {
		text-decoration: none;
	}
	.ttext a:hover {
		text-decoration: underline;
	}
	.ttext:hover {
	
	}
	.thtext {
		position: relative;
		top: -12px;
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
		visibility: hidden;
	}
	.htext a {
		color: #538AE3;
		font-weight: bolder;
		text-decoration: none;
		margin-top: -5px;
	}
	.bline {
		border: 0.5px dashed #ECEDF8;
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
	.pinfo {
		width: 90%;
		white-space: pre-wrap;
		text-overflow: ellipsis;
   display: -webkit-box;
   -webkit-line-clamp: 6; /* number of lines to show */
   -webkit-box-orient: vertical;
   text-align: left;
   font-size: 12px;
   margin-top: -23px;
	}
	gi {
		color: #BFBEBF;
		font-size: 11px;
		text-decoration: none;
	}
	.remove {

	}
	.display {
		color: black;
		margin-top: -11px;
		position: relative;
		top: 11px;
		left: -1px;
		font-size: 11px;
		height: 15px;
		padding-left: 5px;
		text-align: left;
		padding-top: 3px;
		border: 1px solid #EEEEEE;
		width: 330px;
		background-color: #EEEEEE;
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
		.display {
			width: 176px;
		}
		.th {
			width: 182px;
		}
		.editdesc {

			left: 130px;
		}
		@media only screen and (max-width:500px) {
			.header {
				left: 0px;
			}
		}
			@media only screen and (max-width:450px) {
				.ttext {
					margin-bottom: 20px;
					font-size: 10px;
				}
			}
	}
</style>
</html>