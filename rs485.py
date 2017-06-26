import serial
import serial.rs485 as rs485
import sys
import pymysql

port = sys.argv[1]
vals = [0x02, 0x44, 0x41, 0x54, 0x41, 0x03]

ser = rs485.RS485(port, baudrate=9600, timeout=1, write_timeout=1)
ser.rs485_mode = rs485.RS485Settings(delay_before_tx=1, delay_before_rx=1)
ser.write(bytearray(vals))
data = ser.readline()
ser.reset_input_buffer()
ser.reset_output_buffer()
ser.close()

pos = data.index(str.encode('+'))
neg = data.index(str.encode('-'))
if ( neg < pos ):
	pos = neg

data = data[pos:]

id = str(int(port[11:12])+1)
ph = str(float(data[11:21]))
do = str(float(data[33:43]))
temp = str(float(data[56:65]))

sql = "UPDATE current_log SET do" + id + "=" + do + ", temp" + id + "=" + temp + ", ph" + id + "=" + ph
print(sql)

db = pymysql.connect("localhost", "root", "okhwa1234", "sensor_db")
cursor = db.cursor()
cursor.execute(sql)
cursor.close()
db.commit()
db.close()
