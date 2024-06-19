<?php
session_start();

// Initialisation des variables
$intitule = '';
$raison_sociale = '';
$adresse = '';
$code_postal = '';
$competences = '';
$description = '';

// Traitement du formulaire soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupération des données du formulaire
    $raison_sociale = $_POST['raison'];
    $adresse = $_POST['localisation_alternance'];
    $code_postal = $_POST['postal_alterance'];
    $competences = $_POST['competence_alternance'];
    $description = $_POST['description_alternance'];

    // Validation des données (ajouter votre propre validation si nécessaire)

    // Création d'un tableau pour stocker l'offre d'alternance
    $nouvelle_offre = [
        'intitule' => $raison_sociale,
        'entreprise' => $raison_sociale,
        'adresse' => $adresse,
        'code_postal' => $code_postal,
        'competences' => $competences,
        'description' => $description
    ];

    // Ajout de l'offre d'alternance à la session
    if (!isset($_SESSION['offres_alternance'])) {
        $_SESSION['offres_alternance'] = [];
    }
    $_SESSION['offres_alternance'][] = $nouvelle_offre;

    // Message de succès (optionnel)
    $_SESSION['message'] = "L'offre d'alternance a été ajoutée avec succès.";

    // Redirection vers espace_entreprise.php après l'ajout
    header('Location: espace_entreprise.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une offre d'alternance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="view/assets/css/form_alternance.css">
</head>

<body>
    <div class="formulaire_alternance">
        <div class="container my-5">
            <h3><i class="fa-solid fa-briefcase"></i> Offre d'alternance</h3>
            <div class="card p-4">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="raison" class="form-label">Dénomination / Raison sociale</label>
                                <input type="text" name="raison" id="raison" placeholder="Nom de l'entreprise"
                                    class="form-control" value="<?php echo htmlspecialchars($raison_sociale); ?>">
                            </div>
                            <div class="mb-3">
                                <label for="localisation_alternance" class="form-label">Adresse</label>
                                <input type="text" name="localisation_alternance" id="localisation_alternance"
                                    placeholder="32 Rue Denis Blanc" class="form-control"
                                    value="<?php echo htmlspecialchars($adresse); ?>">
                            </div>
                            <div class="mb-3">
                                <label for="postal_alterance" class="form-label">Code postal</label>
                                <input type="text" name="postal_alterance" id="postal_alterance" placeholder="75000"
                                    class="form-control" minlength="5" maxlength="5" min="0" max="99999"
                                    value="<?php echo htmlspecialchars($code_postal); ?>"
                                    oninput="validatePostalCodeInput(this)">
                            </div>
                            <div class="mb-3">
                                <label for="competence_alternance" class="form-label">Compétence à avoir</label>
                                <input type="text" name="competence_alternance" id="competence_alternance"
                                    placeholder="JavaScript, PHP..." class="form-control"
                                    value="<?php echo htmlspecialchars($competences); ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="description_alternance" class="form-label">Description de
                                    l'alternance</label>
                                <textarea name="description_alternance" id="description_alternance"
                                    placeholder="Titre du poste, Missions, rythme, profil recherché..."
                                    class="form-control" maxlength="3000"
                                    rows="12"><?php echo htmlspecialchars($description); ?></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-custom">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz4fnFO9gyb3VSowFfS4pZ6GvR4CaWekG3tk5M4HcM1FfD1RbWw5yZDZj9"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+AM7Vg6hW9LVWN9F6rR9Gf2gA8PGA"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <script>
        // Fonction pour limiter l'entrée à 5 chiffres et empêcher les caractères non désirés
        function validatePostalCodeInput(element) {
            // Retirer les caractères non numériques
            element.value = element.value.replace(/[^0-9]/g, '');

            // Limiter à 5 caractères
            if (element.value.length > 5) {
                element.value = element.value.slice(0, 5);
            }
        }
    </script>
</body>

</html>