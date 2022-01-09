<?php session_start();
require_once("../config.php");

if (!isset($_SESSION['utilisateur'])) {
   header('Location: login.php');
}
$utilisateur_connecte = $_SESSION['utilisateur'];

include '../dbconn.php';


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
   $sql_select_questions = 'SELECT * FROM question ORDER BY numero';
   $select_questions_statement = $conexion->query($sql_select_questions);
   $questions = $select_questions_statement->fetchAll();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $statement = $conexion->prepare('SELECT * FROM user WHERE utilisateur = :utilisateur');
   $statement->execute(array(
      ':utilisateur' => $utilisateur_connecte
   ));
   $utilisateur_connecte_de_la_db = $statement->fetch();
   if ($utilisateur_connecte_de_la_db != false) {

      $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

      if ($contentType === "application/json") {
         //Receive the RAW post data.
         $content = trim(file_get_contents("php://input"));


         //variable contien tous res reponses de mon chaîne 
         $evaluation = json_decode($content);

         // TODO: Il faudrait recuperer la version actuelle du questionaire et ajouter une foreign key aux reponses
         try {
            $statement = $conexion->prepare('INSERT INTO evaluation (user_id, reponses, redaction) VALUES (:user_id,:reponses,:redaction)');
            $reponse = $statement->execute(array(
               ':user_id' => $utilisateur_connecte_de_la_db["id"],
               ':reponses' => join('/', $evaluation->reponses ?? []),
               ':redaction' => $evaluation->redaction ?? ""
            ));

            $results = $statement->fetch();
            echo json_encode($results);
         } catch (PDOException $e) {
            echo "<br>" . $e->getMessage();
         }

         // } else {
         //    echo 'pas posible du decoder le message';
         //    exit();

         //    // Send error back to user.
         // }
      }
   }


   // TODO: corriger les reponses

   // TODO: renvoyer les corrections


   exit();
}

require_once(VIEWS_PATH . "/evaluation.views.php");
