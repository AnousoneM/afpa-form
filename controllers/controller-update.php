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

// Je déclenche mes tests uniquement lors d'un POST
// Pas de contrôle sur la description car elle n'est pas obligatoire
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // je créé un tablau d'erreurs vide
    $errors = [];

    // Vérification du select de l'entreprise
    if (!isset($_POST['enterprise'])) {
        $errors['enterprise'] = 'Veuillez selectionner une entreprise';
    }

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
    } elseif (Utilisateur::checkMailExists($_POST['email']) && $_POST['email'] != $_SESSION['user']['mail_participant']) {
        $errors['email'] = 'Mail déjà utilisé';
    }

    // Vérification de la date de naissance
    if (empty($_POST['birthdate'])) {
        $errors['birthdate'] = 'Veuillez saisir une date de naissance';
    }



    // Vérification de l'upload de l'image uniquement si il n'y a pas d'erreurs dans le $_FILES
    if ($_FILES['photo']['error'] === 0) {

        // Constantes pour l'enregistrement de la photo de profile
        $profiles_directory = "../assets/img/profiles/";

        // Taille max en octets (2Mo)  
        $profiles_sizeMax = 2000000;

        // extension autorisées
        $profiles_allowedExtensions = ['jpg', 'jpeg', 'png'];


        // Contrôle du fichier à upload //

        // On créé une variable $fileName qui contiendra le nom du fichier
        $fileName = basename($_FILES['photo']["name"]);

        // Nous allon extraire le MIME du fichier à l'aide de la fonction mime_content_type : cela évite de se fier à l'extension du fichier
        $fileMime = mime_content_type($_FILES['photo']["tmp_name"]);

        // Nous allons également récupérer l'extension du fichier pour la stocker dans une variable : $fileExtension
        // l'extension sera en minuscule à l'aide de la fonction strtolower()
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));


        // Nous commençons notre vérification du fichier

        if (strpos($fileMime, 'image') === false) { // strpos() pour rechercher le mot 'image' dans le mime
            $errors['photo'] = "Le fichier n'est pas une image";
        } else if (!in_array($fileExtension, $profiles_allowedExtensions)) { // On check si l'extension est bien autorisée
            $errors['photo'] = "Le format n'est pas autorisé";
        } else if ($_FILES['photo']["size"] > $profiles_sizeMax) { // On check si le fichier n'est pas trop lourd
            $errors['photo'] = "Le fichier est trop lourd";
        } else { // si tout est OK, on upload
            $userPhoto = uniqid() . '.' . $fileExtension;

            if ($_SESSION['user']['photo_participant'] != 'default.jpg') { // Si la photo n'est pas la photo par défaut, on la supprime
                unlink($profiles_directory . $_SESSION['user']['photo_participant']);
            }

            if (!move_uploaded_file($_FILES["photo"]["tmp_name"], $profiles_directory . $userPhoto)) { // On upload, dans le cas où ça ne fonctionne pas, on stocke une erreur
                $errors['photo'] = "Erreur lors de l'upload";
            }
        }
    }

    var_dump($errors);

    // Si il n'y a pas d'erreurs dans notre formulaire(via tableau d'erreurs), nous lançons la méthode create de la classe Utilisateur
    if (empty($errors)) {

        // On récupère toutes les variables de $_POST et nous les stockons dans des variables
        $lastname = $_POST['lastname'];
        $firstname = $_POST['firstname'];
        $pseudo = $_POST['pseudo'];
        $birthdate = $_POST['birthdate'];
        $email = $_POST['email'];
        $photo = $userPhoto ?? $_SESSION['user']['photo_participant']; // Si $userPhoto n'existe pas, on garde l'ancienne photo
        $idEnterprise = $_POST['enterprise'];
        $description = $_POST['description'];

        // On lance la méthode update de la classe Utilisateur
        Utilisateur::update($_SESSION['user']['id_utilisateur'], $lastname, $firstname, $pseudo, $birthdate, $email, $idEnterprise, $photo, $description);

        // On stocke un message de session pour afficher un message de succès
        // On créé un message de session pour afficher un message de succès
        $_SESSION['message'] = [
            'update' => 'success'
        ];

        // On change les valeurs de la session pour afficher les nouvelles valeurs
        $_SESSION['user'] = Utilisateur::getInfos($email);

        // On redirige l'utilisateur vers la page de profil
        header('Location: controller-profil.php');
    }
}
?>

<!-- Intégration de la vue signup dans le contrôleur signup -->
<?php include '../views/view-update.php'; ?>