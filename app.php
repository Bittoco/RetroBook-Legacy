<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Retrobook App</title>
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
	?>
</div>
<div class="welcome">
	<?php 
	if(isset($_GET['id'])) {
	$id = $_GET['id'];
	$sql = "SELECT * FROM app WHERE id = '$id'";
	$result = $conn->query($sql);
	$resultCheck = mysqli_num_rows($result);
	if($resultCheck > 0) {
		while($row = mysqli_fetch_assoc($result)) {
		echo '<p class="welcometext">'.$row['name'].' App</p>';
} 

	} else {
		echo '<p class="welcometext">App not found :(</p>';
}
} else { 
	echo '<p class="welcometext">App not found :(</p>';
}
	?>
	<div class="border">
		<h2 class="loginsign"></h2>	
			<?php 
			if(isset($_GET['id'])) {
			$id = $_GET['id'];
			$sql = "SELECT * FROM app WHERE id = '$id'";
			$result = $conn->query($sql);
			$resultCheck = mysqli_num_rows($result);
			if($resultCheck > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					if($row['name'] === "iLike") {
						include 'topbunk.php';
					}
					echo '<div class="appdiv">';
					if($row['name'] === "Video") {
						include 'videoinclude.php';
					}
					if($row['name'] === "iLike") {
						include 'ilike.php';
					}
					$email = $_SESSION['email'];
					$sql2 = "SELECT * FROM userapps WHERE name = '$email'";
					$result2 = $conn->query($sql2);
					if(mysqli_num_rows($result2) <= 0) {
						if($id != "2") {
					echo '<form method="post" action="app.inc.php">
					<input type="hidden" value="'.$id.'" name="id"/>
					<button type="submit" name="subscribe" class="join">Add to my Applications</button>
					
					</form>';
				}
					}
					echo '</div>';
				}
			} else {
				echo '<p class="havent">App Not Found..</p>';
			}
		} else {
			echo '<p class="havent">The App you are looking for is not found.</p>';
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
	.border {
		position: relative;
		border: 1px solid lightgray;
		min-height: 200px;
		background-color: white;
		top: -10px;
		width: 600px;
		background-color: #F6F9F8;
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
	.photo {
		position: relative;
		margin-left: 5px;
		position: relative;
		min-width: 200px;
		max-width: 580px;
		min-height: 200px;
		max-height: 700px;
		margin-bottom: 10px;
		border: 1px solid #3B5998;
	}
	.photos {
		text-align: left;
		margin-top: 10px;
	}
	.my {
		margin-top: -20px;
		border-bottom: 1px solid #E6E7ED;
		color: #4D5E8B;
		font-weight: bolder;
		width: 95%;
		text-align: left;
		font-size: 13px;
		padding-bottom: 5px;
	}
	.caption {
		font-size: 12px;
		margin-top: -5px;
	}
	.appdiv {
		background-color: white;
		margin-top: -15px;
		border: 1px solid darkgray;
		width: 98%;
		text-align: left;
		margin-bottom: 5px;
		background-color: white;
	}
	.join {
		display: flex;
		margin-left: auto;
		margin-right: 5px;
		margin-top: -3px;
		margin-bottom: 3px;
		border-style: solid;
    border-top-width: 1px;
    border-left-width: 1px;
    border-bottom-width: 1px;
    border-right-width: 1px;
    border-top-color: #D9DFEA;
    border-left-color: #D9DFEA;
    border-bottom-color: #0e1f5b;
    border-right-color: #0e1f5b;
 
    height: 20px;
   padding-top: 3px;
    font-size: 11px;
    color: white;
    margin-top: 3px;
    background-color: #3b5998;
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
		@media only screen and (max-width:500px) {
			.header {
				left: 0px;
			}
		}
	}
</style>
</html>