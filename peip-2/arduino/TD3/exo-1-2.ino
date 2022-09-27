#define LR 5
#define bouton 3
int j=0;


void setup() {
Serial.begin(500000);
pinMode(LR, OUTPUT);
pinMode(bouton,INPUT_PULLUP);
}

void loop() {
  while(!digitalRead(bouton)){
    int i=0;
    analogWrite(LR,i);
    delay(10);    
    i=i+1;
    if (i>255 and i>0){
    analogWrite(LR,i);
    delay(10); 
    i=i-1;
    j=i;}analogWrite(LR,j);
    delay(10); 
    j=j-
    
    1;}
    
}
    
  
