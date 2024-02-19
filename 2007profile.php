<?php 

include 'header1.php';

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<center>
	<div class="border">
		<div class="grayarea"></div>
		<div class="all">
			<style type="text/css">
				
			</style>
		<?php 
		if(isset($_GET['id'])) {
		$id = htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8');
		$id = mysqli_real_escape_string($conn,  $id);
		$sql = "SELECT * FROM users WHERE id = '$id'";
		$result = $conn->query($sql);
		if(mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				if($row['pfp'] === "") {
					$pfp = "pfp.jpg";
				} else {
					$pfp = "img/".$row['pfp'];
				}
					$uname = $row['name'];
        	$uname = explode(" ", $uname);
        			echo '<div class="pokediv"  id="pokediv">
        			<p class="pokethem">Poke '.$uname[0].'?</p>
        			<div class="pokeflex">
        			<img src="'.$pfp.'" class="pokepfp"  />
        			<p class="areyou">Do you wanna poke '.$row['name'].'?</p>
        			</div>
        			<div class="grayareapoke">
        			<form method="post" action="includes/poke.inc.php">
        			<input type="hidden" value="'.$_GET['id'].'" name="id">
        			<button class="cancelpoke" type="submit" name="submit" onClick="hide()">Poke!</button>
        			</form><button class="pokebutton" onClick="hide()">Cancel</button>
        			
        			
        			</div>
        			</div>';
        			echo '<div class="pokediv"  id="requestdiv">
        			<p class="pokethem">Friend '.$uname[0].'?</p>
        			<div class="pokeflex">
        			<img src="'.$pfp.'" class="pokepfp"  />
        			<p class="areyou">Do you wanna Accept '.$row['name'].' as a Friend?</p>
        			</div>
        			<div class="grayareapoke">
        			<form method="post" action="includes/friend.inc.php">
        			<input type="hidden" value="'.$row['email'].'" name="email">
        			<input type="hidden" value="'.$_GET['id'].'" name="id">
        			<button class="cancelpoke" type="submit" name="friend" onClick="hiderequest()">Accept</button>
        			</form><button class="pokebutton" onClick="hiderequest()">Cancel</button>
        			
        			
        			</div>
        			</div>';
        			echo '<div class="pokediv"  id="removefrienddiv">
        			<p class="pokethem">Remove '.$row['name'].' as Friend?</p>
        			<div class="pokeflex">
        			<img src="'.$pfp.'" class="pokepfp"  />
        			<p class="areyou" style="text-align: left;" >You are attempting to remove yourself as a friend, after this, <br>will you have to send a friend request to '.$uname[0].' to be friended <br>back.
        			<br><br>Are you sure you want to unfriend '.$uname[0].'?</p>
        			</div>
        			<div class="grayareapoke">
        			<form method="post" action="includes/friend.inc.php">
        			<input type="hidden" value="'.$_GET['id'].'" name="toid">
        			<button class="cancelpoke" type="submit" name="unfriend" onClick="hide()">Unfriend</button>
        			</form><button class="pokebutton" style="left: 35px;" onClick="hideremove()">Cancel</button>
        			
        			
        			</div>
        			</div>';
        			echo '<div class="pokediv"  id="addfrienddiv">
        			<p class="pokethem">Add '.$row['name'].' as Friend?</p>
        			<div class="pokeflex">
        			<img src="'.$pfp.'" class="pokepfp"  />
        			<p class="areyou">'.$uname[0].' will have to confirm that you are friends.</p>
        			</div>
        			<div class="grayareapoke">
        			<form method="post" action="includes/requests.inc.php">
        			<input type="hidden" value="'.$_GET['id'].'" name="toid">
        			<button class="cancelpoke" type="submit" name="submit" onClick="hide()">Send Request</button>
        			</form><button class="pokebutton" style="left: 65px;" onClick="hidefriend()">Cancel</button>
        			
        			
        			</div>
        			</div>';
        			echo '<script>
        			function hide() {
        			let popup = document.getElementById("pokediv");
					popup.classList.remove("open-pokediv");
					}
					function hiderequest() {
        			let popup = document.getElementById("requestdiv");
					popup.classList.remove("open-pokediv");
					}
					function hidefriend() {
        			let popup = document.getElementById("addfrienddiv");
					popup.classList.remove("open-pokediv");
					}
					function hideremove() {
        			let popup = document.getElementById("removefrienddiv");
					popup.classList.remove("open-pokediv");
					}
        			</script>';
				echo '<div class="left">';
				if($row['pfp'] === "") {
					$pfp = "otherpfp.jpg";
				} else {
					$pfp = "img/".$row['pfp'];
				}
				echo '<div class="pfparea">
				<img src="'.$pfp.'" class="pfp"/>';
			
				if($_SESSION['id'] === $id) {
				echo '<a href="myphotos.php?id='.$id.'" class="pfplink">View Photos of You</a>';
				echo '<a href="editstatus.php" class="pfplink">What are you doing currently</a>';
				echo '<a href="editprofile.php" class="pfplink">Edit my Profile</a>';
				} else {
					echo '<a href="myphotos.php?id='.$id.'" class="pfplink">View Photos of '.$uname[0].'</a>';
				echo '<a href="send.php?id='.$id.'" class="pfplink">Send '.$uname[0].' a message</a>';
				if($row['sex'] === "Male") {
					$gend = "Him";
				} elseif($row['sex'] === "Female") {
					$gend = "Her";
				} else {
					$gend = "Them";
				}
				$them = $row['email'];
				$us = $_SESSION['email'];
				echo '<button onClick="pokeup()" type="button" class="pfplink"><a style="left:-7px;position: relative;padding-left: 5px;">Poke '.$gend.'!</a></button>';
				
				echo '<script>
				function pokeup() {
					let popup = document.getElementById("pokediv");
					popup.classList.add("open-pokediv");
				}
				function friendup() {
					let popup = document.getElementById("addfrienddiv");
					popup.classList.add("open-pokediv");
				}
				function requestup() {
					let popup = document.getElementById("requestdiv");
					popup.classList.add("open-pokediv");
				}
				function removeup() {
					let popup = document.getElementById("removefrienddiv");
					popup.classList.add("open-pokediv");
				}
				</script>';
				}
				if($id === $_SESSION['id'] && $row['cstatus'] != "") {
					echo '<p class="ou">you are '.$row['cstatus'].'</p>';
				}
				$email = $row['email'];
				echo '</div>';
				$sql2 = "SELECT * FROM friends WHERE friend1 = '$email' OR friend2 = '$email' LIMIT 6";
				$result2 = $conn->query($sql2);
				if(mysqli_num_rows($result2) > 0 || $_SESSION['id'] === $row['id']) {
					echo '<div class="friends">
					<p class="fh">Friends</p>';
					echo '<p class="numfriend">Displaying '.mysqli_num_rows($result2).' friends</p>';
					$email = $row['email'];
					if(mysqli_num_rows($result2) > 0) {
					while($row2 = mysqli_fetch_assoc($result2)) {
						if($row2['friend2'] === $email) {
							$friend = $row2['friend1'];
						} else {
							$friend = $row2['friend2'];
						}
						$sql3 = "SELECT * FROM users WHERE email = '$friend'";
						$result3 = $conn->query($sql3);
						while($row3 = mysqli_fetch_assoc($result3)) {
							if($row3['pfp'] === "") {
								$pfp2 = "otherpfp.jpg";
							} else {
								$pfp2 = "img/".$row3['pfp'];
							}
							$uname2 = $row3['name'];
        					$uname2 = explode(" ", $uname2);
							echo '
							<div class="friend">
							<a href="profile.php?id='.$row3['id'].'"><img src="'.$pfp2.'" class="friendpfp" /></a>';
							echo '<a href="profile.php?id='.$row3['id'].'" class="friendname">'.$row3['name'].'</a>

							</div>';
						}
					}} else {
						echo '<div class="nofriends">
						Finding your real-world friends is the best way to get the most out of Retrobook.<br>
						<a href="network.php">My Network</a>
						</div>';
					}
					echo '</div>';
				}
				echo '</div>';
				//right side
				echo '<div class="right">
				<p class="name">'.$row['name'].'</p>';
				if($_SESSION['id'] === $id) {
					echo '<a href="editstatus.php" class="update">Update your status...</a>';
				}
				if($_SESSION['id'] != $id && $row['away'] != "") {
					echo '<p class="status">is '.$row['cstatus'].'</p>';
				} elseif( $row['away'] === "" && $id != $_SESSION['id']) {
					echo '<p class="status">is new to the site</p>';
				}
				
				if($row['sex'] != "") {
					echo '<div class="acci"><p class="info">Sex: </p><p class="mi">'.$row['sex'].'</p></div>';
				}
				if($row['interested'] != "") {
					echo '<div class="acci"><p class="info">Interested In: </p><p class="mi">'.$row['interested'].'</p></div>';
				}
				if($row['rstatus'] != "") {
					echo '<div class="acci"><p class="info">Relationship Status: </p><p class="mi">'.$row['rstatus'].'</p></div>';
				}
				if($row['lookingfor'] != "") {
					echo '<div class="acci"><p class="info">Looking For: </p><p class="mi">'.$row['lookingfor'].'</p></div>';
				}
				if($row['bday'] != "") {
					echo '<div class="acci"><p class="info">Birthday: </p><p class="mi">'.$row['bday'].'</p></div>';
				}
			
				echo '<div class="information">
				<p class="inform">Information';
				if(isset($_GET['id']) && $row['id'] === $_SESSION['id']) {
					echo '<a class="editpro" href="editprofile.php">edit</a>';
				}
				echo '</p></div>';
				echo '<div class="majflex">Contact Info'; if(isset($_GET['id']) && $row['id'] === $_SESSION['id']) { echo '<a class="editmaj" href="editprofile.php"> [ edit ]</a>'; }echo '</div>';
				echo '<div class="pin"><p class="pset">Email:</p><p class="pinfo">'.$row['email'].'</p></div>';
				if($row['websites'] != "") {
				echo '<div class="pin"><p class="pset">Website:</p><p class="pinfo"><a>'.$row['websites'].'</a></p></div>';
				}
				
				if($row['interests'] === "" && $row['pviews'] === "" && $row['favbook'] === "" && $row['favtvshows'] === "" && $row['music'] === "" && $row['favmovies'] === "" && $row['favquotes'] === "" && $row['aboutme'] === "") {
					
				} else {
				echo '<div class="majflex" style="margin-top: 20px;">Personal Info'; if(isset($_GET['id']) && $row['id'] === $_SESSION['id']) { echo '<a class="editmaj" href="editprofile.php"> [ edit ]</a>'; }echo '</div>';
				}
			
				if($row['interests'] != "") {
					echo '<div class="pin"><p class="pset">Interests:</p><p class="pinfo"><a>'.$row['interests'].'</a></p></div>';
				}
				if($row['pviews'] != "") {
					echo '<div class="pin"><p class="pset">Politcal Views:</p><p class="pinfo"><a>'.$row['pviews'].'</a></p></div>';
				}
			
				if($row['aboutme'] != "") {
					echo '<div class="pin"><p class="pset">About Me:</p><p class="pinfo">'.$row['aboutme'].'</p></div>';
				}
				
				echo '<div  class="information">
				<p class="inform" style="margin-top: 20px; '.$btop.'">Education and Work';
				if(isset($_GET['id']) && $row['id'] === $_SESSION['id']) {
					echo '<a class="editpro" href="editprofile.php">edit</a>';
				}
			
				echo '<div class="wallform" style="'.$wtop.'"><p class="thewall">The Wall</p>';
				$sql5 = "SELECT * FROM profilewall WHERE toid = '$id' ORDER BY id DESC";
				$result5 = $conn->query($sql5);
				if($row['id'] === $_SESSION['id']) {
					$wr = "Write something on your own wall..";
				} else {
					$wr = "Write something on ".$uname[0]."'s wall..";
				}
				echo '<p class="displaywall">Displaying '.mysqli_num_rows($result5).' wall posts.</p>';
				echo '<div class="formpart">
				<form method="post" action="includes/wall.inc.php" enctype="multipart/form-data">
				<textarea class="walltextarea" name="comment" placeholder="'.$wr.'"></textarea><br>
				<input type="hidden" name="tid" value="'.$id.'"/>
				<div class="wallflex"><p style="display: inline-block;" class="attach">Attach:</p>
				 <label for="file-input">
   				 <img style="display: inline-block;" class="attachpic" src="retro/photos.gif"/>
  				</label>
  				<input style="display: none;" id="file-input" name="file" type="file" /></div>
				<div class="wallline"></div>
				<button type="submit" name="submit" class="post">Post</button>
				</form></div>';
				echo '</div>';

				while($row4 = mysqli_fetch_assoc($result5)) {
					$fid = $row4['fromid'];
					$sql6 = "SELECT * FROM users WHERE id = '$fid'";
					$result6 = $conn->query($sql6);
					if(mysqli_num_rows($result6) > 0) {
						while($row5 = mysqli_fetch_assoc($result6)) {
							if($row5['pfp'] === "") {
								$pfp = "otherpfp.jpg";
							} else {
								$pfp = "img/".$row5['pfp'];
							}
							echo '<div class="comment"><div class="leftwall"><img src="'.$pfp.'" onerror="this.onerror=null; this.src=\'otherpfp.jpg\'" class="wallpfp"/></div>
							<div class="rightwall"><div class="wrotearea"><p class="wrote"><a href="profile.php?id='.$row4['fromid'].'">'.$row4['fromname'].'</a> wrote</p>
							<p class="at">at '.$row4['date'].'</p>
							</div>
							<p class="wallcomment">'.$row4['message'].'</p>';
						
							echo '<p class="wallinks"><a href="profile.php?id='.$row4['fromid'].'">write on their wall</a>'; 
							if($row4['fromid'] === $_SESSION['id'] || $row4['toid'] === $_SESSION['id']) {
								echo ' - <a href="deletewall.inc.php?id='.$row4['id'].'">delete</a>';
							}
							echo '</p>
							</div>
							</div>
							';
						}
					} 
				}

				echo '</div>';

			}
		} else {
			echo '<p class="nfo">User not found. </p>';
		}
		} else {
			echo '<p class="nfo">User not found. </p>';
		}
		?>
	</div>
	</div>
