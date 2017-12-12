<body>
  <?php getBlock('header.php'); ?>

  <h1><?php echo $data['infoFilm']['titre'] ?></h1>
	<section>
		<h2>Informations générales</h2>
  	<ol>
  		<li>Titre : <?php echo $data['infoFilm']['titre'] ?></li>
  		<li>Date de sortie : <?php echo $data['infoFilm']['dateSortie'] ?></li>
  		<li>Réalisateur : <?php
                          $info = $data['infoRealisateur'];
                          echo $info['prenom'] . ' ' . $info['nom'];
                        ?></li>
  		<li>Acteurs principaux :
  			<ol>
  				<?php
            $tab = $data['infoActeur'];
            foreach ($tab as $acteur) {
              echo '<li>' . $acteur['prenom'] . ' ' . $acteur['nom'] . '</li>';
            }
          ?>
  			</ol>
  		</li>
  		<li>Synopsis : <p><?php echo $data['infoFilm']['synopsis'] ?></p></li>
  		<li>Note : <?php echo $data['infoFilm']['notation'] ?>/5 <meter value="<?php echo $data['infoFilm']['notation'] ?>" min="0" max="5" ></meter></li>
  	</ol>
	</section>

	<section class="list_img_film">
		<h2>Quelques images du film</h2>
        <?php
          $tab = $data['photoFilm'];
          foreach ($tab as $image) {
            $largeur = getimagesize(__DIR__ . '/' . $image['chemin'])[0];
            $hauteur = getimagesize(__DIR__ . '/' . $image['chemin'])[1];
            if ($largeur < ($hauteur * 1.4)){
              $class = 'img_verticale';
            } else {
              $class = 'img_horizontale';
            }
            echo '<img src="' . $image['chemin'] . '" class="' . $class . '"><label>' . $image['legende'] . '</label>' . "\n";
          }
        ?>
	</section>

	<section id="infoRea" class="info_rea">
		<h2>Aperçu du réalisateur</h2>
    <?php
      $image = $data['infoRealisateur'];
      echo '<a href="person.php?nom=' . $image['nom'] . '"><img src="' . $image['chemin'] . '"><label>' . $image['legende'] . '</label></a>' . "\n";
    ?>
	</section>

	<section id="infoAct" class="list_act">
		<h2>Aperçu des acteurs</h2>
    <?php
      $tab = $data['infoActeur'];
      foreach ($tab as $image) {
        echo '<a href="person.php?nom=' . $image['nom'] . '"><img src="' . $image['chemin'] . '" class="img_pers"><label>' . $image['legende'] . '</label></a>' . "\n";
      }
    ?>
        <a href="#header"><img id="fleche" src="image/fleche.png" style="display: none;"></a>

        <h2 id="titreFAQ">La foire aux questions !</h2>
        <dl id="faq">
            <?php for ($i=1; $i <=10 ; ++$i) { ?>
                <dl>
                    <dt>Question <?php echo $i; ?></dt>
                    <dd>
                        <dl>
                            <dt>réponse 1 partie 1</dt>
                            <dd>détail 1</dd>
                            <dt>réponse 1 partie 2</dt>
                            <dd>détail 2</dd>
                        </dl>
                    </dd>
                </dl>
            <?php } ?>
	</section>

  <?php getBlock('footer.html'); ?>
</body>
