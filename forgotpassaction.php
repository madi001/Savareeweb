<?php 
	include_once 'EnhanceTestFramework.php';
	require_once 'parse.php';
	/*error_reporting(0);
	ini_set('display_errors', 0);*/
	$email = $_POST['email'];
	
	$ParseUser = new parseUser();
	try{
	
		$result = $ParseUser->requestPasswordReset($email);
		header('Location: index.php?emailsuccess=1');
		
	
	}catch(Exception $e)
	{
		header('Location: forgotpass.php?forgot=1');
	}

?>