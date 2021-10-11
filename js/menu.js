
// Nav barra por  se deplace//
let emplacementPrincipal = window.pageYOffset; //0

//funtion pour mi nav-bar/
window.addEventListener('scroll', function () {
	let deplacementActuel = window.pageYOffset; //180
	if (emplacementPrincipal >= deplacementActuel) {
		//200 > 180
		document.getElementsByTagName('nav')[0].style.top = '0px';
	} else {
		document.getElementsByTagName('nav')[0].style.top = '-100px';
	}
	emplacementPrincipal = deplacementActuel; //200
});


//para animaciones scroll AOS //
AOS.init();


function init() {
	
	const hamburger = document.getElementById('nav-hamburger');
	hamburger.addEventListener('click', hamburgerClick);
}

function hamburgerClick() {
	const nav= document.querySelector('.debut-header');
	nav.classList.toggle('visible');
}

init(); 