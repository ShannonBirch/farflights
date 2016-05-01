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


currencyCode = ["AUD","AED","BDH","BGN","CAD","HRK","CZK","DKK","HUF","MAD","OMR","PLN","CHF","TRY","GBP" ]


if(dept != dest):
	#opens the file which will record the prices
	text_file = open('/home/pi/flights/'+dept+'-'+dest+'.sql', 'wb')

	dateloop = 1

	dcap = dict(DesiredCapabilities.PHANTOMJS)
	dcap["phantomjs.page.settings.userAgent"] = (
     "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/53 "
     "(KHTML, like Gecko) Chrome/15.0.87")

	path_to_phantomjs = '/home/pi/phantomjs/bin/phantomjs'
	browser = webdriver.PhantomJS(executable_path = path_to_phantomjs, desired_capabilities = dcap)


	deptDest = dept + dest
	routeID = ''
	flightID = ''

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
		
		price = str(price.encode("utf-8"))

		
		if(price != "0.00"):
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
				elif(price[:2] == "£"):
					price = price[2:]
					convertFrom = "GBP"
				elif(price[:3] == "€"):
					price = price[3:]
					convertFrom = "EUR"


			newPrice = ""	
			for p in price:
				if(p != ','):
					newPrice += p			

			price = newPrice

			
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


			flightID = 'Aer'+deptDest+deptD
			
		
			text_file.write(b'REPLACE INTO FLIGHTS(Flight_ID, Airline, Route_ID, Date, Price) VALUES(')
			out = ('\'' + flightID + '\', \'AerLingus\', ' + routeID + ', \'' + deptD + '\', ' + price).encode("utf-8") + b');\n'
			
			
			text_file.write(out) #write the price to the text file
			
		dateloop+=1
	text_file.close()
	browser.quit()
	print(datetime.datetime.now().time())
	print(("DONE" + " " + flightID+ " " + dept + " " + dest + " ").encode("utf-8"))
