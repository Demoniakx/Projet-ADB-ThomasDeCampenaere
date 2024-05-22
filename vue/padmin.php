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
                        </div>
                    <?php
                    }
                    $reponse->closeCursor(); // Termine le traitement de la requÃªte
                    ?>

<?php
    include('footer.php');
?>