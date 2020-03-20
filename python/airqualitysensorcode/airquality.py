#Code to retrieve air quality data from the SDS011 air quality sensor
#Data is pushed to AdafruitIO

import serial, time
from Adafruit_IO import Client
aio = Client('niallforrest', 'aio_YOsq87ypeyKFJ6f5YkSdV5yMeqQY')

ser = serial.Serial('/dev/ttyUSB0')

while True:
    data = []
    for index in range(0,10):
        airdata = ser.read()
        data.append(airdata)
        
    pmtwofive = int.from_bytes(b''.join(data[2:4]), byteorder='little') / 10
    aio.send('crossgartwofive', pmtwofive)
    pmten = int.from_bytes(b''.join(data[4:6]), byteorder='little') / 10
    aio.send('crossgarten', pmten)
    time.sleep(10)