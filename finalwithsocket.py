import serial
import socket
from time import sleep
from NeuroPy import NeuroPy
import datetime
import sys
import csv
import os
import errno

f = open('test.csv', 'a')

ser = serial.Serial()
ser.baudrate = 9600
ser.port = sys.argv[1]
ser.open()

neuropy = NeuroPy(sys.argv[2], 115200, 'BC0C')
neuropy.start()
print("started writing!")
sleep(5)

devID = "1"
serverAddressPort   = ("192.168.0.113", 12321)
bufferSize          = 1024
UDPC = socket.socket(family=socket.AF_INET, type=socket.SOCK_DGRAM)

with f:    
    writer = csv.writer(f)
    while True:
        try:        
            m = neuropy.meditation
            a = neuropy.attention
            d = neuropy.delta
            t = neuropy.theta
            temp=ord(ser.read())
            bpm=ord(ser.read())
            writer.writerow([a,m,d,t,temp,bpm]) 
            print [a,m,d,t,temp,bpm]
            message = devID+"#"+str(a)+"$"+str(m)+"$"+str(temp)+"$"+str(bpm)
            UDPC.sendto(message, serverAddressPort)
            sleep(2) # sleep for 2s
            
        except KeyboardInterrupt:
            neuropy.stop()
            break
            print("exiting!")
f.close()





