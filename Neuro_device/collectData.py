from NeuroPy import NeuroPy
from time import sleep
import csv
import os
import errno
     
f = open('test.csv', 'wb')

neuropy = NeuroPy("/dev/ttyUSB1", 115200, 'a224')
neuropy.start()
print("started writing!")
sleep(5)

with f:    
    writer = csv.writer(f)
    writer.writerow(['attention','meditation','rawValue','delta','theta','lowAlpha','highAlpha','lowBeta','highBeta','lowGamma','midGamma','blinkStrength','poor signal'])

    while True:
        try:        
            m = neuropy.meditation
            a = neuropy.attention
            r = neuropy.rawValue
            d = neuropy.delta
            t = neuropy.theta
            la = neuropy.lowAlpha
            ha = neuropy.highAlpha
            lb = neuropy.lowBeta
            hb = neuropy.highBeta
            lg = neuropy.lowGamma
            mg = neuropy.midGamma
            bs = neuropy.blinkStrength
            s = neuropy.poorSignal
            writer.writerow([a,m,r,d,t,la,ha,lb,hb,lg,mg,bs,s]) 
            sleep(1) # sleep for 1s
            
        except KeyboardInterrupt:
            neuropy.stop()
            break
            print("exiting!")
f.close()
