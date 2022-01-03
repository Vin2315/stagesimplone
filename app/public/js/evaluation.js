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
	// Recupere la 15e question qui est la redaction
	const redaction = document.getElementById("test-redaction-textarea").value;
	reponses['redaction'] = redaction
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

/* cet funtion est appelle quan valide le formulaire */
function onSubmit(event) {
	event.preventDefault();
	const resultat = recupererReponsesFormulaire();

	const estValide = validerFormulaire();
	if (true) {
		// Envoyer une requete au serveur
		envoyerResultat(resultat);
	} else {
		// Recuperer la liste des questions qui manquent
		const questionsManquantes = Object.entries(resultat).filter(
			(question) => {
				const valeurQuestion = question[1];
				return valeurQuestion === null;
			},
		);
		// Je recupere pour chaque [label, valeur] de chaque question son label, puis a la 10e position le chiffre de la question
		const numerosQuestionsManquantes = questionsManquantes.map((question) =>
			question[0].substring(9),
		);
		alert(
			`Votre formulaire n'est pas valide, il manque les questions suivantes: ${numerosQuestionsManquantes.join(
				',',
			)}`,
		);
		// Rediriger l'utilisateur vers la premiere question qui manque
		goToCard(numerosQuestionsManquantes[0]);
	}
}

function envoyerResultat(resultat) {
	console.log(resultat);
	const _resultat = Object.values(resultat);
	delete _resultat.redaction;
	const reponses = _resultat

	const redaction = resultat.redaction;
	fetch('evaluation.php', {
		method: 'POST',
		headers: { 'Content-Type': 'application/json' },
		body: JSON.stringify({
			reponses,
			redaction
		}),
	}).then((response) => {
		// TODO: Rediriger vers page de succes
		console.log(response.text());
	});
}

function init() {
	initHTMLElements();
	initEventListeners();
}

function initHTMLElements() {
	const headerQuestionnaire = document.getElementById(
		'liste-bouton-raccourci',
	);

	// Crée autant de boutons que de nombre de questions
	const nombreDeQuestions = recupererNombreDeQuestions();
	for (
		let numeroQuestion = 1;
		numeroQuestion < nombreDeQuestions + 1;
		numeroQuestion++
	) {
		const elementBouton = document.createElement('button');
		elementBouton.innerHTML = numeroQuestion;
		elementBouton.className = 'raccourci-question';
		elementBouton.addEventListener('click', (e) =>
			goToCard(numeroQuestion),
		);

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
		boutonPrecedent.addEventListener('click', (e) =>
			validerQuestion(index + 1, index),
		);
		boutonSuivant.addEventListener('click', (e) =>
			validerQuestion(index + 1, index + 2),
		);
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
	const questionEstValidee =
		recupererReponse(`question_${numeroQuestion}`) !== null;
	mettreAJourBoutonRaccourci(numeroQuestion, questionEstValidee);

	if (questionEstValidee) {
		const reponses = recupererReponsesFormulaire();
		let nombreReponsesValides = 0;
		for (let reponse of Object.values(reponses)) {
			if (reponse !== null) {
				nombreReponsesValides++;
			}
		}
		const nombreDeQuestions = recupererNombreDeQuestions();
		const progressBar = document.getElementById('niveau-completude-test');
		progressBar.value = nombreReponsesValides * (100 / nombreDeQuestions);
	}

	goToCard(cardDestination);
}

function mettreAJourBoutonRaccourci(numeroQuestion, questionEstValidee) {
	const raccourciBouton = document
		.getElementById('liste-bouton-raccourci')
		.children.item(numeroQuestion - 1);
	if (questionEstValidee) {
		raccourciBouton.classList.add('question-repondu');
		raccourciBouton.classList.remove('question-non-repondu');
	} else {
		raccourciBouton.classList.add('question-non-repondu');
		raccourciBouton.classList.remove('question-repondu');
	}
}

function goToCard(numeroCard) {
	// Verifier si la question a été répondue
	const carrouselElement = document.getElementById('formulaire_test');
	carrouselElement.style.transform = `translateX(-${numeroCard}00vw)`;

	if (numeroCard === 0) {
		document.getElementById('header-questionnaire').classList.add('hidden');
	} else {
		document
			.getElementById('header-questionnaire')
			.classList.remove('hidden');
	}
}

function validerFormulaire() {
	///tous les questions son ok, mettre en rouge les pas valides
	const resultat = recupererReponsesFormulaire();
	return Object.values(resultat).every((valeur) => valeur !== null);
}

// Demarrage de l'app
init();
