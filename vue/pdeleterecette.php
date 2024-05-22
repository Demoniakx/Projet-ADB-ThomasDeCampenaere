<?php
    include('header.php');
    //Permet supprimer les données enregistrées dans recipe en fonction de l'id
    $recipeid = $_GET['id'];
    $message = Deleterecipe($recipeid);
    header("Location: ./paccueil.php");
    exit;

    include('footer.php');
?>