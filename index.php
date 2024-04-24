<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$page_title;?></title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script> -->
    <link rel="stylesheet" href="view/assets/css/accueil.css">
</head>
<div class="container">
    <div class="navbar">
        <div class="logo">
            <img src="view\assets\img\Logo-GEII\logo-medium.png"
                alt="logo Département Génie Electrique et Informatique Industrielle">
        </div>
        <div class="lien_navbar">
            <div class="departement_navbar">
                <p>Département</p>
            </div>
            <div class="intranet_navbar">
                <p>TABAR LABONNE Baptiste <i class="fas fa-chevron-down"></i></p>
            </div>
        </div>
    </div>
    <?php 
    // Séléction de la page à charger selon l'URL
    switch ($_GET['page']) {
        case 'connexion':
            require_once("view/connexion.php");
            break;
        case 'departement':
            require_once("view/departement.php");
            break;
        case 'espace_enseignant':
            require_once("view/espace_enseignant.php");
            break;
        case 'espace_entreprise':
            require_once("view/espace_entreprise.php");
            break;
        case 'espace_etudiant':
            require_once("view/espace_etudiant.php");
            break;
        case 'form_alternance':
            require_once("view/form_alternance.php");
            break;
        case 'form_tuteures':
            require_once("view/form_tuteures.php");
            break;
        case 'inscription':
            require_once("view/inscription.php");
            break;
        case 'licences':
            require_once("view/licences.php");
            break;
        default:
            require_once("view/accueil.html");
            break;
    }
    ?>
    </div>
    <footer>
        <p>Footer</p>
    </footer>
    </body>
</html>