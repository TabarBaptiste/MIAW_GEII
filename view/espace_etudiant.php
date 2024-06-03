<h1 class="h1"><?=$page_title = "Mon espace étudiant" ?></h1>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-xs-12 col-md-8">
        <!-- Connexion à la BDD pour récupérer et afficher les évènements de l'élève dans un calendrier -->
        <?php require_once("view/partials/calendar.php"); ?>
    </div>
    <div class="col-md-2"></div>
    <hr/>
    <div class="col-md-2"></div>
    <div class="col-xs-12 col-md-8">
        <!-- Connexion à la BDD pour récupérer et afficher les note de l'élève connecté -->
        <?php require_once("view/partials/notes.php"); ?>
    </div>
    <div class="col-md-2"></div>
    <hr/>
    <div class="col-md-2"></div>
    <div class="col-xs-12 col-md-8">
        <!-- Connexion à la BDD pour récupérer et afficher les projets tutorés disponibles -->
        <?php require_once("view/partials/tutored_projects.php"); ?>
    </div>
    <div class="col-md-2"></div>
    <hr/>
    <div class="col-md-2"></div>
    <div class="col-xs-12 col-md-8">
        <!-- Connexion à la BDD pour récupérer et afficher les offres d'alternance -->
        <?php require_once("view/partials/work-study_offer.php"); ?>
    </div>
    <div class="col-md-2"></div>
    <hr/>
    <div class="col-md-2"></div>
    <div class="col-xs-12 col-md-8">
        <!-- Connexion à la BDD pour récupérer et afficher les projets tutorés disponibles -->
        <?php require_once("view/partials/course_materials.php"); ?>
    </div>
    <div class="col-md-2"></div>
</div>