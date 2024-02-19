<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>retrobook | News Feed</title>
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
	<p class="welcometext">Welcome <?php echo $name[0] ?>!</p>
	<div class="border">
		<div class="inner">
			<div class="in">
		<h2 class="loginsign">News Feed</h2>
		<?php 
		$email = $_SESSION['email'];
		$toid = $_SESSION['id'];
		$sql = "SELECT * FROM wall WHERE fromname != '$email' AND date > current_date - interval 1.2 day ORDER BY date DESC";
		$result = $conn->query($sql);
		$resultCheck = mysqli_num_rows($result);
		if($resultCheck > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$from = $row['fromname'];
				$sqlu = "SELECT * FROM users WHERE email = '$from'";
				$resultu = $conn->query($sqlu);
				while($row2 = mysqli_fetch_assoc($resultu)) {
				if($row['typewall'] === "Note") {
					$date = $row['date'];
					$from = $row['fromname'];
				
					$sql3 = "SELECT * FROM notes WHERE fromemail = '$from' AND date = '$date'";
					$result3 = $conn->query($sql3);
					while($row3 = mysqli_fetch_assoc($result3)) {
					
					echo '<div class="notediv"><p class="note"><a href="profile.php?id='.$row2['id'].'">'.$row2['name'] .'</a> posted a new <a href="notes.php?id='.$row['fromid'].'">Note</a><di>'.$row['altdate'].'</di>';
						echo '<img src="retro/notes.gif" class="nimg"/></div>';
				}}
				
				if($row['typewall'] === "Photo Note") {
					$date = $row['date'];
					$from = $row['fromname'];
				
					$sql3 = "SELECT * FROM notes WHERE fromemail = '$from' AND date = '$date'";
					$result3 = $conn->query($sql3);
					while($row3 = mysqli_fetch_assoc($result3)) {
					
					echo '<div class="notediv"><p class="note"><a href="profile.php?id='.$row2['id'].'">'.$row2['name'] .'</a> posted a photo on their <a href="notes.php?id='.$row['fromid'].'">Note Tab</a><di>'.$row['altdate'].'</di>';
						echo '<img src="ptype.png" class="nimg"/>
						<img src="img/'.$row3['file'].'" class="photo"/>
						</div>';
				}}
				if($row['typewall'] === "iLike") {
						$date = $row['date'];
					$from = $row['fromname'];
				
					$sql3 = "SELECT * FROM users WHERE email = '$from'";
					$result3 = $conn->query($sql3);
					while($row3 = mysqli_fetch_assoc($result3)) {
						echo '<div class="notediv"><p class="note"><a href="profile.php?id='.$row3['id'].'">'.$row3['name'] .'</a> added a new song to <a href="app.php?id=2"><b>iLike</b></a><di>'.$row['altdate'].'.</di>';
						echo '<img style="height:  16px;border-radius: 5px;left: -27px;" src="img/ilike.png" class="nimg"/>
						
						</div>';
					}
				}
				if($row['typewall'] === "Video Note") {
					$date = $row['date'];
					$from = $row['fromname'];
				
					$sql3 = "SELECT * FROM notes WHERE fromemail = '$from' AND date = '$date'";
					$result3 = $conn->query($sql3);
					while($row3 = mysqli_fetch_assoc($result3)) {
					
					echo '<div class="notediv"><p class="note"><a href="profile.php?id='.$row3['fromid'].'">'.$row2['name'] .'</a> shared a video on their <a href="notes.php?id='.$row['fromid'].'">Note Tab</a><di>'.$row['altdate'].'</di>';
						echo '<img src="retro/videos.gif" style="width: 25px;left: -30px;top: -21px;" class="nimg"/>
						<video class="photo"  preload="metadata">
						  <source src="img/'.$row3['file'].'#t=0.1" type="video/mp4">
						  <source src="img/'.$row3['file'].'#t=0.1" type="video/quicktime">
						  <source src="img/'.$row3['file'].'#t=0.1" type="video/mov">
						  Your browser does not support the video tag.
						</video>
						</div>';
				}}
				if($row['typewall'] === "Create Group") { 
					$date = $row['date'];
					$from = $row['fromname'];
					$sql3 = "SELECT * FROM groups WHERE creator = '$from' AND datemade = '$date'";
					$result3 = $conn->query($sql3);
					while($row3 = mysqli_fetch_assoc($result3)) {
						echo '<div class="notediv"><p class="note"><a href="profile.php?id='.$row2['id'].'">'.$row2['name'] .'</a> created a <a href="group.php?id='.$row3['id'].'">Group</a><di>'.$row['altdate'].'</di>';
						echo '<img src="retro/group.gif" style="height:20px;left: -5%;" class="nimg"/></div>';
					}
				}
				
			 if($row['typewall'] === "Joined Group") { 
					$date = $row['date'];
					$from = $row['fromname'];
					$id = $row['noteid'];
					$sql3 = "SELECT * FROM groups WHERE id = '$id'";
					$result3 = $conn->query($sql3);
					while($row3 = mysqli_fetch_assoc($result3)) {
						echo '<div class="notediv"><p class="note"><a href="profile.php?id='.$row2['id'].'">'.$row2['name'] .'</a> Joined <a href="group.php?id='.$row3['id'].'">'.$row3['name'].'</a><di>'.$row['altdate'].'</di>';
						echo '<img src="retro/group.gif" style="height:20px;left: -5%;" class="nimg"/></div>';
					}
				}
				if($row['typewall'] === "Edit Picture") { 
					$date = $row['date'];
					$from = $row['fromname'];
					$id = $row['noteid'];
					$sql3 = "SELECT * FROM users WHERE email = '$from'";
					$result3 = $conn->query($sql3);
					while($row3 = mysqli_fetch_assoc($result3)) {
						echo '<div class="notediv" style="display: none;"><p class="note"><a href="profile.php?id='.$row2['id'].'">'.$row2['name'] .'</a> Edited their <a>Profile Picture</a><di>'.$row['altdate'].'</di>';
						echo '<img src="retro/photos.gif" style="height:20px;left: -5%;" class="nimg"/></div>';
					}
				}
				if($row['typewall'] === "Group Comment") { 
					$date = $row['date'];
					$from = $row['fromname'];
					$id = $row['noteid'];
					$sql3 = "SELECT * FROM users WHERE email = '$from'";
					$result3 = $conn->query($sql3);
					while($row3 = mysqli_fetch_assoc($result3)) {
						echo '<div class="notediv"><p class="note"><b><a href="profile.php?id='.$row2['id'].'">'.$row2['name'] .'</a></b> posted on a  <a href="viewmessage.php?id='.$row['noteid'].'">Group Wall</a><di>'.$row['altdate'].'</di>';
						echo '<img src="retro/group.gif" style="height:20px;left: -5%;" class="nimg"/></div>';
					}
				}
				if($row['typewall'] === "Group Reply") { 
					$date = $row['date'];
					$from = $row['fromname'];
					$id = $row['noteid'];
					$sql3 = "SELECT * FROM users WHERE email = '$from'";
					$result3 = $conn->query($sql3);
					while($row3 = mysqli_fetch_assoc($result3)) {
						echo '<div class="notediv"><b><p class="note"><a href="profile.php?id='.$row2['id'].'">'.$row2['name'] .'</a></b> replied to a <a href="viewmessage.php?id='.$row['noteid'].'">Comment</a><di>'.$row['altdate'].'</di>';
						echo '<img src="retro/comment.gif" style="height:20px;left: -5%;" class="nimg"/></div>';
					}
				}
				if($row['typewall'] === "Photo") {
					$id = $row['fromid'];
					$name = $row['fromname'];
					$date = $row['date'];
					$sql3 = "SELECT * FROM photos WHERE fromid = '$id' AND date = '$date'";
					$result3 = $conn->query($sql3);
					while($row3 = mysqli_fetch_assoc($result3)) {
					
					echo '<div class="notediv"><p class="note"><b><a href="profile.php?id='.$row2['id'].'">'.$row2['name'] .'</a> posted a <a href="photo.php?p='.$row3['id'].'">Photo</a></b><di>'.$row['altdate'].'</di>';
						echo '<img src="retro/photos.gif" class="nimg"/>
						<a href="photo.php?p='.$row3['id'].'"><img src="img/'.$row3['photo'].'" class="photo"/></a>
						</div>';
					
			}}
			$id = $_SESSION['id'];
			$sql_next = "SELECT * FROM (SELECT * FROM wall WHERE typewall = 'Profile Wall' AND fromid != '$id' ORDER BY id DESC) AS wall WHERE fromname NOT IN (SELECT fromname FROM (SELECT fromname FROM wall WHERE typewall = 'Profile Wall' AND fromid = '$id' ORDER BY id DESC LIMIT 1) AS subquery) ORDER BY id DESC";
			 $result_next = $conn->query($sql_next);
    $next_row = $result_next->fetch_assoc();
			if($row['typewall'] === "Profile Wall") { 

					$date = $row['date'];
					$from = $row['fromname'];
					$id = $row['noteid'];
        			
					$sql3 = "SELECT * FROM users WHERE email = '$from'";
					$result3 = $conn->query($sql3);
					  $prev_row = $row;
					while($row3 = mysqli_fetch_assoc($result3)) {
						$fromname = explode(" ", $row3['name']);
						$date = $row['date'];
						$sql4 = "SELECT * FROM profilewall WHERE date = '$date'";
						$result4 = $conn->query($sql4);
						while($row4 = mysqli_fetch_assoc($result4)) {
							$toid = $row4['toid'];
							$sql5 = "SELECT * FROM users WHERE id = '$toid'";
							$result5 = $conn->query($sql5);
							while($row5 = mysqli_fetch_assoc($result5)) {
								$aboutname = explode(" ", $row5['name']);
						echo '<div class="notediv" style="border-bottom: 0px solid white;"><p class="note"><b><a href="profile.php?id='.$row2['id'].'">'.$fromname[0].'</a> commented on <a href="profile.php?id='.$row5['id'].'">'.$aboutname[0].'\'</a>s wall.</b><di>'.$row['altdate'].'</di>';
						echo '<img src="comment.gif"  class="nimg"/>
						<div class="wallmess"><img src="start_quote.gif" class="quote"/>&nbsp;'.$row4['message'].'&nbsp;<img src="end_quote.gif" class="quote"/></div>
						</div>';
					}}}
				}
				 if ($row['typewall'] === 'Profile Wall' && $next_row['typewall'] === 'Profile Wall') {
        echo "";
    } else {
    	 echo "<div class='linething'></div>";
    }
				$toid = $_SESSION['id'];
				if($row['typewall'] === "Profile Gift" && $row['toid'] === $toid) { 
					$date = $row['date'];
					$from = $row['fromname'];
					$id = $row['noteid'];
        			
					$sql3 = "SELECT * FROM users WHERE email = '$from'";
					$result3 = $conn->query($sql3);
					while($row3 = mysqli_fetch_assoc($result3)) {
						$fromname = explode(" ", $row3['name']);
						$date = $row['date'];
						$sql4 = "SELECT * FROM profilewall WHERE date = '$date'";
						$result4 = $conn->query($sql4);
						while($row4 = mysqli_fetch_assoc($result4)) {
							$toid = $row4['toid'];
							$sql5 = "SELECT * FROM users WHERE id = '$toid'";
							$result5 = $conn->query($sql5);
							while($row5 = mysqli_fetch_assoc($result5)) {
								$aboutname = explode(" ", $row5['name']);
						echo '<div class="notediv" ><p class="note"><a href="profile.php?id='.$row2['id'].'">'.$fromname[0].'</a> gave you a <a href="profile.php?id='.$row5['id'].'">Gift.</a><di>'.$row['altdate'].'</di>';
						echo '<img src="newsheart.png" style="height:20px;left: -5%;" class="nimg"/>
						<p class="message">'.$row4['message'].'</p>';
						if($row4['type'] === "Gift") {
         						if($row4['gifttype'] === "smiley") {
         							echo '<img src="smiley.png" class="gift"/>';
         						}
         						elseif($row4['gifttype'] === "bear") {
         							echo '<img src="bear.png" class="gift"/>';
         						}
         						elseif($row4['gifttype'] === "heart") {
         							echo '<img src="heart.png" class="gift"/>';
         						}
         						elseif($row4['gifttype'] === "cupcake") {
         							echo '<img src="cupcake.png" class="gift"/>';
         						}
         						elseif($row4['gifttype'] === "cat") {
         							echo '<img src="cat.png" class="gift"/>';
         						}
         				}
         				echo '
						</div>';
					}}}
				}
				if($row['typewall'] === "Status") {
					$toid = $row['fromid'];
						$sql5 = "SELECT * FROM users WHERE id = '$toid'";
							$result5 = $conn->query($sql5);
							while($row5 = mysqli_fetch_assoc($result5)) {
						echo '<div class="notediv"><p class="note"><b><a href="profile.php?id='.$row2['id'].'">'.$row2['name'] .'</a></b> is '.$row['noteid'].'<di>'.$row['altdate'].'</di>';
						echo '<img src="retro/statusedit.gif" style="height:20px;left: -5%;" class="nimg"/></div>';
					}
				}
				if($row['typewall'] === "Video") {
					$toid = $row['fromid'];
						$sql5 = "SELECT * FROM users WHERE id = '$toid'";
							$result5 = $conn->query($sql5);
							while($row5 = mysqli_fetch_assoc($result5)) {
								$id = $row5['id'];

						echo '<div class="notediv"><p class="note"><b><a href="profile.php?id='.$row2['id'].'">'.$row2['name'] .'</a></b> posted a new <a href="myvideos.php?id='.$row5['id'].'">Video</a><di>'.$row['altdate'].'</di>';
						echo '<img src="vidicon.png" style="height:15px;left: -5%;margin-top:3px;" class="nimg"/></div>';
					}
				}
				
		} 

	} $sql4 = "SELECT * FROM wall WHERE typewall = 'Video'";
				$result4 = $conn->query($sql4);
				if(mysqli_num_rows($result4) >= 2) {
					$email = $_SESSION['email'];
					$sql5 = "SELECT * FROM userapps WHERE name = '$email' AND appid = '1'";
					$result5 = $conn->query($sql5);
					if(mysqli_num_rows($result5) <= 0) {
					echo '<div class="notediv"><p class="note">Sponsored: Video by Retrobook;</p>';
						echo '<img src="comment.png" class="nimg" style="left:15px;top:-10px;"/>
						<a href="app.php?id=1"><img src="img/video.png" style="margin-left: -340px; margin-top: 1px;" class="photo"/></a>
						</div>';
					}
				}
			echo '<br>';
		} else {
			echo '<p class="none">There is no news to display.</p>';
		}
		?>
	</div>
	
	</div>
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
	.inner {
		border: 5px solid #F8FAFA;
	}
	.in {
		border: 1px solid lightgray;
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
		background-color: white;
		top: -10px;
		width: 600px;
		left: -1px;
		border-bottom: 2px solid #3D65C2;
	}
	.wallmess {
		font-family: Helvetica;
		font-weight: bolder;
		font-size: 12px;

		text-align: left;
		position: relative;
		margin-top: px;
		left: -12px;
		padding-bottom: 5px;
		top: px;
		width: 80%;
		color: #BABABA;
		top:-5px;
		line-height: 15px;
	}
	.wallmess img {
		
		position: relative;
		top:px;
	}
	.quote {

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
	.loginsign {
		color: #515F8C;
		text-align: left;
		font-size: 14px;
		position: relative;
		left: %;
		padding-bottom: 5px;
		border-bottom: 1px solid #D8DFEA;
		width: 550px;

	}
	.none {
		font-weight: bolder;
		text-align: left;
		position: relative;
		left: -4%;
		width: 500px;
		padding-bottom: 10px;
		border-bottom: 1px solid #D8DFEA;
	}
	.nimg {
		position: relative;
		display: flex;
		margin-right: auto;
		left: -25px;
		top: -17px;
	}
	.note {
		font-family:  calibri, verdana;
		
		font-size: 13px;
		text-align: left;
		position: relative;
		margin-top: -5px;
		left: 8%;
		padding-bottom: 5px;
		top: 25px;

	}
	.note a {
		text-decoration: none;
		color: #3B5998;
	}
	.note a:hover {
		text-decoration: underline;
	}
	di {
		color: #C2BEBE;
		padding-left: 5px;
		font-size: 10.5px;
	}
	.notediv {
		border-bottom: 1px solid #C2BEBE;
		width: 550px;
		overflow: auto;
		overflow: hidden;
		margin-bottom: 5px;
		position: relative;
		top:-15px;
	}
	.photo {
		min-height: 60px;
		max-height: 80px;
		min-width: 60px;
		border: 1px solid #3B5998;
		max-width: 80px;
		margin-top: -10px;
		border: 1px solid lightgray;
		padding: 5px;
		margin-bottom: 20px;
	}
	.message {
		font-family: Helvetica;
		font-weight: bolder;
		font-size: 13px;
		text-align: left;
		position: relative;
		margin-top: -5px;
		left: 8%;
		padding-bottom: 5px;
		float: left;
		color: #BABABA;
	}
	.gift {
		display: flex;
		margin-right: auto;
		height: 60px;
		margin-top: -10px;
		position: relative;
		left: 50px;
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
		.notediv {
			width: 300px;
		}
		.loginsign {
			width: 300px;
		}
		@media only screen and (max-width:500px) {
			.header {
				left: 0px;
			}
		}
	}
</style>
</html>