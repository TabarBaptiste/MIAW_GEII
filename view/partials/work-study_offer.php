<!-- TODO : connexion à la BDD pour récupérer les offres -->
<h2>Offres d'alternances</h2>
<div class="row">
    <?php 
        if (!(isset($workStudyOffers)) && $test == true) {
            echo '<div class="alert alert-primary text-center" role="alert">Valeurs de test</div>';
            $workStudyOffers['1']['title'] = "Developpeur Back-End";
            $workStudyOffers['1']['subtitle'] = "Alternance 12 mois";
            $workStudyOffers['1']['text'] = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi repellendus quis quibusdam at ad laudantium in eaque soluta sit consequatur";
            $workStudyOffers['2']['title'] = "Developpeur Front-End";
            $workStudyOffers['2']['subtitle'] = "Alternance 36 mois";
            $workStudyOffers['2']['text'] = "Lorem ipsum dolor sit amet consectetur adipisicing elit.";
            $workStudyOffers['3']['title'] = "Ingénieur réseau";
            $workStudyOffers['3']['subtitle'] = "Alternance 6 mois";
            $workStudyOffers['3']['text'] = "Lorem ipsum dolor sit amet consectetur adipisicing elit.";
        }
        foreach ($workStudyOffers as $workStudyOffer) {
            echo '
            <div class="col-xs-12 col-md-6 p-0">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">'.$workStudyOffer['title'].'</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">'.$workStudyOffer['subtitle'].'</h6>
                        <p class="card-text">'.$workStudyOffer['text'].'</p>
                        <a href="#" class="card-link">Je suis intéressé</a>
                    </div>
                </div>
            </div>
            ';
        }
    ?>
</div>