<body>
  <?php getBlock('header.php'); ?>
  
	<h1><?php
        $info = $data['infoPersonne'];
        echo $info['prenom'] . ' ' . $info['nom'];
        ?></h1>
  <section class="info_personne">
    <h2>Informations générales</h2>
    <ol>
      <?php
          $info = $data['infoPersonne'];
          echo '<li>Prenom : ' . $info['prenom'] . "</li>\n
          <li>Nom : " . $info['nom'] . "</li>\n";
      ?>
      <li>Date de naissance : <?php echo $data['infoPersonne']['dateNaissance'] ?></li>
    </ol>
    <?php echo '<img src="' . $data['infoPersonne']['chemin'] .  '" class="img_pers">' ?>
    <h3>Biographie</h3>
    <p><?php echo $data['infoPersonne']['biographie'] ?></p>
    <h3>Filmographie</h3>
    <table id="id_filmogrphie">
      <?php
        foreach($data['filmographie'] as $film){
            echo '<tr>' . "\n";
            echo '<td><a href="http://hugovidal.fr/td_film/film.php?id=' . $film['id'] . '"><img src="' . $film['chemin'] . '"></a></td>';
            echo '<td><a href="http://hugovidal.fr/td_film/film.php?id=' . $film['id'] . '">' . $film['titre'] . '</a></td>' . "\n";
            echo '</tr>' . "\n";
        }
      ?>
    </table>
  </section>
  <?php getBlock('footer.html'); ?>
</body>