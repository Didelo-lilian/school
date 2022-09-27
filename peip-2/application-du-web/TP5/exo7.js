window.onload = function () {
    
	var spanDivs = document.querySelectorAll('span');

	// affiche le nombre "t" dans le span "spanElt"
	// "t" a au plus deux chiffres
	function afficher(t, spanElt) {
			let timeDecade = t[0];
			let timeUnit = t[1];
			let imgTags = spanElt.querySelectorAll('img');

			imgTags[0].src = "images/" + timeDecade + ".png";
			imgTags[1].src = "images/" + timeUnit + ".png";
	}

	// met à jour les images de l'horloge
	// à chaque seconde
	function tictac() {
			let date = new Date();
			t = [normalize(date.getHours()), normalize(date.getMinutes()), normalize(date.getSeconds())];

			for(let i = 0; i < spanDivs.length; i++){
					afficher(t[i],spanDivs[i]);
			}
	}

	function normalize(number){
			return ("0" + number).slice(-2);
	}
	
			// ici, il faut lancer l'horloge
	tictac();
	setInterval(tictac, 1000);
	
}; 
