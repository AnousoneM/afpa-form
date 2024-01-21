<?php include '../views/templates/head.php'; ?>

<div class="shadow mt-5 py-5 col-lg-3 col-11 mx-auto rounded bg-light">

    <h1 class="mb-2 text-center"><?= $_SESSION['user']['pseudo_participant'] ?></h1>
    <img src="../assets/img/avatar.jpg" class="d-block rounded-circle col-3 border border-dark mx-auto" alt="Photo de Profil">
    <p class="my-2 text-center"><?= $date ?></p>

    <div class="border text-center py-3 fs-2">
        <span class="fs-1 fw-bold text-success">120 Km</span>
    </div>

    <div class="mt-2 justify-content-center">
        <button class="d-block btn btn-success my-1 col-lg-6 col-9 mx-auto">Ajouter un trajet</button>
        <button class="d-block btn btn-success my-1 col-lg-6 col-9 mx-auto">Voir mes trajets</button>
        <a class="d-block btn btn-outline-success my-1 col-lg-6 col-9 mx-auto" href="../controllers/controller-profil.php">Mon profil</a>

        <button class="d-block btn btn-secondary mb-1 mt-2 col-lg-6 col-9 mx-auto">Paramètres</button>
    </div>
</div>

<?php include '../views/templates/footer.php'; ?>