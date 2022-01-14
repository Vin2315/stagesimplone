<?php session_start();
require_once("../config.php");
if (!isset($_SESSION['utilisateur'])) {
    header('Location: login.php');
}
include '../dbconn.php';


$evaluations = $conexion->query('SELECT * FROM evaluation WHERE  redaction is not NULL  and note_redaction  is NULL');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $evaluation_id = $_POST['evaluation_id'];
    $note_redaction = $_POST['note_redaction'];

    $statement = $conexion->prepare('UPDATE evaluation SET note_redaction=:note_redaction WHERE id=:id');
    $statement->execute(array(
        ':id' => $evaluation_id,
        ':note_redaction' => $note_redaction,

    ));

    $results = $statement->fetch();
}

require_once(VIEWS_PATH . "/correction.views.php");
