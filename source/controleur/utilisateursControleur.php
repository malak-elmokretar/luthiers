<?php

function utilisateursControleur($twig, $db){
    $form = array(); 
    $utilisateur = new Utilisateur($db); 
    $liste = $utilisateur->select();
    echo $twig->render('utilisateurs.twig', array('form'=>$form,'liste'=>$liste)); 
}

?>