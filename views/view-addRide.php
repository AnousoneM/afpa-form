<!-- Intégration du head -->
<?php include '../views/templates/head.php'; ?>

<h2 class="text-center my-4">Ajouter un trajet</h2>

<div class="mx-auto col-lg-4 col-11 mb-4 p-lg-5 p-3 shadow rounded bg-light">


        <!-- novalidate permet de mute les required -->
        <form action="" method="POST" novalidate>

            <p class="fs-2 text-center text-success"><i class="fa-solid fa-house-chimney"></i><i class="ms-1 fa-solid fa-bicycle"></i><i class="ms-5 fa-solid fa-building"></i></p>

            <div class="my-3">
                <label class="me-1 fw-bold" for="dateTrajet">Date du trajet</label>
                <span class="d-lg-inline d-none input-warning ms-2"><?= $errors['dateTrajet'] ?? '' ?></span>
                <input class="form-control <?= isset($errors['dateTrajet']) ? 'is-invalid' : '' ?> <?= isset($_POST['dateTrajet']) && !isset($errors['dateTrajet']) ? 'is-valid' : '' ?>" type="date" name="dateTrajet" id="dateTrajet" value="<?= $_POST['dateTrajet'] ?? date("Y-m-d") ?>">

            </div>

            <label class="me-1 fw-bold" for="transport">Moyen de transport</label>
            <span class="d-lg-inline d-none input-warning ms-2"><?= $errors['transport'] ?? '' ?></span>
            <select class="form-control <?= isset($errors['transport']) ? 'is-invalid' : '' ?> <?= isset($_POST['transport']) && !isset($errors['transport']) ? 'is-valid' : '' ?>" name="transport" id="transport">
                <option value="" selected disabled >-- Veuillez sélectionner le transport --</option>
                <?php foreach (Transport::getAllTransports() as $transport) { ?>
                    <option value="<?= $transport['id_transport'] ?>" <?= isset($_POST['transport']) && $_POST['transport'] == $transport['id_transport'] ? 'selected' : '' ?> ><?= $transport['type_transport'] ?></option>
                <?php } ?>
            </select>

            <div class="my-3">
                <label class="me-1 fw-bold" for="distance">Distance parcourue (en m)</label>
                <span class="d-lg-inline d-none input-warning ms-2"><?= $errors['distance'] ?? '' ?></span>
                <input class="form-control <?= isset($errors['distance']) ? 'is-invalid' : '' ?> <?= isset($_POST['distance']) && !isset($errors['distance']) ? 'is-valid' : '' ?>" type="number" name="distance" id="distance" value="<?= $_POST['distance'] ?? '' ?>">
            </div>

            <div class="my-3">
                <label class="me-1 fw-bold" for="temps">Durée du parcours (en mins) </label>
                <span class="d-lg-inline d-none input-warning ms-2"><?= $errors['temps'] ?? '' ?></span>
                <input class="form-control <?= isset($errors['temps']) ? 'is-invalid' : '' ?> <?= isset($_POST['temps']) && !isset($errors['temps']) ? 'is-valid' : '' ?>" type="number" name="temps" id="temps" value="<?= $_POST['temps'] ?? '' ?>">
            </div>

            <button class="d-block mx-auto mt-3 mb-1 btn btn-dark col-5">Enregistrer</button>
            <a class="btn btn-secondary d-block mx-auto col-5" href="../controllers/controller-home.php" type="button" >Annuler</a>

        </form>
</div>

<!-- Intégration du footer -->
<?php include '../views/templates/footer.php'; ?>