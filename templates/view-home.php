<?php include 'components/head.php'; ?>

<div class="shadow my-5 py-5 col-lg-4 col-11 mx-auto rounded bg-light">

    <h1 class="mb-2 text-center"><?= $_SESSION['user']['pseudo_participant'] ?></h1>
    <img src="../assets/img/profiles/<?= $_SESSION['user']['photo_participant'] == NULL ? 'default.jpg' : $_SESSION['user']['photo_participant'] ?>" class="d-block rounded-circle col-3 border border-dark mx-auto" alt="Photo de Profil">
    <p class="my-2 text-center"><?= $date ?></p>

    <div class="border text-center py-3 fs-2">
        <span class="fs-1 fw-bold text-success">120 Km</span>
    </div>

    <div class="mt-2 justify-content-center">

        <a class="d-block btn btn-success my-1 col-lg-6 col-9 mx-auto" href="../controllers/controller-addRide.php">Ajouter un trajet</a>
        <a class="d-block btn btn-success my-1 col-lg-6 col-9 mx-auto" href="../controllers/controller-rides.php">Voir mes trajets</a>
        <a class="d-block btn btn-outline-success my-1 col-lg-6 col-9 mx-auto" href="../controllers/controller-profil.php">Mon profil</a>

        <a class="d-block btn btn-danger mt-4 col-lg-6 col-9 mx-auto" href="../controllers/controller-deconnection.php">Déconnexion</a>
    </div>
</div>

<!-- Intégration du footer -->
<?php include '../views/templates/footer.php'; ?>