#!/usr/bin/python

'''
python2 2020년 지원종료 


8포트 RS232 연결 코드


15분 주기로 데이터 수집

*/15 * * * * python serial.py

'''


from __future__ import (absolute_import, division,
                                print_function, unicode_literals)


import serial
import time
import MySQLdb
tty1 = serial.Serial(port='/dev/ttyUSB0',baudrate=9600);



vals = [0x02, 0x44, 0x41, 0x54, 0x41, 0x03,0x31, 0x3a, 0x0d] 
tty1.write(bytearray(vals))

data =tty1.read(91)




ph = data[41:46]
do = data[63:68]
temp = data[86:]


conn = MySQLdb.connect("localhost", "root", "qwe123", "sensor_db")
curs = conn.cursor()
time_sensor = time.time()

curscommand="INSERT INTO sensor_table VALUES ('%d', '%0.1f', '%0.1f')" %(time_sensor,do, temp)

curs.execute(curscommand)
conn.commit()
conn.close()
curs.close()


tty1.close()
