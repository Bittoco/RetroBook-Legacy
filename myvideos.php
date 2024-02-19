<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Retrobook | My Videos</title>
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
	<p class="welcometext">My Videos</p>
	<div class="border">
	    <div class="he">
		<h2 class="loginsign"></h2>
		<?php 
		$id = $_GET['id'];
		$sql = "SELECT * FROM users WHERE id = '$id'";
		$result = $conn->query($sql);
		while($row = mysqli_fetch_assoc($result)) {
			if($row['email'] === $_SESSION['email']) {
		echo '<a href="createvideo.php" style="text-decoration: none;"><button class="upload">Upload Video</button></a>';
		} else {
			echo '<br>';
		}
		}
		?>
    </div>
			<?php 
			$id = $_GET['id'];
			$sql = "SELECT * FROM videos WHERE creator = '$id' ORDER BY id DESC";
			$result = $conn->query($sql);
			$resultCheck = mysqli_num_rows($result);
			$sql2 = "SELECT * FROM users WHERE id = '$id'";
			$result2 = $conn->query($sql2);
			$resultCheck2 = mysqli_num_rows($result2);
			if($resultCheck2 > 0) {
			while($row2 = mysqli_fetch_assoc($result2)) {
			echo '<p class="my">Videos 0 - '.$resultCheck2.'</p>';
			if($resultCheck > 0) {
				echo '<div class="photos">';
				while($row = mysqli_fetch_assoc($result)) {
					echo '<a href="video.php?id='.$row['id'].'"><video class="photo" >
				  <source src="img/'.$row['video'].'#t=0.1" type="video/mp4">
				  <source src="img/'.$row['video'].'#t=0.1" type="video/quicktime">
				  <source src="img/'.$row['video'].'#t=0.1" type="video/mov">
				  Your browser does not support the video tag.
				</video></a>';
				}
				echo '</div><br>';
			} else {
				echo '<p class="havent">No shared any videos yet.</p>';
			}}
			} else {
				echo '<p class="havent">This account is not found.</p>';
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
.he {
    background-color: white;
       width: 100%;
       padding-top: 5px;
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
		background-color: #F7F7F7;
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
		margin-left: 15px;
		position: relative;
		min-width: 170px;
		max-width: 160px;
		min-height: 100px;
		max-height: 190px;
		padding: 5px;
		background-color: white;
		border: 1px solid #E2E2E2;
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
		@media only screen and (max-width:500px) {
			.header {
				left: 0px;
			}
		}

	}
</style>
</html>