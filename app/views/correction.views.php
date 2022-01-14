<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="js/correction.js" defer=></script>
</head>

<body>

    <?php


    foreach ($evaluations as $index => $evaluation) {

    ?>
        <div data-id="<?php echo $evaluation['id']; ?>" class="evaluation" data-redaction="<?php echo $evaluation['redaction']; ?>">
            <span class="numero"><?php echo $index + 1; ?></span>
            <span><b>user_id: </b><?php echo $evaluation["user_id"]; ?></span>
            <span><b>reponses: </b> <?php echo $evaluation["reponses"]; ?></span>
            <span><b>redaction: </b> <?php echo $evaluation["redaction"]; ?></span>
            <span><b>pourcentage_reussite: </b> <?php echo $evaluation["pourcentage_reussite"]; ?></span>
            <span><b>note_redaction: </b> <?php echo $evaluation["note_redaction"]; ?></span>

        </div>
    <?php

    }
    ?>

    <div id="form_redaction" hidden>
        <H2 id="form_title"> </H2>
        <p id="redaction"></p>
        <form method="post"> <input type="number" min="0" max="10" name="note_redaction">
            <input type='hidden' name='evaluation_id' id="evaluation_id" />
            <button type="submit">Envoyer</button>
        </form>

    </div>



</body>

</html>