<?php
	include_once 'EnhanceTestFramework.php';
	require_once 'parse.php';
	/*error_reporting(0);
	ini_set('display_errors', 0);*/
				$userQuery = new parseQuery('route');
				$userQuery->whereInclude('username');
				$return = $userQuery->find();
	
	$startlat = $_POST['startlat'];
	$startlong = $_POST['startlong'];
	
	$endlat = $_POST['stoplat'];
	$endlong = $_POST['stoplong'];
	
	
	
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
	$return = $parsecloud->run();
	 
	

?>
<html>
	<head>
		<title>Savaree</title>
		<link href="web/css/style-new.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		</script>
		<script src="js/jquery.min.js"></script>
        <script type="text/javascript" src="http://w3layouts.agileinformation.netdna-cdn.com/wp-content/cache/minify/000000/yygpKbDS10_MSqzQS8_PT89JTSzILNZLzs8Fi-nnZCYV62cVlqYWVeob6lnoGUI5ermZeXpZxQA.js"></script>
		<!---webfonts--->
		<link href='http://fonts.googleapis.com/css?family=Maven+Pro:400,500,700,900' rel='stylesheet' type='text/css'>
		
		<!---pop-up-box---->
		<link href="web/css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
        <link href="css/style-new.css" rel="stylesheet" type="text/css" media="all"/>

<link rel="stylesheet" type="text/css" href="css/icons.css" />
<link rel="stylesheet" type="text/css" href="css/normalize2.css" />
<link rel="stylesheet" href="css/foundation-icons/foundation-icons.css" />

<link rel="stylesheet" type="text/css" href="css/foundation.css" />
<link rel="stylesheet" type="text/css" href="css/index.css" />

<script src="js/modernizr.custom.js"></script>
<script src="js/vendor/modernizr.js"></script>
<script src="js/jquery-2.1.1.min.js" type="text/javascript"></script>
		
		<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
		<!---//pop-up-box---->
		<!---color-style-switcher---->

        
          <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
  
		<!---//color-style-switcher---->
	</head>
	<body>
    
   <div id="header1">	
        
        <div class="wrap"> 
					<!---logo--->
                    
					<div class="logo">
						<h1><a href="#"><img src="img/3.png"/></a></h1>
					</div>
					<!---//logo--->
					<!--top-nav---->
					<div class="top-nav">
						<div class="nav-icon">
					    <a href="#" class="right_bt" id="activator"><span> </span> </a>
						</div>
						 <div class="box" id="box">
							 <div class="box_content">        					                         
								<div class="box_content_center">
								 	<div class="form_content">
										<div class="menu_box_list">
											<ul>
												<li><a href="#home"><span>home</span></a></li>
												<li><a href="#about"><span>About</span></a></li>
												<li><a href="#works"><span>Works</span></a></li>
												<li><a href="#demo"><span>Demo</span></a></li>
												<li><a href="#blog"><span>Blog</span></a></li>
												<li><a href="signin.php"><span class="sign-in">Sign In</span></a></li>
												<div class="clear"> </div>
											</ul>
										</div>
										<a class="boxclose" id="boxclose"> <span> </span></a>
									</div>                                  
								</div> 	
							</div> 
						</div>       	  
					</div>
					<!---start-click-drop-down-menu----->
			        <!----start-dropdown--->
			     <script type="text/javascript">
						var $ = jQuery.noConflict();
							$(function() {
								$('#activator').click(function(){
									$('#box').animate({'top':'0px'},900);
								});
								$('#boxclose').click(function(){
								$('#box').animate({'top':'-1000px'},900);
								});
							});
							$(document).ready(function(){
							//Hide (Collapse) the toggle containers on load
							$(".toggle_container").hide(); 
							//Switch the "Open" and "Close" state per click then slide up/down (depending on open/close state)
							$(".trigger").click(function(){
								$(this).toggleClass("active").next().slideToggle("slow");
									return false; //Prevent the browser jump to the link anchor
							});
												
						});
					</script>
                    </div>
  </div>
					<!---//End-click-drop-down-menu----->
					<!--top-nav---->
                    
                    
					<div class="clear"> </div>
				
				</div>
				</div>
		</div>
		 
