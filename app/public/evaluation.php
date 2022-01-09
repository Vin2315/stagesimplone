<?php session_start();
require_once("../config.php");

if (!isset($_SESSION['utilisateur'])) {
   header('Location: login.php');
}
$utilisateur_connecte = $_SESSION['utilisateur'];

include '../dbconn.php';

$statement = $conexion->prepare('SELECT * FROM user WHERE utilisateur = :utilisateur');
$statement->execute(array(
   ':utilisateur' => $utilisateur_connecte
));
$utilisateur_connecte_de_la_db = $statement->fetch();

$evaluation_existe_statement = $conexion->prepare('SELECT id FROM evaluation WHERE user_id = :user_id');
$evaluation_existe_statement->execute(array(
   ':user_id' => $utilisateur_connecte_de_la_db["id"]
));
$evaluation_existe = $evaluation_existe_statement->fetch();
if ($evaluation_existe) {
   header('Location: evaluation_result.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
   $sql_select_questions = 'SELECT * FROM question ORDER BY numero';
   $select_questions_statement = $conexion->query($sql_select_questions);
   $questions = $select_questions_statement->fetchAll();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   if ($utilisateur_connecte_de_la_db != false) {

      $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

      if ($contentType === "application/json") {
         //Receive the RAW post data.
         $content = trim(file_get_contents("php://input"));


         //variable contien tous res reponses de mon chaîne 
         $evaluation = json_decode($content);
         $reponses = $evaluation->reponses;
         $json_reponses = json_decode(json_encode($reponses), true);
         // Calcul du pourcentage de reussite
         // Recupere la liste des questions
         $sql_select_questions = 'SELECT * FROM question ORDER BY numero';
         $select_questions_statement = $conexion->query($sql_select_questions);
         $questions = $select_questions_statement->fetchAll();
         $nb_questions_valides = 0;
         for ($index = 0; $index < sizeof($questions); $index++) {
            $question = $questions[$index];
            if ($question["reponse"] === $json_reponses["question_" . $index + 1]) {
               $nb_questions_valides += 1;
            }
         }
         $pourcentage_reussite = round($nb_questions_valides * 100 / sizeof($questions));

         $statement = $conexion->prepare('SELECT * FROM user WHERE utilisateur = :utilisateur');
         $statement->execute(array(
            ':utilisateur' => $utilisateur_connecte
         ));
         $utilisateur_connecte_de_la_db = $statement->fetch();

         // TODO: Il faudrait recuperer la version actuelle du questionaire et ajouter une foreign key aux reponses
         try {
            $statement = $conexion->prepare('INSERT INTO evaluation (user_id, reponses, redaction, pourcentage_reussite) VALUES (:user_id,:reponses,:redaction, :pourcentage_reussite)');
            $reponse = $statement->execute(array(
               ':user_id' => $utilisateur_connecte_de_la_db["id"],
               ':reponses' => join('/', $json_reponses ?? []),
               ':redaction' => $evaluation->redaction ?? "",
               ':pourcentage_reussite' => $pourcentage_reussite
            ));

            $results = $statement->fetch();
            echo json_encode($results);
         } catch (PDOException $e) {
            echo "<br>" . $e->getMessage();
         }
      }
   }


   exit();
}

require_once(VIEWS_PATH . "/evaluation.views.php");
