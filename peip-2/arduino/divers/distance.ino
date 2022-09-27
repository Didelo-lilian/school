void setup() {
  pinMode(1,OUTPUT);
  pinMode(3,INPUT);
  Serial.begin(9600);
}

void loop() {
    digitalWrite(1,1);
    delayMicroseconds(10);
    digitalWrite(1,0);
    Serial.println((pulseIn(3,1)/2)*0.034);
    
}
