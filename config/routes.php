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