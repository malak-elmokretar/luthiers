<?php

class Produit{
    private $db;
    private $insert;
    private $select;

    public function __construct($db){
        $this->db = $db;
        $this->insert = $this->db->prepare("INSERT INTO produits(nom, categorie, description, prix, quantite, chemin_photo) VALUES (:nom, :categorie, :description, :prix, :quantite, :chemin_photo)");
        $this->select = $db -> prepare("SELECT nom, categorie, description, prix, quantite, chemin_photo AS chemin FROM produits ORDER BY nom");
    }

    public function insert($nom, $categorie, $description, $prix, $quantite, $chemin_photo){
        $r = true;
        $this->insert->execute(array(":nom" => $nom, ":categorie" => $categorie, ":description" => $description, ":prix" => $prix, ":quantite" => $quantite, ":chemin_photo" => $chemin_photo));
        if ($this -> insert -> errorCode() != 0){
            print_r($this->insert->errorInfo());
            $r=false;
        }
        return $r;
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