<?php

function actualiteControleur($twig, $db){
    $form = array(); 
    $produit = new Produit($db); 
    $liste = $produit->select(); 
    echo $twig->render('actualite.twig', array('form'=>$form,'liste'=>$liste)); 
}

?>