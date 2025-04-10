<?php

function listeContactControleur($twig, $db){
    $form = array(); 
    $contact = new Contact($db); 
    $liste = $contact->select();
    echo $twig->render('listeContact.twig', array('form'=>$form,'liste'=>$liste)); 
}

?>