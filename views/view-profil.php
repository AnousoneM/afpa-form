<?php include '../views/templates/head.php'; ?>

<div class="shadow my-5 py-5 col-lg-3 col-11 mx-auto rounded bg-light">

    <h1 class="mb-2 text-center"><?= $_SESSION['user']['pseudo_participant'] ?></h1>
    <img src="../assets/img/avatar.jpg" class="d-block rounded-circle col-3 border border-dark mx-auto" alt="Photo de Profil">

    <div class="mt-2 p-lg-3 p-1 justify-content-center">

        <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">Nom</div>
                    <?= $_SESSION['user']['nom_participant'] ?>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">Prénom</div>
                    <?= $_SESSION['user']['prenom_participant'] ?>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">Date de naissance</div>
                    <?= $_SESSION['user']['naissance_participant'] ?>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">Mail</div>
                    <?= $_SESSION['user']['mail_participant'] ?>
                </div>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">Descriptif</div>
                    <?= $_SESSION['user']['description_participant'] == NULL ? '<i>à compléter</i>' : '' ?>
                </div>
            </li>
        </ul>

        <a href="../controllers/controller-deconnection.php" class="d-block btn btn-danger my-1 mt-5 col-lg-6 col-9 mx-auto">Déconnexion</button>
        <a class="d-block btn btn-secondary my-1 col-lg-6 col-9 mx-auto" href="../controllers/controller-home.php">Home</a>
    </div>
</div>

<?php include '../views/templates/footer.php'; ?>