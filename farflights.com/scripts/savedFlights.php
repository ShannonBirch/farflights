<?php


	
	$mysqli = new mysqli(<snipped>);
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
		
		
	echo"<table id = \"display\" class=\"table table-striped\">
						<h2>One Way Flights</h2>

					<thead>
						<tr>
							<th>Airline</th>
							<th>Departing</th>
							<th>Destination</th>
							<th>Date</th>
							<th>Price</th>
				     			<th></th>
				     			<th></th>
				     			<th></th>
						</tr>
					</thead>
				<tbody>";
				
	$User_ID =$_POST['userID'];


	$savedOneWaySql = "SELECT f.Airline, r.Departure, r.Destination, f.Date, f.Price, f.Flight_ID
						FROM SAVEDFLIGHTS s INNER JOIN FLIGHTS f ON s.Flight_ID = f.Flight_ID
						INNER JOIN ROUTES r ON f.Route_ID = r.Route_ID WHERE s.User_ID = '". $User_ID ."';";
	


	
	$oneWayResult = mysqli_query($mysqli, $savedOneWaySql);
	
	if ($oneWayResult->num_rows > 0) {
		while($oneWay= $oneWayResult->fetch_assoc()) {
		
			$savedOneWayUrl ="https://www.aerlingus.com/html/flightSearchResult.html#/fareType=ONEWAY&fareCategory=ECONOMY&numAdults=1&numChildren=0&numInfants=0&promoCode=&groupBooking=false&sourceAirportCode_0=" . $oneWay["Departure"] . "&destinationAirportCode_0=" . $oneWay["Destination"] . "&departureDate_0=" . $oneWay["Date"];
		
		$Flight_ID = $oneWay["Flight_ID"];

		
		echo "<tr><td>" . $oneWay["Airline"] , "    " ."</td>
			<td>" . $oneWay["Departure"] , "    " ."</td>
			<td>" . $oneWay["Destination"] , "</td>
			<td>" . $oneWay["Date"] , "    " ."</td>
			<td>" . " &#8364;" . $oneWay["Price"] . "<br>", "</td>
			<td>" . "<input type=button class=btn btn-primary btn-xs onclick=window.open('$savedOneWayUrl') value=\"Go To Booking\"/>" . "</td>
			<td></td>";
	          
		          $saveCheck = mysqli_query($mysqli, "SELECT flight_id FROM SAVEDFLIGHTS WHERE  User_id='$User_ID' AND Flight_ID='$Flight_ID';");
		          
		          if ($saveCheck->num_rows > 0) {
		          //TODO
		          //Edit in search for unsave if user has saved flight before
		          	echo "<td><input type=button class=btn btn-primary btn-xs onclick=\"saveFlight(this, '$Flight_ID')\" value=\"Unsave\"/></td>";
		          }else{
		          	echo "<td><input type=button class=btn btn-primary btn-xs onclick=\"saveFlight(this, '$Flight_ID')\" value=\"Save\"/></td>";
		          }
		          

			
		}
	
	}

		


	$inboundSql = "SELECT f.Airline, r.Departure, r.Destination, f.Date, f.Price, s.Return_ID
						FROM SAVEDRETURNS s INNER JOIN FLIGHTS f ON s.Inbound = f.Flight_ID
						INNER JOIN ROUTES r ON f.Route_ID = r.Route_ID WHERE s.User_ID = '" . $User_ID . "';";
												
											
	$inboundResult = mysqli_query($mysqli, $inboundSql);
						echo"<table id = \"display\" class=\"table table-striped\">
									<h2>Return Flights</h2>

							 	<thead>	
							 		<tr>
							 			<th>Airline</th>
							 			<th>Departing</th>
							 			<th>Destination</th>
							      			<th>Date</th>
							      			<th>Price</th>
							      			<th></th>
							      			<th></th>
							      			<th></th>
							      			<th>Airline</th>
							     			<th>Departing</th>
							     			<th>Destination</th>
							     			<th>Date</th>
							     			<th>Price</th>
							     			<th></th>
							     			<th></th>
							     			<th></th>
							     		</tr>
							     	</thead>
						     	<tbody>";
	if ($inboundResult ->num_rows > 0) {
		while($in = $inboundResult ->fetch_assoc()) {
		
			$outboundSql = "SELECT f.Airline, r.Departure, r.Destination, f.Date, f.Price 
							FROM SAVEDRETURNS s INNER JOIN FLIGHTS f ON s.Outbound = f.Flight_ID
							INNER JOIN ROUTES r ON f.Route_ID = r.Route_ID WHERE s.User_ID = '" . $User_ID . "' AND s.Return_ID =" . $in['Return_ID'] . ";";
			
			$outboundResult = mysqli_query($mysqli, $outboundSql );

			if ($outboundResult ->num_rows > 0) {
				while($out = $outboundResult ->fetch_assoc()) {
				
					$F1 = $out["Flight_ID"]; $F2= $in["Flight_ID"];

					$inUrl ="https://www.aerlingus.com/html/flightSearchResult.html#/fareType=ONEWAY&fareCategory=ECONOMY&numAdults=1&numChildren=0&numInfants=0&promoCode=&groupBooking=false&sourceAirportCode_0=" . $in["Departure"] . "&destinationAirportCode_0=" . $in["Destination"] . "&departureDate_0=" . $in["Date"];
					 
					$outUrl ="https://www.aerlingus.com/html/flightSearchResult.html#/fareType=ONEWAY&fareCategory=ECONOMY&numAdults=1&numChildren=0&numInfants=0&promoCode=&groupBooking=false&sourceAirportCode_0=" . $out["Departure"] . "&destinationAirportCode_0=" . $out["Destination"] . "&departureDate_0=" . $out["Date"];
					
					$Flight_ID = $oneWay["Flight_ID"];

					
					echo "<tr><td>" . $in["Airline"] , "    " ."</td>
					<td>" . $in["Departure"] , "    " ."</td>
					<td>" . $in["Destination"] , "</td>
					<td>" . $in["Date"] , "    " ."</td>
					<td>" . " &#8364;" . $in["Price"] . "<br>", "</td>
					<td>" . "<input type=button class=btn btn-primary btn-xs onclick=window.open('$inUrl') value=\"Go To Booking\"/>" . "</td>
					<td></td>
					<td></td>
					<td>" . $in["Airline"] , "    " ."</td>
					<td>" . $out ["Departure"] , "    " ."</td>
					<td>" . $out ["Destination"] , "</td>
					<td>" . $out ["Date"] , "    " ."</td>
					<td>" . " &#8364;" . $out ["Price"] . "<br>", "</td>
					<td>" . "<input type=button class=btn btn-primary btn-xs onclick=window.open('$outUrl') value=\"Go To Booking\"/>" . "</td>
					<td></td>";
	          
		         $saveCheck = mysqli_query($mysqli, "SELECT Outbound FROM SAVEDRETURNS WHERE User_id = '$User_ID' AND Outbound = '$F1' AND Inbound ='$F2';");
		         
				          if ($saveCheck->num_rows > 0) {//If the flights are already saved the button displays "Unsave"
				          	echo "<td><input type=\"button\" class=btn btn-primary btn-xs onclick=\"saveReturn(this, '$F1', '$F2')\" value=\"Unsave\"/></td>";
				          }else{
				          	echo "<td><div id=\"searchbox\"><input type=\"button\" class=btn btn-primary btn-xs onclick=\"saveReturn(this, '$F1', '$F2')\" value=\"Save\"/></div></td>";
				          }
						              
		          

					
				}
			}
		}
	
	}


	echo"<table id = \"display\" class=\"table table-striped\">
						<h2>Saved Searches</h2>

					<thead>
						<tr>
							<th>Departing</th>
							<th>Destination</th>
							<th>Max Price</th>
							<th>Return</th>
			     			<th>Max Days</th>
			     			<th>Min Days</th>
			     			<th>First Date</th>
			     			<th>Last Date</th>
			     			<th></th>
			     			<th></th>
						</tr>
					</thead>
				<tbody>";


