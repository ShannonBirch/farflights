<html>
	<head>
		<title> Far Flights </title>
		<meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
		<link href = "css/bootstrap.min.css" rel = "stylesheet">
		<link href = "css/styles.css" rel = "stylesheet">
		<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/script.js"></script>
	</head>
	
	<body>
	
		<!-- START OF HEADER -->
		<div class = "navbar navbar-inverse navbar-static-top">
			<div class = "container">
					
					<div class="navbar-header"><a href="#" class="navbar-brand">Far Flights</a>
						<button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					
					<div class = "collapse navbar-collapse navHeaderCollapse">
						<ul class = "nav navbar-nav navbar-right">
							<li><a href = "#"> Home </a></li>
							<li><a href = "#"> About </a></li>
							<li><a href = "#"> Contact </a><li>
							<li><a href = "#"> Log in </a></li>
						</ul>
					</div>	
			</div>
		</div>	
			<!-- END OF HEADER -->
		
		<div class="main">
			<div class="container">

				<!--START OF FORM -->
				<!--Departure text box input -->
				<form id="flightSpecifications" class="span8 form-inline">
				  <div class="form-group">
						<div class="col-sm-10">
						  <input type="text" class="form-control" list="citynameFrom" id="departure" placeholder="Departure">
						</div>
				  </div>
  
				<!--Destination text box input -->
				  <div class="form-group">
						<div class="col-sm-10">
						  <input type="text" list="citynameTo" class="form-control" id="destination" placeholder="Destination">
						</div>
				  </div>
				  
					<!-- CURRENCY SELECT -->
					<div class ="form-group">
					<div class="col-sm-10">
						<div class="input-group">
						  <input type="text" class="form-control" placeholder = "Max">
						  <div class="input-group-btn">
							<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">EUR<span class="caret"></span></button>
							<ul class="dropdown-menu">
							  <li><a href="#">USD</a></li>
							  <li><a href="#">EUR</a></li>
							  <li><a href="#">GBP</a></li>
							</ul>
						  </div>
						</div>
					</div>
					</div>
					<!-- END OF CURRENCY -->
  
			  <!--Button -->
			  <div class="form-group">
				<div class="col-sm-10">
				  <button type="button" id="button" class="bnt btn-default">Search Flight</button>
				</div>
			  </div>

				</form>
				<!--END OF FORM-->



	<!--Start of datalists -->
	<datalist id="citynameFrom">

		<!--IRELAND-->
		<option id="DUB"value="Dublin, Ireland">
		<option id="KIR" value = "Kerry, Ireland">
		<option id="CFG" value = "Donegal, Ireland">

		<!--UK-->
		<option id="LCY" value = "London City Airport, United Kingdom">
		<option id="LON" value = "London England Area, United Kingdom">
		<option id="ABZ" value = "Aberdeen, United Kingdom">
		<option id="BHX" value = "Birmingham, United Kingdom">
		<option id="BRS" value = "Bristol, United Kingdom">
		<option id="CWL" value = "Cardif, United Kingdom">
		<option id="DSA" value = "Doncaster, Sheffield, United Kingdom">
		<option id="EMA" value = "East Midlands, United Kingdom">
		<option id="EDI" value = "Edinburgh, United Kingdom">
		<option id="GLA" value = "Glasgow, United Kingdom">
		<option id="IOM" value = "Isle of Man, United Kingdom">
		<option id="JER" value = "Jersey, United Kingdom">
		<option id="LBA" value = "Leeds Brandfor, United Kingdom">
		<option id="LPL" value = "Liverpool, United Kingdom">
		<option id="LGW" value = "London Gatwick, United Kingdom">
		<option id="LHR" value = "London Heathrow, United Kingdom">
		<option id="MAN" value = "Mancherster, United Kingdom">
		<option id="NCL" value = "Newcastle, United Kingdom">
		<option id="NQY" value = "Nequay, United Kingdom">

		<!--AUSTRALIA-->
		<option id="MEL" value = "Melbourne, Australia">
		<option id="PER" value = "Perth, Australia">
		<option id="SYD" value = "Sydney, Australia">

		<!--AUSTRIA-->
		<option id="VIE" value = "Vienna, Austria">

		<!--BAHRAIN-->
		<option id="BAH" value = "Bahrain, Bahrain">

		<!--BELGIUM-->
		<option id="BRU" value = "Brussels, Belgium">

		<!--BULGARIA-->
		<option id="BOJ" value = "Bourgas/Bulgaria Bulgaria">

		<!--CANADA-->
		<option id="YYC" value = "Calgary, Canada">
		<option id="YEG" value = "Edmonton, Canada">
		<option id="YHZ" value = "Halifax, Canada">
		<option id="YUL" value = "Montreal, P.E Trudeau INTL, QU, Canada">
		<option id="YOW" value = "Ottawa, ON">
		<option id="YQB" value = "Quebec City">
		<option id="YQR" value = "Regina">
		<option id="YXE" value = "Saskatoon">
		<option id="YYT" value = "St. Johns NL">
		<option id="YYZ" value = "Toronto">
		<option id="YVR" value = "Vancouver">
		<option id="YYJ" value = "Victortia">
		<option id="YWG" value = "Winnipeg">

		<!--CROATIA-->
		<option id="DBV" value = "Dubrovnik">
		<option id="PUY" value = "Pula">

		<!--CZECH REPUBLIC-->
		<option id="PRG" value = "Prague">

		<!--DENMARK-->
		<option id="CPH" value = "Copenhagen">

		<!--FRANCE-->
		<option id="BOD" value = "Bordeaux">
		<option id="LYS" value = "Lyon">
		<option id="MRS" value = "Marseille">
		<option id="MPL" value = "Montpellier">
		<option id="NTE" value = "Nantes">
		<option id="NCE" value = "Nice">
		<option id="CDG" value = "Paris">
		<option id="PGF" value = "Perpignan">
		<option id="RNS" value = "Rennes">
		<option id="TLS" value = "Toulouse">

		<!--GERMANY-->
		<option id="TXL" value = "Berlin">
		<option id="DUS" value = "Dusseldorf">
		<option id="FRA" value = "Frankfurt">
		<option id="HAM" value = "Hamburg">
		<option id="MUC" value = "Munich">
		<option id="STR" value = "Stuttgart">

		<!--GREECE-->
		<option id="ATH" value = "Athens">
		<option id="CFU" value = "Corfu">

		<!--HUNGARY-->
		<option id="BUD" value = "Budapest">

		<!--ITALY-->
		<option id="BLQ" value = "Donegal">
		<option id="CTA" value = "Kerry">
		<option id="MIL" value = "Bologna">
		<option id="LIN" value = "Milan/Linate">
		<option id="MXP" value = "Milan/Malpensa">
		<option id="NAP" value = "Naples">
		<option id="PSA" value = "Pisa">
		<option id="FCO" value = "Rome/DaVinci">
		<option id="VCE" value = "Venice">
		<option id="VRN" value = "Verona">

		<!--MOROCCO-->
		<option id="AGA" value = "Agadir/Morocco">

		<!--NEHTERLANDS-->
		<option id="AMS" value = "Amsterdam">

		<!--OMAN-->
		<option id="MCT" value = "Muscat">

		<!--POLAND-->
		<option id="WAW" value = "Warsaw">

		<!--PORTUGAL-->
		<option id="FAO" value = "Faro Algarve">
		<option id="LIS" value = "Lisbon">

		<!--SPAIN-->
		<option id="ALC" value = "Alicante">
		<option id="BCN" value = "Barcelona">
		<option id="BIO" value = "Bilbao">
		<option id="FUE" value = "Fuerteventura">
		<option id="LPA" value = "Gran Canaria">
		<option id="ACE" value = "Lanzarote">
		<option id="MAD" value = "Madrid">
		<option id="AGP" value = "Malaga">
		<option id="MJV" value = "Murcia (San Javier)">
		<option id="PMI" value = "Palma Majorca">
		<option id="SCQ" value = "Santiago de Compostela">
		<option id="TFS" value = "Tenerife">

		<!--SWITZERLAND-->
		<option id="GVA" value = "Geneva">
		<option id="ZRH" value = "Zurich">

		<!--TURKEY-->
		<option id="ADB" value = "Izmir">

		<!--USA-->
		<option id="BOS" value = "Boston">
		<option id="ORD" value = "Chicago/OHare">
		<option id="BDL" value = "Hartford">
		<option id="LAX" value = "L.A. Los Angeles">
		<option id="JFK" value = "New York">
		<option id="EWR" value = "Newark NJ">
		<option id="MCO" value = "Orlando">
		<option id="SFO" value = "San Francisco">
		<option id="IAD" value = "Washington Dulles">


		<option id="BQN" value = "Aguadilla">
		<option id="CAK" value = "Akron-Canton">
		<option id="ALB" value = "Albany">
		<option id="ATL" value = "Atlanta">
		<option id="AUS" value = "Austin">

		<option id="BOI" value = "Boise">
		<option id="BUF" value = "Buffalo">
		<option id="BTV" value = "Burlington">
		<option id="CID" value = "Cedar Rapids">

		<option id="CHS" value = "Charleston ">
		<option id="CLT" value = "Charlotte">
		<option id="ORD" value = "Chicago/OHare">
		<option id="CVG" value = "Cincinnati">
		<option id="CLE" value = "Cleveland">

		<option id="CAE" value = "Columbia">
		<option id="CMH" value = "Columbus">
		<option id="DFW" value = "Dallas">
		<option id="DAY" value = "Dayton">
		<option id="DEN" value = "Denver">

		<option id="DSM" value = "Des Moines">
		<option id="DTW" value = "Detroit">
		<option id="DLH" value = "Duluth">
		<option id="EUG" value = "Eugene, Oregon">
		<option id="FAR" value = "Fargo">

		<option id="FLL" value = "Fort Lauderdale">
		<option id="RSW" value = "Fort Myers">
		<option id="FWA" value = "Fort Wayne">
		<option id="FAT" value = "Fresno, CA">
		<option id="GRR" value = "Grand Rapids">

		<option id="GSO" value = "Greensboro">
		<option id="GSP" value = "Greenville">
		<option id="MDT" value = "Harrisburg, PA">
		<option id="BDL" value = "Hartford">
		<option id="HNL" value = "Honolulu, HI">

		<option id="IAH" value = "Houston/George Bush">
		<option id="HOU" value = "Houston/Hobby">
		<option id="HYA" value = "Hyannis, MA">
		<option id="IND" value = "Indianapolis">
		<option id="JAX" value = "Jacksonville">

		<option id="MCI" value = "Kansas City">
		<option id="TYS" value = "Knoxville">
		<option id="BUR" value = "Burbank">
		<option id="LGB" value = "Long Beach">
		<option id="LAX" value = "Los Angeles">

		<option id="LAS" value = "Las Vegas">
		<option id="LEX" value = "Lexington">
		<option id="LIT" value = "Little Rock">
		<option id="SDF" value = "Louisville, Kentucky">
		<option id="MSN" value = "Madison">

		<option id="MVY" value = "Marthas Vineyard, MA">
		<option id="OGG" value = "Maui, HI">
		<option id="MFR" value = "Medford, OR">
		<option id="MEM" value = "Memphis">
		<option id="MIA" value = "Miami">

		<option id="MKE" value = "Milwaukee">
		<option id="MSP" value = "Minneapolis">
		<option id="MRY" value = "Monterey, CA">
		<option id="ACK" value = "Nantucket">
		<option id="BNA" value = "Nashville">

		<option id="MSY" value = "New Orleans">
		<option id="MSY" value = "New York">
		<option id="EWR" value = "Newark NJ">
		<option id="ORF" value = "Norfolk">
		<option id="OAK" value = "Oakland">

		<option id="OKC" value = "Oklahoma City">
		<option id="OMA" value = "Omaha, Nebraska">
		<option id="SNA" value = "Orange County">
		<option id="MCO" value = "Orlando">
		<option id="PSP" value = "Palm Springs, CA">

		<option id="PHL" value = "Philadelphia">
		<option id="PHX" value = "Phoenix">
		<option id="PIT" value = "Pittsburgh">
		<option id="PSE" value = "Ponce">
		<option id="PWM" value = "Portland, Maine">

		<option id="PDX" value = "Portland, Oregon">
		<option id="PVD" value = "Providence">
		<option id="RDU" value = "Raleigh-Durham">
		<option id="RNO" value = "Reno, NV">
		<option id="RIC" value = "Richmond">

		<option id="ROC" value = "Rochester">
		<option id="SMF" value = "Sacramento">
		<option id="SLC" value = "Salt Lake City">
		<option id="SAT" value = "San Antonio">
		<option id="SAN" value = "San Diego">

		<option id="SFO" value = "San Francisco">
		<option id="SJC" value = "San Jose">
		<option id="SJU" value = "San Juan">
		<option id="SBP" value = "San Luis Obispo">
		<option id="SBA" value = "Santa Barbara">

		<option id="SAV" value = "Savannah">
		<option id="SEA" value = "Seattle">
		<option id="FSD" value = "Sioux Falls">
		<option id="SGF" value = "Springfield">
		<option id="STL" value = "St Louis">

		<option id="SYR" value = "Syracuse">
		<option id="TPA" value = "Tampa">
		<option id="TVC" value = "Traverse City">
		<option id="TUS" value = "Tucson, AZ">
		<option id="TUL" value = "Tulsa">

		<option id="Washington Baltimore" value = "BWI">
		<option id="Washington Dulles" value = "IAD">
		<option id="Washington Reagan" value = "DCA">
		<option id="West Palm Beach" value = "PBI">
		<option id="Wichita" value = "ICT">
	</datalist>

	<datalist id="citynameTo">

		<!--IRELAND-->
		<option id="DUB "value="Dublin, Ireland">
		<option id="KIR" value = "Kerry, Ireland">
		<option id="CFG" value = "Donegal, Ireland">

		<!--UK-->
		<option id="LCY" value = "London City Airport, United Kingdom">
		<option id="LON" value = "London England Area, United Kingdom">
		<option id="ABZ" value = "Aberdeen, United Kingdom">
		<option id="BHX" value = "Birmingham, United Kingdom">
		<option id="BRS" value = "Bristol, United Kingdom">
		<option id="CWL" value = "Cardif, United Kingdom">
		<option id="DSA" value = "Doncaster, Sheffield, United Kingdom">
		<option id="EMA" value = "East Midlands, United Kingdom">
		<option id="EDI" value = "Edinburgh, United Kingdom">
		<option id="GLA" value = "Glasgow, United Kingdom">
		<option id="IOM" value = "Isle of Man, United Kingdom">
		<option id="JER" value = "Jersey, United Kingdom">
		<option id="LBA" value = "Leeds Brandfor, United Kingdom">
		<option id="LPL" value = "Liverpool, United Kingdom">
		<option id="LGW" value = "London Gatwick, United Kingdom">
		<option id="LHR" value = "London Heathrow, United Kingdom">
		<option id="MAN" value = "Mancherster, United Kingdom">
		<option id="NCL" value = "Newcastle, United Kingdom">
		<option id="NQY" value = "Nequay, United Kingdom">

		<!--AUSTRALIA-->
		<option id="MEL" value = "Melbourne, Australia">
		<option id="PER" value = "Perth, Australia">
		<option id="SYD" value = "Sydney, Australia">

		<!--AUSTRIA-->
		<option id="VIE" value = "Vienna, Austria">

		<!--BAHRAIN-->
		<option id="BAH" value = "Bahrain, Bahrain">

		<!--BELGIUM-->
		<option id="BRU" value = "Brussels, Belgium">

		<!--BULGARIA-->
		<option id="BOJ" value = "Bourgas/Bulgaria Bulgaria">

		<!--CANADA-->
		<option id="YYC" value = "Calgary, Canada">
		<option id="YEG" value = "Edmonton, Canada">
		<option id="YHZ" value = "Halifax, Canada">
		<option id="YUL" value = "Montreal, P.E Trudeau INTL, QU, Canada">
		<option id="YOW" value = "Ottawa, ON">
		<option id="YQB" value = "Quebec City">
		<option id="YQR" value = "Regina">
		<option id="YXE" value = "Saskatoon">
		<option id="YYT" value = "St. Johns NL">
		<option id="YYZ" value = "Toronto">
		<option id="YVR" value = "Vancouver">
		<option id="YYJ" value = "Victortia">
		<option id="YWG" value = "Winnipeg">

		<!--CROATIA-->
		<option id="DBV" value = "Dubrovnik">
		<option id="PUY" value = "Pula">

		<!--CZECH REPUBLIC-->
		<option id="PRG" value = "Prague">

		<!--DENMARK-->
		<option id="CPH" value = "Copenhagen">

		<!--FRANCE-->
		<option id="BOD" value = "Bordeaux">
		<option id="LYS" value = "Lyon">
		<option id="MRS" value = "Marseille">
		<option id="MPL" value = "Montpellier">
		<option id="NTE" value = "Nantes">
		<option id="NCE" value = "Nice">
		<option id="CDG" value = "Paris">
		<option id="PGF" value = "Perpignan">
		<option id="RNS" value = "Rennes">
		<option id="TLS" value = "Toulouse">

		<!--GERMANY-->
		<option id="TXL" value = "Berlin">
		<option id="DUS" value = "Dusseldorf">
		<option id="FRA" value = "Frankfurt">
		<option id="HAM" value = "Hamburg">
		<option id="MUC" value = "Munich">
		<option id="STR" value = "Stuttgart">

		<!--GREECE-->
		<option id="ATH" value = "Athens">
		<option id="CFU" value = "Corfu">

		<!--HUNGARY-->
		<option id="BUD" value = "Budapest">

		<!--ITALY-->
		<option id="BLQ" value = "Donegal">
		<option id="CTA" value = "Kerry">
		<option id="MIL" value = "Bologna">
		<option id="LIN" value = "Milan/Linate">
		<option id="MXP" value = "Milan/Malpensa">
		<option id="NAP" value = "Naples">
		<option id="PSA" value = "Pisa">
		<option id="FCO" value = "Rome/DaVinci">
		<option id="VCE" value = "Venice">
		<option id="VRN" value = "Verona">

		<!--MOROCCO-->
		<option id="AGA" value = "Agadir/Morocco">

		<!--NEHTERLANDS-->
		<option id="AMS" value = "Amsterdam">

		<!--OMAN-->
		<option id="MCT" value = "Muscat">

		<!--POLAND-->
		<option id="WAW" value = "Warsaw">

		<!--PORTUGAL-->
		<option id="FAO" value = "Faro Algarve">
		<option id="LIS" value = "Lisbon">

		<!--SPAIN-->
		<option id="ALC" value = "Alicante">
		<option id="BCN" value = "Barcelona">
		<option id="BIO" value = "Bilbao">
		<option id="FUE" value = "Fuerteventura">
		<option id="LPA" value = "Gran Canaria">
		<option id="ACE" value = "Lanzarote">
		<option id="MAD" value = "Madrid">
		<option id="AGP" value = "Malaga">
		<option id="MJV" value = "Murcia (San Javier)">
		<option id="PMI" value = "Palma Majorca">
		<option id="SCQ" value = "Santiago de Compostela">
		<option id="TFS" value = "Tenerife">

		<!--SWITZERLAND-->
		<option id="GVA" value = "Geneva">
		<option id="ZRH" value = "Zurich">

		<!--TURKEY-->
		<option id="ADB" value = "Izmir">

		<!--USA-->
		<option id="BOS" value = "Boston">
		<option id="ORD" value = "Chicago/OHare">
		<option id="BDL" value = "Hartford">
		<option id="LAX" value = "L.A. Los Angeles">
		<option id="JFK" value = "New York">
		<option id="EWR" value = "Newark NJ">
		<option id="MCO" value = "Orlando">
		<option id="SFO" value = "San Francisco">
		<option id="IAD" value = "Washington Dulles">


		<option id="BQN" value = "Aguadilla">
		<option id="CAK" value = "Akron-Canton">
		<option id="ALB" value = "Albany">
		<option id="ATL" value = "Atlanta">
		<option id="AUS" value = "Austin">

		<option id="BOI" value = "Boise">
		<option id="BUF" value = "Buffalo">
		<option id="BTV" value = "Burlington">
		<option id="CID" value = "Cedar Rapids">

		<option id="CHS" value = "Charleston ">
		<option id="CLT" value = "Charlotte">
		<option id="ORD" value = "Chicago/OHare">
		<option id="CVG" value = "Cincinnati">
		<option id="CLE" value = "Cleveland">

		<option id="CAE" value = "Columbia">
		<option id="CMH" value = "Columbus">
		<option id="DFW" value = "Dallas">
		<option id="DAY" value = "Dayton">
		<option id="DEN" value = "Denver">

		<option id="DSM" value = "Des Moines">
		<option id="DTW" value = "Detroit">
		<option id="DLH" value = "Duluth">
		<option id="EUG" value = "Eugene, Oregon">
		<option id="FAR" value = "Fargo">

		<option id="FLL" value = "Fort Lauderdale">
		<option id="RSW" value = "Fort Myers">
		<option id="FWA" value = "Fort Wayne">
		<option id="FAT" value = "Fresno, CA">
		<option id="GRR" value = "Grand Rapids">

		<option id="GSO" value = "Greensboro">
		<option id="GSP" value = "Greenville">
		<option id="MDT" value = "Harrisburg, PA">
		<option id="BDL" value = "Hartford">
		<option id="HNL" value = "Honolulu, HI">

		<option id="IAH" value = "Houston/George Bush">
		<option id="HOU" value = "Houston/Hobby">
		<option id="HYA" value = "Hyannis, MA">
		<option id="IND" value = "Indianapolis">
		<option id="JAX" value = "Jacksonville">

		<option id="MCI" value = "Kansas City">
		<option id="TYS" value = "Knoxville">
		<option id="BUR" value = "Burbank">
		<option id="LGB" value = "Long Beach">
		<option id="LAX" value = "Los Angeles">

		<option id="LAS" value = "Las Vegas">
		<option id="LEX" value = "Lexington">
		<option id="LIT" value = "Little Rock">
		<option id="SDF" value = "Louisville, Kentucky">
		<option id="MSN" value = "Madison">

		<option id="MVY" value = "Marthas Vineyard, MA">
		<option id="OGG" value = "Maui, HI">
		<option id="MFR" value = "Medford, OR">
		<option id="MEM" value = "Memphis">
		<option id="MIA" value = "Miami">

		<option id="MKE" value = "Milwaukee">
		<option id="MSP" value = "Minneapolis">
		<option id="MRY" value = "Monterey, CA">
		<option id="ACK" value = "Nantucket">
		<option id="BNA" value = "Nashville">

		<option id="MSY" value = "New Orleans">
		<option id="MSY" value = "New York">
		<option id="EWR" value = "Newark NJ">
		<option id="ORF" value = "Norfolk">
		<option id="OAK" value = "Oakland">

		<option id="OKC" value = "Oklahoma City">
		<option id="OMA" value = "Omaha, Nebraska">
		<option id="SNA" value = "Orange County">
		<option id="MCO" value = "Orlando">
		<option id="PSP" value = "Palm Springs, CA">

		<option id="PHL" value = "Philadelphia">
		<option id="PHX" value = "Phoenix">
		<option id="PIT" value = "Pittsburgh">
		<option id="PSE" value = "Ponce">
		<option id="PWM" value = "Portland, Maine">

		<option id="PDX" value = "Portland, Oregon">
		<option id="PVD" value = "Providence">
		<option id="RDU" value = "Raleigh-Durham">
		<option id="RNO" value = "Reno, NV">
		<option id="RIC" value = "Richmond">

		<option id="ROC" value = "Rochester">
		<option id="SMF" value = "Sacramento">
		<option id="SLC" value = "Salt Lake City">
		<option id="SAT" value = "San Antonio">
		<option id="SAN" value = "San Diego">

		<option id="SFO" value = "San Francisco">
		<option id="SJC" value = "San Jose">
		<option id="SJU" value = "San Juan">
		<option id="SBP" value = "San Luis Obispo">
		<option id="SBA" value = "Santa Barbara">

		<option id="SAV" value = "Savannah">
		<option id="SEA" value = "Seattle">
		<option id="FSD" value = "Sioux Falls">
		<option id="SGF" value = "Springfield">
		<option id="STL" value = "St Louis">

		<option id="SYR" value = "Syracuse">
		<option id="TPA" value = "Tampa">
		<option id="TVC" value = "Traverse City">
		<option id="TUS" value = "Tucson, AZ">
		<option id="TUL" value = "Tulsa">

		<option id="Washington Baltimore" value = "BWI">
		<option id="Washington Dulles" value = "IAD">
		<option id="Washington Reagan" value = "DCA">
		<option id="West Palm Beach" value = "PBI">
		<option id="Wichita" value = "ICT">
	</datalist>
	<!-- End of datalist -->
		</div>
	</div>
		
	</body>
</html>	
