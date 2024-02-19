<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Theretrobook | </title>
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
<div class="welcome">
	<p class="welcometext">Friend game</p>
	<div class="border">
		<h2 class="loginsign"></h2>
		<?php 
		$uid = $_SESSION['email'];
		$sql = "SELECT * FROM friendgame WHERE email = '$uid'";
		$result = $conn->query($sql);
		echo '<div class="options">
		<a style="text-decoration: none;" href="friends.php?id='.$_SESSION['id'].'"><div class="option" style="background: white; color: #3B5998;">Friends List</div>

		</a>&nbsp;<a style="text-decoration: none;background: white; color: #3B5998;" href="friendfinder.php"><div class="option" style="text-decoration: none;background: white; color: #3B5998;">Friend Finder</div></a>

		&nbsp;<a style="text-decoration: none;" href="friendgame.php"><div class="option" style="">Friend Game</div></a></a>
		</div>';
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				if($row['score'] != "") {
					echo "<p class='score'>".$row['score']."</p>";
				}
			}
		} else {
			$sql2 = "INSERT INTO friendgame (email) VALUES ('$uid')";
			$result2 = $conn->query($sql2);
		}
		$sql = "SELECT * FROM friends WHERE friend1 = '$uid' AND friend2 != '$uid'";
		$result = $conn->query($sql);
		if(mysqli_num_rows($result) >= 10) {
	$array = array();

while($row = mysqli_fetch_assoc($result)) {
   $array[] = $row;

}

$value = $array[array_rand($array)];
$value2 = $array[array_rand($array)];
$value3 = $array[array_rand($array)];
$one =  $value['friend2'];
$sql2 = "SELECT * FROM users WHERE email = '$one'";
$result2 = $conn->query($sql2);
while($row = mysqli_fetch_assoc($result2)) {

$two = $value2['friend2'];

$sql3 = "SELECT * FROM users WHERE email = '$two'";
$result3 = $conn->query($sql3);
while($row2 = mysqli_fetch_assoc($result3)) {


$three = $value3['friend2'];

$sql4 = "SELECT * FROM users WHERE email = '$three'";
$result4 = $conn->query($sql4);
while($row4 = mysqli_fetch_assoc($result4)) {


$array2 = array($row['email'], $row2['email'], $row4['email']);
$arrayinfo = array_rand($array2);
echo '<br>';
$friend = $array2[$arrayinfo];
echo '<p class="which">Which one of your friends has';
$sql5 = "SELECT * FROM users WHERE email = '$friend'";
$result5 = $conn->query($sql5);
while($row5 = mysqli_fetch_assoc($result5)) {
$array5 = array(0 => $row5['aboutme'], 1 => $row5['music'], 2 => $row5['interests']);
$array5i = array_rand($array5);
echo '<br><gi>"</gi> '.$array5[$array5i].' <gi>"</gi><br>';
if($array5[$array5i] === $array5[0]) {
	echo 'Listed in their <b>About me?</b>';
	$ho = "aboutme";
}
if($array5[$array5i] === $array5[1]) {
	echo 'Listed in their <b>Music?</b>';
	$ho = "music";
}
if($array5[$array5i] === $array5[2]) {
	echo 'Listed in their <b>Interests?</b>';
	$ho = "interest";
}
echo '<br>';
if($row['pfp'] === "") {
	$pfp = "default.jpg";
} else {
	$pfp = "img/".$row['pfp']."";
}
if($row2['pfp'] === "") {
	$pfp2 = "default.jpg";
} else {
	$pfp2 = "img/".$row2['pfp']."";
}
if($row4['pfp'] === "") {
	$pfp3 = "default.jpg";
} else {
	$pfp3 = "img/".$row4['pfp']."";
}
echo '<div class="friends">';
echo '<a href="friendscore.php?h='.$ho.'&s='.$row['id'].'&m='.$array5[$array5i].'"><div class="friend">
<img src="'.$pfp.'" class="pfp"/>
<p class="fname">'.$row['name'].'</p></div></a>';
echo '<a href="friendscore.php?h='.$ho.'&s='.$row2['id'].'&m='.$array5[$array5i].'"><div class="friend"><img src="'.$pfp2.'" class="pfp"/><p class="fname">'.$row2['name'].'</p></div></a>';
echo '<a href="friendscore.php?h='.$ho.'&s='.$row4['id'].'&m='.$array5[$array5i].'"><div class="friend"><img src="'.$pfp3.'" class="pfp"/><p class="fname">'.$row4['name'].'</p></div></a>';
echo '</div>';
}}}
echo '<a href="friendgame.php" class="next">next question</a>';
}} else {
	echo '<div class="sorry"><p class="smessage">Sorry, you have too few friends to play. You must have at least ten friends to play.</p>
	<p class="check">Check out <a href="global.php">browse</a> - it\'s a great way to make new friends.</p></div>';
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
		margin-top: -33px;
		left: -px;
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
	gi {
		color: lightblue;
		font-size: 19px;
		font-weight: bolder;
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
	.which {
		font-family:  Helvetica,Tahoma,Verdana;
		line-height: 35px;
		position: relative;
		top: -30px;
	}
	.friend {
		display: inline-block;
		border: 1px solid #506fa6;
		width: 150px;
		margin-left: 30px;
		position: relative;
		left: -20px;
		height: 300px;
		margin-bottom: -12px;
		top: -30px;
		 vertical-align: top; /* here */
	}
	.fname {
		position: absolute;
		bottom: 0;
		font-size: 11px;
			font-family:  Helvetica,Tahoma,Verdana;
		color: #6D84B4;
		font-weight: bolder;
		border-bottom: 1px solid lightgray;
		width: 140px;
		margin-left: 5px;
		text-align: left;
		padding-bottom: 5px;
	}
	.friends {
		white-space: nowrap;
	}
	.pfp {
		display: inline-block;
		max-width: 140px;
		position: relative;
		top: 20%;
		max-height: 150px;
	}
	.next {
		position: relative;
		right: 5%;
		text-align: right;
		display: flex;
		display: block;
		font-size: 12px;
		position: relative;
		top: -10px;
		margin-left: auto;
	}
	.score {
		margin-top: -30px;
		position: relative;
		top: 40px;
		font-size: 40px;
		color: #387a43;
		font-family:  Helvetica,Tahoma,Verdana;
	}
	.options {
		display: flex;
		border-bottom: 1px solid #3B5998;
		margin-top: -10px;

	}
	.option {
		background-color: #3B5998;
		color: white;
		padding: 5px;
		font-size: 12px;
		position: relative;
		left: 10px;
		display: inline-block;
	}
	.option a {
		text-decoration: none;
	}
	a .option {
		text-decoration: none;
	}
	.sorry {
		border: 1px solid #D14C1D;
		background-color: #FDF0ED;
			font-family:  Helvetica,Tahoma,Verdana;
			text-align: left;
			width: 90%;
			margin-top: 20px;
	}
	.sorry p {
		font-weight: bolder;
		margin-left: 5%;
	}
	.check {
		font-size: 13px;
		font-family:  Helvetica,Tahoma,Verdana;
		font-weight: normal;
	}
	.check a {
		color: #DB7962;
		text-decoration: none;
	}
	.check a:hover {
		text-decoration: underline;
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
				left: -100px;
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
		.pfp {
			max-width: 100px;
		position: relative;
		top: 20%;
		max-height: 110px;
		}
		.friend {
			height: 250px;
			width: 110px;
			margin-left: 20px;
			position: relative;
			left: -10px;
			margin-bottom: 10px;
		}
		.fname {
			border-bottom: 0px solid;
		}
	}
</style>
</html>