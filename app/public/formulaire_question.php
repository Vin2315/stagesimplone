<?php session_start();
// Comprobamos si ya tiene una sesion
# Si ya tiene sesion redirigimos al contenido, para que no pueda acceder al formulario
if (!isset($_SESSION['utilisateur'])) {
    header('Location: login.php');
}

$error = '';
// Nos conectamos a la base de datos
include '../dbconn.php';

// Comprobamos si ya han sido enviado los datos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // $utilisateur = filter_var(strtolower($_POST['utilisateur']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // //ENTREGA valores de la BD no los tengo 
    // $statement = $conexion->prepare('SELECT * FROM user WHERE utilisateur = :utilisateur');
    // $statement->execute(array(
    //     ':utilisateur' => $utilisateur
    // ));

    // $results = $statement->fetch();

    // if ($results !== false) {
    //     $encryptedPassword = $results["pass"]; //mot de passe en bd
    //     $verify = hash('sha512', $_POST['password']);
    //     $verifPassword = password_verify($verify, $encryptedPassword);

    //     if ($verifPassword) {
    //         $_SESSION['utilisateur'] = $utilisateur;
    //         header('Location: evaluation.php');
    //         exit();
    //         //echo "Informations incorrectes"; 
    //         // echo "Datos correctos"; 
    //     } else {
    //         $error .= '<li>Informations incorrectes</li>';
    //     }
    // }
}

require_once(VIEWS_PATH . "/formulaire_question.views.php");
