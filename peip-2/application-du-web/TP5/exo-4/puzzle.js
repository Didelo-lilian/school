
window.onload = function () {

	// pour distinguer les premiers clics
	// des seconds clics
	var firstClick = true;

	// pour stocker la première image cliquée
	var firstImage;

	// si "notFinished" est vrai, alors
	// il reste des images à permuter
	var notFinished = true;

	//pour stocker toutes les images du puzzle
	//let puzzleDiv = document.querySelector('.puzzle')
	var imagesInPuzzleDiv = document.querySelectorAll('#puzzle>div>img');

	var puzzleSolution = 'abcdefghijkl';

	// traîte le clic sur une image
	function clickOn() {
		if(firstClick){
			firstImage = this;
			firstClick = false;
		} else {
			let secondImage = [firstImage.name,firstImage.src];

			firstImage.name = this.name;
			firstImage.src = this.src;
			this.name = secondImage[0];
			this.src = secondImage[1];
			
			firstClick = true;
		}
		isFinished();
	}

	// teste si le puzzle est terminé
	function isFinished() {
		let puzzleProposition = '';
		
		for(let i = 0; i < imagesInPuzzleDiv.length ; i++){
			puzzleProposition += imagesInPuzzleDiv[i].name;
		}
		notFinished = !(puzzleProposition == puzzleSolution);
		if(!notFinished){
			let resultat = document.getElementById('result');
			resultat.style.visibility = 'visible';
		}
	}

	function imagesInPuzzleDivOnClick(){
		for(let i = 0; i < imagesInPuzzleDiv.length ; i++){
			imagesInPuzzleDiv[i].onclick = clickOn ;
		}
	}

	function solvePuzzle(){
		for(let i = 0; i < imagesInPuzzleDiv.length ; i++){
			imagesInPuzzleDiv.name = puzzleSolution[i] ;
			imagesInPuzzleDiv.src = "puzzle/image1/part-"+puzzleSolution[i]+".jpeg";
		}
	}

	// ici, il faut relier la fonction "clic_on" à l'évènement "onclick"
	// sur toutes les images contenues dans l'élément d'id "puzzle"
	
	//solvePuzzle();

	imagesInPuzzleDivOnClick();
	
};
