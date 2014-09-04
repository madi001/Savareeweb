<?php
/*error_reporting(0);
	ini_set('display_errors', 0);*/
?>
</html>
 <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Home</title>
        <meta name="description" content="Sidebar Transitions: Transition effects for off-canvas views" />
        <meta name="keywords" content="transition, off-canvas, navigation, effect, 3d, css3, smooth" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/foundation.css" />
        <link rel="stylesheet" type="text/css" href="css/icons.css" />
        <link rel="stylesheet" type="text/css" href="css/normalize2.css" />
        <link rel="stylesheet" type="text/css" href="css/index.css" />
        <link rel="stylesheet" href="css/foundation-icons/foundation-icons.css" />
        <script src="js/modernizr.custom.js"></script>
        <script src="js/vendor/modernizr.js"></script>
		
	
    </head>
<body class="signs">


<?php if(isset($_GET['forgot']))
  { ?>
  <div data-alert class="alert-box alert">
	Incorrect Email please try again
  <a href="#" class="close">&times;</a>
  </div>
  
  <?php } ?>

<!-- multistep form -->
<div id="benefits">
 <div class="logo-signin"><a href="http://savareeapp.com/"><img src="img/logo.png"/></a></div>
 
 
<form id="msform" method="post" action="forgotpassaction.php">

	<fieldset>
		<div class="row">
         <p>Enter your Email ID</p>
    		<div class="large-12 columns"><input type="text" name="email" class="error" placeholder="Email" />
           <!-- <small class="error">Invalid entry</small>-->
           </div>
    		
   			
	 </div>
      
     
     <input type="submit" name="submit" class="submit action-button" value="Submit" />
    </fieldset>
    	
   
</form>
<div id="result"></div>
</div>
<!-- jQuery -->
<script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<!-- jQuery easing plugin -->
<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>



</body>
</html>
