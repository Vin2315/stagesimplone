<?php session_start();
require_once("../config.php");

if (!isset($_SESSION['utilisateur'])) {
    header('Location: login.php');
}
$utilisateur_connecte = $_SESSION['utilisateur'];

include '../dbconn.php';

$statement = $conexion->prepare('SELECT * FROM evaluation WHERE user_id = (SELECT id from user where utilisateur = :utilisateur)');
$statement->execute(array(
    ':utilisateur' => $utilisateur_connecte
));
$evaluation = $statement->fetch();
$status = $evaluation["pourcentage_reussite"] >= 80 ? 'REUSSI' : 'RATE';

if ($evaluation != false) {
    require_once(VIEWS_PATH . "/evaluation_result.views.php");
} else {
    header('Location: evaluation.php');
}
