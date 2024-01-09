<!-- Intégration du head -->
<?php include '../views/templates/head.php'; ?>

<h1 class="text-center mt-5">INSCRIPTION</h1>

<div class="container my-5 col-4 px-5 py-4 shadow rounded bg-white">

    <?php if ($showform) { ?>

        <form action="" method="POST">
            <div class="my-3">
                <label for="">Nom</label>
                <input type="text" name="lastname" placeholder="ex. DOE">
                <!-- Message d'erreur si ko -->
                <span class="input-warning ms-2">Champ obligatoire</span>
            </div>

            <div class="my-3">
                <label for="">Prénom</label>
                <input type="text" name="firstname" placeholder="ex. John">
                <span class="input-warning ms-2">Champ obligatoire</span>
            </div>
            <div class="my-3">
                <label for="">Date de naissance</label>
                <input type="date" name="birthdate">
                <span class="input-warning ms-2">Champ obligatoire</span>
            </div>
            <div class="my-3">
                <label for="">Courriel</label>
                <input type="email" name="email" placeholder="ex. mon-mail@mail.fr">
                <span class="input-warning ms-2">Champ obligatoire</span>
            </div>
            <div class="my-3">
                <label for="">Mot de passe</label>
                <input type="password" name="password">
                <span class="input-warning ms-2">Champ obligatoire</span>
            </div>
            <div class="my-3">
                <label for="">Confirmation du mot de passe</label>
                <input type="password">
                <span class="input-warning ms-2">Champ obligatoire</span>
            </div>
            <div class="my-4">
                <input name="cgu" id="cgu" type="checkbox">
                <label for="cgu">J'accepte les CGU</label>
                <span class="input-warning ms-2">Champ obligatoire</span>
            </div>


            <button class="mt-3 btn btn-outline-secondary">S'enregistrer</button>

        </form>

    <?php } else { ?>

        <h2 class="text-center">Récapitulatifs des infos</h2>
        <ul>
            <li><b>Nom : </b><?= $_POST['lastname'] ?? '' ?></li>
            <li><b>Prénom : </b><?= $_POST['firstname'] ?? '' ?></li>
            <li><b>Date de naissance : </b><?= $_POST['birthdate'] ?? '' ?></li>
            <li><b>Courriel : </b><?= $_POST['email'] ?? '' ?></li>
            <li><b>Mot de passe : </b><?= $_POST['password'] ?? '' ?></li>
        </ul>

        <p class="fs-4 text-center">Un mail de confirmation vous a été envoyé, vous pouvez maintenant vous connecter</p>
        <a class="col-4 btn btn-secondary d-block mx-auto" href="../index.php">Connexion</a>

    <?php } ?>
</div>

<!-- Intégration du footer -->
<?php include '../views/templates/footer.php'; ?>