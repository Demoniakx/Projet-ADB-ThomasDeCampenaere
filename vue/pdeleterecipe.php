<?php
    include('header.php');
    include('../model/userModel.php');
    if(!($_SESSION['user']['role'])){
        header('Location: paccueil.php');
        exit;
}
    //Permet supprimer les données enregistrées dans recipe en fonction de l'id
    $recipeid = $_GET['id'];
    $message = Deleterecipe($recipeid);
    header("Location: ./padmin.php");
    exit;

    include('footer.php');
?>