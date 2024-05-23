<?php
    $onglet = 'Recette';
    include('header.php');
    include('../model/dbconnect.php');
    $id=$_GET["id"];
?>            

<div class="container">
    <div class="container">
        <div>
            <img class="image" src="../asset/Image/Thomas-cooking_1.svg" alt="">
        </div>
        <?php
        //RECUPERATION DE LA CONNEXION A LA BDD
        global $bdd;
        //Requête pour récupérer les recettes
        $reponse = $bdd->prepare("SELECT * FROM recipes WHERE ID=:id");
        $reponse->bindParam(":id",$id);
        $reponse->execute();
        while ($recipe['recipe'] = $reponse->fetch()) {
        ?>
        <div class="toprecipe">
            <h1><?php echo $recipe['recipe']['title']; ?></h1>
            <div class="card">
                <div>
                        <p>Recette pour <?php echo $recipe['recipe']['person']; ?> personnes</p>
                    <div class="card_recipe cookingtools_ingredients">
                        <div>
                            <h2>Ustensiles :</h2>
                            <p><?php echo nl2br($recipe['recipe']['cookingtools']); ?></p>
                        </div>
                        <div>
                            <h2>Ingrédients :</h2>
                            <p><?php echo nl2br($recipe['recipe']['ingredients']); ?></p>
                        </div>
                    </div>
                    <h2>Recette :</h2>
                    <p> <?php echo nl2br($recipe['recipe']['recipe']); ?></p>
                    <p>Auteur : <?php echo $recipe['recipe']['author'];  ?></p>
            </div>
            
        </div>
        <?php
        }
        $reponse->closeCursor(); // Termine le traitement de la requête
        ?>
        </div>
        
    </div>


<?php
    include('footer.php');
?>