
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   // TODO: Enregistrer les resultats

   $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

   if ($contentType === "application/json") {
      //Receive the RAW post data.
      $content = trim(file_get_contents("php://input"));
      //variable contien tous res reponses de mon chaîne 
      $reponses = json_decode($content, true);

      echo json_encode($reponses);

      //If json_decode failed, the JSON is invalid.
      if (!is_array($reponses)) {
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
            ':reponse_1' => $reponses->reponse_1,
            ':reponse_2' => $reponses->reponse_2,
            ':reponse_3' => $reponses->reponse_3,
            ':reponse_4' => $reponses->reponse_4,
            ':reponse_5' => $reponses->reponse_5,
            ':reponse_6' => $reponses->reponse_6,
            ':reponse_7' => $reponses->reponse_7,
            ':reponse_8' => $reponses->reponse_8,
            ':reponse_9' => $reponses->reponse_9,
            ':reponse_10' => $reponses->reponse_10,
            ':reponse_11' => $reponses->reponse_11,
            ':reponse_12' => $reponses->reponse_12,
            ':reponse_13' => $reponses->reponse_13,
            ':reponse_14' => $reponses->reponse_14,
            ':reponse_15' => $reponses->reponse_15,
         ));

         $results = $statement->fetch();
      } else {
         // Send error back to user.
      }
   }


   // Mettre en place une table 'evaluations' qui va contenir une colonne pour chaque reponse
   // et aussi la foreign key/reference de l'utilisateur qui a passe le test
   // TODO: corriger les reponses

   // TODO: renvoyer les corrections


   exit();
}
