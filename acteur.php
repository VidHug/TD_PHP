<?php

  require_once('util.php');

  $data = array();
  $data['infoFilm'] = getFilm();
  $data['infoActeur'] = getActeur($_GET['nom']);
  $data['photoActeurs'] = getPhotoPersonne('acteur');

  getBlock('begin.html');
  
  getBlock('head.php',$data);

  getBlock('contenu_acteur.php',$data);

  getBlock('end.html');