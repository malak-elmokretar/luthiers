<?php

function accueilControleur($twig){
    echo $twig->render("accueil.twig", array());
}

function atelierControleur($twig){
    echo $twig->render("atelier.twig", array());
}

function artisansControleur($twig){
    echo $twig->render("artisans.twig", array());
}

function prestationsControleur($twig){
    echo $twig->render("prestations.twig", array());
}

function mentionsLegalesControleur($twig){
    echo $twig->render("mentionsLegales.twig", array());
}

function maintenanceControleur($twig){
    echo $twig->render("maintenance.twig", array());
}

function administrationControleur($twig){
    echo $twig->render("administration.twig", array());
}
?>