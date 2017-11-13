<?php

class MySQLExeption  extends Exception{
    public function __construct($Msg) {
        parent :: __construct($Msg);
    }
    public function RetourneErreur() {
        $msg  = '<div><strong>' . $this->getMessage() . '</strong>';
        $msg .= ' Ligne : ' . $this->getLine() . '</div>';
        return $msg;
    }
}

class Mysql{
    private
    $server = '',
    $data_base = '',
    $id = '',
    $password = '',
    $link = '',
    $debogue = true,
    $nb_query = 0;
    /**
    * Constructeur de la classe
    * Connexion aux serveur de base de donnée et sélection de la base
    *
    * $Serveur     = L'hôte (ordinateur sur lequel Mysql est installé)
    * $Bdd         = Le nom de la base de données
    * $Identifiant = Le nom d'utilisateur
    * $Mdp         = Le mot de passe
    */
    public function __construct($server = 'localhost', $data_base = 'base', $id = 'root', $password = ''){
        $this->server = $server;
        $this->data_base = $data_base;
        $this->id = $id;
        $this->password = $password;
        $this->link = mysqli_connect($this->server, $this->id, $this->password);
        if(!$this->link && $this->debogue)
            throw new MySQLExeption(' Erreur de connexion au serveur MySql!!! ');
        $base = mysqli_select_db($this->link, $this->data_base);
        if (!$base && $this->debogue)
            throw new MySQLExeption(' Erreur de connexion à la base de donnees!!! ');
    }

    /**
    * Retourne le nombre de requêtes SQL effectué par l'objet
    */
    public function RetourneNbRequetes(){
        return $this->nb_query;
    }
    /**
    * Envoie une requête SQL et récupère le résultât dans un tableau pré formaté
    *
    * $Requete = Requête SQL
    */
    public function TabResSQL($query){
        $i = 0;
        $ressource = mysqli_query($this->link, $query);
        $tabResult=array();
        if (!$ressource and $this->debogue) throw new MySQLExeption(' Erreur de requête SQL!!! ');
        while ($rows = mysqli_fetch_assoc($ressource)){
            foreach ($rows as $keys => $values) $tabResult[$i][$keys] = $values;
            ++$i;
        }
        mysqli_free_result($ressource);
        $this->nb_query++;
        return $tabResult;
    }
    /**
    * Retourne le dernier identifiant généré par un champ de type AUTO_INCREMENT
    *
    */
    public function DernierId(){
        return mysqli_insert_id($this->link);
    }
    /**
    * Envoie une requête SQL et retourne le nombre de table affecté
    *
    * $Requete = Requête SQL
    */
    public function ExecuteSQL($query){
        $ressource = mysqli_query($this->link,$query);
        if (!$ressource and $this->debogue) throw new MySQLExeption(' Erreur de requête SQL!!! ');
        $this->nb_query++;
        $nbAffectee = mysqli_affected_rows($this->link);
        return $nbAffectee;
    }  
}
