<?php
    include('header.php');
    //Permet de se deconnecter et de supprimer les données enregistrées dans la session
    session_destroy();
    header("Location: ./paccueil.php");
    exit;

    include('footer.php');
?>