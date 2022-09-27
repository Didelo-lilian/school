#define pot 5
#define LR 4
#define LO 3
#define LV 2
int tension_num_5 = 0 ;
float tension_5 = 0 ;

void EteintTout(){digitalWrite(LV,1);
digitalWrite(LO,1);
digitalWrite(LR,1);
Serial.println("Toutes les Leds sont éteintes");
}

void AllumeFeu(const byte lequel){
  EteintTout();
  switch (lequel) {
    case LV : digitalWrite(LV,0);Serial.println("Led vert allumé");break;
    case LO : digitalWrite(LO,0);Serial.println("Led Orange allumé");break;
    case LR : digitalWrite(LR,0);Serial.println("Led Rouge allumé");break;
  }}

void Rituel(){
  Serial.begin(9600); // Initialisation de la transmission
  digitalWrite(LR,0);Serial.println("Led de départ"); //Rituel de départ
  delay(2000);
  digitalWrite(LR,1);Serial.println("Led de départ fin");
}
  

void setup() {
  pinMode(LV,OUTPUT); //Branche le port 2 comme une sortie
  pinMode(LO, OUTPUT); //Branche le port 3 comme une sortie
  pinMode(LR, OUTPUT); //Branche le port 4 comme une sortie
  Rituel();
  }

void loop() {
  tension_num_5 = analogRead(5);
  tension_5 = analogRead(5)/204.8;
  Serial.println("La tension numérique " + String(5) +" est: " + String(tension_num_5));
  Serial.println("La tension réel " + String(5) + " est: " + String(tension_5) + " Volt" );

  if (tension_5 <= float(2.4)){
    Serial.println("Entrée dans le premier if");
    digitalWrite(LV,1);Serial.println("Led vert éteinte"); 
    digitalWrite(LO,0);Serial.println("Led Orange allumé");
    digitalWrite(LR,1);Serial.println("Led Rouge éteinte");
    Serial.println("Tension inssufisante");}

  if (tension_5 > float(2.6)){
    Serial.println("Entrée dans le second if");
    digitalWrite(LV,1);Serial.println("Led vert éteinte"); 
    digitalWrite(LO,1);Serial.println("Led Orange éteinte");digitalWrite(LR,0);
    Serial.println("Led Rouge allumé");Serial.println("Tension trop élevé");}

  if ((tension_5 <= float(2.6))&&(tension_5 > float(2.4))) {
    Serial.println("Entrée dans le troisième if");
    digitalWrite(LV,0);Serial.println("Led vert allumé");
    digitalWrite(LO,1);Serial.println("Led Orange éteinte");
    digitalWrite(LR,1);Serial.println("Led Rouge éteinte");
    Serial.println("Tension bonne");}
}
