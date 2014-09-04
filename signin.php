<?php
 session_start();

 ?>
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
</head>
<body class="signs">
<!-- multistep form -->
<div id="benefits">
  <div class="logo-signin"><a href="http://savareeapp.com/"><img src="img/logo.png"/></a></div>
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
          <!-- <small class="error">Invalid entry</small>--> 
        </div>
        <div class="large-12 columns">
          <input type="password" name="password" placeholder="Password" />
        </div>
		
		<div class="large-12 columns">
          <span id="mymessage"><?php if(isset($_GET['invalid'])) { echo 'Invalid username or password'; } ?></span>
        </div>
      </div>
      <div class="large-12 columns"> <a href="forgotpass.php"> <u>Forgot your Password</u></a> </div>
      <input type="submit" name="submit" class="submit action-button" value="Submit" />
	  
    </fieldset>
  </form>
  <?php } ?>
</div>
<!-- jQuery --> 
<script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script> 
<!-- jQuery easing plugin --> 
<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>
</body>
</html>