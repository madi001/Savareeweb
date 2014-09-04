<html>
	<head>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
		<script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
		<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
		
		<script type="text/javascript">
			$(function(){
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
				
				alert(latitude);
				
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
			  
			 


});
/*----------------------- </When Writing on Fields> --------------------------------------- */	
			
		</script>
	</head>
	<body>
	
	<form method="POST" action="indexsearch.php">
							<input type="text" id="autocomplete" />
							<input type="text" id="dropoff" />
							<input type="hidden" name="startlat" id="startlat" />
							<input type="hidden" name="startlong" id="startlong" />
							<input type="hidden" name="stoplat" id="stoplat" />
							<input type="hidden" name="stoplong" id="stoplong" />
                        <!--    <input type="Date" value="Date" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Date';}"> -->
							
							<input class="button" type="submit" value="Search Button" />
							
						</form>
		
	</body>
</html>

