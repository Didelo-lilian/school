#define LR 5
//#define bouton 3
int i=0;


void setup() {
Serial.begin(500000);
pinMode(LR, OUTPUT);
//pinMode(bouton,INPUT_PULLUP);
}

void loop() {
  //if(!digitalRead(bouton)){
  for(i=0; i<255; i++){//allume la led progressivement
    analogWrite(LR,i);
    delay(10);    
  }
  for(int i=255; i>0; i--){//éteint la led progressivement
    analogWrite(LR,i);
    delay(10); 
  }
}
