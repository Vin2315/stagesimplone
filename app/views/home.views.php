<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Francais por Tous</title>
    <link rel="shortcut icon" type="img/favicon.ico" href="./assets/img/logo8.ico" />
    <link rel="stylesheet" href="css/global.css" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lora:wght@400;700&display=swap');
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;700&display=swap" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
</head>

<body>
    <header>

        <nav>
            <div class="imagen">
                <img src="assets/video/video1.mp4" alt="">
            </div>

            <img src="./assets/img/Logo10.png" id="logo" alt="" />

            <div class="debut-header">
                <a href="#">ACCUEIL</a>
                <a href="certifier.php">CERTIFICATIONS</a>
                <a href="votre_niveau.php">COURS</a>
                <a href="#">CONTACT</a>
                <?php
                if (isset($_SESSION['utilisateur'])) {
                ?>
                    <form method="post">
                        <input type="submit" name="logout" class="btn-logout" value="Logout" />
                    </form>
                <?php
                }
                ?>
            </div>

            <div class="menu" id="nav-hamburger">
                <i class="fas fa-bars"></i>
            </div>

        </nav>
        <div class="container">
            <h1 class="titre">Test de français gratuit</h1>
            <section class="container-header">
                <section class="text-header">
                    <p>

                        Ce test vous permet de connaître votre niveau en <em>français</em>
                        </em> <br>
                        <em>Il dure 35 minutes</em> il est divisé par niveau allant de
                        <strong>débutant (A1) à avancé (C1) </strong>, En fin de test nous
                        vous informerons gratuitement de votre niveau et si vous êtes prêt
                        pour une certification.
                        <br><br>

                    </p>

                    <a href="evaluation.php" class="btn" title="commence votre test">Commencer ==></a>

                </section>
                <img id='hero-img' src=" ./assets/img/français.jpg" alt="" data-aos="zoom-out-up" />
            </section>
        </div>
    </header>

    <section class="about-us">
        <!-- para poner un fondo a mi pantalla -->

        <div class="container1">
            <h2 class="titre">Visitez nos options d'apprentissage</h2>
            <div class="container-article">
                <!-- CUADRADITOS-->
                <div class="article" data-aos="zoom-in-down">
                    <i class="fas fa-graduation-cap"></i>
                    <h3>Certifier son niveau</h3>
                    <p>
                        Nous proposons des vidéos explicatives des différentes sortes d’examens ainsi que des
                        entraînements personnalisés

                    </p>
                    <a href="#">En savoir plus ---></a>
                </div>
                <div class="article" data-aos="zoom-in-down">
                    <i class="fas fa-signal"></i>
                    <h3>Votre Niveau</h3>
                    <p>
                        En quelques minutes, et en un clic, nous nous engageons à vous donner une correction rapide et
                        individualisée!

                    </p>
                    <a href="#"> En savoir plus ---></a>
                </div>
                <div class="article" data-aos="zoom-in-down">
                    <i class="fas fa-user-edit"></i>
                    <h3>Se Former</h3>
                    <p>
                        Nous proposons différentes formules :

                        cours en petits groupes en ligne

                        cours personnalisés en ligne

                        packs d’exercices interactifs pour préparer au TCF
                    </p>
                    <a href="#"> En savoir plus---></a>
                </div>

                <div class="article" data-aos="zoom-in-down">
                    <i class="fas fa-microphone"></i>

                    <h3>Améliorer son oral</h3>
                    <p>
                        Vous voulez améliorer seulement votre oral ? Vous voulez travailler votre prononciation, votre
                        phonétique ?
                        Nous vous proposons différentes offres !
                    </p>
                    <a href="#"> En savoir plus---></a>
                </div>
            </div>
        </div>
    </section>

    <section class="questions container">
        <section class="text-questions">
            <h1>Testez vos Connaissances en français</h1>
            <p>
                Votre examen dure 45 nminuts bonne chance, Nous confirmons
                que l'évaluation écrite est facultative
            </p>
            <a href="formulaire.html" class="btn" titlre="inscrivez vous "">Inscrivez-vous...... </a>
	
		</section>
		<img src=" ./assets/img/segundaIlustracion.svg" width="50%" height="50%" alt="" data-aos="zoom-in-down" />
            <!--<img src="assets/img/imga (52).jpg" width="100%" height="100%"  alt="" />-->
        </section>

        <footer>
            <div class="partFooter">
                <img src="./assets/img/Logo6.png" alt="" />
            </div>
            <div class="partFooter">
                <h4>Informations</h4>
                <a href="#">La méthode à utilice</a>
                <a href="#">Intégrée</a>
                <a href="#">Actualités</a>
            </div>
            <div class="partFooter">
                <h4>A propos</h4>
                <a href="#">Qui sommes-nous</a>
                <a href="#">Notre équipe</a>
                <a href="#">Nous avis clients</a>
            </div>
            <div class="partFooter">
                <h4>Contacte-nous.....</h4>

                <div class="social-media">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-youtube"></i>
                    <i class="fab fa-whatsapp"></i>
                </div>
            </div>
        </footer>


        <script src="https://kit.fontawesome.com/c15b744a04.js" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src="js/menu.js"></script>

</body>

</html>