
window.onload = function() {

	// l'élément d'id 'info' qui contient les
	// informations pour un personnage donné
	var info = document.querySelector("#info");

	var currentSrc,imagesId;

	var images = document.querySelectorAll("#gallery img");

	var src;

	// cette fonction place les données regroupées
	// dans le JSON 'data' dans les éléments adéquats, ainsi
	// que le 'src' comme valeur de l'attribut 'src' de
	// l'image adéquate
	function update(datas, src) {
		info.querySelector('img').src = src;
		info.querySelector("#nom").innerHTML = data["nom"];
		info.querySelector("#prenom").innerHTML = data["prenom"];
		info.querySelector("#sexe").innerHTML = data["sexe"];
		info.querySelector("#age").innerHTML = data["age"];
		info.querySelector("#activite").innerHTML = data["activite"];		
	}

	// cette fonction est appelée lorsqu'on clique sur une image.
	// Elle récupère la valeur de l'attribut 'id' et effectue une
	// requête AJAX au script 'info.php' avec cette valeur en paramètre.
	// Elle mets à jour le contenu des éléments adéquat avec les valeurs
	// retournées par le script.
	function showinfo() {
		src = this.src;
		new simpleAjax('info.php', 'get', "id=" + this.id, on_success, on_failure);
	}

	function on_success(request){
		data = JSON.parse(request.response);
		update(data,src);
		info.className = 'show'; 
	}

	function on_failure(){
		alert("");
	}
	// ici, on ajoute l'évènement 'onclick' sur toutes les images
	// et on lie la fonction 'showInfo' à cet évènement

		for(let i = 0; i < images.length; i++){
			images[i].onclick = showinfo;          
		}

	
	// ici, on ajoute l'évènement 'onclick' sur l'élément
	// d'id 'info' et on lie à cet évènement la fonction
	// qui cache cet élément

	function info_hide() {
		info.className = 'hide'; 		
	}

	info.onclick = info_hide;

};
