# SNIR_1

https://www.youtube.com/watch?v=n5gor3Bdmmk#t=795s

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
  Serial.println("Un message va etre envoye toutes les deux secondes des maintenant !");
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
