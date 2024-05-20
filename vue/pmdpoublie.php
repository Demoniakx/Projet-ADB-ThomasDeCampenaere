<?php
    $onglet = 'Mot de passe oublié';
    include('header.php');
?>
    <div class="container">
        <div>
            <img class="image" src="../asset/Image/Thomas-cooking_1.svg" alt="">
        </div>
        <div class="top">
            <div>
                <h1>Mot de passe oublié</h1>
            </div>
            <div class="form">
                <form>
                    <label>Résolvez ce calcul :</label></br>
                    <input class="formulaire" type="text" name="calcul" placeholder="<?php echo rand(1,20). "+" .rand(1,20) ?>" required autofocus><br>
                    <label>Nouveau mot de passe :</label></br>
                    <input class="formulaire" type="password" name="pwd" required><br>
                    <label>Confirmez le mot de passe :</label></br>
                    <input class="formulaire" type="password" name="pwd" required><br>
                    <a href="pmdpoublie.php">Mot de passe oublié ?</a><br>
                    <a href="pinscription.php">Pas encore inscrit ?</a><br>  
                    <input type="submit" class="button" name="bModifypwd" value="Modifier"></input>
                </form>
            </div>
        </div>

    </div>
   
<?php
    include('footer.php');
?>