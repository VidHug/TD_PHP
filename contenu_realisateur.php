<body>
  <?php getBlock('header.html'); ?>
  
	<h1>Réalisateur</h1>
  <section class="info_personne">
    <h2><?php
          $info = $data['infoRealisateur'];
          echo $info['prenom'] . ' ' . $info['nom'];
        ?></h2>
    <ol>
      <?php
          $info = $data['infoRealisateur'];
          echo '<li>Prenom : ' . $info['prenom'] . "</li>\n
          <li>Nom : " . $info['nom'] . "</li>\n";
      ?>
      <li>Date de naissance : <?php echo $data['infoRealisateur']['dateNaissance'] ?></li>
    </ol>
    <?php echo '<img src="' . $data['photoRealisateur']['chemin'] .  '" class="img_pers">' ?>
    <h3>Biographie</h3>
    <p><?php echo $data['infoRealisateur']['biographie'] ?></p>
    <h3>Filmographie</h3>
    <table>
      <tr>
        <td>Date</td><td>Film</td>
      </tr>
      <tr>
        <td>2004</td><td>L'armée des morts</td>
      </tr>
      <tr>
        <td>2007</td><td>300</td>
      </tr>
      <tr>
        <td>2009</td><td>Watchmen - Les gardiens</td>
      </tr>
      <tr>
        <td>2010</td><td>Le Royaume de Ga'hoole</td>
      </tr>
      <tr>
        <td>2011</td><td>Sucker Punsh</td>
      </tr>
      <tr>
        <td>2013</td><td>Man of Steel</td>
      </tr>
      <tr>
        <td>2016</td><td>Batman v Superman : L'Aube de la justice</td>
      </tr>
      <tr>
        <td>2017</td><td>Justice League</td>
      </tr>
      <tr>
        <td>2019</td><td>The Last Photograph</td>
      </tr>
    </table>
  </section>
  <?php getBlock('footer.html'); ?>
</body>