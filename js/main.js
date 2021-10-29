function recupererReponse(id) {
	// On recupere le bloc qui contient toutes les inputs de la question 1
	const element = document.getElementById(id);

	// On recupere la liste des inputs dans cette question
	const inputElementcollection = element.getElementsByTagName('input');

	// On transforme le HTMLCollection en un array d'elements
	const inputElementArray = Object.values(inputElementcollection);

	// On trouve l'input avec un status 'checked' => https://www.w3schools.com/jsref/jsref_find.asp
	const checkedInput = inputElementArray.find(
		(inputElement) => inputElement.checked === true,
	);

	// Retourne la valeur de l'input checké, et sinon null
	if (checkedInput) {
		return checkedInput.value;
	} else {
		return null;
	}
}

function recupererReponsesFormulaire() {
	const reponses = {};
	for (let index = 1; index < 15; index++) {
		reponses['question_' + index] = recupererReponse('question_' + index);
	}
	return reponses;
}

function reponseformulaire() {
	overall.addEventListener('click', function () {
		e.preventDefault();
	});
	for (var i = 0; i < radio.length; i++) {
		question[i].addEventListener('click', updateDisplay);
	}
	function updateDisplay() {
		var checkedCount = 1;
		for (var i = 0; i < question; i++) {
			if (question[i].checked) {
				reponse++;
			}
		}
		if (checkedCount === 0) {
			overall.checked = false;
			overall.indeterminate = false;
		} else if (checkedCount === question.length) {
			overall.checked = true;
			overall.indeterminate = false;
		} else {
			overall.checked = false;
			overall.indeterminate = true;
		}
	}
}

// remplace
function replacer(str, p1, p2, offset, s) {
	return str + ' - ' + p1 + ' , ' + p2;
}
function replacer(au, en, àla, à) {
	return str + ' - ' + p1 + ' , ' + p2;
}

function onSubmit(event) {
	event.preventDefault();
	const resultat = recupererReponsesFormulaire();

	const estValide = validerFormulaire();
	if (estValide) {
		console.log(resultat);
	} else {
		alert("Votre formulaire n'est pas valide");
	}
}

function init() {
	initHTMLElements();
	initEventListeners();
}

function initHTMLElements() {
	const headerQuestionnaire = document.getElementById('liste-bouton-raccourci');

	// Crée autant de boutons que de nombre de questions
	const nombreDeQuestions = recupererNombreDeQuestions();
	for (let numeroQuestion = 1; numeroQuestion < nombreDeQuestions + 1; numeroQuestion++) {
		const elementBouton = document.createElement('button');
		elementBouton.innerHTML = numeroQuestion;
		elementBouton.className = "raccourci-question";
		elementBouton.addEventListener('click', (e) => goToCard(numeroQuestion));

		// Injecte le bouton dans le DOM
		headerQuestionnaire.appendChild(elementBouton);
	}

}

function initEventListeners() {
	const formulaire = document.getElementById('formulaire_test'); //accede al formulario
	formulaire.addEventListener('submit', onSubmit);

	const button = document.getElementById('button-commence-test');
	button.addEventListener('click', (e) => goToCard(1));

	const listeBoutonPrecedent =
		document.getElementsByClassName('bouton-precedent');
	const listeBoutonSuivant =
		document.getElementsByClassName('bouton-suivant');

	for (let index = 0; index < listeBoutonPrecedent.length; index++) {
		const boutonPrecedent = listeBoutonPrecedent[index];
		const boutonSuivant = listeBoutonSuivant[index];
		boutonPrecedent.addEventListener('click', (e) => validerQuestion(index + 1, index));
		boutonSuivant.addEventListener('click', (e) => validerQuestion(index + 1, index + 2));
	}
}

function recupererNombreDeQuestions() {
	const listeQuestionCard = document.getElementsByClassName('question-card');
	const nombreDeQuestions = listeQuestionCard.length;
	return nombreDeQuestions;
}

function validerQuestion(numeroQuestion, cardDestination) {
	const questionCard = document.getElementById(`question_${numeroQuestion}`);
	// Si la question est validée, la progress bar avance
	if (true) {
		const nombreDeQuestions = recupererNombreDeQuestions();
		const progressBar = document.getElementById('niveau-completude-test');
		progressBar.value = progressBar.value + (100 / nombreDeQuestions);
	}

	goToCard(cardDestination);
}
function goToCard(numeroCard) {
	// Verifier si la question a été répondue
	const carrouselElement = document.getElementById('formulaire_test');
	carrouselElement.style.transform = `translateX(-${numeroCard}00vw)`;
}

function validerFormulaire() {
	///tous les question son ok, metre en rouje les pas valide
}
// Demarrage de l'app
init();

// //function(){

// var formulaire = document.getElementById('champ-formulaire');
// Nom = formulaire.nom;
// prenom = formulaire.prenom;
// téléphone = formulaire.tel;
// email = formulaire.mail;
// rédaction = formulaire.message;

// function validerNom(e) {
// 	if (nom.value == '' || nom.value == null) {
// 		error.style.display = 'block';
// 		error.innerHTML += '<li> Complete votre Nom</li>';
// 		console.log('Merci pour complete votre Nom');

// 		e.preventDefault();
// 	} else {
// 		error.style.display = 'none';
// 	}
// }

// function validerPrenom(e) {
// 	if (prenom.value == '' || prenom.value == null) {
// 		error.style.display = 'block';
// 		error.innerHTML += '<li> Complete votre Prenom</li>';
// 		console.log('Merci pour complete votre Prenom');

// 		e.preventDefault();
// 	} else {
// 		error.style.display = 'none';
// 	}
// }

// function validerTel(e) {
// 	if (tel.value == '' || tel.value == null) {
// 		error.style.display = 'block';
// 		error.innerHTML += '<li> Complete votre numéro de téléphone </li>';
// 		console.log('Merci pour complete votre numéro de téléphone');

// 		e.preventDefault();
// 	} else {
// 		error.style.display = 'none';
// 	}
// }

// function validerEmail(e) {
// 	if (mail.value == '' || mail.value == null) {
// 		error.style.display = 'block';
// 		error.innerHTML += '<li>Merci pour complete votre email </li>';
// 		console.log('Merci pour complete votre email');

// 		e.preventDefault();
// 	} else {
// 		error.style.display = 'none';
// 	}
// }

// function validarRédaction(e) {
// 	if (message.value == '' || message.value == null) {
// 		error.style.display = 'block';
// 		error.innerHTML += '<li>Merci pour complete votre email </li>';
// 		console.log('Redacte votre text la totalite de 50');

// 		e.preventDefault();
// 	} else {
// 		error.style.display = 'none';
// 	}
// }

// formulaire.addEventListener('submit', validerfuntion);

// //}
