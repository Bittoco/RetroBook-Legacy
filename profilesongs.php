<?php

while($row4 = mysqli_fetch_assoc($result4)) {
	$sid = $row4['songid'];
	$sql5 = "SELECT * FROM songs WHERE id = '$sid'";
	$result5 = $conn->query($sql5);
	while($row5 = mysqli_fetch_assoc($result5)) {

		echo '<div class="song">
				<audio id="audio_'.$row5['id'].'">
            <source src="music/'.$row5['file'].'" type="audio/mpeg">
            Your browser does not support the audio element.
        	</audio>
        	<div class="leftside"><div class="left2"><img id="playPause" class="paused" data-audio-id="'.$row5['id'].'" src="img/paused.png" alt="Play"><di>'.$row5['title'].' by <a style="color: #3B5998;">'.$row5['artist'].'</a></di></div></div>';
        	$ssid = $row5['id'];
        	$email2 = $_SESSION['email'];
        		$sql6 = "SELECT * FROM profilesongs WHERE songid = '$ssid' AND email = '$email2'";
        		$result6 = $conn->query($sql6);
        		if(mysqli_num_rows($result6) > 0) {
        		while($row6 = mysqli_fetch_assoc($result6)) {
        		echo '<p class="remove"><a style="color: #3B5998;" href="removefromprofile.php?id='.$row6['id'].'">Remove from Profile</a></p>';
        		} 
        	} else {
        		$ssid = $row5['id'];
        		$sql7 = "SELECT * FROM songs WHERE id = '$ssid'";
        		$result7 = $conn->query($sql7);
        		if(mysqli_num_rows($result7) > 0) {
        			echo '<p class="remove"><a style="color: #3B5998;" href="addtoprofile.php?id='.$ssid.'">Add back to Profile</a></p>';
        		}
        		}
				echo '</div>';




	}
}

?>
	<script type="text/javascript">const playPauseButtons = document.querySelectorAll(".paused");

playPauseButtons.forEach(button => {
    button.addEventListener("click", function() {
        const audioId = this.getAttribute("data-audio-id");
        const audio = document.getElementById("audio_" + audioId);

        if (audio.paused) {
            audio.play();
            this.src = "img/unpaused.png"; // Change image to pause icon
        } else {
            audio.pause();
            this.src = "img/paused.png"; // Change image to play icon
        }
    });
});</script>
<br><br><br>
<style type="text/css">
	.remove {
		text-align: right;
		font-size: 10px;
		text-decoration: none;
		color: #3B5998;
		position: relative;
		top: 7px;
		width: 100px;
		float: right;
		margin-right: 15px;
		margin-top: -30px;
	}
	.displaying {
		background-color: #F1F1F1;
		padding: 3px;
		margin-top: -26px;
		padding-left: 5px;
	}

	.song {
		width: 100%;
		margin-top: 5px;
		position: relative;
		overflow: auto;
		top: -10px;

		border-bottom: 1px solid lightgray;
	}
	.remove a {

		color: #3B5998;
		text-decoration: none;
	}
	.remove:hover {
		text-decoration: underline;
	}
	.songsilike {
		color: gray;
		font-weight: bold;
		margin-left: 5px;
		font-size: 10px;
		border-bottom: 1px solid lightgray;
		padding-bottom: 5px;
		margin-top: -5px;
	}
	.paused {
		height: 20px;
		margin-right: auto;
		display: flex;
		position: relative;
		z-index: 5;
		float: left;
	}
	.leftside {
		width: 80%;
		float: left;
	}
	.left2 {
		float: left;
		padding: 5px;
	}
	.left2 di {
		font-size: 11px;
		margin-left: 5px;
		position: relative;
		top: 3px;
		left: 5px;
		width: 230px;
		display: block;
	}
	.left2 a {
		color: #3B5998;
	}
	.u {
		font-weight: bold;
		font-size: 13px;
		background-color: #F6F9F8;
		border: 1px solid #6D84B4;
		width: 80%;
		margin-top: 10px;
		font-family: calibri;
		padding: 10px;
	}
	.u a {
		text-decoration: none;
	}
	.u a:hover {
		text-decoration: underline;
	}
	.text {
		margin-left: 30px;
		display: flex;
		font-family: calibri;
		
		font-size: 15px;
		margin-top: 30px;
	}
	.ilike {
		height: 25px;
		text-align: left;
		border-radius: 5px;

	}
	.text img {
		position: relative;
		top: -8px;
		margin-right: 5px;
	}
	.songsadded {
		width: 80%;

	}
	.songsadded gi {
		background: #D8DEEA;
    font-size: 13px;
    font-weight: bolder;
    padding: 2px;
    border-top: 1px solid #3B5998;
    color: #3B5998;
    font-family: calibri;
    display: flex;
    padding-left: 7px;
	}
	.songsadded di {
	background: #F1F1F1;
    font-size: 11px;
    padding: 3px;
   
    display: block;
    text-align: left;
	}
</style>