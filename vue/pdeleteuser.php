<?php
    include('header.php');
    //Permet supprimer les données enregistrées dans recipe en fonction de l'id
    $iduser = $_GET['id'];
    $message = Deleteuser($iduser);
    header("Location: ./paccueil.php");
    exit;

    include('footer.php');
?>