<?php
    include('header.php');
?>

<div class="container">
<div>
    <img class="image" src="../asset/Image/Thomas-cooking_1.svg" alt="">
</div>
<div class="top">
    <div>
        <h1>Modifications</h1>
    </div>
    <div class="form">
        <form>
            <label>Email :</label></br>
            <input class="formulaire" type="email" name="mail" required autofocus><br>
            <label>Nom :</label></br>
            <input class="formulaire" type="text" name="lastname" required><br>
            <label>Prénom :</label></br>
            <input class="formulaire" type="text" name="firstname" required><br>
            <a href="pmdpoublie.php">Mot de passe oublié ?</a><br>
            <a href="pconnexion.php">Pas encore inscrit ?</a><br>  
            <input type="submit" class="button" name="bModifyuser" value="Modifier"></input>
        </form>
    </div>
</div>

</div>

<?php
    include('footer.php');
?>