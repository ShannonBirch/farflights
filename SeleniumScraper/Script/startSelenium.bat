set List=DUB KIR LCY LON ABZ 

for %%a in (%List%) do (

start C:\Users\Artur\AppData\Local\Programs\Python\Python35-32\python.exe C:\Users\Artur\Desktop\current\SeleniumScraper\SeleniumScraper\SeleniumScraper.py DUB %%a
)

timeout 1100

set List2=BHX BRS CWL DSA EMA

for %%a in (%List2%) do (

start C:\Users\Artur\AppData\Local\Programs\Python\Python35-32\python.exe C:\Users\Artur\Desktop\current\SeleniumScraper\SeleniumScraper\SeleniumScraper.py DUB %%a
)

timeout 1100

set List3=EDI GLA IOM JER LBA

for %%a in (%List3%) do (

start C:\Users\Artur\AppData\Local\Programs\Python\Python35-32\python.exe C:\Users\Artur\Desktop\current\SeleniumScraper\SeleniumScraper\SeleniumScraper.py DUB %%a
)

timeout 1100

set List4=LPL LGW LHR MAN NCL

for %%a in (%List4%) do (

start C:\Users\Artur\AppData\Local\Programs\Python\Python35-32\python.exe C:\Users\Artur\Desktop\current\SeleniumScraper\SeleniumScraper\SeleniumScraper.py DUB %%a
)

timeout 1100

set List5=NQY MEL PER SYD VIE

for %%a in (%List5%) do (

start C:\Users\Artur\AppData\Local\Programs\Python\Python35-32\python.exe C:\Users\Artur\Desktop\current\SeleniumScraper\SeleniumScraper\SeleniumScraper.py DUB %%a
)