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
            <!--Formulaire visible que par l'admin, il y'a que l'admin qui peut modifier les recettes-->
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
                    <label>Nombre de personnes :</label></br>
                    <input class="formulaire" type="int" name="person" required><br>
                    <input class="button" type="submit" name="bModifyrecipe" value="Modifier"></input>
                </form>
            </div>
        </div>
 
    </div>

<?php
    include('footer.php');
?>