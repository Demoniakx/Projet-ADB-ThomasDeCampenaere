<?php
    include('header.php');
?>
    <div class="container">
        <div>
            <img class="image" src="../asset/Image/Thomas-cooking_1.svg" alt="">
        </div>
        <div class="top">
            <div>
                <h1>Inscription</h1>
            </div>
            <div class="form">
                <form>
                    <label>Titre :</label></br>
                    <input class="formulaire" type="text" name="title" autofocus required><br>
                    <label>Ustensiles :</label></br>
                    <input class="formulaire" type="text" name="cookingtools" required><br>
                    <label>Ingrédients :</label></br>
                    <input class="formulaire" type="text" name="ingredients" required><br>
                    <label>Nombre de personnes :</label></br>
                    <input class="formulaire" type="int" name="person" required><br>
                    <label>Recette :</label></br>
                    <input class="formulaire big" type="password" name="recipe" required><br>
                    <input class="button" type="submit" name="bAddrecipe" value="Ajouter"></input>
                </form>
            </div>
        </div>
 
    </div>

<?php
    include('footer.php');
?>