from websocket_server import WebsocketServer
from threading import Thread
import socket
import time

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
		print msg

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
