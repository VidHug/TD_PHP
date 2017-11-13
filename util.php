<?php
	ini_set('error_reporting', -1);
	ini_set('display_errors', 'on');

	require_once('Mysql.php');

	// Mysql($server = 'localhost', $date_base = 'base', $id = 'root', $password = '');

	function formatDate($date){
		$mois = array('janvier','février','mars','avril','mai','juin','juillet','aout','septembre','octobre','novembre','decembre');
		$res = $date[8] . $date[9] . ' ';
		$num = '';
		if ($date[5] != '0'){
			$num .= $date[5];
		}
		$num .= $date[6];
		$res .= $mois[$num-1];
		$res .= ' ' . $date[0] . $date[1] . $date[2] . $date[3];
		return $res;
	}

	function getBlock($file,$data = []){
		require $file;
	}

	function getFilm(){
		$dblink = new Mysql('db708477891.db.1and1.com','db708477891','dbo708477891','Fairytail21!');
		$query = 'select * from film';
		$res = $dblink->TabResSQL($query);
		$res[0]['dateSortie'] = formatDate($res[0]['dateSortie']);
		return $res[0];
	}

	function getPersonne($role){
		$dblink = new Mysql('db708477891.db.1and1.com','db708477891','dbo708477891','Fairytail21!');
		$query = "select * from personne p join film_has_personne f on p.id=f.id_personne where f.role='$role'";
		$res = $dblink->TabResSQL($query);
		for ($i = 0; $i < count($res); ++$i) {
			$res[$i]['dateNaissance'] = formatDate($res[$i]['dateNaissance']);
		}
		return $res;
	}

	function getActeur($nom){
		$dblink = new Mysql('db708477891.db.1and1.com','db708477891','dbo708477891','Fairytail21!');
		$query = "select nom,prenom,dateNaissance,biographie,chemin,legende from personne p, film_has_personne f, personne_has_photo php, photo ph where php.id_personne=p.id and p.id=f.id_personne and ph.id=php.id_photo and role='acteur' and nom='$nom'";
		$res = $dblink->TabResSQL($query);
		for ($i = 0; $i < count($res); ++$i) {
			$res[$i]['dateNaissance'] = formatDate($res[$i]['dateNaissance']);
		}
		return $res[0];
	}

	function getPhotoFilm(){
		$dblink = new Mysql('db708477891.db.1and1.com','db708477891','dbo708477891','Fairytail21!');
		$query = "select chemin, legende from photo p, film_has_photo f where p.id=f.id_photo";
		return $dblink->TabResSQL($query);
	}

	function getPhotoPersonne($role){
		$dblink = new Mysql('db708477891.db.1and1.com','db708477891','dbo708477891','Fairytail21!');
		$query = "select nom,chemin, legende from photo p, personne_has_photo php, film_has_personne fhp, personne pr where fhp.role='$role' and fhp.id_personne=php.id_personne and php.id_photo=p.id and pr.id=php.id_personne";
		return $dblink->TabResSQL($query);
	}