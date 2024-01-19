<!-- Intégration du head -->
<?php include '../views/templates/head.php'; ?>

<div class="border border-secondary shadow pb-5 col-6 mx-auto">
    <h1 class="my-4 text-center">HI <?= $_SESSION['user']['pseudo_participant'] ?> !!</h1>

    <div>
        <button class="d-block btn btn-warning my-1 col-4 mx-auto">Ajout d'un Trajet</button>
        <button class="d-block btn btn-warning my-1 col-4 mx-auto">Historique de mes Trajets</button>
        <button class="d-block btn btn-warning text-white my-1 col-4 mx-auto">Mon profil</button>
        <button class="d-block btn btn-danger my-1 col-4 mx-auto">Déconnexion</button>
    </div>
</div>

<!-- Intégration du footer -->
<?php include '../views/templates/footer.php'; ?>