window.onload = function () {

	// le "handler" du setTimeout
	var chrono = null;

	// si 'ok' est 'true', alors l'utilisateur
	// a choisi la bonne réponse
	var ok = false;

	var userAnswered = false;

	var messageId = document.getElementById("message");

	var inputDivs = document.querySelectorAll("input");

	var messageGoodResponse = "Bravo bonne réponse !";
	var messageBadResponse = "Mauvaise réponse, réessayez";

	// affiche le message 'm' avec la couleur 'c'
	// dans l'élément prévu à  cet effet
	function msg(m, c) {
		messageId.innerHTML = m;
		messageId.style.color = c;
	}

	// cette fonction est appelée à  l'issue
	// du setTimeout
	function stop() {
		if(!userAnswered){
			msg("Trop tard, il faut être plus rapide", "red");
		}
		else {
			if(ok){
				msg("Le temps est écoulé et vous avez déjà donné la bonne réponse","green");
			}
			else {
				msg("Le temps est écoulé et vous n'avez pas  donné la bonne réponse","red");
			}
		}
		messageGoodResponse += " (en retard)";
		messageBadResponse += " (en retard)";		
    }

	// traite le "clic" sur un bouton radio
	function verifier() {
    if (this.getAttribute("data-ok") !== null){
      ok = true;
			msg(messageGoodResponse, "green");
			clearTimeout(chrono);
    }
    else {
      ok = false;
			msg(messageBadResponse, "red");
    }
		userAnswered = true;
	}

	function inputClick(){
		for(let i = 0; i < inputDivs.length; i++){
			inputDivs[i].onclick = verifier;          
		}
	}

	// ici, on lance le setTimeout et stocke
	// le "handler" dans la variable 'chrono'

	inputClick();
	chrono = setTimeout(stop, 5000);
	
};
