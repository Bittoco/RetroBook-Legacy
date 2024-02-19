<?php 

include 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Retrobook - Invite Friends</title>
</head>
<body>
<center>
	<div class="border">
		<div class="top"><img src="retro/invite.png" class="invite"/><p class="text">Invite your Friends to Retrobook</p></div>
		<form method="post" action="inviteemail.inc.php">
			<div class="flex"><p class="info">Email Address:</p><input type="email" name="email" class="input"/></div>
			<div class="flex"><p class="info">Subject:</p><input type="text" name="subject" value="Check out this 2007 Social Network Clone!" class="input"/></div>
			<div class="flex"><p style="margin-left: 55px;" class="info">Message:</p><textarea name="message" style="margin-left: 15px;left: -5px;" class="messagearea">Check out Retrobook! Heres my Retrobook Profile: https://theretrobook.net/profile.php?id=<?php echo $_SESSION['id'];?> </textarea></div>
			<div class="flex2"><button class="send" name="submit" type="submit">Send</button>
		</form>
		<a href="home.php"><button class="cancel" name="submit" type="submit">Cancel</button></a></div>
	</div>
	<style type="text/css">
		.border {
		border: 1px solid #B7B7B7;
		min-height: 200px;
		width: 650px;
		position: relative;
		left: 72px;
		background: white;
	top: -19px;
	}
	.top {
		
		overflow: auto;
		overflow: hidden;
		
		white-space: normal;
		border-bottom: 1px solid lightgray;
		width: 90%;

		text-align: left;
	}
	.invite {
		display: inline-block;
		position: relative;
		top:17px;


	}
	.text {
		display: inline-block;
		position: relative;
		font-weight: bold;
		margin-left:10px;
		color: #333333;
		font-size: 13px;
		margin-bottom: 20px;
		
	}
	.flex {
		position: relative;
		top:20px;
		margin-left: -30px;
	}
	.info {
		font-size: 12px;
		text-align: right;
		display: inline-block;
		color:  #333333;
		width: 80px;

		vertical-align: top;
	}
	.input {
		border:1px solid lightgray;
		padding:3px;
		width: 200px;
		position: relative;
		top:8px;
		margin-left: 10px;
	}
	.messagearea {
		border:1px solid lightgray;
		padding:3px;
		width: 250px;
		height: 150px;
		font-family: calibri;
		position: relative;
		margin-bottom: 30px;
	}
	.send {
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
    font-size: 12px;
    font-family: "lucida grande", tahoma, verdana, arial, sans-serif;
    text-align: center;
   height: 22px;
    width: 80px;
    position: relative;
    z-index: 5;
	}
	.flex2 {
		margin-left: 330px;
		overflow: auto;
		margin-bottom: 20px;
	}
	.cancel {
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
   	height: 22px;
    position: relative;
    overflow: auto;
    font-size: 12px;
   
	}
	</style>
</center>
</body>
</html>