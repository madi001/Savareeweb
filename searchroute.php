<?php
	session_start();
	include_once 'EnhanceTestFramework.php';
	require_once 'parse.php';
	/*error_reporting(0);
	ini_set('display_errors', 0);*/
	if(isset($_SESSION['currentUser']))
	{
	
	$startlat = $_POST['startlat'];
	$startlong = $_POST['startlong'];
	
	$endlat = $_POST['stoplat'];
	$endlong = $_POST['stoplong'];
	
	$privacy = $_SESSION['currentUserPrivacy'];
	if($privacy ==0)
			 {
				$privacy = 1;
			 }
			 else{
				$privacy = 0;
			 }
	
	$parsecloud = new parseCloud('nearestRoutes');
	
	$parsecloud->stoplatitude = $endlat;
	$parsecloud->startlongitude = $startlong;
	$parsecloud->stoplongitude = $endlong;
	$parsecloud->genderFilter = $_SESSION['currentUserGenderFilter'];
	$parsecloud->privacy = $privacy;
	$parsecloud->gender = $_SESSION['currentUserGender'];
	$parsecloud->date = date('m/d/Y');;
	$parsecloud->org = $_SESSION['currentUserOrg'];
	$parsecloud->startlatitude = $startlat;
	 $result =  $parsecloud->run();
	 // print_r($result->result[0]); 
	// print_r($result);
	
	
	
	 $_SESSION['result'] = $result;
	header('Location: bookaride.php');
}
else {
	header("Location: signin.php?invalid=1");
} 
	
?>