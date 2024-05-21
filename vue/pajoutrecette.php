<?php
    $onglet = 'Ajout recette';
    include('header.php');
    if(!isset($_SESSION['user'])){
        header("Location: pconnexion.php");
    }else{
    ?>
    <div class="container">
        <div>
            <img class="image" src="../asset/Image/Thomas-cooking_1.svg" alt="">
        </div>
        <div class="top">
            <div>
                <h1>Recette</h1>
            </div>
            <div class="form">
                <form method="POST" action="../controller/userController.php">
                    <label>Titre :</label></br>
                    <input class="formulaire" type="text" name="title" autofocus required><br>
                    <label>Ustensiles :</label></br>
                    <textarea class="formulaire small" type="text" name="cookingtools" required></textarea><br>
                    <label>Ingrédients :</label></br>
                    <textarea class="formulaire small" type="text" name="ingredients" required></textarea><br>
                    <label>Nombre de personnes :</label></br>
                    <input class="formulaire" type="number" name="person" required><br>
                    <label>Recette :</label></br>
                    <textarea class="formulaire big" type="text" name="recipe" required></textarea><br>
                    <input class="button" type="submit" name="bAddrecipe" value="Ajouter">
                </form>
            </div>
        </div>
 
    </div>

<?php   }
    include('footer.php');
?>