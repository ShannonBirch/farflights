<?php

	$mysqli = new mysqli(<snipped>);
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }


	
	//Post Statement from JS is - {userID, ret, dept, dest, price, maxDays, minDays, firstDate, lastDate})
	
	$User = $_POST['userID']; $Price = $_POST['price']; 
	
	if($_POST['ret']=="true"){$Ret="TRUE";}else{$Ret="FALSE";}

	$GetRouteID = mysqli_query($mysqli, "SELECT Route_ID FROM ROUTES WHERE Departure = '".$_POST['dept']."' AND Destination = '".$_POST['dest']."';");
	if ($GetRouteID->num_rows >0) {
		while($row = $GetRouteID->fetch_assoc()) {
			$Route = $row['Route_ID'];
		}	
	}

	$sqlinsStart = "INSERT INTO USERROUTES(User_id, Route_ID, MaxPrice, Ret";//Beginning of the insert Statement
	$sqlinsMid = ") VALUES ('$User', $Route, $Price, $Ret";//Middle of the insert statement
	
	$sqlCheck = "SELECT Route_ID";
	$sqlDel = "DELETE";
	$sqlCheckDel = " FROM USERROUTES WHERE User_ID='$User' AND Route_ID=$Route AND MaxPrice=$Price AND Ret=$Ret";
	
	if(!empty($_POST['maxDays'])){$maxDays = $_POST['maxDays']; $sqlinsStart .= ", MaxDays"; $sqlinsMid .= ", $maxDays"; $sqlCheckDel .=" AND MaxDays=$maxDays";}
	if(!empty($_POST['minDays'])){$minDays= $_POST['minDays']; $sqlinsStart .= ", MinDays"; $sqlinsMid .= ", $minDays"; $sqlCheckDel .=" AND MinDays=$minDays";}
	if(!empty($_POST['firstDate'])){$firstDate= $_POST['firstDate']; $sqlinsStart .= ", FirstDate"; $sqlinsMid .= ", '$firstDate'"; $sqlCheckDel .=" AND FirstDate='$firstDate'";}
	if(!empty($_POST['lastDate'])){$firstDate= $_POST['lastDate']; $sqlinsStart .= ", LastDate"; $sqlinsMid .= ", '$lastDate'"; $sqlCheckDel .=" AND LastDate='$lastDate'";}
	
	$sql = $sqlinsStart .$sqlinsMid .");";//Insert Statement
	
	$sqlCheckDel .=";";
	$sqlCheck.=$sqlCheckDel;//Select Statement
	$sqlDel.=$sqlCheckDel;	//Delete Statement
	
	$Check = mysqli_query($mysqli, $sqlCheck);
	if ($Check->num_rows==0) {
			mysqli_query($mysqli, $sql);
	}else{
		mysqli_query($mysqli, $sqlDel);
	}
	
	
	
	

	mysqli_close($mysqli );




?>