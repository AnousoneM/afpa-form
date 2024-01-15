<?php

require_once '../config.php';

var_dump($_POST);

// regex du nom
$regexName = '/^[a-zA-Z]+$/';
$regexPseudo = '/^[a-zA-Z_\-\d]+$/';


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
    }

    // Vérification du mail
    if (empty($_POST['email'])) {
        $errors['email'] = 'Veuillez saisir un courriel';
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'mail non valide';
    }

    // Vérification de la date de naissance
    if (empty($_POST['birthdate'])) {
        $errors['birthdate'] = 'Veuillez saisir une date de naissance';
    }

    // Vérification du select de l'entreprise
    if (!isset($_POST['enterprise'])) {
        $errors['enterprise'] = 'Veuillez selectionner une entreprise';
    }

    // Vérification de la case des CGU
    if (!isset($_POST['cgu'])) {
        $errors['cgu'] = 'Veuillez valider les CGU';
    }

    // Vérification du password 
    if (empty($_POST['password'])) {
        $errors['password'] = 'Veuillez saisir un mot de passe';
    }

    // Vérification du password 
    if (empty($_POST['confirmPassword'])) {
        $errors['confirmPassword'] = 'Veuillez valider votre mot de passe';
    } else if (!empty($_POST['password'])) {
        if ($_POST['password'] !== $_POST['confirmPassword']) {
            $errors['confirmPassword'] = 'Les mots de passe ne sont pas identique';
        }
    }

    // Si il n'y a pas d'erreurs dans notre formulaire, nous inscrire l'utilisateur
    if (empty($errors)) {

        try {

            // Création d'un objet $db selon la classe PDO
            $db = new PDO("mysql:host=localhost;dbname=" . DBNAME, DBUSERNAME, DBPASSWORD);

            // stockage de ma requete dans une variable
            $sql = "INSERT INTO `utilisateur` (`nom_participant`,`prenom_participant`, `pseudo_participant`, `naissance_participant`, `mail_participant`, `mdp_participant`, `id_entreprise`, `valide_participant` ) VALUES (:lastname, :firstname, :pseudo, :birthdate, :email, :mdp_participant, :id_enterprise, :valide_participant);";

            // je prepare ma requête pour éviter les injections SQL
            $query = $db->prepare($sql);

            // on recupère les valeurs des post et nous appliquons un HTMLSPECIALCHARS
            $lastname = htmlspecialchars($_POST['lastname']);
            $firstname = htmlspecialchars($_POST['firstname']);
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $birthdate = $_POST['birthdate'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $id_enterprise = $_POST['enterprise'];
            
            // on relie les valeurs à nos marqueurs nominatifs à l'aide d'un bindValue
            $query->bindValue(':lastname', $lastname, PDO::PARAM_STR);
            $query->bindValue(':firstname', $firstname, PDO::PARAM_STR);
            $query->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
            $query->bindValue(':birthdate', $birthdate, PDO::PARAM_STR);
            $query->bindValue(':email', $email, PDO::PARAM_STR);
            $query->bindValue(':mdp_participant', $password, PDO::PARAM_STR);
            $query->bindValue(':id_enterprise', $id_enterprise, PDO::PARAM_STR);
            $query->bindValue(':valide_participant', 1, PDO::PARAM_INT);

            // on execute la requête
            $query->execute();

        } catch (PDOException $e) {
            echo 'Erreur : ' . $e->getMessage();
            die();
        }
    }
}

?>



<!-- Intégration de la vue signup dans le contrôleur signup -->
<?php include '../views/view-signup.php'; ?>