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

    try {

        $numero = $_POST['numero'];
        $category = $_POST['category'];
        $question_link_type = $_POST['question_link_type'];
        $question_link = $_POST['question_link'];
        $question_label = $_POST['question_label'];
        $reponse_type = $_POST['reponse_type'];
        $option_A = $_POST['option_A'];
        $option_B = $_POST['option_B'];
        $option_C = $_POST['option_C'];
        $option_D = $_POST['option_D'];
        $reponse = $_POST['reponse'];
        $statement = $conexion->prepare('insert into question (numero,category,question_link_type,question_link,question_label,reponse_type,option_A,option_B,option_C,option_D,reponse) values (:numero,:category,:question_link_type,:question_link,:question_label,:reponse_type,:option_A,:option_B,:option_C,:option_D,:reponse)');


        $reponse = $statement->execute(array(
            ":numero" => $numero,
            ":category" => $category,
            ":question_link_tupe" => $question_link_tupe,
            ":question_link" => $question_link,
            ":question_label" => $question_label,
            ":reponse_type" => $reponse_type,
            ":option_A" => $option_A,
            ":option_B" => $option_B,
            ":option_C" => $option_C,
            ":option_D" => $option_D,
            ":reponse" => $reponse
        ));

        $results = $statement->fetch();
        echo json_encode($results);
    } catch (PDOException $e) {
        echo "<br>" . $e->getMessage();
    }








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
