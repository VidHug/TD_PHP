<?php

  require_once('util.php');

  $data = array();
  $data['infoFilm'] = getFilm();
  $data['infoRealisateur'] = getPersonne('realisateur')[0];
  $data['photoRealisateur'] = getPhotoPersonne('realisateur')[0];

  getBlock('begin.html');
  
  getBlock('head.php',$data);

  getBlock('contenu_realisateur.php',$data);

  getBlock('end.html');
