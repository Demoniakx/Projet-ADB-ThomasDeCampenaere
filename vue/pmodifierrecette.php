<?php
    $onglet = 'Modifier recette';
    include('header.php');
    if(($_SESSION['user']['role'])==0){
        header("Location: paccueil.php");
        exit;
    }
    include('../model/dbconnect.php');
    //RECUPERATION DE LA CONNEXION A LA BDD
    global $bdd;
    //Requête pour récupérer les recettes
    $reponse = $bdd->prepare("SELECT * FROM recipes where id = ".$_GET['id']);
    $reponse->execute();
    $donnees['recipe'] = $reponse->fetch();
?>
    <div class="container">
        <div>
            <img class="image" src="../asset/Image/Thomas-cooking_1.svg" alt="">
        </div>
        <div class="top">
            <div>
                <h1>Recette</h1>
                <?php if(isset($_GET['message'])){ echo $_GET['message'];}  ?> <br>
                    <?php if(isset($_GET['error'])){ 
                    ?> <p>Une erreur s'est produite</p><br>
                    <?php } ?>
            </div>
            <!--Formulaire visible que par l'admin, il y'a que l'admin qui peut modifier les recettes-->
            <div class="form">
                <form method="POST" action="../controller/userController.php">
                    <label>Titre :</label></br>
                    <input class="formulaire" type="text" name="title" autofocus required value="<?php if(isset($donnees['recipe']['title'])){ echo $donnees['recipe']['title'];}?>"/><br>
                    <label>Ustensiles :</label></br>
                    <textarea class="formulaire small" type="text" name="cookingtools" required><?php if(isset($donnees['recipe']['cookingtools'])){ echo $donnees['recipe']['cookingtools'];}?></textarea><br>
                    <label>Ingrédients :</label></br>
                    <textarea class="formulaire small" type="text" name="ingredients" required><?php if(isset($donnees['recipe']['ingredients'])){ echo $donnees['recipe']['ingredients'];}?></textarea><br>
                    <label>Nombre de personnes :</label></br>
                    <input class="formulaire" type="number" name="person" required value="<?php if(isset($donnees['recipe']['person'])){ echo $donnees['recipe']['person'];}?>"/><br>
                    <label>Recette :</label></br>
                    <textarea class="formulaire big" type="text" name="recipe" required ><?php if(isset($donnees['recipe']['recipe'])){ echo $donnees['recipe']['recipe'];}?></textarea><br>
                    <label>Auteur :</label></br>
                    <input class="formulaire" type="text" name="author" required value="<?php if(isset($donnees['recipe']['author'])){ echo $donnees['recipe']['author'];}?>"/><br>
                    <!--On récupère l'id de la recette pour la modification-->
                    <input type="hidden" value="<?php echo $donnees['recipe']['ID']; ?>" name="id">
                    <input class="button" type="submit" name="bModifyrecipe" value="Modifier"></input>
                </form>
            </div>
        </div>
 
    </div>

<?php
    include('footer.php');
?>