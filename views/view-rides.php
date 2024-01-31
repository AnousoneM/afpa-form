<?php include '../views/templates/head.php'; ?>

<h2 class="text-center my-4">Mes trajets</h2>

<div class="shadow mb-4 py-5 px-5 col-lg-6 col-11 mx-auto rounded bg-light">

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
                    <td><button class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button></td>
                </tr>

            <?php } ?>

        </tbody>
    </table>

    <div class="text-center">
        <a class="btn btn-outline-secondary" href="../controllers/controller-home.php">Home</a>
        <a class="btn btn-success" href="../controllers/controller-addRide.php">Ajouter un trajet</a>
    </div>

</div>


<?php include '../views/templates/footer.php'; ?>