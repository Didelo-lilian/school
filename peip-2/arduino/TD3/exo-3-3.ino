#define potentiometre 0
#define pwm 5
#define verif 4
int i = 0;
int mpwm = 0;
float m = 0 ;
float mf = 0 ;


void setup() {
  pinMode(pwm,OUTPUT);
  Serial.begin(74880);
}

void loop() {
  m = analogRead(potentiometre);
  mpwm = (m*255)/1023;
  analogWrite(pwm,mpwm);
  mf = analogRead(verif);
  Serial.print(m);
  Serial.print(" ");
  Serial.println(mf);
  

}
