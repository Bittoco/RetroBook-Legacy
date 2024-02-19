<?php
$email2 = $row['email'];
				$friendemail = $row['email'];
				if($row['accountvis'] === "Friends" && $row['id'] != $_SESSION['id']) {
		$sqlf = "SELECT * FROM friends WHERE friend1 = '$email2' AND friend2 = '$friendemail'";
			$resultf = $conn->query($sqlf);
			$resultCheckf = mysqli_num_rows($resultf);
			if($resultCheckf > 0) {
			$styleinfo = "";
			
			} else {
			$styleinfo = "display: none;";
			
			}
	} else {
		$styleinfo = "";
		
	} 
$email2 = $row['email'];
				$friendemail = $row['email'];
				if($row['messagevis'] === "Friends" && $row['id'] != $_SESSION['id']) {
		$sqlf = "SELECT * FROM friends WHERE friend1 = '$email2' AND friend2 = '$friendemail'";
			$resultf = $conn->query($sqlf);
			$resultCheckf = mysqli_num_rows($resultf);
			if($resultCheckf > 0) {
			
			$styleinfo5 = "";
			} else {
			
			$styleinfo5 = "display: none;";
			}
	} else {
		
		$styleinfo5 = "";
	} 
$email2 = $row['email'];
				$friendemail = $row['email'];
				if($row['photovis'] === "Friends" && $row['id'] != $_SESSION['id']) {
		$sqlf = "SELECT * FROM friends WHERE friend1 = '$email2' AND friend2 = '$friendemail'";
			$resultf = $conn->query($sqlf);
			$resultCheckf = mysqli_num_rows($resultf);
			if($resultCheckf > 0) {
			$styleinfo4 = "";
			$styleinfo3 = "";
			} else {
			$styleinfo4 = "display: none;";
			$styleinfo3 = "visibility: hidden;margin-top: -40px;";
			}
	} else {
		$styleinfo4 = "";
		$styleinfo3 = "";
	} 