
window.onload = function() {

	// La fonction appelée au retour de la requête Ajax, en cas
	// de succès.
	// Le paramètre 'request' est un objet contenant, entre autre,
	// le résultat du script invoqué, via l'attribut 'responseText'
	function ok(request) {
		let span = document.querySelector("#proverbe span");
		span.innerHTML= request.responseText;
	}

	// La fonction appelée au retour de la requête Ajax, en cas
	// d'echec.
	function ko(request) {
		alert("oops, problème !!");
	}

	// Cette fonction effectue la requête Ajax et invoque
	// script 'exemple-1.php' en GET, sans paramètre, et avec
	// les *callbacks* 'ok' (en cas de succès) et 'ko' (en cas d'erreur)
	function nouveau() {
		new simpleAjax('exemple-1.php', 'get', '', ok, ko);
	}

	// au chargement de la page, appelle 'nouveau' toutes les 5 secondes
	
	setInterval( nouveau, 5000 );
};
