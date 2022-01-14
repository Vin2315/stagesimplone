let evaluation_id_a_updater = null;
const title = document.getElementById('form_title');
const formulaire = document.getElementById('form_redaction');
const evaluations = document.getElementsByClassName('evaluation');
const redaction = document.getElementById('redaction');
const evaluation_id = document.getElementById('evaluation_id');

for (const evaluation of evaluations) {
	evaluation.addEventListener('click', (e) =>
		onevaluationclick(evaluation.dataset.id, evaluation.dataset.redaction),
	);
}

function onevaluationclick(id, text) {
	evaluation_id_a_updater = id;
	title.innerText = 'corection de la evaluation ' + id;
	formulaire.hidden = false;
	redaction.innerText = text;
	evaluation_id.value = id;
}
