<h1 class="h1"><?= $page_title = "Mon espace entreprise" ?></h1>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-xs-12 col-md-8">
        <!-- Connexion à la BDD pour récupérer et afficher les projets tutorés disponibles -->
        <?php require_once("view/partials/tutored_projects.php"); ?>
    </div>
    <div class="col-md-2"></div>
    <div class="col-md-2"></div>
    <div class="col-xs-12 col-md-8">
        <!-- Connexion à la BDD pour récupérer et afficher les offres d'alternance -->
        <?php require_once("view/partials/work-study_offer.php"); ?>
    </div>
    <div class="col-md-2"></div>
</div>