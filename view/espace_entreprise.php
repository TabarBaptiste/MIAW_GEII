<?php
session_start();

// Suppression d'un projet tutoré
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['delete_projet_id'])) {
        $delete_projet_id = $_POST['delete_projet_id'];

        // Vérifier si le projet existe dans la session
        if (isset($_SESSION['projets'][$delete_projet_id])) {
            // Supprimer le projet
            unset($_SESSION['projets'][$delete_projet_id]);

            // Réindexer le tableau pour éviter les clés manquantes
            $_SESSION['projets'] = array_values($_SESSION['projets']);
        }
    }

    // Suppression d'une offre d'alternance
    if (isset($_POST['delete_offre_id'])) {
        $delete_offre_id = $_POST['delete_offre_id'];

        // Vérifier si l'offre existe dans la session
        if (isset($_SESSION['offres_alternance'][$delete_offre_id])) {
            // Supprimer l'offre
            unset($_SESSION['offres_alternance'][$delete_offre_id]);

            // Réindexer le tableau pour éviter les clés manquantes
            $_SESSION['offres_alternance'] = array_values($_SESSION['offres_alternance']);
        }
    }

    // Redirection après la suppression (après avoir traité toutes les suppressions)
    header('Location: espace_entreprise.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <title>Espace Entreprise</title>
    <style>
        .content-container {
            display: flex;
            justify-content: space-between;
        }
        .content-item {
            width: 48%;
        }
        .btn-custom {
            background-color: #015291;
            color: #fff;
        }
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #015291;
            padding: 10px 15px;
            border-radius: 5px;
        }
        .header-container h1 {
            margin: 0;
            color: #fff;
        }
        .title {
            border-bottom: 2px solid #015291;
            padding-bottom: 5px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container-fluid mt-3">
        <div class="header-container">
            <h1 class="h1"><?= $page_title = "Mon espace entreprise" ?></h1>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="menuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-bars"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="menuButton">
                    <li>
                        <button class="dropdown-item" type="button">
                            <i class="fa-solid fa-sign-out-alt fa-1x me-3"></i> Se déconnecter
                        </button>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <i class="fa-solid fa-user fa-1x me-3"></i> Profil Entreprise
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row content-container">
                <div class="col-md-6 content-item">
                    <div class="row">
                        <h3 class="title">Projets Tuteurés</h3>
                        <a class="btn btn-custom mb-2" href="index.php?page=form_tuteures">Ajouter un projet tuteuré</a>
                    </div>
                    <?php
                    if (!empty($_SESSION['projets'])) {
                        foreach ($_SESSION['projets'] as $projet_id => $projet) {
                            echo "
            <div class='card mb-4 shadow-sm' style='width: 18rem;'>
                <div class='card-body'>
                    <h5 class='card-title'>{$projet['nomProjet']}</h5>
                    <h6 class='card-subtitle mb-2 text-muted'>{$projet['domaine']}</h6>
                    <p class='card-text'>{$projet['competences']}</p>
                    <p class='card-text'>{$projet['description']}</p>
                    <form action='espace_entreprise.php' method='post'>
                        <input type='hidden' name='delete_projet_id' value='{$projet_id}'>
                        <button type='submit' class='btn btn-danger btn-sm'>Supprimer</button>
                        <a href='form_tuteures.php?edit_id={$projet_id}' class='btn btn-primary btn-sm'>Modifier</a>

                    </form>
                </div>
            </div>";
                        }
                    } else {
                        echo "<p>Aucun projet tutoré disponible pour le moment.</p>";
                    }
                    ?>
                </div>
                <div class="col-md-6 content-item">
                    <div class="row">
                        <h3 class="title">Offres d'alternance</h3>
                        <a class="btn btn-custom mb-2" href="index.php?page=form_alternance">Ajouter une offre d'alternance</a>
                    </div>
                    <?php
                    if (!empty($_SESSION['offres_alternance'])) {
                        foreach ($_SESSION['offres_alternance'] as $offre_id => $offre) {
                            echo "
                        <div class='card mb-4 shadow-sm' style='width: 18rem;'>
                            <div class='card-body'>
                                <h5 class='card-title'>{$offre['intitule']}</h5>
                                <h6 class='card-subtitle mb-2 text-muted'>{$offre['entreprise']}</h6>
                                <p class='card-text'>{$offre['description']}</p>
                                <form action='espace_entreprise.php' method='post'>
                                    <input type='hidden' name='delete_offre_id' value='{$offre_id}'>
                                    <button type='submit' class='btn btn-danger btn-sm'>Supprimer</button>
                                </form>
                                <a href='form_alternance.php?edit_id={$offre_id}' class='btn btn-primary btn-sm'>Modifier</a>
                            </div>
                        </div>";
                        }
                    } else {
                        echo "<p>Aucune offre d'alternance disponible pour le moment.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gyb3VSowFfS4pZ6GvR4CaWekG3tk5M4HcM1FfD1RbWw5yZDZj9" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+AM7Vg6hW9LVWN9F6rR9Gf2gA8PGA" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
