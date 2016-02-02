<?

$doc = new DomDocument


$doc->validateOnParse = true;
$doc-loadHTML(file_get_contents('https://www.aerlingus.com/html/flightSearchResult.html#/fareType=RETURN&fareCategory=ECONOMY&numAdults=1&numChildren=0&numInfants=0&promoCode=&groupBooking=false&sourceAirportCode_0=DUB&destinationAirportCode_0=LCY&departureDate_0=2016-02-03&sourceAirportCode_1=LCY&destinationAirportCode_1=DUB&departureDate_1=2016-02-05'));

var_dump($doc->getElementById('col orig');



?>