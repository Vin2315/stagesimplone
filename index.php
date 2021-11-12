<?php session_start();

// Comprobamos tenga sesion, si no entonces redirigimos y MATO LA EJECUCION DE LA PAGINA
if (isset($_SESSION['utilisateur'])) {

    header('Location: contenu.php');
    //header('Location: contenu.php'); 

} else {
    // Enviamos al usuario al formulario de registro
    header('Location: index.php');
    // header('Location: index.html'); 
}
