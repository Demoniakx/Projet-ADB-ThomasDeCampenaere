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
    <div class="">
                    <?php
                    //RECUPERATION DE LA CONNEXION A LA BDD
                    global $bdd;
                    //Requête pour récupérer les users en BDD
                    $reponse = $bdd->query('SELECT * FROM users');
                    while ($donnees = $reponse->fetch()) {
                    ?>
                        <div class="">
                            <div class="">
                                <p><?php echo $donnees['id']; ?></p>
                            </div>
                            <p>
                                <?php echo $donnees['firstname']; ?>
                            </p>
                            <p>
                                <?php echo $donnees['lastname']; ?>
                            </p>
                            <p>
                                <?php echo $donnees['username']; ?>
                            </p>
                            <p>
                                <?php echo $donnees['email']; ?>
                            </p>
                        </div>
                    <?php
                    }
                    $reponse->closeCursor(); // Termine le traitement de la requÃªte
                    ?>
    </div>
    <div>
    <?php
        //RECUPERATION DE LA CONNEXION A LA BDD
        global $bdd;
        //Requête pour récupérer les recettes en BDD
        $reponse = $bdd->prepare("SELECT * FROM recipes");
        $reponse->execute();
        while ($recipe['recipe'] = $reponse->fetch()) {
            $id = $recipe['recipe']['ID'];
        ?>
            <div class="">
                <p>
                    <?php echo $recipe['recipe']['title']; ?>
                </p>

                <p>
                    <?php echo $recipe['recipe']['person']. " Personnes"; ?>
                </p>            
            </div>
        <?php
    }
    $reponse->closeCursor(); // Termine le traitement de la requête
    ?>
    </div>

    </div>

<?php
    include('footer.php');
?>