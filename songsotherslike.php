<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Retrobook</title>
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
	<p class="welcometext">Songs others have added</p>
	<div class="border"><br>
		<?php include 'topbunk.php';
		?>
	<div class="white">
		<div class="text">
			<img src="img/ilike.png" class="ilike"/>Songs Others like<br><br></div>
			<?php 
			$email = $_SESSION['email'];
			$sql = "SELECT * FROM songs ORDER BY id DESC";
			$result = $conn->query($sql);
			if(mysqli_num_rows($result) > 0) {
				echo '<div class="songsadded"><gi>Songs Recently Added to Profiles</gi><di>Displaying '.mysqli_num_rows($result).' songs.</di></div>';
				while($row = mysqli_fetch_assoc($result)) {
					
				echo '<div class="song">
				<audio id="audio_'.$row['id'].'">
            <source src="music/'.$row['file'].'" type="audio/mpeg">
            Your browser does not support the audio element.
        	</audio>
        	<div class="leftside"><div class="left2"><img id="playPause" class="paused" data-audio-id="'.$row['id'].'" src="img/paused.png" alt="Play"><di>'.$row['title'].' by <a style="color: #3B5998;">'.$row['artist'].'</a></di></div></div>';
        	$id = $row['id'];
        		$sql2 = "SELECT * FROM profilesongs WHERE songid = '$id' AND email = '$email'";
        		$result2 = $conn->query($sql2);
        		if(mysqli_num_rows($result2) > 0) {
        		while($row2 = mysqli_fetch_assoc($result2)) {
        		echo '<p class="remove"><a style="color: #3B5998;" href="removefromprofile.php?id='.$row2['id'].'">Remove from Profile</a></p>';
        		} 
        	} else {
        		$sid = $row['id'];
        		$sql3 = "SELECT * FROM songs WHERE id = '$sid'";
        		$result3 = $conn->query($sql3);
        		if(mysqli_num_rows($result3) > 0) {
        			echo '<p class="remove"><a style="color: #3B5998;" href="addtoprofile.php?id='.$sid.'">Add back to Profile</a></p>';
        		}
        		}
				echo '</div>';


				}
			} else {
				echo '<div class="u">You do not have any songs listed, visit <a href="songsothers.php">Songs others like</a> to add some!</div>';
			}
			?>
		
	</div>
	</div>
	<script type="text/javascript">const playPauseButtons = document.querySelectorAll(".paused");

playPauseButtons.forEach(button => {
    button.addEventListener("click", function() {
        const audioId = this.getAttribute("data-audio-id");
        const audio = document.getElementById("audio_" + audioId);

        if (audio.paused) {
            audio.play();
            this.src = "img/unpaused.png"; // Change image to pause icon
        } else {
            audio.pause();
            this.src = "img/paused.png"; // Change image to play icon
        }
    });
});</script>
</div>
<?php
	require 'loginarea.php';
?>
	</center>
</body>
<style type="text/css">
	.form {
		position: relative;
		top: 10px;
		left: 20px;
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
	.remove {
		text-align: right;
		font-size: 11px;
		text-decoration: none;
		color: #3B5998;
		position: relative;
		top: 7px;
		width: 100px;
		float: right;
		margin-right: 15px;
		margin-top: -30px;
	}
	.remove a {
		color: #3B5998;
		text-decoration: none;
	}
	.remove:hover {
		text-decoration: underline;
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
	.paused {
		height: 20px;
		margin-right: auto;
		display: flex;
		position: relative;
		z-index: 5;
		float: left;
	}
	.leftside {
		width: 80%;
		float: left;
	}
	.left2 {
		float: left;
		padding: 5px;
	}
	.left2 di {
		font-size: 12px;
		margin-left: 5px;
		text-align: left;
		top: 3px;
		display: block;
		width: 330px;
		position: relative;
		left: 5px;
	}
	.left2 a {
		color: #3B5998;
	}
	.u {
		font-weight: bold;
		font-size: 13px;
		background-color: #F6F9F8;
		border: 1px solid #6D84B4;
		width: 80%;
		margin-top: 10px;
		font-family: calibri;
		padding: 10px;
	}
	.u a {
		text-decoration: none;
	}
	.u a:hover {
		text-decoration: underline;
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
		overflow: auto;
		position: relative;
		border: 1px solid lightgray;
		overflow: hidden;
		background-color: white;
		top: -10px;
		width: 600px;
		left: -1px;
		border-bottom: 2px solid #3D65C2;
		background-color: #F6F9F8;
		}
	.desc {
		position: relative;
		text-align: left;
		left: 5px;
		font-size: 13px;
		width: 520px;
	}
	.text {
		margin-left: 30px;
		display: flex;
		font-family: calibri;
		
		font-size: 15px;
		margin-top: 30px;
	}
	.ilike {
		height: 25px;
		text-align: left;
		border-radius: 5px;

	}
	.text img {
		position: relative;
		top: -8px;
		margin-right: 5px;
	}
	.white {
		border: 1px solid #A9A9A9;
		width: 98%;
		background-color: white;
		min-height: 150px;
		padding-bottom: 30px;
		overflow: auto;
		margin: 5px;
		margin-top: -15px;
	}
	.namee {
		font-size: 11px;
		position: relative;
		left: 130px;
		top: 10px;
		text-align: left;
		line-height: 16px;
		color: #808080;
		font-weight: bolder;
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
	.song {
		width: 80%;
		position: relative;
		overflow: auto;
		
		border-bottom: 1px solid lightgray;
	}
	.songsadded {
		width: 80%;
	}
	.songsadded gi {
		background: #D8DEEA;
    font-size: 13px;
    font-weight: bolder;
    padding: 2px;
    border-top: 1px solid #3B5998;
    color: #3B5998;
    font-family: calibri;
    display: flex;
    padding-left: 7px;
	}
	.songsadded di {
	background: #F1F1F1;
    font-size: 11px;
    padding: 3px;
   
    display: block;
    text-align: left;
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
		top: 20px;
		left: 0px;
	}
	.error {
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		font-weight: bolder;
		font-size: 13px;
		position: relative;
		top: 18px;
		left: 20px;
		color: #808090;
	}
	.face {
		top: -31px;
		border-top-left-radius: 5px;
		border-bottom-left-radius: 5px;
		left: -365px;
		position: relative;
		z-index: -1;
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
			height: 250px;
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
		.head {
			display: hidden;
			display: none;
		}
		@media only screen and (max-width:500px) {
			.header {
				left: 0px;
			}
		}	
		@media only screen and (max-width:450px) {
			.reg {
				width: 80px;
				height: 20px;
				position: relative;
				top: -10px;
			}
			.rn {
				width: 80px;
				height: 20px;
			}
			.emailsignup {
				margin-left: -32px;
			}
			.passsignup {
				margin-left: -32px;
			}
		}
	}
</style>
</html>