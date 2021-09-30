const formulario = document.getElementById('formulaire'); //conexion a html
const inputs = document.querySelectorAll('#formulaire input'); //entrar a todos los inputs

const expresiones = {
	usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	password: /^.{4,12}$/, // 4 a 12 digitos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telefono: /^\d{7,14}$/, // 7 a 14 numeros.
};

var formulaire = document.getElementById('champ-formulaire');
Nom = formulaire.nom;
prenom = formulaire.prenom;
telephone = formulaire.tel;
email = formulaire.mail;
rédaction = formulaire.message;

function validerNom(e) {
	if (nom.value == '' || nom.value == null) {
		error.style.display = 'block';
		error.innerHTML += '<li> Complete votre Nom</li>';
		console.log('Merci pour complete votre Nom');

		e.preventDefault();
	} else {
		error.style.display = 'none';
	}
}

function validerPrenom(e) {
	if (prenom.value == '' || prenom.value == null) {
		error.style.display = 'block';
		error.innerHTML += '<li> Complete votre Prenom</li>';
		console.log('Merci pour complete votre Prenom');

		e.preventDefault();
	} else {
		error.style.display = 'none';
	}
}

function validerTel(e) {
	if (tel.value == '' || tel.value == null) {
		error.style.display = 'block';
		error.innerHTML += '<li> Complete votre numéro de téléphone </li>';
		console.log('Merci pour complete votre numéro de téléphone');

		e.preventDefault();
	} else {
		error.style.display = 'none';
	}
}

function validerEmail(e) {
	if (mail.value == '' || mail.value == null) {
		error.style.display = 'block';
		error.innerHTML += '<li>Merci pour complete votre email </li>';
		console.log('Merci pour complete votre email');

		e.preventDefault();
	} else {
		error.style.display = 'none';
	}
}

function validarRédaction(e) {
	if (message.value == '' || message.value == null) {
		error.style.display = 'block';
		error.innerHTML += '<li>Merci pour complete votre email </li>';
		console.log('Redacte votre text la totalite de 50');

		e.preventDefault();
	} else {
		error.style.display = 'none';
	}
}

formulaire.addEventListener('submit', validerfuntion);

//}
