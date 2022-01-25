<?php session_start();
require_once("../config.php");

// si la requete est une requete POST, ET si le body de la requete contient une valeur pour la cle "logout"

// on execute ce code si le fichier home.php est appele avec une requete POST 
// ET que le body de cette requete contient une valeur associee a la cle "logout"
if (isset($_POST['logout'])) {
    # Logout le user
    $_SESSION['utilisateur'] = NULL;
    # Detruire la session en cours
    session_destroy();
}

require_once(VIEWS_PATH . "/home.views.php");
