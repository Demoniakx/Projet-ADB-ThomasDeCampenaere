<?php
    include('header.php');
    if(!($_SESSION)){
        header("Location: ./paccueil.php");
        exit;
    
    }
    //Permet de se deconnecter et de supprimer les données enregistrées dans la session
    session_destroy();
    header("Location: ./paccueil.php");
    exit;

    include('footer.php');
?>