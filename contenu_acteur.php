<body>
  <?php getBlock('header.html'); ?>

	<h1>Acteur</h1>
  <section>
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