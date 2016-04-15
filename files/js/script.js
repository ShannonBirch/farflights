$(document).ready(function(){

    $('#searchButton').click(function(e) {
        var inputDeparture = $('option[value="'+$(departure).val()+'"]').attr('id');
        var inputDestination = $('option[value="'+$(destination).val()+'"]').attr('id');

        //var url = "/Users/Artur/Desktop/Test/SeleniumScraper/SeleniumScraper.py";
        //var params = "dest=" + inputDestination + "&dept" + inputDeparture;
        var priceVar = 35.00
        var searchPHP = 'scripts/search.php';
        $.post(searchPHP, {dept:inputDeparture, dest: inputDestination, price: priceVar});
        window.alert("Artur's idea");

        /*
         window.location = "https://www.aerlingus.com/html/flightSearchResult.html#/fareType=RETURN" +
             "&fareCategory=ECONOMY&numAdults=1&numChildren=0&numInfants=0&promoCode=&groupBooking=false" +
             "&sourceAirportCode_0="+inputDeparture+"&destinationAirportCode_0="+inputDestination+
              "&departureDate_0=2016-04-02&sourceAirportCode_1="+inputDestination+"&destinationAirportCode_1="+inputDeparture +
              "&departureDate_1=2016-04-08";
        */
    });
});

// THIS IS FOR THE CURRENCY CHANGE
$(function(){
	
	$(".dropdown-menu li a").click(function(){
		
		$(".btn:first").text($(this).text());
			$(".btn:first").val($(this).text());
});
});
// END OF CURRENCY CHANGE


// The nav bar will dissapear whenever a choice is made in mobile/tablet view 
$('.nav a').on('click', function(){
$('.btn-navbar').click();
$('.navbar-collapse').collapse('hide');
});



$(function(){
  $('#loginform').submit(function(e){
  return false;
  });
  
  $('#modaltrigger').leanModal({ top: -100, overlay: 0.45, closeButton: ".hidemodal" });
});

// THIS BELOW HERE IS TO HIDE THE LOGIN FORM WHENEVER YOU CLICK SOMEWHERE ON THE PAGE -->
$(document).mouseup(function (e)
  {
    var container = $('#loginmodal');

    if (!container.is(e.target) // if the target of the click isn't the container...
      && container.has(e.target).length === 0) // ... nor a descendant of the container
    {
      container.hide();
    }
  });


function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  console.log('Name: ' + profile.getName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail());
}



function signOut() {
  var auth2 = gapi.auth2.getAuthInstance();
  auth2.signOut().then(function () {
    console.log('User signed out.');
  });
}












