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
    $numero = $_POST['numero'];
    $category = $_POST['category'];
    $question_link_type = $_POST['question_link_type'];
    $question_link = $_POST['question_link'];
    $question_label = $_POST['question_label'];
    $reponse_type = $_POST['reponse_type'];
    $option_a = $_POST['option_a'];
    $option_b = $_POST['option_b'];
    $option_c = $_POST['option_c'];
    $option_d = $_POST['option_d'];
    $reponse = $_POST['reponse'];

    try {

        $statement = $conexion->prepare('insert into question (numero,category,question_link_type,question_link,question_label,reponse_type,option_a,option_b,option_c,option_d,reponse) values (:numero,:category,:question_link_type,:question_link,:question_label,:reponse_type,:option_a,:option_b,:option_c,:option_d,:reponse)');


        $reponse = $statement->execute(array(
            ":numero" => $numero,
            ":category" => $category,
            ":question_link_type" => $question_link_type,
            ":question_link" => $question_link,
            ":question_label" => $question_label,
            ":reponse_type" => $reponse_type,
            ":option_a" => $option_a,
            ":option_b" => $option_b,
            ":option_c" => $option_c,
            ":option_d" => $option_d,
            ":reponse" => $reponse
        ));

        $results = $statement->fetch();
    } catch (PDOException $e) {
        http_response_code(400);
        echo $e->getMessage();
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    parse_str(file_get_contents('php://input'), $_PUT);
    $id = $_PUT['id'];
    $numero = $_PUT['numero'];
    $category = $_PUT['category'];
    $question_link_type = $_PUT['question_link_type'];
    $question_link = $_PUT['question_link'];
    $question_label = $_PUT['question_label'];
    $reponse_type = $_PUT['reponse_type'];
    $option_a = $_PUT['option_a'];
    $option_b = $_PUT['option_b'];
    $option_c = $_PUT['option_c'];
    $option_d = $_PUT['option_d'];
    $reponse = $_PUT['reponse'];

    try {

        $statement = $conexion->prepare('update question set numero= :numero, category= :category, question_link_type= :question_link_type, question_link= :question_link, question_label= :question_label, reponse_type= :reponse_type, option_a= :option_a, option_b= :option_b, option_c= :option_c, option_d= :option_d, reponse=:reponse where id = :id');
        $reponse = $statement->execute(array(
            ":id" => $id,
            ":numero" => $numero,
            ":category" => $category,
            ":question_link_type" => $question_link_type,
            ":question_link" => $question_link,
            ":question_label" => $question_label,
            ":reponse_type" => $reponse_type,
            ":option_a" => $option_a,
            ":option_b" => $option_b,
            ":option_c" => $option_c,
            ":option_d" => $option_d,
            ":reponse" => $reponse
        ));

        $results = $statement->fetch();
    } catch (PDOException $e) {
        http_response_code(400);
        echo $e->getMessage();
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $query_params = array();
    parse_str($_SERVER['QUERY_STRING'], $query_params);
    $id = filter_var($query_params["id"], FILTER_SANITIZE_NUMBER_INT);

    try {
        $statement = $conexion->prepare('DELETE FROM question WHERE id = :id');
        $reponse = $statement->execute(array(
            ":id" => $id,
        ));

        $results = $statement->fetch();
        session_commit();
    } catch (PDOException $e) {
        http_response_code(400);

        echo $e->getMessage();
        exit();
    }
}
require_once(VIEWS_PATH . "/formulaire_question.views.php");
