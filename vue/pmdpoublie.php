<?php
    $onglet = 'Mot de passe oublié';
    include('header.php');
    $_SESSION['nb1'] = rand(1,20);
    $_SESSION['nb2'] = rand(1,20);
    if(isset($_SESSION['user'])){
        header("Location: paccueil.php");
    }else{
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
                <form method="post" action="../controller/userController.php">
                    <label>Résolvez ce calcul :</label></br>
                    <input class="formulaire" type="text" name="resultat" placeholder="<?php echo $_SESSION['nb1'] . "+" . $_SESSION['nb2'] ?>" required autofocus><br>
                    <label>Username :</label></br>
                    <input class="formulaire" type="text" name="username" required><br>
                    <label>Nouveau mot de passe :</label></br>
                    <input class="formulaire" type="password" name="newpassword" required><br>
                    <label>Confirmez le mot de passe :</label></br>
                    <input class="formulaire" type="password" name="newconfirmedpassword" required><br>  
                    <input type="submit" class="button" name="bModifypwd" value="Modifier"></input>
                </form>
            </div>
        </div>

    </div>
   
<?php   }
    include('footer.php');
?>