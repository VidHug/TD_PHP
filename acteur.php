<?php require_once('util.php'); ?>

<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
  	<title><?php echo getFilm()['titre'] ?></title>
  	<!-- <link rel="stylesheet" href="watchmen.css"> -->
  	<link rel="icon" href="image/logo.png" />
  </head>

  <body>
  	<h1>Acteur</h1>
    <section>
      <h2><?php
            $info = getActeur($_GET['nom']);
            echo $info['prenom'] . ' ' . $info['nom'];
          ?></h2>
      <ol>
        <?php
            $info = getActeur($_GET['nom']);
            echo '<li>Prenom : ' . $info['prenom'] . "</li>\n
            <li>Nom : " . $info['nom'] . "</li>\n";
        ?>
        <li>Date de naissance : <?php echo getActeur($_GET['nom'])['dateNaissance'] ?></li>
      </ol>
      <?php echo '<img src="' . getActeur($_GET['nom'])['chemin'] .  '" class="img_pers">' ?>
      <h3>Biographie</h3>
      <p><?php echo getActeur($_GET['nom'])['biographie'] ?></p>
    </section>
  </body>
</html>
