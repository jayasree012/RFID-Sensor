import serial 
import MySQLdb
import time

#establish connection to MySQL.
dbConn = MySQLdb.connect("localhost","root","","student_attendance") or die ("could not connect to database")
#open a cursor to the database
cursor = dbConn.cursor()

device = 'COM3' 
try:
  print("Trying...",device) 
  arduino = serial.Serial(device, 9600) 
except: 
  print("Failed to connect on",device)
while True:
    
    try:
        
        data=arduino.readline()
        print(data)
        pieces=data.split()
        
        
        try:
            if(pieces[1][0]!=100):
              cursor=dbConn.cursor()
              cursor.execute("""INSERT INTO attendance_details (ID,Member_ID,allowed_members) VALUES (NULL,%s,%s)""", (pieces[0],pieces[1]))
              dbConn.commit()
              cursor.close()
              data=arduino.readline()
        except MySQLdb.IntegrityError:
            print("failed to insert data")
        finally:
            cursor.close()
    except:
        print("Processing")
