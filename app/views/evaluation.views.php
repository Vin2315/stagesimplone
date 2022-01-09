<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=2.0" />
    <title>Test de classement en français</title>
    <link rel="shortcut icon" type="img/favicon.ico" href="./assets/img/logo9.ico">
    <link rel="stylesheet" type="text/css" media="screen" href="css/global.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/evaluation.css" />
    <script src="js/evaluation.js" defer></script>

</head>

<body>
    <section id="header-questionnaire" class="hidden">
        <div id="liste-bouton-raccourci">
            <?php
            for ($index = 1; $index <= sizeof($questions) + 1; $index++) {
            ?>
                <button class="raccourci-question" onclick="goToCard(<?php echo $index; ?>)">
                    <?php echo $index; ?>
                </button>
            <?php
            }
            ?>
        </div>
        <progress id="niveau-completude-test" max="100" value="0"></progress>
    </section>

    <form id="formulaire_test" class="carrousel">
        <section id="presentation-card" class="card-carrousel">
            <h1>Test niveau A1</h1>
            <h3 class="hero-subtitle">Bienvenue à Votre site de connaissances.</h3>
            <img src="assets/img/img0.png" alt="maison" id="hero-img" />
            <p>Lisez calmement les énoncés de votre exercice</p>
            <p class="hero-objective"><b>Objectif:</b> Vous devez avoir un taux de reussite de 80% ou plus</p>

            <div id="page-control">
                <a href="home.php" title="Menu" class="return-link">RETOUR</a>
                <a href="#" id="button-commence-test" class="btn start-button">COMMENCER LE TEST </a>
            </div>

        </section>

        <?php
        for ($q = 1; $q <= sizeof($questions); $q++) {
            $question = $questions[$q - 1];
        ?>
            <section class="question-card card-carrousel" id="question_<?php echo $q; ?>" data-numero="<?php echo $question["numero"]; ?>">

                <div class="question">
                    <h2><?php echo $question["category"]; ?></h2>
                    <h3><?php echo $question["question_label"]; ?></h3>

                    <?php
                    switch ($question["question_link_type"]) {
                        case "img":
                    ?>
                            <img src=<?php echo $question["question_link"]; ?> alt="Image Question" />
                        <?php
                            break;
                        case "audio":
                        ?>
                            <audio controls>
                                <source src=<?php echo $question["question_link"]; ?> controls>
                            </audio>
                        <?php
                            break;
                        case "video":
                        ?>
                            <video controls autoplay>
                                <source src=<?php echo $question["question_link"]; ?> type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                    <?php
                            break;
                    }
                    ?>
                </div>

                <div id="question-<?php echo $question["numero"]; ?>" class="answer-block">
                    <?php
                    foreach (array('a', 'b', 'c', 'd') as $letter) {
                    ?>
                        <div class="answer">
                            <input type="radio" name="question<?php echo $question["numero"]; ?>" value="<?php echo $letter; ?>" id="q<?php echo $question["numero"]; ?>-r<?php echo $letter; ?>">
                            <label for="q<?php echo $question["numero"]; ?>-r<?php echo $letter; ?>">
                                <?php
                                switch ($question["reponse_type"]) {
                                    case "text":
                                ?>
                                        <span><?php echo $question["option_" . $letter]; ?></span>
                                    <?php
                                        break;
                                    case "img":
                                    ?>
                                        <img src=<?php echo $question["option_" . $letter]; ?> alt="Image Option <?php echo $letter; ?>" />
                                    <?php
                                        break;
                                    case "audio":
                                    ?>
                                        <audio controls>
                                            <source src=<?php echo $question["option_" . $letter]; ?> controls>
                                        </audio>
                                    <?php
                                        break;
                                    case "video":
                                    ?>
                                        <video controls>
                                            <source src=<?php echo $question["option_" . $letter]; ?> type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                <?php
                                        break;
                                }
                                ?>
                            </label>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="bouton-groupe">
                    <button type="button" class="button bouton-precedent">Precedent</button>
                    <button type="button" class="button bouton-suivant">Suivant</button>
                </div>

            </section>
        <?php
        }
        ?>

        <section class="question-card card-carrousel" id="question_15">

            <h2>E.- Production écrite (optionnel)</h2>

            <p>Un(e) ami(e) arrive aujourd’hui à 14h à la gare. Vous lui envoyez un mail pour lui indiquer
                l’itinéraire de l’hôtel. Utilisez la carte. Vous lui proposez un rendez-vous le soir. Précisez :
            </p>
            <ul>
                <li>l’heure </li>
                <li>le lieu </li>
                <li>une ou plusieurs activités</li>
            </ul>
            <img src="assets/img/nice.png" class="redaction-img" />

            <textarea id="test-redaction-textarea" name="redaction" rows="10" placeholder="Votre message (de 45 à 60 mots)"></textarea>
            <div>
                <button id="evaluation-submit-button" class="button" type="submit"> Envoyer </button>
            </div>

        </section>

    </form>

</body>

</html>