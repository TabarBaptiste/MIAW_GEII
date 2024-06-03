<!-- TODO : connexion à la BDD pour récupérer les supports de cours -->
<h2>Supports de cours</h2>
<div id="accordion">
    <?php 
    if (isset($supports)) {
        foreach ($support as $supports) {
            echo '
                <div class="card">
                    <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        '.$support['matiere'].'
                        </button>
                    </h5>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                        '.$support['info'].'
                    </div>
                    </div>
                </div>
            ';
        }
    } else {
        echo '
            <div class="card">
                <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Matière #1
                    </button>
                </h5>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum eius saepe exercitationem voluptatum natus illo amet optio tempore fugit inventore laborum quo officiis deleniti quas accusantium, vel voluptas ex nam!
                </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Matière #2
                    </button>
                </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum eius saepe exercitationem voluptatum natus illo amet optio tempore fugit inventore laborum quo officiis deleniti quas accusantium, vel voluptas ex nam!
                </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingThree">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Matière #3
                    </button>
                </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum eius saepe exercitationem voluptatum natus illo amet optio tempore fugit inventore laborum quo officiis deleniti quas accusantium, vel voluptas ex nam!
                </div>
                </div>
            </div>
        ';
    }
    ?>
    
</div>