<?php
/*
L'ensemble des fonctions se trouvera dans ce fichier "userModel"
*/

//On appel le fichier pour se connecter a la base de données.
include("../model/dbconnect.php");

//Fonction insertion de données user
function insertUser($email,$username,$lastname,$firstname,$password){
    //Récupération de la BDD avec le variable globale
    global $bdd;
    //Initialisation des variables role et date_create
    $role = 0;
    $date_create = date('d-m-y');
    
    //On récupère la requête pour l'insertion des données personnelles du user.
    $querysql = "INSERT INTO users (email, username, lastname, firstname, password, role, date_create) VALUES (:email, :username, :lastname, :firstname, :password, :role, :date_create)";
    $stmtUser = $bdd->prepare($querysql);
    //Les Bindparams
    $stmtUser->bindParam(":email",$email);
    $stmtUser->bindParam(":username",$username);
    $stmtUser->bindParam(":lastname",$lastname);
    $stmtUser->bindParam(":firstname",$firstname);
    $stmtUser->bindParam(":password",$password);
    $stmtUser->bindParam(":role",$role);
    $stmtUser->BindParam(":date_create",$date_create);

    //Execution de la requête SQL et génération du message d'erreur s'il y en a une.
    try{
        $stmtUser->execute();
    }catch(PDOException $e){
        $message = "Une erreur s'est produite lors de l'insertion des données dans la BDD.";
    }
    //On retourne le message d'erreur si celui-ci a été généré.
    if(isset($message)){return $message;}

}

//Fonction connexion
function login($username,$password){
    //Récupération de la BDD
    global $bdd;
    //préparation de la requuête
    $sqlConnect = "SELECT * FROM users WHERE username= :username";
    $stmtUser = $bdd->prepare($sqlConnect);
    $stmtUser->bindParam(":username",$username);

    try{
        $stmtUser->execute();
    }catch(PDOException $e){
        $message = "Erreur lors de la connexion";
    }
    if(isset($message)){return $message;}

    //On récupère les données de la BDD dans un tableau
    $user = $stmtUser->fetch();

    if(password_verify($password,$user['password'])){
        $_SESSION['user'] = $user;
        //On met à jour la date de connection
        $sqldatelog = "UPDATE users Set date_log = NOW() WHERE :id = id";
        $stmtUser = $bdd->prepare($sqldatelog);
        $stmtUser->bindparam(":id",$_SESSION['user']['id']);

        try{
            $stmtUser->execute();
        }catch(PDOException $e){
            $message = "Erreur lors de la mise a jour de la date de connection";
        }
        if(isset($message)){return $message;}   
    }
}

//Fonction update qui permet de mettre à jour les données en base de données
function update($id,$email,$lastname,$firstname){
    //Récupération de la BDD
    global $bdd;
    //On prépare la requête qui permettra de modifier les informations de l'utilisateurs
    $querysqlupdate = "UPDATE users SET email= :email, lastname= :lastname, firstname= :firstname WHERE id = :id";
    //Préparation de la requête SQL
    $stmtUserUpdate = $bdd->prepare($querysqlupdate);
    //BindParams
    $stmtUserUpdate->bindParam(":email",$email);
    $stmtUserUpdate->bindParam(":lastname",$lastname);
    $stmtUserUpdate->bindParam(":firstname",$firstname);
    $stmtUserUpdate->bindParam(":id",$id);

    try{
        $stmtUserUpdate->execute();
    }catch(PDOException $e){
        $message = "Erreur lors de la modification des données";
    }
    //Retourne le message si celui-ci a été généré (erreur lors de la modification des données)
    if(isset($message)){return $message;}
    //Si la variable message n'existe pas, tout s'est bien déroulé

}

//La fonction suppression de compte utilisateur
function drop($id){
    //Récupération de la BDD
    global $bdd;
    //Suppression de l'utilisateur
    $querysql = "DELETE FROM users WHERE id= :idUser";
    $stmtUser = $bdd->prepare($querysql);
    $stmtUser->bindParam(":idUser",$id);
    $stmtUser->execute();

    return true;
}

