<?php 

include 'header.php';

if(isset($_POST['submit'])) {
	$name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
	$name = mysqli_real_escape_string($conn,  $name);
	$artist = htmlspecialchars($_POST['artist'], ENT_QUOTES, 'UTF-8');
	$artist = mysqli_real_escape_string($conn,  $artist);
	$file = mysqli_real_escape_string($conn, $_FILES['file']['name']);
	$email = $_SESSION['email'];
	$fid = $_SESSION['id'];
	if(empty($name) || empty($artist)) {
		header("location: addsong.php?e=1");
		exit();
	}
		if($_FILES['file']['name'] === "") {
			header("location: addsong.php?e=2");
		exit();
		} else {
			 $filetype = mysqli_real_escape_string($conn, $_FILES['file']['type']);			
		$allowed = array("audio/mpeg");
		if(!in_array($filetype, $allowed) && !empty($_FILES['file']['name'])) {
			header("Location: addsong.php?e=3");
		} else {
			if ($_FILES["file"]["size"] > 5000000) {
 			header("Location: addsong.php?e=4");
 			exit();
			}
			$filename = uniqid($file).$file;
			$filevid = password_hash($_FILES['file']['tmp_name'], PASSWORD_DEFAULT);
			move_uploaded_file($_FILES['file']['tmp_name'],"music/".$filename);
			$input_file = 'music/'.$filename.'';
			$newname = uniqid($file).$file;
			$output_file = 'music/'.$newname.'';

			// The command to run FFmpeg
			$command = "ffmpeg -i $input_file -codec:a libmp3lame -qscale:a 2 $output_file";

			// Run the command
			exec($command);

			$sql2 = "INSERT INTO songs (title, file, profileid, artist) VALUES ('$name', '$filename', '$email', '$artist')";
			$result2 = $conn->query($sql2);
			$sql2 = "SELECT * FROM songs WHERE file = '$filename'";
			$result2 = $conn->query($sql2);
			while($row2 = mysqli_fetch_assoc($result2)) {
				$sid = $row2['id'];
				$sql3 = "INSERT INTO profilesongs (songid, email) VALUES ('$sid', '$email')";
				$result3 = $conn->query($sql3);
				$date3 = date("Y-m-d");
      	$date2 = date("H:i:s");
      	 $date4 = $time_in_12_hour_format = date("g:i a", strtotime($date2));
      	 $date = $date3 . " " . $date4;
      	 $altdate = date("H:i:s");
      	  $altdate = $time_in_12_hour_format = date("g:i a", strtotime($date2));
				$sql4 = "INSERT INTO wall (fromname, fromid, typewall, date, altdate) VALUES ('$email', '$fid', 'iLike', '$date', '$altdate')";
				$result4 = $conn->query($sql4);
			}
			header("location: songsilike.php");
			exit();
		}


		}


} else {
	header("location: index.php");
	exit();
}