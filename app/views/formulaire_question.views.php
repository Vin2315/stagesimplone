<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Question</title>
    <script src="js/formulaire_question.js" defer></script>
</head>

<body>

    <h1 id="form_title">Creation d'une question</h1>
    <button id="reset_button" type="button">Go to creation</button>
    <form id="formulaire_question">

        <label for="numero">Numero:</label><br>
        <input type="number" id="numero" name="numero"><br><br>


        <label for="category">CATEGORY:</label><br><br>
        <select name="category" id="category">
            <option selected value="">--Pas de category--</option>
            <option value="compréhension écrite">Compréhension écrite</option>
            <option value="communication">Communication</option>
            <option value="gramer">Gramer</option>
            <option value="lexique">Lexique</option>
        </select><br><br>

        <label for="question_link_type">QUESTION_LINK_TYPE:</label><br><br>
        <select name="question_link_type" id="question_link_type">
            <option selected value="">--Pas de lien--</option>
            <option value="audio">audio</option>
            <option value="video">video</option>
            <option value="img">image</option>

        </select><br><br>

        <label for="question_link">QUESTION_LINK:</label><br>
        <input type="text" id="question_link" name="question_link"><br><br><br>


        <label for="question_label">QUESTION_LABEL:</label><br>
        <input type="text" id="question_label" name="question_label"><br><br><br>

        <label for="reponse_type">REPONSE_TYPE:</label><br><br>
        <select name="reponse_type" id="reponse_type">
            <option selected value="text">text</option>
            <option value="audio">audio</option>
            <option value="video">video</option>
            <option value="img">image</option>

        </select><br><br>


        <label for="option_a">Option_A:</label><br>
        <input type="text" id="option_a" name="option_a"><br><br>


        <label for="option_b">option_b:</label><br>
        <input type="text" id="option_b" name="option_b"><br><br>

        <label for="option_c">option_c:</label><br>
        <input type="text" id="option_c" name="option_c"><br><br>


        <label for="option_d">option_d:</label><br>
        <input type="text" id="option_d" name="option_d"><br><br><br>

        <label for="reponse">REPONSE</label><br><br>
        <select name="reponse" id="reponse">
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>

        </select><br><br>

        <input type="submit" value="Submit">
    </form>

</body>

</html>