<?php
    $onglet = 'Recette';
    include('header.php');
    include('../model/dbconnect.php');
    $id=$_GET["id"];
?>
<div class="container">
    <div class="card_recipe">
        <?php
        //RECUPERATION DE LA CONNEXION A LA BDD
        global $bdd;
        //Requête pour récupérer les recettes
        $reponse = $bdd->prepare("SELECT * FROM recipes WHERE ID = :id");
        $reponse->execute(array('id' => $id));
        while ($recipe = $reponse->fetch()) {
        ?>
        <h1><?php echo $recipe['recipe']['title']; ?></h1>
        <div class="card_recipe">
            <p><?php echo $recipe['person']; ?></p>
            <p><?php echo $recipe['ingredient']; ?></p>
            <p><?php echo $recipe['preparation']; ?></p>
        </div>
        <?php
        }
        $reponse->closeCursor(); // Termine le traitement de la requête
        ?>
    </div>


<?php
    include('footer.php');
?>