<?php
    $onglet = 'Modifications utilisateur';
    include('header.php');
    include('../model/dbconnect.php');
    if($_SESSION['user']['role'] === 0){
            header('Location: paccueil.php');
            exit;
    }
    $id = $_GET['id'];
    //RECUPERATION DE LA CONNEXION A LA BDD
    global $bdd;
    //Requête pour récupérer les users en BDD
    $reponse = $bdd->query('SELECT * FROM users WHERE id = '.$id);
    $donnees['user'] = $reponse->fetch()
?>

<div class="container">
<div>
    <img class="image" src="../asset/Image/Thomas-cooking_1.svg" alt="">
</div>
<div class="top">
    <div>
        <h1>Modifications</h1>
        <?php if(isset($message)){ echo $message;}  ?> <br>
    </div>
    <div class="form">
        <form method="POST" action="../controller/userController.php">
            <label>Email :</label></br>
            <input class="formulaire" type="email" name="mail" required autofocus value="<?php if(isset($donnees['user'])){ echo $donnees['user']['email'];}?>"/><br>
            <label>Nom :</label></br>
            <input class="formulaire" type="text" name="lastname" required value="<?php if(isset($donnees['user'])){ echo $donnees['user']['lastname'];}?>"/><br>
            <label>Prénom :</label></br>
            <input class="formulaire" type="text" name="firstname" required value="<?php if(isset($donnees['user'])){ echo $donnees['user']['firstname'];}?>"/><br>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="submit" class="button" name="bModifyuseradmin" value="Modifier"></input>
        </form>
    </div>
</div>

</div>

<?php
    include('footer.php');
?>