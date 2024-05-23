<?php
    $onglet = 'Modifications utilisateur';
    include('header.php');
    include('../model/dbconnect.php');
    $id = $_GET['id'];
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
            <input class="formulaire" type="email" name="mail" required autofocus value="<?php if(isset($_SESSION['user'])){ echo $_SESSION['user']['email'];}?>"/><br>
            <label>Nom :</label></br>
            <input class="formulaire" type="text" name="lastname" required value="<?php if(isset($_SESSION['user'])){ echo $_SESSION['user']['lastname'];}?>"/><br>
            <label>Prénom :</label></br>
            <input class="formulaire" type="text" name="firstname" required value="<?php if(isset($_SESSION['user'])){ echo $_SESSION['user']['firstname'];}?>"/><br>
            <label>Mot de passe :</label></br>
            <input class="formulaire" type="password" name="password" required></br>
            <input type="hidden" name="id" value="<?php $id ?>">
            <input type="submit" class="button" name="bModifyuseradmin" value="Modifier"></input>
        </form>
    </div>
</div>

</div>

<?php
    include('footer.php');
?>