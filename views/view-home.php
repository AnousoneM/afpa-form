<!-- Intégration du head -->
<?php var_dump($_SERVER["DOCUMENT_ROOT"]) ?>

<?php include '../views/templates/head.php'; ?>

<div class="border border-secondary shadow pb-5 col-6 mx-auto">
    <?php date_default_timezone_set('Europe/Paris'); ?>
    <p class="h2 text-center"><?= date('j D Y') ?></p>
    <img src="../assets/img/avatar.jpg" class="d-block rounded-circle col-3 border border-dark mx-auto" alt="Photo de Profil">
    <h1 class="mb-4 text-center"><?= $_SESSION['user']['pseudo_participant'] ?></h1>

    <div>
        <button class="d-block btn btn-warning my-1 col-4 mx-auto">Ajout d'un Trajet</button>
        <button class="d-block btn btn-warning my-1 col-4 mx-auto">Historique de mes Trajets</button>
        <button class="d-block btn btn-warning text-white my-1 col-4 mx-auto">Mon profil</button>
        <button class="d-block btn btn-danger my-1 col-4 mx-auto">Déconnexion</button>
    </div>
</div>

<!-- Intégration du footer -->
<?php include '../views/templates/footer.php'; ?>