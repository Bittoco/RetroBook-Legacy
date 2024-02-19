<?php 

echo '<form method="post"><button type="submit" name="submit">Send Email</button></form>';
if(isset($_POST['submit'])) {
    $msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail("charliewainwright07@gmail.com","My subject",$msg);
}