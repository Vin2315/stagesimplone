<?php session_start();
include '../dbconn.php';

// Comprobamos si ya tiene una sesion
# Si ya tiene una sesion redirigimos al contenido, para que no pueda volver a registrar un usuario.
//

if (isset($_SESSION['utilisateur'])) {
    header('Location: home.html');
}

// Comprobamos si ya han sido enviado los datos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validamos que los datos hayan sido rellenados agregamos en minuscul BD con strtolower y con filter_var limpia lo herores Y LA PROTECION DE CODIGO con FILTER_SANITIZE_STRING 
    $utilisateur = filter_var(strtolower($_POST['utilisateur']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var(strtolower($_POST['mail']), FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];
    $hashedPassword = hash('sha512', $_POST['password']);
    $passwordEncrypted = password_hash($hashedPassword, PASSWORD_DEFAULT);
    $password2 = $_POST['password2'];

    //echo "$utilisateur , $password , $password2"; 

    // // Tambien podemos limpiar mediante las funciones
    // 	# El problema es que si lo hacemos de esta forma no estamos eliminando caracteres especiales, solo los transformamos.

    // 	// La funcion htmlspecialchars() convierte caracteres especiales en entidades HTML, (&, "", '', <, >)
    // 	$usuario = htmlspecialchars($_POST['usuario']);
    // 	// La funcion trim() elimina espacio en blanco al inicio y final de la cadena de texo
    // 	$usuario = trim($usuario);
    // 	// stripslashes() quita las barras de un string con comillas escapadas, los \ los convierte en \'
    // 	$usuario = stripslashes($usuario);

    $error = '';

    // Comprobamos que ninguno de los campos este vacio.
    if (empty($utilisateur) or empty($password) or empty($password2)) {
        $error .= '<li>Veuillez remplir toutes les données correctement</li>';
    } else {

        // Comprobamos que el usuario no exista ya.
        try {
            // Nos conectamos a la base de datos
            include '../dbconn.php';
            $statement = $conexion->prepare('SELECT * FROM user WHERE email = :email LIMIT 1');
            $statement->execute(array(':email' => $email));
            //fetch nos va a devolver el resultado o false en caso de que no haya resultado.
            $result = $statement->fetch();

            // // // Si resultado es diferente a false entonces significa que ya existe el usuario.
            if ($result != false) {
                $error .= '<li> Le Utilisateur existe déjà</li>';
            } else {
                //inscription del utilisateur


                //$passwordEncrypted = password_hash($password, PASSWORD_DEFAULT); 
                $statement = $conexion->prepare('INSERT INTO user (utilisateur ,email, pass) VALUES ( :utilisateur, :email, :pass )');
                $statement->execute(array(':utilisateur' => $utilisateur, ':email' => $email, ':pass' => $passwordEncrypted));
            }
        } catch (PDOException $e) {

            echo "Error:" . $e->getMessage();
        }

        //echo "$utilisateur , $email, $password , $password2"; 
        if ($password != $password2) {
            $error .= "<li>Votre mot de passe n'est pas correct</li>";
        }
    }

    // Comprobamos si hay errores, sino entonces agregamos el usuario y redirigimos.
}

require_once(VIEWS_PATH . "/register.views.php");
