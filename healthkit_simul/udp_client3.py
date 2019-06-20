import socket
import time
import math as m

devID = "10003"

serverAddressPort   = ("10.42.0.1", 12321)
bufferSize          = 1024

UDPC = socket.socket(family=socket.AF_INET, type=socket.SOCK_DGRAM)

data = 0

while True:
	if data == 361:
		data=0
	message = devID+"#"+str(round(m.sin((data*m.pi)/180)*100,3))+"$"+str(round(m.sin(m.pi/4+(data*m.pi)/180)*100,3))+"$"+str(round(m.sin(m.pi/2+(data*m.pi)/180)*100,3))+"$"+str(round(m.sin(3*m.pi/4+(data*m.pi)/180)*100,3))+"$"+str(round(m.sin(m.pi+(data*m.pi)/180)*100,3))
	UDPC.sendto(message.encode(), serverAddressPort)
	print("Data sent to LPU: "+message)
	#msgFromServer = UDPClientSocket.recvfrom(bufferSize)
	data+=1
	time.sleep(0.5)
