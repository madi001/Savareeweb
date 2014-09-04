<?php

include_once 'EnhanceTestFramework.php';
	require_once 'parse.php';
	
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

<script src="js/jquery-2.1.1.min.js" type="text/javascript"></script>

<script type="text/javascript">

$(function(){
	
	var message = "something missing";
	var validated = false;
	
/*	$('#email').blur( function() {
    //ajax request
    $.ajax({
        url: "ajaxemailcheck.php",
		 method: "post",
        data:{'email' : $('#email').val()},
		
        success: function(data) {
            if(data.result) {
                alert('Email exists!');
            }
            else {
                alert('Email doesnt!');
            }
        },
        error: function(data){
            //error
        }
    });
	});
	
	*/
	
				
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
	
			
	});
	
	
	
	


</script>


</head>
<body class="signs">

<!-- multistep form -->
<div id="benefits">
  <div class="logo-signin"><a href="http://savareeapp.com/"><img src="img/logo.png"/></a></div>
  
  
  <form id="msform" method="post" action="signuprequest.php">
    <fieldset>
      <div class="row">
        <div class="large-6 columns">
			
          <input type="text" id="name" name="name" placeholder="Name" />
          <!-- <small class="error">Invalid entry</small>--> 
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
<option value="Afghanistan">Afghanistan</option>
<option value="Åland Islands">Åland Islands</option>
<option value="Albania">Albania</option>
<option value="Algeria">Algeria</option>
<option value="American Samoa">American Samoa</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Anguilla">Anguilla</option>
<option value="Antarctica">Antarctica</option>
<option value="Antigua and Barbuda">Antigua and Barbuda</option>
<option value="Argentina">Argentina</option>
<option value="Armenia">Armenia</option>
<option value="Aruba">Aruba</option>
<option value="Australia">Australia</option>
<option value="Austria">Austria</option>
<option value="Azerbaijan">Azerbaijan</option>
<option value="Bahamas">Bahamas</option>
<option value="Bahrain">Bahrain</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Belarus">Belarus</option>
<option value="Belgium">Belgium</option>
<option value="Belize">Belize</option>
<option value="Benin">Benin</option>
<option value="Bermuda">Bermuda</option>
<option value="Bhutan">Bhutan</option>
<option value="Bolivia">Bolivia</option>
<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
<option value="Botswana">Botswana</option>
<option value="Bouvet Island">Bouvet Island</option>
<option value="Brazil">Brazil</option>
<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
<option value="Brunei Darussalam">Brunei Darussalam</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina Faso">Burkina Faso</option>
<option value="Burundi">Burundi</option>
<option value="Cambodia">Cambodia</option>
<option value="Cameroon">Cameroon</option>
<option value="Canada">Canada</option>
<option value="Cape Verde">Cape Verde</option>
<option value="Cayman Islands">Cayman Islands</option>
<option value="Central African Republic">Central African Republic</option>
<option value="Chad">Chad</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Christmas Island">Christmas Island</option>
<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
<option value="Colombia">Colombia</option>
<option value="Comoros">Comoros</option>
<option value="Congo">Congo</option>
<option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
<option value="Cook Islands">Cook Islands</option>
<option value="Costa Rica">Costa Rica</option>
<option value="Cote D'ivoire">Cote D'ivoire</option>
<option value="Croatia">Croatia</option>
<option value="Cuba">Cuba</option>
<option value="Cyprus">Cyprus</option>
<option value="Czech Republic">Czech Republic</option>
<option value="Denmark">Denmark</option>
<option value="Djibouti">Djibouti</option>
<option value="Dominica">Dominica</option>
<option value="Dominican Republic">Dominican Republic</option>
<option value="Ecuador">Ecuador</option>
<option value="Egypt">Egypt</option>
<option value="El Salvador">El Salvador</option>
<option value="Equatorial Guinea">Equatorial Guinea</option>
<option value="Eritrea">Eritrea</option>
<option value="Estonia">Estonia</option>
<option value="Ethiopia">Ethiopia</option>
<option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
<option value="Faroe Islands">Faroe Islands</option>
<option value="Fiji">Fiji</option>
<option value="Finland">Finland</option>
<option value="France">France</option>
<option value="French Guiana">French Guiana</option>
<option value="French Polynesia">French Polynesia</option>
<option value="French Southern Territories">French Southern Territories</option>
<option value="Gabon">Gabon</option>
<option value="Gambia">Gambia</option>
<option value="Georgia">Georgia</option>
<option value="Germany">Germany</option>
<option value="Ghana">Ghana</option>
<option value="Gibraltar">Gibraltar</option>
<option value="Greece">Greece</option>
<option value="Greenland">Greenland</option>
<option value="Grenada">Grenada</option>
<option value="Guadeloupe">Guadeloupe</option>
<option value="Guam">Guam</option>
<option value="Guatemala">Guatemala</option>
<option value="Guernsey">Guernsey</option>
<option value="Guinea">Guinea</option>
<option value="Guinea-bissau">Guinea-bissau</option>
<option value="Guyana">Guyana</option>
<option value="Haiti">Haiti</option>
<option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
<option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
<option value="Honduras">Honduras</option>
<option value="Hong Kong">Hong Kong</option>
<option value="Hungary">Hungary</option>
<option value="Iceland">Iceland</option>
<option value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
<option value="Iraq">Iraq</option>
<option value="Ireland">Ireland</option>
<option value="Isle of Man">Isle of Man</option>
<option value="Israel">Israel</option>
<option value="Italy">Italy</option>
<option value="Jamaica">Jamaica</option>
<option value="Japan">Japan</option>
<option value="Jersey">Jersey</option>
<option value="Jordan">Jordan</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kenya">Kenya</option>
<option value="Kiribati">Kiribati</option>
<option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
<option value="Korea, Republic of">Korea, Republic of</option>
<option value="Kuwait">Kuwait</option>
<option value="Kyrgyzstan">Kyrgyzstan</option>
<option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
<option value="Latvia">Latvia</option>
<option value="Lebanon">Lebanon</option>
<option value="Lesotho">Lesotho</option>
<option value="Liberia">Liberia</option>
<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lithuania">Lithuania</option>
<option value="Luxembourg">Luxembourg</option>
<option value="Macao">Macao</option>
<option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
<option value="Madagascar">Madagascar</option>
<option value="Malawi">Malawi</option>
<option value="Malaysia">Malaysia</option>
<option value="Maldives">Maldives</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Marshall Islands">Marshall Islands</option>
<option value="Martinique">Martinique</option>
<option value="Mauritania">Mauritania</option>
<option value="Mauritius">Mauritius</option>
<option value="Mayotte">Mayotte</option>
<option value="Mexico">Mexico</option>
<option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
<option value="Moldova, Republic of">Moldova, Republic of</option>
<option value="Monaco">Monaco</option>
<option value="Mongolia">Mongolia</option>
<option value="Montenegro">Montenegro</option>
<option value="Montserrat">Montserrat</option>
<option value="Morocco">Morocco</option>
<option value="Mozambique">Mozambique</option>
<option value="Myanmar">Myanmar</option>
<option value="Namibia">Namibia</option>
<option value="Nauru">Nauru</option>
<option value="Nepal">Nepal</option>
<option value="Netherlands">Netherlands</option>
<option value="Netherlands Antilles">Netherlands Antilles</option>
<option value="New Caledonia">New Caledonia</option>
<option value="New Zealand">New Zealand</option>
<option value="Nicaragua">Nicaragua</option>
<option value="Niger">Niger</option>
<option value="Nigeria">Nigeria</option>
<option value="Niue">Niue</option>
<option value="Norfolk Island">Norfolk Island</option>
<option value="Northern Mariana Islands">Northern Mariana Islands</option>
<option value="Norway">Norway</option>
<option value="Oman">Oman</option>
<option value="Pakistan">Pakistan</option>
<option value="Palau">Palau</option>
<option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
<option value="Panama">Panama</option>
<option value="Papua New Guinea">Papua New Guinea</option>
<option value="Paraguay">Paraguay</option>
<option value="Peru">Peru</option>
<option value="Philippines">Philippines</option>
<option value="Pitcairn">Pitcairn</option>
<option value="Poland">Poland</option>
<option value="Portugal">Portugal</option>
<option value="Puerto Rico">Puerto Rico</option>
<option value="Qatar">Qatar</option>
<option value="Reunion">Reunion</option>
<option value="Romania">Romania</option>
<option value="Russian Federation">Russian Federation</option>
<option value="Rwanda">Rwanda</option>
<option value="Saint Helena">Saint Helena</option>
<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
<option value="Saint Lucia">Saint Lucia</option>
<option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
<option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
<option value="Samoa">Samoa</option>
<option value="San Marino">San Marino</option>
<option value="Sao Tome and Principe">Sao Tome and Principe</option>
<option value="Saudi Arabia">Saudi Arabia</option>
<option value="Senegal">Senegal</option>
<option value="Serbia">Serbia</option>
<option value="Seychelles">Seychelles</option>
<option value="Sierra Leone">Sierra Leone</option>
<option value="Singapore">Singapore</option>
<option value="Slovakia">Slovakia</option>
<option value="Slovenia">Slovenia</option>
<option value="Solomon Islands">Solomon Islands</option>
<option value="Somalia">Somalia</option>
<option value="South Africa">South Africa</option>
<option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
<option value="Spain">Spain</option>
<option value="Sri Lanka">Sri Lanka</option>
<option value="Sudan">Sudan</option>
<option value="Suriname">Suriname</option>
<option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
<option value="Swaziland">Swaziland</option>
<option value="Sweden">Sweden</option>
<option value="Switzerland">Switzerland</option>
<option value="Syrian Arab Republic">Syrian Arab Republic</option>
<option value="Taiwan, Province of China">Taiwan, Province of China</option>
<option value="Tajikistan">Tajikistan</option>
<option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
<option value="Thailand">Thailand</option>
<option value="Timor-leste">Timor-leste</option>
<option value="Togo">Togo</option>
<option value="Tokelau">Tokelau</option>
<option value="Tonga">Tonga</option>
<option value="Trinidad and Tobago">Trinidad and Tobago</option>
<option value="Tunisia">Tunisia</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
<option value="Tuvalu">Tuvalu</option>
<option value="Uganda">Uganda</option>
<option value="Ukraine">Ukraine</option>
<option value="United Arab Emirates">United Arab Emirates</option>
<option value="United Kingdom">United Kingdom</option>
<option value="United States">United States</option>
<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
<option value="Uruguay">Uruguay</option>
<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Venezuela">Venezuela</option>
<option value="Viet Nam">Viet Nam</option>
<option value="Virgin Islands, British">Virgin Islands, British</option>
<option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
<option value="Wallis and Futuna">Wallis and Futuna</option>
<option value="Western Sahara">Western Sahara</option>
<option value="Yemen">Yemen</option>
<option value="Zambia">Zambia</option>
<option value="Zimbabwe">Zimbabwe</option>
</select>
		
		
		
		
		</div>
		
		
	   
        
        <div class="large-6 columns">
          <input type="text" id="cell" name="cell" placeholder="Phone Number" />
        </div>
        <div class="large-6 columns">
          <select id="reach" name="reach">
            <option value="off">--Institutions/Organizations--</option>
			<option value="No Organization">No Organization</option>
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
		
		
		
        <div class="large-12 columns"> <a href="mailto:feedback@savareeapp.com"> <u>Is your organization not listed? Ask us to add your organization to Savaree's organization list.</u></a> </div>
        
		
		
		
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
	  <div class="large-12 columns">
		<span class="messagebox"></span>
		</div>
      <input type="submit" id="submitbutton" name="submit" class="submit action-button" value="Submit" />
    </fieldset>
  </form>
</div>
<!-- jQuery --> 
<script src="http://thecodeplayer.com/uploads/js/jquery-1.9.1.min.js" type="text/javascript"></script> 
<!-- jQuery easing plugin --> 
<script src="http://thecodeplayer.com/uploads/js/jquery.easing.min.js" type="text/javascript"></script>
</body>
</html>