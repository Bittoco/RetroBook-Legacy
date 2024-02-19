<?php 
include 'dbh.inc.php';
include 'header.php';
if(isset($_POST['submit'])) {
	$subject = htmlspecialchars($_POST['subject'], ENT_QUOTES, 'UTF-8');
	$subject = mysqli_real_escape_string($conn,  $subject);
	$message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');
	$message = mysqli_real_escape_string($conn,  $message);
	$email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
	$email = mysqli_real_escape_string($conn,  $email);
	if(empty($email)) {
		header("location: ../invite.php?e=1");
		exit();
	}
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {     	
     	header("location: ../invite.php?e=2");
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
    
    header("location: ../inviteemail.php?e=3");
	exit();

}