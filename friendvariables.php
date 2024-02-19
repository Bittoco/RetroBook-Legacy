<?php 

include 'dbh.inc.php';
$notif = '
		<div class="friend">
		<div class="ubeen"><p class="friendtext">You have been added as a friend.</p></div>
		<img src="friend.png" class="friendpic"/>
		<p class="youhave" style="margin-left: -10px;">You have been friended by 
		<a style="color: #3B59A3" class="pokelink" href="profile.php?id='.$row['whofriendedid'].'">
		'.$row2['name'].'</a>
		</p>
		<div class="frinfo">
		<a class="back" href="homefriend.inc.php?po='.$row['whofriendedid'].'">[ friend back ]</a>
		<a class="hide" href="hidealert.inc.php?re='.$row['id'].'">[ hide alert ]</a>
		</div>
		</div>
		';
$not = '<div class="friend">
		<div class="ubeen"><p class="friendtext">You have been added as a friend.</p></div>
		<img src="friend.png" class="friendpic"/>
		<p class="youhave" style="margin-left: -10px;">You have been added back by 
		<a style="color: #3B59A3" class="pokelink" href="profile.php?id='.$row['whofriendedid'].'">
		'.$row2['name'].'</a>
		</p>
		<div class="frinfo">
		<a class="hide" href="hidealert.inc.php?re='.$row['id'].'">[ hide alert ]</a>
		</div>
		</div>';