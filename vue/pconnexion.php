<?php
    require('header.php');
?>
    <div class="container">
        <div>
            <img class="image" src="../asset/Image/Thomas-cooking_1.svg" alt="">
        </div>
        <div class="top">
            <div>
                <h1>Connexion</h1>
            </div>
            <div class="form">
                <form>
                    <label>Identifiant :</label></br>
                    <input class="formulaire" type="text" name="id" required autofocus><br>
                    <label>Mot de passe :</label></br>
                    <input class="formulaire" type="password" name="pwd" required><br>
                    <a href="#">Mot de passe oublié ?</a><br>
                    <a href="Register.html">Pas encore inscrit ?</a><br>  
                    <input type="submit" class="button" name="bConnexion" value="Connexion"></input>
                </form>
            </div>
        </div>

    </div>
   
<?php
    require('footer.php');
?>