# -*- coding: utf-8 -*-
from selenium import webdriver
from selenium.webdriver.common.desired_capabilities import DesiredCapabilities
import time

#This code opens a new instance of Chrome.
#path_to_chromedriver = '/Users/Artur/Desktop/PythonApplication1/Libraries/chromedriver'
#browser = webdriver.Chrome(executable_path = path_to_chromedriver)


dcap = dict(DesiredCapabilities.PHANTOMJS)
dcap["phantomjs.page.settings.userAgent"] = (
     "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/53 "
     "(KHTML, like Gecko) Chrome/15.0.87")


path_to_phantomjs = '/Users/Artur/Desktop/Project/SeleniumScraper/Libraries/bin/phantomjs.exe'
browser = webdriver.PhantomJS(executable_path = path_to_phantomjs, desired_capabilities = dcap)



#Opens the page
url = 'https://www.aerlingus.com/html/flightSearchResult.html#/fareType=RETURN&fareCategory=ECONOMY&numAdults=1&numChildren=0&numInfants=0&promoCode=&groupBooking=false&sourceAirportCode_0=DUB&destinationAirportCode_0=CDG&departureDate_0=2016-04-02&sourceAirportCode_1=CDG&destinationAirportCode_1=DUB&departureDate_1=2016-04-10'
browser.get(url)

time.sleep(10) #capture of price needs to be delayed as the webpage needs time to load


#opens the file which will record the prices
text_file = open('C:/Users/Artur/Desktop/test.txt', 'wb')

#loads page element (in this case its the element that cotains total price for a flight, from the url above)
price = (browser.find_element_by_xpath('/html/body/div[2]/div/div[3]/div/div/div[1]/div[2]/ul/li[4]/ul/li/span[3]/span[3]').get_attribute('innerHTML').encode("utf-8"))

text_file.write(price[-6:]) #write the price to the text file
text_file.close()