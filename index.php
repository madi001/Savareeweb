<?php
	session_start();
	include_once 'EnhanceTestFramework.php';
	require_once 'parse.php';
	error_reporting(0);
	ini_set('display_errors', 0);
	if(isset($_SESSION['currentUser']))
	{
		header("Location: dashboard.php");
	}
?>
<html>
	<head>
		<title>Savaree</title>
		<!--<link href="css/style-new.css" rel='stylesheet' type='text/css' />-->

		<link rel="stylesheet" type="text/css" href="css/foundation.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		</script>
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery-2.1.1.min" type="text/javascript"></script>
		<script type="text/javascript" src="http://w3layouts.agileinformation.netdna-cdn.com/wp-content/cache/minify/000000/yygpKbDS10_MSqzQS8_PT89JTSzILNZLzs8Fi-nnZCYV62cVlqYWVeob6lnoGUI5ermZeXpZxQA.js"></script>
		<link href='http://fonts.googleapis.com/css?family=Maven+Pro:400,500,700,900' rel='stylesheet' type='text/css'>
		<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
		<link href="css/style-new.css" rel="stylesheet" type="text/css" media="all"/>
		
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
		<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
		<script type="text/javascript">
		$(function() {
		
		
	/*	$(':input[@type=text,password]').each(function(){
			$(this).bind('keypress', function(e){
			   if(e.keyCode == 13) { e.preventDefault(); }
			});
		}); */
		
		
		$("#searchbutton").click(function(){
		
			$("#searchform").submit();
		});

		
		// red
		$("#css-red").click(function() {
		$("link[rel=stylesheet]").attr({href : "web/css/style.css"});
		});
		// red-bg
		$(".red-bg").click(function() {
		$("link[rel=stylesheet]").attr({href : "web/css/style.css"});
		});
		// yellow
		$("#css-yellow").click(function() {
		$("link[rel=stylesheet]").attr({href : "web/css/yellow.css"});
		});
		// yellow-bg
		$(".yellow-bg").click(function() {
		$("link[rel=stylesheet]").attr({href : "web/css/yellow.css"});
		});
		// black
		$("#css-black").click(function() {
		$("link[rel=stylesheet]").attr({href : "web/css/black.css"});
		});
		// black-bg
		$(".black-bg").click(function() {
		$("link[rel=stylesheet]").attr({href : "web/css/black.css"});
		});
		// gray
		$("#css-gray").click(function() {
		$("link[rel=stylesheet]").attr({href : "web/css/gray.css"});
		});
		// gray-bg
		$(".gray-bg").click(function() {
		$("link[rel=stylesheet]").attr({href : "web/css/gray.css"});
		});
		
		var addressStart;
var addressEnd;
var autocomplete;
var dropoff;
		
		/*----------------------- <When Writing on Fields> --------------------------------------- */		
              autocomplete = new google.maps.places.Autocomplete(
                  /** @type {HTMLInputElement} */(document.getElementById('autocomplete')),
                  { types: ['geocode'] });
				  
              google.maps.event.addListener(autocomplete, 'place_changed', function() {
			  
				var geocoder = new google.maps.Geocoder();
				addressStart = $("#autocomplete").val();

				geocoder.geocode( { 'address': addressStart}, function(results, status) {

				if (status == google.maps.GeocoderStatus.OK) {
				var latitude = results[0].geometry.location.lat();
				var longitude = results[0].geometry.location.lng();
				
				alert(latitide);
				
				$("#startlat").val(latitude);
				$("#startlong").val(longitude);				
  } 
  
  });
				
              });
			  
			  
			  dropoff = new google.maps.places.Autocomplete(
                  /** @type {HTMLInputElement} */(document.getElementById('dropoff')),
                  { types: ['geocode'] });
				  
              google.maps.event.addListener(dropoff, 'place_changed', function() {
			  addressEnd = $("#dropoff").val();
			  
			  var geocoder2 = new google.maps.Geocoder();
			  geocoder2.geocode( { 'address': addressEnd}, function(results, status) {
				
				if (status == google.maps.GeocoderStatus.OK) {
				var latitude = results[0].geometry.location.lat();
				var longitude = results[0].geometry.location.lng();
				
				$("#stoplat").val(latitude);
				$("#stoplong").val(longitude);
				

				
				
				
			  }
			  });
			  });
			  
			 

$('#autocomplete').keyup(function(){			  
			  var geocoder = new google.maps.Geocoder();
 addressStart = $("#autocomplete").val();

geocoder.geocode( { 'address': addressStart}, function(results, status) {

  if (status == google.maps.GeocoderStatus.OK) {
    var latitude = results[0].geometry.location.lat();
    var longitude = results[0].geometry.location.lng();
	
				$("#startlat").val(latitude);
				$("#startlong").val(longitude);
   
  } 
  
  });
});

$('#dropoff').keyup(function(){			  
			  var geocoder = new google.maps.Geocoder();
 addressEnd = $("#dropoff").val();

geocoder.geocode( { 'address': addressEnd}, function(results, status) {

  if (status == google.maps.GeocoderStatus.OK) {
    var latitude = results[0].geometry.location.lat();
    var longitude = results[0].geometry.location.lng();
	
				$("#stoplat").val(latitude);
				$("#stoplong").val(longitude);
   
  } 
  
  });
  });
 
  var message = "something missing";
	var validated = false;
				
	$("#cpass").keyup(function () {
			
			if($("#password").val().length >=6)
			{
			if ( $("#password").val() == $("#cpass").val())
			{
				$(".messagebox").html("passwords match");
				$(".messagebox").addClass("messageboxtrue");
				validated = true;
				
				
			}
			else
			{
				$(".messagebox").html("passwords dont match");
				$(".messagebox").removeClass("messageboxtrue");
				validated = false;
			}
			}
			else{
				$(".messagebox").html("Password should be 6 or above characters");
				$(".messagebox").removeClass("messageboxtrue");
				validated = false;
			}
	});
	
	$("#submitbutton").click(function()
	{
		if($("#name").val() ==0)
		{
			message = "Name missing";
			
			$(".messagebox").html(message);
			$(".messagebox").removeClass("messageboxtrue");
			validated = false;
		}
		else if($("#cell").val()==0)
		{
			message = "Phone number missing";
			$(".messagebox").html(message);
			$(".messagebox").removeClass("messageboxtrue");
			validated = false;
			
		}
		else if($("#email").val()==0)
		{
			message = "Email number missing";
			$(".messagebox").html(message);
			$(".messagebox").removeClass("messageboxtrue");
			validated = false;
		}
		else if($("#password").val() ==0)
		{
			message = "password missing";
			$(".messagebox").html(message);
			$(".messagebox").removeClass("messageboxtrue");
			validated = false;
		}
		else if($("#cpass").val()==0)
		{
			message = "confirm password missing";
			$(".messagebox").html(message);
			$(".messagebox").removeClass("messageboxtrue");
			validated = false;
		}
		else if($("#password").val() != $("#cpass").val())
		{
				message = "passwords dont match";
				$(".messagebox").html(message);
				$(".messagebox").removeClass("messageboxtrue");
				
				validated = false;
		}
		else if ($("#reach").val() == "off")
		{
				message = "please select your organization";
				$(".messagebox").html(message);
				$(".messagebox").removeClass("messageboxtrue");
				validated = false;
		}
		else if ($("#genderfilter").val() == "off")
		{
			message = "please select Gender filter";
				$(".messagebox").html(message);
				$(".messagebox").removeClass("messageboxtrue");
				validated = false;
		}
		else if ($("#opencarpooling").val() == "off")
		{
			message = "please select Open Carpooling";
				$(".messagebox").html(message);
				$(".messagebox").removeClass("messageboxtrue");
				validated = false;
		}
		else if ($("#gender").val() == "off")
		{
			message = "please select Gender";
				$(".messagebox").html(message);
				$(".messagebox").removeClass("messageboxtrue");
				validated = false;
		}
		else if ($("#country").val() == "off")
		{
			message = "please select Country";
				$(".messagebox").html(message);
				$(".messagebox").removeClass("messageboxtrue");
				validated = false;
		}
		
		else
		{
			message = "submitting";
			$(".messagebox").html(message);
			$(".messagebox").addClass("messageboxtrue");
			validated = true;
		}
		return validated;
	
	});
	
	$("#feedsubmit").click(function(){
		if($("#feedname").val() ==0)
		{
			return false;	
		}
		else if ($("#feedemail").val() ==0)
		{
			return false;	
		}
		else if($("#feedmessage").val() == 0)
		{
			return false;	
		}
		else
		{
			return true;	
		}
		});
  
  
});
/*----------------------- </When Writing on Fields> --------------------------------------- */	
		
		
		
		</script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
	</head>
		<body>
