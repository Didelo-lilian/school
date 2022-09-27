window.onload = function () {
  var app = document.getElementById("app");

  generatePageHTML();

  function generatePageHTML() {
    generateInputTimeHTML();
    generatePenduHTML();
    generateUnderscoreClueHTML();
    generatePropositionsHTML();
  }

  function generateInputTimeHTML() {
    console.log(app);
    console.log(app.getAttribute("id"));
    let labelInputTemps = createDiv("label", "label_input_temps", app.id);
    labelInputTemps.setAttribute("for", "input_temps");
    labelInputTemps.innerHTML = "Durée de la partie :";
    let inputTemps = createDiv("input", "input_temps", app.id);
    inputTemps.setAttribute("type", "number");
    inputTemps.setAttribute("name", "input_temps");
    inputTemps.setAttribute("min", "1");
    inputTemps.setAttribute("max", "5");
    inputTemps.setAttribute("required", "");
  }

  function generatePenduHTML() {
    let imagePendu = createDiv("img", "image_pendu", app.id);
    imagePendu.src = "images/p00.png";
  }

  function generateUnderscoreClueHTML() {
    let underscoreClueDiv = createDiv("div", "underscoreClue", app.id);
    let clueDiv = createDiv("p", "clue", underscoreClueDiv.id);
    let underscoreDivs = createDiv("p", "underscore", underscoreClueDiv.id);
  }

  function generatePropositionsHTML() {
    let propositionsDivs = createDiv("div", "propositions", app.id);
    const alphabet = [
      "a",
      "b",
      "c",
      "d",
      "e",
      "f",
      "g",
      "h",
      "i",
      "j",
      "k",
      "l",
      "m",
      "n",
      "o",
      "p",
      "q",
      "r",
      "s",
      "t",
      "u",
      "v",
      "w",
      "x",
      "y",
      "z",
    ];
    for (let i = 0; i < alphabet.length; i++) {
      let tmp = createDiv("img", alphabet[i], propositionsDivs.id);
      tmp.src = "images/" + alphabet[i] + ".png";
      tmp.className = "image_letter";
      tmp.alt = "Lettre " + alphabet[i];
    }
  }

  function createDiv(tag, id, idParent) {
    let newTag = document.createElement(tag);
    newTag.id = id;
    document.getElementById(idParent).append(newTag);
    return newTag;
  }

  function showElement(element, bool) {
    if (bool) {
      element.style.visibility = "visible";
    } else {
      element.style.visibility = "hidden";
    }
  }
};
