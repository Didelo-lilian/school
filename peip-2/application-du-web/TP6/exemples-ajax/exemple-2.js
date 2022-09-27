
window.onload = function() {

	// l'élément qui contient les défin'tions
	let def = document.querySelector("#definition");
	// l'élément 'body'
	let body = document.querySelector("body");
	// la couleur de fond initial de l'élément 'body'
	let bgcolor = body.style.backgroundColor;

	// La fonction appelée au retour de la requête Ajax, en cas
	// de succès.
	// Le paramètre 'request' est un objet contenant, entre autre,
	// le résultat du script invoqué, via l'attribut 'responseText'
	function ok(request) {
		def.innerHTML = request.responseText;
		body.style.backgroundColor = "#D0D0D0";
		def.setAttribute("class","show");
	}

	// La fonction appelée au retour de la requête Ajax, en cas
	// d'echec.
	function ko(request) {
		alert("oops, problème !");
	}

	// Cette fonction effectue la requête Ajax et invoque
	// script 'exemple-1.php' en GET, sans paramètre, et avec
	// les *callbacks* 'ok' (en cas de succès) et 'ko' (en cas d'erreur)
	function definition() {
		new simpleAjax("exemple-2.php","post","def=" + this.getAttribute("data-def"),ok,ko);
	}

	// ici, on ajoute les évènements'onclick', 'onmouseover' et 'onmouseout'
	// avec les fonctions adéquates aux élements qui ont la classe 'definition'

	let defs = document.querySelectorAll(".definition");
	for ( let i = 0; i < defs.length; i++ ) {
		defs[i].onclick = definition;
		defs[i].onmouseover = function(){
			this.style.borderBottom = "dotted 2px red";
		};
		defs[i].onmouseout = function(){
			this.style.borderBottom = "";
		};
	}

	// ici, on ajoute l'évènement 'onclick' et la fonction
	// associée à l'élément d'id 'definition'
	def.onclick = function(){
		this.setAttribute("class","hide");
		body.style.backgroundColor = bgcolor;
	};
};