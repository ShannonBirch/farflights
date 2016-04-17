# -*- coding: utf-8 -*-
from selenium import webdriver
from selenium.webdriver.common.desired_capabilities import DesiredCapabilities
import time
import datetime
import string
import sys
import requests

NUM_DAYS = 91

dept = str(sys.argv[1])
dest = str(sys.argv[2])


currencyCode = ["AUD","BDH","BGN","CAD","HRK","CZK","DKK","HUF","MAD","OMR","PLN","CHF","TRY","GBP" ]


if(dept != dest):
	#opens the file which will record the prices
	text_file = open('C:/Users/Artur/Desktop/Flights/'+dept+'-'+dest+'.sql', 'wb')

	dateloop = 1

	dcap = dict(DesiredCapabilities.PHANTOMJS)
	dcap["phantomjs.page.settings.userAgent"] = (
     "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/53 "
     "(KHTML, like Gecko) Chrome/15.0.87")

	path_to_phantomjs = '/Users/Artur/Desktop/farflights/SeleniumScraper/Libraries/bin/phantomjs.exe'
	browser = webdriver.PhantomJS(executable_path = path_to_phantomjs, desired_capabilities = dcap)


	deptDest = dept + dest
	routeID = ''

	for c in deptDest:
		routeID+= str(ord(c))

	while (dateloop < NUM_DAYS):

		price = b''
		deptDate = datetime.date.today()
		deptD = str(deptDate+datetime.timedelta(days=dateloop))

		#Opens the page
		url = 'https://www.aerlingus.com/html/flightSearchResult.html#/fareType=ONEWAY&fareCategory=ECONOMY&numAdults=1&numChildren=0&numInfants=0&promoCode=&groupBooking=false&sourceAirportCode_0='+dept+'&destinationAirportCode_0='+dest+'&departureDate_0='+ deptD

		browser.get(url)
		browser.refresh()
	
		time.sleep(7) #capture of price needs to be delayed as the webpage needs time to load
		
		#loads page element (in this case its the element that cotains total price for a flight, from the url above)
		price = (browser.find_element_by_xpath('//*[@id="test_ts_purchasePrice"]/span[3]').get_attribute('innerHTML'))

		letter = False

		for i in currencyCode:
			if(price[:3] == i):
				convertFrom = price[:3]
				convertFrom = convertFrom.upper()
				letter = True
				price = price[3:]


		if(letter == False):
			if (price[:1] == "$"):
				price = price[1:]
				convertFrom = "USD"
			elif(price[:1] == "£"):
				price = price[1:]
				convertFrom = "GBP"
			elif(price[:1] == "€"):
				price = price[1:]
				convertFrom = "EUR"
			else:
				error_log = open('C:/Users/Artur/Desktop/Flights/error_log')
				error_log.write("ERROR CURRENCY ON " + dept + " " + dest + " " + deptD)
		


		convertTo = "EUR"
		convertTo = convertTo.upper()

		conversion = float(price)
		
		url = ('https://currency-api.appspot.com/api/%s/%s.json') % (convertFrom, convertTo)

		urlalt = ('http://themoneyconverter.com/%s/%s.aspx') % (convertFrom, convertTo)

		r = requests.get(url)

		urlalt = ('http://themoneyconverter.com/%s/%s.aspx') % (convertFrom, convertTo)

		split1 = ('>%s/%s =') % (convertTo, convertFrom)
		strip1 = ('</textarea>')

		ralt = requests.get(urlalt)
		converted = float(ralt.text.split(split1)[1].split(strip1)[0].strip())

		price = (conversion * converted)
		price = round(price, 2)

		price = str(price)


		if(price == b'' or price == b'0.00' or price == b'0' or price == b'0.00'):
			price = "NULL"
		else:
			text_file.write(b'INSERT INTO FLIGHTS(Airline, Route_ID, Date, Price) VALUES(')
			out = ('\'AerLingus\', ' + routeID + ', \'' + deptD + '\', ' + price).encode("utf-8") + b');\n'
			print(out)
			print(dept)
			text_file.write(out) #write the price to the text file
			
		dateloop+=1
	text_file.close()
	browser.close()

	#\xe2\x82\xac
	#\xc2\xa
	#price[3:]