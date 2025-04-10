<?php

function getPage($db){
    $lesPages["accueil"] = "accueilControleur";
    $lesPages["atelier"] = "atelierControleur";
    $lesPages["artisans"] = "artisansControleur";
    $lesPages["prestations"] = "prestationsControleur";
    $lesPages["maintenance"] = "maintenanceControleur";
    $lesPages["contact"] = "contactControleur";
    $lesPages["mentionsLegales"] = "mentionsLegalesControleur";
    $lesPages["produits"] = "produitsControleur";
    $lesPages["ajoutProduit"] = "ajoutProduitControleur";
    $lesPages["inscription"] = "inscriptionControleur";
    $lesPages["connexion"] = "connexionControleur";
    $lesPages["actualite"]= "actualiteControleur";
    $lesPages["deconnexion"] = "deconnexionControleur";
    $lesPages["modificationUtilisateur"] = "modificationUtilisateurControleur";
    $lesPages["utilisateurs"] = "utilisateursControleur";
    $lesPages["administration"] = "administrationControleur";
    $lesPages["listeContact"] = "listeContactControleur";
    
    if ($db!= null){
        if (isset($_GET["page"])){
            $page = $_GET["page"];
        } else {
            $page = "accueil";
        }
    
        if (!isset($lesPages[$page])){
            $page = "accueil";
        } 
        $contenu = $lesPages[$page];
    } else {
        $contenu = $lesPages["maintenance"];
    }
    
    return $contenu;
}
?>