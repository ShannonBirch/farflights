function onSignIn(googleUser) {
	var profile = googleUser.getBasicProfile();
	
 	var id_token = googleUser.getAuthResponse().id_token;
	
	var xhr = new XMLHttpRequest();
	xhr.open('POST', 'https://www.googleapis.com/oauth2/v3/tokeninfo?id_token='+id_token);
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xhr.onload = function() {
		console.log('Signed in as: ' + xhr.responseText);
			
			// takes the response from google containing user details and uses json to parse
			// the info into variables email, fName and lName
			var data = xhr.responseText;
			var jsonResponse = JSON.parse(data);
			
			var userID = jsonResponse["sub"];
			var email = jsonResponse["email"];
			var fName = jsonResponse["given_name"];
			var lName = jsonResponse["family_name"];
	
			$.post('/scripts/savedFlights.php', {userID, email, fName, lName})
				.done(function(data){
				document.getElementById("Results").innerHTML = data;
			});	
	};
	xhr.send('idtoken=' + id_token);
}



fucntion search(button, dept, dest, ret, price, maxdays, mindays, fdate, ldate){

if(gapi.auth2.getAuthInstance().isSignedIn.get()){ //User logged in
		var user = gapi.auth2.getAuthInstance().currentUser.get();
		
		
		var xhr = new XMLHttpRequest();
		xhr.open('POST', 'https://www.googleapis.com/oauth2/v3/tokeninfo?id_token='+user.getAuthResponse().id_token);
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		xhr.onload = function() {
				
				//takes the response from google containing user details and uses json to parse
				//the info into variables email, fName and lName
				var data = xhr.responseText;
				var jsonResponse = JSON.parse(data);
				
				var userID = jsonResponse["sub"];
				
				$.post('/scripts/search.php', {userID, dept, dest, ret, price, maxdays, mindays, fdate, ldate})
					.done(function(data){
						document.getElementById("Results").innerHTML = data;
				});	
		};
		xhr.send('idtoken=' + user.getAuthResponse().id_token);


		
		
	}else{//Not logged in
	}













}








$saved["Departure"]. "', '". $saved["Destination"]. "', 'true', " .$saved['MaxPrice'].",". $saved["MaxDays"] .",".$saved['MinDays'].", '".$saved['Firstdate']."', '".$saved['LastDate']."' )\" value=\"Search\"/></td>";	








// The nav bar will dissapear whenever a choice is made in mobile/tablet view 
$('.nav a').on('click', function(){
$('.btn-navbar').click();
$('.navbar-collapse').collapse('hide');
});



function signOut() { //Sign Out
  var auth2 = gapi.auth2.getAuthInstance();
  auth2.signOut().then(function () {
    console.log('User signed out.');
  });
}



function toggler(divId) { // Allows More options to expand on click
    $("#" + divId).toggle();
}