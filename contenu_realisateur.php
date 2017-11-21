<body>
  <?php getBlock('header.php'); ?>
  
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
    <?php echo '<img src="' . $data['infoRealisateur']['chemin'] .  '" class="img_pers">' ?>
    <h3>Biographie</h3>
    <p><?php echo $data['infoRealisateur']['biographie'] ?></p>
    <h3>Filmographie</h3>
    <table>
      <?php
        foreach($data['filmographie'] as $film){
            echo '<tr>' . "\n";
            echo '<td><img src="' . $film['chemin'] . '"></td><td>' . $film['titre'] . '</td>' . "\n";
            echo '</tr>' . "\n";
        }
      ?>
    </table>
  </section>
  <?php getBlock('footer.html'); ?>
</body>