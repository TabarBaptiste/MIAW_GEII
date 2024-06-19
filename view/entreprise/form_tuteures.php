<?php
session_start();

// Initialisation des variables
$nomProjet = '';
$domaine = '';
$competences = '';
$description = '';
$action = 'Ajouter';

// Vérifier si un projet est en cours de modification
if (isset($_GET['edit_id'])) {
    $edit_id = $_GET['edit_id'];
    if (!empty($_SESSION['projets'][$edit_id])) {
        $projet = $_SESSION['projets'][$edit_id];
        $nomProjet = $projet['nomProjet'];
        $domaine = $projet['domaine'];
        $competences = $projet['competences'];
        $description = $projet['description'];
        $action = 'Modifier';
    }
}

// Traitement du formulaire soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomProjet = $_POST['nomProjet'];
    $domaine = $_POST['domaine'];
    $competences = $_POST['competences'];
    $description = $_POST['description'];

    // Vérifier s'il s'agit d'une modification ou d'un ajout
    if (isset($_POST['projet_id'])) {
        $projet_id = $_POST['projet_id'];
        // Mettre à jour le projet existant
        $_SESSION['projets'][$projet_id] = [
            'nomProjet' => $nomProjet,
            'domaine' => $domaine,
            'competences' => $competences,
            'description' => $description,
            'document' => $_SESSION['projets'][$projet_id]['document'] // Garder le document inchangé
        ];
    } else {
        // Ajouter un nouveau projet
        $_SESSION['projets'][] = [
            'nomProjet' => $nomProjet,
            'domaine' => $domaine,
            'competences' => $competences,
            'description' => $description,
            'document' => null // Ajouter la gestion du document si nécessaire
        ];
    }

    // Redirection vers espace_entreprise.php après l'ajout/modification
    header('Location: espace_entreprise.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire projet tuteuré</title>
    <link rel="stylesheet" href="form_tuteures.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="navbar">
        <div>
            <a href="index.php">
                <img src="logo-medium.png" alt="logo Département Génie Electrique et Informatique Industrielle"
                    id="logo">
            </a>
        </div>
        <a class="navbar_link" href="index.php?page=departement">Département</a>
        <p class="navbar_link"><?= isset($user) ? $user['name'] : "NOM Prénom"; ?> <i
                class="fas fa-chevron-down"></i></p>
    </div>
    <div class="d-flex justify-content-center align-items-center mx-auto ">
        <div class="container mt-5 rounded-3 bg-white background-image">
            <div class="container mt-4 rounded-3 bg-white container-bg">
                <div class="row mx-auto">
                    <div class="col text-center">
                        <div class="d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-folder-open fa-4x me-3"></i>
                            <h1 class="mb-0">Projets tutorés</h1>
                        </div>
                    </div>
                </div>
                <form class="row mt-3" action="form_tuteures.php" method="post">
                    <input type="hidden" name="projet_id" value="<?= isset($edit_id) ? $edit_id : '' ?>">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="nomProjet" class="form-label">Nom du projet</label>
                                <input type="text" class="form-control" id="nomProjet" name="nomProjet"
                                    placeholder="Entrez le nom du projet" value="<?= $nomProjet ?>" required>
                            </div>

                            <div class="col-md-12">
                                <label for="domaine" class="form-label">Domaine</label>
                                <select class="form-select" id="domaine" name="domaine" required>
                                    <option value="">Sélectionnez un domaine</option>
                                    <option value="Informatique" <?= ($domaine == 'Informatique') ? 'selected' : '' ?>>
                                        Informatique</option>
                                    <option value="Sciences" <?= ($domaine == 'Sciences') ? 'selected' : '' ?>>
                                        Sciences</option>
                                    <option value="Humanités" <?= ($domaine == 'Humanités') ? 'selected' : '' ?>>
                                        Humanités</option>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label for="competences" class="form-label">Compétences à avoir</label>
                                <input type="text" class="form-control" id="competences" name="competences"
                                    placeholder="Entrez les compétences requises" value="<?= $competences ?>" required>
                            </div>

                            <div class="col-md-12">
                                <label for="document" class="form-label">Déposer un document .pdf/.docx</label>
                                <input type="file" class="form-control border-dashed" id="document" name="document"
                                    accept=".pdf,.docx">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12 order-md-last">
                                <label for="description" class="form-label">Description de l'offre</label>
                                <textarea class="form-control custom-textarea" id="description" name="description"
                                    rows="3" placeholder="Entrez la description" required><?= $description ?></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-3 d-grid p-3">
                        <button type="submit" class="btn btn-primary btn-block"><?= $action ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</body>

</html>
