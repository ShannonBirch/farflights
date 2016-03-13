        $(document).ready(function(){

            $('#button').click(function(e) {
                var inputDeparture = $('option[value="'+$(departure).val()+'"]').attr('id');
                var inputDestination = $('option[value="'+$(destination).val()+'"]').attr('id');

                var url = "/Users/Artur/Desktop/Test/SeleniumScraper/SeleniumScraper.py";
                var params = "dest=" + inputDestination + "&dept" + inputDeparture;

                window.alert(params);
                

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