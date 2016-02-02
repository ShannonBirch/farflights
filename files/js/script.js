      $(document).ready(function(){

          $('#button').click(function(e) {
              var inputDeparture = $('option[value="'+$(departure).val()+'"]').attr('id');
              var inputDestination = $('option[value="'+$(destination).val()+'"]').attr('id');

              window.location = "https://www.aerlingus.com/html/flightSearchResult.html#/fareType=RETURN" +
                     "&fareCategory=ECONOMY&numAdults=1&numChildren=0&numInfants=0&promoCode=&groupBooking=false" +
                     "&sourceAirportCode_0="+inputDeparture+"&destinationAirportCode_0="+inputDestination+
                      "&departureDate_0=2016-03-02&sourceAirportCode_1="+inputDestination+"&destinationAirportCode_1="+inputDeparture +
                      "&departureDate_1=2016-03-04";
          });
      });