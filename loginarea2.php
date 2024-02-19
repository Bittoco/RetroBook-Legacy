<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<div class="loginarea">
	<?php 
	if(!isset($_SESSION['email'])) {
	echo '
		<p class="e1">Email:</p>
		<form method="post" action="includes/login.inc.php">
		<input type="text" class="einput" name="email"/>
		<p class="e1">Password:</p>
		<input type="password" class="einput" name="password"/><br>
		<button type="submit" name="submit" class="login1">Login</button>
	</form>';
	} 
	?>
</div>
<style type="text/css">
	.loginarea {
		background: #F7F7F7;
		border: 1px solid #DDDDDD;
		width: 130px;
		position: absolute;
		margin: auto;
		z-index: 5;
		left: 0;
		left: -639px;
		right: 0;
		margin-top: -4px;
	}
	.e1 {
		margin-top: -3px;
		margin-bottom: -px;
		text-align: left;
		font-weight: bolder;
		font-size: 11px;
		margin-top: 5px;
		margin-left: 5px;
		color: #333333;
		font-family: "lucida grande", tahoma, verdana, arial, sans-serif;;
	}
	.einput {
		width: 110px;
		font-size: 11px;
		padding: 3px;
		display: block;
		margin-top: -10px;
		border: 1px solid #BDC7D8;
		font-family: "lucida grande", tahoma, verdana, arial, sans-serif;;
	}
	.login1 {
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
    width: 60px;
    position: relative;
    right: 28px;
    top: -10px;
	}
	.sn {
		text-align: left;
		font-weight: bold;
		font-size: 11px;
		position: relative;
		left: 5px;
		color: #333333;
	}
	.searchbox {
		border: 1px solid #D7DDEA;
		width: 72%;
		position: relative;
		top: -5px;

		height: 15px;
		padding: 3px;
		padding-left: 20px;
		display: flex;
		font-size: 11px;
		 font-family: "lucida grande", tahoma, verdana, arial, sans-serif;
	}
	.mag {
		display: block;
		margin-top: -10px;
		position: relative;
		margin-right: auto;
		left: 10px;
		top: -12px;
	}
	.application {
		display: flex;
		position: relative;
		top: 12px;
		margin-top: -15px;
	}
	.application a {
		color: #545E96;
		text-decoration: none;
	}
	.application a:hover {
		text-decoration: underline;
	}
	.photolabel {
		margin-left: 10px;
		height: 18px;
	}
	.appname {
		position: relative;
		left: 10px;
		top: -10px;
		font-size: 12px;
		text-align: left;
	}
	.more {
		color: #585858;
		text-decoration: none;
		text-align: left;
		display: block;
		font-size: 10px;
		margin-left: 16px;
		font-weight: bold;
		margin-top: 3px;
		margin-bottom: 2px;
	}
	.more:hover {
		text-decoration: underline;
	}
</style>
</body>
</html>