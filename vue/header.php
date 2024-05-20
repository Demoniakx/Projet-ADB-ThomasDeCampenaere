<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/CSS/formulaire.css">
    <title><?php echo $onglet ?></title>
</head>
<body>
    <header>
        <div>
            <img class='imgheader' src="../asset/Image/Thomas-cooking_1.svg" alt="">
        </div>
        <div>
            <nav>
                <ul class="liste">
                    <li><a href="paccueil.php">Accueil</a></li>
                    <?php
                        if(!isset($_SESSION)){

                    ?>
                            <li><a href="pinscription.php">Ajouter une recette</a></li>
                    <?php
                       }else{
                        ?>
                            <li><a href="pajoutrecette.php">Ajouter une recette</a></li>
                        <?php    }
                    ?>

                    <?php
                        if(!isset($_SESSION)){
                            ?>
                            <li><a href="pconnexion.php">Connexion</a></li>
                            <?php 
                        }else{
                            ?>
                            <li><a href="?action=deconnect">Déconnexion</a></li>
                        <?php }
                    ?>
                    <li><a href="pmodificationdonnéesuser.php">Espace utilisateur</a></li>
                </ul>
            </nav>
        </div>
    </header>