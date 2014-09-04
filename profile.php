<?php
	session_start();
	include_once 'EnhanceTestFramework.php';
	require_once 'parse.php';
	
	if(isset($_SESSION['currentUser']) && isset( $_SESSION['user_token']))
	{ 
		$user = $_SESSION['currentUser'];
			
			
			$parseUser = new parseUser();
			
			$parseQuery = new parseQuery('_User');
			$parseQuery->whereEqualTo("email",$user);
			$returnUser = $parseQuery->find();			
			$userID = $returnUser->results[0]->objectId;
			
			$_SESSION['currentUserName'] = $returnUser->results[0]->name;
			
			error_reporting(E_ERROR | E_WARNING | E_PARSE | E_USER_ERROR | E_USER_WARNING);
			
			if($returnUser->results[0]->rating)
			{
				
				$Rating = $returnUser->results[0]->rating;
				
			}
			else
			{
				$Rating=0;
				$parseUser->updateRating($userID,$Rating);
			}
			
		
			
			//query to get rattings of currentUser
			
		
	/*		$rattingQuery = new parseQuery('ratings');
			$rattingQuery->whereEqualTo("ratee",$userID);
			$rattingQuery->setLimit(1000);
			$returnRatings = $rattingQuery->find();
			
			$RatingsCount = count($returnRatings->results);
			
			$sum=0;
			$rating =0;

			for($i =0; $i<$RatingsCount; $i++)
			{
				$sum += $returnRatings->results[$i]->rating;
			}
			if($RatingsCount > 0)
			{
				$rating = $sum/$RatingsCount;
			}
		*/	
			//query to get recommended rides users
				$userQuery = new parseQuery('route');
				$userQuery->whereEqualTo("email",$user);
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
    <nav class="tab-bar">
      <section class="left-small"><i class="left-off-canvas-toggle step fi-align-justify size-30"></i></section>
      <section class="middle tab-bar-section">
        <h1 class="title">Home</h1>
        <div class="secondary-nav">
          <ul>
            <li><a href="#"><i class="step fi-torso size-21"></i></a></li>
            <li><a href="#"><i class="step fi-comment size-21"></i></a></li>
            <li><a href="signin.php?logout=1">Logout</a></li>
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
        <li><a href="#">Star Drivers</a></li>
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
            <a href="#" class="button radius">Start Tour</a> </div>
         
          <h4 class="left-h4">Your Posted Rides</h4>
		  
		  
		  
		  <?php
				$o = 0;
				while($return->results[$o] != null)
				{
					
				?>
		<div class="ride-box large-6 column">
            <div class="header">
              <div class="img"><img src="img/userpic.png"/> </div>
              <div class="naming"><?php 
				print_r($return->results[$o]->username);
			  ?> </br>
                <span class="organization"><?php print_r($return->results[$o]->org); ?></span> </div>
            </div>
            <!--header ended-->
            <div class="content-ride">
              <div class="route-markers">
                <ul class="ride-list">
                  <li><img src="img/markerdriver.png"/><?php print_r($return->results[$o]->startPointString); ?></li>
                  <li><img src="img/markerdriver.png"/><?php print_r($return->results[$o]->endPointString); ?></li>
                  <a href="#" class="button radius">See Detail</a>
                </ul>
              </div>
            </div>
          </div>
			<?php $o++;	}
			?>
          
          
             <h4 class="left-h4">Your Booked Rides</h4>
		  
		  
		  
		
          
         
          <div class="large-4 column" id="right-bar">
      
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
          
               
     <div class="reviews">
        <div class="tour-box">
        <ul class="nav-list" data-ul-select="">
    <li><a href="#" class="top-bar-fixed">Reviews</a></li>
    <li><p>Lorem ipsum dolor sit amet, consectetuer adipiscing 
	elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore 
	magna aliquam erat volutpat. Ut wisi enim</p><a href="#">Faisal Basra</a>,<span>Wateen</span></li>
   <li><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
   sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna
   aliquam erat volutpat. Ut wisi enim</p><a href="#">Faisal Basra</a>,<span>Wateen</span></li>
   <li><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
   sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna
   aliquam erat volutpat. Ut wisi enim</p><a href="#">Faisal Basra</a>,<span>Wateen</span></li>
  </ul>
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

