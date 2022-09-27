window.onload = function () {

	var bodyDiv = document.body; // va stocker le body ;

	var tooltipDiv ; // va stocker la div tooltip ;

	// place un message d'erreur comme contenu de l'élément
	// d'id 'tooltip' et rend cet élément visible
	function on_failure(request) {
		tooltipDiv.innerHTML = "Erreur 404 : veuillez rafraîchir la pâge";
		showElementById('tooltip',true);
	}

	// place la réponse du serveur (request.responseText)
	// comme contenu de l'élément d'id 'tooltip' et rend
	// cet élément visible
	function on_success(request) {
		tooltipDiv.innerHTML = request.responseText;
		showElementById('tooltip',true);
	}

	// supprime le contenu de l'élément d'id 'tooltip'
	// et rend cet élément caché
	function tooltip_hide() {
		showElementById('tooltip',false);		
	}
	
	function showElementById(id,bool){
		let element = document.getElementById(id);
		if(bool){
			element.style.visibility = 'visible';
		} else {
			element.style.visibility = 'hidden';
		}
	}

	// effectue la requête Ajax sur le script 'dico.php'
	// avec, comme paramètre 'word', le mot sélectionné
	// sur le double-clic et :
	//   * appelle la fonction 'on_success' en cas de succès
	//   * appelle la fonction 'on_failure' en cas d'échec
	function tooltip_show() {
		let clickedWord = window.getSelection().getRangeAt(0);
		new simpleAjax('dico.php', 'get', "word=" + clickedWord, on_success, on_failure);
	}

	// ici, il faut créer un nouvel élément 'div' avec
	// l'attribut 'id' ayant pour valeur 'tooltip', et
	// avec l'évènement 'onclick' lié à la fonction
	// 'tooltip_hide', et il faut ajouter ce nouvel élément
	// comme dernier fils de l'élément 'body'
	

	function createDiv(tag,id){
		newTag = document.createElement(tag);
		newTag.id = id ;
		bodyDiv.append(newTag);
		return newTag ;
	}

	tooltipDiv = createDiv("div","tooltip") ;
	tooltipDiv.onclick = tooltip_hide ;
	tooltipDiv.title = "CLIQUER POUR FERMER";	

	// ici, il faut ajouter l'évènement 'ondblclick' sur 
	// l'élément 'body' et le ier à la fonction 'tooltip_show'

	bodyDiv.ondblclick = tooltip_show;	
	
};

