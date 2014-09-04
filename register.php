<?php
	session_start();
	include_once 'EnhanceTestFramework.php';
	require_once 'parse.php';
	/*error_reporting(0);
	ini_set('display_errors', 0);*/
	$username = $_POST['username'];
	$password = $_POST['password'];	
	
	
	$parseLogin = new parseUser();
	$parseLogin->username = $username;
	$parseLogin->password = $password;
	
	
	try {
    $result = $parseLogin->login();
    
    if ( $result ) {
        // success, set cookie
		$_SESSION['currentUser'] = $username;
        $_SESSION['user_token'] = uniqid();
		
		header("Location: dashboard.php");
    } else {
        // display error
            header("Location: index.php?invalid=1");
		
    }
} catch ( Exception $e ) {
    header("Location: index.php?invalid=1");
}?>
	
	