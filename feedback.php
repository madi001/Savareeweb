<?php

/*error_reporting(0);
	ini_set('display_errors', 0);*/
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$subject = "feedback";
$message = wordwrap($message,70);
$to = 'feedback@savareeapp.com';
$header = "From: ".$email;
mail($to,$subject,$message,$header);

header("Location: index.php?email=1");
?>