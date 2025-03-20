<?php

function produitsControleur($twig, $db){
    $form = array(); 
    $produit = new Produit($db); 
    $liste = $produit->select(); 
    echo $twig->render('produits.twig', array('form'=>$form,'liste'=>$liste)); 
}

?>