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
require_once '../models/Trajet.php';

// Je déclenche mes tests uniquement lors d'un POST
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete'])) {

    // Je récupère l'id de l'utilisateur connecté
    $id_utilisateur = $_SESSION['user']['id_utilisateur'];

    // J'efface tous les trajets de l'utilisateur
    // J'execute la méthode deleteAll de la classe Trajet
    // Trajet::deleteAll($id_utilisateur);

    // J'efface l'utilisateur
    // J'execute la méthode delete de la classe Utilisateur
    Utilisateur::delete($id_utilisateur);

    // On détruit la session
    session_destroy();
}

include '../views/view-deleteProfil.php';