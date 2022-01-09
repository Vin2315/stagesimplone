let question_id_a_updater = null;
const title = document.getElementById('form_title');
const form = document.getElementById('formulaire_question');
const resetButton = document.getElementById('reset_button');
const formError = document.getElementById('form-error');

resetButton.addEventListener('click', demarrerCreation);
form.addEventListener('submit', onFormSubmit);

function onFormSubmit(e) {
    e.preventDefault();
    formError.innerText = '';

    const data = Object.fromEntries([...form.elements].filter(e => e.name).map(e => [e.name, e.value]));
    if (question_id_a_updater) {
        data.id = question_id_a_updater;
    }
    fetch(`formulaire_question.php`, {
        method: question_id_a_updater === null ? 'POST' : 'PUT',
        body: new URLSearchParams(data)
        // headers: { 'Content-Type': 'application/json' },,
    }).then((response) => {
        if (response.status !== 200) {
            console.log('Looks like there was a problem. Status Code: ' +
                response.status);
            response.text().then(function (err) {
                // L'approche est directe, mais on devrait cacher les details de certaines erreurs a l'utilisateur
                formError.innerText = err;

            });
            return;
        }

        // C'est un raccourci, il faudrait a la fin renvoyer la nouvelle liste de questions et editer le DOM via du JS
        location.reload();
    });
}

function demarrerUpdate(id) {
    question_id_a_updater = id;
    title.innerText = `Edition de la question ${id}`;
    const question = document.getElementById(`question-${id}`)
    for (const [key, val] of Object.entries(question.dataset)) {
        //http://javascript-coder.com/javascript-form/javascript-form-value.phtml
        const input = form.elements[key];
        if (input) {
            input.value = val;
        }
    }
}

function demarrerCreation() {
    if (question_id_a_updater !== null) {
        question_id_a_updater = null;
        title.innerText = "Creation d'une question";
        form.reset();
    }
}

function supprimerQuestion(id) {
    fetch(`formulaire_question.php?id=${id}`, {
        method: 'DELETE',
    }).then((response) => {
        console.log(response.text());
        const question = document.getElementById(`question-${id}`);
        question?.remove();
        // C'est un raccourci, il faudrait a la fin renvoyer la nouvelle liste de questions et editer le DOM via du JS
        location.reload();
    }).catch(err => {
        console.error(`Error:    ${err}`)
    });
}

const listQuestions = document.getElementsByClassName('question');

for (let index = 0; index < listQuestions.length; index++) {
    const question = listQuestions[index];
    const id = question.dataset.id;
    const boutonEdition = question.getElementsByClassName('button-edition')[0];
    const boutonSuppression = question.getElementsByClassName('button-suppression')[0];
    boutonEdition.addEventListener('click', () => demarrerUpdate(id));
    boutonSuppression.addEventListener('click', () => supprimerQuestion(id));

}


document.getElementById('numero').addEventListener('input', e => {
    const nb = Number(e.target.value);
    if (isNaN(nb) || nb <= 0) {
        e.target.value = 1;
    }
})

document.getElementById('question_link_type').addEventListener('change', e => {
    document.getElementById('question_link').disabled = e.target.value === '';
})