<?php if(isset($_GET['email']))
  { ?>
<div data-alert class="alert-box success"><center>Thank You for your feedback</center> <a href="#" class="close">&times;</a> </div>
<?php } ?>		
		
<?php if(isset($_GET['emailsuccess']))
  { ?>
<div data-alert class="alert-box success"><center>Please Check your email and reset password</center> <a href="#" class="close">&times;</a> </div>
<?php } ?>

<?php if(isset($_GET['noorgemail']))
  { ?>
<div data-alert class="alert-box alert"><center>You need to signup with your organizational Email</center> <a href="#" class="close">&times;</a> </div>
<?php } ?>

<?php if(isset($_GET['EmailTaken']))
  { ?>
<div data-alert class="alert-box alert"><center>Email you entered is already taken</center> <a href="#" class="close">&times;</a> </div>
<?php } ?>

<?php if(isset($_GET['invalid']))
  { ?>
<div data-alert class="alert-box alert"><center>Username or password invalid</center> <a href="#" class="close">&times;</a> </div>
<?php } ?>




<div class="top-bannar" id="move-top">
          <div class="top-header">
    <div class="wrap">
      <div class="clear"> </div>
<div class="header-welcome-note">
        <h2>CARPOOL YOUR WAY TO A BETTER WORLD</h2>
        <a href="#" data-reveal-id="myModal" class="button">Sign Up</a>
        <div id="myModal" class="reveal-modal medium" data-reveal>
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
			$return = $parseQuery->find();
			for ($i = (int)0; $i< count($return->results) ;$i++)
			{
				$array[$i]=$return->results[$i]->title;
				echo $array[$i];	
			 }
				sort($array);
			for ($i = (int) 0;$i< count($array);$i++)
			{
			?>
				<option value=<?php echo $array[$i];?>><?php echo $array[$i];?></option>
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
				<br />
                <input type="submit" id="submitbutton" class="button" value="Submit" />
              </fieldset>
                    </form>
            <a class="close-reveal-modal">&#215;</a> </div>
                </div>
        <a href="https://play.google.com/store/apps/details?id=com.demo.savareedemo" class="button" target="_new">Download from Google Play</a> 
        <!--<a href="#about"><span> </span> see what we've been up to.</a>--> 
      </div>
    </div>
  </div>
        </div>
<div id="header">
          <div class="wrap">
            <div class="logo">
              <h1><a href="#"><img src="img/3.png"/></a></h1>
            </div>
            <div class="top-nav">
              <div class="nav-icon"> <a href="#" class="right_bt" id="activator"><span> </span> </a> </div>
              <div class="box" id="box">
        <div class="box_content">
                  <div class="box_content_center">
            <div class="form_content">
               <div class="menu_box_list">
                <ul>
                          <li><a href="index.php"><span>Home</span></a></li>
                          <li><a href="aboutus.php"><span>About</span></a></li>
                          <li><a href="press.php"><span>Press</span></a></li>
                           <li><a href="#" data-reveal-id="myModal"><span class="sign-in">Sign Up</span></a></li>
        <div id="myModal" class="reveal-modal medium" data-reveal style="z-index:1000;">
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
			$return = $parseQuery->find();
			for ($i = (int)0; $i< count($return->results) ;$i++)
			{
				$array[$i]=$return->results[$i]->title;
				echo $array[$i];	
			 }
				sort($array);
			for ($i = (int) 0;$i< count($array);$i++)
			{
			?>
				<option value=<?php echo $array[$i];?>><?php echo $array[$i];?></option>
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
				<br />
                <input type="submit" id="submitbutton" class="button" value="Submit" />
              </fieldset>
                    </form>
            <a class="close-reveal-modal">&#215;</a> </div>
                </div>
                          
                          <li><a href="#" data-reveal-id="myModal1"><span class="sign-in">Sign In</span></a></li>
                			<div id="myModal1" class="reveal-modal medium" data-reveal style="z-index:1000; height:250px;">
                                        <div id="benefits">
                                                  <?php
											if(isset($_GET['logout']))
											{
												session_unset();
												session_destroy();
												
											}
											 if(isset($_SESSION['currentUser']))
												header("Location: dashboard.php");
											
										
										else
										{
										  ?>
                              <form id="msform" method="post" action="register.php">
                      			  <fieldset>
                                  	<div class="row">
                          			  <div class="large-12 columns">
                                      <input type="email" name="username" class="error" placeholder="Email" />
                                    </div>
                           			 <div class="large-12 columns">
                                      <input type="password" name="password" placeholder="Password" />
                                    </div>
                            		<div class="large-12 columns"> <span id="mymessage">
                             		 <?php if(isset($_GET['invalid'])) { echo 'Invalid username or password'; } ?>
                             		 </span> </div>
                          			</div>
                                  <div class="large-12 columns" style="margin-bottom:10px;">
                                  <a href="forgotpass.php"> <u style="color:rgb(255, 120, 120);" ;>Forgot your Password</u></a> </div>
                                  <input type="submit" name="submit" class="button" value="Submit" />
                                </fieldset>
                      </form>
                              <?php } ?>
</div>
                    <a class="close-reveal-modal">&#215;</a> </div>
                  
                          <div class="clear"> </div>
                        </ul>
              </div>
                      <a class="boxclose" id="boxclose"> <span> </span></a> </div>
          </div>
                </div>
      </div>
            </div>
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
<div class="content">
  <div class="wrap">
    <div class="top-grids" id="about">
              <h3>NEVER RIDE ALONE</h3>
              </br>
              <P> Going somewhere? Want company? Savaree is the answer. Need a ride? Savaree is the answer. </P>
              </br>
              <div class="search-route-form">
        <form method="POST" id="searchform" action="search.php">
                  <input type="text" id="autocomplete" placeholder="Start" />
                  <input type="text" id="dropoff" placeholder="End" />
                  <input type="hidden" name="startlat" id="startlat" />
                  <input type="hidden" name="startlong" id="startlong" />
                  <input type="hidden" name="stoplat" id="stoplat" />
                  <input type="hidden" name="stoplong" id="stoplong" />
          <input class="button" type="button" id="searchbutton" value="Search Button" />
                  <div class="clear"> </div>
                </form>
      </div>
              <div class="clear"> </div>
            </div>
  </div>
  <div class="works" id="works">
    <div class="wrap">
              <h2>See how it works.</h2>
            </div>
    <div class="wmuSlider example3" style="height: 556px;">
      <div class="wmuSliderWrapper" style="margin-left: -4047px; width: 6745px; display: block;">
        <article data-index="1" style="float: left; width: 1349px;">
          <div class="wrap">
            <div class="artical-info">
              <h4>POST ROUTES!</h4>
              <p>Post your route by telling us where you'll start and where you'll end up. If you want, you can also tell us of all the awesome places you'll be passing by on your way.</p>
            </div>
            <div class="artical-pic"> <img src="img/post.png"></div>
          </div>
        </article>
        <article data-index="1" style="float: left; width: 1349px;">
          <div class="wrap">
            <div class="artical-info">
              <h4>SEARCH ROUTES!!</h4>
              <p>Tell us where you want to go, and we'll automatically tell you of all the great drivers going there, passing by somewhere near you. Feeling adventurous? A simple click will tell you everybody who's nearby and where they're going. Hop aboard!</p>
            </div>
            <div class="artical-pic"> <img src="img/search.png"></div>
          </div>
        </article>
        <article data-index="1" style="float: left; width: 1349px;">
          <div class="wrap">
            <div class="artical-info">
              <h4>RATE DRIVERS!</h4>
              <p>Hitched a ride? Rate each other and let us find the star drivers in our community.</p>
            </div>
            <div class="artical-pic"> <img src="img/profile.png"></div>
          </div>
        </article>
      </div>
<a class="wmuSliderPrev">Previous</a><a class="wmuSliderNext">Next</a>
      <ul class="wmuSliderPagination">
        <li><a href="#" class="">0</a></li>
        <li><a href="#" class="">1</a></li>
        <li><a href="#" class="">2</a></li>
        <li><a href="#" class="wmuActive">3</a></li>
      </ul>
          </div>
    <script type="text/javascript" src="js/modernizr.custom.min.js"></script> 
    <script src="js/jquery.wmuSlider.js"></script> 
    <script>
				        $('.example3').wmuSlider({
				            touch: Modernizr.touch,
				            animation: 'slide',
				            items:1
				        });
				    </script> 
  </div>
  <div class="wrap">
    <div class="top-grids" id="about">
              <div class="top-grid">
        <h4>It's Safe</h4>
        <p>Join our vetted network of reliable, trustworthy  individuals. All have had background checks! </p>
      </div>
              <div class="top-grid">
        <h4></span> It's Cheap</h4>
        <p>Savaree is the cheapest way to enjoy the comfort of a car, whether it's your own, or you're sharing with someone else.</p>
      </div>
              <div class="top-grid">
        <h4>It's Friendly</h4>
        <p>With a healthy, vibrant community of carpoolers, we guarantee that you'll have a great time ridesharing!</p>
      </div>
              <div class="top-grid">
        <h4>It's Green</h4>
        <p>Every time you share a ride, that's one less vehicle on the road, be it your own car or a taxi. </p>
      </div>
              <div class="clear"> </div>
            </div>
  </div>
          <div class="test-monials-grids">
    <div class="wrap">
              <div class="examples" id="textslider">
        <div class="slider">
                  <p> Don't have a smartphone? No worries. Call us on our hotline to hitch a ride! </br>
          <h3>03431109464</h3>
          </p>
                  <div class="clearit"> </div>
                </div>
      </div>
            </div>
    <script src="js/jquery-ui.min.js"></script> 
    <script src="js/hammer.min.js"></script> 
    <script src="js/responsiveCarousel.js"></script> 
    <script>
				/* Okay, everything is loaded. Let's go! (on dom ready) */
				$(function () {
				    /* a generic product carousel - something that might appear in the body of a e-commerce site. */
				    $('#textslider')
				        .responsiveCarousel({
				            unitWidth:          'compute',
				            target:             '#textslider .slider-target',
				            unitElement:        '#textslider .slider-target > li',
				            mask:               '#textslider .slider-mask',
				            arrowLeft:          '#textslider .arrow-left',
				            arrowRight:         '#textslider .arrow-right',
				            dragEvents:         Modernizr.touch,
				            responsiveUnitSize:function () {
				                return 1;
				            },
				            step:-1,
				            onShift:function (i) {
				                var $current = $('#selector li a[rel=frame_' + i + ']');
				                $('#selector li a').removeClass('current');
				                $current.addClass('current');
				            }
				        });
				
				    /* this next part toggles the "auto slide show" option. */
				    $('#toggle-slide-show').on('click', function (ev) {
				        ev.preventDefault();
				        $('#textslider').responsiveCarousel('toggleSlideShow');
				    });
				
				    /* this lets us jump to a slide */
				    $('#selector a').on('click', function (ev) {
				        ev.preventDefault();
				        var i = /\d/.exec($(this).attr('rel'));
				        $('#textslider').responsiveCarousel('goToSlide', i);
				    });
				
				});
				$(window).on('load',function(){
				    $('.examples').responsiveCarousel('redraw');
				});
				</script> 
  </div>
        </div>
</div>
<div class="get-intouch" id="contact">
          <div class="wrap">
    <div class="get-intouch-grids">
              <div class="get-intouch-center-form">
        <h5>Say hello!</h5>
        <form id="feedbackform" method="post" action="feedback.php">
                  <input type="text" id="feedname" name="name" placeholder="Name" />
                  <input type="text" id="feedemail" name="email" placeholder="Email" />
                  <textarea name="message" id="feedmessage" placeholder="Your Message"></textarea>
                  <input type="submit" id="feedsubmit" class="button" value="Send message" />
                  <div class="clear"> </div>
				  </form>
				  <div class="get-intouch-right-social">
            <ul>
                      <li><a class="facebook normalTip" title="facebook"  href="https://www.facebook.com/savareeofficialapp"> </a></li>
                      <li><a class="twitter normalTip" title="Twitter"  href="https://twitter.com/savareeapp"> </a></li>
                      <li><a class="linkedin normalTip" title="Linkedin" href="http://pk.linkedin.com/company/savaree?trk=ppro_cprof"> </a></li>
                    </ul>
          </div>
                  
                
      </div>
              <div class="get-intouch-right-form">
            
              <!-- Begin MailChimp Signup Form -->
<link href="css/mailchimp.css" rel="stylesheet" type="text/css">
<style type="text/css">
	#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
	/* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
</style>
<div id="mc_embed_signup">
<form action="//savareeapp.us8.list-manage.com/subscribe/post?u=2f296bb1546bff1698df8906d&amp;id=7038efba29" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
	<h2>Subscribe today!</h2>
<div class="mc-field-group">
	<label for="mce-EMAIL">Enter your email address to receive Savaree's bi-monthly
            newsletter with latest updates, stories and cool stuff!</label>
            </br>
	<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
</div>
	<div id="mce-responses" class="clear">
		<div class="response" id="mce-error-response" style="display:none"></div>
		<div class="response" id="mce-success-response" style="display:none"></div>
	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;"><input type="text" name="b_2f296bb1546bff1698df8906d_7038efba29" tabindex="-1" value=""></div>
    </br>
    <div class="clear" style="padding-top:35px;"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
</form>
</div>
      </div>
<script type="text/javascript" src="js/jquery.atooltip.js"></script> 
              <script type="text/javascript">
							$(function(){ 
								$('a.normalTip').aToolTip();
								}); 
						</script>
              <div class="clear"> </div>
            </div>
  </div>
        </div>
<div class="copy-right">
          <div class="wrap">
    <div id="bottom"> Copyright.2014. <a href="savareeapp.com/pp.html">Privacy Policy |</a> <a href="http://savareeapp.com/">www.savareeapp.com</a> </div>
    <div class="clear"> </div>
  </div>
        </div>
<script type="text/javascript">
									$(document).ready(function(){
									$('a[href^="#"]').on('click',function (e) {
									    e.preventDefault();
									    var target = this.hash,
									    $target = $(target);
									    $('html, body').stop().animate({
									        'scrollTop': $target.offset().top
									    }, 1000, 'swing', function () {
									        window.location.hash = target;
									    });
									});
								});
							</script><script src="js/vendor/jquery.js"></script> 
<script src="js/foundation.min.js"></script> 
<script>
      $(document).foundation();
    </script>
</body>
</html>
