import glob, os

read_files = glob.glob("/Users/Artur/Desktop/Flights/*.txt")


with open("/Users/Artur/Desktop/Flights/allFlights.sql", "wb") as outfile:
    for f in read_files:
        with open(f, "rb") as infile:
            outfile.write(infile.read())