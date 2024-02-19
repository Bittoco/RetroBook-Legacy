<?php 
	 session_start();  
        date_default_timezone_set('America/New_York');
        include 'dbh.inc.php';
        if (isset($_SESSION['name'])) {
        	$fname = $_SESSION['name'];
        	$name = explode(" ", $fname);
        }
      ?>

 <head>
     
     <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-W0E1Q0HER2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-W0E1Q0HER2');
</script>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	 <link rel="icon" type="image/x-icon" href="favicon.jpg">
     <link ref="apple-touch-icon" sizes="128x128" href="favicon.png">
     
 </head>

	<?php 
	if (!isset($_SESSION['email'])) {
	echo '<div class="headertext2"><a class="loginlink" href="login.php">login</a>&nbsp;&nbsp;&nbsp;<a class="signuplink" href="signup.php">register</a>&nbsp;&nbsp;&nbsp;<a class="aboutlink" href="faq.php">about</a></div>';
	} else {
		echo '
		<div class="headertext">
		<div class="alt">
		<a class="loginlink" href="home.php">home</a>&nbsp;&nbsp;&nbsp;<a class="signuplink" href="search.php">search</a>&nbsp;&nbsp;&nbsp;<a class="aboutlink" href="global.php">browse</a>&nbsp;&nbsp;&nbsp;<a class="otherlink" href="invite.php">invite</a>&nbsp;&nbsp;&nbsp;<a class="otherlink" href="faq.php">help</a>&nbsp;&nbsp;&nbsp;<a class="otherlink" href="logout.inc.php">logout</a>
		</div></div>';
	}
	?>

<style type="text/css">
	.headertext {
		position: relative;
		top: -58px;
		z-index: 5;
		text-align: right;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		color: #6D84B4;
		color: black;
		font-size: 12px;
		left: -10px;
		text-decoration: none;
	}
.headertext2 {
		position: relative;
		top: -58px;
		z-index: 5;
		text-align: right;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		color: #6D84B4;
		color: black;
		font-size: 12px;
		left: -10px;
		text-decoration: none;
	}
	.welcometext {
		font-size: 14px;
	}
	.headertext:hover {
		color: #77C9F3;
	}
	.headertext2:hover {
		color: #77C9F3;
	}
	.headertext2 a {
		color: #A8B0CD;
		font-size: 11px;
		padding: 3px;
	}
	.headertext2 a:hover {
		background-color: #526DA4;
		color: white;
	}
	.loginlink {
		color: white;
		text-decoration: none;
	}
	.loginlink:hover {
		color: #77C9F3;
		
	}
	.signuplink {
		color: white;
		text-decoration: none;
	}
	.signuplink:hover {
		color: #77C9F3;
		
	}
	.aboutlink {
		color: white;
		text-decoration: none;
	}
	.aboutlink:hover {
		color: #77C9F3;
		
	}
	.alt {
		position: relative;
		margin-left: 170px;
		text-decoration: none;
		color: white;
	}
	.otherlink {
		color: white;
		text-decoration: none;
	}
	.otherlink:hover {
		color: #77C9F3;
		
	}
	.header {
		height: 40px;
	}
	.headertext a {
		color: #A8B0CD;
		font-size: 11px;
		padding: 3px;
	}
	.headertext a:hover {
		background-color: #526DA4;
		color: white;
	}

	@media only screen and (max-width:700px) {
		.headertext {
			
			left: -45px;
		}
		
	}
	@media only screen and (max-width:500px) {
		.headertext {
			position: relative;
			left: -100px;
		}
		.headertext2 {
			position: relative;
			left: -250px;
		}
		
	}
</style>