<section class="main-section">
          <div class="tour-box" style="margin-top:100px;">
		   <?php 
		   if(sizeof($return->result) == 0)
		   { ?>
				<h4 class="left-h4">No Results Found</h4>
		 <?php  }
		   else
		   { ?>
		   
		   <h4 class="left-h4">Hey, these are the rides that matches your search</h4>
			<?php	for($i=0; $i<sizeof($return->result);$i++)
				{	
				?>
				
					<div class="ride-box large-6 column">
            <div class="header">
              <div class="img"><img src="img/userpic.png"/> </div>
              <div class="naming"><?php 
				print_r($return->result[$i]->username);
			  ?> </br>
                <span class="organization"><?php print_r($return->result[$i]->org); ?></span> </div>
            </div>
            <!--header ended-->
            <div class="content-ride">
              <div class="route-markers">
                <ul class="ride-list">
                  <li><img src="img/markerdriver.png"/><?php print_r($return->result[$i]->startPointString); ?></li>
                  <li><img src="img/markerdriver.png"/><?php print_r($return->result[$i]->endPointString); ?></li>
                  <a href="#" data-reveal-id="myModal<?php echo $i; ?>" class="button radius">See Detail</a>
				  
				  <div id="myModal<?php echo $i; ?>" class="reveal-modal hello" data-reveal>
        <div class="large-6 column">
          <h3 class="heading-top">About Route</h3>
          <p class="lead"><i class="step fi-marker size-48"></i><Span class="left-margin">Location</Span></p>
          <ul class="ride-list">
            <li>Pick Up Points: <span class="left-margin"><?php print_r($return->result[$i]->startPointString); ?></span></li>
            <li>Drop Off Points:<span class="left-margin"><?php print_r($return->result[$i]->endPointString); ?></span></li>
            
          </ul>
         <!-- <div id="background-map" class="background-map"></div>-->
          </br>
          <p class="lead"><i class="step fi-calendar size-48"></i><Span class="left-margin">When</span></p>
          <ul class="ride-list">
            <li class="column-6 large">
            Time<span class="left-margin"><?php print_r($return->result[$i]->time); ?></span>
            Date<span class="left-margin"><?php print_r($return->result[$i]->date); ?></span>
            </li>
          </ul>
          </br>
          <p class="lead"><img src="img/car.png"/><Span class="left-margin">Car Details</span></p>
          <ul class="ride-list">
            <li>Number of Seats<span class="left-margin"><?php print_r($return->result[$i]->numSeats); ?></span>
            Car Color <span class="left-margin"><?php print_r($return->result[$i]->carColor); ?></span></li>
            <li>Car Model<span class="left-margin"><?php print_r($return->result[$i]->carType); ?></span>
            Number Plate<span class="left-margin"><?php print_r($return->result[$i]->numPlate); ?></span></li>
          </ul>
        </div>
        <div class="large-6 column">
          <h3 class="heading-top">About Driver</h3>
          <p class="lead"><i class="step fi-torso size-48"></i><span class="left-margin">General Info</span></p>
          <ul class="ride-list">
            <li>Name<span class="left-margin"><?php print_r($return->result[$i]->username); ?></span>
            Organization<span class="left-margin"><?php print_r($return->result[$i]->org); ?></span></li>
          </ul>
          <p class="lead"><i class="step fi-star stars size-48"></i> <span class="left-margin">Rating and Reviews</span></p>
          <ul class="ride-list">
            <li>Ratings <i class="step fi-star stars size-30"></i><i class="step fi-star stars size-30"></i> <i class="step fi-star stars size-30"></i> <i class="step fi-star stars size-30"></i> <i class="step fi-star stars size-30"></i></li>
            
          </ul>
          <a href="#" data-reveal-id="myModal2" class="button">Sign Up</a>
		  </div>
		  <a class="close-reveal-modal">&#215;</a> 
		  </div>
		  
		   <div id="myModal2" class="reveal-modal medium" data-reveal>
                  <div id="benefits">
            <form id="msform" method="post" action="signuprequest.php">
                      <fieldset>
                <div class="row">
                          <div class="large-6 columns">
                    <input type="text" id="name" name="name" placeholder="Name" />
                  </div>
                          <div class="large-6 columns">
                    <select id="gender" name="gender">
                              <option value="off" selected ="true">--Gender--</option>
                              <option value="1">Male</option>
                              <option value="0">Female</option>
                            </select>
                  </div>
                          <div class="large-6 columns">
                    <select id="country" name="country">
                              <option value="off" selected="true">--Country--</option>
                              <option value="Pakistan">Pakistan</option>
                            </select>
                  </div>
                          <div class="large-6 columns">
                    <input type="text" id="cell" name="cell" placeholder="Phone Number" />
                  </div>
				  <div class="large-6 columns">
          <select id="reach" name="reach">
            <option value="off">--Institutions/Organizations--</option>
			
			<?php
			$parseQuery = new parseQuery('org');
			
			$parseQuery->whereEqualTo("country","PAKISTAN");
			$parseQuery->setLimit(1000);
			$returns = $parseQuery->find();
			for ($j = (int)0; $j< count($returns->results) ;$j++)
			{
				$array[$j]=$returns->results[$j]->title;
				echo $array[$j];	
			 }
				sort($array);
			for ($j = (int) 0;$j< count($array);$j++)
			{
			?>
				<option value=<?php echo $array[$j];?>><?php echo $array[$j];?></option>
			<?php }
			?>
			
          </select>
        </div>
                          <div class="large-6 columns">
                    <input type="text" id="email" name="email" placeholder="Email" />
                  </div>
                          <div class="large-12 columns feedback" > <a href="mailto:feedback@savareeapp.com"> <u style="color:rgb(255, 120, 120);">Is your organization not listed? Ask us to add your organization to Savaree's organization list.</u></a> </div>
                          <div class="large-6 columns">
                    <input type="password" id="password" name="password" placeholder="Password" />
                  </div>
                          <div class="large-6 columns">
                    <input type="password" id="cpass" name="cpass" placeholder="Confirm Password" />
                  </div>
                          <div class="large-6 columns">
                    <select id="genderFilter" name="genderFilter">
                              <option value="off" selected ="true">--Gender Filter--</option>
                              <option value="1">On</option>
                              <option value="0">Off</option>
                            </select>
                  </div>
                          <div class="large-6 columns">
                    <select id="opencarpooling" name="opencarpooling">
                              <option value="off" selected ="true">--Open Carpooling--</option>
                              <option value="1">On</option>
                              <option value="0">Off</option>
                            </select>
                  </div>
                        </div>
                <div class="large-12 columns"> <span class="messagebox"></span> </div>
                <input type="submit" id="submitbutton" name="submit" class="button" value="Submit" />
              </fieldset>
                    </form>
            <a class="close-reveal-modal">&#215;</a> </div>
                </div>
		  
                </ul>
              </div>
            </div>
          </div>
			<?php	}
			}
			?>            
           
          </div>
       
      
    </section>
		
    
    <script src="js/vendor/jquery.js"></script> 
<script src="js/foundation.min.js"></script> 
<script>
      $(document).foundation();
    </script>
    
    </body>