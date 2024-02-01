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
require_once '../models/Utilisateur.php';
require_once '../models/Entreprise.php';

// regex
$regexName = '/^[a-zA-Z]+$/';
$regexPseudo = '/^[a-zA-Z_\-\d]+$/';

// permet d'afficher le formulaire
$showForm = true;

// Je déclenche mes tests uniquement lors d'un POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // je créé un tablau d'erreurs vide
    $errors = [];

    // Vérification du nom
    if (empty($_POST['lastname'])) {
        $errors['lastname'] = 'Veuillez saisir un nom';
    } elseif (!preg_match($regexName, $_POST['lastname'])) {
        $errors['lastname'] = 'Caractères non valides';
    }

    // Vérification du prénom
    if (empty($_POST['firstname'])) {
        $errors['firstname'] = 'Veuillez saisir un prénom';
    } elseif (!preg_match($regexName, $_POST['lastname'])) {
        $errors['firstname'] = 'Caractères non valides';
    }

    // Vérification du pseudo
    if (empty($_POST['pseudo'])) {
        $errors['pseudo'] = 'Veuillez saisir un pseudo';
    } elseif (!preg_match($regexPseudo, $_POST['pseudo'])) {
        $errors['pseudo'] = 'Caractères non valides';
    } elseif (Utilisateur::checkPseudoExists($_POST['pseudo']) && $_POST['pseudo'] != $_SESSION['user']['pseudo_participant']) {
        $errors['pseudo'] = 'Pseudo déjà utilisé';
    }

    // Vérification du mail
    if (empty($_POST['email'])) {
        $errors['email'] = 'Veuillez saisir un courriel';
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Mail non valide';
    } elseif (Utilisateur::checkMailExists($_POST['email'])) {
        $errors['email'] = 'Mail déjà utilisé';
    }

    // Vérification de la date de naissance
    if (empty($_POST['birthdate'])) {
        $errors['birthdate'] = 'Veuillez saisir une date de naissance';
    }

    // Vérification du select de l'entreprise
    if (!isset($_POST['enterprise'])) {
        $errors['enterprise'] = 'Veuillez selectionner une entreprise';
    }

    // Si il n'y a pas d'erreurs dans notre formulaire(via tableau d'erreurs), nous lançons la méthode create de la classe Utilisateur
    if (empty($errors)) {

        // On récupère toutes les variables de $_POST et nous les stockons dans des variables
        $lastname = $_POST['lastname'];
        $firstname = $_POST['firstname'];
        $pseudo = $_POST['pseudo'];
        $birthdate = $_POST['birthdate'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $idEnterprise = $_POST['enterprise'];
        $validParticipant = 1;

        // On lance la méthode create de la classe Utilisateur
        Utilisateur::create($lastname, $firstname, $pseudo, $birthdate, $email, $password, $idEnterprise, $validParticipant);

        // on cache le formulaire si tout est OK
        $showForm = false;
    }
}
?>

<!-- Intégration de la vue signup dans le contrôleur signup -->
<?php include '../views/view-update.php'; ?>