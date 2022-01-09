<?php session_start();
require_once("../config.php");

if (isset($_POST['logout'])) {
    # Logout le user
    $_SESSION['utilisateur'] = NULL;
    # Detruire la session en cours
    session_destroy();
}
require_once(VIEWS_PATH . "/home.views.php");
