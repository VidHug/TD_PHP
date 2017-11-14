<body>
  <?php getBlock('header.html'); ?>

	<h1>Acteur</h1>

  <section>
  <nav id="menu_acteur">
    <table>
    <?php
      $tab = $data['photoActeurs'];
      echo "<tr>\n";
      foreach($tab as $photo) {
        echo '<td><a href="acteur.php?nom=' . $photo['nom'] . '"><img src="' . $photo['chemin'] . '"></a></td>' . "\n";
      }
      echo "</tr>\n";
      echo "<tr>\n";
      foreach($tab as $photo) {
        echo '<td><a href="acteur.php?nom=' . $photo['nom'] . '"><label>' . $photo['legende'] . '</label></a></td>' . "\n";
      }
      echo "</tr>\n";
    ?>
    </table>
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