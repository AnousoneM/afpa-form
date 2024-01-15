<!-- Intégration du head -->
<?php include '../views/templates/head.php'; ?>

<h1 class="text-center mt-5">INSCRIPTION</h1>

<div class="container my-5 col-8 px-5 py-4 shadow rounded bg-white">

    <form action="" method="POST" novalidate>
        <div class="my-3">
            <label class="me-1" for="lastname">Nom</label>
            <!-- Je fais une value pour conserver les données du formulaire si erreur -->
            <input type="text" name="lastname" id="lastname" placeholder="ex. DOE" value="<?= $_POST['lastname'] ?? '' ?>">
            <!-- Message d'erreur si non OK -->
            <span class="input-warning ms-2"><?= $errors['lastname'] ?? '' ?></span>
        </div>

        <div class="my-3">
            <label class="me-1 for="firstname">Prénom</label>
            <input type="text" name="firstname" id="firstname" placeholder="ex. John" value="<?= $_POST['firstname'] ?? '' ?>">
            <span class="input-warning ms-2"><?= $errors['firstname'] ?? '' ?></span>
        </div>

        <div class="my-3">
            <label class="me-1 for="pseudo">Pseudo</label>
            <input type="text" name="pseudo" id="pseudo" placeholder="ex. Roronoa76" value="<?= $_POST['pseudo'] ?? '' ?>">
            <span class="input-warning ms-2"><?= $errors['pseudo'] ?? '' ?></span>
        </div>

        <div class="my-3">
            <label class="me-1 for="birthdate">Date de naissance</label>
            <input type="date" name="birthdate" id="birthdate" value="<?= $_POST['birthdate'] ?? '' ?>">
            <span class="input-warning ms-2"><?= $errors['birthdate'] ?? '' ?></span>
        </div>

        <div class="my-3">
            <label class="me-1 for="">Courriel</label>
            <input type="email" name="email" id="email" placeholder="ex. mon-mail@mail.fr">
            <span class="input-warning ms-2"><?= $errors['email'] ?? '' ?></span>
        </div>

        <label class="me-1 for="enterprise">Entreprise</label>
        <select name="enterprise" id="enterprise">
            <option value="" selected disabled>-- Veuillez sélectionner votre entreprise --</option>
            <option value="1" <?= isset($_POST['enterprise']) && $_POST['enterprise'] == 1 ? 'selected' : '' ?> >Bad Company</option>
            <option value="2" <?= isset($_POST['enterprise']) && $_POST['enterprise'] == 2 ? 'selected' : '' ?> >Afpa</option>
        </select>
        <span class="input-warning ms-2"><?= $errors['enterprise'] ?? '' ?></span>

        <div class="my-3">
            <label class="me-1 for="password">Mot de passe</label>
            <input type="password" name="password" id="password">
            <span class="input-warning ms-2"><?= $errors['password'] ?? '' ?></span>
        </div>

        <div class="my-3">
            <label class="me-1 for="confirmPassword">Confirmation du mot de passe</label>
            <input type="password" name="confirmPassword" id="confirmPassword">
            <span class="input-warning ms-2"><?= $errors['confirmPassword'] ?? '' ?></span>
        </div>

        <div class="my-4">
            <input name="cgu" id="cgu" type="checkbox">
            <label class="me-1 for="cgu">J'accepte les CGU</label>
            <span class="input-warning ms-2"><?= $errors['cgu'] ?? '' ?></span>
        </div>

        <button class="mt-3 btn btn-outline-secondary">S'enregistrer</button>

    </form>

</div>

<!-- Intégration du footer -->
<?php include '../views/templates/footer.php'; ?>