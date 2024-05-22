<?php
    $onglet = 'Surface admin';
    include('header.php');
?>

<div class="container">
    <div class="">
                    <?php
                    //RECUPERATION DE LA CONNEXION A LA BDD
                    global $bdd;
                    $reponse = $bdd->query('SELECT * FROM users');
                    while ($donnees = $reponse->fetch()) {
                    ?>
                        <div class="">
                            <div class="">
                                <p><?php echo $donnees['user_id']; ?></p>
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
                            <div class="id_role">
                                <form class="card_btn" action="../controller/userController.php" method="POST">
                                    <input type="hidden" value="<?php echo $donnees['user_id']; ?>" name="id">
                                    <input class="btn_form" type="submit" value="Modifier" name="bModifyuser">
                                </form>
                                <form class="card_btn" action="../controller/userController.php" method="POST">
                                    <input type="hidden" value="<?php echo $donnees['user_id']; ?>" name="id">
                                    <input class="btn_form" type="submit" name="bDeleteuser" value="Suprimer" />
                                </form>
                            </div>
                        </div>
                    <?php
                    }
                    $reponse->closeCursor(); // Termine le traitement de la requÃªte
                    ?>

<?php
    include('footer.php');
?>