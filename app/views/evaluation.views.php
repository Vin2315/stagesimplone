<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=2.0" />
    <title>Test de classement en français</title>
    <link rel="shortcut icon" type="img/favicon.ico" href="./assets/img/logo9.ico">
    <link rel="stylesheet" type="text/css" media="screen" href="css/global.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/formindex.css" />
    <script src="js/evaluation.js" defer></script>

</head>

<body>
    <section id="header-questionnaire" class="hidden">
        <div id="liste-bouton-raccourci"></div>
        <progress id="niveau-completude-test" max="100" value="0"></progress>
    </section>

    <form id="formulaire_test" class="carrousel">
        <section id="presentation-card" class="card-carrousel">
            <h1>Test niveau A1</h1>
            <h3>Bienvenue à Votre site de connaissances.</h3>
            <img src="assets/img/img0.png" alt="maison" id="main-img" />

            <div id="button">
                <div class="radio-button">
                    <input type="radio" class=language name="language" value="Français" id="french">
                    <label for="french">Français</label>

                    <input type="radio" class=language name="language" value="English" id="english">
                    <label for="english">English</label>
                </div>

            </div>

            <p>Lisez calmement les énoncés de votre exercice</p>

            <div id="page-control">
                <a href="menu.html" title="Menu" class="retourne">RETOURNER AU MENU</a>
                <a href="#" id="button-commence-test" class="btn">COMMENCER LE TEST </a>
            </div>

        </section>

        <?php
        foreach ($questions as $question) {
        ?>
            <section class="question-card card-carrousel" id="question_<?php echo $question["numero"]; ?>">
                <h2><?php echo $question["category"]; ?></h2>
                <h3><?php echo $question["question_label"]; ?></h3>

                <div>
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
                            <video width="320" height="240" controls>
                                <source src=<?php echo $question["question_link"]; ?> type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                    <?php
                            break;
                    }
                    ?>
                </div>

                <div id="question-<?php echo $question["numero"]; ?>" class="img-answer-block">
                    <?php
                    foreach (array('A', 'B', 'C', 'D') as $letter) {
                    ?>
                        <div class="img-answer">
                            <input type="radio" name="question<?php echo $question["numero"]; ?>" value="<?php echo $letter; ?>" id="q<?php echo $question["numero"]; ?>-r<?php echo $letter; ?>">
                            <label for="q<?php echo $question["numero"]; ?>-r<?php echo $letter; ?>">
                                <?php
                                switch ($question["reponse_type"]) {
                                    case "text":
                                        echo $question["option_" . $letter];
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
                                        <video width="320" height="240" controls>
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
                <div class="button-groupe">
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
            <img src="assets/img/nice.png" class="img-moyenne" />

            <textarea id="test-redaction-textarea" name="message" rows="10" placeholder="Votre message (de 45 à 60 mots)">
			</textarea>
            <div>
                <button class="button" type="submit"> Envoyer </button>
            </div>

        </section>

    </form>

</body>

</html>