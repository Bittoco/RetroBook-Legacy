<?php 

if(isset($_SESSION['name'])) {
	$name = htmlspecialchars(' '.$_SESSION['name'].'', ENT_QUOTES, 'UTF-8');
	$name = mysqli_real_escape_string($conn,  $name);
} else {
	$name = "";
}
echo '<p class="title"><img src="img/ilike.png" class="ilike"/>';
$fname = $_SESSION['name'];
$name = explode(" ", $fname);
if(isset($_SESSION['name'])) {
echo '&nbsp;Hello '.$name[0].', Welcome to iLike!';
} else {
echo '&nbsp;Hello, Welcome to iLike!';
}
echo '</p>';
echo '<div class="left2">
<div class="box"><div class="top"><img src="img/ilike2.png" class="logo2"/><i class="discover">Discover your friends music tastes</i></div><img src="img/ilikepics.png" class="pic" /></div>
</div>';
echo '<div class="right">'; 
echo '<div class="add2">';
if(isset($_SESSION['email'])) {
$email = $_SESSION['email'];
$sql = "SELECT * FROM userapps WHERE name = '$email' AND appname = 'iLike'";
$result = $conn->query($sql);
if(mysqli_num_rows($result) > 0) {
	echo '<p class="added"><ai>This application has been added to your account.</ai></p>';
} else {
	$id = htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8');
	$id = mysqli_real_escape_string($conn,  $id);
	echo '<p class="added"><ai>This application can be added to Retrobook account.</ai></p>';
	echo '<form method="post" action="addilike.inc.php">
	<input type="hidden" name="id" value="'.$id.'"/>
	<button type="submit" name="subscribe" class="addto">Add application</button>
	</form>';
}
} else {
	echo '<p class="added"><ai>Login to add this to your profile.</ai></p>';
}
echo '</div>';
echo '<div class="about">';
$sql2 = "SELECT * FROM userapps WHERE appname = 'iLike'";
$result2 = $conn->query($sql2);
echo 'About this application <br><br><gi>Users:</gi><br>'.mysqli_num_rows($result2).'<br><br><gi>Categories</gi><br>Music, Video<br><br><gi>This application was created by Retrobook, and no way associated with the original iLike</gi>';
echo '</div>';
echo '<br><br>';
echo '</div>';

?>
<style type="text/css">
	.pic {
		
	}
	.title {
		font-weight: bold;
		font-size: 13px;
		position: relative;
		font-family: Helvetica,Tahoma,Verdana;
		margin-left: 5px;
	}
	.ilike {
		position: ;
		border-radius: 5px;
		top: 5px;
		margin-left: 5px;
		height: 25px;
	}
	.left2 {
		display: flex;
		float: left;
		width: 60%;
	}
	.appdiv {
		overflow: auto;
	}
	.box {
		border: 1px solid gray;
		width: 100%;
		float: left;
		margin-left: 10px;
	}
	.border {
		padding-bottom: 5px;
	}
	.top {
		display: flex;
		border-bottom: 1px solid gray;
		background: #F9F9F9;
	}
	.logo2 {
		height: 25px;
		position: relative;
		top: 3px;
		margin-left: 5px;
	}
	.discover {
		padding: 5px;
		position: relative;
		left: 15px;
		color: gray;
		text-align: left;
	}
	.right {
		float: right;
		width: 38%;
	}
	.add {
		margin-left: 5px;
		font-size: 15px;
	}
	.add2 {
		border-top: 2px solid #CAD4E5;
		background: #E6EAF2;
		text-align: text;
		padding-left: 5px;
		font-size: 13px;
		margin-right: 12px;
	}
	.add2 ai {
		position: relative;
		top: -5px;
		font-family: calibri;
		font-weight: bold;
	}
	.addto {
	padding: 5px;
	font-family: calibri, Helvetica,Tahoma,Verdana,sans-serif;
	width: 130px;
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
    font-size: 13px;
    font-weight: bold;
    margin-left: 18%;
    top: -8px;
    cursor: pointer;
    position: relative;
}
.about {
	border-top: 1px solid lightgray;
	background: #F5F5F5;
	font-family: calibri;
	font-size: 13px;

	margin-top: 15px;
	font-weight: bold;
	width: 90%;
	padding: 5px;
	padding-left: 10px;
	padding-top: 10px;
}
.about gi {
	color:gray;
}
</style>