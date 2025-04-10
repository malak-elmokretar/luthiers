<?php

class Actualite{
    private $db;
    private $insert;
    private $select;

    public function __construct($db){
        $this->db = $db;
        $this->insert = $this->db->prepare("INSERT INTO actualite(titre, description, date_debut, date_fin_) VALUES (:titre, :description, :date_debut, :date_fin_)");
        $this->select = $this->db->prepare("SELECT titre, description, date_debut, date_fin_ FROM actualite ORDER BY date_fin_ DESC");
    }

    public function insert($titre, $description, $date_debut, $date_fin_){
        $r = true;
        $this->insert->execute(array(":titre" => $titre, ":description" => $description, ":date_debut" => $date_debut, ":date_fin_" => $date_fin_));
        if ($this -> insert -> errorCode() != 0){
            print_r($this->insert->errorInfo());
            $r=false;
        }
        return $r;
    }

    public function select(){
        $this->select->execute();
        if ($this -> select -> errorCode() != 0){
            print_r($this->select->errorInfo());
        }
        return $this->select->fetchAll();
    }
}