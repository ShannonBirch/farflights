import glob, os

read_files = glob.glob("/Users/Artur/Desktop/Flights/*.txt")


sqlFile = open("/Users/Artur/Desktop/Flights/allFlights.sql", "wb")
	
sqlFile.write(b'INSERT INTO FLIGHTS(Airline, Route_ID, Date, Price) VALUES(')

start = True

for f in read_files:
	with open(f,"rb") as infile:
		for line in infile:
			wordNumber = 0
			if (start == False):			#a comma isnt added to the first line
				sqlFile.write(b'),\n\t(')		
			else:							#a comma is added to new line
				sqlFile.write(b'\n\t')
			for word in line.split():
				if (wordNumber == 0 or wordNumber == 2):		#wraps the first word in quotes
					sqlFile.write(b'\'' + word + b'\',')	
				elif (wordNumber < 3):		#adds a comma after each word except for last
					sqlFile.write(b' ' + word + b',')
				else:						#doesnt add a comma after last word
					sqlFile.write(b' ' + word + b'')

				wordNumber+=1 
				start = False



sqlFile.write(b');')











#for f in read_files:
    #with open(f, "rb") as infile:
		#for line         
#outfile.write(infile.read())






