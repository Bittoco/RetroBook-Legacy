<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>theretrobook | faq</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	 <link rel="icon" type="image/x-icon" href="favicon.png">
     <link ref="apple-touch-icon" sizes="128x128" href="favicon.png">
</head>
<body>
	<center>
<div class="header">
		<a href="index.php" style="text-decoration: none"><h1 class="name">[ theretrobook ]</h1></a>
	<?php 
	include 'header.php';
	?>
</div>
<div class="welcome">
	<p class="welcometext">Frequently Asked Questions</p>
	<div class="border">
		<h2 class="loginsign">[ FAQ ]</h2>
		<div class="questiondiv">
		<div class="question"><p class="questext">What is Theretrobook?</p></div>
		<p class="answer">Theretrobook ( The · Retro · Book ) is an online directory that connects people through social networks. It gives anyone the ability to browse the internet in 2004.</p>
		</div>
		<!-- This is what its about -->
		<div class="questiondiv">
		<div class="question">
		<p class="questext">Why thefacebook?</p>
	</div>
		<p class="answer">
			We are a fan-project based off <i>thefacebook</i> and while not affiliated with <i>Meta</i> or <i>facebook</i> in anyway, we wanna give anyone the possiblity to experience thefacebook in 2004-2005, and we serve as an internet revival project. 
		</p>
		</div>
		
		<!-- Data and privacy -->
		<div class="questiondiv">
		<div class="question">
		<p class="questext">What do you do to our data?</p>
	</div>
		<p class="answer">
			We may be based off a <b>NOT-SO DATA FRIENDLY COMPANY</b>, your data is safe with us. Your account passwords are safely hashed and all your privacy and account information is safely stored privately in a database.
		</p>
		</div>

		<!-- Error -->
		<div class="questiondiv">
		<div class="question">
		<p class="questext">What to do if my account is not loading</p>
	</div>
		<p class="answer">
			There can be many reasons as to why your account is not loading, possibly still being cached up, your profile picture being loaded/downloaded into our files, or your public info hasn't fully queried into our database.
		</p>
		</div>

		<!-- block -->
		<div class="questiondiv">
		<div class="question">
		<p class="questext">What do I do to block or report spam?</p>
	</div>
		<p class="answer">
			We are currently working on the abilty to do that. I know, I know, its annoying. But at most just ignore them. If they friend you, hey, you got a new amigo. If they message you, least you don't look lonely in your inbox.
		</p>
		</div>

		<!-- features -->
		<div class="questiondiv">
		<div class="question">
		<p class="questext">Why are so many features unavailable?</p>
	</div>
		<p class="answer">
			Many core features such as inviting, social net, or the privacy page are undeveloped, why? Well, its mainly because lack of imagery or source. + it takes awhile to build all those features, and this is a side project of mine, as of now, I'm just testing the waters.
		</p>
		</div>

		<!-- algor -->
		<div class="questiondiv">
		<div class="question">
		<p class="questext">Do you use any algorithms?</p>
	</div>
		<p class="answer">
			No, we don't. we have a similar businuess model and mindset as other revival projects, in which we don't wanna show you a constant feed of ads and I wanna serve as a break from constant "Attention-span-ruining" Social media apps.
		</p>
		</div>

		<!-- ads -->
		<div class="questiondiv">
		<div class="question">
		<p class="questext">Are you open to ad hosting?</p>
	</div>
		<p class="answer">
			We are open to anyone who wants to host ads for their company. Email <a style="color: #538AE3;">theretrobook@gmail.com</a> if so. (yes ik I'm not spending another 10 dollars to use a custom email url)
		</p>
		</div>

		<!-- sources -->
		<div class="questiondiv">
		<div class="question">
		<p class="questext">Where do you get most of your designs from?</p>
	</div>
		<p class="answer">
			Its difficult rebuilding a entire social network from scratch, and its even harder trying to find almost lost media 2004 interviews with Mark Zuckerburg, to find a 2 second preview of say, the <i>Global</i> page. 
		</p>
		</div>

		<!-- global -->
		<div class="questiondiv">
		<div class="question">
		<p class="questext">What is the difference between the Global and search page?</p>
	</div>
		<p class="answer">
			The search page by default, pretty much shows you the Global Page, but it provides the abilty to search for users by name. And the global page simply shows you all the users registered. except you.
		</p>
		</div>

		<!-- app -->
		<div class="questiondiv">
		<div class="question">
		<p class="questext">Are you ever building an app?</p>
	</div>
		<p class="answer">
			Considering the fact that we haven't even built the privacy page, I wouldn't get all your hopes up, even then, I still wouldn't get excited for an app. 
		</p>
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
	.header {
		position: relative;
		border: 1px solid #3B5999;
		width: 700px;
		background-color: #3D65C2;
		background-image: url("banner3.png");
		height: 90px;

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
		border: 1px solid #3D65C2;
		background-color: #3D65C2;
		width: 550px;
		height: 30px;
		margin-top: 10px;
		left: 75px;
	}
	.welcometext {
		color: white;
		position: relative;
		margin-top: 5px;
		left: 5px;
		text-align: left;
	}
	.border {
		position: relative;
		border: 1px solid lightgray;
		min-height: 200px;
		background-color: white;
		top: -9px;
		width: 550px;
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
	.questiondiv {
		border: 1px solid #3D65C2;
		min-height: 50px;
		width: 450px;
		margin-bottom: 15px;
	}
	.question {
		background-color: #3D65C2;
		width: 452px;
		left: -1px;
		min-height: 20px;
		position: relative;
		top: -17px;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		color: white;
	}
	.questext {
		font-size: 12px;
		text-align: left;
		position: relative;
		top: 3px;
		left: 5px;
	}
	.answer {
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		color: black;
		font-size: 11px;
		text-align: left;
		margin-top: -10px;
		margin-left: -5px;
		width: 400px;
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
		.questiondiv {
			width: 350px;
		}
		.question {
			width: 352px;
		}
		.answer {
			width: 300px;
		}

	}
</style>
</html>