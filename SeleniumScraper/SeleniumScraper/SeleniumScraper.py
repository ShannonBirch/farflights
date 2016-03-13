# -*- coding: utf-8 -*-
from selenium import webdriver
from selenium.webdriver.common.desired_capabilities import DesiredCapabilities
import time
import datetime
import string
import sys

#This code opens a new instance of Chrome.
#path_to_chromedriver = '/Users/Artur/Desktop/PythonApplication1/Libraries/chromedriver'
#browser = webdriver.Chrome(executable_path = path_to_chromedriver)


dcap = dict(DesiredCapabilities.PHANTOMJS)
dcap["phantomjs.page.settings.userAgent"] = (
     "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/53 "
     "(KHTML, like Gecko) Chrome/15.0.87")


path_to_phantomjs = '/Users/Artur/Desktop/farflights/SeleniumScraper/Libraries/bin/phantomjs.exe'
browser = webdriver.PhantomJS(executable_path = path_to_phantomjs, desired_capabilities = dcap)



dept = "DUB"
dest = str(sys.argv[1])

#opens the file which will record the prices
text_file = open('C:/Users/Artur/Desktop/Flights/'+dest+'.txt', 'wb')



dateloop = 1


while (dateloop < 4):
	price = None
	deptDate = datetime.date.today()
	deptD = str(deptDate+datetime.timedelta(days=dateloop))

	#Opens the page
	url = 'https://www.aerlingus.com/html/flightSearchResult.html#/fareType=ONEWAY&fareCategory=ECONOMY&numAdults=1&numChildren=0&numInfants=0&promoCode=&groupBooking=false&sourceAirportCode_0='+dept+'&destinationAirportCode_0='+dest+'&departureDate_0='+ deptD

	browser.get(url)
	browser.refresh()

	time.sleep(5) #capture of price needs to be delayed as the webpage needs time to load
		
	#loads page element (in this case its the element that cotains total price for a flight, from the url above)
	price = (browser.find_element_by_xpath('//*[@id="test_ts_purchasePrice"]/span[3]').get_attribute('innerHTML').encode("utf-8"))

	out = (dept+' ' + dest + ' ' + deptD + ' ').encode("utf-8")+price[3:]+('\n').encode("utf-8")
	print(out)


	text_file.write(out) #write the price to the text file
	dateloop+=1
	

browser.close()

text_file.close()