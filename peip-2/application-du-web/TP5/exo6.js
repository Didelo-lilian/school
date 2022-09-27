
window.onload = function () {

	// les noms des fichiers images
	var sources = ["paysage-1.jpg", "paysage-2.jpg", "paysage-3.jpg",
		"paysage-4.jpg", "paysage-5.jpg", "paysage-6.jpg",
		"paysage-7.jpg", "paysage-8.jpg", "paysage-9.jpg"];

	// l'indice de l'image actuellement visible
	var indice = 1;

	// pour stocker l'id du timer
	var handler = null;

	var show = document.getElementById("show");

	// affiche l'image suivante
	function next() {
		if (indice < sources.length){
			indice += 1;
		}
		else {
			indice = 1;
		}
		show.src = "images/paysage-" + indice  + ".jpg";
	}

	// permet, alternativement, de lancer
	// ou d'arrêter le diaporama
	function startstop() {
		clearInterval(handler);
		if (handler === null){
			handler = setInterval(next, 2021);
		}
		else {
			clearInterval(handler);
			handler = null;
		}
	}

	// ici, on relie la fonction "startstop" à l'évènement "onclic"
	// pour l'image (l'élément d'id "show")
	// puis on lance le diaporama "automatique"
	
	handler = setInterval(next, 2021);
	show.onclick = startstop;
	
};
