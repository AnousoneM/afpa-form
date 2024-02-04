<?php include '../views/templates/head.php'; ?>

<h2 class="text-center my-4">Mes trajets</h2>

<div class="shadow mb-4 p-5 col-lg-6 col-11 mx-auto rounded bg-light">

    <!-- Messages sur les trajets -->
    <?php if (isset($_SESSION['message']['add']) && $_SESSION['message']['add'] == 'success') { ?>
        <div class="alert alert-primary" role="alert">
            Trajet ajouté avec succès !
        </div>
    <?php } ?>

    <?php if (isset($_SESSION['message']['delete']) && $_SESSION['message']['delete'] == 'success') { ?>
        <div class="alert alert-danger" role="alert">
            Trajet supprimé avec succès !
        </div>
    <?php } ?>

    <!-- Supprime le message de session pour un affichage unique  -->
    <?php unset($_SESSION['message']); ?>

    <!-- Messages sur les trajets -->

    <table class="table table-sm table-striped text-center border">
        <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Distance</th>
                <th scope="col">Transport</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>

            <?php foreach (Trajet::getAllTrajets($_SESSION['user']['id_utilisateur']) as $ride) { ?>

                <tr class="align-middle">
                    <td><?= $ride['dateFr'] ?></td>
                    <td><?= $ride['distance_trajet'] ?>m</td>
                    <td><?= $ride['type_transport'] ?></td>
                    <td><button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal-<?= $ride['id_trajet'] ?>"><i class="fa-solid fa-trash"></i></button></td>
                </tr>

            <?php } ?>

        </tbody>
    </table>

    <?php foreach (Trajet::getAllTrajets($_SESSION['user']['id_utilisateur']) as $ride) { ?>
        <!-- Modal de suppression-->
        <div class="modal fade" id="deleteModal-<?= $ride['id_trajet'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <b>Effacer le trajet :</b> du <?= $ride['dateFr'] ?> de <?= $ride['distance_trajet'] ?>m
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Annuler</button>

                        <form action="" method="POST">

                            <input type="hidden" name="id_trajet" value="<?= $ride['id_trajet'] ?>">
                            <input type="submit" class="btn btn-danger btn-sm" name="delete" value="Effacer">

                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <div class="text-center">
        <a class="btn btn-secondary" href="../controllers/controller-home.php">Accueil</a>
        <a class="btn btn-success" href="../controllers/controller-addRide.php">Ajouter un trajet</a>
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