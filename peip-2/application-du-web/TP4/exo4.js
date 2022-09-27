
// teste si les champs du formulaire sont corrects et :
// - si ils le sont, retourne 'true'
// - sinon, affiche le message d'erreur adéquat dans
//   l'emplacement prévu à cet effet, et retourne 'false'
function checkform() {
  let login = document.getElementById("log").value;
	let password1 = document.getElementById("pass1").value;
	let password2 = document.getElementById("pass2").value;
	if (login.length <= 3 || !isletter(login)){
		errormsg("Login incorrect");
		return false;
	}
	else if (password1.length < 4){
		errormsg("Mot de passe incorrect");
		return false;
	}
	else if (password1 != password2){
		errormsg("Les deux mots de passe sont différents");
		return false;
	}
	else {
		return true;
	}
}

function isletter(chaine) {
	let regex = "[a-zA-ZáàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ]{"+chaine.length+",}";
	let patt = new RegExp(regex);
  return patt.test(chaine);
}

// efface le contenu de l'élément où on affiche
// les messages d'erreur et cache cet élément
function resetform() {
  let resetId = document.getElementById("erreur");
	resetId.innerHTML = "";
	document.getElementById("erreur").style.visibility = "hidden";
}

// écrit 'msg' dans l'élément où on affiche
// les messages d'erreur et montre cet élément
function errormsg(msg) {
  let errorId = document.getElementById("erreur");
	errorId.innerHTML = msg;
	document.getElementById("erreur").style.visibility = "visible";
}
