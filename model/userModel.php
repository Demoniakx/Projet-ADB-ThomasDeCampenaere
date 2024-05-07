<?php
/*
L'ensemble des fonctions se trouvera dans ce fichier "userModel"
*/

//On appel le fichier pour se connecter a la base de données.
include($_SERVER['DOCUMENT_ROOT']."/ADB/Projet Blog culinaire/model/dbconnect.php");

//Focntion insertion de données

function insertData($email,$username,$lastname,$firstname,$pwd){
    //Récupération de la BDD avec le variable globale
    global $bdd;
    $role = 0;
    
    //On récupère la requête pour l'insertion des données personnelles du user.
    $querysql = "INSERT INTO users (email,username,lastname,firstname,pwd,date_create";
    $stmtUser = $bdd->prepare($querysql);
    //Les Bindparams
    $stmtUser->bindParam(":email",$email);
    $stmtUser->bindParam(":username",$username);
    $stmtUser->bindParam(":lastname",$lastname);
    $stmtUser->bindParam(":firstname",$firstname);
    $stmtUser->bindParam(":pwd",$pwd);
    $stmtUser->BindParam(":date_create,",$date_create);

    //Execution de la requête SQL et génération du message d'erreur s'il y en a une.
    try{
        $stmtUser->execute();
    }catch(PDOException $e){
        $message = "Une erreur s'est produite lors de l'insertion des données dans la BDD.";
    }
    //On retourne le message d'erreur si celui-ci a été généré.
    if(isset($message)){return $message;}

}



//Fonction qui permet de  se déconnecter et supprimer les données de la session.
function logout(){
    session_destroy();
}
?>