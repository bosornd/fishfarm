import serial
import serial.rs485 as rs485
import sys
import codecs
from serial import SerialException
import time
import pymysql
from datetime import datetime
import configparser




port = sys.argv[1]
vals = [0x02, 0x44, 0x41, 0x54, 0x41, 0x03]

print(port)

start_time = time.time()


	
try:
	ser = rs485.RS485(port, baudrate=9600, timeout=2, write_timeout=2)
	ser.rs485_mode = rs485.RS485Settings(delay_before_tx=1, delay_before_rx=1)

	if(ser.isOpen() == False):
                ser.open()

	ser.write(bytearray(vals))
	data = ser.readline()

	try:
		pos = data.index(str.encode('+'))
	except ValueError as err:
		pos = data.index(str.encode('-'))


	data = data[pos:]
	id = str(int(port[11:12])+1)
	ph = str(float(data[17:20]))
	do = str(float(data[38:42]))
	temp = str(float(data[61:66]))

	print("[" + id + "]: PH: " + ph + ", DO: " + do + ",TEMP: " + temp)

	ser.reset_input_buffer()
	ser.reset_output_buffer()
	ser.close()


	reader = configparser.RawConfigParser()
	reader.read('login.cnf')


	db = pymysql.connect(reader.get('client', 'host'),reader.get('client', 'user'),reader.get('client', 'password'),"sensor_db")
	d = datetime.now()
	time_sensor = d.strftime('%m-%d-%Y %H:%M')
	sql = "UPDATE current_log SET do" + id + "=" + do + ", temp" + id + "=" + temp + ", ph" + id + "=" + ph
	cursor = db.cursor()
	cursor.execute(sql)
	cursor.close()
	db.commit()
	db.close()


except OSError as err:
	pass

print("--- %s seconds ---" % (time.time() - start_time))
