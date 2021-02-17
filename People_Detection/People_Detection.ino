#include <JPEGDecoder.h>
#include <Time.h>
#include <TimeLib.h>
#include <Wire.h>
#include <ArduCAM.h>
#include <SPI.h>
#include <string.h>
#include "memorysaver.h"
#define SERVER_ADDRESS "192.168.1.8"
#define SERVER_TCP_PORT 5550
#define TX_BUFFER_MAX 1024
uint8_t tailbuffer[TX_BUFFER_MAX];
int tx_buffer_index = 0;
const int SPI_CS = 7;

int value;
unsigned long timestart;
unsigned long timeend;
int triggered = 0;
int pinOut = 6;
bool perform = false;
time_t t;
char * timenow;
void setup() {
  //Serial.begin(1000000); //velocità scelta dal cliente transferring-images to PC, anche 2.000.000 (datasheet)
  //Serial.begin(115200); //Max rate per Serial 1/2/3
  pinMode(pinOut, INPUT);
  Serial1.begin(9600);
  Serial.begin(9600);
  Serial.println("Waiting for serial data...");
  /*
  while (!Serial1.available() && !Serial.available());
  Serial.println("Reading data on serial.");
//  while (Serial.available() || Serial1.available()){
//    Serial.println((char)Serial.read());
//    Serial.println((char)Serial1.read());
//  }
  //Serial1.readBytes(timenow, 9);
  Serial.println("Current time read from serial!");
  Serial.println(timenow);
  timenow = strtok (timenow, " ,.-");
  int i = 0;
  int hours = 0;
  int minutes = 0;
  int seconds = 0;

  for (i = 0; i < 3 && timenow != NULL; i++)
  {
    puts(timenow);
    if (i == 0)
      hours = hour(strtok (NULL, " ,.-"));
    else if (i == 1)
      minutes = minute(strtok (NULL, " ,.-"));
    else
      seconds = (strtok (NULL, " ,.-"));
  }

  setTime(02, 11, 2019, hours, minutes, seconds);
  */
  setTime(02, 11, 2019, 15, 25,30);
  Serial.println("Current hour set!");
  delay(15000);
}

void loop() {
  value = digitalRead(pinOut);
  if (triggered > 0 && value == 0 && !perform) {
    timestart = millis();
    perform = true;
  }
  if (triggered > 0)
    Serial.println("PORTA APERTA");
  if (value == 1) {
    time_t s = now();
    Serial.println(hour(s));
    Serial.println(minute(s));
    Serial.println(second(s));
    triggered = triggered + 1;
    if (triggered > 1 && perform) {
      Serial.println("Tempo idle:");
      Serial.println(millis() - timestart);
      perform = false;
    }
  }
  Serial.println(value);
  delay(100);
}