//Fonction qui permet d'insérer un recette en BDD
function InsertRecipe($title, $cookingtools, $ingredients, $person, $recipe, $author, $idUser, $date_create){
    //Récupération de la BDD avec le variable globale
    global $bdd;
    //On récupère la requête pour l'insertion des données de la recette
    $querysql = "INSERT INTO recipes (title,cookingtools,ingredients,person,recipe,author,user_id,date_create) VALUES (:title, :cookingtools, :ingredients, :person, :recipe, :author, :user_id, :date_create)";
    $stmtUser = $bdd->prepare($querysql);
    //Les Bindparams
    $stmtUser->bindParam(":title",$title);
    $stmtUser->bindParam(":cookingtools",$cookingtools);
    $stmtUser->bindParam(":ingredients",$ingredients);
    $stmtUser->bindParam(":person",$person);
    $stmtUser->bindParam(":recipe",$recipe);
    $stmtUser->bindParam(":author",$author);
    $stmtUser->bindParam(":user_id",$idUser);
    $stmtUser->BindParam(":date_create",$date_create);

    //Execution de la requête SQL et génération du message d'erreur s'il y en a une.
    try{
        $stmtUser->execute();
    }catch(PDOException $e){
        $message = "Une erreur s'est produite lors de l'insertion des données de la recette dans la BDD.";
    }
    //On retourne le message d'erreur si celui-ci a été généré.
    if(isset($message)){return $message;}

}

//Fonction qui permet de modifier une recette pour l'admin
function Modifyrecipe($title, $cookingtools, $ingredients, $person, $recipe, $author){
    //Récupération de la BDD
    global $bdd;
    //On prépare la requête qui permettra de modifier les informations de l'utilisateurs
    $querysqlupdate = "UPDATE recipe SET title=:title, cookingtools=:cookingtools, ingredients=:ingredients, person=:person, recipe=:recipe, author=:author WHERE id = :id";
    //Préparation de la requête SQL
    $stmtUserUpdate = $bdd->prepare($querysqlupdate);
    $stmtUserUpdate->bindParam(":title",$title);
    $stmtUserUpdate->bindParam(":cookingtools",$cookingtools);
    $stmtUserUpdate->bindParam(":ingredients",$ingredients);
    $stmtUserUpdate->bindParam(":person",$person);
    $stmtUserUpdate->bindParam(":recipe",$recipe);
    $stmtUserUpdate->bindParam(":author",$author);

    try{
        $stmtUserUpdate->execute();
    }catch(PDOException $e){
        $message = "Erreur lors de la modification des données de la recette";
    }

    //Si la variable message n'existe pas, tout s'est bien déroulé
    if(!isset($message)){
        return true;
    }
    return false;
}

//Fonction suppression de recette
function Deleterecipe($recipeid){
    //Récupération de la BDD
    global $bdd;
    //Suppression de l'utilisateur
    $querysql = "DELETE FROM recipes WHERE id= :recipeid";
    $stmtUser = $bdd->prepare($querysql);
    $stmtUser->bindParam(":recipeid",$id);
    $stmtUser->execute();

    return true;
}

//Function qui gérera le calcul et la modification du mot de passe si le user a oublié son mot de passe
function pwdforget($username,$password){
    //Récupération de la BDD
    global $bdd;
    //On récupère la requête pour modifier le mot de passe ou le nom d'utilisateur est le même en BDD
    $querysql = "UPDATE users SET password = :password WHERE username = :username";
    $stmtUser = $bdd->prepare($querysql);
    $stmtUser->bindParam(":username",$username);
    $stmtUser->bindParam(":password",$password);

    try{
        $stmtUser->execute();
    }catch(PDOException $e){
        $message = "Erreur lors de la modification du mot de passe";
    }

    //Si la variable message n'existe pas, tout s'est bien déroulé
    if(!isset($message)){
        return true;
    }
    return false;
}
?>