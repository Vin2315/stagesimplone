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

/**
 * Retourne toutes les reponses de chaque question sous forme d'objet
 */
function recupererReponsesFormulaire() {
	const reponses = {};
	for (let index = 1; index < recupererNombreDeQuestions(); index++) {
		reponses['question_' + index] = recupererReponse('question_' + index);
	}
	// Recupere la 15e question qui est la redaction
	const redaction = document.getElementById("test-redaction-textarea").value;
	reponses['redaction'] = redaction
	return reponses;
}

/**
 * cette funtion est appelee quand le formulaire est soumis
 */
function onSubmit(event) {
	event.preventDefault();
	const resultat = recupererReponsesFormulaire();

	const questionsManquantes = Object.entries(resultat).filter(([key, value]) => key !== 'redaction' && !Boolean(value));
	if (questionsManquantes.length === 0) {
		// Envoyer une requete au serveur
		envoyerResultat(resultat);
		document.getElementById('evaluation-submit-button').disabled = true;

	} else {
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
	const submitButton = document.getElementById('evaluation-submit-button')

	const { redaction, ...reponses } = resultat;
	submitButton.disabled = true;
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
		window.location = "evaluation_result.php"
	}).catch(err => {
		submitButton.disabled = false;
		alert(`Quelquechose s'est mal passe: ${err}`);
	});
}

function init() {
	initHTMLElements();
	initEventListeners();
}

/**
 * Cette fonction initialise les elements HTML a creer dynamiquement
 */
function initHTMLElements() {
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
	// Si la question est validée, la progress bar avance
	const questionEstValidee =
		recupererReponse(`question_${numeroQuestion}`) !== null;
	mettreAJourBoutonRaccourci(numeroQuestion, questionEstValidee);

	if (questionEstValidee) {
		mettreAJourBarreDeProgression();
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

function mettreAJourBarreDeProgression() {
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

// Demarrage de l'app
init();
