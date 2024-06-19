<?php 
    // recuperation de la date actuelle
    $date = getdate();
    // creation du nom du mois
    switch ($date['mon']) {
        case '1':
            $date['mois'] = "Janvier";
            break;
        case '2':
            $date['mois'] = "Février";
            break;
        case '3':
            $date['mois'] = "Mars";
            break;
        case '4':
            $date['mois'] = "Avril";
            break;
        case '5':
            $date['mois'] = "Mai";
            break;
        case '6':
            $date['mois'] = "Juin";
            break;
        case '7':
            $date['mois'] = "Juillet";
            break;
        case '8':
            $date['mois'] = "Août";
            break;
        case '9':
            $date['mois'] = "Septembre";
            break;
        case '10':
            $date['mois'] = "Octobre";
            break;
        case '11':
            $date['mois'] = "Novembre";
            break;
        case '12':
            $date['mois'] = "Décembre";
            break;
    }
    // recuperation du nombre de jours dans le mois
    $daysThisMonth = intval(date('t'));
    // recuperation du premier jour du mois pour construire le calendrier
    $firstDayThisMonth = intval(date("w", mktime(0, 0, 0, $date['mon'], 1, $date['year'])));

    // récupération de la classe si élève
    if (isset($user['classe']) && !isset($classe)) {
        $classe = $user['classe'];
    }
?>

<h2>Emploi du temps</h2>
<div class="calendar">
    <div class="month">
        <ul>
            <li><?= $date['mois']; ?><br><span style="font-size:18px"><?= $date['year']; ?></span></li>
        </ul>
    </div>
    
    <ul class="weekdays">
        <li>Lundi</li>
        <li>Mardi</li>
        <li>Mercredi</li>
        <li>Jeudi</li>
        <li>Vendredi</li>
        <li>Samedi</li>
        <li>Dimanche</li>
    </ul>
    
    <ul class="days">
        <?php 
        // Commencer le calendrier au premier jour du mois
        for ($i=1; $i < $firstDayThisMonth; $i++) { 
            echo '<li></li>';
        }
        // Boucle d'écriture du calendrier
        for ($dayNumber=1; $dayNumber <= $daysThisMonth; $dayNumber++) {
            echo '<li>';
            // Mettre en évidence le jour actuel
            if ($dayNumber == $date['mday']) {   
                echo '<span class="active">'.$dayNumber.'</span>';
            } else {
                echo $dayNumber;
            }
            echo '</li>';
        }
        ?>
    </ul>
    <?php 
        if ($test == true) {
            echo '<div class="alert alert-primary text-center" role="alert">Valeurs de test</div>';
            echo '<iframe src="view\assets\docs\edt\EDT-test.pdf" frameborder="0" height="500em" width="100%"></iframe>';
        } else {
            if (file_exists("view/assets/docs/edt/EDT-".$classe.".pdf")) {
                echo '<iframe src="view\assets\docs\edt\EDT-'.$classe.'.pdf" frameborder="0" height="500em" width="100%"></iframe>';
            } else {
                echo "Pas d'emploi du temps pour cette classe";
            }
        }
    ?>
</div>