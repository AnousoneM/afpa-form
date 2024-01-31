<?php
session_start();

// Si l'utilisateur n'est pas connecté, on le redirige vers la page de connexion
if (!isset($_SESSION['user'])) {
    header('Location: ../index.php');
    exit();
}


require_once '../config.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // tableau d'erreurs (stockage des erreurs)
    $errors = [];
}

?>

<?php include '../views/view-profil.php'; ?>