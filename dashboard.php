<?php
	session_start();
	include_once 'EnhanceTestFramework.php';
	require_once 'parse.php';
	/*error_reporting(0);
	ini_set('display_errors', 0);*/
	if(isset($_SESSION['currentUser']) && isset( $_SESSION['user_token']))
	{ 
		$user = $_SESSION['currentUser'];
			
			
			$parseUser = new parseUser();
			
			$parseQuery = new parseQuery('_User');
			$parseQuery->whereEqualTo("email",$user);
			$returnUser = $parseQuery->find();			
			$_SESSION['currentUserID'] = $returnUser->results[0]->objectId;
			$_SESSION['currentUserGenderFilter'] = $returnUser->results[0]->genderFilter;
			$_SESSION['currentUserPrivacy'] = $returnUser->results[0]->public;
				
			$_SESSION['currentUserGender'] = $returnUser->results[0]->gender;
			$_SESSION['currentUserOrg'] = $returnUser->results[0]->org;
			
		
			
			$parseQuery2 = new parseQuery('images');
			$parseQuery2->whereEqualTo("User_id",$_SESSION['currentUserID']);
			$returnpic = $parseQuery2->find();
			
			if($returnpic->results)
			{
			$returnpic = $returnpic->results[0]->Image;
			$returnpic = $returnpic->url;
			
			$_SESSION['currentUserImage'] = $returnpic;
			}
			else
			{
				$_SESSION['currentUserImage'] = "img/userpic.png";
			}
			
			$_SESSION['currentUserName'] = $returnUser->results[0]->name;
			
			error_reporting(E_ERROR | E_WARNING | E_PARSE | E_USER_ERROR | E_USER_WARNING);
			
			if($returnUser->results[0]->rating)
			{
				
				$Rating = $returnUser->results[0]->rating;
				
			}
			else
			{
				$Rating=0;
				$parseUser->updateRating($_SESSION['currentUserID'],$Rating);
			}
			
		
			//query to get recommended rides users
				$userQuery = new parseQuery('route');
				$userQuery->whereInclude('username');
				$return = $userQuery->find();
				
				
			
	?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home</title>
<meta name="description" content="Sidebar Transitions: Transition effects for off-canvas views" />
<meta name="author" content="Codrops" />

<link rel="shortcut icon" href="../favicon.ico">
<link rel="stylesheet" type="text/css" href="css/foundation.css" />
<link rel="stylesheet" type="text/css" href="css/icons.css" />
<link rel="stylesheet" type="text/css" href="css/normalize2.css" />
<link rel="stylesheet" type="text/css" href="css/index.css" />
<link rel="stylesheet" href="css/foundation-icons/foundation-icons.css" />
<script src="js/modernizr.custom.js"></script>
<script src="js/vendor/modernizr.js"></script>
<script src="js/jquery-2.1.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(function(){

	var id='<?php echo $Rating; ?>';
	
	var conc="";
	for (var i=1; i<=id; i++)
	{
		conc = "#" + i;
		AddCss(conc);
		
	}
	$("#1").click(function(){
		id = $(this).attr('id');
		
	});
	
	function AddCss(comingid)
	{
		$(comingid).removeClass("deactive");
		$(comingid).addClass("activeRating");
	}
	
	$("input[type='image']").click(function(e) {
    $("input[id='myfile']").click();
	e.preventDefault();
	$("input[id='myfile']").change(function(){
	
	
		$("#myform").submit();
	});
});
	
});
	
</script>

