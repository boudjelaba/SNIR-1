# SNIR_1

https://www.youtube.com/watch?v=n5gor3Bdmmk#t=795s

---
## Code Master

```cpp
//SPI MASTER (ARDUINO)
//COMMUNICATION SPI ENTRE 2 ARDUINO 

#include<SPI.h>                             //Librairie SPI 
#define LED 7           
#define ipbutton 2
int buttonvalue;
int x;
void setup (void)

{
  Serial.begin(115200);                   //Baud Rate 115200 
  
  pinMode(ipbutton,INPUT);                // 2 input 
  pinMode(LED,OUTPUT);                    // 7 Output
  
  SPI.begin();                            //Début de la communication SPI
  SPI.setClockDivider(SPI_CLOCK_DIV8);    //Réglage de l'horloge de communication 
                                          //SPI à 8 (16/8=2Mhz)
  digitalWrite(SS,HIGH);                  // Réglage SlaveSelect à l'état HIGH 
                                //(Sinon le maître ne se connecte pas avec l'esclave )
}

void loop(void)
{
  byte Mastersend,Mastereceive;          

  buttonvalue = digitalRead(ipbutton);   //Lire l'état de la pin 2

  if(buttonvalue == HIGH)                //Logique pour le réglage de la valeur x 
                                         //(à envoyer à l'esclave) en fonction de 
                                         //l'entrée de la pin 2 
  {
    x = 1;
  }
  else
  {
    x = 0;
  }
  
  digitalWrite(SS, LOW);                  //Démarrer la communication avec 
                                          //l'esclave connecté au maître 
  
  Mastersend = x;                            
  Mastereceive=SPI.transfer(Mastersend); //Envoyer la valeur mastersend à l'esclave reçoit 
                                         //également la valeur de l'esclave 
  
  if(Mastereceive == 1)                   //Logique de réglage de la sortie LED en
                                          //fonction de la valeur reçue de l'esclave 
  {
    digitalWrite(LED,HIGH);              // pin 7 HIGH
    Serial.println("Master LED ON");
  }
  else
  {
   digitalWrite(LED,LOW);               // pin 7 LOW
   Serial.println("Master LED OFF");
  }
  delay(1000);
}



___

## Code Slave

```cpp
//SPI SLAVE (ARDUINO)
//COMMUNICATION SPI ENTRE 2 ARDUINO 

#include<SPI.h>
#define LEDpin 7
#define buttonpin 2
volatile boolean received;
volatile byte Slavereceived,Slavesend;
int buttonvalue;
int x;
void setup()

{
  Serial.begin(115200);
  
  pinMode(buttonpin,INPUT);               // pin 2 : INPUT
  pinMode(LEDpin,OUTPUT);                 // pin 7 : OUTPUT
  pinMode(MISO,OUTPUT);                   //Définit MISO comme OUTPUT (il faut envoyer 
                                          //des données à Master IN 

  SPCR |= _BV(SPE);                       //Activer SPI en mode esclave
  received = false;

  SPI.attachInterrupt();                  //L'interruption ON est définie pour 
                                          //la communication SPI 
  
}

ISR (SPI_STC_vect)                        //Fonction de routine d'interruption 
{
  Slavereceived = SPDR;                   // Valeur reçue du maître si stockée 
                                          //dans la variable  slavereceived
  received = true;                        
}

void loop()
{ if(received)                            //Logique pour définir LED ON ou OFF en fonction 
                                          //de la valeur reçue du maître 
   {
      if (Slavereceived==1) 
      {
        digitalWrite(LEDpin,HIGH);         // pin 7 : HIGH LED ON
        Serial.println("Slave LED ON");
      }else
      {
        digitalWrite(LEDpin,LOW);          //pin 7 : LOW LED OFF
        Serial.println("Slave LED OFF");
      }
      
      buttonvalue = digitalRead(buttonpin);  // Lit l'état de la pin 2
      
      if (buttonvalue == HIGH)               //Logique pour définir la valeur de x à 
                                             //envoyer au maître 
      {
        x=1;
        
      }else
      {
        x=0;
      }
      
  Slavesend=x;                             
  SPDR = Slavesend;                           //Envoie la valeur x au maître via SPDR 
  delay(1000);
}
}
```


___
---

## Code Servomoteur

```cpp
#include <Servo.h>

int pin_servo = 3;
int angle_servo;

Servo servo1;

void setup()
{
  Serial.begin(9600);
  servo1.attach(pin_servo);
}

void loop()
{
  Serial.print("Angle de rotation : ");
  angle_servo = 60;
  Serial.print("\t Angle servo : ");
  Serial.println(angle_servo);
  servo1.write(angle_servo);
  delay(500);
}
```


---

https://www.framboise314.fr/wp-content/uploads/2017/11/03_1_1_InstallationQt_LED_v2.pdf

https://www.electronicsforu.com/electronics-projects/setting-qt-software-on-raspberry-pi


```cpp
int i=0;

void setup() {
  Serial.begin(9600);
  Serial.println("Un message toutes les 2 secondes");
}

void loop() {
  Serial.println("Message #" + String(i));
  delay(2000);
  i++;
}
```


```python
import serial

serialArduino = serial.Serial('/dev/ttyXXXX', 9600)

while True :
  	print(serialArduino.readline())
