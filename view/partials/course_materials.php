<!-- TODO : connexion à la BDD pour récupérer les supports de cours -->
<h2>Supports de cours</h2>
<div class="accordion" id="accordionCourseMaterials">
    <?php 
        if (!(isset($supports)) && $test == true) {
            echo '<div class="alert alert-primary text-center" role="alert">Valeurs de test</div>';
            $supports['1']['id'] = "web";
            $supports['1']['matiere'] = "Web";
            $supports['1']['info'] = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi repellendus quis quibusdam at ad laudantium in eaque soluta sit consequatur";
            $supports['2']['id'] = "cms";
            $supports['2']['matiere'] = "CMS";
            $supports['2']['info'] = "Lorem ipsum dolor sit amet consectetur adipisicing elit.";
            $supports['3']['id'] = "pt";
            $supports['3']['matiere'] = "Projet tutoré";
            $supports['3']['info'] = "Lorem ipsum dolor sit amet consectetur adipisicing elit.";
        }
        foreach ($supports as $support) {
            echo '
            <div class="accordion-item">
            <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#'.$support['id'].'" aria-expanded="false" aria-controls="'.$support['id'].'">
            '.$support['matiere'].'
            </button>
            </h2>
            <div id="'.$support['id'].'" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
            <div class="accordion-body">
            '.$support['info'].'
            </div>
            </div>
            ';
        }
    ?>
    
</div>