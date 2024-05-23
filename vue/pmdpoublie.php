<?php
    $onglet = 'Mot de passe oublié';
    include('header.php');
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
                    <?php if(isset($_GET['message'])){ echo $_GET['message'];}  ?> <br>
                    <?php if(isset($_GET['error'])){ 
                    ?> <p>Une erreur s'est produite</p><br>
                    <?php } ?>
            </div>
            <div class="form">
                <form method="post" action="../controller/userController.php">
                    <?php
                        $nb1 = rand(0,20);
                        $nb2 = rand(0,20);
                    ?>
                    <input type="hidden" name="nb1" value="<?php echo $nb1?>">
                    <input type="hidden" name="nb2" value="<?php echo $nb2?>">
                    <label>Résolvez ce calcul :</label></br>
                    <input class="formulaire" type="text" name="resultat" placeholder="<?php echo $nb1 . "+" . $nb2 . " = ?" ?>" required autofocus><br>
                    <label>Username : (Celui de votre compte)</label></br>
                    <input class="formulaire" type="text" name="username" required><br>
                    <label>Email : (Celle de votre compte)</label></br>
                    <input class="formulaire" type="email" name="email" required><br>
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