<!-- TODO : connexion à la BDD pour récupérer les notes -->
<h2>Notes</h2>
<table class="table table-striped">
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
    if (isset($notes)) {    
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
    } else {
        echo '
        <p> Valeurs de test </p>
        <tr>
          <th scope="row">19/01/2024</th>
          <td>Français</td>
          <td>12</td>
          <td>Bonne rédaction, attention aux fautes! Peut-être s\'entraîner à la maison.</td>
        </tr>
        <tr>
          <th scope="row">20/01/2024</th>
          <td>Maths</td>
          <td>13</td>
          <td>Bon travail</td>
        </tr>
        ';
    }
    ?>
    
  </tbody>
</table>