<?php
	session_start();
	include_once 'EnhanceTestFramework.php';
	require_once 'parse.php';
	/*error_reporting(0);
	ini_set('display_errors', 0);*/
	if(isset($_SESSION['currentUser']))
	{		
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
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
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
<link rel="stylesheet" href="css/foundation-icons/foundation-icons.css" />
<link rel="stylesheet" type="text/css" href="css/index.css" />
<link rel="stylesheet" type="text/css" href="css/foundation-datepicker.css" />


<script src="js/modernizr.custom.js"></script>
<script src="js/vendor/modernizr.js"></script>
<script src="js/foundation/foundation.accordion.js"></script>
<script src="js/jquery-2.1.1.min.js" type="text/javascript"></script>
<script src="js/foundation/foundation-datepicker.js" type="text/javascript"></script>

<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>

<script type="text/javascript"> 

function stopRKey(evt) { 
  var evt = (evt) ? evt : ((event) ? event : null); 
  var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null); 
  if ((evt.keyCode == 13) && (node.type=="text"))  {return false;} 
} 

document.onkeypress = stopRKey; 

</script>


<script type="text/javascript">



$(function(){




var autocomplete;
var addressEnd;
var addressStart;
var latlngstart;
var address = new Array();
var myMarker;
var tempdist;
var rendererOptions = {
  
  draggable: false
  
  
};
var clicked =0;
var orign;
var dest;
var directionsDisplay = new google.maps.DirectionsRenderer(rendererOptions);

var directionsService = new google.maps.DirectionsService();
var map;



function initialize() {
	
  var mapOptions = {
    zoom: 15
  };
  map = new google.maps.Map(document.getElementById('map_canvas'),
      mapOptions);

  // Try HTML5 geolocation
  if(navigator.geolocation) 
  {
		navigator.geolocation.getCurrentPosition(function(position) 
		{
		var pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

      var infowindow = new google.maps.InfoWindow({
        map: map,
		position: pos }); 

      map.setCenter(pos);
	  
	
	   var marker = new google.maps.Marker({
      position: pos,
      map: map,
      title: 'You are here!',
	  animation: google.maps.Animation.DROP
  });
	  
	  
    }, function() {
      handleNoGeolocation(true);
    });
  } 
  else {
    // Browser doesn't support Geolocation
    handleNoGeolocation(false);
  }
	
	/*------------------<when Writing on fields>---------------*/

 autocomplete = new google.maps.places.Autocomplete(
                  /** @type {HTMLInputElement} */(document.getElementById('autocomplete')),
                  { types: ['geocode'] });
				  
              google.maps.event.addListener(autocomplete, 'place_changed', function() {
			  
				var geocoder = new google.maps.Geocoder();
				orign = $("#autocomplete").val();

				geocoder.geocode( { 'address': orign}, function(results, status) {

				if (status == google.maps.GeocoderStatus.OK) {
				var latitude = results[0].geometry.location.lat();
				var longitude = results[0].geometry.location.lng();
	
				map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);

				orign = new google.maps.LatLng(latitude, longitude);
				
				map.setCenter(orign);
	 } 
  
  });
				
              });
			  
			  
			   dropoff = new google.maps.places.Autocomplete(
                  /** @type {HTMLInputElement} */(document.getElementById('dropoff')),
                  { types: ['geocode'] });
				  
              google.maps.event.addListener(dropoff, 'place_changed', function() {
			  dest = $("#dropoff").val();
			  
			  var geocoder2 = new google.maps.Geocoder();
			  geocoder2.geocode( { 'address': dest}, function(results, status) {
				
				if (status == google.maps.GeocoderStatus.OK) {
				var latitude = results[0].geometry.location.lat();
				var longitude = results[0].geometry.location.lng();
	
				

				dest = new google.maps.LatLng(latitude, longitude);
				
				
			  }
			  });
			  
			  directionsDisplay.setMap(map);
	  directionsDisplay.setPanel(document.getElementById('directionsPanel'));
	 

  google.maps.event.addListener(directionsDisplay, 'directions_changed', function() {
  
    computeTotalDistance(directionsDisplay.getDirections());
	
  });
  
  calcRoute();
		  
              });
			  
			  
			  
$('#autocomplete').keyup(function(){			  
			  var geocoder = new google.maps.Geocoder();
  orign = $("#autocomplete").val();

geocoder.geocode( { 'address': orign}, function(results, status) {

  if (status == google.maps.GeocoderStatus.OK) {
    var latitude = results[0].geometry.location.lat();
    var longitude = results[0].geometry.location.lng();
	
	map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);

            orign = new google.maps.LatLng(latitude, longitude);
             map.setCenter(orign);
			 
var marker = new google.maps.Marker({

                 map: map,

                 position: orign,
                 title: 'center'

             });
            
   
  } 
  
  });
});
/*------------------------</when Writing on fields>------------------*/
	
	
	
	
  
  /*----------<adding market to the map on click>-----------*/
  
  
  google.maps.event.addListener(map, 'click', function(event) {
  clicked++;
  placeMarker(event.latLng);
  
});

}


