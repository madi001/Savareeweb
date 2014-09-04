<?php
	include_once 'EnhanceTestFramework.php';
	require_once 'parse.php';
	/*error_reporting(0);
	ini_set('display_errors', 0);*/
	$startlat = $_POST['startlat'];
	$startlong = $_POST['startlong'];
	
	$endlat = $_POST['stoplat'];
	$endlong = $_POST['stoplong'];
	
	echo $startlat." | ".$startlong." | ".$endlat." | ".$endlong;
	
	$parsecloud = new parseCloud('nearestRoutes');
	
	$parsecloud->stoplatitude = $endlat;
	$parsecloud->startlongitude = $startlong;
	$parsecloud->stoplongitude = $endlong;
	$parsecloud->genderFilter = 0;
	$parsecloud->privacy = 0;
	$parsecloud->gender = 2;
	$parsecloud->date = date('m/d/Y');
	$parsecloud->org = "no organization";
	$parsecloud->startlatitude = $startlat;
	$result =  $parsecloud->run();
	 
	print_r($result->result);
	 
	 

?>