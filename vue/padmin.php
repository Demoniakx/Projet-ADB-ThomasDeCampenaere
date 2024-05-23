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
<div class="container gridadmin">
    <div>
        <div>
            <h2 class="center">Utilisateurs</h2>
                <table class="center board">
                    <thead><tr><th>Utilisateurs</th><th>Email</th><th>Actions</th></tr></thead>
                    <?php
                    //RECUPERATION DE LA CONNEXION A LA BDD
                    global $bdd;
                    //Requête pour récupérer les users en BDD
                    $reponse = $bdd->prepare("SELECT * FROM users");
                    $reponse->execute();
                    while ($donnees['user'] = $reponse->fetch()) {
                    //Génération du tableau des users
                    ?>
                    <tr>

                        <td>
                            <div>
                                 <?php echo $donnees['user']['username']; ?>
                            </div>
                        </td>
            
                        <td>
                            <div class="emailadmin">
                                <?php echo $donnees['user']['email']; ?>
                            </div>
                        </td>

                        <td class="linkflex">
                            <a class="linkadmin" href="pmodifyuser.php?id=<?php echo $donnees['user']['id']?>">Modifier</a>
                            <a class="linkadmin" href="pdeleteuser.php?id=<?php echo $donnees['user']['id']?>">X</a>
                        </td>
                    </tr>
                    <?php
                    }
                    $reponse->closeCursor(); // Termine le traitement de la requête
                    ?>
                </table>                    
                    <form class="center" method="POST" action="../controller/userController.php">
                        <input class="buttonadmin" type="submit" name="bAdduserlien" value="Ajouter un utilisateur">
                    </form>

        </div>
    </div> 
    <div>
        <div>
            <h2 class="center">Recettes</h2>
            <table class="board center">
                <thead><tr><th>Recettes</th><th>Auteurs</th><th>Actions</th></tr></thead>
                <?php
                //RECUPERATION DE LA CONNEXION A LA BDD
                global $bdd;
                //Requête pour récupérer les recettes en BDD
                $reponse = $bdd->prepare("SELECT * FROM recipes");
                $reponse->execute();
                while ($recipe['recipe'] = $reponse->fetch()) {
                //Génération du tableau des recettes
                ?>

                <tr>
                    <td>
                        <?php echo $recipe['recipe']['title']; ?>
                    </td>

                    <td>
                        <?php echo $recipe['recipe']['author']; ?>
                    </td>

                    <td class="linkflex">
                        <a class="linkadmin" href="pmodifierrecette.php?id=<?php echo $recipe['recipe']['ID'] ?>">Modifier</a>
                        <a class="linkadmin" href="pdeleterecipe.php?id=<?php echo $recipe['recipe']['ID'] ?>">X</a> 
                    </td>

                </tr>
                <?php
                }
                $reponse->closeCursor(); // Termine le traitement de la requête
                ?>
            </table>
        </div>
    </div>
</div>


<?php
    include('footer.php');
?>