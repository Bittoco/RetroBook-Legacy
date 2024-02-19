<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="icon" type="image/x-icon" href="favicon.jpg">
</head>
<body>
	<?php 
	ob_start();
	session_start();
	include 'includes/dbh.inc.php';
	  if (isset($_SESSION['name'])) {
        	$fname = $_SESSION['name'];
        	$name = explode(" ", $fname);
        }

	?>
	<center>
<div class="blue">
	<a href="index.php"><img src="logo.png" class="logo"/></a>
	<?php 
	if(isset($_SESSION['email'])) {
		
		echo '<a href="includes/logout.inc.php" class="link">logout</a>
	<a href="signup.php" class="link">privacy</a>
	<a href="login.php" class="link">account</a>
	<a href="login.php" class="link">home</a>';
	echo '<div class="thelinks"><a href="profile.php?id='.$_SESSION['id'].'" class="biglinks">Profile</a> ';
		echo '<a href="editprofile.php" class="small-links">edit</a>&nbsp;&nbsp;&nbsp;
		<a href="" class="biglinks">Friends</a> &nbsp;&nbsp;&nbsp;
		<a href="networks.php" class="biglinks">Networks</a> &nbsp;&nbsp;&nbsp;';
		$email = $_SESSION['email'];
		$sql2 = "SELECT * FROM messages WHERE toemail = '$email' AND status = 'Unread'";
		$result2 = $conn->query($sql2);
		if(mysqli_num_rows($result2) > 0) {
			echo '<a href="inbox.php" class="biglinks">Inbox ('.mysqli_num_rows($result2).')</a> ';
		} else {
		echo '<a href="inbox.php" class="biglinks">Inbox</a> ';
		}
		echo '</div>';
	} else {
	echo '<a href="tour.php" class="link">tour</a>
	<a href="signup.php" class="link">sign up</a>
	<a href="login.php" class="link">login</a>';
	}
	if(isset($_SESSION['email'])) {
		$top = "top: 12px;";
	} else {
		$top = "top: 15px;";
	}
	?>
	<div class="blueline"></div>
</div>
<?php 
	include 'loginarea.php';
?>
</center>
<style>
	body {
		font-family: Tahoma,Verdana,Segoe,sans-serif;
	}
	.blue {
		background: #3B5998;
		height: 55px;
		width: 770px;
		display: inline-block;
	}
	.logo {
		height: 29px;
		width: 120px;
		position: relative;
		<?php 
		echo $top;
		?>
		margin-top: 4px;
		display: flex;
		margin-right: auto;
	}
	.link {
		color: #B9BCCB;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		margin-left: 10px;
		font-size: 11px;
		float: right;
		position: relative;
		right: 17px;
		top: -20px;
		text-decoration: none;
		cursor: pointer;
		z-index: 5;
	}
	.link:hover {
		color: white;
		text-decoration: underline;
	}
	.blueline {
		position: relative;
		top: 15px;
		height: 6px;
		background: #6D84B4;
	}
	.biglinks {
		position: relative;
		z-index: 5;
		font-weight: bolder;
		color: white;
		font-size: 16px;
		padding:3px;
		text-decoration: none;
		font-family:  Calibri;
	}
	.biglinks:hover {
		background: #6E86B9;
		color: white;
		padding:3px;
	}
	.thelinks {
		display: block;
		text-align: left;
		margin-top: -23px;
		position: relative;
		left: 135px;
		top: -1px;
	}
	.small-links {
		color: #7189B9;
		font-size: 14px;
		font-family:  Calibri;
		text-decoration: none;
		margin-left: 10px;
	}
	.small-links:hover {
		text-decoration: underline;
		color: white;
	}
</style>
</body>
</html>