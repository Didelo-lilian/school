
window.onload = function() {

	// l'élément d'id 'info' qui contient les
	// informations pour un personnage donné
	var info = document.querySelector("#info");

	const infoDatas = 	{
		"nom": info.querySelector('#nom'),
		"prenom": info.querySelector('#prenom'),
		"sexe": info.querySelector('#sexe'),
		"age": info.querySelector('#age'),
		"activite": info.querySelector('#activite'),
	};

	var infoDatasKeys = Object.keys(infoDatas);

	var currentSrc,imagesId;

	var imagesDivs = document.querySelectorAll("#gallery img");


	// cette fonction place les données regroupées
	// dans le JSON 'data' dans les éléments adéquats, ainsi
	// que le 'src' comme valeur de l'attribut 'src' de
	// l'image adéquate
	function update(datas, src) {
		info.querySelector('img').src = src;
		for(let i = 0; i < infoDatasKeys.length ; i++ ){
			infoDatas[infoDatasKeys[i]].innerHTML = requestData[infoDatasKeys[i]];
		}
	}

	// cette fonction est appelée lorsqu'on clique sur une image.
	// Elle récupère la valeur de l'attribut 'id' et effectue une
	// requête AJAX au script 'info.php' avec cette valeur en paramètre.
	// Elle mets à jour le contenu des éléments adéquat avec les valeurs
	// retournées par le script.
	function showinfo() {
		imagesId = this.id;
		currentSrc = this.src;
		new simpleAjax('info.php', 'get', "id=" + imagesId, on_success, on_failure);
	}

	function on_success(request){
		requestData = JSON.parse(request.response);
		update(requestData,currentSrc);
		showElementById("info",true);	
	}

	function on_failure(){
		alert("Erreur 404 : veuillez rafraîchir la pâge");
	}
	// ici, on ajoute l'évènement 'onclick' sur toutes les images
	// et on lie la fonction 'showInfo' à cet évènement

	function imagesClick(){
		for(let i = 0; i < imagesDivs.length; i++){
			imagesDivs[i].onclick = showinfo;          
		}
	}

	imagesClick();

	
	// ici, on ajoute l'évènement 'onclick' sur l'élément
	// d'id 'info' et on lie à cet évènement la fonction
	// qui cache cet élément

	function showElementById(id,bool){
		let element = document.getElementById(id);
		if(bool){
			element.className = 'show';		
		} else {
			element.className = 'hide';
		}
	}

	function info_hide() {
		showElementById("info",false);		
	}

	info.onclick = info_hide;

};
