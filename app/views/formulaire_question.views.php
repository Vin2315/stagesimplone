<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Question</title>
    <script src="js/formulaire_question.js" defer></script>
</head>

<style>
    label {
        font-weight: 600;
    }

    .container {
        padding: 20px;
        display: flex;
        gap: 10px;
        width: calc(100vw - 49px - 8px);
        justify-content: space-between;
        align-items: flex-start;
    }

    #formulaire_question {
        border: 1px solid black;
        padding: 10px;
    }

    label,
    input {
        display: block;
    }

    input,
    select {
        margin: 5px 0px 10px 0px;
    }

    .question-list {
        flex: 1;
    }

    .question {
        margin-bottom: 15px;
        padding: 5px;
        box-shadow: 0px 0px 1px 1px grey;
    }

    .controls {
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    .numero {
        background: #fcd58e;
        width: 20px;
        display: inline-block;
        height: 20px;
        text-align: center;
        border: 1px grey solid;
        border-radius: 50%;
    }

    #form-error {
        color: red;
        width: 30vw;
        margin: 10px 0;
    }
</style>

<body>
    <?php
    include '../dbconn.php';
    $sql_get_max_numero = 'SELECT MAX(numero) FROM question';
    $max_numero_statement = $conexion->query($sql_get_max_numero);
    $max_numero = $max_numero_statement->fetch()[0];
    ?>
    <h1 id="form_title">Creation d'une question</h1>
    <button id="reset_button" type="button">Go to creation</button>
    <div class="container">
        <form id="formulaire_question">
            <label for="numero">Numero:</label>
            <input min="1" required type="number" id="numero" name="numero" value="<?php echo $max_numero + 1; ?>">

            <label for="category">Categorie:</label>
            <select required name="category" id="category">
                <option selected value="">--Pas de category--</option>
                <option value="Comprehension Ecrite">Compréhension écrite</option>
                <option value="Communication">Communication</option>
                <option value="Grammaire">Grammaire</option>
                <option value="Lexique">Lexique</option>
            </select>

            <label for="question_link_type">Type de lien annexe de question:</label>
            <select name="question_link_type" id="question_link_type">
                <option selected value="">--Pas de lien--</option>
                <option value="audio">audio</option>
                <option value="video">video</option>
                <option value="img">image</option>

            </select>

            <label for="question_link">Lien annexe de question:</label>
            <input disabled required type="text" id="question_link" name="question_link" value="">


            <label for="question_label">Label de question:</label>
            <input type="text" required id="question_label" name="question_label">

            <label for="reponse_type">Type de reponse:</label>
            <select name="reponse_type" id="reponse_type">
                <option selected value="text">Texte</option>
                <option value="audio">Audio</option>
                <option value="video">Video</option>
                <option value="img">Image</option>

            </select>


            <label for="option_a">Option A:</label>
            <input required type="text" id="option_a" name="option_a">


            <label for="option_b">Option B:</label>
            <input required type="text" id="option_b" name="option_b">

            <label for="option_c">Option C:</label>
            <input required type="text" id="option_c" name="option_c">


            <label for="option_d">Option D:</label>
            <input required type="text" id="option_d" name="option_d">

            <label for="reponse">Reponse</label>
            <select required name="reponse" id="reponse">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>

            </select>
            <div id="form-error"></div>
            <button type="submit">Submit</button>
        </form>
        <?php
        require_once(VIEWS_PATH . "/liste_questions.views.php");
        ?>

    </div>

</body>

</html>