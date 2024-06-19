<?php
$test = true;

if ($test) {
    $user['name'] = "VOLLE Nicolas";
    $user['role'] = "etudiant";
    $user['classe'] = "LP-MIAW";
}

session_start();

if (isset($_FILES)) {
    require_once("controller\uploadFiles.php");
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($_POST['page_title']) ? $_POST['page_title'] : "Accueil | GEII"; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
    <script src="https://kit.fontawesome.com/760e84e32f.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="view/assets/css/style.css">
    <link rel="shortcut icon" href="view\assets\img\Logo-GEII\logo-medium.png" type="image/x-icon">
</head>
<div class="container-fluid">
    <div class="header">
        <div class="navbar">
            <div>
                <a href="index.php">
                    <img src="view\assets\img\Logo-GEII\logo-medium.png"
                        alt="logo Département Génie Electrique et Informatique Industrielle" id="logo">
                </a>
            </div>
            <nav>
                <ul>
                    <li><a class="navbar_link" href="index.php?page=departement">Département</a></li>
                    <?php
                    if (isset($_SESSION['role'])) {
                        switch ($_SESSION['role']) {
                            case 'etudiant':
                                // require_once("view/navbar/navbar_etudiant.php");
                                echo "
                                <li><a class=\"navbar_link\" href=\"index.php?page=espace_etudiant\">Mon espace étudiant</a></li>
                                ";
                                break;
                            case 'enseignant':
                                // require_once("view/navbar/navbar_enseignant.php");
                                echo "
                                <li><a class=\"navbar_link\" href=\"index.php?page=espace_enseignant\">Mon espace enseignant</a></li>
                                ";
                                break;
                            case 'entreprise':
                                // require_once("view/navbar/navbar_entreprise.php");
                                echo "
                                <li><a class=\"navbar_link\" href=\"index.php?page=espace_entreprise\">Mon espace entreprise</a></li>
                                ";
                                break;
                        }
                    }
                    ?>
                    <?php if(isset($_SESSION['nom'])): ?>
                        <li class="deroulant">
                            <?= $_SESSION['nom'].' '.$_SESSION['prenom']; ?>
                            <i class="fas fa-chevron-down"></i>
                            <ul class="sous">
                                <li><a href="index.php?page=deconnexion">Se déconnecter</a></li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li><a href="index.php?page=connexion">Se connecter</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>
    <div class="content">
        <?php
        // Sélection de la page à charger selon l'URL
        if (!isset($_GET['page'])) {
            require_once ("view/accueil.html");
        } else {
            switch ($_GET['page']) {
                case 'connexion':
                    require_once ("view/connexion.php");
                    break;
                case 'departement':
                    $_POST['page_title'] = "Departement";
                    require_once ("view/departement.php");
                    break;
                case 'espace_enseignant':
                    require_once ("view/espace_enseignant.php");
                    break;
                case 'espace_entreprise':
                    require_once ("view/espace_entreprise.php");
                    break;
                case 'espace_etudiant':
                    require_once ("view/espace_etudiant.php");
                    break;
                case 'form_alternance':
                    require_once ("view/form_alternance.php");
                    break;
                case 'form_tuteures':
                    require_once ("view/form_tuteures.php");
                    break;
                case 'inscription':
                    require_once ("view/inscription.php");
                    break;
                case 'licences':
                    require_once ("view/licences.php");
                    break;
                case 'deconnexion':
                    require_once ("controller/deconnexion.php");
                    break;
                default:
                    require_once ("view/accueil.html");
                    break;
            }
        }
        ?>
    </div>
</div>
<footer>
    <?php require_once ("view/footer.php"); ?>
</footer>

</html>