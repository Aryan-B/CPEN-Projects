#include <Servo.h>
#define trigPin 7
#define echoPin 6

int count=0;

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
int openDelay = 1;
int closeDelay = 2;
long duration, distance;


digitalWrite(trigPin, LOW);
delayMicroseconds(2);
digitalWrite(trigPin, HIGH);
delayMicroseconds(10);
digitalWrite(trigPin, LOW);

duration = pulseIn(echoPin, HIGH);
distance=duration*340/20000;


if(distance<10){
  if(count%2!=0){
    Serial.println("ground detected within the distance of 5cm --> closing the claw in ");
    for (int i = 0; i < openDelay; i++) {
    Serial.println(openDelay-i);
    delay(4000);
    Serial.println(count);
    servo.write(90); 
    delay(4000);
    count++;
    }}
   else if(count%2==0){
    Serial.println("ground detected within the distance of 5cm --> opening the claw in ");
    for (int j = 0; j < openDelay; j++) {
    Serial.println(closeDelay-j);
    delay(3000);
    Serial.println(count);
    servo.write(0);
    delay(4000);
    count++;
   }}
    
}

else{
  Serial.print(distance);
  Serial.println(" cm");
  delay(100);
}
}
