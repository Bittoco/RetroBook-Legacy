<?php 

include 'dbh.inc.php';
$sql = "SELECT * FROM users WHERE bday != ''";
$result = $conn->query($sql);
while($row = mysqli_fetch_assoc($result)) {
    echo $row['name'].'<br>';
}