<?php
  
  require_once('util.php');

  $idFilm = $_GET['id'];
  checkURL($idFilm,'film');

  $data = array();
  $data['titrePage'] = getFilm($idFilm)['titre'];
  $data['infoFilm'] = getFilm($idFilm);
  $data['photoFilm'] = getPhotoFilm($idFilm);
  $data['infoRealisateur'] = getParticipant('realisateur',$idFilm)[0];
  $data['infoActeur'] = getParticipant('acteur',$idFilm);
  
  getBlock('begin.html');
  
  getBlock('head.php',$data);

  getBlock('contenu_film.php',$data);

  getBlock('end.php');