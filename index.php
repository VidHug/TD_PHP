<?php

    require_once('util.php');

    $data = array();
    $data['infoFilm']['titre'] = 'Hugo Ciné';
    $data['films'] = getIntroFilm();

    getBlock('begin.html');

    getBlock('head.php',$data);

    getBlock('contenu_index.php',$data);

    getBlock('end.html');