</center>
<style type="text/css">
		.border {
		border: 1px solid #B7B7B7;
		min-height: 200px;
		width: 650px;
		position: relative;
		left: 72px;
		background: white;
		top: -19px;
		white-space: nowrap;
		display: inline-block;
	}
	.grayarea {
		border-bottom: 1px solid #EEEEEE;
		background: #F9F9F9;
		height: 60px;
	}
	.all {
		position: relative;
		top: -50px;
	}
	.nfo {
		display: block;
		font-weight: bold;
		font-size: 18px;
		font-family: calibri;
		text-align: left;
		margin-left: 10px;
		color: #333333;
		margin-top: 13px;
	}
	.left {
		float: left;
		
		
		width: 250px;
		
		margin-left: 5px;
	}
	.pfp {

	}
	.right {
		float: left;
		
		white-space: normal;
		width: 380px;
		margin-left: 10px;
		
	}
	.name {
		text-align: left;
		color: #595959;
		font-weight: bolder;
		font-size: 17px;
		font-family:  calibri,Helvetica,Tahoma,Verdana,sans-serif;
		vertical-align: text-top;
		position: relative;
		margin-top: 0px;
	}
	.update {
		display: block;
		text-align: left;
		position: relative;
		top: -16px;
		color: #38529B;
		text-decoration: none;
		font-size: 11px;
	}
	.update:hover {
		text-decoration: underline;
	}
	.status {
		display: block;
		text-align: left;
		position: relative;
		top: -16px;
		color: #AFAFAF;
		font-size: 12px;
	}
	.pfparea {
		width: 245px;
	}
	.pfp {
		position: relative;
		min-width: 80px;
		max-width: 245px;
		display: inline;
		
	}
	.pfplink {
		color: #4C6DA8;
		font-size: 12px;
		width: 235px;
		white-space: normal;
		text-decoration: none;
		padding-bottom: 5px;
		text-align: left;
		border: 0px solid;
		border-bottom: 1px solid lightgray;
		display: block;
		background: white;
		text-align: left;
		padding-top: 2px;
		padding-left: 5px;
		cursor: pointer;
	}
	.pfplink:hover {
		background: #3B5998;
		color: white;
	}
	.ou {
		display: block;
		display: inline-block;
		text-align: left;
		
		display: flex;
		font-size: 11px;
		white-space: normal;

	}
	.fh {
		background: #DEE6EE;
		position: relative;
		z-index: 5;
		text-align: left;
		border-top: 1px solid #3B5998;
		width: 230.5px;
		padding: 4px;
		font-weight: bolder;
		font-size: 12px;
		padding-left: 7px;
		color: #3B5998;
	}
	.flexstatusy {
		width: 250px;
		float: left;
		background: black;
	}
	.statusimg {
		display: inline-block;
		margin-left: -20px;
	}
	.numfriend {
		background:#F1F1F1 ;
		position: relative;
		z-index: 5;
		text-align: left;
		border-top: 1px solid #DDDCE0;
		width: 235px;
		padding: 2px;
		margin-top: -13px;
		font-size: 13px;
		padding-left: 5px;
		color: #3B5998;
	}
	.friends {
		
		white-space: normal;
	}
	.friend {
		float: left;
		margin-right: auto;
		margin-left: auto;
		justify-content: center;
		height: 80px;
		position: relative;
		left: 20px;
		right: 0;
		margin-top: -3px;
		display: block;
		width: 60px;
		margin: 5px;

		text-align: left;
		margin-top: -5px;
	}
	.friendname {
		color: #3B5998;
		text-decoration: none;
		font-size: 10px;
		line-height: 10px;
		height: 15px;
		text-align: center;
		display: block;
		width: 40px;
		position: relative;
		top: 2px;
	}
	.friendname:hover {
		text-decoration: underline;
	}
	.friendpfp {
		display: flex;
		max-width: 60px;
		justify-content: center;
		min-height: 30px;
		max-height: 55px;
	}
	
	.pokethem {
		position: relative;
		top: -15px;
		border-bottom: 1px solid #3B5998;
		text-align: left;
		font-weight: bolder;
		background: #6D84B4;
		font-size: 14px;
		padding: 4px;
		color: white;
		border: 1px solid #3B5998;
	}
	.pokeflex {
		
		float: left;
	
	}
	.pokepfp {
		min-width: 80px;
		max-width: 100px;
		min-height: 50px;
		max-height: 100px;
		position: relative;
		left: 20px;
		top: -13px;
			float: left;
	}
	.areyou {
		vertical-align: text-top;
		display: block;
		position: relative;
		left: 30px;
		font-size: 10px;
	}
	.grayareapoke {
		border-top: 1px solid #E8E8E8;
		background: #F2F2F2;
		height: 30px;

		margin-top: 115px;

	}
	.pokebutton {
		float: right;
		border-style: solid;
    border-top-width: 1px;
    border-left-width: 1px;
    border-bottom-width: 1px;
    border-right-width: 1px;
    border-top-color: #D9DFEA;
    border-left-color: #D9DFEA;
    border-bottom-color: #8F8E8F;
    border-right-color: #8F8E8F;
    background-color: white;
    color: black;
    height: 18px;
   position: relative;
   left: 30px;
   top: 5px;
   display: block;
    font-size: 11px;
    cursor: pointer;
	}
	.cancelpoke {
		float: right;
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
    font-size: 11px;
    font-family: "lucida grande", tahoma, verdana, arial, sans-serif;
    text-align: center;
    display: block;
     margin-left: -5px;
      position: relative;
   left: -65px;
   top: 5px;
   cursor: pointer;
	}
	.pokediv {
		position: absolute;
		left: 0;
		margin-left: 100px;
		min-height: 100px;
		border: 1px solid lightgray;
		right: 0;
		width: 60%;
		z-index: 8;
		background: white;
		box-shadow: 5px 5px darkgray;
		visibility: hidden;
	}
	.open-pokediv {
		visibility: visible;
	}
	.nofriends {
		text-align: left;
		font-size: 12px;
		background: #FFF5C3;
		padding: 4px;
		padding-top: 20px;
		height: 50px;
		width: 94%;
		margin-top: -13px;
		border-bottom: 4px solid #FFF2A2;
		padding-left: 5px;
	}
	.nofriends a {
		font-weight: bolder;
		color: #3B5998;
		text-decoration: none;
		display: block;
		margin-top: 5px;
	}
	.nofriends a:hover {
		text-decoration: underline;
	}
	.information {
		text-align: left;
	}
	.inform {
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
	.editpro {
		color: #3B5998;
		text-align: right;
		display: block;
		margin-left: auto;
		text-decoration: none;
		margin-right: 15px;
	}
	.editpro:hover {
		text-decoration: underline;
	}
	.acci {
		text-align: left;
		position: relative;
		top:24px;
		margin-top: -25px;
	}
	.mi {
		text-align: left;
		font-family: ;
		font-size: 13px;
		font-weight: 15px;
		vertical-align: text-top;
		color: #4C6DA8;
		line-height: 15px;
		display: inline-block;
		width: 250px;
		position: relative;
		top:-8px;
	}
	.info {
		text-align: left;
		font-family: ;
		font-size: 13px;
		font-weight: ;
		line-height: 7px;
		color:#C0C0C0;
		display: inline-block;
		width: 130px;
		
	}
	.info gi {
		position: relative;
		left: 50px;
		color: #4C6DA8;
	}
	.majflex {
		text-align: left;
		font-size: 13px;
		margin-left: 5px;
		font-weight: bolder;
		font-family: calibri, verdana;

		color: #333333;
	}
	.editmaj {
		color: lightgray;
		text-decoration: none;
		font-weight: normal;
	}
	.editmaj:hover {
		text-decoration: underline;
	}
	.pin {
		margin-top: -20px;
		text-align: left;
		padding-left: 5px;
		font-size: 12px;
		font-family: calibri, verdana;
		position: relative;
		top:20px;
		white-space: pre-wrap;
	}
	.pset {
		color: #B8B8B8;
		width: 130px;
		
		font-family: calibri, verdana;
		display: inline-block;
	}
	.pinfo {
		color: black;
		display: inline-block;
		width: 240px;
		vertical-align: text-top;
		margin-top: -0px;
	}
	.pinfo a {
		color: #4C6DA8;
	}
	.wallform>input {
  display: none;
}
.thewall {
	background: #D8DEEA;
    font-size: 13px;
    font-weight: bolder;
    padding: 2px;
    border-top: 1px solid #3B5998;
    color: #3B5998;
    font-family: calibri;
    display: flex;
    padding-left: 7px;
    border-bottom: 1px solid #DDDCE0;
}
.displaywall {
	background: #F1F1F1;
	font-size: 11px;
	padding:3px;
	padding-left: 8px;
	margin-top: -13px;
}
.wallform {
	background: #FAF9FA;
	border-bottom: 1px solid lightgray;
	margin-top: 35px;
	display: block;
}
.walltextarea {
	font-size: 12px;
	font-family: calibri, verdana;
	width: 90%;
	margin-left: 3.7%;
	padding:5px;
	border-top: 1px solid lightgray;
	border-left:1px solid gray;
	border-bottom: 1px solid #3B5998;
	border-right: 1px solid gray;
	height: 50px;
}
.attach {
	color: #B3B1B3;
	font-size: 11px;
	margin-left: 15px;
	font-weight: bold;
	margin-top: -5px;
}
.attachpic {
	position: relative;
	top:7px;
	margin-left: 5px;
}
.post {
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
    font-size: 11px;
    margin-left: 15px;
    width: 70px;
    padding:3px;
    font-family: "lucida grande", tahoma, verdana, arial, sans-serif;
    text-align: center;
    margin-top: 5px;
    margin-bottom: 5px;
}
.wallline {
	border-bottom: 1px solid darkgray;
	width: 93%;
	margin-left: 3.7%;
}
.wallpfp {
	min-height: 60px;
	max-height: 66px;
	min-width: 45px;
	max-width: 50px;
}
.leftwall {
	display: inline-block;
	float: left;
	position: relative;
	top: 9px;

}
.rightwall {
	display: inline-block;
	width: 320px;
}
.wrotearea {
	background: #F7F7F7;
	vertical-align: top;
	height: 40px;
	position: relative;
	top:-18px;
	width: 328px;
	left:3px;
	margin-top: 25px;
	display: block;
	border-top: 1px solid #8096BB;
	border-bottom: 1px solid darkgray;
}
.wrote {
	font-size: 12px;
	vertical-align: top;
	display: block;
	position: relative;
	left:5px;
	top:-5px;
}
.wrote a {
	font-weight: bolder;
	text-decoration: none;
	color: #395C9E;
}
.wrote a:hover {
	text-decoration: underline;
}
.comment {
	position: relative;
	top:10px;
}
.at {
	font-size: 9px;
	position: relative;
	left: 5px;
	top:-15px;
}
.wallcomment {
	margin-top: -8px;
	font-size: 12px;
	padding-left: 10px;
}
.wallinks {
	color: #395C9E;
	font-size: 11px;
	padding-left: 10px;
}
.wallinks a {
	color: #395C9E;
	text-decoration: none;
}
.wallinks a:hover {
	text-decoration: underline;
}
.wallpic {
	max-height: 240px;
	min-height: 50px;
	max-width: 300px;
	min-width: 50px;
	padding-left: 10px;
}
</style>
</body>
</html>