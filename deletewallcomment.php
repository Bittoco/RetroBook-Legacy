<?php 
include 'header.php';
if(isset($_GET['id'])) {
$id = htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8');
$id = mysqli_real_escape_string($conn,  $id);
$sql = "SELECT * FROM profilewall WHERE id = '$id'";
$result = $conn->query($sql);
if(mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		if($row['fromid'] === $_SESSION['id'] || $row['toid'] === $_SESSION['id']) {
			$date = $row['date'];
			$sql2 = "DELETE FROM profilewall WHERE id = '$id'";
			$result2 = $conn->query($sql2);
			$sql3 = "DELETE FROM wall WHERE date = '$date'";
			$result3 = $conn->query($sql3);
			header("location: profile.php?id=".$row['toid']."");
			exit();
		}
	}
} else {
	header("location: index.php");
	exit();
}
} else {
	header("location: index.php");
	exit();
}