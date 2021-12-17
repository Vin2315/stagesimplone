
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   // TODO: Enregistrer les resultats

   $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

   if ($contentType === "application/json") {
      //Receive the RAW post data.
      $content = trim(file_get_contents("php://input"));


      //variable contien tous res reponses de mon chaîne 
      $reponses = json_decode($content);

      //If json_decode failed, the JSON is invalid.
      //if (!is_array($reponses)) {
      try {
         $conexion = new PDO('mysql:host=localhost;dbname=etudiants', 'root', '');
      } catch (PDOException $e) {
         echo "Error:" . $e->getMessage();;
      }

      //variable que contiene tous le reponse
      $sql = "INSERT INTO evaluation (user_id, reponse_1, reponse_2, reponse_3, reponse_4, reponse_5, reponse_6, reponse_7, reponse_8, reponse_9, reponse_10, reponse_11, reponse_12, reponse_13, reponse_14, reponse_15) 
        VALUES (:user_id, :reponse_1, :reponse_2, :reponse_3, :reponse_4, :reponse_5, :reponse_6, :reponse_7, :reponse_8, :reponse_9, :reponse_10, :reponse_11, :reponse_12, :reponse_13, :reponse_14, :reponse_15)";

      $statement = $conexion->prepare($sql);
      $statement->execute(array(
         ':user_id' => 84,
         ':reponse_1' => $reponses->question_1,
         ':reponse_2' => $reponses->question_2,
         ':reponse_3' => $reponses->question_3,
         ':reponse_4' => $reponses->question_4,
         ':reponse_5' => $reponses->question_5,
         ':reponse_6' => $reponses->question_6,
         ':reponse_7' => $reponses->question_7,
         ':reponse_8' => $reponses->question_8,
         ':reponse_9' => $reponses->question_9,
         ':reponse_10' => $reponses->question_10,
         ':reponse_11' => $reponses->question_11,
         ':reponse_12' => $reponses->question_12,
         ':reponse_13' => $reponses->question_13,
         ':reponse_14' => $reponses->question_14,
         ':reponse_15' => ""
      ));

      $results = $statement->fetch();
      echo $results;
      // } else {
      //    echo 'pas posible du decoder le message';
      //    exit();

      //    // Send error back to user.
      // }
   }


   // Mettre en place une table 'evaluations' qui va contenir une colonne pour chaque reponse
   // et aussi la foreign key/reference de l'utilisateur qui a passe le test
   // TODO: corriger les reponses

   // TODO: renvoyer les corrections


   exit();
}
