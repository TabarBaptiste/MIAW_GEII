<head>
    <link rel="stylesheet" href="./assets/css/connexion.css">
</head>
<div class="connexion">
    <div class="container my-5">
        <h3><i class="fa-solid fa-user"></i> Se connecter</h3>
        <div class="card p-4">
            <form method="post" action="./controller/connexion.php">
                <div class="mb-3">
                    <label for="mail" class="form-label">Adresse e-mail</label>
                    <i class="fa-solid fa-envelope"></i><input type="text" name="mail" id="mail"
                        placeholder="adresse@mail.fr" class="form-control" required
                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
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