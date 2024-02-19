<?php 

if ($row['interests'] != "") {
				$interests = 'Interests: <a style="color: #538AE3;">'.$row['interests'].'</a><br>';
			} else {
				$interests = "";
			}
			if ($row['music'] != "") {
				$music = 'Music: <a style="color: #538AE3;">'.$row['music'].'</a><br>';
			} else {
				$music = "";
			}
			if ($row['aboutme'] != "") {
				$aboutme = 'About Me: '.$row['aboutme'].'<br>';
			} else {
				$aboutme = "";
			}
			if ($row['pviews'] != "") {
				$pviews = 'Political Views: <a style="color: #538AE3;">'.$row['pviews'].'</a><br>';
			} else {
				$pviews = "";
			}

if ($row['hschool'] != "") {
				$hschool = 'High School: <a style="color: #538AE3;">'.$row['hschool'].'</a><br>';
			} else {
				$hschool = "";
			}

if ($row['residence'] != "") {
				$residence = 'Residence: <a style="color: #538AE3;">'.$row['residence'].'</a><br>';
			} else {
				$residence = "";
			}

	if ($row['screenname'] != "") {
				$sn = 'Screenname: <a style="color: #538AE3;">'.$row['screenname'].'</a><br>';
			} else {
				$sn = "";
			}
			if ($row['websites'] != "") {
				$blog = 'Blog: <a href="'.$row['websites'].'" style="color: #538AE3;; text-decoration: none;">'.$row['websites'].'</a><br>';
			} else {
				$blog = "";
			}
		if ($row['lookingfor'] != "") {
				$look = 'Looking For: <a style="color: #538AE3;">'.$row['lookingfor'].'</a><br>';
			} else {
				$look = "";
			}
			if ($row['interested'] != "") {
				$interested = 'Interested In: <a style="color: #538AE3;">'.$row['interested'].'</a><br>';
			} else {
				$interested = "";
			}
			if ($row['rstatus'] != "") {
				$rstatus = 'Relationship Status: <a style="color: #538AE3;">'.$row['rstatus'].'</a><br>';
			} else {
				$rstatus = "";
			}
			if ($aboutme === "" && $look === "" && $rstatus === "" && $pviews === "" && $interests === "" && $music === "" && $interested === "") {
				$vis = "display: none;";
			} else {
				$vis = "";
			}
		
			