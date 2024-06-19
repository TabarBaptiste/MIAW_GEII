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
                </div>
                <div class="col-md-6 content-item">
                    <div class="row">
                        <h3 class="title">Offres d'alternance</h3>
                        <a class="btn btn-custom mb-2" href="index.php?page=form_alternance">Ajouter une offre d'alternance</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gyb3VSowFfS4pZ6GvR4CaWekG3tk5M4HcM1FfD1RbWw5yZDZj9" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+AM7Vg6hW9LVWN9F6rR9Gf2gA8PGA" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
