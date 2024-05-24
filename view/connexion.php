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
    <link rel="stylesheet" href="./assets/css/connexion.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="./assets/img/Logo-GEII/logo-medium.png">
</head>

<body>
    <div class="formulaire_alternance">
        <div class="container my-5">
            <h3><i class="fa-solid fa-user"></i> Se connecter</h3>
            <div class="card p-4">
                <form>
                    <div class="mb-3">
                        <label for="mail" class="form-label">Adresse e-mail</label>
                        <i class="fa-solid fa-envelope"></i><input type="text" name="mail" id="mail"
                            placeholder="adresse@mail.fr" class="form-control" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                    </div>
                    <div class="mb-3">
                        <label for="motdepasse" class="form-label">Mot de passe</label>
                        <i class="fa-solid fa-lock"></i><input type="password" name="motdepasse" id="motdepasse"
                            placeholder="****************" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-custom">Se connecter</button>
                    <div class="bas">
                        <a href="mdp_oublier.php">Mot de passe oublié ?</a>
                        <p>Se souvenir de moi<input type="checkbox" name="souvenir" id="souvenir"></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<footer>

</footer>

</html>