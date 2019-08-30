from websocket_server import WebsocketServer
from threading import Thread
import socket
import time
import mysql.connector

mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  passwd="",
  database="anlab"
)

bufferSize  = 1024

UDPS = socket.socket(family=socket.AF_INET, type=socket.SOCK_DGRAM)
UDPS.bind(('0.0.0.0', 12321))
server = WebsocketServer(host='0.0.0.0',port=25852)

clients = {}
msg = {}
close_flag = True

def recieve_data():
	global msg,close_flag
	print "Recieving thread started ..."
	while close_flag:
		data = UDPS.recvfrom(bufferSize)[0]
		data = data.split('#')
		msg[data[0]] = data[1]
		print "Recieved Data"
		print data
		dev_id= data[0]
		sensor_data= data[1].split("$")
		brain_delta= sensor_data[0]
		brain_theta = sensor_data[1]
		pulse = sensor_data[2]
		temp = sensor_data[3]
		mycursor = mydb.cursor()
		sql = "INSERT INTO device_data (device_id, brain_data_delta, brain_data_theta, temperature, pulse) VALUES (%s, %s, %s, %s, %s)" 
		val = (dev_id, brain_delta, brain_theta, temp, pulse)
		mycursor.execute(sql, val)
		mydb.commit()
		print(mycursor.rowcount, "row was inserted.") 
		

def new_client(client, server):
	global clients
	clients[client['id']] = client

def client_left(client, server):
	global clients
	try:
		clients.pop(client['id'])
	except:
		print "Error in removing client %s" % client['id']

def msg_received(client, server, m):
	global msg
	try:
		message = msg[m]
		server.send_message(client, message)
	except:
		print "Error device ID not availabe"

tDev=Thread(target=recieve_data)
tDev.start()

server.set_fn_new_client(new_client)
server.set_fn_client_left(client_left)
server.set_fn_message_received(msg_received)
server.run_forever()
close_flag = False
UDPS.close()
print "Device bridge terminated"
