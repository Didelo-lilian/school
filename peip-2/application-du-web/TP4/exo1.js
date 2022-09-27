
// calcule le prix TTC à partir du prix hors-taxe
// et de la TVA
// affiche une alerte avec un message d'erreur si les
// valeurs fournies ne sont pas des nombres

function prixTTC() {
  let prixHT = Number(document.getElementById('pht').value);
  let TVA = Number(document.getElementById('tva').value);
  let prixTTC = document.getElementById('pttc') ;
  let resultat = document.getElementById('resultat');

  if(typeof(prixHT) == 'number' && typeof(TVA) == 'number' && !isNaN(prixHT) && !isNaN(TVA)){ 
    resultat.style.visibility ='visible';
    let valuePrixTTC = (prixHT * (1+(TVA/100))).toFixed(1);
    prixTTC.innerHTML = valuePrixTTC;
  } else{
    resultat.style.visibility ='hidden';
    alert("Le prix hors-taxe et la TVA doivent être des nombres");
  }
}
