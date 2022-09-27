window.onload = function () {
  //-----------GENERE LE HTML--------------------//
  var app = document.getElementById("app");
  var labelInputTemps,
    inputTemps,
    imagePendu,
    underscoreClueDiv,
    clueDiv,
    underscoreDivs,
    propositionsDivs;

  generatePageHTML();

  function generatePageHTML() {
    generateInputTimeHTML();
    generatePenduHTML();
    generateUnderscoreClueHTML();
    generatePropositionsHTML();
  }

  function generateInputTimeHTML() {
    labelInputTemps = createDiv("label", "label_input_temps", app.id);
    labelInputTemps.setAttribute("for", "input_temps");
    labelInputTemps.innerHTML = "Durée de la partie :";
    inputTemps = createDiv("input", "input_temps", app.id);
    inputTemps.setAttribute("type", "number");
    inputTemps.setAttribute("name", "input_temps");
    inputTemps.setAttribute("min", "1");
    inputTemps.setAttribute("max", "5");
    inputTemps.setAttribute("required", "");
  }

  function generatePenduHTML() {
    imagePendu = createDiv("img", "image_pendu", app.id);
    imagePendu.src = "images/p00.png";
  }

  function generateUnderscoreClueHTML() {
    underscoreClueDiv = createDiv("div", "underscoreClue", app.id);
    clueDiv = createDiv("p", "clue", underscoreClueDiv.id);
    underscoreDivs = createDiv("p", "underscore", underscoreClueDiv.id);
  }

  function generatePropositionsHTML() {
    propositionsDivs = createDiv("div", "propositions", app.id);
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

  //-----------MOTEUR DE JEU--------------------//

  var random_word;
  var random_word_clue;
  getWord();

  console.log(propositionsDivs + clueDiv + underscoreDivs);

  function getWord() {
    new simpleAjax("php/word.php", "post", "", okGetWord, koGetWord);
  }

  function okGetWord(request) {
    response = JSON.parse(request.response);
    console.log(response);
    random_word = response["random_word"];
    random_word_clue = response["random_word_clue"];
    clueDiv.innerHTML = random_word_clue;
    underscoreDivs.innerHTML = generateUnderscore(random_word);
    Horloge();
  }

  function koGetWord(request) {
    alert("Erreur 404 : veuillez rafraîchir la pâge");
  }

  function checkLetter() {
    this.style = "opacity: 0.6;";
    if (!finished) {
      let letterClicked = this.id;
      let tmp = underscoreDivs.innerHTML;
      let tmp2 = tmp.split(" ");
      let letterClickedIs = false;
      for (let i = 0; i < random_word.length; i++) {
        letter = random_word.charAt(i);
        if (letterClicked == letter) {
          //tmp = tmp.replace(tmp.charAt(i),letterClicked).substring(0, tmp.length - 1);
          tmp2[i] = letter;
          underscoreDivs.innerHTML = tmp2.join(" ");
          letterClickedIs = true;
        }
      }
      if (!letterClickedIs) {
        numberOfError += 1;
      }
      if (numberOfError == 12) {
        alert("LOOSE");
      }
      imagePendu.src = "images/p" + normalize(numberOfError) + ".png";
    } else {
      app.innerHTML = "VOUS AVEZ PERDU, le mot était " + random_word;
    }

    let propositionWord = underscoreDivs.innerHTML.split(" ").join("");
    if (propositionWord == random_word) {
      alert("WIN");
    }
  }

  function normalize(number) {
    return ("0" + number).slice(-2);
  }

  function letterOnclick() {
    if (numberOfError != 12) {
      for (let i = 0; i < letterImages.length; i++) {
        letterImages[i].onclick = checkLetter;
      }
    }
  }

  var letterImages = propositionsDivs.querySelectorAll("img");
  letterOnclick();

  var numberOfError = 0;

  function generateUnderscore(word) {
    return generateUnderscoreNumber(word.length);
  }

  function generateUnderscoreNumber(number) {
    return "_ ".repeat(number);
  }

  var time;
  var timerDivs;
  var finished = false;

  function Horloge() {
    //time = inputTemps.value * 60;
    time = 5 * 60;
    if (!finished) {
      setInterval(ProgressionHorloge, 1000);
    }

    let seconds = time % 60;
    let secondsDecade = Math.floor(seconds / 10);
    let secondsInteger = seconds % 10;
    let minutes = Math.floor(time / 60);

    timerDivs = createDiv("p", "timer", app.id);
    timerDivs.innerHTML = "" + minutes + ":" + secondsDecade + secondsInteger;
  }
  function ProgressionHorloge() {
    if (time > 0) {
      time--;
      let seconds = time % 60;
      let secondsDecade = Math.floor(seconds / 10);
      let secondsInteger = seconds % 10;
      let minutes = Math.floor(time / 60);

      timerDivs.innerHTML = "" + minutes + ":" + secondsDecade + secondsInteger;
    } else {
      console.log("Fin du temps impartie!");
      finished = true;
    }
  }
};
