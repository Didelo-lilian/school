
var x; // le premier nombre de la multiplication
var y; // le deuxième nombre de la multiplication

// donne le rôle du bouton :
// si 'verifier' est 'true' alors le prochain clic sur le bouton
// est destiné à vérifier la réponse de l'utilisateur, sinon,
// le clic est destiné à proposer une nouvelle multiplication
var verifier = true; 

// génére une nouvelle multiplication, autrement dit :
// - génère deux entiers au hasard dans l'intervalle [1,9]
// - les affiche dans les bons éléments HTML
function nouvelle() {
  let nombre1Id = document.getElementById('nombre1');
  let nombre2Id = document.getElementById('nombre2');
  let buttonId = document.getElementById('bouton');
  let resultatId = document.getElementById('resultat');
  let propositionId = document.getElementById('proposition');
    
  x = Math.floor((Math.random() * 10) + 1);
  y = Math.floor((Math.random() * 10) + 1);

  nombre1Id.innerHTML = x;
  nombre2Id.innerHTML = y;

  verifier = true;
  buttonId.value = 'Vérifier';
  resultatId.style.visibility ='hidden';

  if(isNaN(propositionId)){
    propositionId.focus();
    propositionId.select();
  }
  
}

function changerCouleur(couleur){
  let resultatId = document.getElementById('resultat');
  let globalDiv = document.querySelector('div');

  globalDiv.style.border = "solid 1px "+ couleur;
  resultatId.style.color = couleur;
}



function verification(){
  let proposition = Number(document.getElementById('proposition').value);
  let buttonId = document.getElementById('bouton');

  if(proposition !== 0){
    let valeurReponse ='';
    let nombre1 = Number(document.getElementById('nombre1').innerHTML);
    let nombre2 = Number(document.getElementById('nombre2').innerHTML);
    let resultatId = document.getElementById('resultat');

    resultatId.style.visibility ='visible';

    if (proposition == x-y){
      valeurReponse += 'Bonne';
      changerCouleur("green");
    } 
    else{
      valeurReponse += 'Mauvaise';
      changerCouleur("red");
    }
    valeurReponse += ' réponse';
    resultatId.innerHTML = valeurReponse;
    buttonId.value = 'Continuer';
  } 
  else{
    alert('Veuillez rentrer un résultat');
  }
  verifier = false;
  
  
}  

// cette fonction est appelée quand l'utilisateur clique
// sur le bouton. La fonction a deux rôles alternatifs :
// - vérifier que la proposition de l'utilisateur est correcte
// - générer une nouvelle multiplication
// Cette alternance est gérée à l'aide de la variable 'verifier'
function valider() {
  if (verifier){
    verification();
  }
  else{
    nouvelle();    
  }
}


