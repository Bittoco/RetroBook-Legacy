<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>theretrobook | Edit Profile</title>
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
<div class="welcome">
	<p class="welcometext">Edit Information</p>
<div class="border">
		<?php 
		$email = $_SESSION['email'];
		$sql = "SELECT * FROM users WHERE email = '$email'";
		$result = $conn->query($sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck > 0) {
			include 'editv.php';
		echo '<div class="options">
		<a href="editprofile.php?basic"><div class="option" style="'.$basic.'">Basic</div></a>
		<a href="editprofile.php?contact"><div class="option" style="'.$contact.'">Contact</div></a>
		<a href="editprofile.php?personal"><div class="option" style="'.$personal.'">Personal</div></a>
		<a href="editprofile.php?picture"><div class="option" style="'.$picture.'">Picture</div></div></a>';
			while($row = mysqli_fetch_assoc($result)) {
				if(isset($_GET['set'])) {
					echo '<div class="set">Your Profile has been updated.</div>';
				}
				if(isset($_GET['basic']) || !isset($_GET['basic']) && !isset($_GET['personal']) && !isset($_GET['contact']) && !isset($_GET['picture'])) {
		echo '<div class="form">
		<p class="namee">Sex:<br><br>Birthday:<br><br>Residence:<br><br>High School:</p>

	<form method="post" action="editprofile.inc.php">
		<div class="form2">
		
			
		<select name="sex" style="margin-left: -50px;" class="hahahsex">
		<option>'.$row['sex'].'</option>
		<option>Male</option>
		<option>Female</option>
		<option>Other</option>
		</select>
		<br>
		<input type="hidden" value="'.$row['id'].'" name="id">
		<input type="hidden" value="'.$email.'" name="email">
		<input type="date" value="'.$row['bday'].'" name="bday" class="bday"><br>
		<input type="text" maxlength="32" name="residence" value="'.$row['residence'].'" class="resident" placeholder=""><br>
		<input type="text"  maxlength="32" name="hschool" class="hschool" value="'.$row['hschool'].'" placeholder=""><br>';
		echo '<br><button type="submit" class="reg" name="basicsubmit">Save Changes</button>';
		}
		if(isset($_GET['contact'])) {
			echo '<div class="form" style="position: relative;top:50px;">
		<p class="namee" style="position: relative;top:-40px;">Email:<br><br>Screen-name:<br><br>Blog:</p>

	<form method="post" action="editprofile.inc.php">
		<div class="form3">
		
			
		<br>
		<input type="hidden" value="'.$row['id'].'" name="id">
		<input type="hidden" value="'.$email.'" name="email">
		<input type="text"  maxlength="42" name="displayemail" value="'.$row['displayemail'].'" class="demail" placeholder=""><br>
		<input type="text"  style="margin-top: -20px;display: block;" maxlength="32" name="screenname" value="'.$row['screenname'].'" class="resident" placeholder=""><br>
		<input type="text"  style="margin-top: -17px;display: block;" maxlength="32" name="blog" class="hschool" value="'.$row['websites'].'" placeholder=""><br>';
		echo '<br><button type="submit"  style="margin-top: -20px;display: block;" class="reg" name="contactsubmit">Save Changes</button>';
		}	
		if(isset($_GET['personal'])) {
			echo '<div class="form" style="position: relative;top:50px;">
		<p class="namee" style="position: relative;top:-40px;">Looking For:<br><br>Interested In:<br><br>
		Relationship Status:<br><br>Political Views:<br><br>Interests:<br><br>Favorite Songs:<br><br>Favorite Movies:<br><br>Favorite Books:<br><br>Favorite Quotes:<br><br>About Me:</p>
	<form method="post" action="editprofile.inc.php">
		<div class="form1">	
		<br>
		<input type="text" maxlength="39" style="display: block;margin-top: -160px;" name="lookingfor" value="'.$row['lookingfor'].'" class="resident" placeholder=""><br>
		<input type="text" maxlength="39" style="display: block;margin-top: -20px;" name="interestedin" value="'.$row['interested'].'" class="resident" placeholder=""><br>
		<select name="rstatus" style="margin-left: 5px;display: block;margin-top: -20px;" style="display: block;margin-top: -20px;" class="hahahsex"><br>
		<option>'.$row['rstatus'].'</option>
			<option>Single</option>
			<option>Dating</option>
			<option>Married</option>
		</select><br>
		<input type="text" style="display: block;margin-top: -20px;"  name="pviews" value="'.$row['pviews'].'" class="resident" placeholder=""><br>
		<input type="text" style="display: block;margin-top: -20px;"  name="interests" value="'.$row['interests'].'" class="resident" placeholder=""><br>
		<input type="text" style="display: block;margin-top: -20px;"  name="music" value="'.$row['music'].'" class="resident" placeholder=""><br>
		<input type="text" style="display: block;margin-top: -20px;"  name="movies" value="'.$row['favmovies'].'" class="resident" placeholder=""><br>
		<input type="text" style="display: block;margin-top: -20px;"  name="books" value="'.$row['favbooks'].'" class="resident" placeholder=""><br>
		<input type="text" style="display: block;margin-top: -20px;"  name="quotes" value="'.$row['favquotes'].'" class="resident" placeholder=""><br>
		<textarea cols="30" class="textarea"  name="aboutme" rows="3">'.$row['aboutme'].'</textarea>
		<input type="hidden" value="'.$row['id'].'" name="id">
		<input type="hidden" value="'.$email.'" name="email">
		';
		echo '<br><button type="submit" class="reg" name="personalsubmit">Save Changes</button>';
		}	
			if(isset($_GET['picture'])) {
					echo '<div class="form" style="position: relative;top:50px;">';
					if($row['pfp'] === "") {
						$pfp = "pfp2.jpg";
					} else {
						$pfp = "img/".$row['pfp'];
					}
					echo '<p class="current">Current Picture</p>';
					echo '<p class="upload">Upload Picture</p>';
					echo '<p class="youcan">You can upload a JPG, PNG, or GIF.</p>';
					echo '<form method="post" enctype="multipart/form-data" action="photo.inc.php">
					<input type="file" class="file" name="file"/>
					<button type="submit" name="submit" class="psubmit">Upload Photo</button>
					</form>';
					echo '<img src="'.$pfp.'" class="pfp"/>';
					echo '</div>';
			}
	}} else {
		header("location: home.php");
	}
		?>
		
	</form>
	</div>
	
	
	</div>
	<?php 
	if(isset($_GET['e'])) {
		if ($_GET['e'] === "1") {
			$error = "<label class='error'>Empty Fields!</label>";
		} 
		if ($_GET['e'] === "2") {
			$error = "<label class='error'>Empty Password!</label>";
		} 
		if ($_GET['e'] === "3") {
			$error = "<label class='error'>Invalid Email!</label>";
		}
		if ($_GET['e'] === "4") {
			$error = "<label class='error'>Wrong Password!</label>";
		}  
	}
	else {
			$error = "";
		}
	echo $error;
	?>	
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
	.loginsign {
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		font-size: 19px;
		font-weight: bolder;
	}
	.loginsign2 {
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		font-size: 19px;
		font-weight: bolder;
	}
	
	.welcometext {
		color: white;
		position: relative;
		margin-top: 5px;
		left: 5px;
		text-align: left;
		font-weight: bolder;
	}
	.border {
		position: relative;
		border: 1px solid lightgray;
		min-height: 250px;
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
		left: -400px;
		top: 10px;
		text-align: right;
		line-height: 16px;
		color: #808080;
	}
	.namee2 {
		font-size: 13px;
		position: relative;
		left: 100px;
		top: 10px;
		text-align: left;
		line-height: 16px;
	}
	.nameinput {
		position: relative;
		top: -115px;
		left: 70px;
		font-size: 12px;
		height: 16px;
		width: 200px;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
	}
	.status {
		position: relative;
		top: -107px;
		left: 93px;
		font-size: 12px;
		height: 20px;
		width: 150px;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
	}
	.emailsignup {
		position: absolute;
		margin-left: -62px;
		margin-top: -75px;
		font-size: 12px;
		width: 200px;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
	}
	.passsignup {
		position: absolute;
		margin-left: -62px;
		margin-top: -40px;
		font-size: 12px;
		width: 200px;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
	}
	.rn {
		position: relative;
		top: -5px;
		border-top-color: #D9DFEA;
    	border-left-color: #D9DFEA;
    	border-bottom-color: #3B5998;
    	border-right-color: #3B5998;
    	background-color: #3D65C2;
    	color: white;
    	font-family: Tahoma,Verdana,Segoe,sans-serif;
    	left: -60px;
    	width: 80px;
	}
	.options {
		display: inline-block;
		border-bottom: 1px solid #3B5998;
		width: 600px;
		margin-top: 5px;
	}
	.option {
		display: inline-block;
		font-size: 11px;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		border: 1px solid #3B5998;
		padding: 3px;
		width: 60px;
	}
	.option:hover {
		text-decoration: underline;
	}
	.reg {
		position: relative;
		top: -197px;
		top: 5px;
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
    	left: 30px;
    	width: 100px;

    	z-index: 5;
	}
	.error {
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		font-weight: bolder;
		font-size: 14px;
		position: relative;
		top: 20px;
	}
	.form1 {
		position: relative;
		margin-right: auto;
		left: -20px;
		margin-top: -140px;
		top: -72px;
	}
		.form2 {
		position: relative;
		margin-right: auto;
		left: -20px;
		margin-top: -140px;
		top: 22px;
	}
		.form3 {
		position: relative;
		margin-right: auto;
		left: -20px;
		margin-top: -140px;
		top: 22px;
	}
	.error {
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		font-weight: bolder;
		font-size: 14px;
		position: relative;
		top: 5px;
	}
	.bday {
		margin-bottom: 10px;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		border: 1px solid #bdc7d8;
		font-size: 11px;
		padding: 3px;
		position: relative;
		left: 5px;
		width: 130px;
	}
	.hahahsex {
		margin-bottom: 13px;
		position: relative;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		padding: 3px;
		border: 1px solid #bdc7d8;
		left: -6px;
		font-size: 11px;
	}
	.demail {
		margin-bottom: 10px;
		position: relative;
		left: 30px;
		width: 180px;
		display: block;
		margin-top: -33px;
		padding: 3px;
		font-size: 11px;
		border: 1px solid #bdc7d8;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
	}
	.resident {
		margin-bottom: 10px;
		position: relative;
		left: 30px;
		width: 180px;
		padding: 3px;

		font-size: 11px;
		border: 1px solid #bdc7d8;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
	}
	.hschool {
		position: relative;
		font-size: 11px;
		padding: 3px;
		width: 180px;
		border: 1px solid #bdc7d8;
		left: 30px;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
	}
	.screenname {
		position: relative;
		margin-bottom: 10px;
		top: -53px;
		left: 30px;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
	}
	.blog {
		position: relative;
		margin-bottom: 10px;
		left: 30px;
		top: -53px;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
	}
	.looking {
		position: relative;
		margin-bottom: 10px;
		top: -215px;
		left: 30px;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
	}
	.rstatus {
		position: relative;
		margin-bottom: 10px;
		top: -215px;
		left: 30px;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
	}
	.pviews {
		position: relative;
		margin-bottom: 10px;
		top: -215px;
		left: 30px;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
	}
	.interests {
		position: relative;
		margin-bottom: 10px;
		top: -215px;
		left: 30px;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
	}
	.music {
		position: relative;
		margin-bottom: 10px;
		top: -215px;
		left: 30px;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
	}
	.aboutme {
		position: relative;
		margin-bottom: 10px;
		top: -215px;
		left: 30px;
		margin-left: 60px;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
	}
	.set {
		background-color: #3B5998;
		font-size: 13px;
		padding-top: 5px;
		color: white;
		text-align: left;
		padding-left: 5px;
		height: 23px;
		width: 580px;
		border: 1px solid #6D84B4;
		margin-top: 5px;
	}
	.textarea {
		position: relative;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		padding: 3px;
		border: 1px solid #bdc7d8;
		left: 30px;
		top: -15px;
		font-size: 11px;
	}
	.current {
		margin-top: -30px;
		text-align: left;
		color: #4D5E8B;
		font-size: 14px;
		position: relative;
		left: 3px;
		padding-bottom: 3px;
		border-bottom: 1px solid #E6E7ED;
		width: 550px;
		font-weight: bolder;
	}
	.upload {
		margin-top: -30px;
		text-align: right;
		color: #4D5E8B;
		font-size: 14px;
		position: relative;
		left: 3px;
		padding-bottom: 3px;
		top: -5px;
		width: 550px;
		font-weight: bolder;
	}
	.pfp {
		display: flex;
		margin-left: 30px;
		position: relative;
		top: -60px;
		margin-right: auto;
		border: 1px solid #4D5E8B;
		max-height: 200px;
		min-height: 160px;
		min-width: 180px;
		max-width: 200px;
	}
	.youcan {
		font-weight: bolder;
		font-size: 13px;
		position: relative;
		left: 50px;
	}
	.file {
		position: relative;
		top: 10px;
		left: 120px;
	}
	.psubmit {
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
    left: -140px;
    font-size: 11px;
    top: 80px;
    font-family: "lucida grande", tahoma, verdana, arial, sans-serif;
    position: relative;
	}
	@media only screen and (max-width:700px) {
		.name {
			left: -25px;
			font-size: 25px;
			margin-top: 25px;
		}
		.namee {
			
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
			padding-bottom: 20px;
			width: 400px;
			top: -12px;
		}
		.options {
			width: 400px;
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
			left: -15px;

		}
		.error {
			left: 60px;
			top: 30px;
		}
		.form1 {
			position: relative;
			left: 60px;
			margin-top: -40px;
		}
		.loginsign2 {
			position: relative;
			left: -30px;
		}
		.namee2 {
			position: relative;
			left: -0px;
		}
		.aboutme {
			left: 25px;
		}
		.hahahsex {
			position: relative;
			left: 15px;
		}
		.namee {
			position: relative;
			left: -55%;
		}
		.current {
			width: 358px;
			left: 15%;
		}
		.upload {
			left: -28%;
		}
		.pfp {
			left: 10%;
			top: -70px;
		}
		.youcan {
			left: 33%;
			width: 150px;
			text-align: left;
		}
		.file {
			position: relative;
			left: 59%;
		}
		.psubmit {
			left: -5.5%;
		}
		@media only screen and (max-width:500px) {
			.header {
				left: 0px;
			}
		}	
	}
	@media only screen and (max-width:450px) {
		.file {
			left: 62%;
		}
	}
</style>
</html>