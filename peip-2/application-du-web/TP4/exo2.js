
// étant donnée la moyenne 'm'
// retourne l'appréciation correspondante
// (une chaîne de caractères)
function appreciation(moyenne) {
  if (moyenne>=6){
    if(moyenne>=10){
      if(moyenne>=13){
        if(moyenne>=16){
          if(moyenne>=19){
            return "excellent";
          }
          return "très bien";
        }
        return "bien";
      }
      return "moyen";
    }
    return "insuffisant"; 
  } 
  else {
    return "très insuffisant";
  }
}

function moyenne(notes){
  let somme = 0;
  let nombreNote = 0;
  for (let note in notes){
    somme += Number(notes[note]);
    nombreNote += 1;
  }
  return (somme/nombreNote).toFixed(2);
}

// calcule la moyenne à partir des trois notes
// et affiche la mmoyenne et l'appréciation correspondante
function calculer() {
  let note1 = document.getElementById('note1').value;
  let note2 = document.getElementById('note2').value;
  let note3 = document.getElementById('note3').value;
  let resultatId = document.getElementById('resultat');
  let moyenneId = document.getElementById('moyenne');
  let appreciationId = document.getElementById('appreciation');

  let moyenneValue = moyenne([note1,note2,note3])

  resultatId.style.visibility ='visible';

  moyenneId.innerHTML = moyenneValue;
  appreciationId.innerHTML = appreciation(moyenneValue);
}
