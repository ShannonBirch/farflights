<?php

	

	// Create connection
	function getChallenge(){
		$servername = "localhost";
		$username = "shannonb_Fadmin";
		$password = "potatoe";
		$dbname = "shannonb_farflights";
	
		
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}
	
	
		
		$sql ="CREATE OR REPLACE TYPE Prices AS OBJECT(
				DateOfDeparture		date(YYYY-MM-DD),
				DateOfReturn		date(YYYY-MM-DD),
				Cost 				double,
				Airline				VARCHAR2(100));

				CREATE TYPE PriceTable AS TABLE OF Prices;

				CREATE TABLE ReturnTable(
					DestinationAirport	VARCHAR2(3),
					DepartureAirport	VARCHAR2(3),
					prices 				PriceTable)
				
				NESTED TABLE Prices STORE AS PriceTable;";




		$result = $conn->query($sql);
	








		$conn->close();
	}

?>