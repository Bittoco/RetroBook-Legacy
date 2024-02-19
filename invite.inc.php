<?php 
include 'header.php';
include 'dbh.inc.php';
if(isset($_GET['id']) && $_GET['gid']) {
	$gid = htmlspecialchars($_GET['gid'], ENT_QUOTES, 'UTF-8');
 	$gid = mysqli_real_escape_string($conn, $gid);
 	$id = htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8');
 	$id = mysqli_real_escape_string($conn, $id);
 	$fid = $_SESSION['id'];
 	$fid = htmlspecialchars($fid, ENT_QUOTES, 'UTF-8');
 	$fid = mysqli_real_escape_string($conn, $fid);
 	$fname = $_SESSION['name'];
 	$sql = "SELECT * FROM groups WHERE id = '$gid'";
 	$result = $conn->query($sql);
 	$resultCheck = mysqli_num_rows($result);
 	if($resultCheck > 0) {
 		while($row = mysqli_fetch_assoc($result)) {
 			$groupname = $row['name'];
 			$sql2 = "INSERT INTO invites (fromid, fromname, groupid, groupname, toid) VALUES ('$fid', '$fname', '$gid', '$groupname', '$id')";
 			$result2 = $conn->query($sql2);
 			header("location: invitefriends.php?gid=".$gid."&invitesent!");
 			exit();
 		}
 	} else {
 		header("location: invitefriends.php");
 		exit();
 	}
} if(isset($_GET['d'])) {
	$id = $_GET['d'];
	$sql = "SELECT * FROM invites WHERE id = '$id'";
	$result = $conn->query($sql);
	if(mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			if($row['toid'] != $_SESSION['id']) {
				header("location: home.php");
			exit();
			} else {
			$sql = "DELETE FROM invites WHERE id = '$id'";
			$result = $conn->query($sql);
			header("location: home.php");
			exit();
			}
		}	
	} else {
		header("location: home.php");
			exit();
	}
}
if(isset($_GET['di'])) {
	$id = $_GET['di'];
	$sql = "SELECT * FROM invites WHERE id = '$id'";
	$result = $conn->query($sql);
	if(mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			if($row['toid'] != $_SESSION['id']) {
				header("location: invite.php");
			exit();
			} else {
			$sql = "DELETE FROM invites WHERE id = '$id'";
			$result = $conn->query($sql);
			header("location: invite.php");
			exit();
			}
		}	
	} else {
		header("location: invite.php");
			exit();
	}
}

if(isset($_POST['insubmit'])) {
	$subject = htmlspecialchars($_POST['subject'], ENT_QUOTES, 'UTF-8');
	$subject = mysqli_real_escape_string($conn,  $subject);
	$message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');
	$message = mysqli_real_escape_string($conn,  $message);
	$email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
	$email = mysqli_real_escape_string($conn,  $email);
	if(empty($email)) {
		header("location: invite.php?e=1");
		exit();
	}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {     	
     	header("location: invite.php?e=2");
     	exit();
     } 
      $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
     $msg = $message;
     $msg = wordwrap($msg,70);
     $your = $_SESSION['name'];
     $msg = "<div class='header' style='background: #3B5998;width: 450px;border-radius: 10px;'><img height='40px;' style='position: relative; margin-top: 5px;' src='https://theretrobook.net/logo.png'/></div>" . '<p style="margin-top: 10px;font-family: calibri;font-weight: bold;">'.$msg.'</p>';
     $headers .= 'From: '.$_SESSION['email'].' ' . "\r\n";
     mail($email,$subject,$msg, $headers);
     
     $sql = "INSERT INTO emails (toe, frome, message, subject) VALUES ('$email', '$your', '$message', '$subject')";
     $result = $conn->query($sql);
    header("location: invite.php?e=3");
	exit();

}
header("location: invite.php?e=3");
	exit();