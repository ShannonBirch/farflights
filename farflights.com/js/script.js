


// The nav bar will dissapear whenever a choice is made in mobile/tablet view 
$('.nav a').on('click', function(){
$('.btn-navbar').click();
$('.navbar-collapse').collapse('hide');
});


function onSignIn(googleUser) {
	
	var xhr = new XMLHttpRequest();
	xhr.open('POST', 'https://www.googleapis.com/oauth2/v3/tokeninfo?id_token='+googleUser.getAuthResponse().id_token);
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xhr.onload = function() {
			
			// takes the response from google containing user details and uses json to parse
			// the info into variables email, fName and lName
			var data = xhr.responseText;
			var jsonResponse = JSON.parse(data);
			
			var userID = jsonResponse["sub"];
			var email = jsonResponse["email"];
			var fName = jsonResponse["given_name"];
			var lName = jsonResponse["family_name"];
	
			$.post('/scripts/signUp.php', {userID, email, fName, lName})
				.done(function(data){
			});	
	};
	xhr.send('idtoken=' + googleUser.getAuthResponse().id_token);
}



function signOut() { //Sign Out
  var auth2 = gapi.auth2.getAuthInstance();
  auth2.signOut().then(function () {
    console.log('User signed out.');
  });
}





function toggler(divId) { // Allows More options to expand on click
    $("#" + divId).toggle();
}