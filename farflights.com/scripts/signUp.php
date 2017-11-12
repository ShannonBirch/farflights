<?php

// Create connection
	$mysqli = new mysqli(<snipped>);
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
	
	
	$Email =$_POST['email']; $Google_First_Name =$_POST['fName']; $Google_Last_Name =$_POST['lName'];
	$User_ID =$_POST['userID'];

	$userCheck = mysqli_query($mysqli, "SELECT User_id FROM USER WHERE User_id = '$User_ID';");

	if ($userCheck->num_rows == 0) {
		mysqli_query($mysqli, "INSERT INTO USER(User_id, Email, Google_First_Name, Google_Last_Name) VALUES('$User_ID', '$Email', '$Google_First_Name', '$Google_Last_Name');");
	}
	
	mysqli_close($mysqli );
	
?>