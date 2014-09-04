<?php
session_start();
include_once 'EnhanceTestFramework.php';
	require_once 'parse.php';
	/*error_reporting(0);
	ini_set('display_errors', 0);*/
	if(isset($_SESSION['currentUser']))
	{
	
	$user = $_POST['username'];
	$name = (string) $_POST['name'];
	$comingpath = (string) $_POST['comingpath'];
	
	
	$filename= $_FILES["file"]["name"];
	
	$ext = (string) pathinfo($filename, PATHINFO_EXTENSION);
	$allowedExts = array("gif", "jpeg", "jpg", "png" , "JPEG" , "JPG" , "PNG");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 1000000)
&& in_array($extension, $allowedExts)) {
  if ($_FILES["file"]["error"] > 0) {
    echo "Error: " . $_FILES["file"]["error"] . "<br>";
  } else {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Stored in: " . $_FILES["file"]["tmp_name"];
	
	
	if (file_exists("upload/" . $_FILES["file"]["name"])) {
      echo $_FILES["file"]["name"] . " already exists. ";
    } else {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
    }

}
$image = imagecreatefromjpeg("upload/".$filename);

$filename = 'upload/'.$filename;

$thumb_width = 500;
$thumb_height = 500;

$width = imagesx($image);
$height = imagesy($image);

echo $width;
echo $height;

$original_aspect = $width / $height;
$thumb_aspect = $thumb_width / $thumb_height;

if ( $original_aspect >= $thumb_aspect )
{
   // If image is wider than thumbnail (in aspect ratio sense)
   $new_height = $thumb_height;
   $new_width = $width / ($height / $thumb_height);
}
else
{
   // If the thumbnail is wider than the image
   $new_width = $thumb_width;
   $new_height = $height / ($width / $thumb_width);
}

$thumb = imagecreatetruecolor( $thumb_width, $thumb_height );

// Resize and crop
imagecopyresampled($thumb,
                   $image,
                   0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
                   0 - ($new_height - $thumb_height) / 2, // Center the image vertically
                   0, 0,
                   $new_width, $new_height,
                   $width, $height);
imagejpeg($thumb, $filename, 100);



 $byte_array = file_get_contents($filename);

$parseFile = new parseFile($ext , $byte_array);
$result = $parseFile->save($_SESSION['currentUserID'].".".$ext); 

			$parseQuery = new parseQuery('images');
			$parseQuery->whereEqualTo("User_id",$_SESSION['currentUserID']);
			$returnUser = $parseQuery->find();			
			 if($returnUser->results)
			{
			$userID = $returnUser->results[0]->objectId;
			$parseObject = new parseObject('images');
			
			$parseObject->Image = array(
								'name' => $result->name,
								'__type' => 'File'
										);
			$parseObject->update($userID);
			unlink($filename);
			
			}
			else
			{
				$parseObject = new parseObject('images');
				$parseObject->ImageName = "WebappImage";
				$parseObject->User_id = $_SESSION['currentUserID'];
				$parseObject->Image = array(
								'name' => $result->name,
								'__type' => 'File'
										);
				$parseObject->save();
				unlink($filename);
			}


header("Location: ".$comingpath."?success=1");
	
} else {
  header("Location: ".$comingpath."?invalid=1");
}

}
else {
	header("Location: signin.php?invalid=1");
} 
	
			
	
			
	


?>