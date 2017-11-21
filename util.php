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
		require_once $file;
	}

	// INDEX

	function getIntroFilm(){
        $dblink = new Mysql('db708477891.db.1and1.com','db708477891','dbo708477891','Fairytail21!');
        $query = "select f.id,titre,chemin from film f, film_has_photo fhp, photo p where f.id=fhp.id_film and fhp.id_photo=p.id and fhp.role='affiche'";
        return $res = $dblink->TabResSQL($query);
    }

    // FILM.PHP

	function getFilm($id){
		$dblink = new Mysql('db708477891.db.1and1.com','db708477891','dbo708477891','Fairytail21!');
		$query = "select * from film where id=$id";
		$res = $dblink->TabResSQL($query);
		$res[0]['dateSortie'] = formatDate($res[0]['dateSortie']);
		$res[0]['notation'] = number_format($res[0]['notation'],1);
		return $res[0];
	}

    function getPhotoFilm($id){
        $dblink = new Mysql('db708477891.db.1and1.com','db708477891','dbo708477891','Fairytail21!');
        $query = "select chemin, legende from photo p, film_has_photo f where p.id=f.id_photo and f.id_film=$id";
        return $dblink->TabResSQL($query);
    }

    function getParticipant($role,$idFilm){
        $dblink = new Mysql('db708477891.db.1and1.com','db708477891','dbo708477891','Fairytail21!');
        $query = "select prenom, nom, chemin, legende from personne p, film_has_personne fhp, personne_has_photo php, photo ph where p.id=fhp.id_personne and p.id=php.id_personne and php.id_photo=ph.id and role ='$role' and id_film=$idFilm";
        return $dblink->TabResSQL($query);
    }

	function getPersonne($role,$nom){
		$dblink = new Mysql('db708477891.db.1and1.com','db708477891','dbo708477891','Fairytail21!');
		$query = "select * from personne p join film_has_personne f on p.id=f.id_personne where p.nom='$nom' and f.role='$role'";
		$res = $dblink->TabResSQL($query);
		for ($i = 0; $i < count($res); ++$i) {
			$res[$i]['dateNaissance'] = formatDate($res[$i]['dateNaissance']);
		}
		return $res;
	}