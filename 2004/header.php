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
<script async src="https://www.googletagmanager.com/gtag/js?id=G-218FPD4G7F"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-218FPD4G7F');
</script>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	 <link rel="icon" type="image/x-icon" href="favicon.png">
     <link ref="apple-touch-icon" sizes="128x128" href="favicon.png">
 </head>
<div class="headertext">
	<?php 
	if (!isset($_SESSION['email'])) {
	echo '<a class="loginlink" href="login.php">login</a>&nbsp;&nbsp;&nbsp;<a class="signuplink" href="signup.php">register</a>&nbsp;&nbsp;&nbsp;<a class="aboutlink" href="about.php">about</a>';
	} else {
		echo '
		<div class="alt">
		<a class="loginlink" href="home.php">home</a>&nbsp;&nbsp;&nbsp;<a class="signuplink" href="search.php">search</a>&nbsp;&nbsp;&nbsp;<a class="aboutlink" href="global.php">global</a>&nbsp;&nbsp;&nbsp;<a class="otherlink" href="socialnet.php">social net</a>&nbsp;&nbsp;&nbsp;<a class="otherlink" href="invite.php">invite</a>&nbsp;&nbsp;&nbsp;<a class="otherlink" href="faq.php">faq</a>&nbsp;&nbsp;&nbsp;<a class="otherlink" href="logout.inc.php">logout</a>
		</div>';
	}
	?>
</div>
<style type="text/css">
	.headertext {
		position: relative;
		top: -20px;
		font-family: Tahoma,Verdana,Segoe,sans-serif;
		color: white;
		font-size: 12px;
		left: 40px;
		text-decoration: none;
	}
	.welcometext {
		font-size: 14px;
	}
	.headertext:hover {
		color: #77C9F3;
	}
	.loginlink {
		color: white;
		text-decoration: none;
	}
	.loginlink:hover {
		color: #77C9F3;
		text-decoration: underline;
	}
	.signuplink {
		color: white;
		text-decoration: none;
	}
	.signuplink:hover {
		color: #77C9F3;
		text-decoration: underline;
	}
	.aboutlink {
		color: white;
		text-decoration: none;
	}
	.aboutlink:hover {
		color: #77C9F3;
		text-decoration: underline;
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
		text-decoration: underline;
	}
	
		.header {
		position: relative;
		border: 1px solid #3B5999;
		width: 700px;
		background-color: #3D65C2;
		background-image: url("banner3.png");
		height: 90px;

	}
	@media only screen and (max-width:700px) {
		.headertext {
			top: -12px;
			left: -65px;
		}
	}
</style>