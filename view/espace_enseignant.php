<?php if(!isset($classes) && $test == true) $classes = array('CM2','CE1') ; ?>
<h1 class="h1"><?= $page_title = "Mon espace enseignant" ?></h1>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-xs-12 col-md-8">
        <h2>Mes classes</h2>
    </div>
    <div class="col-md-2"></div>
    <div class="col-md-2"></div>
    <div class="col-xs-12 col-md-8">
        <?php foreach ($classes as $classe) : ?>
                <div class="accordion-item">
                    <h3 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#<?=$classe?>" aria-expanded="false" aria-controls="<?=$classe?>">
                            <?=$classe?>
                        </button>
                    </h3>
                    <div id="<?=$classe?>" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <div class="col-md-2"></div>
                            <div class="col-xs-12 col-md-8">
                                <!-- Connexion à la BDD pour récupérer et afficher les évènements des élèves dans un calendrier -->
                                <?php require("view/partials/calendar.php"); ?>
                                <!-- Possibilité d'ajouter des documents de cours -->
                                <form method="post" enctype="multipart/form-data" class="row g-3">
                                    <div class="col-auto">
                                        <label class="form-label">Ajouter un emploi du temps : </label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="file" class="form-control" name="edt"/>
                                    </div>
                                    <div class="col-auto">
                                        <input type="submit" class="btn btn-primary mb-3"/>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-2"></div>
                            <div class="col-xs-12 col-md-8">
                                <!-- Connexion à la BDD pour récupérer et afficher les note des élèves des classes de l'enseignant -->
                                <?php require("view/partials/notes.php"); ?>
                            </div>
                            <div class="col-md-2"></div>
                            <div class="col-md-2"></div>
                            <div class="col-xs-12 col-md-8">
                                <!-- Connexion à la BDD pour récupérer et afficher les supports de cours -->
                                <?php require("view/partials/course_materials.php"); ?>
                                <!-- Possibilité d'ajouter des documents de cours -->
                                <form method="post" enctype="multipart/form-data" class="row g-3">
                                    <div class="col-auto">
                                    <label class="form-label">Ajouter un support de cours : </label>
                                    </div>
                                    <div class="col-auto">
                                        <input type="file" class="form-control" name="course_material"/>
                                    </div>
                                    <div class="col-auto">
                                        <input type="submit" class="btn btn-primary mb-3"/>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-2"></div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="col-md-2"></div>
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