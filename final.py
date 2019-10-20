import serial
from time import sleep
from NeuroPy import NeuroPy
import datetime
import sys
import csv
import os
import errno

f = open('test.csv', 'wb')

ser = serial.Serial()
ser.baudrate = 9600
ser.port = sys.argv[1]
ser.open()

neuropy = NeuroPy(sys.argv[2], 115200, 'BC0C')
neuropy.start()
print("started writing!")
sleep(5)




with f:    
    writer = csv.writer(f)
    writer.writerow(['low alpha','high alpha','delta','theta','temperature','bpm'])

    while True:
        try:  
            print(datetime.datetime.now())      
            la = neuropy.lowAlpha
            ha = neuropy.highAlpha
            d = neuropy.delta
            t = neuropy.theta
            temp=ord(ser.read())
            bpm=ord(ser.read())
            writer.writerow([la,ha,d,t,temp,bpm]) 
            print '\nLow alpha= ',la,'\nHigh alpha= ',ha
            print "Delta= ",d,"\nTheta= ",t
            print "Temperature= ",temp,"\nB.P.M.= ",bpm,"\n"
            sleep(2) # sleep for 2s
            
        except KeyboardInterrupt:
            neuropy.stop()
            break
            print("exiting!")
f.close()





