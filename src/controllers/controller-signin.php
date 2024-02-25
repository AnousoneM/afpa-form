<?php

// une créé une session pour pouvoir manipuler $_SESSION
session_start();

// Si l'utilisateur n'est pas connecté, on le redirige vers la page de connexion
if (isset($_SESSION['user'])) {
    header('Location: controller-home.php');
    exit();
}

// Autoload
require_once '../../vendor/autoload.php';
// Config
require_once '../../config/config.php';

// Models
use app\models\Utilisateur;

// Nous déclenchons nos vérifications uniquement lorsqu'un submit de type POST est détecté
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // tableau d'erreurs (stockage des erreurs)
    $errors = [];

    // Je vérifie si les champs sont vides : email puis password
    if (empty($_POST['email'])) {
        $errors['email'] = 'Veuillez saisir votre Email';
    }

    if (empty($_POST['password'])) {
        $errors['password'] = 'Veuillez saisir votre mot de passe';
    }

    // ici commence les tests
    if (empty($errors)) {
        // Je vérifie que le mail existe dans la bdd
        if (!Utilisateur::checkMailExists($_POST['email'])) {
            $errors['email'] = 'Utilisateur Inconnu';
        } else {
            // je recupère toutes les infos via la méthode getInfos()
            $utilisateurInfos = Utilisateur::getInfos($_POST['email']);

            // Utilisation de password_verify pour valider le mdp
            if (password_verify($_POST['password'], $utilisateurInfos['mdp_participant'])) {
                // on créé une variable de session user qui va contenir toutes les infos du user
                $_SESSION['user'] = $utilisateurInfos;
                // on pense à ne pas stocker le mdp à l'aide d'un unset
                unset($_SESSION['user']['mdp_participant']);
                // je fais une redirection vers le controller home
                header('Location: controller-home.php');
                exit();
            } else {
                $errors['connexion'] = 'Mauvais mot de passe';
            }
        }
    }
}

?>

<!-- Integration de la vue -->
<?php include '../../templates/view-signin.php'; ?>