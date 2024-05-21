<?php
    session_start();
    require('../model/userModel.php');

//si le bouton inscription a été envoyé.
if(isset($_POST['bInscription'])){
    $email = htmlspecialchars(trim($_POST['email']));
    $username = htmlspecialchars(trim($_POST['username']));
    $lastname = htmlspecialchars(trim($_POST['lastname']));
    $firstname = htmlspecialchars(trim($_POST['firstname']));
    $password = htmlspecialchars(trim($_POST['pwd']));
    $confirmedpassword = htmlspecialchars(trim($_POST['pwdconfirmed']));
    $regexemail = "/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,4}$/";

    //si les données récupérées ne sont pas vides
    if (isset($email) && isset($username) && isset($lastname) && isset($firstname) && isset($password) && isset($confirmedpassword))   {    

        //si les mots de passes correspondent
        if($password === $confirmedpassword){
            if(strlen($password) < 8){
                $error["8"] = "Le mot de passe doit contenir au moins 8 caractères.";
                header("Location: ../vue/pinscription.php?message=" . $error["8"]);
                exit;
            }
            
            //si le mot de passe de passe n'est pas vide lors de l'inscription et que l'adresse mail a un format valide
            if(!preg_match($regexemail, $email)){
                //Si l'adresse mail n'est pas valide
                $error["mail"] = "L'adresse email '$email' n'est pas valide.";
                //On transmet le message par l'url avec la redirection
                header("Location: ../vue/pinscription.php?message=" . $error["mail"]);
                exit;
            }
            $password = password_hash($password, PASSWORD_DEFAULT);
            // On transmet à la fonction "insertUser" les données à introduire en base de données, si l'inscription a rencontré un problème, on envoi un message a l'utilisateur
            $message = insertUser($email, $username, $lastname, $firstname, $password);
            if (isset($message)){
                //On transmet le message par l'url avec la redirection
                header("Location: ../vue/pinscription.php?message=" . $message);
                exit;
            }
            //On redirige l'utilisateur vers la page de connexion et transmet à l'utilisateur la réussite de l'inscription
            header("Location: ../vue/pconnexion.php?success");
            exit;
        }else{
            //Si les mots de passes ne correspondent pas
            $error["password"] = "Les mots de passes ne correspondent pas.";
            //On transmet le message par l'url avec la redirection
            header("Location: ../vue/pinscription.php?message=" . $error['password']);
            exit;
        }
    }else{
        //Si les champs ne sont pas remplis
        $error["empty"] = "Veuillez remplir tous les champs.";
        header("Location: ../vue/pinscription.php?message=" . $error['empty']);
    }
}
//Si le bouton modifier a été envoyé
elseif(isset($_POST['bModifyuser'])){
    $id = $_SESSION['user']['ID'];
    $password = $_SESSION['user']['password'];
    $username = $_SESSION['user']['username'];
    $email = htmlspecialchars(trim($_POST['mail']));
    $lastname = htmlspecialchars(trim($_POST['lastname']));
    $firstname = htmlspecialchars(trim($_POST['firstname']));
    if(isset($email) && isset($lastname) && isset($firstname)){
        if (update($id, $email, $lastname, $firstname)){
            // On détruit l'ancienne session
            session_destroy();
            // On démarre une session 
            session_start();
            // On récupère les données de l'utilisateur grâce a la fonction login (qui permet de créer une session avec les données utilisateur)
            login($username, $password);
            // On redirige vers l'accueil avec un message de réussite
            header("Location: ../vue/pmodificationdonneesuser.php?success");
            exit;
        } else {
            //On redirige vers l'inscription avec un message d'erreur
            header("Location: ../vue/pmodificationdonneesuser.php?error");
            exit;
        }
    }

} else if (isset($_POST['bConnexion'])) {
    //On récupère le login et le mdp
    $username = htmlspecialchars(trim($_POST['login']));
    $password = htmlspecialchars(trim($_POST['password']));
    // On appelle la fonction login qui permet de créer une session avec les données utilisateur
    $message = login($username, $password);
    // On le redirige vers l'accueil
    if(isset($message)){
        header("Location: ../vue/pconnexion.php?message=" . $message);
        exit;
    }else{
        header("Location: ../vue/paccueil.php");
        var_dump($_SESSION['user']);
        exit;
    }

} else if (isset($_GET['action']) && $_GET['action'] == 'deconnect') {
    //On appelle la fonction déconnexion qui
    logout();
    header("Location: ../index.php");
    exit;
} else if (isset($_POST['bDelete'])) {
    //On récupère les id des deux tables concernées
    $id = $_POST['id'];
    $id2 = $_SESSION['user']['users_data_id'];
    //On transmet les données à la fonction 
    if (drop($id,$id2)) {
        $message = "suppression de l'utilisateur réussie";
        echo $message;
    }
}
//Si le bouton Ajouter pour la page ajout recette a été envoyé
if(isset($_POST['bAddrecipe'])){
    $title = htmlspecialchars(trim($_POST['title']));
    $cookingtools = htmlspecialchars(trim($_POST['cookingtools']));
    $ingredients = htmlspecialchars(trim($_POST['ingredients']));
    $person = htmlspecialchars(trim($_POST['person']));
    $recipe = htmlspecialchars(trim($_POST['recipe']));
    $author = $_SESSION['user']['username'];
    $idUser = $_SESSION['user']['id'];
    $date_create = date('d-m-y');

    if(!empty($title) && !empty($cookingtools) && !empty($ingredients) && !empty($person)){
        $message = InsertRecipe($title, $cookingtools, $ingredients, $person, $recipe, $author, $idUser, $date_create);
        //vérification s'il y a un message d'erreur
        if(isset($message)){
            //On transmet le message par l'url avec la redirection
            header("Location: ../vue/pajoutrecette.php?message=" . $message);
        }
        //On redirige et transmet à l'utilisateur la réussite de l'ajout de la recette
        header("Location: ../vue/paccueil.php?success");
        exit;
    }

} else if(isset($_POST['bModifierrecette'])){
    $message = Modifyrecipe($title, $cookingtools, $ingredients, $person, $recipe, $author);
    //vérification s'il y a un message d'erreur
    if(isset($message)){
    //On transmet le message par l'url avec la redirection
    header("Location: ../vue/pmodifierrecette.php?message=" . $message);
    }
    //On redirige et transmet à l'utilisateur la réussite de la modification de la recette
    header("Location: ../vue/pmodifierrecette.php?success");
    exit;
} else if(isset($_POST['bSupprimerrecette'])){
    $message = Deleterecipe($recipeid);
}
?>