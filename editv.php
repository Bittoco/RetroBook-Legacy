<?php 

if(isset($_GET['basic'])) {
	$basic = "background-color: #3B5998;color: white;";
	$contact = "background-color: white;color: #3B5998;border: 1px solid white;";
	$personal = "background-color: white;color: #3B5998;border: 1px solid white;";
	$picture = "background-color: white;color: #3B5998;border: 1px solid white;";
}
if(isset($_GET['contact'])) {
	$basic = "background-color: white;color: #3B5998;border: 1px solid white;";
	$contact = "background-color: #3B5998;color: white;border: 1px solid white;";
	$personal = "background-color: white;color: #3B5998;border: 1px solid white;";
	$picture = "background-color: white;color: #3B5998;border: 1px solid white;";
}
if(isset($_GET['personal'])) { 
	$basic = "background-color: white;color: #3B5998;border: 1px solid white;";
	$contact = "background-color: white;color: #3B5998;border: 1px solid white;";
	$personal = "background-color: #3B5998;color: white;border: 1px solid white;";
	$picture = "background-color: white;color: #3B5998;border: 1px solid white;";
}
if(isset($_GET['picture'])) { 
	$basic = "background-color: white;color: #3B5998;border: 1px solid white;";
	$contact = "background-color: white;color: #3B5998;border: 1px solid white;";
	$personal = "background-color: white;color: #3B5998;border: 1px solid white;;";
	$picture = "background-color: #3B5998;color: white;border: 1px solid white;";
}


elseif(!isset($_GET['personal']) && !isset($_GET['contact']) && !isset($_GET['basic']) && !isset($_GET['picture']))  {
	$basic = "background-color: #3B5998;color: white;";
	$contact = "background-color: white;color: #3B5998;border: 1px solid white;";
	$personal = "background-color: white;color: #3B5998;border: 1px solid white;";
	$picture = "background-color: white;color: #3B5998;border: 1px solid white;";
}
