<?php

class ParseRoutes extends parseRestClient
{
	 private $className = "route";

	private $url;

	private $appId = 'ATuFft3HyW0IKdULdi3R2tkVT4ESib7Ve1JQHfqA';
	private $restKey = 'Nb8njRbGmgraPVk4SZti7IQWLETVXdUbRviJfm5V';
	private $objectData;
	public function setURL()
	{
		$url  = 'https://api.parse.com/1/classes/route';
	}
	
	public function PostRoute($pickup,$dropoff,$time,$date,$noSeats,$model,$color,$plate,$email,$gender,$org,$phone,$genderFilter,$username,$userid,$country,$privacy)
{
	$objectData = '{"startPointString":'.$pickup. ',
					"endPointString":'.$dropoff. ',
					"time":'.$time. ',
					"date":'.$date. ',
					"numSeats":'.$noSeats. ',
					"carType":'.$model. ',
					"carColor":'.$color. ',
					"numPlate":'.$plate. ',
					"email":'.$email. ',
					"gender":'.$gender. ',
					"org":'.$org. ',
					"phone":'.$phone. ',
					"genderFilter":'.$genderFilter. ',
					"username":'.$username. ',
					"user_id":'.$userid. ',
					"country":'.$country. ',
					"privacy":'.$privacy. ',
					}';

	$rest = curl_init();
	curl_setopt($rest,CURLOPT_URL,'https://api.parse.com/1/Classes/route');
	curl_setopt($rest,CURLOPT_PORT,443);
	curl_setopt($rest,CURLOPT_POST,1);
	curl_setopt($rest,CURLOPT_POSTFIELDS,$objectData);
	curl_setopt($rest,CURLOPT_HTTPHEADER, 
    array("X-Parse-Application-Id: ATuFft3HyW0IKdULdi3R2tkVT4ESib7Ve1JQHfqA" ,
        "X-Parse-REST-API-Key: Nb8njRbGmgraPVk4SZti7IQWLETVXdUbRviJfm5V" ,
        "Content-Type: application/json"));

$response = curl_exec($rest);
echo $response;

}
	
}
?>