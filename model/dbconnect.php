<?php
    try{
        //On se connecte a la base de donnée et on définit notre variable globale a celle-ci
        $bdd = new PDO('mysql:host=localhost;dbname=blogculinaire', 'root', '');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);//Emet un message dès qu'une requête a échoué.
        global $bdd;
    }
    catch (\Exception $e){
        echo $e->getMessage();
    }
?>