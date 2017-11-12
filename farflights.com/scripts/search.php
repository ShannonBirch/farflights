     
<?php
	

		$Found = False; $Error = False;
		
		
		$Departure =$_POST['dept']; $Destination =$_POST['dest']; $Price =$_POST['price']; $Ret=$_POST['ret'];
		$MaxDays=$_POST['maxdays']; $MinDays=$_POST['mindays']; $User=$_POST['userID'];
		
		
		
		
		if(empty($Departure)||empty($Destination)){ //Checks that the airport fields are not empty
			echo "Please tell us where you want to go!<br />";
			$Error = True;
		}
		
		
		if(!empty($_POST['ldate'])){ 
			if(date("y-m-d",(strtotime($_POST['ldate']))) <= date("y-m-d")){ //Checks that last date available is after today
				echo "Your Last Date cannot be before today!<br />";
				$Error = True;
			}
			
			if(!empty($_POST['fdate'])&&date("y-m-d",(strtotime($_POST['ldate']))) <= date("y-m-d",(strtotime($_POST['fdate'])))){ //Checks that the last Date is after the first date
				echo "Your Last Date must be after your first Date!<br />";
				$Error = True;
			}
			
			if(!empty($MinDays)){
				if(!empty($_POST['fdate'])&&(date("y-m-d",(strtotime($_POST['ldate']). "+ ".$MinDays." days")) <= date("y-m-d",(strtotime($_POST['fdate']))))){ // Makes sure the Last date isn't before the minimum stay length
					echo "Your minimum stay length would take you past your last available date!<br />";
					$Error = True;
				}
			}
		}
		
		if(!empty($MaxDays)&&!empty($MinDays)&&($MaxDays < $MinDays)){
			echo "Minimum days can not be more than Maximum Days<br />";
			$Error = True;
		}
		
		
		if(empty($Price)){
			$Price = 1000000;	
			
		}
		
		if($Error==False){//Beginning of Searches
		
			if(empty($User)){
				echo "Please Log in or Register to save flights";
			}
			
		
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			}
				
			
			
			if(!empty($_POST['fdate'])){$FirstDate = " AND f.Date > '".date("y-m-d",(strtotime($_POST['fdate'])))."' "; $FDate = date("y-m-d",(strtotime($_POST['fdate'])));}else{$FirstDate="";}
			if(!empty($_POST['ldate'])){$LastDate = " AND f.Date < '".date("y-m-d",(strtotime($_POST['ldate'])))."' "; $LDate =date("y-m-d",(strtotime($_POST['ldate'])));}else{$LastDate="";}
			
			if($Ret=="true"){//Return Flight Search
				echo"<table id = \"display\" class=\"table table-striped\">
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
				
				$outBsql = "SELECT f.Flight_ID, f.Airline, r.Departure, r.Destination,  f.Date, f.Price, f.Date
				FROM FLIGHTS f INNER JOIN ROUTES r ON f.Route_ID = r.Route_ID 
				WHERE  r.Departure='".$Departure."' AND r.Destination='".$Destination."' AND f.Price<".$Price
				.$FirstDate.$LastDate." 
				ORDER BY f.Price ASC LIMIT 10;";
				
				
				$outBresult = $conn->query($outBsql);
				if ($outBresult->num_rows > 0) {
					while($outB = $outBresult->fetch_assoc()) {
				        
				        	$MoneyLeft = ($Price - $outB["Price"]);
				     		
				        	$outDate = date('Y-m-d', (strtotime($outB["Date"])));
				        	
				        	if(empty($MaxDays) && empty($MinDays)){ //No Maximum or Minimum stay length has been set
					        	$inBsql = "SELECT f.Flight_ID, f.Airline, r.Departure, r.Destination,  f.Date, f.Price, f.Date
								FROM FLIGHTS f INNER JOIN ROUTES r ON f.Route_ID = r.Route_ID 
								WHERE  r.Departure='".$Destination."' AND r.Departure='".$Destination.
								"' AND f.Price<".$MoneyLeft." AND f.Date > '".$outDate.
								"' ".$LastDate."ORDER BY f.Price ASC LIMIT 3;";
								
				
						}else if(!empty($MaxDays) && empty($MinDays)){ //Maximum days is set, no Minimum stay length
							$inBsql = "SELECT f.Flight_ID, f.Airline, r.Departure, r.Destination,  f.Date, f.Price, f.Date
								FROM FLIGHTS f INNER JOIN ROUTES r ON f.Route_ID = r.Route_ID 
								WHERE  r.Departure='".$Destination."' AND r.Departure='".$Destination.
								"' AND f.Price<".$MoneyLeft." AND f.Date > '".$outDate.
								"' AND f.Date <'".date("y-m-d",(strtotime($outDate."+ ".$MaxDays." days"))).
								"'".$LastDate. 
								"ORDER BY f.Price ASC LIMIT 3;";
						}else if(empty($MaxDays) && !empty($MinDays)){ //Minimum days set, but no Maximum stay length
							$inBsql = "SELECT f.Flight_ID, f.Airline, r.Departure, r.Destination,  f.Date, f.Price, f.Date
								FROM FLIGHTS f INNER JOIN ROUTES r ON f.Route_ID = r.Route_ID 
								WHERE  r.Departure='".$Destination."' AND r.Departure='".$Destination.
								"' AND f.Price<".$MoneyLeft." AND f.Date > '".$outDate.
								"' AND f.Date > '".date("y-m-d",(strtotime($outDate."+ ".$MinDays." days"))).
								"'".$LastDate. 
								"ORDER BY f.Price ASC LIMIT 3;";
								
						}else{//Both Maximum and Minimum stay lengths have been specified
							$inBsql = "SELECT f.Flight_ID, f.Airline, r.Departure, r.Destination,  f.Date, f.Price, f.Date
								FROM FLIGHTS f INNER JOIN ROUTES r ON f.Route_ID = r.Route_ID 
								WHERE  r.Departure='".$Destination."' AND r.Departure='".$Destination.
								"' AND f.Price<".$MoneyLeft." AND f.Date > '".$outDate.
								"' AND f.Date > '".date("y-m-d",(strtotime($outDate."+ ".$MinDays." days"))).
								"'".$LastDate."' AND f.Date <'".date("y-m-d",(strtotime($outDate."+ ".$MaxDays." days"))).
								"ORDER BY f.Price ASC LIMIT 3;";
							
						}
						
	
						$inBresult = $conn->query($inBsql);
						if($inBresult->num_rows > 0){
							$Found = True;
							while($inB = $inBresult ->fetch_assoc()) {
							
								
							
							$F1 = $outB["Flight_ID"]; $F2= $inB["Flight_ID"];
							$outBurl="https://www.aerlingus.com/html/flightSearchResult.html#/fareType=ONEWAY&fareCategory=ECONOMY&numAdults=1&numChildren=0&numInfants=0&promoCode=&groupBooking=false&sourceAirportCode_0=" . $outB["Departure"] . "&destinationAirportCode_0=" . $outB["Destination"] . "&departureDate_0=" . $outB["Date"];
							
							$inBurl="https://www.aerlingus.com/html/flightSearchResult.html#/fareType=ONEWAY&fareCategory=ECONOMY&numAdults=1&numChildren=0&numInfants=0&promoCode=&groupBooking=false&sourceAirportCode_0=" . $inB["Departure"] . "&destinationAirportCode_0=" . $inB["Destination"] . "&departureDate_0=" . $inB["Date"];
	
			
					              echo "<tr><td>" . $outB["Airline"] , "    " ."</td>
					              <td>" . $outB["Departure"] , "    " ."</td>
					              <td>" . $outB["Destination"] , "    " ."</td>
					              <td>" . $outB["Date"] , "    " ."</td>
					              <td>" . " &#8364;" . $outB["Price"] . "<br>", "</td>
					              <td>" . "<input type=button onclick=window.open('$outBurl') value=\"Go\"/>" . "</td>
					              <td></td><td></td><td>" . $inB["Airline"] , "    " ."</td>
					              <td>" . $inB["Departure"] , "    " ."</td>
					              <td>" . $inB["Destination"] , "    " ."</td>
					              <td>" . $inB["Date"] , "    " ."</td>
					              <td>" . " &#8364;" . $inB["Price"] . "<br>", "</td>
					              <td>" . "<input type=button onclick=window.open('$inBurl') value=\"Go\"/>" . "</td>
					              <td></td><td>";
					              
					              
					              
					              	$saveCheck = $conn->query("SELECT Outbound FROM SAVEDRETURNS WHERE User_id = '$User' AND Outbound = '$F1' AND Inbound ='$F2';");
						          if ($saveCheck->num_rows > 0) {//If the flights are already saved the button displays "Unsave"
						          	echo "<input type=\"button\" onclick=\"saveReturn(this, '$F1', '$F2')\" value=\"Unsave\"/>";
						          }else{
						          	echo "<input type=\"button\" onclick=\"saveReturn(this, '$F1', '$F2')\" value=\"Save\"/>";
						          }
						              
					
					              
					              echo "</td></tr>";  
			  				
			  				}
			  			}	        				        	
				    	}
				}
			
			//End of Return Flight Search
			}else{//One Way Flight Search
				
				$sql = "SELECT f.Flight_ID, f.Airline, r.Departure, r.Destination, f.Price, f.Date
				FROM FLIGHTS f INNER JOIN ROUTES r ON f.Route_ID = r.Route_ID 
				WHERE  r.Departure='".$Departure."' AND r.Destination='".$Destination."' AND f.Price<".$Price
				.$FirstDate.$LastDate." 
				ORDER BY f.Price ASC LIMIT 10;";
				
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					$Found = True;
					// output data of each row
					echo"<table id = \"display\" class=\"table table-striped\">
						<thead>
							<tr>
								<th>Airline</th>
								<th>Departing</th>
								<th>Destination</th>
								<th>Date</th>
								<th>Price</th>
								<th></th>
								<th></th>
							</tr>
						</thead>
					<tbody>";	    
						
	
		
					while($row = $result->fetch_assoc()) {
					$url="https://www.aerlingus.com/html/flightSearchResult.html#/fareType=ONEWAY&fareCategory=ECONOMY&numAdults=1&numChildren=0&numInfants=0&promoCode=&groupBooking=false&sourceAirportCode_0=" . $Departure . "&destinationAirportCode_0=" . $Destination . "&departureDate_0=" . $row["Date"];
						$Flight_ID = $row["Flight_ID"];
						
					        echo "<tr>
					          <td>" . $row["Airline"] , "    </td>
					          <td>" . $row["Departure"] , "    </td>
					          <td>" . $row["Destination"] , "    </td>
					          <td>" . $row["Date"] , "    " ."</td>
					          <td>" . " &#8364;" . $row["Price"] . "<br>", "</td>
					          <td><input type=button onclick=window.open('$url') value=\"Go\"/></td>
					          <td></td>";
					          
					          
					          $saveCheck = $conn->query("SELECT flight_id FROM SAVEDFLIGHTS WHERE  User_id='$User' AND Flight_ID='$Flight_ID';");
					          if ($saveCheck->num_rows > 0) {//If the flight is already saved the button displays "Unsave"
					          	echo "<td><input type=button onclick=\"saveFlight(this, '$Flight_ID')\" value=\"Unsave\"/></td>";
					          }else{
					          	echo "<td><input type=button onclick=\"saveFlight(this, '$Flight_ID')\" value=\"Save\"/></td>";
					          }
					          
					          echo "</tr>";  
	  					
				        	
				    	}				
					echo "	</tbody>
						</table>";	    
				}				
				
			} //End of One Way Flight Search
			
			
			
			
			
			if($Found==false){
				
				
				
				/*
					Javascript does not support overloaded functions
					To get around this I set the function up to take the maximum amount of inputs
					Then used a code to check what inputs are being used and where they are passed in
					I translated the code back out in javascript and assigned the correct values to their variables
				*/
				
				$code ="";//MaMiFDLD = All 
				$Func2 = "";
				if($Ret ="true"){$URet="TRUE";}else{$URet="FALSE";}
				
				
				$GetRouteID= $conn->query("SELECT Route_ID FROM ROUTES WHERE Departure = '$Departure' AND Destination = '$Destination';");
				if ($GetRouteID->num_rows >0) {
					while($row = $GetRouteID->fetch_assoc()) {
						$Route = $row['Route_ID'];
					}	
				}
				
				
				
				
				
				
				$sqlCheck = "SELECT Route_ID FROM USERROUTES WHERE User_ID='$User' AND Route_ID=$Route AND MaxPrice=$Price AND Ret=$URet";
				if(!empty($MaxDays)){$Func2 .= ", $MaxDays";$code .="Ma"; $sqlCheck .=" AND MaxDays=$MaxDays";}//Ma
				if(!empty($MinDays)){$Func2 .= ", $MinDays";$code .="Mi"; $sqlCheck .=" AND MinDays=$MinDays";}//Mi
				if(!empty($FDate)){$Func2 .= ", '$FDate'";$code .="FD";   $sqlCheck .=" AND FirstDate='$FDate'";}//FD
				if(!empty($LDate)){$Func2 .= ", '$LDate'";$code .="LD";   $sqlCheck .=" AND lastDate='$LDate'";}//LD
				
				
				$sqlCheck .= ";";
				$Func2 .= ")";
				$Func = "saveSearch(this,  '$code', '$Ret', '$Departure', '$Destination', $Price".$Func2;
				
				
				
				
				$saveCheck = $conn->query($sqlCheck);
			          if ($saveCheck->num_rows > 0) {//If the flights are already saved the button displays "Unsave"
			          	echo "Sorry! No Flights were found for those search criteria, would you like to save this search for later? 	&nbsp;	&nbsp;	&nbsp;
						<input type=\"button\" onclick=\"$Func\"; value=\"Unsave\"/><br />";

			          }else{
			          	echo "Sorry! No Flights were found for those search criteria, would you like to save this search for later? 	&nbsp;	&nbsp;	&nbsp;
						<input type=\"button\" onclick=\"$Func\"; value=\"Save this Search\"/><br />";
			          }
						
				
				
			}
			
		$conn->close();
	}//End of Flight Searches
?>