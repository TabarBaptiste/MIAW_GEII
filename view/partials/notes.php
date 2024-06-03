<!-- TODO : connexion à la BDD pour récupérer les notes -->
<h2>Notes</h2>
<table class="table table-striped table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Matière</th>
      <th scope="col">Note</th>
      <th scope="col">Commentaire</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      if (!(isset($notes)) && $test == true) {
        echo '<div class="alert alert-primary text-center" role="alert">Valeurs de test</div>';
        $notes['1']['date'] = "19/01/2024";
        $notes['1']['matiere'] = "Web";
        $notes['1']['note'] = "13";
        $notes['1']['commentaire'] = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Commodi repellendus quis quibusdam at ad laudantium in eaque soluta sit consequatur";
        $notes['2']['date'] = "23/01/2024";
        $notes['2']['matiere'] = "CMS";
        $notes['2']['note'] = "11";
        $notes['2']['commentaire'] = "Lorem ipsum dolor sit amet consectetur adipisicing elit.";
        $notes['3']['date'] = "30/01/2024";
        $notes['3']['matiere'] = "Projet tutoré";
        $notes['3']['note'] = "17";
        $notes['3']['commentaire'] = "Lorem ipsum dolor sit amet consectetur adipisicing elit.";
      }
      foreach ($notes as $note) {
          echo '
          <tr>
          <th scope="row">'.$note['date'].'</th>
          <td>'.$note['matiere'].'</td>
          <td>'.$note['note'].'</td>
          <td>'.$note['commentaire'].'</td>
          </tr>
          ';
      }
    ?>
    
  </tbody>
</table>