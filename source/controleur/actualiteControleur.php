<?php

function actualiteControleur($twig, $db){
    $form = array(); 
    $actualite = new Actualite($db); 
    $liste = $actualite->select(); 
    echo $twig->render('actualite.twig', array('form'=>$form,'liste'=>$liste)); 
}

?>