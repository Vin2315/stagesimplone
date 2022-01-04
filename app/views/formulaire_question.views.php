<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Gestion des questions </h1>

    <form action="formulaire_question.php" method="post">

        <label for="numero">Numero:</label><br>
        <input type="number" id="numero" name="numero"><br><br>


        <label for="category">CATEGORY:</label><br>
        <input type="text" id="category" name="text"><br><br>


        <label for="question_link_type">QUESTION_LINK_TYPE:</label><br><br>
        <select name="question_link_type" id="question_link_type">
            <option selected value="">--Pas de lien--</option>
            <option value="audio">audio</option>
            <option value="video">video</option>
            <option value="img">image</option>

        </select><br><br>

        <label for="question_link">QUESTION_LINK:</label><br>
        <input type="url" id="question_link" name="question_link"><br><br><br>


        <label for="question_label">QUESTION_LABEL:</label><br>
        <input type="text" id="question_label" name="question_label"><br><br><br>

        <label for="reponse_type">REPONSE_TYPE:</label><br><br>
        <select name="reponse_type" id="reponse_type">
            <option selected value="text">text</option>
            <option value="audio">audio</option>
            <option value="video">video</option>
            <option value="img">image</option>

        </select><br><br>


        <label for="option_A">Option_A:</label><br>
        <input type="text" id="option_A" name="option_A"><br><br>


        <label for="option_B">option_B:</label><br>
        <input type="text" id="option_B" name="option_B"><br><br>

        <label for="option_C">option_C:</label><br>
        <input type="text" id="option_C" name="option_C"><br><br>


        <label for="option_D">option_D:</label><br>
        <input type="text" id="option_D" name="option_D"><br><br><br>

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