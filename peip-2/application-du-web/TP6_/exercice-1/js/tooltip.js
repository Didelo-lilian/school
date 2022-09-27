window.onload = function () {

	// place un message d'erreur comme contenu de l'élément
	// d'id 'tooltip' et rend cet élément visible

	function on_failure(request) {
		tooltip.innerHTML = "Erreur";
		tooltip.style.visibility =' visible';
	}

	// place la réponse du serveur (request.responseText)
	// comme contenu de l'élément d'id 'tooltip' et rend
	// cet élément visible
	function on_success(request) {
		tooltip.innerHTML = request.responseText;
		tooltip.style.visibility =' visible';
	}

	// supprime le contenu de l'élément d'id 'tooltip'
	// et rend cet élément caché
	function tooltip_hide() {
		tooltip.style.visibility =' hidden';
	}
	

	// effectue la requête Ajax sur le script 'dico.php'
	// avec, comme paramètre 'word', le mot sélectionné
	// sur le double-clic et :
	//   * appelle la fonction 'on_success' en cas de succès
	//   * appelle la fonction 'on_failure' en cas d'échec
	function tooltip_show() { 
		new simpleAjax('dico.php', 'get', "word=" + window.getSelection().getRangeAt(0), on_success, on_failure);
	}

	// ici, il faut créer un nouvel élément 'div' avec
	// l'attribut 'id' ayant pour valeur 'tooltip', et
	// avec l'évènement 'onclick' lié à la fonction
	// 'tooltip_hide', et il faut ajouter ce nouvel élément
	// comme dernier fils de l'élément 'body'

	let tooltip = document.createElement("div");
	tooltip.id = "tooltip" ;
	document.body.append(tooltip);
	tooltip.onclick = tooltip_hide ;
	tooltip.title = "FERMER";	

	// ici, il faut ajouter l'évènement 'ondblclick' sur 
	// l'élément 'body' et le ier à la fonction 'tooltip_show'

	document.body.ondblclick = tooltip_show;	
	
};

