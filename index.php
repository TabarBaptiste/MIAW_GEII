<?php
$test = true;

if ($test) {
    $user['name'] = "VOLLE Nicolas";
    $user['role'] = "etudiant";
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
            <a class="navbar_link" href="index.php?page=departement">Département</a>
            <?php
            if (isset($user)) {
                switch ($user['role']) {
                    case 'etudiant':
                        // require_once("view/navbar/navbar_etudiant.php");
                        echo "
                        <a class=\"navbar_link\" href=\"index.php?page=espace_etudiant\">Mon espace étudiant</a>
                        ";
                        break;
                    case 'enseignant':
                        // require_once("view/navbar/navbar_enseignant.php");
                        echo "
                        <a class=\"navbar_link\" href=\"index.php?page=espace_enseignant\">Mon espace enseignant</a>
                        ";
                        break;
                    case 'entreprise':
                        // require_once("view/navbar/navbar_entreprise.php");
                        echo "
                        <a class=\"navbar_link\" href=\"index.php?page=espace_entreprise\">Mon espace entreprise</a>
                        ";
                        break;
                }
            }
            ?>
            <p class="navbar_link"><?= isset($user) ? $user['name'] : "NOM Prénom"; ?> <i
                    class="fas fa-chevron-down"></i></p>
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