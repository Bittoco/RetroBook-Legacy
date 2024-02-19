<?php 

include 'header.php';
$sql = "SELECT * FROM users WHERE sex = 'Other'";
$result = $conn->query($sql);
echo mysqli_num_rows($result);