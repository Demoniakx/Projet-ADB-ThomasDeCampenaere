<?php
    $onglet = 'Surface admin';
    include('header.php');
    include('../model/dbconnect.php');
    if($_SESSION['user']['role'] === 0){
            header('Location: paccueil.php');
    }else if(!isset($_SESSION['user'])){
            header('Location: index.php');
    }
?>

<div class="container">
    <div>
        <div class="board">
                    <?php
                    //RECUPERATION DE LA CONNEXION A LA BDD
                    global $bdd;
                    //Requête pour récupérer les users en BDD
                    $reponse = $bdd->query('SELECT * FROM users');
                    while ($donnees['user'] = $reponse->fetch()) {

                    ?>
                        <div class="">
                            <p>
                                <?php echo $donnees['user']['username']; ?>
                            </p>
                            <p>
                                <?php echo $donnees['user']['email']; ?>
                            </p>
                            <a href="pmodifyuser.php?id=<?php echo $donnees['user']['id']?>">Modifier</a>
                            <a href="pdeleteuser.php?id=<?php echo $donnees['user']['id']?>">X</a>
                        </div>
                    <?php
                    }
                    $reponse->closeCursor(); // Termine le traitement de la requÃªte
                    ?>
        </div>
    </div>
    <div>
        <div class="board">
            <?php
            //RECUPERATION DE LA CONNEXION A LA BDD
            global $bdd;
            //Requête pour récupérer les recettes en BDD
            $reponse = $bdd->prepare("SELECT * FROM recipes");
            $reponse->execute();
            while ($recipe['recipe'] = $reponse->fetch()) {
            ?>
            <div class="">
                <p>
                    <?php echo $recipe['recipe']['title']; ?>
                </p>

                <p>
                    <?php echo $recipe['recipe']['person']. " Personnes"; ?>
                </p>
                <a href="pmodifierrecette.php?id=<?php echo $recipe['recipe']['ID'] ?>">Modifier</a>
                <a href="pdeleterecipe.php?id=<?php echo $recipe['recipe']['ID'] ?>">X</a>            
            </div>
            <?php
            }
            $reponse->closeCursor(); // Termine le traitement de la requête
            ?>
        </div>
    </div>
</div>

<?php
    include('footer.php');
?>