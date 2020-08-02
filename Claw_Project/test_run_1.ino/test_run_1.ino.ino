#include <Servo.h>
#define trigPin 7
#define echoPin 6

Servo servo;

void setup()
{
Serial.begin (9600);
pinMode(trigPin, OUTPUT);
pinMode(echoPin, INPUT);
servo.attach(8);

}

void loop()
{
int openDelay = 3;
int closeDelay = 5;
long duration, distance;

digitalWrite(trigPin, LOW);
delayMicroseconds(2);
digitalWrite(trigPin, HIGH);
delayMicroseconds(10);
digitalWrite(trigPin, LOW);

duration = pulseIn(echoPin, HIGH);
distance=duration*340/20000;
  digitalWrite(5, HIGH);

if(distance<5){
  Serial.println("object detected within the distance of 5cm --> closing the claw in ");
  for (int i = 0; i < openDelay; i++) {
  Serial.println(openDelay-i);
  delay(1500);
  }
  servo.write(180); 

  Serial.println("object to be released --> opening the claw in ");
  for (int j = 0; j <= closeDelay; j++) {
  Serial.println(closeDelay-j);
  delay(1500);
  }
  servo.write(0);
}

else{
  Serial.print(distance);
  Serial.println(" cm");
  delay(100);
}
}
