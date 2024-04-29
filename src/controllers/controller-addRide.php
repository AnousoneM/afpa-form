<?php

session_start();

// Si l'utilisateur n'est pas connecté, on le redirige vers la page de connexion
if (!isset($_SESSION['user'])) {
    header('Location: ../index.php');
    exit();
}

// Config
require_once '../../config/config.php';

// Import des classes
use app\models\Trajet;
use app\models\Transport;

// Je déclenche mes tests uniquement lors d'un POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // je créé un tablau d'erreurs vide
    $errors = [];

    // Vérification de la date du trajet
    if (empty($_POST['dateTrajet'])) {
        $errors['dateTrajet'] = 'Veuillez saisir une date de trajet';
    }

    // Vérification du select du transport
    if (!isset($_POST['transport'])) {
        $errors['transport'] = 'Veuillez selectionner un transport';
    }

    // Vérification de la distance
    if (empty($_POST['distance'])) {
        $errors['distance'] = 'Veuillez saisir une distance';
    }

    // Vérification de la durée
    if (empty($_POST['temps'])) {
        $errors['temps'] = 'Veuillez saisir une durée';
    }

    // Si il n'y a pas d'erreurs dans notre formulaire(via tableau d'erreurs), nous lançons la méthode create de la classe Utilisateur
    if (empty($errors)) {

        // Je récupère l'id de l'utilisateur connecté
        $id_utilisateur = $_SESSION['user']['id_utilisateur'];

        // J'execute la méthode create de la classe Trajet
        Trajet::create($_POST['dateTrajet'], $_POST['distance'], $_POST['temps'], $_POST['transport'], $id_utilisateur);

        // On créé un message de session pour afficher un message de succès
        $_SESSION['message'] = [
            'add' => 'success'
        ];

        // Je redirige vers la page d'accueil
        header('Location: controller-rides.php');
        exit();
    }
}
?>

<!-- Intégration de la vue signup dans le contrôleur signup -->
<?php include '../../templates/view-addRide.php'; ?>