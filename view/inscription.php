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
            <div class="col-12">
                <h3 class="h3-inscription">Informations</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="raison_sociale" class="label-inscription">Raison Sociale</label>
                <div class="input-group mb-3">
                    <input type="text"
                           class="form-control"
                           placeholder="Ex : Capegemini"
                           name="raison_sociale"
                           required>
                </div>
            </div>
            <div class="col">
                <label for="siret" class="label-inscription">N° Siret</label>
                <div class="input-group mb-3">
                    <input type="text"
                           pattern="[0-9]{1,14}"
                           class="form-control"
                           minlength="14"
                           maxlength="14"
                           placeholder="Ex : 21863715317888"
                           name="siret"
                           required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h3 class="h3-inscription">Adresse</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-1">
                <label for="numero_voie" class="label-inscription">Numéro</label>
                <div class="input-group mb-3">
                    <input type="text"
                           class="form-control"
                           placeholder="Ex : 2"
                           name="numero_voie"
                           >
                </div>
            </div>
            <div class="col-1">
                <label for="indice_voie" class="label-inscription">Indice Voie</label>
                <div class="input-group mb-3">
                    <input type="text"
                           class="form-control"
                           placeholder="Ex : bis"
                           name="indice_voie">
                </div>
            </div>
            <div class="col-2">
                <label for="type_voie" class="label-inscription">Type de Voie</label>
                <div class="input-group mb-3">
                    <input type="text"
                           class="form-control"
                           placeholder="Ex : rue"
                           name="type_voie"
                           >
                </div>
            </div>
            <div class="col-4">
                <label for="libelle_voie" class="label-inscription">Libellé Voie</label>
                <div class="input-group mb-3">
                    <input type="text"
                           class="form-control"
                           placeholder="Ex : de la Paix"
                           name="libelle_voie"
                           required>
                </div>
            </div>
            <div class="col-2">
                <label for="ville" class="label-inscription">Ville</label>
                <div class="input-group mb-3">
                    <input type="text"
                           class="form-control"
                           placeholder="Ex : Paris"
                           name="ville"
                           required>
                </div>
            </div>
            <div class="col-2">
                <label for="departement" class="label-inscription">Département</label>
                <div class="input-group mb-3">
                    <input type="text"
                           class="form-control"
                           placeholder="Ex : 75001"
                           name="departement"
                           maxlength="5"
                           required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h3 class="h3-inscription">Identifiant</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="mail" class="label-inscription">Adresse mail</label>
                <div class="input-group mb-3">
                    <input type="email"
                           class="form-control"
                           placeholder="titi@capegemini.com"
                           name="mail"
                           required>
                </div>
            </div>
            <div class="col">
                <label for="mdp" class="label-inscription">Mot de passe</label>
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
                <label for="re_mail" class="label-inscription">Confirmation Mail</label>
                <div class="input-group mb-3">
                    <input type="email"
                           class="form-control"
                           placeholder="titi@capegemini.com"
                           name="re_mail"
                           required>
                </div>
            </div>
            <div class="col">
                <label for="re_mdp" class="label-inscription">Confirmation Mot de passe</label>
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
            <input type="submit" class="btn btn-primary col" value="S'inscrire" style="color: #FFF;"/>
        </div>
    </form>
</div>