<?php

  require_once('util.php');

  function checkNomUrl($nom,$table){
      $listNom = getAllNom($table);
      foreach ($listNom as $real){
          if($real['nom'] == $nom){
              return;
          }
      }
      header('Location: http://hugovidal.fr/td_film/');
  }

  $nomP = $_GET['nom'];
  checkNomUrl($nomP,'personne');

  $data = array();
  $x = getPersonne($nomP)[0];
  $data['titrePage'] = $x['prenom'] . ' ' . $x['nom'];
  $data['infoPersonne'] = getPersonne($nomP)[0];
  $data['isRealisateur'] = isRealisateur($nomP);
  if($data['isRealisateur']){
      $favoris = getFavoris($nomP);
      foreach ($favoris as $nom => $nbfois) {
          $data['favoris'][$nom] = getPersonne($nom)[0];
      }
  }
  $data['filmographie'] = getFilmographie($nomP);

  getBlock('begin.html');

  getBlock('head.php',$data);

  getBlock('contenu_person.php',$data);

  getBlock('end.php');
