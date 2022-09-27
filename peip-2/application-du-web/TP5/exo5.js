
window.onload = function () {

	// les noms des fichiers images
	var sources = ["paysage-1.jpg", "paysage-2.jpg", "paysage-3.jpg",
		"paysage-4.jpg", "paysage-5.jpg", "paysage-6.jpg",
		"paysage-7.jpg", "paysage-8.jpg", "paysage-9.jpg"];

	// l'indice de l'image actuellement visible
	var indice = 1;

	function next() {
		if (indice < sources.length - 1){
			indice += 1;
		}
		else {
			indice = 1;
		}
		document.getElementById('show').src = "images/paysage-" + indice + ".jpg";
	}
	
	// ici, on lance le diaporama "automatique"
		setInterval(next, 2021);
	};