function placeMarker(location) {

var currentlat ="";
		var currentlong="";
		var latlngString = location.toString();
		
		for (var j=0 ; j<latlngString.length; j++)
  {
		if(latlngString[j] == ',')
		{
		
			for (var k=1;k<j;k++)
			{
				currentlat  += latlngString[k];
			}
			for (var l=j+1;l<latlngString.length-1;l++)
			{
				currentlong += latlngString[l]; 
			}
			break;
		}
  }
	  
	
	if(clicked==1)
	{
	
		Convert_LatLng_To_Address(currentlat,currentlong);
		
		
		
		orign = location;
		myMarker = new google.maps.Marker({
        map: map, 
		position: location,
		animation: google.maps.Animation.DROP
		
      });
		
	}
	if(clicked==2)
	{
		Convert_LatLng_To_Address(currentlat,currentlong);
		
		
		dest = location;
		
		myMarker.setMap(null);
	directionsDisplay.setMap(map);
	  directionsDisplay.setPanel(document.getElementById('directionsPanel'));
	 

  google.maps.event.addListener(directionsDisplay, 'directions_changed', function() {
    computeTotalDistance(directionsDisplay.getDirections());
  });

  calcRoute();
  
  

  /*----------</adding market to the map on click>-----------*/
  
 
 
}
}

function calcRoute() {

  var request = {
    origin: orign,
    destination: dest,
  
    travelMode: google.maps.TravelMode.DRIVING
  };
  
  
  directionsService.route(request, function(response, status) {
  
 
 tempdist = response.routes[0].legs[0].distance.value;
  
 
 tempdist = tempdist/10;
  

  var currentpos = orign;
  var currentlat='';
  var currentlong='';
  var tempLat;
  var  tempLong;
  var latlngString; 
 
 // var dist = google.maps.geometry.spherical.computeDistanceBetween (currentpos, latlngString);
  
 /*  for (var j=0 ; j<currentpos.length; j++)
  {
		if(currentpos[j] == ',')
		{
			for (var k=1;k<j;k++)
			{
				currentlat  += currentpos[k];
			}
			for (var l=j+1;l<currentpos.length-1;l++)
			{
				currentlong += currentpos[l]; 
			}
			break;
		}
  }
  */
  $("#point0").val("lat/lng: " + orign);
  
  $("#point9").val("lat/lng: " + dest);
  
  
  var p = 1;
  for (var i = 0; i<response.routes[0].overview_path.length; i++)
  {
	latlngString = response.routes[0].overview_path[i];
	
	var dist = google.maps.geometry.spherical.computeDistanceBetween (currentpos, latlngString);
	

	
	if(dist>=tempdist)
	{
		
		currentpos = response.routes[0].overview_path[i];
		if(p<9)
		{
		$("#point" + p).val("lat/lng: " + response.routes[0].overview_path[i]);
		p++;
		}
	}
	
	
	}

	
  
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
            
    }
  });
}
	




	
 
function handleNoGeolocation(errorFlag) {
  if (errorFlag) {
    var content = 'Error: The Geolocation service failed.';
  } else {
    var content = 'Error: Your browser doesn\'t support geolocation.';
  }

  var options = {
    map: map,
    position: new google.maps.LatLng(60, 105),
    content: content
  };

  var infowindow = new google.maps.InfoWindow(options);
  map.setCenter(options.position);
}

