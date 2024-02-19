<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>retrobook | Give a Gift</title>
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
		header("location: index.php");
		exit();
	}
	if(isset($_GET['u']) && $_GET['u'] === $_SESSION['email']) {
		header("location: profile.php?id=".$_SESSION['id']."");
	}
	?>
</div>
<div class="welcome">
	<p class="welcometext">Gift Shop</p>
	<div class="border">
		<p class="git">Welcome to the new Gift Shop, all gifts are free.</p>
		<p class="info">Gifts are a brand new feature on the retrobook, as a virtual gift or item on someones wall. </p>
		<p class="choose">Choose your gift:</p>
		<div class="giftdiv">
			<form method="post" action="gift.inc.php">
			<?php 
			if(isset($_GET['g']) && $_GET['g'] === "smiley") {
				$smiley = "border: 1px solid #3B5998;";
				$bear = "border: 0px;";
				$heart = "border: 0px;";
				$cupcake = "border: 0px;";
				$cat = "border: 0px;";
			} elseif(isset($_GET['g']) && $_GET['g'] === "bear") {
				$smiley = "border: 0px";
				$bear = "border: 1px solid #3B5998";
				$heart = "border: 0px";
				$cupcake = "border: 0px";
				$cat = "border: 0px";
			}
			elseif(isset($_GET['g']) && $_GET['g'] === "heart") {
				$smiley = "border: 0px solid;";
				$bear = "border: 0px solid;";
				$heart = "border: 1px solid #3B5998";
				$cupcake = "border: 0px solid";
				$cat = "border: 0px solid";
			}
			elseif(isset($_GET['g']) && $_GET['g'] === "cupcake") {
				$smiley = "border: 0px";
				$bear = "border: 0px";
				$heart = "border: 0px";
				$cupcake = "border: 1px solid #3B5998";
				$cat = "border: 0px";
			}
			elseif(isset($_GET['g']) && $_GET['g'] === "cat") {
				$smiley = "border: 0px;";
				$bear = "border: 0px;";
				$heart = "border: 0px;";
				$cupcake = "border: 0px;";
				$cat = "border: 1px solid #3B5998";
			} else {
				$smiley = "border: 0px;";
				$bear = "border: 0px;";
				$heart = "border: 0px;";
				$cupcake = "border: 0px;";
				$cat = "border: 0px;";
			}
			?>
			<?php
			echo ' 
			<a href="giftshop.php?g=smiley"><img class="photo" src="smiley.png" style="'.$smiley.'" /></a>
			<a href="giftshop.php?g=bear"><img class="photo" style="'.$bear.'" src="bear.png" /></a>
			<a href="giftshop.php?g=heart"><img class="photo" style="'.$heart.'" src="heart.png" /></a>
			<a href="giftshop.php?g=cupcake"><img class="photo" style="'.$cupcake.'" src="cupcake.png" /></a>
			<a href="giftshop.php?g=cat"><img class="photo" style="'.$cat.'" src="cat.png" /></a>';
			if(isset($_GET['g'])) {
			echo '<input type="hidden" name="gift" value="'.$_GET['g'].'">';
				}
			?>

		</div>
		<p class="choose">Choose your recipent:</p>
		<?php 
		$uid = $_SESSION['email'];
		$sql = "SELECT * FROM friends WHERE friend1 = '$uid'";
		$result = $conn->query($sql);
		
			echo '<select class="select" name="person">
			<option value="none" selected disabled hidden>Select a friend.</option>';
			if(isset($_GET['u'])) {
				$them = $_GET['u'];
				$sql2 = "SELECT * FROM users WHERE email = '$them'";
				$result2 = $conn->query($sql2);
				while($row2 = mysqli_fetch_assoc($result2)) {
				echo '<option>'.$row2['name'].'</option>';
				}
			}
			while($row = mysqli_fetch_assoc($result)) {
				
				$user2 = $row['friend2'];
				$sql2 = "SELECT * FROM users WHERE email = '$user2'";
				$result2 = $conn->query($sql2);
				while($row2 = mysqli_fetch_assoc($result2)) {
					echo '<option value='.$row2['id'].' >'.$row2['name']."</option>";
				}
				
			}
			echo '</select>';
		
		?>
		<p class="choose">Add your Message:</p>
		<textarea class="message" name="message" cols="50" rows="5"></textarea>
		<button type="submit" name="submit" class="submit">Send</button>
		<?php 
			if(isset($_GET['e'])) {
				if($_GET['e'] === "1") {
					$message = "Gift not sent, you sent it towards nobody.";
				} elseif($_GET['e'] === "2") {
					$message = "Gift not sent, you didnt choose a Gift.";
				}
				elseif($_GET['e'] === "3") {
					$message = "Cannot send a gift towards yourself.";
				}
				echo '<p class="error">'.$message.'</p>';
			}
		?>
		</form>
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
		left: 10px;
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
	.border {
		position: relative;
		border: 1px solid lightgray;
		min-height: 200px;
		background-color: #F7F4F8;
		top: -10px;
		width: 600px;
		left: -1px;
		border-bottom: 2px solid #3B5998;
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
	.upload {
		text-decoration: none;
		position: relative;
		display: flex;
		margin-left: auto;
		left: -10px;
		top: -5px;
	}
	.upload a {
		text-decoration: none;
	}
	.havent {
		border-top: 1px solid #8B8B8B;
		background-color: #F2F2F2;
		width: 80%;
		font-weight: bolder;
		text-align: left;
		height: 35px;
		border: 1px solid #C8C8C8;
		padding-top: 20px;
		padding-left: 10px;
		padding-bottom: 8px;
	}
	.myphotos {
		position: relative;
		top: 20px;
	}
	.git {
		color: #2A2A32;
		font-weight: bolder;
		font-family: Helvetica,Tahoma,Verdana;
		position: relative;
		top: 10px;
		text-align: left;
		left: 40px;
		font-size: 15px;
	}
	.info {
		font-size: 12px;
		font-family: Helvetica,Tahoma,Verdana;
		width: 400px;
		text-align: left;
		position: relative;
		left: -60px;
		top: 5px;
	}
	.choose {
		color: #3A599A;
		font-weight: bolder;
		font-family: Helvetica,Tahoma,Verdana;
		position: relative;
		top: 10px;
		text-align: left;
		left: 40px;
		font-size: 12.5px;
	}
	.giftdiv {
		border: 1px solid #D0D0D2;
		background-color: white;
		min-height: 100px;
		width: 500px;
		margin-top: 20px;
		margin-bottom: 5px;
	}
	.photo {
		height: 80px;
		width: 80px;
		position: relative;
		top: 10px;
	}
	.photo:hover {
		
	}
	.select {
		border: 1px solid #D0D0D2;
		font-family: Helvetica,Tahoma,Verdana;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		padding: 2px;
		font-size: 12px;
		display: flex;
		margin-right: auto;
		display: block;
		margin-top: 20px;
		margin-left: 50px;
	}
	.message {
		border: 1px solid #D0D0D2;
		margin-right: auto;
		display: flex;
		margin-left: 50px;
		margin-top: 20px;
		font-size: 11px;
		width: 350px;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
	}
	.submit {
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
    font-size: 12px;
   width: 60px;
    font-family: "lucida grande", tahoma, verdana, arial, sans-serif;
    position: relative;
    left: -220px;
    margin-top: 10px;
    margin-bottom: 20px;
	}
	.error {
		font-family: Helvetica,Tahoma,Verdana;
		font-size: 13px;
		padding-left: 50px;
		font-weight: bolder;
		text-align: left;
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
			min-height: 400px;
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
		.photo {
			max-width: 300px;
			max-height: 400px;
		}
		.info {
		    width: 300px;
		    left:0px;
		}
		.giftdiv {
		    width: 350px;
		}
		.message {
		    width: 300px;
		}
		.submit {
		    left: -100px;
		}
		@media only screen and (max-width:500px) {
			.header {
				left: 0px;
			}
		}
	}
</style>
</html>