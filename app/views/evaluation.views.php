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
        <section class="question-card card-carrousel" id="question_1">
            <h2> A.- Compréhension écrite</h2>
            <h3> 1.- Sélectionnez l’infirmier..</h3>

            <div id="question-1" class="img-answer-block">
                <div class="img-answer">
                    <input type="radio" name="question1" value="A" id="q1-r1">
                    <label for="q1-r1"><img src="assets/img/imga1.jpg" alt="" /></label>
                </div>

                <div class="img-answer">
                    <input type="radio" name="question1" value="B" id="q1-r2">
                    <label for="q1-r2"><img src="assets/img/imga (1).jpg" alt="" /></label>
                </div>

                <div class="img-answer">
                    <input type="radio" name="question1" value="C" id="q1-r3">
                    <label for="q1-r3"><img src="assets/img/imga (2).jpeg" alt="" /></label>
                </div>

                <div class="img-answer">
                    <input type="radio" name="question1" value="D" id="q1-r4">
                    <label for="q1-r4 "><img src="assets/img/imga (4).jpg" alt="" /></label>
                </div>
            </div>
            <div class="button-groupe">
                <button type="button" class="button bouton-precedent">Precedent</button>
                <button type="button" class="button bouton-suivant">Suivant</button>
            </div>

        </section>

        <section class="question-card card-carrousel" id="question_2">
            <h2> Compréhension écrite</h2>
            <div class="question2__img">
            </div>
            <div class="item__body">


                <h3>
                    2.- De quelle couleur est cette image ?
                </h3>
                <input type="radio" name="question2" value="A" id="q2-r1">
                <label for="q2-r1">Jaune</label>
                <input type="radio" name="question2" value="B" id="q2-r2">
                <label for="q2-r2">Verte</label>
                <input type="radio" name="question2" value="C" id="q2-r3">
                <label for="q2-r3">Rouge</label>
                <input type="radio" name="question2" value="D " id="q2-r4">
                <label for="q2-r4">Bleue </label>
            </div>
            <div class="button-groupe">
                <button type="button" class="button bouton-precedent">Precedent</button>
                <button type="button" class="button bouton-suivant">Suivant</button>
            </div>
        </section>

        <section class="question-card card-carrousel" id="question_3">

            <h2>B.- Communication</h2>
            <h3>3.- Sélectionnez l’image correspondante à l'audio.</h3>

            <div class="item__body">
                <audio controls>
                    <source src="assets/audio/audio2.mp3" controls>
                </audio>
            </div>

            <div class="img-answer-block">

                <div class="img-answer">
                    <input type="radio" name="question3" value="A" id="q3-r1">
                    <label for="q3-r1"><img src="assets/img/imga (59).jpg" alt="" /></label><br>
                </div>


                <div class="img-answer">
                    <input type="radio" name="question3" value="B" id="q3-r2">
                    <label for="q3-r2"><img src="assets/img/imga (60).jpg" alt="" /></label><br>
                </div>

                <div class="img-answer">
                    <input type="radio" name="question3" value="C" id="q3-r3">
                    <label for="q3-r3"><img src="assets/img/imga (61).jpg" alt="" /></label><br>
                </div>


                <div class="img-answer">
                    <input type="radio" name="question3" value="D" id="q3-r4">
                    <label for="q3-r4 "><img src="assets/img/imga (62).jpg" alt="" /></label><br>
                </div>
            </div>
            <div class="button-groupe">
                <button type="button" class="button bouton-precedent">Precedent</button>
                <button type="button" class="button bouton-suivant">Suivant</button>
            </div>
        </section>

        <section class="question-card card-carrousel" id="question_4">
            <h2>Communication</h2>
            <h3>4.- Sélectionnez l’image correspondante à l'audio.</h3>

            <div class="item__body">
                <audio controls>
                    <source src="assets/audio/audio1.mp3" controls>
                </audio>
            </div>

            <div class="img-answer-block">

                <div class="img-answer">
                    <input type="radio" name="question4" value="A" id="q4-r1">
                    <label for="q4-r1"><img src="assets/img/img6.jpg" alt="" /></label><br>
                </div>

                <div class="img-answer">
                    <input type="radio" name="question4" value="B" id="q4-r2">
                    <label for="q4-r2"><img src="assets/img/imga (40).jpg" alt="" /></label><br>
                </div>

                <div class="img-answer">
                    <input type="radio" name="question4" value="C" id="q4-r3">
                    <label for="q4-r3"><img src="assets/img/imga (20).jpg" alt="" /></label><br>
                </div>

                <div class="img-answer">
                    <input type="radio" name="question4" value="D" id="q4-r4">
                    <label for="q4-r4 "><img src="assets/img/imga (11).jpg" alt="" /></label><br>
                </div>
            </div>
            <div class="button-groupe">
                <button type="button" class="button bouton-precedent">Precedent</button>
                <button type="button" class="button bouton-suivant">Suivant</button>
            </div>
        </section>

        <section class="texte-a-trou question-card card-carrousel" id="question_5">
            <h2> C.- Grammaire</h2>
            <h4>5.- Marie habite en France, …………… Paris</h4>

            <div class="answer-block">
                <input type="radio" name="question5" value="A" id="q5-r1">
                <label for="q5-r1">au</label>
                <input type="radio" name="question5" value="B" id="q5-r2">
                <label for="q5-r2"> en </label>
                <input type="radio" name="question5" value="C" id="q5-r3">
                <label for="q5-r3">à la </label>
                <input type="radio" name="question5" value="D" id="q5-r4">
                <label for="q5-r4">à </label>
            </div>
            <div class="button-groupe">
                <button type="button" class="button bouton-precedent">Precedent</button>
                <button type="button" class="button bouton-suivant">Suivant</button>
            </div>
        </section>

        <section class="texte-a-trou question-card card-carrousel" id="question_6">
            <h2>Grammaire</h2>

            <h4>6.- Amina ...................... le fromage avec du pain.</h4>

            <div class="answer-block">
                <input type="radio" name="question6" value="A" id="q6-r1">
                <label for="q6-r1">au</label>
                <input type="radio" name="question6" value="B" id="q6-r2">
                <label for="q6-r2"> sommes </label>
                <input type="radio" name="question6" value="C" id="q6-r3">
                <label for="q6-r3">à la </label>
                <input type="radio" name="question6" value="D" id="q6-r4">
                <label for="q6-r4">à </label>
            </div>
            <div class="button-groupe">
                <button type="button" class="button bouton-precedent">Precedent</button>
                <button type="button" class="button bouton-suivant">Suivant</button>
            </div>
        </section>

        <section class="texte-a-trou question-card card-carrousel" id="question_7">
            <h2>Grammaire</h2>

            <h4>7.- Carla et Nicolas ...................... mariés.</h4>

            <div class="answer-block">
                <input type="radio" name="question7" value="A" id="q7-r1">
                <label for="q7-r1">aimes</label>
                <input type="radio" name="question7" value="B" id="q7-r2 ">
                <label for=q7-r2"> aiment</label>
                <input type="radio" name="question7" value="C" id="q7-r3">
                <label for="q7-r3 ">aime </label>
                <input type="radio" name="question7" value="D" id="q7-r4">
                <label for="q7-r4">aimons</label>
            </div>
            <div class="button-groupe">
                <button type="button" class="button bouton-precedent">Precedent</button>
                <button type="button" class="button bouton-suivant">Suivant</button>
            </div>
        </section>

        <section class="texte-a-trou question-card card-carrousel" id="question_8">
            <h2>Grammaire</h2>

            <h4>8.- Sophie va acheter un pull …………… .</h4>

            <div class="answer-block">
                <input type="radio" name="question8" value="A" id="q8-r1">
                <label for="q8-r1">aimes</label>
                <input type="radio" name="question8" value="B" id="q8-r2 ">
                <label for="q8-r2"> au magasin</label>
                <input type="radio" name="question8" value="C" id="q8-r3">
                <label for="q8-r3 ">à l'hôtel de ville </label>
                <input type="radio" name="question8" value="D" id="q8-r4">
                <label for="q8-r4">à la boulangerie</label>
            </div>
            <div class="button-groupe">
                <button type="button" class="button bouton-precedent">Precedent</button>
                <button type="button" class="button bouton-suivant">Suivant</button>
            </div>
        </section>

        <section class="texte-a-trou question-card card-carrousel" id="question_9">
            <h2>Grammaire</h2>

            <h4>9.- Sélectionnez la phrase correcte.</h4>

            <div class="answer-block">
                <input type="radio" id="q9-r1" name="question9" value="A">
                <label for="q9-r1">L'appartement ne pas est
                    dans le centre_ville.</label><br>
                <input type="radio" id="q9-r2" name="question9" value="B">
                <label for="q9-r2">L'appartement n'est pas dans
                    le centre_ville.</label><br>
                <input type="radio" id="q9-r3" name="question9" value="C">
                <label for="q9-r3">L'appartement pas n'est dans
                    le centre_ville.</label><br>
                <input type="radio" id="q9-r4" name="question9" value="D">
                <label for="q9-r4">L'appartement est ne pas
                    dans le centre_ville.</label>
            </div>
            <div class="button-groupe">
                <button type="button" class="button bouton-precedent">Precedent</button>
                <button type="button" class="button bouton-suivant">Suivant</button>
            </div>
        </section>

        <section class="texte-a-trou question-card card-carrousel" id="question_10">
            <h2>Grammaire</h2>

            <h4>10.- Les chaises sont ……………</h4>
            <img src="assets/img/imga (54).jpg" alt="" />
            <div class="answer-block">
                <input type="radio" id="q10-r1" name="question10" value="A">
                <label for="q10-r1">vert</label><br>
                <input type="radio" id="q10-r2" name="question10" value="B">
                <label for="q10-r2">verts</label><br>
                <input type="radio" id="q10-r3" name="question10" value="C">
                <label for="q10-r3">verte</label><br>
                <input type="radio" id="q10-r4" name="question10" value="D">
                <label for="q10-r4">vertes</label>
            </div>
            <div class="button-groupe">
                <button type="button" class="button bouton-precedent">Precedent</button>
                <button type="button" class="button bouton-suivant">Suivant</button>
            </div>
        </section>


        <section class="question-card card-carrousel" id="question_11">
            <h2>D.- Lexique</h2>

            <h3>11.- Je mange du poulet tous les mercredis..</h3>

            <div class="img-answer-block">

                <div class="img-answer">
                    <input type="radio" name="question11" value="A" id="q11-r1">
                    <label for="q11-r1"><img src="assets/img/imga (64).jpg" alt="" /></label><br>
                </div>

                <div class="img-answer">
                    <input type="radio" name="question11" value="B" id="q11-r2">
                    <label for="q11-r2"><img src="assets/img/imga (65).jpg" alt="" /></label><br>
                </div>

                <div class="img-answer">
                    <input type="radio" name="question11" value="C" id="q11-r3">
                    <label for="q11-r3"><img src="assets/img/imga (66).jpg" alt="" /></label><br>
                </div>

                <div class="img-answer">
                    <input type="radio" name="question11" value="D" id="q11-r4">
                    <label for="q11-r4"><img src="assets/img/imga (67).jpg" alt="" /></label><br>
                </div>
            </div>
            <div class="button-groupe">
                <button type="button" class="button bouton-precedent">Precedent</button>
                <button type="button" class="button bouton-suivant">Suivant</button>
            </div>
        </section>

        <section class="question-card card-carrousel" id="question_12">
            <h2>Lexique</h2>
            <img src="assets/img/imga (9).png" alt="" />
            <div class="item__body">

                <h3>12.- Sélectionnez le mot correct. </h3>
                <input type="radio" name="question12" value="A" id="q12-r1">
                <label for="q12-r1">Traversez</label>
                <input type="radio" name="question12" value="B" id="q12-r2">
                <label for="q12-r2">Tournez à droite</label>
                <input type="radio" name="question12" value="C" id="q12-r3">
                <label for="q12-r3">Tournez à gauche</label>
                <input type="radio" name="question12" value="D" id="q12-r4">
                <label for="q12-r4">Allez tout droit</label>

            </div>
            <div class="button-groupe">
                <button type="button" class="button bouton-precedent">Precedent</button>
                <button type="button" class="button bouton-suivant">Suivant</button>
            </div>
        </section>

        <section class="texte-a-trou question-card card-carrousel" id="question_13">

            <h2>Lexique</h2>
            <h4>13.- Tous les matins, Sakura et Maurice .............. à 7h30.</h4>

            <div class="answer-block">
                <input type="radio" name="question13" value="A" id="q13-r1">
                <label for="q13-r1">se lever</label>
                <input type="radio" name="question13" value="B" id="q13-r2 ">
                <label for="q13-r2"> se lèver</label>
                <input type="radio" name="question13" value="C" id="q13-r3">
                <label for="q13-r3 ">nous levons </label>
                <input type="radio" name="question13" value="D" id="q13-r4">
                <label for="q13-r4">me lève</label>
                <div class="button-groupe">
                    <button type="button" class="button bouton-precedent">Precedent</button>
                    <button type="button" class="button bouton-suivant">Suivant</button>
                </div>
            </div>
        </section>

        <section class="texte-a-trou question-card card-carrousel" id="question_14">
            <h2>Lexique</h2>
            <h4>14.- Sélectionnez la phrase correcte.</h4>

            <div class="answer-block">
                <input type="radio" name="question14" value="A" id="q14-r1">
                <label for="q14-r1">Hier, les enfants ont allé à la piscie.</label>
                <input type="radio" name="question14" value="B" id="q14-r2 ">
                <label for=q14-r2"> Hier, les enfants a allé à a piscine.</label>
                <input type="radio" name="question14" value="C" id="q14-r3">
                <label for="q14-r3 ">Hier, les enfants sont allé à la piscine </label>
                <input type="radio" name="question14" value="D" id="q14-r4">
                <label for="q14-r4">Hier, les enfants est allé à la piscine</label>
            </div>
            <div class="button-groupe">
                <button type="button" class="button bouton-precedent">Precedent</button>
                <button type="button" class="button bouton-suivant">Suivant</button>
            </div>
        </section>

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