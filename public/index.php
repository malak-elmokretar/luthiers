<?php

require_once "../lib/vendor/autoload.php";
require_once "../source/controleur/_controleurs.php";
require_once "../config/routes.php";

$loader = new \Twig\Loader\FilesystemLoader('../source/vue/'); 
$twig = $twig = new \Twig\Environment($loader, []); 
$contenu = getPage();
$contenu($twig);
?>