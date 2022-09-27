int i = 0 ;
const int n = 5 ;
const int LV = 2; //Led Vert sur le port 
const int LO = 3; //Led Orange sur le port 
void setup() {
pinMode(LV,OUTPUT); //Branche le port 2 comme une sortie
pinMode(LO,OUTPUT); //Branche le port 3 comme une sortie
Serial.begin(9600); // Initialisation de la transmission
}

void loop() {
  digitalWrite(LO,0); //Eteint la led orange
  digitalWrite(LV,0); //Eteint la led verte
  Serial.println("Toutes les leds éteintent"); //Communique les led éteintent
  digitalWrite(LV,1); //Allume la led verte
  Serial.println("Led verte allumé"); //Communique la led allumé
  delay(5000); //Laisser la led allumé pendant 5s
  digitalWrite(LV,0); //Eteint la led verte
  Serial.println("Led verte eteint, orange clignote"); //Communique la led allumé
  while(i<n){digitalWrite(LO,1); //Allume la led orange
             Serial.println("Led orange allumé"); //Communique la led allumé
             delay(250); //Laisser la led allumé pendant 0.25s
             digitalWrite(LO,0); //Eteint la led orange
             Serial.println("Led orange éteinte"); //Communique la led éteinte
             delay(750); //Laisser la led eteinte pendant 0.75s
             i+=1 ; }
             
 digitalWrite(LV,0); //Eteint la led verte
 digitalWrite(LO,0); //Eteint la led orange          
             
             
}
