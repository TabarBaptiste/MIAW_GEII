<!-- TODO : connexion à la BDD pour récupérer les offres -->
<h2>Projets tutorés</h2>
<div class="row">
    <?php 
        if (!(isset($tutoredOffers)) && $test == true) {
            echo '<div class="alert alert-primary text-center" role="alert">Valeurs de test</div>';
            $tutoredOffers['1']['title'] = "Developpeur Full-Stack";
            $tutoredOffers['1']['subtitle'] = "Projet tutoré 1 mois";
            $tutoredOffers['1']['text'] = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi repellendus quis quibusdam at ad laudantium in eaque soluta sit consequatur";
            $tutoredOffers['2']['title'] = "Developpeur Front-End";
            $tutoredOffers['2']['subtitle'] = "Projet tutoré 6 mois";
            $tutoredOffers['2']['text'] = "Lorem ipsum dolor sit amet consectetur adipisicing elit.";
        }
        foreach ($tutoredOffers as $tutoredOffer) {
            echo '
            <div class="col-xs-12 col-md-6 p-0">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">'.$tutoredOffer['title'].'</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">'.$tutoredOffer['subtitle'].'</h6>
                        <p class="card-text">'.$tutoredOffer['text'].'</p>
                        <a href="#" class="card-link">Je suis intéressé</a>
                    </div>
                </div>
            </div>
            ';
        }
    ?>
</div>