$savedSearch = "SELECT r.Departure, r.Destination, u.MaxPrice, u.Ret, u.MaxDays, u.MinDays, u.Firstdate, u.LastDate, u.Route_ID
						FROM USERROUTES u INNER JOIN ROUTES r ON u.Route_ID = r.Route_ID
						INNER JOIN USER s WHERE  s.User_ID = '$User_ID';";
	

	$ContentDivnum = 0;
	
	$savedSearchResult = mysqli_query($mysqli, $savedSearch);
	
	if ($savedSearchResult->num_rows > 0) {
		while($saved = $savedSearchResult->fetch_assoc()) {
		
		
		$Route_ID = $saved["Route_ID"];
		

		
		if($saved["Ret"] == 1){$TF ="TRUE";}else{$TF ="TRUE";}
		
		
		echo "<tr><td>" . $saved["Departure"] , "    " ."</td>
		<td>" . $saved["Destination"] , "    " ."</td>
		<td>" . " &#8364;" . $saved["MaxPrice"] . "<br>", "</td>
		<td>" . "$TF" , "    " ."</td>
		<td>" . $saved["MaxDays"] , "    " ."</td>
		<td>" . $saved["MinDays"] , "    " ."</td>
		<td>" . $saved["Firstdate"] , "    " ."</td>
		<td>" . $saved["LastDate"] , "    " ."</td>
		<td></td>";
		
		if(!empty($saved['MaxDays'])){$MaxDays=$saved['MaxDays'];}else{$MaxDays=0;}
		if(!empty($saved['inxDays'])){$MinDays=$saved['MinDays'];}else{$MinDays=0;}
		
		
		
		
		  $saveCheck = mysqli_query($mysqli, "SELECT Route_ID FROM USERROUTES WHERE  User_id='$User_ID' AND Route_ID='$Route_ID';");
	          if ($saveCheck->num_rows > 0) {
	          //TODO
	          //Edit in search for unsave if user has saved flight before
	          	echo "<td><input type=button class=btn btn-primary btn-xs onclick=\"saveSearch(this, 'MaMiFDLD', '$TF', '".$saved['Departure']."', '".$saved['Destination']."', ".$saved['MaxPrice'].", $MaxDays, $MinDays, '".$saved['Firstdate']."', '".$saved['LastDate']."')\" value=\"Unsave\"/></td>";
	          }else{
	          	echo "<td><input type=button class=btn btn-primary btn-xs onclick=\"saveSearch(this, 'MaMiFDLD', '$TF', '".$saved['Departure']."', '".$saved['Destination']."', ".$saved['MaxPrice'].", $MaxDays, $MinDays, '".$saved['Firstdate']."', '".$saved['LastDate']."')\" value=\"Unsave\"/></td>";
	         }


		echo "<td><div id=\"searchcontent$ContentDivnum\"><input type=button class=btn btn-primary btn-xs onclick=\"search('$ContentDivnum','". $saved["Departure"]. "', '". $saved["Destination"]. "', '$TF', " .$saved['MaxPrice'].", $MaxDays, $MinDays, '".$saved['Firstdate']."', '".$saved['LastDate']."' )\" value=\"Search\"/></div></td>";		


		          
		 $ContentDivnum++;        
			
		}
	
	}
				echo "<div id=\Results\">";
					
				echo "</div>";







	mysqli_close($mysqli );
	
?>