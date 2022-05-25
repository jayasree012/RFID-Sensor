#include <SPI.h>  //include the SPI bus library
#include<MFRC522.h> //include the RFID reader library
#include <Ethernet.h>

#define SS_PIN 10 //slave select pin
#define RST_PIN 9  //reset pin
#define No_Of_Card 7


MFRC522 rfid(SS_PIN,RST_PIN); //instantiate a MFRC522 reader object
MFRC522::MIFARE_Key key; //create a MIFARE_Key struct named 'key' to hold card information
byte id[No_Of_Card][4]={
  {51,143,132,174},         
  {67,195,242,11},
  {185,206,89,136},
  {105,86,132,135},
  {233,30,69,135},
  {217,185,113,135},
  {89,233,103,136}
};
byte id_temp[3][3];
byte i;
int j=0;

void setup() {
  Serial.begin(9600);

  SPI.begin(); //initialise the SPI bus
  rfid.PCD_Init();
  for(byte i=0;i<6;i++)
  {
    key.keyByte[i]=0xFF;
  }
}
//------------------------------------------------------------------------------


/* Infinite Loop */
void loop()
{int m=0;
  if(!rfid.PICC_IsNewCardPresent())//look for new cards
  return;
  if(!rfid.PICC_ReadCardSerial())//select one of the cards
  return;
  for(i=0;i<4;i++)
  {
   id_temp[0][i]=rfid.uid.uidByte[i]; 
             delay(50);
             //Serial.print(rfid.uid.uidByte[i]);
           //Serial.print(" ");
  }
  Serial.println("Card detected:");
   for(i=0;i<No_Of_Card;i++)
  {
          if(id[i][0]==id_temp[0][0])
          {
            if(id[i][1]==id_temp[0][1])
            {
              if(id[i][2]==id_temp[0][2])
              {
                if(id[i][3]==id_temp[0][3])
                {
                 
                  for(int s=0;s<4;s++)
                  {
                    Serial.print(rfid.uid.uidByte[s]);
                    
                  }
                   Serial.print(" ");
                  Sending_To_db();
                  j=0;
                            
                            rfid.PICC_HaltA(); rfid.PCD_StopCrypto1();   return; 
                }
              }
            }
          }
   else
   {j++;
    if(j==No_Of_Card)
    {
      Serial.println("Card detected:");
      for(int s=0;s<4;s++)
        {
          Serial.print(rfid.uid.uidByte[s]);
        }
      Serial.print(" ");
      Sending_To_db();
      j=0;
    }
   }
  }
  
     // Halt PICC
  rfid.PICC_HaltA();

  // Stop encryption on PCD
  rfid.PCD_StopCrypto1();
 }

 void Sending_To_db()  
 {
    if(j!=No_Of_Card)
    {
      Serial.print('1');
      Serial.print(" ");
    }
    else
    {
      Serial.print('0');
      Serial.print(" ");
    }
 }
