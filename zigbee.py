'''
zigbee_id   node_id

  2E39 <-> 19B3

  2E6B <-> BAC7

  F6DD <-> 175F
	
  2E69 <-> 1A38

  2E6C <-> F38E

  2E35 <-> 3B2D

  2E3A <-> 21EB

  2E4B <-> 9371

  2E52 <-> 69DB

  2E3B <-> 5C09

'''
import serial
import time
import MySQLdb
from datetime import datetime

zigbee = serial.Serial(port='/dev/ttyUSB0',baudrate=9600)


conn = MySQLdb.connect("localhost", "root", "okhwa1234", "sensor_db")
curs = conn.cursor()

Zigbee_id = ['2E52','F6DD']
Node_id = ['69DB', '175F']

i=0

for node_id in Node_id:
    zigbee.write(bytes('AT+UNICAST='+ node_id +',\\02DATA\\03 \n').encode('ascii'));
    time.sleep(.1)
    data = zigbee.read(300)
    pos = data.index(str.encode('OK'))
    data = data[pos:]
    id = str(data[17:21])
    ph = str(float(data[65:70]))
    do = str(float(data[87:92]))
    temp = str(float(data[109:116]))

    print("id = " + id +" PH: " + ph + ", DO: " + do + ",TEMP: " + temp)
    zigbee.flushInput()
    zigbee.flushOutput()


    
    curscommand="select id from sensor_id where sensor_id = ('%s')" %(Zigbee_id[i])
    curs.execute(curscommand)
    result = curs.fetchone()
    id =str(result[0])
    curscommand="UPDATE current_log SET do" + id + "=" + do + ", temp" + id + "=" + temp + ", ph" + id + "=" + ph
    curs.execute(curscommand)
    conn.commit()
    i = i + 1


zigbee.close()
conn.close()
curs.close()
