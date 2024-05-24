<div class="container container-inscription text-center">
    <form method="post" action="./controller/inscription.php">
        <div class="row">
            <div class="col">
                <h3><i class="fa-solid fa-building icons-inscription"></i>Inscription Entreprise</h3>
            </div>
        </div>
        <?php if(isset($_COOKIE['alert_inscription'])) : ?>
        <div class="row">
            <div class="col">
                <div class="alert alert-danger" role="alert">
                    <?= $_COOKIE['alert_inscription']; ?>
                    <?php setcookie('alert_inscription', '', time()-3600, '/'); ?>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <?php if(isset($_COOKIE['alert_inscription_valid'])) : ?>
        <div class="row">
            <div class="col">
                <div class="alert alert-success" role="alert">
                    <?= $_COOKIE['alert_inscription_valid']; ?>
                    <?php setcookie('alert_inscription_valid', '', time()-3600, '/'); ?>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="row">
            <div class="col">
                <div class="input-group mb-3">
                    <input type="text"
                           class="form-control"
                           placeholder="Raison Sociale"
                           name="raison_sociale"
                           required>
                </div>
            </div>
            <div class="col">
                <div class="input-group mb-3">
                    <input type="text"
                           pattern="[0-9]{1,14}"
                           class="form-control"
                           minlength="14"
                           maxlength="14"
                           placeholder="N° Siret"
                           name="siret"
                           required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-1">
                <div class="input-group mb-3">
                    <input type="text"
                           class="form-control"
                           placeholder="Numéro voie"
                           name="numero_voie"
                           >
                </div>
            </div>
            <div class="col-1">
                <div class="input-group mb-3">
                    <input type="text"
                           class="form-control"
                           placeholder="indice voie"
                           name="indice_voie">
                </div>
            </div>
            <div class="col-2">
                <div class="input-group mb-3">
                    <input type="text"
                           class="form-control"
                           placeholder="Type de voie"
                           name="type_voie"
                           value="rue">
                </div>
            </div>
            <div class="col-4">
                <div class="input-group mb-3">
                    <input type="text"
                           class="form-control"
                           placeholder="Libellé voie"
                           name="libelle_voie"
                           required>
                </div>
            </div>
            <div class="col-2">
                <div class="input-group mb-3">
                    <input type="text"
                           class="form-control"
                           placeholder="Ville"
                           name="ville"
                           required>
                </div>
            </div>
            <div class="col-2">
                <div class="input-group mb-3">
                    <input type="text"
                           class="form-control"
                           placeholder="Département"
                           name="departement"
                           maxlength="5"
                           required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="input-group mb-3">
                    <input type="email"
                           class="form-control"
                           placeholder="Adresse mail"
                           name="mail"
                           required>
                </div>
            </div>
            <div class="col">
                <div class="input-group mb-3">
                    <input type="password"
                           class="form-control"
                           placeholder="Mot de passe"
                           name="mdp"
                           required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="input-group mb-3">
                    <input type="email"
                           class="form-control"
                           placeholder="Confirmation adresse mail"
                           name="re_mail"
                           required>
                </div>
            </div>
            <div class="col">
                <div class="input-group mb-3">
                    <input type="password"
                           class="form-control"
                           placeholder="Confirmation mot de passe"
                           name="re_mdp"
                           required>
                </div>
            </div>
        </div>
        <div class="row">
            <input type="submit" class="btn btn-primary col" value="S'inscrire"/>
        </div>
    </form>
</div>