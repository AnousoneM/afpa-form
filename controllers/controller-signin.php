<?php

// Config
require_once '../config.php';

// Models
require_once '../models/Utilisateur.php';

// Nous déclenchons nos vérifications uniquement lorsqu'un submit de type POST est détecté
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // tableau d'erreurs (stockage des erreurs)
    $errors = [];

    if(empty($_POST['email'])){
        $errors['email'] = 'Veuillez saisir votre Email';
    } 

    if(empty($_POST['password'])){
        $errors['password'] = 'Veuillez saisir votre mot de passe';
    }

    if(empty($errors)){
        // ici commence les tests
        if (!Utilisateur::checkMailExists($_POST['email'])) {
            $errors['email'] = 'Utilisateur Inconnu';
        } else {
            $errors['email'] = 'Utilisateur Connu';
        }
    }

}

?>

<!-- Integration de la vue -->
<?php include '../views/view-signin.php'; ?>