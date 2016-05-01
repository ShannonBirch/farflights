######################### SET 1 ##################################
DEST="DUB"
DEPT=("ABZ" "JFK" "KIR")
for i in "${DEPT[@]}"
do
        echo "$i"
        exec python SeleniumScraper.py "$i" "$DEST" &
done

sleep 45m
for i in "${DEPT[@]}"
do
        sshpass -p '2uatNzrz>6uW'  scp -P 2222 /home/pi/flights/"$i"-"$DEST".sql  shannonb@catchtimeapp.com:/home2/shannonb/public_html/farflights.com/SQL/files
done

for i in "${DEPT[@]}"
do
        echo "$i"
        exec python SeleniumScraper.py "$DEST" "$i" &
done

sleep 45m
for i in "${DEPT[@]}"
do
        sshpass -p '2uatNzrz>6uW'  scp -P 2222 /home/pi/flights/"$DEST"-"$i".sql  shannonb@catchtimeapp.com:/home2/shannonb/public_html/farflights.com/SQL/files
done
########################################################################################

####################### SET 2 ###########################################
DEPT=("LCY" "LHR" "LIT")
for i in "${DEPT[@]}"
do
        echo "$i"
        exec python SeleniumScraper.py "$i" "$DEST" &
done

sleep 45m
for i in "${DEPT[@]}"
do
        sshpass -p '2uatNzrz>6uW'  scp -P 2222 /home/pi/flights/"$i"-"$DEST".sql  shannonb@catchtimeapp.com:/home2/shannonb/public_html/farflights.com/SQL/files
done

for i in "${DEPT[@]}"
do
        echo "$i"
        exec python SeleniumScraper.py "$DEST" "$i" &
done

sleep 45m
for i in "${DEPT[@]}"
do
        sshpass -p '2uatNzrz>6uW'  scp -P 2222 /home/pi/flights/"$DEST"-"$i".sql  shannonb@catchtimeapp.com:/home2/shannonb/public_html/farflights.com/SQL/files
done
################################################################################################

##########################	SET 3	#########################################
DEPT=("LON" "LPA" "LPL")
for i in "${DEPT[@]}"
do
        echo "$i"
        exec python SeleniumScraper.py "$i" "$DEST" &
done

sleep 45m
for i in "${DEPT[@]}"
do
        sshpass -p '2uatNzrz>6uW'  scp -P 2222 /home/pi/flights/"$i"-"$DEST".sql  shannonb@catchtimeapp.com:/home2/shannonb/public_html/farflights.com/SQL/files
done

for i in "${DEPT[@]}"
do
        echo "$i"
        exec python SeleniumScraper.py "$DEST" "$i" &
done

sleep 45m
for i in "${DEPT[@]}"
do
        sshpass -p '2uatNzrz>6uW'  scp -P 2222 /home/pi/flights/"$DEST"-"$i".sql  shannonb@catchtimeapp.com:/home2/shannonb/public_html/farflights.com/SQL/files
done
###############################################################################


##########################	SET 4	#########################################
DEPT=("ACE" "ACK" "ADB")
for i in "${DEPT[@]}"
do
        echo "$i"
        exec python SeleniumScraper.py "$i" "$DEST" &
done

sleep 45m
for i in "${DEPT[@]}"
do
        sshpass -p '2uatNzrz>6uW'  scp -P 2222 /home/pi/flights/"$i"-"$DEST".sql  shannonb@catchtimeapp.com:/home2/shannonb/public_html/farflights.com/SQL/files
done

for i in "${DEPT[@]}"
do
        echo "$i"
        exec python SeleniumScraper.py "$DEST" "$i" &
done

sleep 45m
for i in "${DEPT[@]}"
do
        sshpass -p '2uatNzrz>6uW'  scp -P 2222 /home/pi/flights/"$DEST"-"$i".sql  shannonb@catchtimeapp.com:/home2/shannonb/public_html/farflights.com/SQL/files
done
###############################################################################

##########################	SET 5	#########################################
DEPT=("GSP" "GVA" "HAM")
for i in "${DEPT[@]}"
do
        echo "$i"
        exec python SeleniumScraper.py "$i" "$DEST" &
done

sleep 45m
for i in "${DEPT[@]}"
do
        sshpass -p '2uatNzrz>6uW'  scp -P 2222 /home/pi/flights/"$i"-"$DEST".sql  shannonb@catchtimeapp.com:/home2/shannonb/public_html/farflights.com/SQL/files
done

for i in "${DEPT[@]}"
do
        echo "$i"
        exec python SeleniumScraper.py "$DEST" "$i" &
done

sleep 45m
for i in "${DEPT[@]}"
do
        sshpass -p '2uatNzrz>6uW'  scp -P 2222 /home/pi/flights/"$DEST"-"$i".sql  shannonb@catchtimeapp.com:/home2/shannonb/public_html/farflights.com/SQL/files
done
###############################################################################

sleep 1m

exec bash runScraper.sh
