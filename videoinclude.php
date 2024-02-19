<?php 
$you = $_SESSION['email'];
echo '<div class="left"><img src="vidicon.png" class="video"/><p class="label">Video</p></div>
<div class="right"><a href="createvideo.php" style="text-decoration: none;"><button class="create">+ Upload a New Video</button></a></div>';
echo '<br><Div class="black"><img class="welcomephoto" src="welcometovideo.png"/>
<p class="welcometo">Welcome to Video</p><p class="share">Share your personal videos.</p>
<p class="more">Upload videos of you and your friends on Retrobook. <a style="color: white;" href="createvideo.php">Upload a new video</a></p>
</div>';

?>
<style type="text/css">
	.left {
		display: inline-block;
		
		 display: inline;
	}
	.border {
		 white-space: nowrap;
	}
	.retrovid {
		display: inline-block;
		position: relative;
		top: 10px;
		height: 200px;
		left: -5px;
		margin-right: auto;
		display: flex;
			display: inline-block;
	}
	.right {
	
	}
	.add {
		border: 1px solid gray;
		background: #F7F7F7;
		height: 95px;
		position: relative;
		top: 10px;
		left: -14px;
		width: 190px;
	}
	.add p {
		position: relative;
		font-weight: bolder;
		
	}
	.profile {
		text-align: left;
		font-size: 15px;
		margin-left: 5px;
	}
	.what {
		width: 95%;
		margin-top: -90px;
		vertical-align: top;
		margin-bottom: 10px;
		white-space: normal;
		border: 1px solid lightgray;
	}
	.whatarewe {
		text-align: left;
		margin-left: 10px;
		font-size: 18px;
		font-weight: bolder;
			font-family:  Helvetica,Tahoma,Verdana;
	}
	.with {
		text-align: left;
		margin-top: -30px;
		margin-left: 10px;
		display: inline-block;
		vertical-align: text-top;
	}
	.black {
		background: black;
		padding: 5px;
		height: 290px;
		overflow: auto;
		overflow-x: hidden;
		margin-top: -30px;
	}
	.welcomephoto {
		display: inline-block;
		float: left;
		width: 270px;
	}
	.welcometo {
		text-align: left;
		color: white;
		display: ;
		position: relative;
		left: 15px;
		margin-left: 15px;
		font-size: 24px;
	}
	.share {
		color: white;
		font-size: 12px;
		font-weight: bold;
		text-align: left;
		position: relative;
		left: 15px;
		top
	}
	.more {
		color: #5E5853;
			font-size: 12px;
		
		text-align: left;
		position: relative;
		left: 15px;
		white-space: normal;
	}
	.more a {
		color: white;
		text-decoration: none;
	}
	.more a:hover {
	text-decoration: underline;
	}
	.video {
		display: flex;
		margin-right: auto;
		height: 16px;
		margin-left: 25px;
		margin-top: 15px;
	}
	.label {
		margin-top: -18px;
		text-align: left;
		position: relative;
		left: 100px;
		font-size: 14px;
		margin-left: -50px;
		font-weight: bolder;
			font-family:  Helvetica,Tahoma,Verdana;
	}
	.create {
		display: block;
		display: flex;
		margin-left: auto;
		position: relative;
		top: -30px;
		right: 15px;
		border-radius: 15px;
		padding-top: 3px;
		padding-left: 5px;
		padding-right: 5px;
		padding-bottom: 3px;
		color: #292D39;
		border: 1px solid #9A9A9A;
		font-weight: bolder;
		background-image: linear-gradient(#F3F0EE, #E1E1E1);
		text-decoration: none;
	}
	.create a  {
		text-decoration: none;
	}
</style>