<!-- TODO : connexion à la BDD pour récupérer les offres -->
<h2>Offres d'alternances</h2>
<div class="row">
    <?php 
        if (isset($offers)) {    
            foreach ($offers as $offer) {
                echo '
                <div class="col-xs-12 col-md-6">
                    <div class="offer_card">
                        ';
                        foreach ($offer as $info_offer) {
                            echo '<p>'.$info_offer.'</p>';
                        }
                echo '</div>
                </div>
                ';
            }
        } else {
            echo '
            <p> Valeurs de test </p>
            <div class="col-xs-12 col-md-6">
                <div class="offer_card">
                    <p>Offre 1</p>
                </div>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="offer_card">
                    <p>Offre 1</p>
                </div>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="offer_card">
                    <p>Offre 1</p>
                </div>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="offer_card">
                    <p>Offre 1</p>
                </div>
            </div>
            ';
        }
    ?>
</div>