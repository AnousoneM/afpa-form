<?php
session_start();

// supprime toutes les variables de session
session_unset();

// détruit la session
session_destroy();

// Redirection vers la page de connexion
header('Location: ../index.php');
exit();