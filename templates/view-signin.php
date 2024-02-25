<?php include '../views/templates/head.php'; ?>

<h2 class="my-4 text-center">Connexion</h2>

<form method="POST" action="" novalidate>

    <div class="row justify-content-center m-0 p-0">
        <div class="shadow col-lg-4 col-11 p-5 border bg-light rounded">

            <div>
                <div class="mb-3">
                    <label class="fw-bold" for="email">Courriel</label>
                    <span class="span-error"><?= $errors['email'] ?? '' ?></span>
                    <input class="d-block col-12" type="text" id="email" name="email" value="<?= $_POST['email'] ?? '' ?>">
                </div>
                <div class="mb-3">
                    <label class="fw-bold" for="password">Mot de passe</label>
                    <span class="span-error"><?= $errors['password'] ?? '' ?></span>
                    <input class="d-block col-12" type="password" id="password" name="password">
                </div>
            </div>
            <p class="text-danger text-center"><?= $errors['connexion'] ?? '' ?></p>
            <button class="d-block mt-4 mb-1 btn btn-success col-6 mx-auto">Se connecter</button>
            <p class="text-center"><a class="text-dark mx-auto" href="../controllers/controller-signup.php">Je m'inscris</a><p>

        </div>
    </div>

</form>

<!-- Intégration du footer -->
<?php include '../views/templates/footer.php'; ?>