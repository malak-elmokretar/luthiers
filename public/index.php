<?php

session_start();
require_once "../lib/vendor/autoload.php";
require_once "../source/controleur/_controleurs.php";
require_once "../config/routes.php";
require_once "../config/connexion.php";
require_once "../config/parametres.php";
require_once "../source/modele/_classes.php";

$loader = new \Twig\Loader\FilesystemLoader('../source/vue/'); 
$twig = $twig = new \Twig\Environment($loader, []); 
$db = connect($config);
$contenu = getPage($db);
$contenu($twig, $db);
?>