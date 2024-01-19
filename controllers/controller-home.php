<?php
// On démarre une session pour manipuler $_SESSION
session_start();

require_once '../config.php';

var_dump($_SESSION);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // tableau d'erreurs (stockage des erreurs)
    $errors = [];
}

?>

<!-- Integration de la vue -->
<?php include '../views/view-home.php'; ?>