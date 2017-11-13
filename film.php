<?php
  
  require_once('util.php');

  $data = array();
  $data['infoFilm'] = getFilm();
  $data['infoRealisateur'] = getPersonne('realisateur')[0];
  $data['infoActeur'] = getPersonne('acteur');
  $data['photoFilm'] = getPhotoFilm();
  $data['photoRealisateur'] = getPhotoPersonne('realisateur');
  $data['photoActeurs'] = getPhotoPersonne('acteur');
  
  getBlock('begin.html');
  
  getBlock('head.php',$data);

  getBlock('contenu_film.php',$data);

  getBlock('end.html');