<?php session_start();
require_once("../config.php");
require_once(VIEWS_PATH . "/home.views.php");



if (isset($_POST['logout'])) {
    # Logout le user
    # Detruire la session en cours
    // $_SESSION['utilisateur'] = NULL;
    session_destroy();
}
