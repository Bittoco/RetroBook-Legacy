<?php 

if ($row['interests'] != "") {
				$interests = '<gi>Interests: </gi><a style="color: #3B59A3;">'.$row['interests'].'</a><br>';
			} else {
				$interests = "";
			}
			if ($row['music'] != "") {
				$music = '<gi>Music: </gi><a style="color: #3B59A3;">'.$row['music'].'</a><br>';
			} else {
				$music = "";
			}
			if ($row['aboutme'] != "") {
				$aboutme = '<gi>About Me: </gi>'.$row['aboutme'].'<br>';
			} else {
				$aboutme = "";
			}
			if ($row['pviews'] != "") {
				$pviews = '<gi>Political Views: </gi><a style="color: #3B59A3;">'.$row['pviews'].'</a><br>';
			} else {
				$pviews = "";
			}
			if($row['favbooks'] != "") {
			    $favbooks =  '<gi>Music: </gi><a style="color: #3B59A3;">'.$row['favbooks'].'</a><br>';
			} else {
			    $favbooks = "";
			}
				if($row['favmovies'] != "") {
			    $favmovies =  '<gi>Favorite Movies: </gi><a style="color: #3B59A3;">'.$row['favmovies'].'</a><br>';
			} else {
			    $favmovies = "";
			}
				if($row['favquotes'] != "") {
			    $favquotes =  '<gi>Favorite Quote: </gi>'.$row['favquotes'].'<br>';
			} else {
			    $favquotes = "";
			}

if ($row['hschool'] != "") {
				$hschool = '<gi>High School: </gi><a style="color: #3B59A3;">'.$row['hschool'].'</a><br>';
			} else {
				$hschool = "";
			}

if ($row['residence'] != "") {
				$residence = '<gi>Residence: </gi><a style="color: #3B59A3;">'.$row['residence'].'</a><br>';
			} else {
				$residence = "";
			}

	if ($row['screenname'] != "") {
				$sn = '<gi>Screenname: </gi><a style="color: #3B59A3;">'.$row['screenname'].'</a><br>';
			} else {
				$sn = "";
			}
			if ($row['websites'] != "") {
				$blog = '<gi>Blog: </gi><a href="'.$row['websites'].'" style="color: #3B59A3; text-decoration: none;">'.$row['websites'].'</a><br>';
			} else {
				$blog = "";
			}
		if ($row['lookingfor'] != "") {
				$look = '<gi>Looking For: </gi><a style="color: #3B59A3;">'.$row['lookingfor'].'</a><br>';
			} else {
				$look = "";
			}
			if ($row['interested'] != "") {
				$interested = '<gi>Interested In: </gi><a style="color: #3B59A3;">'.$row['interested'].'</a><br>';
			} else {
				$interested = "";
			}
			if ($row['rstatus'] != "") {
				$rstatus = '<gi>Relationship Status: </gi><a style="color: #3B59A3;">'.$row['rstatus'].'</a><br>';
			} else {
				$rstatus = "";
			}
			if ($aboutme === "" && $look === "" && $rstatus === "" && $pviews === "" && $interests === "" && $music === "" && $interested === "") {
				$vis = "display: none;";
			} else {
				$vis = "";
			}
		
			