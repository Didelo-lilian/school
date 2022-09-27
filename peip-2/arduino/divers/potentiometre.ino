#define pot 5
int tension_num_5 = 0 ;
float tension_5 = 0 ;

void liretension(int port,int tension_num_port,float tension_port){
  tension_num_port = analogRead(port);
  tension_port = analogRead(port)/204.6;
  
  Serial.print("La tension numérique " + String(port) +" est: " + String(tension_num_port));
  Serial.println("     La tension réel " + String(port) + " est: " + String(tension_port) + " Volt" );
  }
  

void setup() {
  Serial.begin(500000);

}

void loop() {
  liretension(pot,tension_num_5, tension_5);
  
  }