</head>
<body id="dashboard">
<div class="off-canvas-wrap" data-offcanvas>
  <div class="inner-wrap">
  
   <?php if(isset($_GET['invalid']))
  { ?>
  <div data-alert class="alert-box alert">
	File format not supported or file greater than 1MB.
  <a href="#" class="close">&times;</a>
  </div>
  
  <?php } ?>
  
  <?php if(isset($_GET['success']))
  { ?>
  <div data-alert class="alert-box success">
  Image successfully uploaded
  <a href="#" class="close">&times;</a>
  </div>
  
  <?php } ?>
  
    <nav class="tab-bar">
      <section class="left-small"><i class="left-off-canvas-toggle step fi-align-justify size-30"></i></section>
      <section class="middle tab-bar-section">
        <h1 class="title">Home</h1>
        <div class="secondary-nav">
          <ul>
       <!--     <li><a href="#"><i class="step fi-torso size-21"></i></a></li>
            <li><a href="#"><i class="step fi-comment size-21"></i></a></li>-->
            <li><a href="index.php?logout=1">Logout</a></li>
          </ul>
        </div>
      </section>
    </nav>
    <aside class="left-off-canvas-menu">
      <ul class="off-canvas-list">
        <li>
          <label><form id="myform" method="post" enctype="multipart/form-data" action="uploadphoto.php">
		  <input id="myfile" name="file" type="file" style="display:none;" />
					<input type="image" class="displaypicture" src="<?php echo $_SESSION['currentUserImage']; ?>" />
					<input type="hidden" name="username" value="<?php echo $_SESSION['currentUser']; ?>" />
					<input type="hidden" name="name" value="<?php echo $_SESSION['currentUserName']; ?>" />
					<input type="hidden" name="comingpath" value="dashboard.php" />
				</form>
            
          <?php
			echo $_SESSION['currentUserName'];
		   ?></label>
        </li>
        <li><a href="dashboard.php">Home</a></li>
        <li><a href="postaride.php">Post a Route</a></li>
        <li><a href="bookaride.php">Book a Ride</a></li>
       <!-- <li><a href="#">Star Drivers</a></li>-->
      </ul>
    </aside>
    <section class="main-section">
      <div class="row">
        <div class="large-12 column">
          <div class="tour-box">
            <h3>Welcome <?php
			echo $_SESSION['currentUserName'];
		   ?></h3>
            Going somewhere? Want company? Savaree is the answer. Need a ride? Savaree is the answer. Savaree is an ridesharing platform that brings together drivers going a certain route and people who need a ride along that route. Drivers register their route and the approximate time of departure along the route, so potential carpoolers can search for routes that match where they want to go. </BR>
            <!--<a href="#" class="button radius">Start Tour</a>--> </div>
         
          <h4 class="left-h4">Recommended Rides</h4>
		  
		  
		  
		  <?php for($i=0; $i<4;$i++)
				{
					$randnum = mt_rand (0,99)
				?>
					<div class="ride-box large-6 column">
            <div class="header">
              <div class="img"><img src="img/userpic.png"/> </div>
              <div class="naming1"><?php 
				print_r($return->results[$randnum]->username);
			  ?> </br>
                <span class="organization"><?php print_r($return->results[$randnum]->org); ?></span> </div>
            </div>
            <!--header ended-->
            <div class="content-ride">
              <div class="route-markers">
                <ul class="ride-list">
                  <li><img src="img/markerdriver.png"/><?php print_r($return->results[$randnum]->startPointString); ?></li>
                  <li><img src="img/markerdriver.png"/><?php print_r($return->results[$randnum]->endPointString); ?></li>
                  <a href="#" data-reveal-id="myModal<?php echo $randnum; ?>" class="button radius">See Detail</a>
				  
				  <div id="myModal<?php echo $randnum; ?>" class="reveal-modal hello" data-reveal>
        <div class="large-6 column">
          <h3 class="heading-top">About Route</h3>
          <p class="lead"><i class="step fi-marker size-48"></i><Span class="left-margin">Location</Span></p>
          <ul class="ride-list">
            <li>Pick Up Points: <span class="left-margin"><?php print_r($return->results[$randnum]->startPointString); ?></span></li>
            <li>Drop Off Points:<span class="left-margin"><?php print_r($return->results[$randnum]->endPointString); ?></span></li>
            
          </ul>
         <!-- <div id="background-map" class="background-map"></div>-->
          </br>
          <p class="lead"><i class="step fi-calendar size-48"></i><Span class="left-margin">When</span></p>
          <ul class="ride-list">
            <li class="column-6 large">
            Time<span class="left-margin"><?php print_r($return->results[$randnum]->time); ?></span>
            Date<span class="left-margin"><?php print_r($return->results[$randnum]->date); ?></span>
            </li>
          </ul>
          </br>
          <p class="lead"><img src="img/car.png"/><Span class="left-margin">Car Details</span></p>
          <ul class="ride-list">
            <li>Number of Seats<span class="left-margin"><?php print_r($return->results[$randnum]->numSeats); ?></span>
            Car Color <span class="left-margin"><?php print_r($return->results[$randnum]->carColor); ?></span></li>
            <li>Car Model<span class="left-margin"><?php print_r($return->results[$randnum]->carType); ?></span>
            Number Plate<span class="left-margin"><?php print_r($return->results[$randnum]->numPlate); ?></span></li>
          </ul>
        </div>
        <div class="large-6 column">
          <h3 class="heading-top">About Driver</h3>
          <p class="lead"><i class="step fi-torso size-48"></i><span class="left-margin">General Info</span></p>
          <ul class="ride-list">
            <li>Name<span class="left-margin"><?php print_r($return->results[$randnum]->username); ?></span>
            Organization<span class="left-margin"><?php print_r($return->results[$randnum]->org); ?></span></li>
          </ul>
          <p class="lead"><i class="step fi-star stars size-48"></i> <span class="left-margin">Rating and Reviews</span></p>
          <ul class="ride-list">
            <li>Ratings <i class="step fi-star stars size-30"></i><i class="step fi-star stars size-30"></i> <i class="step fi-star stars size-30"></i> <i class="step fi-star stars size-30"></i> <i class="step fi-star stars size-30"></i></li>
            
          </ul>
          <a href="#" data-reveal-id="secondModal<?php echo $randnum; ?>" class="button radius">Book Ride</a><a href="#" class="secondary button radius">View Driver's Profile</a>
		  </div>
		  <a class="close-reveal-modal">&#215;</a> 
		  </div>
		  
		  <div id="secondModal<?php echo $randnum; ?>" class="reveal-modal" data-reveal>
          
            <div class="row">
              <div class="large-8 columns">
                <h3 class="message-h3">Send a message to "<?php print_r($return->results[$randnum]->username); ?>"</h3>
              </div>
            </div>
			 <form class="msform" method="POST" action="sendmail.php">
            <div class="row">
              <div class="large-8 columns">
             
                <input type="text" name="subject" placeholder="Subject" />
				
                <input type="hidden"  name="recipientemail" value="<?php print_r($return->results[$randnum]->email); ?>" />
              </div>
            </div>
            <div class="row">
              <div class="large-8 columns">
              
                <textarea rows="5" type="text" name="message" placeholder="Message" /></textarea>
                <input type="hidden" name="senderemail" value="<?php echo $_SESSION['currentUser']; ?>"/>
				<input type="hidden" name="emailcoming" value="dashboard.php" />
              </div>
            </div>
			
            <div class="row">
				<br />
              <div class="large-8 columns"><input class="button radius message-button" type="submit" value="Send" /></div>
            </div>
          </form>
		  
		  
			
			
          
        <a class="close-reveal-modal">&#215;</a> </div>
		  
                </ul>
              </div>
            </div>
          </div>
			<?php	}
			?>
          
         
          <div class="large-4 column" id="right-bar">
          <!--  <div class="tour-box">
              <ul class="nav-list" data-ul-select="">
                <li><a href="#" class="top-bar-fixed">Home</a></li>
                <li><a href="#">Messages</a></li>
                <li><a href="#">Profile</a></li>
                <li><a href="#">Notifications</a></li>
              </ul>
              
               </div>-->
               <div class="tour-box">
            <h4>Your Ratings</h4>
            <div class="ratings">   <i id="1" class="step fi-star stars size-38 deactive"></i>
									<i id="2" class="step fi-star stars size-38 deactive"></i>
									<i id="3" class="step fi-star stars size-38 deactive"></i> 
									<i id="4" class="step fi-star stars size-38 deactive"></i> 
									<i id="5" class="step fi-star stars size-38 deactive"></i> 
				<span id="myspan"></span>
			</div>
          </div>
              
           
          </div>
        </div>
      </div>
    </section>
    <a class="exit-off-canvas"></a> </div>
</div>
<div id="bottom_wrapper">
  <div id="bottom"> Copyright.2014. <a href="http://savareeapp.com/">www.savareeapp.com</a> </div>
</div>
<script src="js/vendor/jquery.js"></script> 
<script src="js/foundation.min.js"></script> 
<script>
      $(document).foundation();
    </script>
</body>
</html>
	
<?php	
	}
	else
	{
		header("Location: signin.php?invalid=1");
	}
?>

