<?php
	session_start();
	include_once 'EnhanceTestFramework.php';
	require_once 'parse.php';
	/*error_reporting(0);
	ini_set('display_errors', 0);*/
	if(isset($_SESSION['currentUser']))
	{
	
	$pickup = $_POST['pickup'];
	$dropoff = $_POST['dropoff'];
	$time = $_POST['time'];
	$date = (string) $_POST['date'];
	$noSeats = $_POST['noSeats'];
	$model = $_POST['model'];
	$color = $_POST['color'];
	$plate = $_POST['plate'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	
	$month="";
	$day="";
	$year="";
	
	for ($i=0; $i<4 ; $i++)  //08-31-2014
	{
		$year = $year.$date[$i];
	}
	for ($j=5;$j<7;$j++)
	{
		$month = $month.$date[$j];
	}
	for ($k=8;$k<10;$k++)
	{
		$day = $day.$date[$k];
	}
	$date = $month."/".$day."/".$year;

	$point0 = $_POST['point0'];
	$point1 = $_POST['point1'];
	$point2 = $_POST['point2'];
	$point3 = $_POST['point3'];
	$point4 = $_POST['point4'];
	$point5 = $_POST['point5'];
	$point6 = $_POST['point6'];
	$point7 = $_POST['point7'];
	$point8 = $_POST['point8'];
	$point9 = $_POST['point9'];
	
	
	$parseQuery = new parseQuery('_User');
			$parseQuery->whereEqualTo("email",$email);
			$returnUser = $parseQuery->find();
	$gender = $returnUser->results[0]->gender;
	$org = $returnUser->results[0]->org;
	$phone = $returnUser->results[0]->cell;
	$genderFilter = $returnUser->results[0]->genderFilter;
	$userid = $returnUser->results[0]->objectId;
	$country = $returnUser->results[0]->country;
	$privacy = $returnUser->results[0]->public;
	
	if($privacy ==0)
			 {
				$privacy = 1;
			 }
			 else{
				$privacy = 0;
			 }
	
	

	
	$parseObject = new parseObject('route');
	$parseObject->startPointString = $pickup;
		$parseObject->endPointString = $dropoff;
		$parseObject->time = $time;
		$parseObject->date = $date;
		$parseObject->numSeats = $noSeats;
		$parseObject->carType = $model;
		$parseObject->carColor = $color;
		$parseObject->numPlate = $plate;
		$parseObject->email = $email;
		$parseObject->gender = $gender;
		$parseObject->org = $org;
		$parseObject->phone = $phone;
		$parseObject->genderFilter = $genderFilter;
		$parseObject->username = $username;
		$parseObject->user_id = $userid;
		$parseObject->country = $country;
		$parseObject->privacy = $privacy;
		$parseObject->startPoint = $point0;
		$parseObject->point0 = $point0;
		$parseObject->point1 = $point1;
		$parseObject->point2 = $point2;
		$parseObject->point3 = $point3;
		$parseObject->point4 = $point4;
		$parseObject->point5 = $point5;
		$parseObject->point6 = $point6;
		$parseObject->point7 = $point7;
		$parseObject->point8 = $point8;
		$parseObject->point9 = $point9;
		$parseObject->endPoint = $point9;
		
		$parseObject->save();

		header("Location: postaride.php?routeposted=1");
	
	}
else {
	header("Location: signin.php?invalid=1");
} 

	
			

	
	
	

?>