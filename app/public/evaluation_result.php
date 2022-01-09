<?php session_start();
require_once("../config.php");

if (!isset($_SESSION['utilisateur'])) {
    header('Location: login.php');
}

require_once(VIEWS_PATH . "/evaluation_result.views.php");
