<body>
  <?php getBlock('header.html'); ?>

	<h1>Acteur</h1>

  <section>
  <nav id="menu_acteur">
  <?php
    $tab = $data['photoActeurs'];
    foreach($tab as $photo) {
      echo '<a href="acteur.php?nom=' . $photo['nom'] . '"><img src="' . $photo['chemin'] . '"><label>' . $photo['legende'] . '</label></a>' . "\n";
    }
    echo "\n";
  ?>
  </nav>

    <h2><?php
          $info = $data['infoActeur'];
          echo $info['prenom'] . ' ' . $info['nom'];
        ?></h2>
    <ol>
      <?php
          $info = $data['infoActeur'];
          echo '<li>Prenom : ' . $info['prenom'] . "</li>\n
          <li>Nom : " . $info['nom'] . "</li>\n";
      ?>
      <li>Date de naissance : <?php echo $data['infoActeur']['dateNaissance'] ?></li>
    </ol>
    <?php echo '<img src="' . $data['infoActeur']['chemin'] .  '" class="img_pers">' ?>
    <h3>Biographie</h3>
    <p><?php echo $data['infoActeur']['biographie'] ?></p>
  </section>

  <?php getBlock('footer.html'); ?>
</body>