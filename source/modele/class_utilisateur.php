<?php

class Utilisateur{
    private $db;
    private $insert;
    private $connect;
    private $select;

    public function __construct($db){
        $this->db = $db;
        $this->insert = $this->db->prepare("INSERT INTO utilisateurs (email, nom_utilisateur, pword, nom, prenom) VALUES (:email, :nom_utilisateur, :pword, :nom, :prenom)");
        $this->connect = $this->db->prepare("SELECT nom_utilisateur, pword FROM utilisateur WHERE nom_utilisateur = :nom_utilisateur");
        $this->select = $db->prepare("CALL lister_utilisateurs()");
    }

    public function insert($email, $nom_utilisateur, $pword, $nom, $prenom){
        $r = true;
        $this->insert->execute(array(':email'=>$email, ':nom_utilisateur' => $nom_utilisateur, ':pword'=>$pword, ':nom'=>$nom, ':prenom'=>$prenom));

        if ($this->insert->errorCode()!=0){
            print_r($this->insert->errorInfo());
            $r=false;
        }
        return $r;
    }

    public function connect($nom_utilisateur){
        $unUtilisateur = $this->connect->execute(array(':nom_utilisateur'=>$nom_utilisateur));
        if ($this->connect->errorCode()!=0){
            print_r($this->connect->errorInfo());
        }
        return $this->connect->fetch();
    }

    public function select(){
        $this->select->execute();
        if ($this->select->errorCode()!=0){
            print_r($this->select->errorInfo());
        }
        return $this->select->fetchAll();
    }
}
?>