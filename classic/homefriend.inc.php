<?php 
include 'header.php';
	include 'dbh.inc.php';

if(isset($_GET['po'])) {
		$friend = $_GET['po'];
		$friend = htmlspecialchars($friend, ENT_QUOTES, 'UTF-8');
		$friend = mysqli_real_escape_string($conn,  $friend);
		$email = $_SESSION['email'];
		$sql2 = "SELECT * FROM users WHERE email = '$email'";
		$result2 = $conn->query($sql2);
		$date3 = date("Y-m-d");
		while($row2 = mysqli_fetch_assoc($result2)) {
			$u = $row2['id'];
			$u = htmlspecialchars($u, ENT_QUOTES, 'UTF-8');
			$u = mysqli_real_escape_string($conn,  $u);
			$sql = "SELECT * FROM users WHERE id = '$friend'";
			$result = $conn->query($sql);
			$resultCheck = mysqli_num_rows($result);
			if($resultCheck > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					$friendname = $row['email'];
					$friendname = htmlspecialchars($friendname, ENT_QUOTES, 'UTF-8');
					$friendname = mysqli_real_escape_string($conn,  $friendname);
					$sqlf = "INSERT INTO friends (friend1, friend2, date, fid1, fid2) VALUES ('$email', '$friendname', '$date3', '$u', '$friend')";
					$resultf = $conn->query($sqlf);
					$sqla = "INSERT INTO friendalert (sendto, whofriended, date, whofriendedid) VALUES ('$friendname', '$email', '$date3', '$u')";
					$resulta = $conn->query($sqla);
					$sqlr = "DELETE FROM friendalert WHERE sendto = '$email' AND whofriended = '$friendname'";
					$resultr = $conn->query($sqlr);
					header("location: home.php");
					exit();
				}
			} else {
				header("location: home.php");
			}
		}

	} else {
		header("location: home.php");
		exit();
	}
	