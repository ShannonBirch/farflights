<?php


	$User=$_POST['userID'];  $F1=$_POST['f1']; $F2=$_POST['f2'];

	$mysqli = new mysqli(<snipped>);
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
	  
	 
	if(empty($F2)){
	
		$Check = mysqli_query($mysqli, "SELECT flight_ID FROM SAVEDFLIGHTS WHERE User_id = '$User' AND flight_id = '$F1';");
		
		if ($Check->num_rows >0) {
			//If it is saved it deletes the save
			mysqli_query($mysqli, "DELETE FROM SAVEDFLIGHTS WHERE User_id ='$User' AND Flight_id ='$F1';");
			
		}else{
			
			//If it's not saved it saves the flight
			mysqli_query($mysqli, "INSERT INTO SAVEDFLIGHTS(Flight_ID, User_id) VALUES('$F1', '$User');");
		}
	}else{
		
		$Check = mysqli_query($mysqli, "SELECT Outbound FROM SAVEDRETURNS WHERE User_id = '$User' AND Outbound = '$F1' AND Inbound ='$F2';");
		
		if ($Check->num_rows >0) {
			//If it is saved it deletes the save
			mysqli_query($mysqli, "DELETE FROM SAVEDRETURNS WHERE User_id = '$User' AND Outbound = '$F1' AND Inbound ='$F2';");
			
		}else{
			
			//If it's not saved it saves the flight
			mysqli_query($mysqli, "INSERT INTO SAVEDRETURNS(Outbound, Inbound, User_id) VALUES('$F1', '$F2', '$User');");
		}
	
	}
	
	
	
	
	mysqli_close($mysqli );


?>