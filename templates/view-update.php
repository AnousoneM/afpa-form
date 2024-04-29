<!-- Intégration du head -->
<?php include 'components/head.php'; ?>

<!-- Import de la classe -->
<?php use app\models\Entreprise; ?>

<h2 class="text-center my-4">Update</h2>

<div class="shadow mx-auto col-lg-4 col-11 mb-4 p-lg-5 p-3 rounded bg-light">

        <!-- novalidate permet de mute les required -->
        <form action="" method="POST" enctype="multipart/form-data" novalidate>

        <div class="my-3">
            <label class="me-1 fw-bold" for="pseudo">Pseudo<i class="bi bi-pencil ms-2"></i></label>
            <span class="d-lg-inline d-none input-warning ms-2"><?= $errors['pseudo'] ?? '' ?></span>
            <input class="form-control <?= isset($errors['pseudo']) ? 'is-invalid' : '' ?> <?= isset($_POST['pseudo']) && !isset($errors['pseudo']) ? 'is-valid' : '' ?>" type="text" name="pseudo" id="pseudo" placeholder="ex. Roronoa76" value="<?= $_POST['pseudo'] ?? $_SESSION['user']['pseudo_participant'] ?>">

        </div>

        <img src="../assets/img/profiles/<?= $_SESSION['user']['photo_participant'] == NULL ? 'default.jpg' : $_SESSION['user']['photo_participant'] ?>" class="d-block rounded-circle col-3 border border-dark mx-auto" alt="Photo de Profil">

            <div class="my-3">
                <label class="me-1 fw-bold" for="photo">Photo de profil<i class="bi bi-pencil ms-2"></i></label>
                <span class="d-lg-inline d-none input-warning ms-2"><?= $errors['photo'] ?? '' ?></span>

                <input class="form-control" type="file" name="photo" id="photo">
            </div>

            <label class="me-1 fw-bold" for="enterprise">Entreprise<i class="bi bi-pencil ms-2"></i></label>
            <span class="d-lg-inline d-none input-warning ms-2"><?= $errors['enterprise'] ?? '' ?></span>
            <select class="form-control <?= isset($errors['enterprise']) ? 'is-invalid' : '' ?> <?= isset($_POST['enterprise']) && !isset($errors['enterprise']) ? 'is-valid' : '' ?>" name="enterprise" id="enterprise">
                <option value="" selected disabled>-- Veuillez sélectionner votre entreprise --</option>
                <?php foreach (Entreprise::getAllEnteprises() as $entreprise) { ?>
                    <option value="<?= $entreprise['id_entreprise'] ?>" <?= isset($_POST['enterprise']) && $_POST['enterprise'] == $entreprise['id_entreprise'] ? 'selected' : ($_SESSION['user']['id_entreprise'] == $entreprise['id_entreprise'] ? 'selected' : '' ) ?>><?= $entreprise['nom_entreprise'] ?></option>
                <?php } ?>
            </select>

            <div class="my-3">
                <label class="me-1 fw-bold" for="lastname">Nom<i class="bi bi-pencil ms-2"></i></label>
                <span class="d-lg-inline d-none input-warning ms-2"><?= $errors['lastname'] ?? '' ?></span>
                <!-- Je fais une value pour conserver les données du formulaire si erreur -->
                <input class="form-control <?= isset($errors['lastname']) ? 'is-invalid' : '' ?> <?= isset($_POST['lastname']) && !isset($errors['lastname']) ? 'is-valid' : '' ?>" type="text" name="lastname" id="lastname" placeholder="ex. DOE" value="<?= $_POST['lastname'] ?? $_SESSION['user']['nom_participant'] ?>">
                <!-- Message d'erreur si non OK -->

            </div>

            <div class="my-3">
                <label class="me-1 fw-bold" for="firstname">Prénom<i class="bi bi-pencil ms-2"></i></label>
                <span class="d-lg-inline d-none input-warning ms-2"><?= $errors['firstname'] ?? '' ?></span>
                <input class="form-control <?= isset($errors['lastname']) ? 'is-invalid' : '' ?> <?= isset($_POST['lastname']) && !isset($errors['lastname']) ? 'is-valid' : '' ?>" type="text" name="firstname" id="firstname" placeholder="ex. John" value="<?= $_POST['firstname'] ?? $_SESSION['user']['prenom_participant'] ?>">

            </div>

            <div class="my-3">
                <label class="me-1 fw-bold" for="birthdate">Date de naissance<i class="bi bi-pencil ms-2"></i></label>
                <span class="d-lg-inline d-none input-warning ms-2"><?= $errors['birthdate'] ?? '' ?></span>
                <input class="form-control <?= isset($errors['birthdate']) ? 'is-invalid' : '' ?> <?= isset($_POST['birthdate']) && !isset($errors['birthdate']) ? 'is-valid' : '' ?>" type="date" name="birthdate" id="birthdate" value="<?= $_POST['birthdate'] ?? $_SESSION['user']['naissance_participant'] ?>">

            </div>

            <div class="my-3">
                <label class="me-1 fw-bold" for="email">Courriel<i class="bi bi-pencil ms-2"></i></label>
                <span class="d-lg-inline d-none input-warning ms-2"><?= $errors['email'] ?? '' ?></span>
                <input class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?> <?= isset($_POST['email']) && !isset($errors['email']) ? 'is-valid' : '' ?>" type="email" name="email" id="email" placeholder="ex. mon-mail@mail.fr" value="<?= $_POST['email'] ?? $_SESSION['user']['mail_participant'] ?>">
            </div>

            <div class="my-3">
                <label class="me-1 fw-bold" for="floatingTextarea">Description<i class="bi bi-pencil ms-2"></i></label>
                <span class="d-lg-inline d-none input-warning ms-2"><?= $errors['description'] ?? '' ?></span>
                <textarea class="form-control <?= isset($_POST['description']) && !isset($errors['description']) ? 'is-valid' : '' ?>" placeholder="A propos" name="description" id="description"><?= $_POST['description'] ?? $_SESSION['user']['description_participant'] ?></textarea>
            </div>

            <button class="d-block col-lg-8 col-12 mx-auto mt-5 mb-1 btn btn-dark">Enregistrer modifications</button>
            <p class="text-center"><a class="d-block col-lg-8 col-12 mx-auto m-1 btn btn-secondary" href="../controllers/controller-profil.php">Annuler</a></p>

        </form>
  
</div>

<!-- Intégration du footer -->
<?php include 'components/footer.php'; ?>