<?php

session_start();

// Si l'utilisateur n'est pas connecté, on le redirige vers la page de connexion
if (!isset($_SESSION['user'])) {
    header('Location: ../index.php');
    exit();
}


// Config
require_once '../config.php';

// Models
require_once '../models/Trajet.php';

?>

<!-- Intégration de la vue signup dans le contrôleur signup  -->
<?php include '../views/view-rides.php'; ?>