function Convert_LatLng_To_Address(lat, lng) {
            var url = "http://maps.googleapis.com/maps/api/geocode/json?latlng=" + lat + "," + lng + "&sensor=false";
            jQuery.getJSON(url, function (json) {
                Create_Address(json);
            });     
    }
	
	function Create_Address(json) {
        if (!check_status(json))
		{
				// If the json file's status is not ok, then return
            return 0;
		}	
		
        address['country'] = google_getCountry(json);
        address['province'] = google_getProvince(json);
        address['city'] = google_getCity(json);
        address['street'] = google_getStreet(json);
        address['postal_code'] = google_getPostalCode(json);
        address['country_code'] = google_getCountryCode(json);
        address['formatted_address'] = google_getAddress(json);
		address['area'] = google_getArea(json);
		address['neighborhood'] = google_getNeighborhood(json);
        if(clicked==1)
		{
			changeAutoComplete();
		}
		else if(clicked == 2)
		{
			changeDropOff();
		}
    }
	
	function changeAutoComplete()
	{
	
		if(address['street'])
		{
			$("#autocomplete").val(address['street']);
		}
		if(address['neighborhood'])
		{
			$("#autocomplete").val($("#autocomplete").val() + ", " + address['neighborhood']);
		}
		if(address['area'])
		{
			$("#autocomplete").val($("#autocomplete").val() + ", " + address['area']);
		}
		if(address['city'])
		{
			$("#autocomplete").val($("#autocomplete").val() + ", " + address['city']);
		}
		if(address['province'])
		{
			$("#autocomplete").val($("#autocomplete").val() + ", " + address['province']);
		}
		if(address['country'])
		{
			$("#autocomplete").val($("#autocomplete").val() + ", " + address['country']);
		}
		
	}
	
	function changeDropOff()
	{
	
		if(address['street'])
		{
			$("#dropoff").val(address['street']);
		}
		if(address['neighborhood'])
		{
			$("#dropoff").val($("#dropoff").val() + ", " + address['neighborhood']);
		}
		if(address['area'])
		{
			$("#dropoff").val($("#dropoff").val() + ", " + address['area']);
		}
		if(address['city'])
		{
			$("#dropoff").val($("#dropoff").val() + ", " + address['city']);
		}
		if(address['province'])
		{
			$("#dropoff").val($("#dropoff").val() + ", " + address['province']);
		}
		if(address['country'])
		{
			$("#dropoff").val($("#dropoff").val() + ", " + address['country']);
		}
		
	}
	
	 function check_status(json) {
        if (json["status"] == "OK") return true;
        return false;
    }   
	
	function google_getCountry(json) {
        return Find_Long_Name_Given_Type("country", json["results"][0]["address_components"], false);
    }
	function google_getArea(json) {
		return Find_Long_Name_Given_Type("sublocality", json["results"][0]["address_components"],false);
	}
	function google_getNeighborhood(json) {
		return Find_Long_Name_Given_Type("neighborhood", json["results"][0]["address_components"],false);
	}
    function google_getProvince(json) {
        return Find_Long_Name_Given_Type("administrative_area_level_1", json["results"][0]["address_components"], true);
    }
	
    function google_getCity(json) {
        return Find_Long_Name_Given_Type("locality", json["results"][0]["address_components"], false);
    }
    function google_getStreet(json) {
        return Find_Long_Name_Given_Type("route", json["results"][0]["address_components"], false);
    }
    function google_getPostalCode(json) {
        return Find_Long_Name_Given_Type("postal_code", json["results"][0]["address_components"], false);
    }
    function google_getCountryCode(json) {
        return Find_Long_Name_Given_Type("country", json["results"][0]["address_components"], true);
    }
    function google_getAddress(json) {
        return json["results"][0]["formatted_address"];
    }   

		function Find_Long_Name_Given_Type(t, a, short_name) {
        var key;
        for (key in a ) {
            if ((a[key]["types"]).indexOf(t) != -1) {
                if (short_name) 
                    return a[key]["short_name"];
                return a[key]["long_name"];
            }
        }
		}
	
	$("input[type='image']").click(function(e) {
    $("input[id='myfile']").click();
	e.preventDefault();
	$("input[id='myfile']").change(function(){
	
	
		$("#myform").submit();
	});
});
	
	var validated = false;
	
$("#submitbutton").click(function()
	{
		if($("#autocomplete").val() =="")
		{
			alert("pickup point missing");
			validated = false;
		}
		else if($("#dropoff").val()=="")
		{
			alert("drop point missing");
			
			
			validated = false;
			
		}
		else if($("#time").val()=="")
		{
			alert("time missing");
			
			
			validated = false;
		}
		else if($("#date").val() =="")
		{
			alert("Date missing");
			
			
			validated = false;
		}
		else if($("#noseats").val()=="")
		{
			alert("number of seats missing");
			
			validated = false;
		}
		else if($("#model").val() =="")
		{
				alert("model missing");
				
				
				validated = false;
		}
		else if ($("#color").val() == "")
		{
				alert("color missing");
				
				validated = false;
		}
		else if ($("#plate").val() == "")
		{
			alert("number plate missing");
				
				validated = false;
		}
		
		else
		{
		
			validated = true;
		}
		return validated;
	
	});



google.maps.event.addDomListener(window, 'load', initialize);
});

      </script>
	  
	  
</head>

<body>

