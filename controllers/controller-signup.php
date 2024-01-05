<?php

// ici la logique de la page signup


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $showform = false;
} else {
    $showform = true;
}

?>



<!-- Intégration de la vue signup dans le contrôleur signup -->
<?php include '../views/view-signup.php'; ?>