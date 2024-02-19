<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>retrobook | Note</title>
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
		if(isset($_GET['id'])) {
	$id = $_GET['id'];
		$sql = "SELECT * FROM notes WHERE id = '$id'";
		$result = $conn->query($sql);
		if(mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
		echo "<p class='welcometext'>".$row['title']."</p>";
		}} else {
			echo "<p class='welcometext'>Lost Note</p>";
		}
	}
		?>
	<div class="border">
		
		<h2 class="loginsign"></h2>
		
		<?php 
		echo '
			<div class="options">
			<a href="writenote.php">
			<button type="submit" class="submit" name="submit">Write a New Note</button>
			</a>
			<div class="line"></div>
		</div>	
			
			';
		?>
		<div class="note">
			<?php 
				if(isset($_GET['id'])) {
					$id = $_GET['id'];
					$sql = "SELECT * FROM notes WHERE id = '$id'";
					$result = $conn->query($sql);
					if(mysqli_num_rows($result) > 0) {
						while($row = mysqli_fetch_assoc($result)) {
							$creator = $row['fromemail'];
							$sql2 = "SELECT * FROM users WHERE email = '$creator'";
							$result2 = $conn->query($sql2);
							while($row2 = mysqli_fetch_assoc($result2)) {
								echo '<p class="title">'.$row['title'].'</p>
								<gi>'.$row['date'].' | <a href="profile.php?id='.$row2['id'].'">'.$row2['name'].'</a></gi>
								<p class="body">'.$row['message'].'</p>';
								if($row['file'] != "") {
									echo '<img src="img/'.$row['file'].'" class="photo" />';
								}
							}
						}
					} else {
						echo 'Note was either lost or deleted.';
					}

				} else {
					echo 'Note was either lost or deleted.';
				}
			?>
		</div>
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
	.image-upload > input {
  visibility:hidden;
  display: none;
  width:0;
  height:0;
  position: relative;
  z-index: -1;
  color: #F2F2F2;
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
	
	.border {
		position: relative;
		border: 1px solid lightgray;
		min-height: 428px;
		background-color: white;
		top: -10px;
		width: 600px;
		left: -1px;
		background-color: #FFFFFF;
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
	.form {
		background-color: #f2f2f2;
		border: 1px solid #c8c8c8;
		border-top: 1px solid #8b8b8b;
		width: 500px;
		height: 100px;
	}
	
	.none {
		width: 400px;
		font-size: 17px;
		color: #696969;
		display: inline-block;
		margin-top: 15px;
	}
	.options {
		border: 1px solid #D9D9D9;
		width: 220px;
		height: 427px;
		margin-top: -21px;
		margin-left: auto;
		background-color: #F7F7F7;
		position: absolute;
		right: 0;
	}
	.pr {
		position: relative;
		top: 30px;
		color: #333333;
		margin-top: 20px;
	}
	.submit {
		position: absolute;
		font-family: font-family: Tahoma,Verdana,Segoe,sans-serif;;
		margin-top: 30px;
		    border-style: solid;
    border-top-width: 1px;
    border-left-width: 1px;
    border-bottom-width: 1px;
    border-right-width: 1px;
    border-top-color: #D9DFEA;
    border-left-color: #D9DFEA;
    border-bottom-color: #0e1f5b;
    border-right-color: #0e1f5b;
    width: 100px;
    height: 20px;
    margin-left: -50px;
    font-size: 11px;
    color: white;
    background-color: #3b5998;
	}
	.borderheader {
		background-color: #FFFFFF;
		height: 15px;
		border-bottom: 1px solid #D9D9D9;
	}
	.borderheader p {
		text-align: left;
		font-size: 12px;
		font-weight: bolder;
		color: #3b5998;
		position: relative;
		top: -5px;
		left: 10px;
	}
	.note {
		text-align: left;
		margin-top: -68px;
		position: relative;
		top: 65px;
		width: 340px;
		left: -110px;
		
		vertical-align: top;
	}
	.title {
		color: #3b5998;
		font-size: 13px;
		font-weight: bolder;
	}
	.body {
		font-size: 12px;
		white-space: pre-wrap;

	}
	.bottom {
		height: 100px;
		
	}
	.line {
		border: 1px solid #E3E3E3;
		width: 200px;
		position: relative;
		left: -0px;
		top: 80px;
	}
	gi {
		display: block;
		font-size: 11px;
		margin-top: -10px;
		color: #A6A6A6;
	}
	gi a {
		color: #3B5998;
		text-decoration: none;
	}
	gi a:hover {
		text-decoration: underline;
	}
	.photo {
		min-width: 50px;
		max-width: 250px;
		max-height: 280px;
		max-height: 340px;
		border-radius: 12px;
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
		.form {
			position: relative;
			left: 0px;
			width: 350px;
		}
		.input {
			width: 290px;
		}
		.camera {
			position: relative;
			left: -30%;
		}
		.submit {
			left: 25%;
		}
		.line {
			width: 90%;
			left: 0px;
		}
		.uid {
			margin-left: 120px;
		}
		.capt {
			margin-left: 0px;
			width: 70%;
		}
		.date {
			margin-top: 0px;
		}
		.nphoto {
			position: relative;
			top: 20px;
		}
		.pvideo {
			position: relative;
			top: 20px;
		}
		.options {
			width: 100px;
		}
		.title {
			text-align: left;
			position: relative;
			left: 90px;
			width: 80%;
			
		}
		.body  {
			text-align: left;
			position: relative;
			left: 90px;
			width: 80%;
		}
		gi {
			text-align: left;
			position: relative;
			left: 90px;
			width: 80%;
		}
		.submit {
			width: 70px;
			height: 30px;
			left: 65px;
		}
		.photo {
			max-height: 60%;
			max-width: 60%;
			position: relative;
			text-align: center;
			left: 30%;
		}
		@media only screen and (max-width:500px) {
			.header {
				left: 0px;
			}
		}
	}
</style>
</html>