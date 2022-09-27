
// le nombre d'essais dans la partie courante
var essais = 0;
// le nombre total d'essais de toutes les parties
var nbEssais = 0;
// le nombre de paties jouées et terminées
var nbParties = 0;
// indique si on est en train de jouer une partie
var partieEnCours = true;
// le nombre à deviner
var secret = generer();
// le nombre d'essais du meilleur jeu
// Number.MAX_SAFE_INTEGER est la plus grande valeur
// entière possible
var meilleurJeu = Number.MAX_SAFE_INTEGER;

// vérifie la proposition de l'utilisateur et :
// - si la proposition est incorrecte, affiche la bonne
//   indication (trop petit ou trop grand)
// - sinon affiche le nombre d'essais qui ont été nécessaires
//   et mets à jour les statistiques
function verifier() {
	let propositionId = document.getElementById("proposition");
  let proposition = propositionId.value;
	if (partieEnCours){
		if (proposition == secret){
      essais += 1;
			afficher("Résolu en "+essais+" essai(s)!", "green");
			nbEssais += essais;
			partieEnCours = false;
			afficherStat();
			document.getElementById("question").style.visibility = "visible";
			
		}
		else if (proposition > secret){
			afficher("trop grand !", "red");
			essais += 1;
		}
		else {
			afficher("trop petit !", "red");
			essais += 1;
		}
		propositionId.focus();
    propositionId.select();
  }
	}


// si 'encore' est vrai, démarre une nouvelle partie
// sinon termine le jeu en affichant le message adéquat
function jouerEncore( encore ) {
  if (encore){
		secret = generer();
		essais = 0;
		partieEnCours = true;
		document.getElementById("question").style.visibility = "hidden";
		afficher("C'est parti...", "blue");
		document.getElementById("proposition").value = "";
	}
	else{
		document.getElementById("question").style.visibility = "hidden";
		afficher("Le jeu est fini", "blue");
	}
}

// affiche un message dans une couleur donnée
// dans l'élément prévu à cet effet
function afficher( message, couleur ) {
  let messageId = document.getElementById("message");
	messageId.innerHTML = message;
	document.getElementById("message").style.color = couleur;
}

// met à jour les statistiques
function afficherStat() {
  nbParties += 1;

	document.getElementById("nbParties").innerHTML = nbParties;
	document.getElementById("nbMoyenEssais").innerHTML = (nbEssais/nbParties).toFixed(1);
	meilleurJeu = Math.min(meilleurJeu,essais);
	document.getElementById("meilleurJeu").innerHTML = meilleurJeu;
}

// retourne un nombre aléatoire dans l'intervalle [1, 100]
function generer() {
  return Math.floor((Math.random()*100)+1);
}
