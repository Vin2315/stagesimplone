<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results</title>
    <style>
        body {
            display: flex;
            flex-flow: column;
            align-items: center;
        }

        h1 {
            display: flex;
            justify-content: center;
            font-size: 300%;
        }

        .status {
            border: 2px solid black;
            border-radius: 5px;
            padding: 5px;
        }

        .status.REUSSI {
            background-color: #70e370;
        }

        .status.RATE {
            background-color: #ff6161;
        }

        .resultat {
            display: flex;
            flex-flow: column;
            align-items: flex-start;
            gap: 5px;
            width: 50vw;
            margin: 10px;
        }

        .numero {
            display: inline-block;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 1px solid black;
            background-color: #b1b1eb;
            text-align: center;
        }

        .return-link {
            text-decoration: none;
            color: #847de7;
            margin: 10px;
        }
    </style>
</head>

<body>
    <h1>Resultats</h1>
    <a href="home.php" title="Menu" class="return-link">Retour a la page principale</a>
    <h2>Pourcentage de reussite - <?php echo $evaluation["pourcentage_reussite"] ?> %</h2>
    <h2 class="status <?php echo $status ?>">Status - <?php echo $status ?></h2>

    <?php
    include '../dbconn.php';
    $sql_select_questions = 'SELECT * FROM question ORDER BY numero';
    $questions = $conexion->query($sql_select_questions);
    $reponses = explode("/", $evaluation["reponses"]);
    foreach ($questions as $index => $question) {
        $reponse = $reponses[$index];
    ?>
        <div class="resultat">
            <span class="numero"><?php echo $index + 1; ?></span>
            <span><b>Question: </b><?php echo $question["question_label"]; ?></span>
            <span><b>Votre reponse: </b> <?php echo $reponse; ?></span>
            <span><b>La reponse attendue: </b><?php echo $question["reponse"]; ?></span>
        </div>
    <?php
    }
    ?>
    <?php
    if ($evaluation["redaction"]) {
    ?>
        <div>
            <h3>Votre redaction</h3>
            <p>
                <?php echo $evaluation["redaction"]; ?>
            </p>

            <h3>Note:</h3>
            <span><?php echo isset($evaluation["note_redaction"]) ? $evaluation["note_redaction"] : 'EN ATTENTE DU CORRECTEUR'; ?></span>
        </div>
    <?php
    }
    ?>

</body>

</html>