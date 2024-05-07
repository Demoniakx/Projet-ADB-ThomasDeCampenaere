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
                    <label>Email :</label></br>
                    <input class="formulaire" type="email" name="email" placeholder="Ex: abced@hotmail.com" autofocus required><br>
                    <label>Username :</label></br>
                    <input class="formulaire" type="text" name="username" required><br>
                    <label>Nom :</label></br>
                    <input class="formulaire" type="text" name="lastname" required><br>
                    <label>Prénom :</label></br>
                    <input class="formulaire" type="text" name="firstname" required><br>
                    <label>Mot de passe :</label></br>
                    <input class="formulaire" type="password" name="pwd" required><br>
                    <label>Confirmez le mot de passe :</label></br>
                    <input class="formulaire" type="password" name="pwdconfirmed" required><br>
                    <a href="pmdpoublie.php">Mot de passe oublié ?</a><br>
                    <a href="pconnexion.php">Déjà inscrit ?</a><br>   
                    <input class="button" type="submit" name="bInscription" value="Inscription"></input>
                </form>
            </div>
        </div>
 
    </div>

<?php
    include('footer.php');
?>