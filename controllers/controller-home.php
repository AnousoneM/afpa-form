<?php
// On démarre une session pour manipuler $_SESSION
session_start();

var_dump($_SESSION);

// Si l'utilisateur n'est pas connecté, on le redirige vers la page de connexion
if (!isset($_SESSION['user'])) {
    header('Location: ../index.php');
    exit();
}

require_once '../config.php';

// mise en place de la variable date en fr : jour mois année -> 01 Janvier 2024
$formatFr = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
$date = $formatFr->format(time());

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // tableau d'erreurs (stockage des erreurs)
    $errors = [];
}

?>

<!-- Integration de la vue -->
<?php include '../views/view-home.php'; ?>