<?php

session_start();

// Si l'utilisateur n'est pas connecté, on le redirige vers la page de connexion
if (!isset($_SESSION['user'])) {
    header('Location: ../index.php');
    exit();
}

// Config
require_once '../../config/config.php';

// Autoload
require_once '../../vendor/autoload.php';

// Import des classes
use app\models\Trajet;

// Si le formulaire est envoyé
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Si le formulaire est envoyé pour effacer un trajet
    if (isset($_POST['delete'])) {

        // On efface le trajet
        if (isset($_POST['id_trajet'])) {
            Trajet::delete($_POST['id_trajet']);
        }

        // On créé un message de session pour afficher un message de succès
        $_SESSION['message'] = [
            'delete' => 'success'
        ];

        // On redirige vers la page de profil
        header('Location: controller-rides.php');
        exit();
    }
}

?>

<!-- Intégration de la vue signup dans le contrôleur signup  -->
<?php include '../../templates/view-rides.php'; ?>