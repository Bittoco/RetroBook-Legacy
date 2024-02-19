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
<div class="welcome">
	<p class="welcometext">Edit Information</p>
	<div class="mb">
	<div class="border">
		<h2 class="loginsign">[ Edit Basic Info ]</h2>
		<div class="form">
		<p class="namee">Sex:<br><br>Birthday:<br><br>Residence:<br><br>High School:</p>

	<form method="post" action="editprofile.inc.php">
		<div class="form1">
		<?php 
		$email = $_SESSION['email'];
		$sql = "SELECT * FROM users WHERE email = '$email'";
		$result = $conn->query($sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck > 0) {
			while($row = mysqli_fetch_assoc($result)) {
		echo '<select name="sex" style="margin-left: -50px;" class="hahahsex">
		<option>'.$row['sex'].'</option>
		<option>Male</option>
		<option>Female</option>
		<option>Other</option>
		</select>
		<br>
		<input type="hidden" value="'.$row['id'].'" name="id">
		<input type="hidden" value="'.$email.'" name="email">
		<input type="date" value="'.$row['bday'].'" name="bday" class="bday"><br>
		<input type="text" name="residence" value="'.$row['residence'].'" class="resident" placeholder=""><br>
		<input type="text" name="hschool" class="hschool" value="'.$row['hschool'].'" placeholder=""><br>
		<h2 class="loginsign2" style="margin-left: 30px;">[ Edit Contact Info ]</h2>
		<p class="namee2" style="margin-left: 20px;"  >Screenname:<br><br>Blog:</p>
		<input type="text" name="screenname" class="screenname" value="'.$row['screenname'].'" placeholder=""><br>
		<input type="text" name="blog" class="blog" placeholder="" value="'.$row['websites'].'">
		<h2 class="loginsign2" style="margin-left: 30px;margin-top: -30px;">[ Edit Personal Info ]</h2>
		<p class="namee2" style="margin-left: 20px;">Looking For:<br><br>Interested In:<br><br>Relationship Status:<br><br>Political Views:<br><br>Interests:<br><br>Music Taste:<br><br>About Me:</p>
		<input type="text" name="looking" value="'.$row['lookingfor'].'" class="looking"><br>
		<input type="text" name="interested" class="looking" value="'.$row['interested'].'"><br>
		<select name="rstatus" class="rstatus">
			<option>'.$row['rstatus'].'</option>
			<option>Single</option>
			<option>Dating</option>
			<option>Married</option>';
			echo "<option>It's complicated</option>";
		echo '
		</select><br>
		<input type="text" value="'.$row['pviews'].'"  class="pviews" name="pviews"><br>
		<input type="text" value="'.$row['interests'].'" class="interests" name="interests"><br>
		<input type="text" class="music" value="'.$row['music'].'" name="music"><br>
		<textarea class="aboutme" name="aboutme"  rows="3" cols="30" >'.$row['aboutme'].'</textarea>';
	}} else {
		header("location: home.php");
	}
		?>
		<br><button type="submit" class="reg" name="submit">Save All</button>
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
	.loginsign2 {
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

		margin-top: 22px;
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
		border-style: solid;
    border-top-width: 1px;
    border-bottom-width: 2px;
    border-right-width: 2px;
    border-left-width: 1px;
    border-top-color: #D9DFEA;
    border-bottom-color: #3B5998;
    border-right-color: #3B5998;
    border-left-color: #D9DFEA;
    background-color: #538ADC;
    font-family: Tahoma, arial;
    color: white;
    	left: -60px;
    	width: 80px;
	}
	.reg {
		position: relative;
		top: -197px;
		border-style: solid;
    border-top-width: 1px;
    border-bottom-width: 2px;
    border-right-width: 2px;
    border-left-width: 1px;
    border-top-color: #D9DFEA;
    border-bottom-color: #3B5998;
    border-right-color: #3B5998;
    border-left-color: #D9DFEA;
    background-color: #538ADC;
    font-family: Tahoma, arial;
    color: white;
    	left: 30px;
    	width: 80px;

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
		margin-top: -50px;
		top: -70px;
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
	}
	.hahahsex {
		margin-bottom: 13px;
		position: relative;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
	}
	.resident {
		margin-bottom: 10px;
		position: relative;
		left: 30px;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
	}
	.hschool {
		position: relative;
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
		height: 200px;
	}
	.mb {
		width: 700px;
		left: -150px;
		position: relative;
		border: 1px dashed #3B5998;
		position: relative;
		top: -62px;
		padding-top: 40px;
		clear: both;
		margin-bottom: 30px;
		border-top: 0px solid;
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
			padding-bottom: 20px;
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
	}
</style>
</html>