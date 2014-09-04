<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Savaree!</title>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
<script src="js/ga.js" async="" type="text/javascript"></script>
<script async="" src="js/ga_001.js" type="text/javascript"></script>
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.capty.min.js" type="text/javascript"></script>
<script src="js/jquery.easing.1.3.js" type="text/javascript"></script>
<script src="js/scripts.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="css/demo.css" />
<link rel="stylesheet" type="text/css" href="css/component.css" />
 <link rel="stylesheet" type="text/css" href="css/foundation.css" />
<link rel="stylesheet" type="text/css" href="css/index.css" media="all">
<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all"/>
 <link rel="stylesheet" type="text/css" href="css/index.css" media="all">       
         <link rel="stylesheet" type="text/css" href="css/index.css" media="all">       
        
<link href="css/style-new.css" rel="stylesheet" type="text/css" media="all"/>

</head>
<body>
<!--<div class="" id="top_wrapper1">
  <div id="top">
    <div id="menu1">
      <ul class="scroll nav">
        <span style="float:right;">
        <li><a href="signin.html">Sign In</a></li>
        <li><a href="signup.html">Sign Up</a></li>
        </span>
      </ul>
    </div>
  </div>
  <br>-->
 <div id="header1">
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
                          <li><a href="#" data-reveal-id="myModal1"><span class="sign-in">Sign In</span></a></li>
                			<div id="myModal1" class="reveal-modal medium" data-reveal style="z-index:1000; height:250px;">
                                        <div id="benefits">
                                                  <?php
											if(isset($_GET['logout']))
											{
												session_unset();
												session_destroy();
												echo 'logged out now';
												header("Location: signin.php");
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
  <div class="press">
          <ul>
          
            <li class="award1"> <a href="http://www.worldbank.org/en/news/feature/2014/05/23/putting-peshawar-at-the-helm-of-digital-change target="blank"> <img src="img/worldbank.png" alt="HOW">
              <p><strong>World Bank Blog</strong><br>
               Putting Peshawar at the Helm of...<br>
               </p>
              </a> </li>
              <li class="award1"> <a href="http://www.techinasia.com/savaree-app-for-carpooling-in-pakistan/ target="blank"> <img src="img/techinasia.png" alt="HOW">
              <p><strong>Tech In Asia</strong><br>
               This good-looking new app brings ...<br>
               </p>
              </a> </li>
            
            <li class="award1"> <a href="http://www.dailymotion.com/video/x1q8v1y_weekend-world-with-huma-date-19-04-2014_shortfilms" target="blank"> <img src="img/ptvworld.png" alt="HOW">
              <p><strong>Weekend World Interview</strong><br>
                Pakistani App Developers Interview with Huma A.Shah<br>
                </p>
              </a> </li>
            <li class="award1"> <a href="http://tribune.com.pk/story/697068/carpool-initiative-up-for-sharing-a-savaree/" target="blank"> <img src="img/expresstribune.png" alt="HOW">
              <p><strong>Express Tribune Interview</strong><br>
                Carpool initiative: Up for sharing a savaree?<br>
               </p>
              </a> </li>
            <li class="award1"> <a href="http://www.pakwheels.com/blog/2014/04/18/savaree-car-sharing-app-pakistan/" target="blank"> <img src="img/pakwheels.png" alt="HOW">
              <p><strong>Pak Wheels Blogpost</strong><br>
                Savaree is a car sharing app for Pakistan<br>
               </p>
              </a> </li>
            <li class="award1" style="clear:left;"> <a href="http://www.bbc.co.uk/urdu/science/2014/02/140207_hackathon_computer_apps_zs.shtml" target="blank"> <img src="img/bbc.png" alt="HOW">
              <p><strong>BBC Urdu Interview</strong><br>
                ہیکاتھنز: ٹیکنالوجی سے معاشرتی مسائل کے حل کی کوشش <br>
               </p>
              </a> </li>
            <li class="award1"> <a href="http://theappjuice.com/savaree-pakistans-first-car-pooling-mobile-application/" target="blank"> <img src="img/theappjuice.png" alt="HOW">
              <p><strong>The Appjuice Interview</strong><br>
                Savaree – Pakistan's first Car Pooling Mobile Application!<br>
               </p>
              </a> </li>
            <li class="award1"> <a href="http://www.scoopcircle.com/savaree-first-car-pooling-app-in-pakistan/" target="blank"> <img src="img/scoop.png" alt="HOW">
              <p><strong>Scoop Circle Blogpost</strong><br>
                Savaree – First Car Pooling App In Pakistan<br>
                </p>
              </a> </li>
            <li class="award1" style="clear:left;"> <a href="http://www.bbc.co.uk/urdu/science/2014/02/140207_hackathon_computer_apps_zs.shtml" target="blank"> <img src="img/brand.png" alt="HOW">
              <p><strong>Brandsyanario Blogpost</strong><br>
                Savaree – Pakistan's First Online Car Pooling App <br>
               </p>
              </a> </li>
            <li class="award1"> <a href="http://madeforpakistan.com/savaree-app-review/" target="blank"> <img src="img/made.png" alt="HOW">
              <p><strong>Made for Pakistan Blogpost</strong><br>
                Savaree | First Carpooling App in Pakistan<br>
                </p>
              </a> </li>
            <li class="award1"> <a href="http://appistan.pk/savaree-car-pooling-platform-of-pakistan/" target="blank"> <img src="img/appistan.png" alt="HOW">
              <p><strong>Appistan Blogpost</strong><br>
                Savaree – Car Pooling Platform of Pakistan<br>
                </p>
              </a> </li>
          </ul>
        </div>
   <div class="copy-right">
          <div class="wrap">
    <div id="bottom"> Copyright.2014. <a href="savareeapp.com/pp.htmll">Privacy Policy |</a> <a href="http://savareeapp.com/">www.savareeapp.com</a> </div>
    <div class="clear"> </div>
  </div>
        </div>
    		<script src="js/cbpFWTabs.js"></script>
		<script>
			new CBPFWTabs( document.getElementById( 'tabs' ) );
		</script>
        
         
    <script src="js/vendor/jquery.js"></script> 
<script src="js/foundation.min.js"></script> 
<script>
      $(document).foundation();
    </script> 

</body>
</html>
