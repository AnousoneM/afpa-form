<?php

// regex du nom
$regexName = '/^[a-zA-Z]+$/';

var_dump($_POST);

// Je déclenche mes tests uniquement lors d'un POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // je créé un tablau d'erreurs vide
    $errors = [];

    // Verification du nom
    if (empty($_POST['lastname'])) {
        $errors['lastname'] = 'Veuillez saisir un nom';
    } elseif (!preg_match($regexName, $_POST['lastname'])) {
        $errors['lastname'] = 'Caractères non valides';
    }

    var_dump($errors);
}


?>



<!-- Intégration de la vue signup dans le contrôleur signup -->
<?php include '../views/view-signup.php'; ?>