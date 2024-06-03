<?php 
$date = getdate();
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
$daysThisMonth = intval(date('t'));
$firstDayThisMonth = intval(date("w", mktime(0, 0, 0, $date['mon'], 1, $date['year'])));
?>

<h2>Emploi du temps</h2>
<div class="calendar">
    <div class="month">
        <ul>
            <li class="prev">&#10094;</li>
            <li class="next">&#10095;</li>
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
</div>