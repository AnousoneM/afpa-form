<!-- Intégration du head -->
<?php include '../views/templates/head.php'; ?>

<h1 class="my-4 text-center">CONNEXION</h1>

<form method="POST" action="" novalidate>

    <div class="row justify-content-center">
        <div class="col-6 p-4 border text-center">
            <div class="text-center">
                <label for="">Mail</label>
                <input type="text">
            </div>
            <div class="text-center">
                <label for="">Mot de passe</label>
                <input type="password">
            </div>
            <a class="d-block my-3 btn btn-success col-3 mx-auto" href="../controllers/controller-home.php">Se connecter</a>
            <a href="../controllers/controller-signup.php">S'inscrire</a>
        </div>
    </div>

</form>

<!-- Intégration du footer -->
<?php include '../views/templates/footer.php'; ?>