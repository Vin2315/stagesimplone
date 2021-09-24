<?php

try {
    //conecion bd
    $bd = new PDO('mysql:host=localhost;dbname=test_langue', "root", "");

    //on verifie que lo formuler et envoye 
    if(isset($_POST["submit"])) {

    //on stock le valor que  à tape le utilizateur  
    $prenom=$_POST["prenom"]; 
    $nom=$_POST["nom"]; 
    $tel=$_POST["tel"]; 
    $mail=$_POST["mail"]; 
    $message=$_POST["message"]; 
     //on va ecrir dan la BD 

    
    $data = [
        'nom' => $nom,
        'prenom' => $prenom,
        'telephone' => $tel,
        'email' => $mail,
        'message' => $message
    ];
    $sql = "INSERT INTO etudiant (nom, prenom, telephone, email, message) VALUES (:nom, :prenom, :telephone, :email, :message)";
    $stmt= $bd->prepare($sql);
    $stmt->execute($data);

    // pour dirigue à une page principal 
      header('Location: menu.html');
   
} 

} catch (\Throwable $th) {
    throw $th;
}
