let question_id_a_updater = null;
const title = document.getElementById('form_title');
const form = document.getElementById('formulaire_question');
const resetButton = document.getElementById('reset_button');

resetButton.addEventListener('click', demarrerCreation);
form.addEventListener('submit', onFormSubmit);

function onFormSubmit(e) {
    e.preventDefault();
    const formData = new FormData(form);
    console.log(formData)
    if (question_id_a_updater) {
        formData.set('id', question_id_a_updater);
    }
    const data = new URLSearchParams(formData);

    fetch(`formulaire_question.php`, {
        method: question_id_a_updater === null ? 'POST' : 'PUT',
        body: data
        // headers: { 'Content-Type': 'application/json' },,
    }).then((response) => {
        console.log(response.text());
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