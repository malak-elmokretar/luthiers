<?php

function ajoutProduitControleur($twig, $db){
    $form = array();
    if(isset($_POST["btnAjouterProduit"])){
        $nom = $_POST["inputNomProduit"];
        $categorie = $_POST["inputCategorieProduit"];
        $description = $_POST["inputDescriptionProduit"];
        $prix = $_POST["inputPrixProduit"];
        $quantite = $_POST["inputQuantiteProduit"];
        $chemin_photo = "images/".$_POST["inputImageProduit"];
        $produitAjoute = new Produit($db);
        $exec = $produitAjoute->insert($nom, $categorie, $description, $prix, $quantite, $chemin_photo);
        if (!$exec){
            $form["valide"] = false;
            $form["erreur"] = "Problème d'insertion, veuillez réessayer plus tard.";
        }
    }
    echo $twig->render("ajoutProduit.twig", array("form" => $form));
}

?>