<html>
	<head>
		<title> Far Flights </title>
		<meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
		<meta name="google-signin-client_id" content="820409304754-d5rl5vn214sko9lb9l4mmac1ju708glt.apps.googleusercontent.com">
		<link href = "css/bootstrap.min.css" rel = "stylesheet">
		<link href = "css/styles.css" rel = "stylesheet">
		<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/script.js"></script>
		<script src="js/search.js"></script>
		<script type="text/javascript" charset="utf-8" src="js/jquery.leanModal.min.js"></script>
		<script src="https://apis.google.com/js/platform.js" async defer></script>
		<script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>

	</head>
	
	<body>

		<?php require 'php_partials/navbar.php';?>

		<div class="main">
			<div class="container">
		  <div id="my-signin2"></div>

			<div id="oneWay">
				<!--START OF FORM -->
				<!--Departure text box input -->
				<form id="flightSpecifications" class="span8 form-inline">
				  <div class="form-group">
						  <input type="text" class="form-control margin-bottom" list="citynameFrom" id="departure" placeholder="Departure">
				  </div>
  
				<!--Destination text box input -->
				  <div class="form-group">
						  <input type="text" list="citynameTo" class="form-control margin-bottom" id="destination" placeholder="Destination">
				  </div>

				  <!--Price text box input -->
				<form id="flightSpecifications" class="span8 form-inline">
				  <div class="form-group">
						  <input type="text" class="form-control margin-bottom" id="price" placeholder="Maximum Price">
				  </div>

				    <div class="form-group">
				    	<label for="returnBox">Return Flights</label>
						<input type="checkbox" id="returnCheckBox">
				    </div>

			 	 <!--Search Button -->
				  <div class="form-group">
					  <button type="button" class="form-control margin-bottom" id="searchButton" class="btn btn-default">FarFlights Search</button>
				  </div>
				</form>

				</div>
				

				<button class="form-control margin-bottom" id="returnOptions" class="btn btn-default"href="#" onclick="toggler('returns');">More Options</button> 
				<div id="returns" style="display:none">

					<div class="form-group">
						  <input type="text"  class="form-control margin-bottom" id="minDays" placeholder="Min Days of Stay">
				   	 </div>

					<div class="form-group">
						  <input type="text" class="form-control margin-bottom" id="maxDays" placeholder="Max Days of Stay">
				    	</div>	

				 	<label for="startDate">Select the earliest day you are available</label>
				    	<div class="form-group">
						  <input type="date" class="form-control margin-bottom" id="fdateAvailable">
				    	</div>

				   	<label for="endDate">Select the latest day you are available</label>
				    	<div class="form-group">
						  <input type="date" class="form-control margin-bottom" id="ldateAvailable">
				    	</div>

				</div>










				<div id="Results">
					
				</div>
				
				
				
	
				


	<!--Start of datalists -->
		<datalist id="citynameFrom">
		<option id="DUB"value="Dublin, Ireland">
		<option id="ABZ" value = "Aberdeen, United Kingdom">
		<option id="ACE" value = "Lanzarote">
		<option id="ACK" value = "Nantucket">
		<option id="ADB" value = "Izmir">
		<option id="GSP" value = "Greenville">
		<option id="GVA" value = "Geneva">
		<option id="HAM" value = "Hamburg">
		<option id="JFK" value = "New York">
		<option id="KIR" value = "Kerry, Ireland">
		<option id="LCY" value = "London City Airport, United Kingdom">
		<option id="LHR" value = "London Heathrow, United Kingdom">
		<option id="LIT" value = "Little Rock">
		<option id="LON" value = "London England Area, United Kingdom">
		<option id="LPA" value = "Gran Canaria">
		<option id="LPL" value = "Liverpool, United Kingdom">
	</datalist>

	<datalist id="citynameTo">
		<option id="ABZ" value = "Aberdeen, United Kingdom">
		<option id="DUB"value="Dublin, Ireland">
		<option id="ACE" value = "Lanzarote">
		<option id="ACK" value = "Nantucket">
		<option id="ADB" value = "Izmir">
		<option id="GSP" value = "Greenville">
		<option id="GVA" value = "Geneva">
		<option id="HAM" value = "Hamburg">
		<option id="JFK" value = "New York">
		<option id="KIR" value = "Kerry, Ireland">
		<option id="LCY" value = "London City Airport, United Kingdom">
		<option id="LHR" value = "London Heathrow, United Kingdom">
		<option id="LIT" value = "Little Rock">
		<option id="LON" value = "London England Area, United Kingdom">
		<option id="LPA" value = "Gran Canaria">
		<option id="LPL" value = "Liverpool, United Kingdom">
	</datalist>

	<!-- End of datalist -->
		</div>
	</div>
		
	</body>
</html>	