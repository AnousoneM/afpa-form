<?php include '../views/templates/head.php'; ?>

<div class="shadow my-5 p-5 col-lg-4 col-11 mx-auto rounded bg-light">

    <!-- Messages sur les trajets -->
    <?php if (isset($_SESSION['message']['update']) && $_SESSION['message']['update'] == 'success') { ?>
        <div class="alert alert-primary" role="alert">
            Profil modifié !
        </div>
    <?php } ?>

    <!-- Supprime le message de session pour un affichage unique  -->
    <?php unset($_SESSION['message']); ?>

    <h1 class="mb-2 text-center"><?= $_SESSION['user']['pseudo_participant'] ?></h1>
    <img src="../assets/img/profiles/<?= $_SESSION['user']['photo_participant'] == NULL ? 'default.jpg' : $_SESSION['user']['photo_participant'] ?>" class="d-block rounded-circle col-3 border border-dark mx-auto" alt="Photo de Profil">

    <div class="mt-2 p-lg-3 p-1 justify-content-center">

        <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">Entreprise</div>
                    <?= $_SESSION['user']['nom_entreprise'] ?>
                </div>
            </li>
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
                    <div class="fw-bold">Description</div>
                    <?= $_SESSION['user']['description_participant'] == "NULL" ? '<i class="text-body-secondary">A remplir</i>' : $_SESSION['user']['description_participant'] ?>
                </div>
        </ul>
        </li>
        <a class="d-block btn btn-outline-secondary mt-4 col-lg-6 col-9 mx-auto" href="../controllers/controller-update.php">Modifier</a>
        <a class="d-block btn btn-secondary my-1 col-lg-6 col-9 mx-auto" href="../controllers/controller-home.php">Accueil</a>
        <button class="d-block btn btn-danger mt-3 col-lg-6 col-9 mx-auto" data-bs-toggle="modal" data-bs-target="#deleteModal">Supprimer</button>

         <!-- Modal de suppression du profil-->
         <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <b>Attention, vous êtes sur le point de supprimer votre profil. Cette action est irréversible.</b>
                    </div>
                    <div class="modal-footer bg-danger">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Annuler</button>

                        <form action="" method="POST">

                            <input type="hidden" name="id_trajet" value="<?= $_SESSION['user']['id_participant'] ?>">
                            <input type="submit" class="btn btn-danger btn-sm" name="delete" value="Effacer">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>
<script>
    const myModal = document.getElementById('myModal')
    const myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', () => {
        myInput.focus()
    })
</script>

<?php include '../views/templates/footer.php'; ?>