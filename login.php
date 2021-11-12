<?php session_start();

// Comprobamos si ya tiene una sesion
# Si ya tiene sesion redirigimos al contenido, para que no pueda acceder al formulario
if (isset($_SESSION['utilisateur'])) {
    header('Location: contenu.php');
    //'Location: contenu.php'
}

$error = '';
// Comprobamos si ya han sido enviado los datos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $utilisateur = filter_var(strtolower($_POST['utilisateur']), FILTER_SANITIZE_STRING);

    // Nos conectamos a la base de datos
    try {
        $conexion = new PDO('mysql:host=localhost;dbname=etudiants', 'root', '');
    } catch (PDOException $e) {
        echo "Error:" . $e->getMessage();;
    }
    //ENTREGA valores de la BD no los tengo 
    $statement = $conexion->prepare('
    SELECT * FROM user WHERE utilisateur = :utilisateur');
    $statement->execute(array(
        ':utilisateur' => $utilisateur
    ));

    $results = $statement->fetch();

    // var_dump($results);

    if ($results !== false) {
        $encryptedPassword = $results["pass"]; //mot de passe en bd
        $verify = hash('sha512', $_POST['password']);
        $verifPassword = password_verify($verify, $encryptedPassword);

        if ($verifPassword) {
            $_SESSION['utilisateur'] = $utilisateur;
            echo "test";
            //header('Location: index.php');

            //echo "Informations incorrectes"; 
            // echo "Datos correctos"; 
        } else {
            $error .= '<li>Informations incorrectes</li>';
        }
    }
}

require 'views/login.views.php';