<div class="off-canvas-wrap" data-offcanvas>
  <div class="inner-wrap">
  
  
  
  
   <?php if(isset($_GET['routeposted']))
  { ?>
  <div data-alert class="alert-box success">
	<center>Route has been posted</center>
  <a href="#" class="close">&times;</a>
  </div>
  <?php } ?>
  
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
	
      <section class="left-small"><i class="left-off-canvas-toggle step fi-align-justify size-30"></i> </section>
	  
      <section class="middle tab-bar-section">
        <h1 class="title">Post a Route</h1>
        <div class="secondary-nav">
          <ul>
          <!--  <li><a href="#"><i class="step fi-torso size-21"></i></a></li>
            <li><a href="#"><i class="step fi-comment size-21"></i></a></li> -->
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
					<input type="hidden" name="comingpath" value="postaride.php" />
				</form>
            
            <?php echo $_SESSION['currentUserName']; ?></label>
        </li>
        <li><a href="dashboard.php">Home</a></li>
        <li><a href="postaride.php">Post a Route</a></li>
        <li><a href="bookaride.php">Book a Ride</a></li>
        <li><a href="#">Star Drivers</a></li>
      </ul>
    </aside>
	
	
    <div id="map_canvas"></div>
	
	
	<dl class="accordion" data-accordion>
    
  <Form class="map-forms" method="post" action="publishroute.php">
  <dd class="accordion-navigation">
    <a href="#panel1"><i class="step fi-marker size-36"></i>
        <h2>Location</h2>
        </a>
    <div id="panel1" class="content active">
     
      <div class="tabs-content">
        <div class="content active" id="panel2-1">
           <input id="autocomplete" type="text" name="pickup" placeholder="Pickup Points" />
            <input type="text" id="dropoff" name="dropoff" placeholder="Drop Off Points" />
			<?php for ($p=0; $p<10;$p++) { ?>
			<input id="point<?php echo $p; ?>" type="hidden" name="point<?php echo $p; ?>" />
		  <?php } ?>
        </div>
        
      </div>
    </div>
  </dd>
  <dd class="accordion-navigation">
   <a href="#panel2"><i class="step fi-clock size-36"></i>
        <h2>Time</h2>
        </a>
        <div id="panel2" class="content">
         
            <input id="time" type="time" name="time" placeholder="Time" />
          
            <input id="date" type="date" name="date" placeholder="Date" />
			<input type="hidden" name="email" value="<?php echo $_SESSION['currentUser']; ?>" />
			<input type="hidden" name="username" value="<?php echo $_SESSION['currentUserName']; ?>" />
            
        </div>
     </dd>
     
  <dd class="accordion-navigation"> 
  <a href="#panel3"><i class="step fi-clipboard-notes size-36"></i>
        <h2>Details</h2>
        </a>
    <div id="panel3" class="content">
       <input id="noseats" type="text" name="noSeats" placeholder="Number of Seats" />
            <input id="model" type="text" name="model" placeholder="Car Model" />
            <input id="color" type="text" name="color" placeholder="Car Color" />
            <input id="plate" type="text" name="plate" placeholder="Number Plate" />
           
      </div>
  </dd>
  
   <div id="ride-button">
        <input type="submit" id="submitbutton" class="button radius left" value="Publish Route" />
        </div>
		
  </Form>
</dl>

	<!--
    <dl class="accordion" data-accordion>
      <dd> 
      <a href="#panel1"><i class="step fi-marker size-36"></i>
        <h2>Location</h2>
        </a>
		<Form class="map-forms" method="post" action="publishroute.php">
        <div id="panel1" class="content active">
         
            <input id="autocomplete" type="text" name="pickup" placeholder="Pickup Points" />
            <input type="text" id="dropoff" name="dropoff" placeholder="Drop Off Points" />
			<?php for ($p=0; $p<10;$p++) { ?>
			<input id="point<?php echo $p; ?>" type="hidden" name="point<?php echo $p; ?>" />
		  <?php } ?>
		</div>
      </dd>
      
      <dd> <a href="#panel2"><i class="step fi-clock size-36"></i>
        <h2>Time</h2>
        </a>
        <div id="panel2" class="content">
         
            <input id="time" type="time" name="time" placeholder="Time" />
          
            <input id="date" type="date" name="date" placeholder="Date" />
			<input type="hidden" name="email" value="<?php echo $_SESSION['currentUser']; ?>" />
			<input type="hidden" name="username" value="<?php echo $_SESSION['currentUserName']; ?>" />
            
        </div>
      </dd>
      <dd> <a href="#panel3"><i class="step fi-clipboard-notes size-36"></i>
        <h2>Details</h2>
        </a>
        <div id="panel3" class="content">
           
            <input id="noseats" type="text" name="noSeats" placeholder="Number of Seats" />
            <input id="model" type="text" name="model" placeholder="Car Model" />
            <input id="color" type="text" name="color" placeholder="Car Color" />
            <input id="plate" type="text" name="plate" placeholder="Number Plate" />
           
        </div>
        <div id="ride-button">
        <input type="submit" id="submitbutton" class="button radius left" value="Publish Route" />
        </div>
		
        
		
        </form>
    
    </dl>
  </div>
</div>
</div>-->
</section>
<a class="exit-off-canvas"></a>
</div>
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
else {
	header("Location: signin.php?invalid=1");
} 
?>
