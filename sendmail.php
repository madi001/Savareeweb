<?php
	/*error_reporting(0);
	ini_set('display_errors', 0);*/
	$sendermail = $_POST['senderemail'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	$recipient = $_POST['recipientemail'];
	$emailcoming = $_POST['emailcoming'];
$message = wordwrap($message,70);
$header = "From: ".$sendermail;
mail($recepient,$subject,$message,$header);


header("Location: ".$emailcoming."?email=1");

?>