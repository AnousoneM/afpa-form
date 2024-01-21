<?php
session_start();

require_once '../config.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // tableau d'erreurs (stockage des erreurs)
    $errors = [];
}

?>

<?php include '../views/view-profil.php'; ?>