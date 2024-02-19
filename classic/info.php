<?php
echo '
			<div class="info">
			<p class="inform">Information</p>';
			if (isset($_SESSION['email']) && $row['email'] === $_SESSION['email']) {
				echo '<a href="editprofile.php" class="editinfo">[ edit ]</a>';
			}
			echo '
			<p class="accinfo">Account Info:</p>
			<p class="reg">Name: '.$row['name'].'<br>
			Member Since: '.$row['datejoined'].'<br>
			Last Updated: '.$row['lastupdated'].'</p><br>
			<p class="head">Basic Info:</p><br>
			<p class="reg" style="margin-top: 5px;">Email:
			<a style="color: #538AE3;">'.$row['email'].'</a><br>
			Status: '.$row['status'].'<br>
			Sex: <a style="color: #538AE3;">'.$row['sex'].'</a><br>
			Birthday: <a style="color: #538AE3;">'.$row['bday'].'</a><br>
			Residence: <a style="color: #538AE3;">'.$row['residence'].'</a><br>
			High School: <a style="color: #538AE3;">'.$row['hschool'].'</a><br>
			</p>
			</div>';