<?php
    $onglet = 'Accueil';
    include('header.php');
    require('../controller/userController.php');

    var_dump($_SESSION['user']);exit;
?>

<?php
    include('footer.php');
?>