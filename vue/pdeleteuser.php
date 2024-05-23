<?php
    include('header.php');
    require('../model/userModel.php');
    if(!($_SESSION['user']['role'])){
            header('Location: paccueil.php');
            exit;
    }
    //Permet supprimer les données enregistrées dans recipe en fonction de l'id
    $iduser = $_GET['id'];
    $message = Deleteuser($iduser);
    header("Location: ./padmin.php");
    exit;

    include('footer.php');
?>