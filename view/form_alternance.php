<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($page_title) ? $page_title : "Accueil | GEII"; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
    <script src="https://kit.fontawesome.com/45e38e596f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/css/form_alternance_test.css">
</head>

<body>
    <div class="formulaire_alternance">
        <div class="container my-5">
            <h3><i class="fa-solid fa-bag-shopping"></i> Offre d'alternance</h3>
            <div class="card p-4">
                <form>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="raison" class="form-label">Dénomination / Raison sociale</label>
                                <input type="text" name="raison" id="raison" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="localisation_alternance" class="form-label">Adresse</label>
                                <input type="text" name="localisation_alternance" id="localisation_alternance"
                                    placeholder="32 Rue Denis Blanc" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="postal_alterance" class="form-label">Code postal</label>
                                <input type="number" name="postal_alterance" id="postal_alterance" placeholder="75000"
                                    class="form-control" minlength="5" maxlength="5">
                            </div>
                            <div class="mb-3">
                                <label for="competence_alternance" class="form-label">Compétence à avoir</label>
                                <input type="text" name="competence_alternance" id="competence_alternance"
                                    placeholder="JavaScript, PHP..." class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="description_alternance" class="form-label">Description de
                                    l'alternance</label>
                                <textarea name="description_alternance" id="description_alternance" placeholder="Titre du poste, Missions, rythme, profil recherché" class="form-control"
                                    rows="12"></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-custom">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</body>
<footer>

</footer>

</html>