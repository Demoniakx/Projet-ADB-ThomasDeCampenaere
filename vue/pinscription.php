<?php
    $onglet = 'Inscription';
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
                <h1>Inscription</h1>
                <!-- Si un message d'erreur ou de confirmation est envoyé par le controller -->
                <?php if(isset($_GET['message'])){ echo $_GET['message'];}  ?> <br>
                <?php if(isset($_GET['error'])){ 
                ?> <p>Une erreur s'est produite</p><br>
                <?php }  ?>
            </div>
            <div class="form">
                <form method='POST' action="../controller/userController.php">
                    <label>Email :</label></br>
                    <input class="formulaire" type="email" name="email" placeholder="Ex: abced@hotmail.com" autofocus required><br>
                    <label>Username :</label></br>
                    <input class="formulaire" type="text" name="username" required><br>
                    <label>Nom :</label></br>
                    <input class="formulaire" type="text" name="lastname" required><br>
                    <label>Prénom :</label></br>
                    <input class="formulaire" type="text" name="firstname" required><br>
                    <label>Mot de passe : (minimum 8 caractères)</label></br>
                    <input class="formulaire" type="password" name="pwd" required><br>
                    <label>Confirmez le mot de passe :</label></br>
                    <input class="formulaire" type="password" name="pwdconfirmed" required><br>
                    <a href="pconnexion.php">Déjà inscrit ?</a><br>   
                    <input class="button" type="submit" name="bInscription" value="Inscription"></input>
                </form>
            </div>
        </div>
 
    </div>

<?php   }
    include('footer.php');
?>