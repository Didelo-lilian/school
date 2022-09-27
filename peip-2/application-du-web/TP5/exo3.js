
window.onload = function () {


	var miniatureDivs = document.getElementsByClassName('miniature');

	// affiche la source de l'image cliquée dans l'image
	// d'id "realize"
	function show() {
		let realsizeId = document.getElementById('realsize');
		let legendId = document.getElementById('legend');

		let srcMiniature = this.src;
		let srcTitle = this.title;
		realsizeId.setAttribute("src",srcMiniature);
		realsizeId.setAttribute("title",srcTitle);
		legendId.innerHTML = srcTitle;
	}

	// ici, il faut relier la fonction "show" à l'évènement "onmouseover"
	// sur toutes les images ayant la classe "miniature"
	
	for(let i = 0; i < miniatureDivs.length; i++){
		miniatureDivs[i].onmouseover = show;
	}

};
