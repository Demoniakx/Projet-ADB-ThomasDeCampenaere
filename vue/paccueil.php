<?php
    $onglet = 'Accueil';
    include('header.php');
    include('../model/dbconnect.php');
?>
<div class="container gridaccueil">
    <div class="">
        <?php
        //RECUPERATION DE LA CONNEXION A LA BDD
        global $bdd;
        //Requête pour récupérer les recettes
        $reponse = $bdd->prepare("SELECT * FROM recipes");
        $reponse->execute();
        while ($recipe['recipe'] = $reponse->fetch()) {
            $id = $recipe['recipe']['ID'];
        ?>
        <a href="precette.php?id=<?php echo $id ?>">
            <div class="card_accueil">
                <p>
                    <?php echo $recipe['recipe']['title']; ?>
                </p>

                <p>
                    <?php echo $recipe['recipe']['person']. " Personnes"; ?>
                </p>            
            </div>
        </a>
    </div>
    <?php
    }
    $reponse->closeCursor(); // Termine le traitement de la requête
    ?>
</div>
      

<?php
    include('footer.php');
?>