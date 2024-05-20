<?php
    $onglet = 'Connexion';
    include('header.php');
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
                <form method="POST" action="../controller/userController.php">
                    <label>Username :</label></br>
                    <input class="formulaire" type="text" name="username" required autofocus><br>
                    <label>Mot de passe :</label></br>
                    <input class="formulaire" type="password" name="password" required><br>
                    <a href="pmdpoublie.php">Mot de passe oublié ?</a><br>
                    <a href="pinscription.php">Pas encore inscrit ?</a><br>  
                    <input type="submit" class="button" name="bConnexion" value="Connexion"></input>
                </form>
            </div>
        </div>

    </div>
   
<?php
    include('footer.php');
?>