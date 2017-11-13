<?php require_once('util.php'); ?>

<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
  	<title><?php echo getFilm()['titre'] ?></title>
  	<link rel="stylesheet" href="watchmen.css">
  	<link rel="icon" href="image/logo.png" />
  </head>

  <body>
  	<header>
  		<a href="realisateur.php">Réalisateur</a>
  		<a href="acteurs.php?nom=Crudup">Acteurs</a>
  	</header>

    <h1><?php echo getFilm()['titre'] ?></h1>
  	<section>
  		<h2>Informations générales</h2>
	  	<ol>
	  		<li>Titre : <?php echo getFilm()['titre'] ?></li>
	  		<li>Date de sortie : <?php echo getFilm()['dateSortie'] ?></li>
	  		<li>Réalisateur : <?php
                            $info = getPersonne('realisateur')[0]; 
                            echo $info['prenom'] . ' ' . $info['nom'];
                          ?></li>
	  		<li>Acteurs principaux : 
	  			<ol>
	  				<?php
              $tab = getPersonne('acteur');
              foreach ($tab as $acteur) { 
                echo '<li>' . $acteur['prenom'] . ' ' . $acteur['nom'] . '</li>';
              }
            ?>
	  			</ol>
	  		</li>
	  		<li>Synopsis : <p><?php echo getFilm()['synopsis'] ?></p></li>
	  		<li>Note : <?php echo getFilm()['notation'] ?>/5</li>
	  	</ol>
  	</section>

  	<section class="list_img_film">
  		<h2>Quelques images du film</h2>
      <?php
        $tab = getPhotoFilm();
        foreach ($tab as $image) {
          if (getimagesize($image['chemin'])[0] < getimagesize($image['chemin'])[1]){
            $class = 'img_verticale';
          } else {
            $class = 'img_horizontale';
          }
          echo '<img src="' . $image['chemin'] . '" class="' . $class . '"><label>' . $image['legende'] . '</label>' . "\n";
        }
      ?>
  	</section>

  	<section class="info_rea">
  		<h2>Apperçu du réalisateur</h2>
      <?php
        $tab = getPhotoPersonne('realisateur');
        foreach ($tab as $image) {
          echo '<a href="realisateur.php"><img src="' . $image['chemin'] . '"></a><label>' . $image['legende'] . '</label>' . "\n";
        }
      ?>
  	</section>

  	<section class="list_act">
  		<h2>Apperçu des acteurs</h2>
      <?php
        $tab = getPhotoPersonne('acteur');
        foreach ($tab as $image) {
          echo '<a href="acteur.php?nom=' . $image['nom'] . '"><img src="' . $image['chemin'] . '" class="img_pers"></a><label>' . $image['legende'] . '</label>' . "\n";
        }
      ?>
  	</section>

  	<footer>Site créé par Hugo Vidal</footer>
  </body>
</html>