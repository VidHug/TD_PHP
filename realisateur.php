<?php

  require_once('util.php');

  $nomP = $_GET['nom'];

  $data = array();
  $x = getPersonne($nomP)[0];
  $data['titrePage'] = $x['prenom'] . ' ' . $x['nom'];
  $data['infoRealisateur'] = getPersonne($nomP)[0];
  $data['filmographie'] = getFilmographie($nomP);

  getBlock('begin.html');
  
  getBlock('head.php',$data);

  getBlock('contenu_realisateur.php',$data);

  getBlock('end.html');
