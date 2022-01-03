<?php session_start();
// Comprobamos tenga sesion, si no entonces redirigimos y MATO LA EJECUCION DE LA PAGINA
if (isset($_SESSION['utilisateur'])) {
    header('Location: home.php');
} else {
    // Enviamos al usuario al formulario de registro
    header('Location: login.php');
}
