#!/usr/bin/python

'''
python2 2020년 지원종료 


Sena zigbee연결 코드


15분 주기로 데이터 수집

*/15 * * * * python zigbee.py

'''


import serial
import time
tty1 = serial.Serial(port='/dev/ttyUSB0',baudrate=9600);


tty1.write(bytes('AT+UNICAST=24B6,\\02DATA\\03 \n', encoding='ascii')) 
#tty1.write("AT+UNICAST=24B6,\\02DATA\\03".encode())


data =tty1.read(200)

zigid = data[46:50]

ph = data[90:99]
do = data[111:121]
temp = data[135:143]

print(zigid)
print(float(ph))
print(float(do))
print(float(temp))

tty1.close()
