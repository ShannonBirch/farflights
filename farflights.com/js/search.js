$(document).ready(function(){ //Search Function

    $('#searchButton').click(function(e) {
    
    	if(gapi.auth2.getAuthInstance().isSignedIn.get()){//If user is logged in
    
    		var user = gapi.auth2.getAuthInstance().currentUser.get();
	
		//Needs a logged in check!
		var xhr = new XMLHttpRequest();
		xhr.open('POST', 'https://www.googleapis.com/oauth2/v3/tokeninfo?id_token='+user.getAuthResponse().id_token);
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		xhr.onload = function() {
				
				//takes the response from google containing user details and uses json to parse
				//the info into variables email, fName and lName
				var data = xhr.responseText;
				var jsonResponse = JSON.parse(data);
				
				var userID = jsonResponse["sub"];
				
				 $.post('/scripts/search.php', {dept: $('option[value="'+$(departure).val()+'"]').attr('id'),
	        						dest: $('option[value="'+$(destination).val()+'"]').attr('id'),
	        						price: document.getElementById("price").value,
	        						ret: document.getElementById("returnCheckBox").checked, 
	        						maxdays: document.getElementById("maxDays").value,
	        						mindays: document.getElementById("minDays").value,
	        						fdate: document.getElementById("fdateAvailable").value,
	        						ldate: document.getElementById("ldateAvailable").value,
	        						userID})
	          .done(function(data){
	            document.getElementById("Results").innerHTML = data;
	          });	
		};
		xhr.send('idtoken=' + user.getAuthResponse().id_token);
		
	}else{ //If not logged in
	
	
		$.post('/scripts/search.php', {dept: $('option[value="'+$(departure).val()+'"]').attr('id'),
	        						dest: $('option[value="'+$(destination).val()+'"]').attr('id'),
	        						price: document.getElementById("price").value,
	        						ret: document.getElementById("returnCheckBox").checked, 
	        						maxdays: document.getElementById("maxDays").value,
	        						mindays: document.getElementById("minDays").value,
	        						fdate: document.getElementById("fdateAvailable").value,
	        						ldate: document.getElementById("ldateAvailable").value})
	          .done(function(data){
	            document.getElementById("Results").innerHTML = data;
	          });
	
	}   //End of not logged in search

    });
});//End of Search Function


function saveFlight(button, f1){
	if(gapi.auth2.getAuthInstance().isSignedIn.get()){ //User is logged in
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
				
				$.post('/scripts/saveflight.php', {userID, f1})
					.done(function(data){
				});	
		};
		xhr.send('idtoken=' + user.getAuthResponse().id_token);
		
		if(button.value=="Save"){
			button.value="Unsave";
		}else{
			button.value="Save";
		}
		
	}else{ //Not Logged in
	
	
	}
		
}//End SaveFlight()


function saveReturn(button, f1, f2){
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
				
				$.post('/scripts/saveflight.php', {userID, f1, f2})
					.done(function(data){
				});	
		};
		xhr.send('idtoken=' + user.getAuthResponse().id_token);
		
		if(button.value=="Save"){
			button.value="Unsave";
		}else{
			button.value="Save";
		}
		
	}else{//Not logged in
		
	
	
	
	}


}//End saveReturn()


function saveSearch(button, code, ret, dept, dest, price, one, two, three, four){
	
	var maxDays, minDays, firstDate, lastDate, temp;
	var count = 1;
	/*
		Javascript does not support overloaded functions
		To get around this I set the function up to take the maximum amount of inputs
		Then used a code to check what inputs are being used and where they are passed in
		I translated the code back out in javascript and assigned the correct values to their variables
	*/
	if(code==''){
	
	}else{
		for(i=0;i<code.length;i=i+2){
			if(count==1){temp = one;}
			else if(count==2){temp = two;}
			else if(count==3){temp = three;}
			else{temp=four;}
		
			if(code.charAt(i)=='M'&&code.charAt(i+1)=='a'){maxDays=temp; window.alert("maxDays");}
			else if(code.charAt(i)=='M'&&code.charAt(i+1)=='i'){minDays=temp;}
			else if(code.charAt(i)=='F'&&code.charAt(i+1)=='D'){firstDate=temp;}
			else{lastDate=temp;}
			
			count++;
		}
	}
	
	
	
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
				
				$.post('/scripts/savesearch.php', {userID, ret, dept, dest, price, maxDays, minDays, firstDate, lastDate})
					.done(function(data){
				});	
		};
		xhr.send('idtoken=' + user.getAuthResponse().id_token);
		
		if(button.value=="Save this Search"){
			button.value="Unsave";
		}else{
			button.value="Save this Search";
		}
		
	}else{//Not logged in
		
	
	
	
	}
	
	


}