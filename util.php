<?php
	ini_set('error_reporting', -1);
	ini_set('display_errors', 'on');

	require_once('Mysql.php');

	// Mysql($server = 'localhost', $date_base = 'base', $id = 'root', $password = '');
	// select id, prenom, nom, count(id_film) nbfilm from film_has_personne join personne on id=id_personne where role='acteur' group by id_personne

    function checkURL($id,$table){
        $listIds = getAllIds($table);
        foreach ($listIds as $real){
            if($real['id'] == $id){
                return;
            }
        }
        header('Location: http://hugovidal.fr/td_film/');
    }

    function getAllIds($table){
        $dblink = new Mysql('db708477891.db.1and1.com','db708477891','dbo708477891','Fairytail21!');
        $query = "select id from " . $table;
        return $dblink->TabResSQL($query);
    }

    function getAllNom($table){
        $dblink = new Mysql('db708477891.db.1and1.com','db708477891','dbo708477891','Fairytail21!');
        $query = "select nom from " . $table;
        return $dblink->TabResSQL($query);
    }

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
        $query = "select f.id,titre,chemin from film f, film_has_photo fhp, photo p where f.id=fhp.id_film and fhp.id_photo=p.id and fhp.role='affiche' order by titre";
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
        $query = "select chemin, legende, role from photo p, film_has_photo f where p.id=f.id_photo and f.id_film=$id order by role";
        return $dblink->TabResSQL($query);
    }

    function getParticipant($role,$idFilm){
        $dblink = new Mysql('db708477891.db.1and1.com','db708477891','dbo708477891','Fairytail21!');
        $query = "select prenom, nom, chemin, legende from personne p, film_has_personne fhp, personne_has_photo php, photo ph where p.id=fhp.id_personne and p.id=php.id_personne and php.id_photo=ph.id and role ='$role' and id_film=$idFilm order by prenom";
        return $dblink->TabResSQL($query);
    }

	function getPersonne($nom){
		$dblink = new Mysql('db708477891.db.1and1.com','db708477891','dbo708477891','Fairytail21!');
		$query = "select prenom, nom, dateNaissance, biographie, chemin from personne pr, personne_has_photo php, photo p where pr.id=php.id_personne and php.id_photo=p.id and nom='$nom'";
		$res = $dblink->TabResSQL($query);
		for ($i = 0; $i < count($res); ++$i) {
			$res[$i]['dateNaissance'] = formatDate($res[$i]['dateNaissance']);
		}
		return $res;
	}

	function getFilmographie($nom){
        $dblink = new Mysql('db708477891.db.1and1.com','db708477891','dbo708477891','Fairytail21!');
        $query = "select f.id, chemin, titre from photo p, film_has_photo fhp, film f, film_has_personne fhr, personne pr where pr.id=fhr.id_personne and fhr.id_film=f.id and f.id=fhp.id_film and fhp.id_photo=p.id and pr.nom='$nom' and fhp.role='affiche' order by titre";
        return $dblink->TabResSQL($query);
    }

	function getMostPresentActor(){
		$dblink = new Mysql('db708477891.db.1and1.com','db708477891','dbo708477891','Fairytail21!');
		$query1 = "select id_personne, count(id_film) nbfilm from film_has_personne where role='acteur' group by id_personne order by nbfilm desc";
		$nbMaxFilm = $dblink->TabResSQL($query1)[0][nbfilm];
		$query2 = "select id_personne, count(id_film) nbfilm from film_has_personne where role='acteur' group by id_personne having nbfilm=$nbMaxFilm";
		return $dblink->TabResSQL($query2);
	}

	function getFavoris($nom){
		$dblink = new Mysql('db708477891.db.1and1.com','db708477891','dbo708477891','Fairytail21!');
		$query = "select id_film from film_has_personne fhp, personne p where fhp.id_personne=p.id and role='realisateur' and nom='$nom'";
		$listFilm = $dblink->TabResSQL($query);
		$listActeurs = array();
		foreach ($listFilm as $film) {
			$query = "select nom from film_has_personne join personne on id=id_personne where id_film=" . $film['id_film'] . " and role='acteur'";
			$acteurs = $dblink->TabResSQL($query);
			foreach ($acteurs as $acteur) {
				if(array_key_exists($acteur['nom'], $listActeurs)){
					++$listActeurs[$acteur['nom']];
				} else {
					$listActeurs[$acteur['nom']] = 1;
				}
			}
		}
		$max = max($listActeurs);
		foreach ($listActeurs as $idA => $occurence) {
			if($max != $occurence){
				unset($listActeurs[$idA]);
			}
		}
		return $listActeurs;
	}

	function isRealisateur($nom){
		$dblink = new Mysql('db708477891.db.1and1.com','db708477891','dbo708477891','Fairytail21!');
		$query = "select distinct role from film_has_personne fhp, personne p where p.id=fhp.id_personne and nom='$nom'";
		$res = $dblink->TabResSQL($query);
		foreach ($res as $value) {
			if ($value['role'] == 'realisateur') {
				return true;
			}
		}
		return false;
	}
