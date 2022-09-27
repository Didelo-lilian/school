
//le tableau qui contient le chemin
// du fichier image pour chaque image
var array = [];

// si clicked[i] == true alors array[i] est visible
var clicked = [];

// pour décider si un clic est
// un premier clic ou non
var first_click = true;

// l'indice de la première image cliquée
var first_index = 0;

// le nombre total de paires de clics
var clicks_number = 0;

// the nombre de paires de clics réussis
// (les paires de clics qui ont découvert
// des images identiques)
var good_clicks_number = 0;

// affecte à l'attribut src des deux images d'indice i et j
// le source de l'image "point d'interrogation"
function hide(i,j) {
  let imagesInGridDivs = document.querySelectorAll("#grid img");
	imagesInGridDivs[i].src = "images/question-mark.png";	
	imagesInGridDivs[j].src = "images/question-mark.png";
  clicked[i] = false;	
	clicked[j] = false;	
}

// gère le clic sur l'image d'indice n
function click_image(n) {
  let imagesInGridDivs = document.querySelectorAll("#grid img");
	if(first_click){
    first_index = n;	
    first_click = false;			
		imagesInGridDivs[n].src = array[n];	
	}
	else{
		clicks_number += 1;
		imagesInGridDivs[n].src = array[n];
		if(array[first_index] == array[n]){
      clicked[n] = true;
      clicked[first_index] = true;						
			good_clicks_number += 1;
		}
		else{
			setTimeout(function(){hide(first_index,n)},500);
      clicked[n] = false;	
      clicked[first_index] = false;					
		}
		first_click = true;	
	}

	if(good_clicks_number == (imagesInGridDivs.length)/2){
		let resultatId = document.getElementById("result");
		resultatId.innerHTML = "Bravo! Vous avez effectué " + clicks_number + " essais !";
		resultatId.style= "visibility: visible";
	}
}

// rempli le tableau array avec la valeur de
// l'attribut 'name' des images
function init() {
  let imagesInGridDivs = document.querySelectorAll("#grid img");
	for (let i=0 ; i < imagesInGridDivs.length ;i++){
		array[i] = imagesInGridDivs[i].name;
		array[i].onclick = click_image;
	}	
}

window.onload = init;