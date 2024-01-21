<!-- Intégration du head -->
<?php include '../views/templates/head.php'; ?>

<h2 class="text-center my-4">Inscription</h2>

<div class="mx-auto col-lg-4 col-11 mb-4 p-lg-5 p-3 shadow rounded bg-light">

    <!-- permet de cacher le formulaire lors de la validation -->
    <?php if ($showForm) { ?>

        <!-- novalidate permet de mute les required -->
        <form action="" method="POST" novalidate>

            <p class="fs-2 text-center text-success"><i class="fa-solid fa-house-chimney"></i><i class="ms-1 fa-solid fa-bicycle"></i><i class="ms-5 fa-solid fa-building"></i></p>

            <label class="me-1 fw-bold" for="enterprise">Entreprise</label>
            <span class="input-warning ms-2"><?= $errors['enterprise'] ?? '' ?></span>
            <select class="form-control <?= isset($errors['enterprise']) ? 'is-invalid' : '' ?> <?= isset($_POST['enterprise']) && !isset($errors['enterprise']) ? 'is-valid' : '' ?>" name="enterprise" id="enterprise">
                <option value="" selected disabled>-- Veuillez sélectionner votre entreprise --</option>
                <option value="1" <?= isset($_POST['enterprise']) && $_POST['enterprise'] == 1 ? 'selected' : '' ?>>Bad Company</option>
                <option value="2" <?= isset($_POST['enterprise']) && $_POST['enterprise'] == 2 ? 'selected' : '' ?>>Afpa</option>
            </select>

            <div class="my-3">
                <label class="me-1 fw-bold" for="lastname">Nom</label>
                <span class="input-warning ms-2"><?= $errors['lastname'] ?? '' ?></span>
                <!-- Je fais une value pour conserver les données du formulaire si erreur -->
                <input class="form-control <?= isset($errors['lastname']) ? 'is-invalid' : '' ?> <?= isset($_POST['lastname']) && !isset($errors['lastname']) ? 'is-valid' : '' ?>" type="text" name="lastname" id="lastname" placeholder="ex. DOE" value="<?= $_POST['lastname'] ?? '' ?>">
                <!-- Message d'erreur si non OK -->

            </div>

            <div class="my-3">
                <label class="me-1 fw-bold" for="firstname">Prénom</label>
                <span class="input-warning ms-2"><?= $errors['firstname'] ?? '' ?></span>
                <input class="form-control <?= isset($errors['lastname']) ? 'is-invalid' : '' ?> <?= isset($_POST['lastname']) && !isset($errors['lastname']) ? 'is-valid' : '' ?>" type="text" name="firstname" id="firstname" placeholder="ex. John" value="<?= $_POST['firstname'] ?? '' ?>">

            </div>

            <div class="my-3">
                <label class="me-1 fw-bold" for="pseudo">Pseudo</label>
                <span class="input-warning ms-2"><?= $errors['pseudo'] ?? '' ?></span>
                <input class="form-control <?= isset($errors['pseudo']) ? 'is-invalid' : '' ?> <?= isset($_POST['pseudo']) && !isset($errors['pseudo']) ? 'is-valid' : '' ?>" type="text" name="pseudo" id="pseudo" placeholder="ex. Roronoa76" value="<?= $_POST['pseudo'] ?? '' ?>">

            </div>

            <div class="my-3">
                <label class="me-1 fw-bold" for="birthdate">Date de naissance</label>
                <span class="input-warning ms-2"><?= $errors['birthdate'] ?? '' ?></span>
                <input class="form-control <?= isset($errors['birthdate']) ? 'is-invalid' : '' ?> <?= isset($_POST['birthdate']) && !isset($errors['birthdate']) ? 'is-valid' : '' ?>" type="date" name="birthdate" id="birthdate" value="<?= $_POST['birthdate'] ?? '' ?>">

            </div>

            <div class="my-3">
                <label class="me-1 fw-bold" for="email">Courriel</label>
                <span class=" input-warning ms-2"><?= $errors['email'] ?? '' ?></span>
                <input class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?> <?= isset($_POST['email']) && !isset($errors['email']) ? 'is-valid' : '' ?>" type="email" name="email" id="email" placeholder="ex. mon-mail@mail.fr" value="<?= $_POST['email'] ?? '' ?>">
            </div>

            <div class="my-3">
                <label class="me-1 fw-bold" for="password">Mot de passe</label>
                <span class="input-warning ms-2"><?= $errors['password'] ?? '' ?></span>
                <input class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?> <?= isset($_POST['password']) && !isset($errors['password']) ? 'is-valid' : '' ?>" type="password" name="password" id="password">
            </div>

            <div class="my-3">
                <label class="me-1 fw-bold" for="confirmPassword">Confirmation du mot de passe</label>
                <span class="input-warning ms-2"><?= $errors['confirmPassword'] ?? '' ?></span>
                <input class="form-control <?= isset($errors['confirmPassword']) ? 'is-invalid' : '' ?> <?= isset($_POST['confirmPassword']) && !isset($errors['confirmPassword']) ? 'is-valid' : '' ?>" type="password" name="confirmPassword" id="confirmPassword">
            </div>

            <div class="my-4">
                <input name="cgu" id="cgu" type="checkbox">
                <label class="me-1 fw-bold" for="cgu">J'accepte les CGU</label>
                <span class="input-warning ms-2"><?= $errors['cgu'] ?? '' ?></span>
            </div>

            <button class="d-block mx-auto mt-3 mb-1 btn btn-dark">S'enregistrer</button>
            <p class="text-center"><a class="text-dark" href="../controllers/controller-signin.php">J'ai déjà un compte</a></p>

        </form>
    <?php } else { ?>

        <h2 class="text-center">BRAVO</h2>
        <p class="text-center">Votre inscription a bien été prise en compte</p>
        <a class="d-block btn btn-dark text-center" href="../controllers/controller-signin.php">Connexion</a>

    <?php } ?>
</div>

<!-- Intégration du footer -->
<?php include '../views/templates/footer.php'; ?>