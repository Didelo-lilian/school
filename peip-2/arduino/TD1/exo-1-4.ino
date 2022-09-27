#define pot 5 
#define voltmetre 2 
int tension_num_5 = 0 ;
float tension_5 = 0 ;

void lire_tension(int port,int tension_num_port,float tension_port){
  tension_num_port = analogRead(port);
  tension_port = analogRead(port)/204.8;
  Serial.println("La tension numérique " + String(port) +" est: " + String(tension_num_port));
  Serial.println("La tension réel " + String(port) + " est: " + String(tension_port) + " Volt" );
  }

void setup() {
  pinMode(voltmetre,INPUT);
  Serial.begin(9600); 
  }

void loop() {
  digitalRead(voltmetre);Serial.println(voltmetre);
  lire_tension(pot,tension_num_5, tension_5);
}



 
