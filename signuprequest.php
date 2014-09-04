<?php
	include_once 'EnhanceTestFramework.php';
	require_once 'parse.php';
	
	/*error_reporting(0);
	ini_set('display_errors', 0);*/
	
	$name = $_POST['name'];
	$cell = $_POST['cell'];
	$reach = $_POST['reach'];
	$password = $_POST['password'];
	//$cpass = $_POST['cpass'];
	$genderFilter = (int) $_POST['genderFilter'];
	$opencarpooling = (int) $_POST['opencarpooling'];
	$gender = (int) $_POST['gender'];
	$username = (string) $_POST['email'];
	$country = $_POST['country'];
	$emailString ="";
	
	for ($l=0; $l<strlen($username) ; $l++)
	{
		if($username[$l]== '@')
		{
			for($k=$l+1;$k<strlen($username); $k++)
			{
				$emailString .= $username[$k];
				
			}
			break;
		}
	}

	
	$parseQuery = new parseQuery('org');
	$parseQuery->whereEqualTo("email",$emailString);
	$return = $parseQuery->find();
	if($return->results)
	{
		if($return->results[0]->email == $emailString);
		{
			$parsesignup = new parseUser();
	$parsesignup->username = $username;
	$parsesignup->password = $password;
	$parsesignup->cell = $cell;
	$parsesignup->org = $reach;
	$parsesignup->genderFilter = $genderFilter;
	$parsesignup->public = $opencarpooling;
	$parsesignup->gender = $gender;
	$parsesignup->name = $name;
	$parsesignup->email = $username;
	$parsesignup->country = $country;
	
	
	try {
    $result = $parsesignup->signup($username,$password,$cell,$reach,$genderFilter,$gender,$name,$username,$country,$opencarpooling);
    
    if ( $result ) {
        // success, set cookie
       
		header('Location:thankyou.html' );
    } else {
        // display error
       header("location: index.php?noorgemail=1");
    }
} catch ( Exception $e ) {
	
	header("location: index.php?EmailTaken=1");
    
	//header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
		}
	}
	else
	{
		
		header("location: index.php?noorgemail=1");
	}
	

?>