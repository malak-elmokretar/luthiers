<?php

function accueilControleur($twig){
    echo $twig->render("accueil.twig", array());
}

function contactControleur($twig){
    echo $twig->render("contact.twig", array());
}

function mentionsLegalesControleur($twig){
    echo $twig->render("mentionsLegales.twig", array());
}


?>