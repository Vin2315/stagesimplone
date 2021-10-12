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
	const formulaire = document.getElementById('formulaire_test'); //accede al formulario

	const input = document.getElementById('q1-r1');
	const error = document.getElementsByTagName('input');

	formulaire.addEventListener('submit', onSubmit);

	const button = document.getElementById('button-commence-test');
	button.addEventListener('click', (e) => goToCard(1));
}

function goToCard(numeroCard) {
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
