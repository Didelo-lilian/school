
window.onload = function() {
		
	// retourne la version normalisée de la chaîne 'name'
	// (tout en inuscuile sauf la première lettre)
	function normalize(name) {
		name = name.trim().toLowerCase();
		return name.substring(0, 1).toUpperCase() + name.substring(1);
	}

	// sauvegarde la liste des participants via une requête Ajax
	function save() {
		let array = []; // la valeur JavaScript qui va être transmise au serveur
		let lis = document.querySelectorAll("#list li");
		for ( let i = 0; i < lis.length; i++ ) {
			array.push( { name: lis[i].innerHTML, gender: lis[i].getAttribute( "class" ) } );
		}
		let newdate = new Date();
		document.querySelector("#date").innerHTML = newdate;
		new simpleAjax("save.php","post","list=" + JSON.stringify(array) + "&date=" + encodeURI(newdate));
	}
	
	// supprime cet élément 'li' (this) de la liste
	function remove() {
		if ( confirm( "Remove " + this.innerHTML + "?" ) ) {
			this.parentNode.removeChild(this);
			save();
		}		
	}
	
	// ajoute une nouvelle personne à la liste
	function add() {
		let newLi = document.createElement("li");
		newLi.onclik = remove;
		newLi.setAttribute("class",document.querySelector("input[name='gender']:checked").value);
		newLi.innerHTML = normalize(document.querySelector("#firstname").value) + " " + normalize(document.querySelector("#lastname").value);
		newLi.onclick = remove;
		document.querySelector("ol").appendChild(newLi);
		let inputs = document.querySelectorAll(".data input[type='text']");
		for ( let i = 0; i < inputs.length; i++ )
			inputs[i].value = "";
	 	document.querySelector("#male").checked = true;
	 	save();
	}
	
	// ici, on ajoute l'évènement 'onclick' et la fonction
	// associée à chaque élément 'li' de la liste des participants

	document.querySelector("section#new > input").onclick = add;
	let lis = document.querySelectorAll("#list li");
	for ( let i = 0; i < lis.length; i++ ) {
		lis[i].onclick = remove;
	}
};
