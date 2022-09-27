const int LV = 2; //Led Vert sur le port 2
const int LO = 3; //Led Orange sur le port 3 
const int LR = 4; //Led Rouge sur le port 4
int i = 0 ;
const int n = 6 ;

void setup() {
  pinMode(LV,OUTPUT); //Branche le port 2 comme une sortie
  pinMode(LO, OUTPUT); //Branche le port 3 comme une sortie
  pinMode(LR, OUTPUT); //Branche le port 4 comme une sortie
  Serial.begin(9600); // Initialisation de la transmission
  }

void EteintTout(){digitalWrite(LV,1);digitalWrite(LO,1);digitalWrite(LR,1);Serial.println("Toutes les Leds sont éteintes");}

void ClignoteFeu(const byte lequel){//Fonction qui fait clignoter
  EteintTout();
  while ( i < n ) {Serial.println("Entrée dans le while");
    switch (lequel) {
    case LV : AllumeFeu(LV);delay(750);digitalWrite(LV,1);Serial.println("Led Verte éteinte");break;
    case LO : AllumeFeu(LO);delay(750);digitalWrite(LO,1);Serial.println("Led Orange éteinte");break;
    case LR : AllumeFeu(LR);delay(750);digitalWrite(LR,1);Serial.println("Led Rouge éteinte");break;
    }  
    delay(250);
    i = i + 1;Serial.print(i);
     }  
i = 0;
}

void AllumeFeu(const byte lequel){
  EteintTout();
  switch (lequel) {
    case LV : digitalWrite(LV,0);Serial.println("Led vert allumé");break;
    case LO : digitalWrite(LO,0);Serial.println("Led Orange allumé");break;
    case LR : digitalWrite(LR,0);Serial.println("Led Rouge allumé");break;
  }}

void FeuTricolore(){AllumeFeu(LV);delay(5000);ClignoteFeu(LO);AllumeFeu(LR);delay(5000);}

void loop() {
  FeuTricolore();
  }
  
